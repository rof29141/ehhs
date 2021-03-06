<?php
Class M_Care extends CI_Model
{
    function  __construct()
    {
        parent::__construct();
    }

    function Result($error_code=0, $error_msg=0, $result='')
    {
        $return['error_code']=$error_code;
        $return['error_msg']=$error_msg;
        $return['data']=$result;

        return $return;
    }

    function GetCareByClientID($id_client)
    {
        $this -> db -> select('*');
        $this -> db -> from('care_schedule');
        $this -> db -> where('care_schedule.id_client = ' . "'" . $id_client . "'");

        $query = $this -> db -> get();//var_dump($query->result());die();

        if($query -> num_rows() >= 1)
            $return=$this->Result(0, 0, $query->result());
        else
            $return=$this->Result(1, 'NO_CLIENT');

        return $return;
    }

    function GetAllCares()
    {
        $this -> db -> select('*');
        $this -> db -> from('care_schedule');
        $this -> db -> join('client', 'client.id_client = care_schedule.id_client');
        $this -> db -> join('person', 'client.id_person = person.id_person');

        $query = $this -> db -> get();//var_dump($query->result());die();

        if($query -> num_rows() >= 1)
            $return=$this->Result(0, 0, $query->result());
        else
            $return=$this->Result(1, 'NO_CLIENT');

        return $return;
    }

    function GetCareByApproved($approved)
    {
        $this -> db -> select('*');
        $this -> db -> from('care_schedule');
        $this -> db -> join('client', 'client.id_client = care_schedule.id_client');
        $this -> db -> join('person', 'client.id_person = person.id_person');
        $this -> db -> where('care_schedule.approved = ' . "'" . $approved . "'");

        $query = $this -> db -> get();//var_dump($query->result());die();

        if($query -> num_rows() >= 1)
            $return=$this->Result(0, 0, $query->result());
        else
            $return=$this->Result(1, 'NO_CLIENT');

        return $return;
    }

    function GetAvailableCare()
    {
        $this -> db -> select('*');
        $this -> db -> from('care_schedule as c');
        $this -> db -> join('client', 'client.id_client = c.id_client');
        $this -> db -> join('person', 'client.id_person = person.id_person');
        $this -> db -> where("c.approved = '1'");
        $this -> db -> where("NOT EXISTS(select * from employee_care as e where c.id_care_schedule = e.id_care_schedule)", '', FALSE);

        $query = $this -> db -> get();//var_dump($query->result());die();

        if($query -> num_rows() >= 1)
            $return=$this->Result(0, 0, $query->result());
        else
            $return=$this->Result(1, 'NO_CLIENT');

        return $return;
    }
}
?>