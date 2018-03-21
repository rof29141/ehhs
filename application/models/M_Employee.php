<?php
Class M_Employee extends CI_Model
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

    function GetAllWorkers()
    {
        $this -> db -> select('*');
        $this -> db -> from('employee');
        $this -> db -> join('person', 'employee.id_person = person.id_person');
        $this -> db -> join('user', 'user.id_user = person.id_user');
        $this -> db -> where("rol = 'worker'");

        $query = $this -> db -> get();//var_dump($query->result());die();

        if($query -> num_rows() >= 1)
            $return=$this->Result(0, 0, $query->result());
        else
            $return=$this->Result(1, 'NO_EMPLOYEE');

        return $return;
    }
}
?>