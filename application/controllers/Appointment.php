<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appointment extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
    }

    function index($view="appointment/ListMyAppointment", $msg="", $success="", $warning="", $error="")
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
            print 1;
        }
    }

    function History($view="appointment/ListMyHistory", $msg="", $success="", $warning="", $error="")
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

            $id_patient = $data['__zkp_Client_Rec'];
            $this->load->model('M_Appointment');
            $data['data']['my_appointments']=$this->M_Appointment->GetAllAppointmentByPatient($id_patient);

            $this->load->view($view, $data);
        }
        else
        {
            print 1;
        }
    }

    function CancelAppointment()
    {
        if(isset($_POST['id']))
        {
            //print 'iwygefiywe '.$_POST['id'];
            $fm = new Fmp();
            $command = $fm->newPerformScriptCommand('PHP_Appointment', 'SettingsServiceProviderCancelAppt', ''.$_POST['id'].'');
            $command->execute();
        }
    }

    function PrintAppointment($recordID="")
    {

        if($this->session->userdata('logged_user_acs') && $recordID!='')
        {
            $session_data = $this->session->userdata('logged_user_acs');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['bd_FirstName'] = $session_data['bd_FirstName'];
            $data['bd_LastName'] = $session_data['bd_LastName'];
            $data['email'] = $session_data['email'];
            $data['__zkp_Client_Rec'] = $session_data['__zkp_Client_Rec'];

            $this->load->model('M_Appointment');
            $data['data']['my_next_appointments']=$this->M_Appointment->GetNextAppointmentByRecordID($recordID);

            $this->load->view('appointment/PrintAppointment', $data);
        }
        else
        {
            print 1;
        }
    }

    function GetMyNextAppointments()
    {
        $session_data = $this->session->userdata('logged_user_acs');
        $__zkp_Client_Rec = $session_data['__zkp_Client_Rec'];

        $events[] = '[]';
        $error='';
        date_default_timezone_set('America/New_York');
        $all_appointments = $this->M_Dashboard->GetAppointment(date("m/d/Y"), $id_doctor);

        $color_not_available = '#ffff66';
        $text_color_not_available = '#000';

        $app_today = 0;
        $appointment['data']='';

        if (isset($all_appointments['data'][0]['APT_Date']))
        {
            for ($app = 0; $app < sizeof($all_appointments['data']); $app++)
            {
                if (isset($all_appointments['data'][$app]['APT_Date']))
                {
                    if (date("m/d/Y", strtotime($day)) == $all_appointments['data'][$app]['APT_Date'] && $all_appointments['data'][$app]['APT_Time'] >= $hr_start && $all_appointments['data'][$app]['APT_TimeEnd'] <= $hr_end)
                    {
                        $appointment['data'][$app_today] = $all_appointments['data'][$app];
                        $app_today++;
                    }
                }
            }
        } else
        {
            $appointment['data'][$app_today] = '';
        }
        //var_dump($appointment);

        if (isset($appointment['data'][0]['APT_Date']))//search if exist an appointment in this date and time
        {

            for ($a = 0; $a < sizeof($appointment['data']); $a++)
            {
                $real_appointment_title = $appointment['data'][$a]['APT_Title'];
                //$real_appointment_title = $title_not_available;
                $real_appointment_start = date("Y-m-d", strtotime($appointment['data'][$a]['APT_Date'])) . ' ' . $appointment['data'][$a]['APT_Time'];
                $real_appointment_end = date("Y-m-d", strtotime($appointment['data'][$a]['APT_Date'])) . ' ' . $appointment['data'][$a]['APT_TimeEnd'];

                $client_rec = $appointment['data'][$a]['_zfk_ClientRec'];
                $TokenConfirmApp = $appointment['data'][$a]['TokenConfirmApp'];


                $event_start = $real_appointment_start;
                $event_end = $real_appointment_end;

                $event['id'] = rand(1,999999999999999);
                $event['title'] = $real_appointment_title;
                $event['start'] = $event_start;
                $event['end'] = $event_end;
                $event['color'] = $color_not_available;
                $event['textColor'] = $text_color_not_available;
                if($TokenConfirmApp!='')
                    $event['confirm'] = 'text-danger';
                else
                    $event['confirm'] = 'text-success';
                if($client_rec==$__zkp_Client_Rec)
                    $events[] = $event;


                //--------------------------events unavailables--------------------------
            }
        }





        if($error=='')
        {
            $data['events'] = json_encode($events);//print $data['events'];//die();
            $this->load->view('dashboard/CalendarAppointment', $data);
        }
        else
            print $error;
    }//not used
}