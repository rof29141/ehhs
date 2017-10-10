<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('M_Main');
    }

    function index($view="Main", $msg="", $success="", $warning="", $error="")
	{
        $data['msg']=$msg;
        $data['success']=$success;
        $data['warning']=$warning;
        $data['error']=$error;
        $data['view']=$view;

	    if($this->session->userdata('logged_user'))
        {
            $session_data = $this->session->userdata('logged_user');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['full_name'] = $session_data['full_name'];
            $data['title'] = $session_data['title'];
            $data['client_number'] = $session_data['client_number'];
            $data['email'] = $session_data['email'];
            $data['id_company'] = $session_data['id_company'];
            $data['company_name'] = $session_data['company_name'];
            $data['company_web'] = $session_data['company_web'];
            $data['id_privileges'] = $session_data['id_privileges'];
            $data['menu'] = $session_data['menu'];
            $data['BEACONAccess'] = $session_data['BEACONAccess'];

            $this->load->view($view, $data);
        }
        else
        {
            $data['error']='Your session is expired.';
            $this->load->view('authentication/Login', $data);
        }
	}

    function Logout()
    {
        if($this->session->userdata('logged_user')) {

            $this->session->unset_userdata('logged_user');
        }

        redirect('Authentication');
    }

    function LlenarDataTable()
    {
        if($this->session->userdata('logged_user'))
        {
            $session_data = $this->session->userdata('logged_user');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['full_name'] = $session_data['full_name'];
            $data['title'] = $session_data['title'];
            $data['client_number'] = $session_data['client_number'];
            $data['email'] = $session_data['email'];
            $data['id_company'] = $session_data['id_company'];
            $data['company_name'] = $session_data['company_name'];
            $data['company_web'] = $session_data['company_web'];
            $data['id_privileges'] = $session_data['id_privileges'];
            $data['menu'] = $session_data['menu'];

            $data_type = $_POST['data_type'];
            $view_url = $_POST['view_url'];

            $data['data'] = $this->GetData($data_type);

            $this->load->view($view_url, $data);
        }
        else
        {
            echo 1;
        }
    }

    function GetData($data_type='')
    {
        if($this->session->userdata('logged_user'))
        {
            $result='';
            $session_data = $this->session->userdata('logged_user');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['full_name'] = $session_data['full_name'];
            $data['title'] = $session_data['title'];
            $data['client_number'] = $session_data['client_number'];
            $data['email'] = $session_data['email'];
            $data['id_company'] = $session_data['id_company'];
            $data['company_name'] = $session_data['company_name'];
            $data['company_web'] = $session_data['company_web'];
            $data['id_privileges'] = $session_data['id_privileges'];
            $data['menu'] = $session_data['menu'];

            if($data_type=='tableLitigationAlerts')
            {}
            elseif($data_type=='tableComplianceAlerts')
            {}
            elseif($data_type=='tableCalendarAlerts')
            {}
            elseif($data_type=='tableBillingAlerts')
            {}
            elseif($data_type=='tableTrademarkAlerts')
            {}
            elseif($data_type=='tableLitigationVolume')
            {}
            elseif($data_type=='dropdowncompanyrecords')
            {}
            elseif($data_type=='datatablecompanyrecords')
            {
                $this->load->model('M_CompanyRecords');
                $result['company_records']=$this->M_CompanyRecords->GetListMyCompanyRecords($data);
            }
            elseif($data_type=='dataUpdateCompanyRecords')
            {
                $this->load->model('M_CompanyRecords');
                $data['id'] = $_POST['id'];
                $result['company_records']=$this->M_CompanyRecords->GetUpdateCompanyRecords($data);
                $result['filing_type']=$this->M_Main->GetVLFilingType();
                $result['country']=$this->M_Main->GetCountry();
                $result['state']=$this->M_Main->GetState();
                $result['entity_type']=$this->M_Main->GetEntityType();
                $result['status']=$this->M_Main->GetVLStatus();
            }
            elseif($data_type=='detailcompanyrecords')
            {
                //$this->load->model('M_CompanyRecords');
                $result['id'] = $_POST['id'];//echo 'primera: '.$result['id'];
                //$result['company_records']=$this->M_CompanyRecords->GetListMyCompanyRecordsUnit($data);
            }
            elseif($data_type=='datatablecompanyrecordsUnit')
            {
                $this->load->model('M_CompanyRecords');
                $data['id'] = $_POST['id'];//echo 'segunda: '.$result['id'];
                $result['company_records']=$this->M_CompanyRecords->GetListMyCompanyRecordsUnit($data);
            }
            elseif($data_type=='dataUpdateCompanyRecordsUnit')
            {
                $this->load->model('M_CompanyRecords');
                $data['id'] = $_POST['id'];
                $result['company_records']=$this->M_CompanyRecords->GetUpdateCompanyRecordsUnit($data);
                $result['filing_type']=$this->M_Main->GetVLFilingType();
                $result['country']=$this->M_Main->GetCountry();
                $result['state']=$this->M_Main->GetState();
                $result['entity_type']=$this->M_Main->GetEntityType();
                $result['status']=$this->M_Main->GetVLStatus();
            }
            elseif($data_type=='dataAddCompanyRecordsUnit')
            {
                $this->load->model('M_CompanyRecords');
                $data['id'] = $_POST['id'];
                $result['company_records']=$this->M_CompanyRecords->GetUpdateCompanyRecords($data);
                $result['filing_type']=$this->M_Main->GetVLFilingType();
                $result['country']=$this->M_Main->GetCountry();
                $result['state']=$this->M_Main->GetState();
                $result['entity_type']=$this->M_Main->GetEntityType();
                $result['status']=$this->M_Main->GetVLStatus();
            }
            elseif($data_type=='dataprofile')
            {
                $this->load->model('M_User');
                $result['user']=$this->M_User->GetProfileUser($data);
                $result['vl']=$this->M_Main->GetVLSecQuestion();
            }
            elseif($data_type=='datatableListUser')
            {
                $this->load->model('M_User');
                $result['user']=$this->M_User->GetListUser($data);
            }
            elseif($data_type=='dataUpdateUser')
            {
                $this->load->model('M_User');
                $data['id'] = $_POST['id'];
                $result['user']=$this->M_User->GetUpdateUser($data);
                $result['vl']=$this->M_Main->GetVLSecQuestion();
            }
            elseif($data_type=='dataAddUser')
            {
                $result['id_company'] = $_POST['id_company'];
                $result['company_name'] = $_POST['company_name'];
                $result['vl']=$this->M_Main->GetVLSecQuestion();
            }
            elseif($data_type=='detailDataTableUser')
            {
                $this->load->model('M_User');
                $data['id'] = $_POST['id'];
                $result['user']=$this->M_User->GetUpdateUser($data);
                $result['vl']=$this->M_Main->GetVLSecQuestion();
            }

            return $result;
        }
        else
        {
            echo 1;
        }
    }

    function GoObject()
    {
        if($this->session->userdata('logged_user'))
        {
            $session_data = $this->session->userdata('logged_user');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['full_name'] = $session_data['full_name'];
            $data['title'] = $session_data['title'];
            $data['client_number'] = $session_data['client_number'];
            $data['email'] = $session_data['email'];
            $data['id_company'] = $session_data['id_company'];
            $data['company_name'] = $session_data['company_name'];
            $data['company_web'] = $session_data['company_web'];
            $data['id_privileges'] = $session_data['id_privileges'];
            $data['menu'] = $session_data['menu'];

            $data['go_view'] = $this->input->post('go_view');
            $data['go_back'] = $this->input->post('go_back');
            $data['id'] = $this->input->post('id');
            //echo $data['go_ahead'];die();
            $this->load->view($data['go_view'], $data);
        }
    }

    function SaveObject()
    {
        if($this->session->userdata('logged_user'))
        {
            $i=0;
            foreach($_POST as $field_name => $value)
            {
                if($field_name!='layout' && $field_name!='type') {
                    $fields[$i] = $field_name;
                    $datas[$field_name] = $value;
                    $i++;
                    //$asignacion = "\$" . $field_name . "='" . $value . "';";
                    //eval($asignacion);
                }
                elseif($field_name=='layout')
                    $layout=$value;
                elseif($field_name=='type')
                    $type=$value;
            }
            //echo $layout;die();

            $result=$this->M_Main->Execute($type, $fields, $datas, $layout);
            echo $result['error'];
        }
        else
        {
            echo 1;
        }
    }

    function DeleteObject()
    {
        if($this->session->userdata('logged_user'))
        {
            $layouts = $this->input->post('go_layout');
            $data['ids'] = $this->input->post('id');

            //echo 'lays: '.$layouts.' ids: '.$data['ids'].' ctr_function: '.$ctr_function;die();

            $var = explode("-", $layouts);

            if(count($var) != 0)
            {
                for ($i = 0; $i < count($var); next($var), $i++)
                {
                    $layout = current($var);//print $layout.' - ';die();

                    if (isset($data['ids']))
                    {

                        $result=$this->M_Main->Execute('D', '', $data, $layout);
                        echo $result['error'];
                    }
                    else
                    {
                        echo '01';
                        //$this->index($ctr_function, '','', 'You have to delete something. The ID is empty.');
                    }
                }
            }
            else
            {
                echo '02';
                //$this->index($ctr_function, '','', 'You have to delete something. The Layout is empty.');
            }
        }
        else
        {
            echo 1;
        }
    }
}