<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('M_Main');
        //$this->output->cache(5);
    }

    function index($view="Main", $msg="", $success="", $warning="", $error="")
	{
        $data['msg']=$msg;
        $data['success']=$success;
        $data['warning']=$warning;
        $data['error']=$error;
        $data['view']=$view;

	    if($this->session->userdata('logged_user_acs'))
        {
            $session_data = $this->session->userdata('logged_user_acs');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['bd_FirstName'] = $session_data['bd_FirstName'];
            $data['bd_LastName'] = $session_data['bd_LastName'];
            $data['email'] = $session_data['email'];
            $data['__zkp_Client_Rec'] = $session_data['__zkp_Client_Rec'];

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
        if($this->session->userdata('logged_user_acs')) {

            $this->session->unset_userdata('logged_user_acs');
        }

        redirect('Authentication');
    }

    function LlenarDataTable()
    {
        if($this->session->userdata('logged_user_acs'))
        {
            $session_data = $this->session->userdata('logged_user_acs');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['bd_FirstName'] = $session_data['bd_FirstName'];
            $data['bd_LastName'] = $session_data['bd_LastName'];
            $data['email'] = $session_data['email'];
            $data['__zkp_Client_Rec'] = $session_data['__zkp_Client_Rec'];

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
        if($this->session->userdata('logged_user_acs'))
        {
            $result='';
            $session_data = $this->session->userdata('logged_user_acs');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['bd_FirstName'] = $session_data['bd_FirstName'];
            $data['bd_LastName'] = $session_data['bd_LastName'];
            $data['email'] = $session_data['email'];
            $data['__zkp_Client_Rec'] = $session_data['__zkp_Client_Rec'];

            if($data_type=='tableCalendarAlerts')
            {}
            elseif($data_type=='appointment')
            {
                $id_service = $_POST['id_service'];
                $id_doctor = $_POST['id_doctor'];

                if(isset($_POST['start']))
                {
                    $date=date('m/d/y', strtotime($_POST['start']));
                    $time=substr($_POST['start'],16,8);
                    $this->load->model('M_Dashboard');
                    $result['app']=$this->M_Dashboard->GetAppointmentBy($id_service, $id_doctor, $date, $time);
                }

                $result['start'] = $_POST['start'];
                $result['end'] = $_POST['end'];
                $result['service']=$this->M_Main->GetServiceByID($id_service);
                $result['doctor']=$this->M_Main->GetDoctorByID($id_doctor);

            }
            elseif($data_type=='dataprofile')
            {
                $this->load->model('M_User');
                $result['user']=$this->M_User->GetProfileUser($data);
            }
            elseif($data_type=='dropdown_doctor')
            {
                $id_service = $_POST['id_service'];
                $this->load->model('M_Dashboard');
                $setting=$this->M_Dashboard->GetAppointmentSettings($id_service);

                if($setting['error']=='0')
                {
                    $result['doctor'] = $this->M_Main->GetDoctorsByService($id_service);
                }
            }
            elseif($data_type=='datatableListMyAppointment')
            {
                $id_patient = $data['__zkp_Client_Rec'];
                $this->load->model('M_Appointment');
                $result['my_appointments']=$this->M_Appointment->GetAppointmentByPatient($id_patient);
            }
            elseif($data_type=='NextMyAppointment')
            {
                $id_patient = $data['__zkp_Client_Rec'];
                $this->load->model('M_Appointment');
                $result['my_next_appointments']=$this->M_Appointment->GetNextAppointmentByPatient($id_patient);
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
        if($this->session->userdata('logged_user_acs'))
        {
            $session_data = $this->session->userdata('logged_user_acs');

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
        if($this->session->userdata('logged_user_acs'))
        {
            $i=0;
            foreach($_POST as $field_name => $value)
            {
                if($field_name!='layout' && $field_name!='type') {
                    $fields[$i] = $field_name;
                    $value = $this->security->xss_clean($value);
                    $value = html_escape($value);
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

    function SaveObjectWoutLogin()
    {
        $i=0;
        foreach($_POST as $field_name => $value)
        {
            if($field_name!='layout' && $field_name!='type') {
                $fields[$i] = $field_name;
                $value = $this->security->xss_clean($value);
                $value = html_escape($value);
                $datas[$field_name] = $value;
                $i++;
                //echo $field_name . "=" . $value;
                //eval($asignacion);
            }
            elseif($field_name=='layout')
                $layout=$value;
            elseif($field_name=='type')
                $type=$value;
        }
        $result=$this->M_Main->Execute($type, $fields, $datas, $layout);
        echo $result['error'];
    }

    function DeleteObject()
    {
        if($this->session->userdata('logged_user_acs'))
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

    function EnviarEmail()
    {
        $from_email=$_POST['from_email'];
        $from_name=$_POST['from_name'];
        $email_to=$_POST['email_to'];
        $reply_to_email=$_POST['reply_to_email'];
        $reply_to_name=$_POST['reply_to_name'];
        $subject=$_POST['subject'];
        $body=$_POST['body'];
        $attachment='';

        $this->load->library('MT_Mail');
        $obj_mail = new MT_Mail();

        $return=$obj_mail->EnviarEmail($from_email, $from_name, $email_to, $reply_to_email, $reply_to_name, $subject, $body, $attachment);

        echo $return;
    }
}

