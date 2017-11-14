<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('M_Dashboard');
    }

    function index($view="dashboard/Dashboard", $msg="", $success="", $warning="", $error="")
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
        $session_data = $this->session->userdata('logged_user_acs');
        $__zkp_Client_Rec = $session_data['__zkp_Client_Rec'];

        $events[] = '[]';
        $error='';
        date_default_timezone_set('America/New_York');

        $id_service = $_POST['id_service'];
        $id_doctor = $_POST['id_doctor'];//echo $id_service.' - '.$id_doctor;

        $setting=$this->M_Dashboard->GetAppointmentSettings($id_service, $id_doctor);
//echo json_encode($setting);
        if($setting['error']=='0')
        {
            for ($s = 0; $s < count($setting['data']); $s++)
            {
                $weeks_day=7;
                $number_ServiceStartingDate=0;

                $setting_id = $setting['data'][$s]['__kp_PRIMARY_KEY'];//id of setting
                $weeks = $setting['data'][$s]['QtyWeeksRepeat'];//qty of week is posible to make an appointment
                $unit_time = $setting['data'][$s]['UnitTime'];//qty of units of 15 minutes
                $hr_start = $setting['data'][$s]['HrStart'];//start time, always should be 1 minute less
                $hr_end = $setting['data'][$s]['HrEnd'];//end time
                $app_days = $setting['data'][$s]['AppDays'];//days of the appointment
                $ServiceStartingDate = $setting['data'][$s]['ServiceStartingDate'];//when the service start
                $ServiceEndingDate = $setting['data'][$s]['ServiceEndingDate'];//when the service end
                $RepeatEveryWeeks = $setting['data'][$s]['RepeatEveryWeeks'];//the service is or not in alternative weeks
                $all_appointments = $this->M_Dashboard->GetAppointment(date("m/d/Y"), $id_doctor);

                if($ServiceStartingDate!='')
                {
                    if(new DateTime($ServiceStartingDate)<new DateTime(date("m/d/Y")))
                    {
                        $ServiceStartingDate=date("m/d/Y");
                    }

                    $timestamp_ServiceStartingDate = strtotime($ServiceStartingDate);
                    $number_ServiceStartingDate = date('w', $timestamp_ServiceStartingDate)+1;
                }

                //echo $weeks.$unit_time.$hr_start.$hr_end.$app_days!='';
                if($weeks!='' && $unit_time!='' && $hr_start!='' && $hr_end!='' && $app_days!='')
                {

                    $var = explode(",", $app_days);
                    $data['last_day'] = end($var);
                    reset($var);

                    $start_same_week=0;
                    if (count($var) != 0)
                    {
                        for ($i = 0; $i < count($var); next($var), $i++)
                        {
                            $app_day = current($var);
                            if($number_ServiceStartingDate<=$app_day)
                            {
                                $start_same_week=1;
                            }
                        }
                    }
                    reset($var);

                    //echo '$start_same_week: '.$start_same_week;

                    if (count($var) != 0)
                    {
                        for ($i = 0; $i < count($var); next($var), $i++)
                        {
                            $app_day = current($var);

                            if ($app_day == 1) $str_day = 'sunday';
                            if ($app_day == 2) $str_day = 'monday';
                            if ($app_day == 3) $str_day = 'tuesday';
                            if ($app_day == 4) $str_day = 'wednesday';
                            if ($app_day == 5) $str_day = 'thursday';
                            if ($app_day == 6) $str_day = 'friday';
                            if ($app_day == 7) $str_day = 'saturday';

                            //echo '  $start_same_week: '.$start_same_week.'  $number_ServiceStartingDate: '.$number_ServiceStartingDate.'  $app_day: '.$app_day;//.'  $today: '.$today;

                            if($start_same_week==1 && $number_ServiceStartingDate<$app_day)//if $start_same_week==1 the event start in the same week and if the CURRENT appointment day is > $number_ServiceStartingDate
                            {
                                $next = date("Y-m-d", strtotime('next '.$str_day.' '.date("Y-m-d", strtotime($ServiceStartingDate))));//echo 'next: '.$next.' ';
                            }
                            elseif($start_same_week==1 && $number_ServiceStartingDate==$app_day)//if $start_same_week==1 the event start in the same week and if the CURRENT appointment day is > $number_ServiceStartingDate
                            {
                                $next = date("Y-m-d", strtotime($ServiceStartingDate));
                                //$next = 'no';
                            }
                            elseif($start_same_week==1 && $number_ServiceStartingDate==$app_day)//if $start_same_week==1 the event start in the same week and if the CURRENT appointment day is > $number_ServiceStartingDate
                            {
                                $next = date("Y-m-d", strtotime($ServiceStartingDate));
                            }
                            elseif($start_same_week==1 && $number_ServiceStartingDate>$app_day)
                            {
                                $next = date("Y-m-d", strtotime('last '.$str_day.' '.date("Y-m-d", strtotime($ServiceStartingDate))));//echo 'last: '.$next.' ';
                            }
                            elseif($start_same_week==0)
                            {
                                $next = date("Y-m-d", strtotime('next '.$str_day.' '.date("Y-m-d", strtotime($ServiceStartingDate))));//echo 'next: '.$next.' ';
                            }

                            //echo $next;

                            $minutes = 0;
                            //$app_time = 10 * $unit_time;
                            $app_time = $unit_time;//echo $app_time;
                            $spaces = floor(1440 / $unit_time);
                            $color_available = '#009933';
                            $color_not_available = '#ffff66';
                            $text_color_not_available = '#000';
                            $text_color_available = '#fff';
                            $title_available = ' Available';
                            $title_not_available = ' Not Available';

                            for ($d = 0; $d < $weeks; $d++)
                            {
                                if ($RepeatEveryWeeks != '')
                                    $weeks_day = $RepeatEveryWeeks * 7;

                                $week = $d * $weeks_day;
                                $day = $this->GiveDate($next, $week);

                                if($day!=date('Y-m-d'))
                                {
                                    $exist_availables = $this->ExistEventsBetweenTimes($ServiceStartingDate, $ServiceEndingDate, $day);

                                    if ($exist_availables == 1)
                                    {


                                        //echo json_encode($all_appointments).'     ';//die();

                                        $app_today = 0;
                                        $appointment['data']='';

                                        if (isset($all_appointments['data'][0]['APT_Date']))
                                        {
                                            for ($app = 0; $app < count($all_appointments['data']); $app++)
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

                                        $event_start = $day . ' ' . $hr_start;
                                        $event_end = $day . ' ' . $hr_start;//if the day doesn't have an appointment in the 3th cicle (for) the events will be filled starting at the beginning of the day
                                        $event_end_period = $day . ' ' . $hr_end;

                                        if (isset($appointment['data'][0]['APT_Date']))//search if exist an appointment in this date and time
                                        {
                                            $real_appointment_start_first = date("Y-m-d", strtotime($appointment['data'][0]['APT_Date'])) . ' ' . $appointment['data'][0]['APT_Time'];

                                            for ($e = 0; $e < $spaces; $e++)//1st cicle
                                            {
                                                $event_end = date("Y-m-d H:i:s", strtotime('+' . $app_time . ' minute', strtotime($event_start)));

                                                if ($event_end < $real_appointment_start_first)
                                                {
                                                    $event['id'] = rand(1,999999999999999);
                                                    $event['title'] = $title_available;
                                                    $event['start'] = date("Y-m-d H:i:s", strtotime('+1 minute', strtotime($event_start)));
                                                    $event['end'] = $event_end;
                                                    $event['color'] = $color_available;
                                                    $event['textColor'] = $text_color_available;
                                                    $event['setting_id'] = $setting_id;
                                                    $events[] = $event;

                                                    $event_start = $event_end;
                                                } else
                                                {
                                                    break;
                                                }
                                            }

                                            for ($a = 0; $a < count($appointment['data']); $a++)
                                            {
                                                $real_appointment_title = $appointment['data'][$a]['APT_Title'];
                                                //$real_appointment_title = $title_not_available;
                                                $real_appointment_start = date("Y-m-d", strtotime($appointment['data'][$a]['APT_Date'])) . ' ' . $appointment['data'][$a]['APT_Time'];
                                                $real_appointment_end = date("Y-m-d", strtotime($appointment['data'][$a]['APT_Date'])) . ' ' . $appointment['data'][$a]['APT_TimeEnd'];

                                                $client_rec = $appointment['data'][$a]['_zfk_ClientRec'];

                                                if ($event_end != '')
                                                {
                                                    $date1 = new DateTime($event_end);
                                                    $date2 = new DateTime($real_appointment_start);
                                                    $diff = $date1->diff($date2);
                                                    $minutes = $diff->h * 60 + $diff->i - 1;
                                                    //echo 'real_appointment_start: '.$real_appointment_start.' = '.$event_end.'   minutes: '.$minutes. '  <br><br>';
                                                }

                                                if ($minutes >= $app_time)
                                                {
                                                    $cant_hold = floor($minutes / $app_time);
                                                    //echo '$cant_hold: ' . $cant_hold . ' = ' . $minutes . ' / ' . $app_time . ' <br>';

                                                    for ($h = 0; $h < $cant_hold; $h++)//search if exist an appointment in this date and time
                                                    {
                                                        $event_start = date("Y-m-d H:i:s", strtotime('+1 minute', strtotime($event_end)));
                                                        $event_end = date("Y-m-d H:i:s", strtotime('+' . $app_time . ' minutes', strtotime($event_end)));

                                                        $event['id'] = rand(1,999999999999999);
                                                        $event['title'] = $title_available;;
                                                        $event['start'] = $event_start;
                                                        $event['end'] = $event_end;
                                                        $event['color'] = $color_available;
                                                        $event['textColor'] = $text_color_available;
                                                        $event['setting_id'] = $setting_id;
                                                        $events[] = $event;
                                                        //echo $event_start . ' = ' . $event_end . '    ' . $event['title'] . ' <br><br>';
                                                    }
                                                }

                                                $event_start = $real_appointment_start;
                                                $event_end = $real_appointment_end;

                                                $event['id'] = rand(1,999999999999999);
                                                $event['title'] = $real_appointment_title;
                                                $event['start'] = $event_start;
                                                $event['end'] = $event_end;
                                                $event['color'] = $color_not_available;
                                                $event['textColor'] = $text_color_not_available;
                                                $event['setting_id'] = $setting_id;
                                                if($client_rec==$__zkp_Client_Rec)
                                                $events[] = $event;//--------------------------events unavailables--------------------------
                                            }
                                        }

                                        for ($e = 0; $e < $spaces; $e++)
                                        {
                                            $event_start = date("Y-m-d H:i:s", strtotime('+1 minute', strtotime($event_end)));
                                            $event_end = date("Y-m-d H:i:s", strtotime('+' . $app_time . ' minute', strtotime($event_end)));

                                            //echo $event_start.' - '.$event_end;
                                            if ($event_end < $event_end_period)
                                            {
                                                //echo $event_end . ' < ' . $event_end_period;
                                                $event['id'] = rand(1,999999999999999);
                                                $event['title'] = $title_available;
                                                $event['start'] = $event_start;
                                                $event['end'] = $event_end;
                                                $event['color'] = $color_available;
                                                $event['textColor'] = $text_color_available;
                                                $event['setting_id'] = $setting_id;
                                                $events[] = $event;

                                                $event_start = $event_end;
                                            } else
                                                break;
                                        }
                                    }//if from ServiceStartingDate

                                }//if from next

                            }//for from weeks

                        }//for from $app_days

                    }//if have something
                    else
                        $error = 'NOT_SETTINGS';
                }//if from different validations
                else
                    $error = 'NOT_SETTINGS';//some field from settings is empty
            }//for from settings
        }
        else
            $error = 'NOT_SETTINGS';

        if($error=='')
        {
            $data['events'] = json_encode($events);//echo $data['events'];//die();
            $this->load->view('dashboard/CalendarAppointment', $data);
        }
        else
            echo $error;
    }

    function ExistEventsBetweenTimes($ServiceStartingDate, $ServiceEndingDate, $day)
    {
        $exist_availables = 0;
        if ($ServiceStartingDate != '' && $ServiceEndingDate != '')
        {
            //echo $ServiceStartingDate.' <= '.date("m/d/Y", strtotime($day)) && date("m/d/Y", strtotime($day)).' <= '.$ServiceEndingDate.'   ---------  '.$exist_availables.' =====  ';
            if (new DateTime($ServiceStartingDate) <= new DateTime(date("m/d/Y", strtotime($day))) && new DateTime(date("m/d/Y", strtotime($day))) <= new DateTime($ServiceEndingDate))
                $exist_availables = 1;
        } elseif ($ServiceStartingDate != '' && $ServiceEndingDate == '')
        {
            if (new DateTime($ServiceStartingDate) <= new DateTime(date("m/d/Y", strtotime($day))))
                $exist_availables = 1;
        } elseif ($ServiceStartingDate == '' && $ServiceEndingDate != '')
        {
            if (new DateTime(date("m/d/Y", strtotime($day))) <= new DateTime($ServiceEndingDate))
                $exist_availables = 1;
        } else
            $exist_availables = 1;

        return $exist_availables;
    }

    function ConfirmApp()
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
            $data['email'] = $result['bd_user_email'];
            $data['bd_FirstName'] = $result['bd_FirstName'];
            $data['bd_LastName'] = $result['bd_LastName'];
            $data['bd_user_email'] = $result['bd_user_email'];
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

    function SendMailDownloadiCal()
    {
        $email = $_POST['hdn_bd_user_email'];

        $data_email = $this->session->userdata('param_email_acs');

        $email_from = $data_email['email_from'];
        $email_from_name = $data_email['email_from_name'];
        $email_test_to = $data_email['email_test_to'];

        $from_email = $email_from;
        $from_name = $email_from_name;
        $email_to = $email;
        $reply_to_email = '';
        $reply_to_name = '';
        $subject = "Appointment Confirmed";
        $attachments = './assets/images/logo.png';
        $link_web = '351face.com';
        $body = '<h1>Thanks for your confirmation</h1>'.
            '<p>Dear <b>'.$_POST['txt_patient'].'</b>,</p>'.
            '<p>You confirmed an aplication for an appointment at the <a href="'. $link_web . '">Advanced Cosmetic Surgery & Laser Center.</a></p>'.
            '<br>'.
            '<p><b>Date: </b>'.$_POST['txt_date'].'</p>'.
            '<p><b>Time: </b>'.$_POST['txt_start'].'</p>'.
            '<p><b>Provider: </b>'.$_POST['txt_doctor'].'</p>'.
            '<p><b>Service: </b>'.$_POST['txt_service'].'</p>'.
            '<br>'.
            '<p><b>Please arrive 15 minutes prior to your scheduled appointment time at the address listed below.</b></p>'.
            '<br>'.
            '<p>Thank you,</p>'.
            '<p>Advanced Cosmetic Surgery & Laser Center</p>'.
            '<p>Rookwood Commons Shopping Center</p>'.
            '<p>3805 Edwards Rd #100</p>'.
            '<p>Cincinnati, OH 45244</p>'.
            '<p>Phone: 513-351-FACE(3223)</p>'.
            '<p>Fax: 513-396-8995</p>'.
            '<br>'.
            '<a href="' . $link_web . '"><img src="cid:img_cid_0" alt="Advanced Cosmetic Surgery & Laser Center" /></a>';

        $arr_ical=array('location' => $_POST['hdn_ical_addr'],
            'description' => $_POST['hdn_ical_title'],
            'dtstart' => $_POST['hdn_ical_start'],
            'dtend' => $_POST['hdn_ical_end'],
            'summary' => $_POST['hdn_ical_title'],
            'url' => $_POST['hdn_ical_url']
        );

        $this->load->library('MT_ICS');
        $ics = new MT_ICS($arr_ical);

        $calendar=$ics->to_string();

        $file= './assets/upload/appointment.ics';

        $this->load->library('MT_Mail');
        $obj_mail = new MT_Mail();

        if (write_file($file, $calendar))
        {
            $attachments=$attachments.'&'.$file;
        }

        $return=$obj_mail->EnviarEmail($from_email, $from_name, $email_to, $reply_to_email, $reply_to_name, $subject, $body, $attachments);

        if($return=='OK')
            $this->load->view('appointment/ConfirmedAppointment');
    }

    function DownloadiCal()
    {
        header('Content-type: text/calendar; charset=utf-8');
        header('Content-Disposition: attachment; filename=appointment-acs.ics');

        foreach($_POST as $field_name => $value)
        {
            if(substr($field_name, 0, 13)=='hdn_ical_addr')
            {$arr_ical['location'] = $value;}
            if(substr($field_name, 0, 14)=='hdn_ical_title')
            {$arr_ical['description'] = $value;}
            if(substr($field_name, 0, 14)=='hdn_ical_start')
            {$arr_ical['dtstart'] = $value;}
            if(substr($field_name, 0, 12)=='hdn_ical_end')
            {$arr_ical['dtend'] = $value;}
            if(substr($field_name, 0, 14)=='hdn_ical_title')
            {$arr_ical['summary'] = $value;}
            if(substr($field_name, 0, 12)=='hdn_ical_url')
            {$arr_ical['url'] = $value;}
        }

        $this->load->library('MT_ICS');
        $ics = new MT_ICS($arr_ical);

        echo $ics->to_string();
    }

    function GetAppointmentBy()
    {
        $id_service = $_POST['id_service'];
        $id_doctor = $_POST['id_doctor'];
        $date = $_POST['date'];
        $start = $_POST['start'];

        $app = $this->M_Dashboard->GetAppointmentBy($id_service, $id_doctor, $date, $start);

        echo $app['error'];
    }

    function GoToAppointments($view="dashboard/Dashboard", $msg="", $success="", $warning="", $error="")
    {
        $data['msg']=$msg;
        $data['success']=$success;
        $data['warning']=$warning;
        $data['error']=$error;
        $data['view']=$view;

        $data['go_layout']=$this->input->post('go_layout');
        $data['delete_id']=$this->input->post('id');
        $data['id_doc']=$this->input->post('id_doc');
        $data['id_serv']=$this->input->post('id_serv');

        if($this->session->userdata('logged_user_acs'))
        {
            $session_data = $this->session->userdata('logged_user_acs');

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
}