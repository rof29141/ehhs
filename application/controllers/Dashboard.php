<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('M_Dashboard');
    }

    public function index($view="dashboard/Dashboard", $msg="", $success="", $warning="", $error="")
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
            $data['bd_FirstName'] = $session_data['bd_FirstName'];
            $data['bd_LastName'] = $session_data['bd_LastName'];
            $data['email'] = $session_data['email'];
            $data['__zkp_Client_Rec'] = $session_data['__zkp_Client_Rec'];

            $this->load->model('M_Main');
            $data['service']=$this->M_Main->GetServices();

            $this->load->view($view, $data);
        }
        else
        {
            echo 1;
        }
    }

    function GiveDate($fecha,$dia)
    {
        list($year,$mon,$day) = explode('-',$fecha);
        return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));
    }

    function GetAppointments()
    {
        $id_service = $_POST['id_service'];
        $id_doctor = $_POST['id_doctor'];//echo $id_service.' - '.$id_doctor;

        $setting=$this->M_Dashboard->GetAppointmentSettings($id_service);

        if($setting['error']=='0')
        {
            date_default_timezone_set('America/New_York');
            $weeks = $setting['data'][0]['QtyWeeksRepeat'];//qty of week is posible to make an appointment
            $unit_time = $setting['data'][0]['UnitTime'];//qty of units of 15 minutes
            $hr_start = $setting['data'][0]['HrStart'];//start time, always should be 1 minute less
            $hr_end_day = $setting['data'][0]['HrEnd'];//end time
            $app_days = $setting['data'][0]['AppDays'];//days of the appointment

            $var = explode(",", $app_days);

            if (count($var) != 0) {
                for ($i = 0; $i < count($var); next($var), $i++) {
                    $app_day = current($var);

                    if ($app_day == 1) $str_day = 'sunday';
                    if ($app_day == 2) $str_day = 'monday';
                    if ($app_day == 3) $str_day = 'tuesday';
                    if ($app_day == 4) $str_day = 'wednesday';
                    if ($app_day == 5) $str_day = 'thursday';
                    if ($app_day == 6) $str_day = 'friday';
                    if ($app_day == 7) $str_day = 'saturday';

                    $next = date("Y-m-d", strtotime("next " . $str_day));
                    $event_end = '';
                    $minutes = 0;
                    $app_time = 15 * $unit_time;
                    $spaces = floor(32 / $unit_time);

                    for ($d = 0; $d < $weeks; $d++) {
                        $week = $d * 7;
                        $day = $this->GiveDate($next, $week);

                        $appointment = $this->M_Dashboard->GetAppointment(date("m/d/Y", strtotime($day)), $hr_start, $hr_end_day, $id_doctor);

                        $event_start = $day . ' ' . $hr_start;
                        $event_end_day = $day . ' ' . $hr_end_day;

                        if (isset($appointment['data'][0]['APT_Date']) && isset($appointment['data'][0]['APT_Time']))
                            $real_appointment_start_first = date("Y-m-d", strtotime($appointment['data'][0]['APT_Date'])) . ' ' . $appointment['data'][0]['APT_Time'];

                        for ($e = 0; $e < $spaces; $e++)//search if exist an appointment in this date and time
                        {
                            $event_end = date("Y-m-d H:i:s", strtotime('+' . $app_time . ' minute', strtotime($event_start)));

                            if (isset($real_appointment_start_first)) {
                                if ($event_end < $real_appointment_start_first) {
                                    $event['title'] = 'Available';
                                    $event['start'] = date("Y-m-d H:i:s", strtotime('+1 minute', strtotime($event_start)));
                                    $event['end'] = $event_end;
                                    $event['color'] = '#009933';
                                    $events[] = $event;

                                    $event_start = $event_end;
                                } else
                                    break;
                            } else {
                                $event['title'] = 'Available';
                                $event['start'] = date("Y-m-d H:i:s", strtotime('+1 minute', strtotime($event_start)));
                                $event['end'] = $event_end;
                                $event['color'] = '#009933';
                                $events[] = $event;

                                $event_start = $event_end;
                            }
                        }

                        if (isset($appointment['data'])) {
                            for ($a = 0; $a < count($appointment['data']); $a++)//search if exist an appointment in this date and time
                            {
                                $real_appointment_title = $appointment['data'][$a]['APT_Title'];
                                $real_appointment_start = date("Y-m-d", strtotime($appointment['data'][$a]['APT_Date'])) . ' ' . $appointment['data'][$a]['APT_Time'];
                                $real_appointment_end = date("Y-m-d", strtotime($appointment['data'][$a]['APT_Date'])) . ' ' . $appointment['data'][$a]['APT_TimeEnd'];

                                //echo 'event_start: '.$event_start.' <= '.$real_appointment_start .' && '. $real_appointment_start.' < event_end: '.$event_end.' <br><br><br>';
                                //echo 'real_appointment_start: '.$real_appointment_start.'   real_appointment_end: '.$real_appointment_end.'<br><br><br><br>';

                                if ($event_end != '') {
                                    $date1 = new DateTime($event_end);
                                    $date2 = new DateTime($real_appointment_start);
                                    $diff = $date1->diff($date2);
                                    $minutes = $diff->h * 60 + $diff->i - 1;
                                    //echo 'real_appointment_start: '.$real_appointment_start.' = '.$event_end.'   minutes: '.$minutes. '  <br><br>';
                                }

                                if ($minutes >= $app_time) {
                                    $cant_hold = floor($minutes / $app_time);
                                    //echo '$cant_hold: ' . $cant_hold . ' = ' . $minutes . ' / ' . $app_time . ' <br>';

                                    for ($h = 0; $h < $cant_hold; $h++)//search if exist an appointment in this date and time
                                    {
                                        $event_start = date("Y-m-d H:i:s", strtotime('+1 minute', strtotime($event_end)));
                                        $event_end = date("Y-m-d H:i:s", strtotime('+' . $app_time . ' minutes', strtotime($event_end)));

                                        $event['title'] = 'Available';;
                                        $event['start'] = $event_start;
                                        $event['end'] = $event_end;
                                        $event['color'] = '#009933';
                                        $events[] = $event;
                                        //echo $event_start . ' = ' . $event_end . '    ' . $event['title'] . ' <br><br>';
                                    }
                                }

                                $event_start = $real_appointment_start;
                                $event_end = $real_appointment_end;

                                $event['title'] = $real_appointment_title;
                                $event['start'] = $event_start;
                                $event['end'] = $event_end;
                                $event['color'] = '#000';
                                $events[] = $event;//echo $event_start.' = '.$event_end.'    '.$event_title.' <br><br>';
                            }
                        }

                        for ($e = 0; $e < $spaces; $e++)//search if exist an appointment in this date and time
                        {
                            $event_start = date("Y-m-d H:i:s", strtotime('+1 minute', strtotime($event_end)));
                            $event_end = date("Y-m-d H:i:s", strtotime('+' . $app_time . ' minute', strtotime($event_end)));

                            //echo $event_start.' - '.$event_end;
                            if ($event_end < $event_end_day) {
                                //echo $event_end . ' < ' . $event_end_day;
                                $event['title'] = 'Available';
                                $event['start'] = $event_start;
                                $event['end'] = $event_end;
                                $event['color'] = '#009933';
                                $events[] = $event;

                                $event_start = $event_end;
                            } else
                                break;
                        }

                    }

                }//for of the $app_days
            }//if have something

            $data['events'] = json_encode($events);//echo $data['events'];//die();
            $this->load->view('dashboard/CalendarAppointment', $data);
        }
        else
            echo 'NOT_SETTINGS';
    }

    public function ConfirmApp()
    {
        $data['token']=$this->uri->segment(3);//echo $token;die();
        $token=$data['token'];

        $result=$this->M_Dashboard->ValidaTokenApp($token);//var_dump($result);

        //echo $result['error'];
        if ($result['error']=='0')
        {
            $data['__zpk_Appointment_Rec'] = $result['__zpk_Appointment_Rec'];
            $data['APT_Date'] = $result['APT_Date'];
            $data['APT_Time'] = $result['APT_Time'];
            $data['APT_TimeEnd'] = $result['APT_TimeEnd'];
            $data['APT_Title'] = $result['APT_Title'];
            $data['FirstName'] = $result['FirstName'];
            $data['LastName'] = $result['LastName'];
            $data['Photo'] = $result['Photo'];
            $data['Service'] = $result['Service'];
            $data['RecordID'] = $result['RecordID'];

            $this->load->view('appointment/ModalConfirmAppointment', $data);
        }
        else
        {
            $data['msg']='';
            $data['success']='';
            $data['warning']='';
            $data['error']=$result['error'];//echo$error;die();

            $this->load->view('authentication/Login', $data);
        }
    }
}