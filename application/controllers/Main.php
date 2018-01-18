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
		
		$data['ctr']=$this->input->get('c');
		$data['func']=$this->input->get('f');
		$data['param1']=$this->input->get('p1');
		$data['param2']=$this->input->get('p2');
		$data['view_area']=$this->input->get('v');

        $this->load->helper('SessionVars_helper');
        $data=GetSessionVars();

        $this->load->library('MT_Language');
        $obj_lang = new MT_Language();
        $data['language']=$obj_lang->LoadLanguage();

		$this->load->view("Main", $data);
	}

    function LlenarDataTable()
    {
        if($this->session->userdata('logged_user_ehhs'))
        {
            $this->load->helper('SessionVars_helper');
            $data=GetSessionVars();

            $data_type = $_POST['data_type'];
            $view_url = $_POST['view_url'];

            $data['data'] = $this->GetData($data_type);

            $var = explode("|", $view_url);
            $cant=sizeof($var);

            if($cant!= 0)
            {
                for($i=0;$i<$cant; next($var), $i++)
                {
                    $view_url = current($var);//print $layout.' - ';die();
                    $this->load->view($view_url, $data);
                }
            }
        }
        else
        {
            print 1;
        }
    }

    function GetData($data_type='')
    {
        if($this->session->userdata('logged_user_ehhs'))
        {
            $result='';
            $this->load->helper('SessionVars_helper');
            $data=GetSessionVars();

            if($data_type==='appointment')
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

                $result['setting_id'] = $_POST['setting_id'];
                $result['ReminderEmail'] = $_POST['ReminderEmail'];
                $result['ReminderMsg'] = $_POST['ReminderMsg'];
                $result['ReminderContactBy'] = $_POST['ReminderContactBy'];

            }
            elseif($data_type==='dataprofile')
            {
                $this->load->model('M_User');
                $result['user']=$this->M_User->GetProfileUser($data);
            }
            elseif($data_type==='dropdown_doctor')
            {
                $id_service = $_POST['id_service'];
                if(isset($_POST['id_doctor']))$result['id_doctor'] = $_POST['id_doctor'];

                $this->load->model('M_Dashboard');
                //$setting=$this->M_Dashboard->GetAppointmentSettings($id_service);

                //if($setting['error']=='0')
                //{
                    //print 'errorrrrrr: '.$setting['error'];
                    $result['doctor'] = $this->M_Main->GetDoctorsByService($id_service);
                //}
            }
            elseif($data_type==='datatableListMyAppointment')
            {
                $id_patient = $data['__zkp_Client_Rec'];
                $this->load->model('M_Appointment');
                $result['my_appointments']=$this->M_Appointment->GetAllAppointmentByPatient($id_patient);
            }
            elseif($data_type==='MyAppointments')
            {
                $id_patient = $data['__zkp_Client_Rec'];
                $this->load->model('M_Appointment');
                $result['my_all_appointments']=$this->M_Appointment->GetNextAppointmentByPatient($id_patient);
                $this->load->model('M_User');
                $result['rewards']=$this->M_User->GetRewards($data);//var_dump($data);
            }elseif($data_type==='dataPersonalInfo')
            {
                $this->load->model('M_User');
                $result['user']=$this->M_User->GetPersonalInfo($data);
            }
            elseif($data_type==='dataPersonalInfo')
            {
                $this->load->model('M_User');
                $result['user']=$this->M_User->GetPersonalInfo($data);
            }
            elseif($data_type==='datatableListMyInvoice')
            {
                $id_patient = $data['__zkp_Client_Rec'];
                $this->load->model('M_Invoice');
                $result['my_invoices'] = $this->M_Invoice->GetMyInvoices($id_patient);//var_dump($result);
            }

            return $result;
        }
        else
        {
            print 1;
        }
    }

    function GoObject()
    {
        $data['ctr']=$this->input->get('c');
        $data['func']=$this->input->get('f');
        $data['param1']=$this->input->get('p1');
		$data['view_area']=$this->input->get('v');
		
		$this->load->view("Main", $data);
    }

    function GoView($view='')
    {
		if($view!='')$this->load->view($view);
    }

    function SaveObject()
    {
        if($this->session->userdata('logged_user_ehhs'))
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
            //print $layout;die();

            $result=$this->M_Main->Execute($type, $fields, $datas, $layout);

            if($result['error']=='0' && $type=='INSERT')
                print $result['data']['recordId'];
            else
                print $result['error'];
        }
        else
        {
            print 1;
        }
    }

    function SaveObjectWoutLogged()
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
                //print $field_name . "=" . $value;
                //eval($asignacion);
            }
            elseif($field_name=='layout')
                $layout=$value;
            elseif($field_name=='type')
                $type=$value;
        }
        $result=$this->M_Main->Execute($type, $fields, $datas, $layout);
        print $result['error'];
    }

    function DeleteObject()
    {
        if($this->session->userdata('logged_user_ehhs'))
        {
            $layouts = $this->input->post('go_layout');
            $data['ids'] = $this->input->post('id');

            //print 'lays: '.$layouts.' ids: '.$data['ids'].' ctr_function: '.$ctr_function;die();

            $var = explode("-", $layouts);

            if(sizeof($var) != 0)
            {
                $cant=sizeof($var);

                for($i=0;$i<$cant; next($var), $i++)
                {
                    $layout = current($var);//print $layout.' - ';die();

                    if (isset($data['ids']))
                    {

                        $result=$this->M_Main->Execute('DELETE', '', $data, $layout);
                        print $result['error'];
                    }
                    else
                    {
                        print '01';
                        //$this->index($ctr_function, '','', 'You have to delete something. The ID is empty.');
                    }
                }
            }
            else
            {
                print '02';
                //$this->index($ctr_function, '','', 'You have to delete something. The Layout is empty.');
            }
        }
        else
        {
            print 1;
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
        $attachments=$_POST['attachments'];

        $this->load->library('MT_Mail');
        $obj_mail = new MT_Mail();

        $return=$obj_mail->EnviarEmail($from_email, $from_name, $email_to, $reply_to_email, $reply_to_name, $subject, $body, $attachments);

        print $return;
    }

    function Reminder($id_app='')
    {
        if($id_app)
        {
            $this->load->model('M_Appointment');
            $result['appointment'] = $this->M_Appointment->GetAppointmentByRecordID($id_app);

            $email = $result['appointment']['data'][0]['bd_user_email'];

            $from_email = EMAIL_FROM;//print EMAIL_FROM;
            $from_name = EMAIL_FROM_NAME;
            $email_to = $email;
            $reply_to_email = '';
            $reply_to_name = '';
            $subject = "Appointment Reminder";
            $attachments = './assets/images/logo.png';
            $link_web = '351face.com';
            $body = '<html><head><title>Appointment Reminder</title>'.EMAIL_STYLE.'</head><body>'.
                '<h1>This an Appointment Reminder</h1>' .
                '<p>Dear <b>' . $result['appointment']['data'][0]['bd_FirstName'] . ' ' . $result['appointment']['data'][0]['bd_LastName'] . '</b>,</p>' .
                '<p>You have an appointment at the <a href="' . $link_web . '">Advanced Cosmetic Surgery & Laser Center.</a></p>' .
                '<br>' .
                '<p><b>Date: </b>' . $result['appointment']['data'][0]['APT_Date'] . '</p>' .
                '<p><b>Time: </b>' . $result['appointment']['data'][0]['APT_Time'] . '</p>' .
                '<p><b>Provider: </b>' . $result['appointment']['data'][0]['FirstName'] . ' ' . $result['appointment']['data'][0]['LastName'] . '</p>' .
                '<p><b>Service: </b>' . $result['appointment']['data'][0]['Service'] . '</p>' .
                '<br>' .
                '<p><b>Personalized message: </b>' . $result['appointment']['data'][0]['ReminderMsg'] . '</p>' .
                '<br>' .
                '<p><b>Please arrive 15 minutes prior to your scheduled appointment time at the address listed below.</b></p>' .
                '<br>' .
                EMAIL_SIGNATURE.'</body></html>';

            $this->load->library('MT_Mail');
            $obj_mail = new MT_Mail();

            $obj_mail->EnviarEmail($from_email, $from_name, $email_to, $reply_to_email, $reply_to_name, $subject, $body, $attachments);
        }
    }

    function SwitchLanguage($language='')
    {
        if($language=='')$language=$this->input->post('language');

        $session_lang = array('lang' => $language);
        $this->session->set_userdata('language', $session_lang);

        $this->load->library('MT_Language');
        $obj_lang = new MT_Language();
        $obj_lang->LoadLanguage();
    }

    function RebuildHeader()
    {
        $this->load->helper('SessionVars_helper');
        $data=GetSessionVars();

        $this->load->view('includes/top_bar', $data);
        $this->load->view('includes/nav_bar', $data);
    }
}

