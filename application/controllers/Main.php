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

        $this->load->helper('General_Helper');
        $data['session']=GetSessionVars();
        $data['language']=LoadLanguage();
        $data['profile_type']=ProfileType($data['session']);

		$this->load->view("Main", $data);
	}

    function LlenarDataTable()
    {
        if($this->session->userdata('logged_user_ehhs'))
        {
            $this->load->helper('General_Helper');
            $data['session']=GetSessionVars();
            $data['language']=LoadLanguage();
            $data['profile_type']=ProfileType($data['session']);

            $data_type = $_POST['data_type'];
            $view_url = $_POST['view_url'];

            $data['data'] = $this->GetData($data_type);

            $var = explode("|", $view_url);
            $cant=sizeof($var);

            if($cant!= 0)
            {
                for($i=0;$i<$cant; next($var), $i++)
                {
                    $view_url = current($var);//print $table.' - ';die();
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
			date_default_timezone_set('America/New_York');

            $this->load->helper('General_Helper');
            $data['session']=GetSessionVars();
            $data['language']=LoadLanguage();
            $data['profile_type']=ProfileType($data['session']);

            if($data_type==='data_account')
            {
                $id_user=$this->input->post('id_user');

                if($id_user=='')
                    $id_user=$data['session']['id_user'];

                $this->load->model('M_User');
                $result['user']=$this->M_User->GetAccountUserByUserID($id_user);
            }
            elseif($data_type==='data_profile')
            {
                $result['id_user']=$this->input->post('id_user');

                if($result['id_user']=='')
                    $result['id_user']=$data['session']['id_user'];

                $this->load->model('M_User');
                $result['role']=$this->M_User->GetRoleByUserID($result['id_user']);
                $result['profile']=$this->M_User->GetProfileUserByUserID($result['id_user']);
            }
			elseif($data_type==='data_employment')
            {
                $result['id_person']=$this->input->post('id_person');

                if($result['id_person']=='')
                    $result['id_person']=$data['session']['id_person'];//echo $data['session']['id_person'];die();

                $this->load->model('M_User');
                $result['role']=$this->M_User->GetRoleByPersonID($result['id_person']);
                $result['employee']=$this->M_User->GetEmployeeByPersonID($result['id_person']);
                $result['form']=$this->M_User->GetFormByPersonID($result['id_person'], 'employment');
                $result['consent']=$this->M_User->GetConsentByPersonID($result['id_person'], 'employment');//var_dump($result['consent']);die();
                $result['completed_percent']=$this->M_Main->GetCompletedPercentByPersonID($result['id_person']);//var_dump($result['consent']);die();
            }
            elseif($data_type==='data_probation')
            {
				$this->load->model('M_User');
				$result['id_employee']=$this->input->post('id_employee');
                $result['role']=$this->M_User->GetRoleByEmployeeID($result['id_employee']);
                $result['form']=$this->M_User->GetFormByEmployeeID($result['id_employee'], 'probation');
                $result['consent']=$this->M_User->GetConsentByEmployeeID($result['id_employee'], 'probation');//var_dump($result['consent']);die();
				$result['completed_percent']=$this->M_Main->GetCompletedPercentByEmployeeID($result['id_employee']);
                $result['business_date']=$this->GetBusinessDate(date('m/d/Y'), 5);
            }
			elseif($data_type==='data_statement')
            {
                $this->load->model('M_User');
                $result['id_employee']=$this->input->post('id_employee');
                $result['role']=$this->M_User->GetRoleByEmployeeID($result['id_employee']);
                $result['form']=$this->M_User->GetFormByEmployeeID($result['id_employee'], 'statement');
                $result['consent']=$this->M_User->GetConsentByEmployeeID($result['id_employee'], 'statement');//var_dump($result['consent']);die();
                $result['completed_percent']=$this->M_Main->GetCompletedPercentByEmployeeID($result['id_employee']);
            }
            elseif($data_type==='data_equipment')
            {
                $this->load->model('M_User');
                $result['id_employee']=$this->input->post('id_employee');
                $result['role']=$this->M_User->GetRoleByEmployeeID($result['id_employee']);
                $result['form']=$this->M_User->GetFormByEmployeeID($result['id_employee'], 'equipment');
                $result['consent']=$this->M_User->GetConsentByEmployeeID($result['id_employee'], 'equipment');//var_dump($result['consent']);die();
                $result['completed_percent']=$this->M_Main->GetCompletedPercentByEmployeeID($result['id_employee']);
            }
			elseif($data_type==='data_medical')
            {
                $this->load->model('M_User');
                $result['id_employee']=$this->input->post('id_employee');
                $result['role']=$this->M_User->GetRoleByEmployeeID($result['id_employee']);
                $result['form']=$this->M_User->GetFormByEmployeeID($result['id_employee'], 'medical');
                $result['consent']=$this->M_User->GetConsentByEmployeeID($result['id_employee'], 'medical');//var_dump($result['consent']);die();
                $result['completed_percent']=$this->M_Main->GetCompletedPercentByEmployeeID($result['id_employee']);
            }
			elseif($data_type==='data_orientation')
            {
                $this->load->model('M_User');
                $result['id_employee']=$this->input->post('id_employee');
                $result['role']=$this->M_User->GetRoleByEmployeeID($result['id_employee']);
                $result['form']=$this->M_User->GetFormByEmployeeID($result['id_employee'], 'orientation');
                $result['consent']=$this->M_User->GetConsentByEmployeeID($result['id_employee'], 'orientation');//var_dump($result['consent']);die();
                $result['completed_percent']=$this->M_Main->GetCompletedPercentByEmployeeID($result['id_employee']);
            }
            elseif($data_type==='data_tax')
            {
                $this->load->model('M_User');
                $result['id_employee']=$this->input->post('id_employee');
                $result['role']=$this->M_User->GetRoleByEmployeeID($result['id_employee']);
                $result['form']=$this->M_User->GetFormByEmployeeID($result['id_employee'], 'tax');
                $result['consent']=$this->M_User->GetConsentByEmployeeID($result['id_employee'], 'tax');//var_dump($result['consent']);die();
                $result['completed_percent']=$this->M_Main->GetCompletedPercentByEmployeeID($result['id_employee']);
            }
            elseif($data_type==='data_inservice')
            {
                $this->load->model('M_User');
                $result['id_employee']=$this->input->post('id_employee');
                $result['role']=$this->M_User->GetRoleByEmployeeID($result['id_employee']);
                $result['form']=$this->M_User->GetFormByEmployeeID($result['id_employee'], 'inservice');
                $result['consent']=$this->M_User->GetConsentByEmployeeID($result['id_employee'], 'inservice');//var_dump($result['consent']);die();
                $result['completed_percent']=$this->M_Main->GetCompletedPercentByEmployeeID($result['id_employee']);
            }
            elseif($data_type==='data_over')
            {
                $this->load->model('M_User');
                $result['id_employee']=$this->input->post('id_employee');
                $result['role']=$this->M_User->GetRoleByEmployeeID($result['id_employee']);
                $result['form']=$this->M_User->GetFormByEmployeeID($result['id_employee'], 'over');
                $result['consent']=$this->M_User->GetConsentByEmployeeID($result['id_employee'], 'over');//var_dump($result['consent']);die();
                $result['completed_percent']=$this->M_Main->GetCompletedPercentByEmployeeID($result['id_employee']);
            }
            elseif($data_type==='data_emergency')
            {
                $this->load->model('M_User');
                $result['id_employee']=$this->input->post('id_employee');
                $result['role']=$this->M_User->GetRoleByEmployeeID($result['id_employee']);
                $result['form']=$this->M_User->GetFormByEmployeeID($result['id_employee'], 'emergency');
                $result['consent']=$this->M_User->GetConsentByEmployeeID($result['id_employee'], 'emergency');//var_dump($result['consent']);die();
                $result['completed_percent']=$this->M_Main->GetCompletedPercentByEmployeeID($result['id_employee']);
            }
            elseif($data_type==='data_i9')
            {
                $this->load->model('M_User');
                $result['id_employee']=$this->input->post('id_employee');
                $result['role']=$this->M_User->GetRoleByEmployeeID($result['id_employee']);
                $result['form']=$this->M_User->GetFormByEmployeeID($result['id_employee'], 'emergency');
                $result['consent']=$this->M_User->GetConsentByEmployeeID($result['id_employee'], 'emergency');//var_dump($result['consent']);die();
                $result['completed_percent']=$this->M_Main->GetCompletedPercentByEmployeeID($result['id_employee']);
            }
            elseif($data_type==='data_w9')
            {
                $this->load->model('M_User');
                $result['id_employee']=$this->input->post('id_employee');
                $result['role']=$this->M_User->GetRoleByEmployeeID($result['id_employee']);
                $result['form']=$this->M_User->GetFormByEmployeeID($result['id_employee'], 'emergency');
                $result['consent']=$this->M_User->GetConsentByEmployeeID($result['id_employee'], 'emergency');//var_dump($result['consent']);die();
                $result['completed_percent']=$this->M_Main->GetCompletedPercentByEmployeeID($result['id_employee']);
            }

            elseif($data_type==='data_list_employee')
            {
                $this->load->model('M_Employee');
                $result['employee']=$this->M_Employee->GetAllWorkers();
            }
            elseif($data_type==='data_list_client')
            {
                $this->load->model('M_Client');
                $result['client']=$this->M_Client->GetAllClients();
            }
            elseif($data_type==='data_client_preference')
            {
                $result['id_person']=$this->input->post('id_person');

                if($result['id_person']=='')
                    $result['id_person']=$data['session']['id_person'];

                $this->load->model('M_Employee');
                $result['prefered']=$this->M_Client->GetPreferedEmployeeByPersonID($result['id_person']);
                $result['employee']=$this->M_Employee->GetAllWorkers();
            }

            return $result;
        }
        else
        {
            print 1;
        }
    }
	
	function GetBusinessDate($startdate, $numberofdays)
	{
		//$_POST['startdate'] = '2012-08-14';
		//$_POST['numberofdays'] = 10;

		$d = new DateTime( $startdate );
		$t = $d->getTimestamp();

		// loop for X days
		for($i=0; $i<$numberofdays; $i++){

			// add 1 day to timestamp
			$addDay = 86400;

			// get what day it is next day
			$nextDay = date('w', ($t+$addDay));

			// if it's Saturday or Sunday get $i-1
			if($nextDay == 0 || $nextDay == 6) {
				$i--;
			}

			// modify timestamp, add 1 day
			$t = $t+$addDay;
		}

		$d->setTimestamp($t);

		return $d->format( 'm/d/Y' );
	}

    function GoView($view='', $msg="", $success="", $warning="", $error="")
    {
        $data['msg']=$msg;
        $data['success']=$success;
        $data['warning']=$warning;
        $data['error']=$error;
        $data['view']=str_replace("-","/",$view);

        if($this->session->userdata('logged_user_ehhs'))
        {
            $this->load->helper('General_Helper');
            $data['session'] = GetSessionVars();//die();
            $data['language'] = LoadLanguage();
            $data['profile_type'] = ProfileType($data['session']);

            if ($data['view'] != '')
                $this->load->view($data['view']);
        }
        else
        {
            print 'NO_LOGGED';
        }
    }

    function GoObject()
    {
        if($this->session->userdata('logged_user_ehhs'))
        {
            $this->load->helper('General_Helper');
            $data['session'] = GetSessionVars();//die();
            $data['language'] = LoadLanguage();
            $data['profile_type'] = ProfileType($data['session']);

            $data['go_view'] = str_replace("-","/", $this->input->post('go_view'));
            $data['go_back'] = $this->input->post('go_back');
            $data['id'] = $this->input->post('id');

            if ($data['go_view'] != '')
                $this->load->view($data['go_view'], $data);
        }
        else
        {
            print 'NO_LOGGED';
        }
    }

    function GoObject1111111()
    {
        $data['ctr']=$this->input->get('c');
        $data['func']=$this->input->get('f');
        $data['param1']=$this->input->get('p1');
        $data['view_area']=$this->input->get('v');

        $this->load->view("Main", $data);
    }

    function SaveObject()
    {
        if($this->session->userdata('logged_user_ehhs'))
        {
            $i=0;
            foreach($_POST as $field_name => $value)
            {
                if($field_name!='table' && $field_name!='type') {
                    $fields[$i] = $field_name;
                    $value = $this->security->xss_clean($value);
                    $value = html_escape($value);
                    $datas[$field_name] = $value;

                    $i++;
                    //$asignacion = "\$" . $field_name . "='" . $value . "';";
                    //eval($asignacion);
                }
                elseif($field_name=='table')
                    $table=$value;
                elseif($field_name=='type')
                    $type=$value;
            }
            //print $table;die();

            $result=$this->M_Main->Execute($type, $fields, $datas, $table);

            if($result['error_msg']=='0' && $type=='INSERT')
                print $result['data']['recordId'];
            else
                print $result['error_msg'];
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
            if($field_name!='table' && $field_name!='type') {
                $fields[$i] = $field_name;
                $value = $this->security->xss_clean($value);
                $value = html_escape($value);
                $datas[$field_name] = $value;
                $i++;
                //print $field_name . "=" . $value;
                //eval($asignacion);
            }
            elseif($field_name=='table')
                $table=$value;
            elseif($field_name=='type')
                $type=$value;
        }
        $result=$this->M_Main->Execute($type, $fields, $datas, $table);
        print $result['error_msg'];
    }

    function DeleteObject()
    {
        if($this->session->userdata('logged_user_ehhs'))
        {
            $tables = $this->input->post('go_table');
            $data['ids'] = $this->input->post('id');

            //print 'lays: '.$tables.' ids: '.$data['ids'].' ctr_function: '.$ctr_function;die();

            $var = explode("-", $tables);

            if(sizeof($var) != 0)
            {
                $cant=sizeof($var);

                for($i=0;$i<$cant; next($var), $i++)
                {
                    $table = current($var);//print $table.' - ';die();

                    if (isset($data['ids']))
                    {

                        $result=$this->M_Main->Execute('DELETE', '', $data, $table);
                        print $result['error_msg'];
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
                //$this->index($ctr_function, '','', 'You have to delete something. The table is empty.');
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

        $this->load->helper('General_Helper');
        LoadLanguage();
    }

    function RebuildHeader()
    {
        $this->load->helper('General_Helper');
        $data['session']=GetSessionVars();
        $data['language']=LoadLanguage();
        $data['profile_type']=ProfileType($data['session']);

        $this->load->view('includes/top_bar', $data);
        $this->load->view('includes/nav_bar', $data);
    }
}

