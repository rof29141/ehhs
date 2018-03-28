<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //$this->load->model('M_Employee');
    }

	function SaveEmployment()
    {
        $field_id='';
        $existing_completed_percent=0;

        $consent_name1=$this->input->post('consent_name1');
        $consent_name2=$this->input->post('consent_name2');
        $consent_name3=$this->input->post('consent_name3');
        $sign1=$this->input->post('sign1');
        $sign2=$this->input->post('sign2');
        $sign3=$this->input->post('sign3');
        $id_consent1=$this->input->post('id_consent1');
        $id_consent2=$this->input->post('id_consent2');
        $id_consent3=$this->input->post('id_consent3');

        $id_person=$this->input->post('id_person');
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

        $this->load->model('M_Main');
        $result=$this->M_Main->GetCompletedPercentByPersonID($id_person);

        if($result['error_code']=='0')
            $existing_completed_percent=$result['data']->completed_percent;

        //echo $completed_percent.' > '.$existing_completed_percent;

        if($completed_percent>$existing_completed_percent)
        {//var_dump($result);
            $this->load->model('M_Main');
            $result = $this->M_Main->Execute($type, $fields, $datas, $table, $field_id);
        }
//var_dump($result['data']);
        //--------------EMPLOYEE---------------

        //----------------FORM-----------------

        $table='form';
        $fields=array();
        $datas=array();

        if($id_form=='')
        {

            $type='INSERT';
            if(array_key_exists('last_id', $result['data']))
            {
                $id_employee=$result['data']['last_id'];
            }
            else
                print 'LAST_ID_EMPTY';
        }
        else
        {
            $type='UPDATE';
            $datas['id']=$id_form;
            $field_id='id_form';
        }//die();

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
            if(array_key_exists('last_id', $result['data']))
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

        if($sign1!='' && $consent_name1!='')
        {
            $table = 'consent';
            $fields = array();
            $datas = array();

            if ($id_consent1 == '')
            {
                $type = 'INSERT';
                if (isset($result['data']['last_id']) && $result['data']['last_id'] != '')
                {
                    $id_form = $result['data']['last_id'];
                } else
                    print 'LAST_ID_EMPTY';
            } else
            {
                $type = 'UPDATE';
                $datas['id'] = $id_consent1;
                $field_id = 'id_consent';
            }

            $fields[] = 'consent_name';
            $fields[] = 'sign';
            $fields[] = 'id_form';

            $datas['consent_name'] = $consent_name1;
            $datas['sign'] = $sign1;
            $datas['id_form'] = $id_form;

            $this->load->model('M_Main');
            $this->M_Main->Execute($type, $fields, $datas, $table, $field_id);
        }

        //--------------CONSENT 1--------------

        //--------------CONSENT 2--------------

        if($sign2!='' && $consent_name2!='')
        {
            $fields = array();
            $datas = array();

            if ($id_consent2 == '')
            {
                $type = 'INSERT';
            } else
            {
                $type = 'UPDATE';
                $datas['id'] = $id_consent2;
                $field_id = 'id_consent';
            }

            $fields[] = 'consent_name';
            $fields[] = 'sign';
            $fields[] = 'id_form';

            $datas['consent_name'] = $consent_name2;
            $datas['sign'] = $sign2;
            $datas['id_form'] = $id_form;

            $this->load->model('M_Main');
            $this->M_Main->Execute($type, $fields, $datas, $table, $field_id);//die();
        }

        //--------------CONSENT 2--------------

        //--------------CONSENT 3--------------

        if($sign3!='' && $consent_name3!='')
        {
            $fields = array();
            $datas = array();

            if ($id_consent3 == '')
            {
                $type = 'INSERT';
            } else
            {
                $type = 'UPDATE';
                $datas['id'] = $id_consent3;
                $field_id = 'id_consent';
            }

            $fields[] = 'consent_name';
            $fields[] = 'sign';
            $fields[] = 'id_form';

            $datas['consent_name'] = $consent_name3;
            $datas['sign'] = $sign3;
            $datas['id_form'] = $id_form;

            $this->load->model('M_Main');
            $this->M_Main->Execute($type, $fields, $datas, $table, $field_id);
        }

        //--------------CONSENT 3--------------

        print $id_employee;
    }

    function SaveMedical()
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

        $consent_name4=$this->input->post('cbx_name1');
        $consent_name5=$this->input->post('cbx_name2');
        $consent_name6=$this->input->post('cbx_name3');
        $sign4=$this->input->post('cbx1');
        $sign5=$this->input->post('cbx2');
        $sign6=$this->input->post('cbx3');
        $id_consent4=$this->input->post('id_consent_cbx1');
        $id_consent5=$this->input->post('id_consent_cbx2');
        $id_consent6=$this->input->post('id_consent_cbx3');

        $consent_name7=$this->input->post('label_name1');
        $consent_name8=$this->input->post('label_name2');
        $consent_name9=$this->input->post('label_name3');
        $sign7=$this->input->post('data1');
        $sign8=$this->input->post('data2');
        $sign9=$this->input->post('data3');
        $id_consent7=$this->input->post('id_consent_lb1');
        $id_consent8=$this->input->post('id_consent_lb2');
        $id_consent9=$this->input->post('id_consent_lb3');

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
            if(array_key_exists('last_id', $result['data']))
            {
                $id_form=$result['data']['last_id'];
            }
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
        $this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

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
        $this->M_Main->Execute($type, $fields, $datas, $table, $field_id);//die();

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
        $this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

        //--------------CONSENT 3--------------

        //----------------CBX 1----------------

        $table='consent';
        $fields=array();
        $datas=array();

        if($id_consent4=='')
        {
            $type='INSERT';
        }
        else
        {
            $type='UPDATE';
            $datas['id']=$id_consent4;
            $field_id='id_consent';
        }

        $fields[]='consent_name';
        $fields[]='sign';
        $fields[]='id_form';

        $datas['consent_name']=$consent_name4;
        $datas['sign']=$sign4;
        $datas['id_form']=$id_form;

        $this->load->model('M_Main');
        $this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

        //----------------CBX 1----------------

        //----------------CBX 2----------------

        $table='consent';
        $fields=array();
        $datas=array();

        if($id_consent5=='')
        {
            $type='INSERT';
        }
        else
        {
            $type='UPDATE';
            $datas['id']=$id_consent5;
            $field_id='id_consent';
        }

        $fields[]='consent_name';
        $fields[]='sign';
        $fields[]='id_form';

        $datas['consent_name']=$consent_name5;
        $datas['sign']=$sign5;
        $datas['id_form']=$id_form;

        $this->load->model('M_Main');
        $this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

        //----------------CBX 2----------------

        //----------------CBX 3----------------

        $table='consent';
        $fields=array();
        $datas=array();

        if($id_consent6=='')
        {
            $type='INSERT';
        }
        else
        {
            $type='UPDATE';
            $datas['id']=$id_consent6;
            $field_id='id_consent';
        }

        $fields[]='consent_name';
        $fields[]='sign';
        $fields[]='id_form';

        $datas['consent_name']=$consent_name6;
        $datas['sign']=$sign6;
        $datas['id_form']=$id_form;

        $this->load->model('M_Main');
        $this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

        //----------------CBX 3----------------

        //----------------LBL 1----------------

        $table='consent';
        $fields=array();
        $datas=array();

        if($id_consent7=='')
        {
            $type='INSERT';
        }
        else
        {
            $type='UPDATE';
            $datas['id']=$id_consent7;
            $field_id='id_consent';
        }

        $fields[]='consent_name';
        $fields[]='sign';
        $fields[]='id_form';

        $datas['consent_name']=$consent_name7;
        $datas['sign']=$sign7;
        $datas['id_form']=$id_form;

        $this->load->model('M_Main');
        $this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

        //----------------LBL 1----------------

        //----------------LBL 2----------------

        $table='consent';
        $fields=array();
        $datas=array();

        if($id_consent8=='')
        {
            $type='INSERT';
        }
        else
        {
            $type='UPDATE';
            $datas['id']=$id_consent8;
            $field_id='id_consent';
        }

        $fields[]='consent_name';
        $fields[]='sign';
        $fields[]='id_form';

        $datas['consent_name']=$consent_name8;
        $datas['sign']=$sign8;
        $datas['id_form']=$id_form;

        $this->load->model('M_Main');
        $this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

        //----------------LBL 2----------------

        //----------------LBL 3----------------

        $table='consent';
        $fields=array();
        $datas=array();

        if($id_consent9=='')
        {
            $type='INSERT';
        }
        else
        {
            $type='UPDATE';
            $datas['id']=$id_consent9;
            $field_id='id_consent';
        }

        $fields[]='consent_name';
        $fields[]='sign';
        $fields[]='id_form';

        $datas['consent_name']=$consent_name9;
        $datas['sign']=$sign9;
        $datas['id_form']=$id_form;

        $this->load->model('M_Main');
        $this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

        //----------------LBL 3----------------

        print $id_employee;
    }

    function SaveOrientation()
    {
        $this->load->helper('General_Helper');
        $data['session']=GetSessionVars();

        $consent_name1=$this->input->post('consent_name1');
        $consent_name2=$this->input->post('consent_name2');

        $consent_name3=$this->input->post('rbt_name1');

        $sign1=$this->input->post('sign1');
        $sign2=$this->input->post('sign2');

        $sign3=$this->input->post('rbt1');

        $id_consent1=$this->input->post('id_consent1');
        $id_consent2=$this->input->post('id_consent2');

        $id_consent3=$this->input->post('id_consent_rbt1');

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
            if(array_key_exists('last_id', $result['data']))
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
        $this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

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
        $this->M_Main->Execute($type, $fields, $datas, $table, $field_id);//die();

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
        $this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

        //--------------CONSENT 3--------------

        //------------CHECKBOX 1-33------------

        for($i=1;$i<=33;$i++)
        {
            ${"consent_name$i"}=$this->input->post('cbx_name'.$i);
            ${"sign$i"}=$this->input->post('cbx'.$i);
            ${"id_consent$i"}=$this->input->post('id_consent_cbx'.$i);

            $table='consent';
            $fields=array();
            $datas=array();

            if(${"id_consent$i"}=='')
            {
                $type='INSERT';
            }
            else
            {
                $type='UPDATE';
                $datas['id']=${"id_consent$i"};
                $field_id='id_consent';
            }

            $fields[]='consent_name';
            $fields[]='sign';
            $fields[]='id_form';

            $datas['consent_name']=${"consent_name$i"};
            $datas['sign']=${"sign$i"};
            $datas['id_form']=$id_form;

            $this->load->model('M_Main');
            $this->M_Main->Execute($type, $fields, $datas, $table, $field_id);
        }

        //------------CHECKBOX 1-33------------

        print $id_employee;
    }

    function SaveTax()
    {
        $this->load->helper('General_Helper');
        $data['session']=GetSessionVars();

        $field_id='';

        $consent_name1=$this->input->post('consent_name1');
        $consent_name2=$this->input->post('consent_name2');
        $sign1=$this->input->post('sign1');
        $sign2=$this->input->post('sign2');
        $id_consent1=$this->input->post('id_consent1');
        $id_consent2=$this->input->post('id_consent2');

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
            if(array_key_exists('last_id', $result['data']))
            {
                $id_form=$result['data']['last_id'];
            }
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

        print $id_employee;
    }

    function GoUpdateEmployee()
    {
        if($this->session->userdata('logged_user_ehhs'))
        {
            $this->load->helper('General_Helper');
            $data['session'] = GetSessionVars();//die();
            $data['language'] = LoadLanguage();
            $data['profile_type'] = ProfileType($data['session']);

            $data['go_view'] = str_replace("-","/", $this->input->post('go_view'));
            $data['go_back'] = $this->input->post('go_back');

            $vars = explode("-", $this->input->post('id'));
            $data['id_user']=$vars[0];
            $data['id_person']=$vars[1];

            $this->load->model('M_User');
            $data['all_forms']=$this->M_User->GetAllFormsByPersonID($data['id_person']);
            $data['role']=$this->M_User->GetRoleByUserID($data['id_user']);

            if ($data['go_view'] != '')
                $this->load->view($data['go_view'], $data);
        }
        else
        {
            print 'NO_LOGGED';
        }
    }

    function ApproveRejectEmployee()
    {
        if($this->session->userdata('logged_user_ehhs'))
        {
            $this->load->model('M_Main');
            $i=0;
            foreach($_POST as $field_name => $value)
            {
                if($field_name!='table' && $field_name!='type' && $field_name!='field_id' && $field_name!='id') {
                    $fields[$i] = $field_name;
                    $value = $this->security->xss_clean($value);
                    $value = html_escape($value);
                    $datas[$field_name] = $value;

                    $i++;
                }
                elseif($field_name=='table')
                    $table=$value;
                elseif($field_name=='type')
                    $type=$value;
                elseif($field_name=='field_id')
                    $field_id=$value;
            }

            $data['ids'] = $this->input->post('id');
            $var = explode("-", $data['ids']);

            if(sizeof($var) != 0)
            {
                $cant=sizeof($var);

                for($i=0;$i<$cant; next($var), $i++)
                {
                    $datas['id'] = current($var);

                    if (isset($datas['id']))
                    {
                        $result=$this->M_Main->Execute($type, $fields, $datas, $table, $field_id);
                        if($result['error_msg']=='0' && $type=='INSERT')
                            print $result['data']['last_id'];
                        elseif($result['error_msg']=='0' && $type=='UPDATE')
                            print $datas['id'];
                        else
                            print $result['error_msg'];
                    }
                    else
                    {
                        print 'EMPTY_ID';
                    }
                }
            }
            else
            {
                print 'EMPTY_TABLE';
            }
        }
        else
        {
            print 'NO_LOGGED';
        }
    }
}