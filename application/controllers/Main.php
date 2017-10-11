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

        $data['id'] = '1';
        $data['user_name'] = 'rojeda';
        $data['bd_FirstName'] = 'Raydel';
        $data['bd_LastName'] = 'Ojeda';
        $data['email'] = 'W@w.w';

	    if($this->session->userdata('logged_user'))
        {
            $session_data = $this->session->userdata('logged_user');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['bd_FirstName'] = $session_data['bd_FirstName'];
            $data['bd_LastName'] = $session_data['bd_LastName'];
            $data['email'] = $session_data['email'];

            $this->load->view($view, $data);
        }
        else
        {
            $this->load->view($view, $data);//$data['error']='Your session is expired.';
            //$this->load->view('authentication/Login', $data);
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
            $data['bd_FirstName'] = $session_data['bd_FirstName'];
            $data['bd_LastName'] = $session_data['bd_LastName'];
            $data['email'] = $session_data['email'];

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
            $data['bd_FirstName'] = $session_data['bd_FirstName'];
            $data['bd_LastName'] = $session_data['bd_LastName'];
            $data['email'] = $session_data['email'];

            if($data_type=='tableCalendarAlerts')
            {}
            elseif($data_type=='appointment')
            {
                $result['id_service'] = $_POST['id_service'];
                $result['id_doctor'] = $_POST['id_doctor'];
                $result['start'] = $_POST['start'];
                $result['doctors']=$this->M_Main->GetDoctors($data);
            }
            elseif($data_type=='dataprofile')
            {
                $this->load->model('M_User');
                $result['user']=$this->M_User->GetProfileUser($data);

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