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

    function GetAllEmployee()
    {
        $this -> db -> select('*');
        $this -> db -> from('employee');
        $this -> db -> join('person', 'employee.id_person = person.id_person');
        $this -> db -> join('user', 'user.id_user = person.id_user');

        $query = $this -> db -> get();//var_dump($query->row());die();

        if($query -> num_rows() >= 1)
            $return=$this->Result(0, 0, $query->result());
        else
            $return=$this->Result(1, 'NO_EMPLOYEE');

        return $return;
    }





    function GetAccountUserByUserID($data)
    {
		$this -> db -> select('*');
        $this -> db -> from('user');
        $this -> db -> where('id_user = ' . "'" . $data['session']['id_user'] . "'");
        $this -> db -> limit(1);

        $query = $this -> db -> get();//var_dump($query->row());die();

        if($query -> num_rows() == 1)
			$return=$this->Result(0, 0, $query->row());
        else
			$return=$this->Result(1, 'NO_LOGGED');
       
		return $return;
    }
	
	function GetProfileUserByUserID($data)
    {
		$this -> db -> select('*');
        $this -> db -> from('person');
		$this -> db -> join('zip', 'zip.id_zip = person.id_zip');
		$this -> db -> join('city', 'city.id_city = zip.id_city');
		$this -> db -> join('state', 'state.id_state = city.id_state');
		$this -> db -> join('country', 'country.id_country = state.id_country');
        $this -> db -> where('id_user = ' . "'" . $data['session']['id_user'] . "'");
        $this -> db -> limit(1);

        $query = $this -> db -> get();//var_dump($query->row());die();

        if($query -> num_rows() == 1)
			$return=$this->Result(0, 0, $query->row());
        else
			$return=$this->Result(1, 'NO_PERSON');
       
		return $return;
    }

    function GetStateByZIP($zip)
    {
        $this -> db -> select('*');
        $this -> db -> from('zip');
        $this -> db -> join('city', 'city.id_city = zip.id_city');
        $this -> db -> join('state', 'state.id_state = city.id_state');
        $this -> db -> join('country', 'country.id_country = state.id_country');
        $this -> db -> where('zip = ' . "'" . $zip . "'");

        $query = $this -> db -> get();//var_dump($query->row());die();

        if($query -> num_rows() >= 1)
            $return=$this->Result(0, 0, $query->row());
        else
            $return=$this->Result(1, 'NO_ZIP');

        return $return;
    }

    function GetEmployeeByPersonID($id_person)
    {
		$this -> db -> select('*');
        $this -> db -> from('employee');
        $this -> db -> where('id_person = ' . "'" . $id_person . "'");
        $this -> db -> limit(1);

        $query = $this -> db -> get();//var_dump($query->row());die();

        if($query -> num_rows() == 1)
			$return=$this->Result(0, 0, $query->row());
        else
			$return=$this->Result(1, 'NO_EMPLOYEE');

		return $return;
    }

    function GetFormByPersonID($id_person, $form_name)
    {
		$this -> db -> select('*');
        $this -> db -> from('form');
		$this -> db -> join('employee', 'employee.id_employee = form.id_employee');
        $this -> db -> where('id_person = ' . "'" . $id_person . "'");
        $this -> db -> where('form_name = ' . "'" . $form_name . "'");
        $this -> db -> limit(1);

        $query = $this -> db -> get();//var_dump($query->row());die();

        if($query -> num_rows() == 1)
			$return=$this->Result(0, 0, $query->row());
        else
			$return=$this->Result(1, 'NO_EMPLOYEE');

		return $return;
    }

    function GetAllFormsByPersonID($id_person)
    {
		$this -> db -> select('*');
        $this -> db -> from('form');
		$this -> db -> join('employee', 'employee.id_employee = form.id_employee');
        $this -> db -> where('id_person = ' . "'" . $id_person . "'");

        $query = $this -> db -> get();//var_dump($query->result());die();

        if($query -> num_rows() >= 1)
			$return=$this->Result(0, 0, $query->result());
        else
			$return=$this->Result(1, 'NO_EMPLOYEE');

		return $return;
    }

    function GetConsentByPersonID($id_person, $form_name)
    {
		$this -> db -> select('*');
        $this -> db -> from('consent');
		$this -> db -> join('form', 'form.id_form = consent.id_form');
		$this -> db -> join('employee', 'employee.id_employee = form.id_employee');
        $this -> db -> where('id_person = ' . "'" . $id_person . "'");
        $this -> db -> where('form_name = ' . "'" . $form_name . "'");

        $query = $this -> db -> get();//var_dump($query->row());die();

        if($query -> num_rows() >= 1)
			$return=$this->Result(0, 0, $query->result());
        else
			$return=$this->Result(1, 'NO_EMPLOYEE');

		return $return;
    }

    function GetEmployeeByEmployeeID($id_employee)
    {
		$this -> db -> select('*');
        $this -> db -> from('employee');
        $this -> db -> where('employee.id_employee = ' . "'" . $id_employee . "'");
        $this -> db -> limit(1);

        $query = $this -> db -> get();//var_dump($query->row());die();

        if($query -> num_rows() == 1)
			$return=$this->Result(0, 0, $query->row());
        else
			$return=$this->Result(1, 'NO_EMPLOYEE');

		return $return;
    }

    function GetFormByEmployeeID($id_employee, $form_name)
    {
		$this -> db -> select('*');
        $this -> db -> from('form');
		$this -> db -> join('employee', 'employee.id_employee = form.id_employee');
        $this -> db -> where('employee.id_employee = ' . "'" . $id_employee . "'");
        $this -> db -> where('form_name = ' . "'" . $form_name . "'");
        $this -> db -> limit(1);

        $query = $this -> db -> get();//var_dump($query->row());die();

        if($query -> num_rows() == 1)
			$return=$this->Result(0, 0, $query->row());
        else
			$return=$this->Result(1, 'NO_EMPLOYEE');

		return $return;
    }

    function GetConsentByEmployeeID($id_employee, $form_name)
    {
		$this -> db -> select('*');
        $this -> db -> from('consent');
		$this -> db -> join('form', 'form.id_form = consent.id_form');
		$this -> db -> join('employee', 'employee.id_employee = form.id_employee');
        $this -> db -> where('employee.id_employee = ' . "'" . $id_employee . "'");
        $this -> db -> where('form_name = ' . "'" . $form_name . "'");

        $query = $this -> db -> get();//var_dump($query->row());die();

        if($query -> num_rows() >= 1)
			$return=$this->Result(0, 0, $query->result());
        else
			$return=$this->Result(1, 'NO_EMPLOYEE');

		return $return;
    }
}
?>