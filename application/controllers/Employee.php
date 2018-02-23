<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        //$this->load->model('M_Employee');
    }

	function SaveEmployment()
    {
        $this->load->helper('General_Helper');
        $data['session']=GetSessionVars();

        $field_id='';

        $consent_name1=$this->input->post('consent_name1');
        $consent_name2=$this->input->post('consent_name2');
        $consent_name3=$this->input->post('consent_name3');
        $sign1=$this->input->post('sign1');
        $sign2=$this->input->post('sign2');
        $sign3=$this->input->post('sign3');
        $id_consent1=$this->input->post('id_consent1');
        $id_consent2=$this->input->post('id_consent2');
        $id_consent3=$this->input->post('id_consent3');

        $id_person=$data['session']['id_person'];
        $id_employee=$this->input->post('id_employee');
        $id_form=$this->input->post('id_form');
        $completed_percent=$this->input->post('completed_percent');

        $form_name=$this->input->post('form_name');
        $form_sign=$this->input->post('form_sign');
        $date=date('Y-m-d');


        //--------------EMPLOYEE---------------

        $table='employee';
        $fields=array();
        $datas=array();

        $fields[]='completed_percent';
        $fields[]='id_person';

        $datas['completed_percent']=$completed_percent;
        $datas['id_person']=$id_person;

        if($id_employee=='')
        {
            $type='INSERT';
        }
        else
        {
            $type='UPDATE';
            $datas['id']=$id_employee;
            $field_id='id_employee';
        }

        $result=$this->M_Main->GetCompletedPercentByPersonID($id_person);

        if($result['error_code']=='0')
            $existing_completed_percent=$result['data']->completed_percent;

        //echo $completed_percent.' > '.$existing_completed_percent;

        if($completed_percent>$existing_completed_percent)
        {//var_dump($result);
            $this->load->model('M_Main');
            $result = $this->M_Main->Execute($type, $fields, $datas, $table, $field_id);
        }

        //--------------EMPLOYEE---------------

        //----------------FORM-----------------

        $table='form';
        $fields=array();
        $datas=array();

        if($id_form=='')
        {
            $type='INSERT';
            if(isset($result['data']['last_id']) && $result['data']['last_id']!='')
            {
                $id_employee=$result['data']['last_id'];
                $type='INSERT';
            }
            else
                print 'LAST_ID_EMPTY';
        }
        else
        {
            $type='UPDATE';
            $datas['id']=$id_form;
            $field_id='id_form';
        }

        $fields[]='form_name';
        $fields[]='form_sign';
        $fields[]='date';
        $fields[]='id_employee';

        $datas['form_name']=$form_name;
        $datas['form_sign']=$form_sign;
        $datas['date']=$date;
        $datas['id_employee']=$id_employee;

        $this->load->model('M_Main');
        $result=$this->M_Main->Execute($type, $fields, $datas, $table, $field_id);//

        //----------------FORM-----------------

        //--------------CONSENT 1--------------

        $table='consent';
        $fields=array();
        $datas=array();

        if($id_consent1=='')
        {
            $type='INSERT';
            if(isset($result['data']['last_id']) && $result['data']['last_id']!='')
            {
                $id_form=$result['data']['last_id'];
                $type='INSERT';
            }
            else
                print 'LAST_ID_EMPTY';
        }
        else
        {
            $type='UPDATE';
            $datas['id']=$id_consent1;
            $field_id='id_consent';
        }

        $fields[]='consent_name';
        $fields[]='sign';
        $fields[]='id_form';

        $datas['consent_name']=$consent_name1;
        $datas['sign']=$sign1;
        $datas['id_form']=$id_form;

        $this->load->model('M_Main');
        $result=$this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

        //--------------CONSENT 1--------------

        //--------------CONSENT 2--------------

        $fields=array();
        $datas=array();

        if($id_consent2=='')
        {
            $type='INSERT';
        }
        else
        {
            $type='UPDATE';
            $datas['id']=$id_consent2;
            $field_id='id_consent';
        }

        $fields[]='consent_name';
        $fields[]='sign';
        $fields[]='id_form';

        $datas['consent_name']=$consent_name2;
        $datas['sign']=$sign2;
        $datas['id_form']=$id_form;

        $this->load->model('M_Main');
        $result=$this->M_Main->Execute($type, $fields, $datas, $table, $field_id);//die();

        //--------------CONSENT 2--------------

        //--------------CONSENT 3--------------

        $fields=array();
        $datas=array();

        if($id_consent3=='')
        {
            $type='INSERT';
        }
        else
        {
            $type='UPDATE';
            $datas['id']=$id_consent3;
            $field_id='id_consent';
        }

        $fields[]='consent_name';
        $fields[]='sign';
        $fields[]='id_form';

        $datas['consent_name']=$consent_name3;
        $datas['sign']=$sign3;
        $datas['id_form']=$id_form;

        $this->load->model('M_Main');
        $result=$this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

        //--------------CONSENT 3--------------

        print $id_employee;
    }

    function SaveEmployeeFormConsent()
    {
        $this->load->helper('General_Helper');
        $data['session']=GetSessionVars();

        $field_id='';

        $consent_name1=$this->input->post('consent_name1');
        $consent_name2=$this->input->post('consent_name2');
        $consent_name3=$this->input->post('consent_name3');
        $sign1=$this->input->post('sign1');
        $sign2=$this->input->post('sign2');
        $sign3=$this->input->post('sign3');
        $id_consent1=$this->input->post('id_consent1');
        $id_consent2=$this->input->post('id_consent2');
        $id_consent3=$this->input->post('id_consent3');

        $id_employee=$this->input->post('id_employee');
        $id_form=$this->input->post('id_form');
        $completed_percent=$this->input->post('completed_percent');

        $form_name=$this->input->post('form_name');
        $form_sign=$this->input->post('form_sign');
        $date=date('Y-m-d');

        //--------------EMPLOYEE---------------

        $table='employee';
        $fields=array();
        $datas=array();

        $fields[]='completed_percent';
        $datas['completed_percent']=$completed_percent;

        if($id_employee!='')
        {
            $type='UPDATE';
            $datas['id']=$id_employee;
            $field_id='id_employee';

            $result=$this->M_Main->GetCompletedPercentByEmployeeID($id_employee);

            if($result['error_code']=='0')
                $existing_completed_percent=$result['data']->completed_percent;

            //echo $completed_percent.' > '.$existing_completed_percent;

            if($completed_percent>$existing_completed_percent)
            {//var_dump($result);
                $this->load->model('M_Main');
                $result = $this->M_Main->Execute($type, $fields, $datas, $table, $field_id);
            }
        }
        //--------------EMPLOYEE---------------

        //----------------FORM-----------------

        $table='form';
        $fields=array();
        $datas=array();

        if($id_form=='')
        {
            $type='INSERT';
        }
        else
        {
            $type='UPDATE';
            $datas['id']=$id_form;
            $field_id='id_form';
        }

        $fields[]='form_name';
        $fields[]='form_sign';
        $fields[]='date';
        $fields[]='id_employee';

        $datas['form_name']=$form_name;
        $datas['form_sign']=$form_sign;
        $datas['date']=$date;
        $datas['id_employee']=$id_employee;

        $this->load->model('M_Main');
        $result=$this->M_Main->Execute($type, $fields, $datas, $table, $field_id);//

        //----------------FORM-----------------

        //--------------CONSENT 1--------------

        $table='consent';
        $fields=array();
        $datas=array();

        if($id_consent1=='')
        {
            $type='INSERT';
            if(isset($result['data']['last_id']) && $result['data']['last_id']!='')
            {
                $id_form=$result['data']['last_id'];
            }
            else
                print 'LAST_ID_EMPTY';
        }
        else
        {
            $type='UPDATE';
            $datas['id']=$id_consent1;
            $field_id='id_consent';
        }

        $fields[]='consent_name';
        $fields[]='sign';
        $fields[]='id_form';

        $datas['consent_name']=$consent_name1;
        $datas['sign']=$sign1;
        $datas['id_form']=$id_form;

        $this->load->model('M_Main');
        $result=$this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

        //--------------CONSENT 1--------------

        //--------------CONSENT 2--------------

        $fields=array();
        $datas=array();

        if($id_consent2=='')
        {
            $type='INSERT';
        }
        else
        {
            $type='UPDATE';
            $datas['id']=$id_consent2;
            $field_id='id_consent';
        }

        $fields[]='consent_name';
        $fields[]='sign';
        $fields[]='id_form';

        $datas['consent_name']=$consent_name2;
        $datas['sign']=$sign2;
        $datas['id_form']=$id_form;

        $this->load->model('M_Main');
        $result=$this->M_Main->Execute($type, $fields, $datas, $table, $field_id);//die();

        //--------------CONSENT 2--------------

        //--------------CONSENT 3--------------

        $fields=array();
        $datas=array();

        if($id_consent3=='')
        {
            $type='INSERT';
        }
        else
        {
            $type='UPDATE';
            $datas['id']=$id_consent3;
            $field_id='id_consent';
        }

        $fields[]='consent_name';
        $fields[]='sign';
        $fields[]='id_form';

        $datas['consent_name']=$consent_name3;
        $datas['sign']=$sign3;
        $datas['id_form']=$id_form;

        $this->load->model('M_Main');
        $result=$this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

        //--------------CONSENT 3--------------

        print $id_employee;
    }
	
	
	

}