<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
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
            print 1;
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
        $old_start = array();
        $old_end = array();
        date_default_timezone_set('America/New_York');

        $id_service = $_POST['id_service'];
        $id_doctor = $_POST['id_doctor'];//print $id_service.' - '.$id_doctor;

        $setting=$this->M_Dashboard->GetAppointmentSettings($id_service, $id_doctor);

        if($setting['error']=='0')
        {
            for ($s = 0; $s < sizeof($setting['data']); $s++)
            {
                $parameters['weeks_day']=7;
                $parameters['number_ServiceStartingDate']=0;

                $parameters['setting_id'] = $setting['data'][$s]['__kp_PRIMARY_KEY'];//id of setting
                $parameters['weeks'] = $setting['data'][$s]['QtyWeeksRepeat'];//qty of week is posible to make an appointment
                $parameters['unit_time'] = $setting['data'][$s]['UnitTime'];//qty of units of 15 minutes
                $parameters['hr_start'] = $setting['data'][$s]['HrStart'];//start time, always should be 1 minute less
                $parameters['hr_end'] = $setting['data'][$s]['HrEnd'];//end time
                $parameters['app_days'] = $setting['data'][$s]['AppDays'];//days of the appointment
                $parameters['ServiceStartingDate'] = $setting['data'][$s]['ServiceStartingDate'];//when the service start
                $parameters['ServiceEndingDate'] = $setting['data'][$s]['ServiceEndingDate'];//when the service end
                $parameters['RepeatEveryWeeks'] = $setting['data'][$s]['RepeatEveryWeeks'];//the service is or not in alternative weeks
                $all_appointments = $this->M_Dashboard->GetAppointment(date("m/d/Y"), $id_doctor);

                if($parameters['ServiceStartingDate']!='')
                {
                    if(new DateTime($parameters['ServiceStartingDate'])<new DateTime(date("m/d/Y")))
                    {
                        $parameters['ServiceStartingDate']=date("m/d/Y");
                    }

                    $timestamp_ServiceStartingDate = strtotime($parameters['ServiceStartingDate']);
                    $parameters['number_ServiceStartingDate'] = date('w', $timestamp_ServiceStartingDate)+1;
                }

                //print $parameters['weeks'].$parameters['unit_time'].$parameters['hr_start'].$parameters['hr_end'].$parameters['app_days']!='';
                if($parameters['weeks']!='' && $parameters['unit_time']!='' && $parameters['hr_start']!='' && $parameters['hr_end']!='' && $parameters['app_days']!='')
                {

                    $var = explode(",", $parameters['app_days']);
                    $data['last_day'] = end($var);
                    reset($var);

                    $parameters['start_same_week']=0;
                    if (sizeof($var) != 0)
                    {
                        for ($i = 0; $i < sizeof($var); next($var), $i++)
                        {
                            $parameters['app_day'] = current($var);
                            if($parameters['number_ServiceStartingDate']<=$parameters['app_day'])
                            {
                                $parameters['start_same_week']=1;
                            }
                        }
                    }
                    reset($var);

                    if (sizeof($var) != 0)
                    {
                        for ($i = 0; $i < sizeof($var); next($var), $i++)
                        {
                            $parameters['app_day'] = current($var);

                            $next=$this->GetNextDay($parameters); //print $next;

                            $minutes = 0;
                            //$parameters['app_time'] = 10 * $parameters['unit_time'];
                            $parameters['app_time'] = $parameters['unit_time'];//print $parameters['app_time'];
                            $parameters['spaces'] = floor(1440 / $parameters['unit_time']);
                            $parameters['color_available'] = '#009933';
                            $parameters['color_not_available'] = '#ffff66';
                            $parameters['text_color_not_available'] = '#000';
                            $parameters['text_color_available'] = '#fff';
                            $parameters['title_available'] = ' Available';
                            $parameters['title_not_available'] = ' Not Available';

                            for ($d = 0; $d < $parameters['weeks']; $d++)
                            {
                                if ($parameters['RepeatEveryWeeks'] != '')
                                    $parameters['weeks_day'] = $parameters['RepeatEveryWeeks'] * 7;

                                $week = $d * $parameters['weeks_day'];
                                $parameters['day'] = $this->GiveDate($next, $week);


                                $exist_availables = $this->ExistEventsBetweenTimes($parameters['ServiceStartingDate'], $parameters['ServiceEndingDate'], $parameters['day']);

                                if ($exist_availables == 1)
                                {

                                    $appointment=$this->FillAppointments($all_appointments, $parameters);

                                    $parameters['event_start_day'] = $parameters['day'] . ' ' . $parameters['hr_start'];
                                    $parameters['event_end'] = $parameters['day'] . ' ' . $parameters['hr_start'];//if the day doesn't have an appointment in the 3th cicle (for) the events will be filled starting at the beginning of the day
                                    $parameters['event_end_period'] = $parameters['day'] . ' ' . $parameters['hr_end'];
                                    $parameters['event_start'] = date("Y-m-d H:i:s", strtotime('+1 minute', strtotime($parameters['event_start_day'])));

                                    if (isset($appointment['data'][0]['APT_Date']))//search if exist an appointment in this date and time
                                    {
                                        $parameters['real_appointment_start_first'] = date("Y-m-d", strtotime($appointment['data'][0]['APT_Date'])) . ' ' . $appointment['data'][0]['APT_Time'];

                                        $events[]=$this->FirstCicle($parameters);

                                        for ($a = 0; $a < sizeof($appointment['data']); $a++)
                                        {
                                            $real_appointment_title = $appointment['data'][$a]['APT_Title'];

                                            $real_appointment_start = date("Y-m-d", strtotime($appointment['data'][$a]['APT_Date'])) . ' ' . $appointment['data'][$a]['APT_Time'];
                                            $real_appointment_end = date("Y-m-d", strtotime($appointment['data'][$a]['APT_Date'])) . ' ' . $appointment['data'][$a]['APT_TimeEnd'];

                                            $client_rec = $appointment['data'][$a]['_zfk_ClientRec'];
                                            $TokenConfirmApp = $appointment['data'][$a]['TokenConfirmApp'];

                                            //

                                            if($parameters['event_end']!='')//if(substr($parameters['event_end'],0,10) == '2017-12-20')
                                            {
                                                $date1 = new DateTime($parameters['event_end']);
                                                $date2 = new DateTime($real_appointment_start);
                                                $diff = $date1->diff($date2);
                                                $minutes = $diff->h * 60 + $diff->i - 1;

                                                if ($minutes >= $parameters['app_time'])
                                                {
                                                    //print $minutes.' < '.$parameters['hr_end'].'<br>';

                                                    $cant_hold = floor($minutes / $parameters['app_time']);
                                                    //print '$cant_hold: ' . $cant_hold . ' = ' . $minutes . ' / ' . $parameters['app_time'] . ' <br>';

                                                    for ($h = 0; $h < $cant_hold; $h++)//search if exist an appointment in this date and time
                                                    {
                                                        $parameters['event_start'] = date("Y-m-d H:i:s", strtotime('+1 minute', strtotime($parameters['event_end'])));
                                                        $parameters['event_end'] = date("Y-m-d H:i:s", strtotime('+' . $parameters['app_time'] . ' minutes', strtotime($parameters['event_end'])));

                                                        //print substr($parameters['event_end'],11).' < '.$parameters['hr_end'].'<br>';

                                                        if(!in_array($parameters['event_start'], $old_start) && !in_array($parameters['event_end'], $old_end) && substr($parameters['event_end'],11) < $parameters['hr_end'])
                                                        {
                                                            array_push($old_start, $parameters['event_start']);
                                                            array_push($old_end, $parameters['event_end']);

                                                            $event['id'] = rand(1, 999999999999999);
                                                            $event['title'] = $parameters['title_available'];;
                                                            $event['start'] = $parameters['event_start'];
                                                            $event['end'] = $parameters['event_end'];
                                                            $event['color'] = $parameters['color_available'];
                                                            $event['textColor'] = $parameters['text_color_available'];
                                                            $event['setting_id'] = $parameters['setting_id'];
                                                            $event['confirm'] = 0;
                                                            $events[] = $event;
                                                            //print substr($parameters['event_start'],0,10);
                                                        }
                                                    }
                                                }
                                            }

                                            $parameters['event_start'] = $real_appointment_start;
                                            $parameters['event_end'] = $real_appointment_end;

                                            $event['id'] = rand(1,999999999999999);
                                            $event['title'] = $real_appointment_title;
                                            $event['start'] = $parameters['event_start'];
                                            $event['end'] = $parameters['event_end'];
                                            $event['color'] = $parameters['color_not_available'];
                                            $event['textColor'] = $parameters['text_color_not_available'];
                                            $event['setting_id'] = $parameters['setting_id'];
                                            if($TokenConfirmApp!='')
                                            $event['confirm'] = 'text-danger';
                                            else
                                                $event['confirm'] = 'text-success';
                                            if($client_rec==$__zkp_Client_Rec)
                                            $events[] = $event;//--------------------------events unavailables--------------------------
                                            //if (substr($parameters['event_start'], 0, 10) == '2017-12-20') print $parameters['event_start'] . ' = ' . $parameters['event_end'] . '    ' . $event['title'] . ' <br><br>';
                                        }
                                    }

                                    for ($e = 0; $e < $parameters['spaces']; $e++)
                                    {
                                        $parameters['event_start'] = date("Y-m-d H:i:s", strtotime('+1 minute', strtotime($parameters['event_end'])));
                                        $parameters['event_end'] = date("Y-m-d H:i:s", strtotime('+' . $parameters['app_time'] . ' minute', strtotime($parameters['event_end'])));

                                        //print $parameters['event_end'].' - '.$parameters['event_end_period'].'<br>';
                                        if ($parameters['event_end'] < $parameters['event_end_period'])
                                        {

                                            //print $parameters['event_start'].' - '.date("Y-m-d H:i:s").'<br>';
                                            if(new DateTime($parameters['event_start'])>new DateTime(date("Y-m-d H:i:s")))
                                            {
                                                //print $parameters['event_start'] . ' > ' . date("Y-m-d H:i:s") . '<br>';

                                                //print $parameters['event_end'] . ' < ' . $parameters['event_end_period'];
                                                $event['id'] = rand(1, 999999999999999);
                                                $event['title'] = $parameters['title_available'];
                                                $event['start'] = $parameters['event_start'];
                                                $event['end'] = $parameters['event_end'];
                                                $event['color'] = $parameters['color_available'];
                                                $event['textColor'] = $parameters['text_color_available'];
                                                $event['setting_id'] = $parameters['setting_id'];
                                                $event['confirm'] = 0;
                                                $events[] = $event;
                                            }
                                        } else
                                            break;
                                    }
                                }//if from ServiceStartingDate



                            }//for from weeks

                        }//for from $parameters['app_days']

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
            $data['events'] = json_encode($events);//print $data['events'];//die();
            $this->load->view('dashboard/CalendarAppointment', $data);
        }
        else
            print $error;
    }

    function ExistEventsBetweenTimes($ServiceStartingDate, $ServiceEndingDate, $day)
    {
        $exist_availables = 0;
        if ($ServiceStartingDate != '' && $ServiceEndingDate != '')
        {
            //print $ServiceStartingDate.' <= '.date("m/d/Y", strtotime($day)) && date("m/d/Y", strtotime($day)).' <= '.$ServiceEndingDate.'   ---------  '.$exist_availables.' =====  ';
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

    function GetNextDay($parameters)
    {
        if ($parameters['app_day'] == 1) $parameters['str_day'] = 'sunday';
        if ($parameters['app_day'] == 2) $parameters['str_day'] = 'monday';
        if ($parameters['app_day'] == 3) $parameters['str_day'] = 'tuesday';
        if ($parameters['app_day'] == 4) $parameters['str_day'] = 'wednesday';
        if ($parameters['app_day'] == 5) $parameters['str_day'] = 'thursday';
        if ($parameters['app_day'] == 6) $parameters['str_day'] = 'friday';
        if ($parameters['app_day'] == 7) $parameters['str_day'] = 'saturday';

        //print '  $parameters['start_same_week']: '.$parameters['start_same_week'].'  $parameters['number_ServiceStartingDate']: '.$parameters['number_ServiceStartingDate'].'  $parameters['app_day']: '.$parameters['app_day'];//.'  $today: '.$today;

        if($parameters['start_same_week']==1 && $parameters['number_ServiceStartingDate']<$parameters['app_day'])//if $parameters['start_same_week']==1 the event start in the same week and if the CURRENT appointment day is > $parameters['number_ServiceStartingDate']
        {
            $next = date("Y-m-d", strtotime('next '.$parameters['str_day'].' '.date("Y-m-d", strtotime($parameters['ServiceStartingDate']))));//print 'next: '.$next.' ';
        }
        elseif($parameters['start_same_week']==1 && $parameters['number_ServiceStartingDate']==$parameters['app_day'])//if $parameters['start_same_week']==1 the event start in the same week and if the CURRENT appointment day is > $parameters['number_ServiceStartingDate']
        {
            $next = date("Y-m-d", strtotime($parameters['ServiceStartingDate']));
            //$next = 'no';
        }
        elseif($parameters['start_same_week']==1 && $parameters['number_ServiceStartingDate']==$parameters['app_day'])//if $parameters['start_same_week']==1 the event start in the same week and if the CURRENT appointment day is > $parameters['number_ServiceStartingDate']
        {
            $next = date("Y-m-d", strtotime($parameters['ServiceStartingDate']));
        }
        elseif($parameters['start_same_week']==1 && $parameters['number_ServiceStartingDate']>$parameters['app_day'])
        {
            $next = date("Y-m-d", strtotime('last '.$parameters['str_day'].' '.date("Y-m-d", strtotime($parameters['ServiceStartingDate']))));//print 'last: '.$next.' ';
        }
        elseif($parameters['start_same_week']==0)
        {
            $next = date("Y-m-d", strtotime('next '.$parameters['str_day'].' '.date("Y-m-d", strtotime($parameters['ServiceStartingDate']))));//print 'next: '.$next.' ';
        }

        return $next;
    }

    function FillAppointments($all_appointments, $parameters)
    {
        $app_today = 0;
        $appointment['data']='';

        if (isset($all_appointments['data'][0]['APT_Date']))
        {
            for ($app = 0; $app < sizeof($all_appointments['data']); $app++)
            {
                if (isset($all_appointments['data'][$app]['APT_Date']))
                {
                    //if ($all_appointments['data'][$app]['APT_Date'].' - '.$all_appointments['data'][$app]['APT_Time'] == '12/20/2017 - 17:01:00')print $all_appointments['data'][$app]['APT_Date'].' - '.$all_appointments['data'][$app]['APT_Time'].'<br>';

                    if (date("m/d/Y", strtotime($parameters['day'])) == $all_appointments['data'][$app]['APT_Date'] && $all_appointments['data'][$app]['APT_Time'] >= $parameters['hr_start'] && $all_appointments['data'][$app]['APT_TimeEnd'] <= $parameters['hr_end'])
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

        return $appointment;
    }

    function FirstCicle($parameters)
    {
        $events=array();

        for ($e = 0; $e < $parameters['spaces']; $e++)//1st cicle
        {
            //$parameters['event_end'] = date("Y-m-d H:i:s", strtotime('+' . $parameters['app_time'] . ' minute', strtotime($parameters['event_start'])));
            $parameters['event_start']=date("Y-m-d H:i:s", strtotime('+1 minute', strtotime($parameters['event_end'])));
            $parameters['event_end'] = date("Y-m-d H:i:s", strtotime('+' . $parameters['app_time'] . ' minutes', strtotime($parameters['event_end'])));

            //print $parameters['event_end']. '<' .$parameters['real_appointment_start_first'].'<br>';
            if ($parameters['event_end'] < $parameters['real_appointment_start_first'])
            {
                if(new DateTime($parameters['event_start'])>new DateTime(date("Y-m-d H:i:s")))
                {
                    //print 'event_start: '.$parameters['event_start'].'<br>';

                    $event['id'] = rand(1, 999999999999999);
                    $event['title'] = $parameters['title_available'];
                    $event['start'] = $parameters['event_start'];
                    $event['end'] = $parameters['event_end'];
                    $event['color'] = $parameters['color_available'];
                    $event['textColor'] = $parameters['text_color_available'];
                    $event['setting_id'] = $parameters['setting_id'];
                    $event['confirm'] = 0;
                    $events[] = $event;
                }
            } else
            {
                break;
            }
        }

        return $events;
    }

    function ConfirmApp()
    {
        $data['token']=$this->uri->segment(3);//print $token;die();
        $token=$data['token'];

        $result=$this->M_Dashboard->ValidaTokenApp($token);//var_dump($result);

        //print $result['error'];
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
            $data['DocumentsToSign'] = $result['DocumentsToSign'];
            $data['email'] = $result['bd_user_email'];
            $data['bd_FirstName'] = $result['bd_FirstName'];
            $data['bd_LastName'] = $result['bd_LastName'];
            $data['bd_user_email'] = $result['bd_user_email'];
            $data['RecordID'] = $result['RecordID'];

            $data['email_from'] = EMAIL_FROM;
            $data['email_from_name'] = EMAIL_FROM_NAME;

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
        $data['email'] = $_POST['hdn_bd_user_email'];

        $from_email = EMAIL_FROM;
        $from_name = EMAIL_FROM_NAME;
        $email_to = $data['email'];
        $reply_to_email = '';
        $reply_to_name = '';

        $subject = "Appointment Confirmed";
        $attachments = './assets/images/logo.png';
        $link_web = '351face.com';



        $body = '<h1>Thank you for your confirmation</h1>'.
            '<a href="'.base_url('Dashboard/GetiCal').'?location='.$_POST['hdn_ical_addr'].'&amp;description='.$_POST['hdn_ical_title'].'&amp;dtstart='.$_POST['hdn_ical_start'].'&amp;dtend='.$_POST['hdn_ical_end'].'&amp;summary='.$_POST['hdn_ical_title'].'&amp;url='.$_POST['hdn_ical_url'].'">'.
            '<button class="btn btn-success">Add event to calendar</button>'.
            '</a>'.
            '<p>Dear <b>'.$_POST['txt_patient'].'</b>,</p>'.
            '<p>You confirmed an application for an appointment at the <a href="'. $link_web . '">Advanced Cosmetic Surgery & Laser Center.</a></p>'.
            '<br>'.
            '<p><b>Date: </b>'.$_POST['txt_date'].'</p>'.
            '<p><b>Time: </b>'.$_POST['txt_start'].'</p>'.
            '<p><b>Provider: </b>'.$_POST['txt_doctor'].'</p>'.
            '<p><b>Service: </b>'.$_POST['txt_service'].'</p>'.
            '<br>'.
            '<p><b>You must read and sign the attached documents.</b></p>'.
            '<p><b>Please arrive 15 minutes prior to your scheduled appointment time at the address listed below.</b></p>'.
            '<br>'.
            '<p>Thank you,</p>'.
            '<p>Advanced Cosmetic Surgery & Laser Center</p>'.
            '<p>Rookwood Commons Shopping Center</p>'.
            '<p>3805 Edwards Rd 100</p>'.
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

        if(write_file($file, $calendar))
        {
            $attachments=$attachments.'&'.$file;
        }

        if($_POST['txt_DocumentsToSign'])
        {
            $DocumentsToSign = $_POST['txt_DocumentsToSign'];


            $var = explode("|", $DocumentsToSign);

            $cant = sizeof($var);

            if ($cant != 0)
            {
                for ($i = 0; $i < $cant; next($var), $i++)
                {
                    $doc = './assets/docs/' . current($var);//print $doc;//.' - ';die();
                    $attachments = $attachments . '&' . $doc;
                }
            }
        }

        //$file= './assets/docs/Surgery Consents Revised Jan 2017.pdf';


        $return=$obj_mail->EnviarEmail($from_email, $from_name, $email_to, $reply_to_email, $reply_to_name, $subject, $body, $attachments);

        if($return=='OK')
            $this->load->view('appointment/ConfirmedAppointment', $data);
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
            if(substr($field_name, 0, 14)=='hdn_ical_title')
            {$arr_ical['summary'] = $value;}
            if(substr($field_name, 0, 12)=='hdn_ical_url')
            {$arr_ical['url'] = $value;}
            if(substr($field_name, 0, 14)=='hdn_ical_start')
            {$arr_ical['dtstart'] = $value;}
            if(substr($field_name, 0, 12)=='hdn_ical_end')
            {$arr_ical['dtend'] = $value;}
        }

        $this->load->library('MT_ICS');
        $ics = new MT_ICS($arr_ical);

        print $ics->to_string();
    }

    function GetiCal()
    {
        $arr_ical=array('location' => $_GET['location'],
            'description' => $_GET['description'],
            'dtstart' => $_GET['dtstart'],
            'dtend' => $_GET['dtend'],
            'summary' => $_GET['summary'],
            'url' => $_GET['url']
        );

        $this->load->library('MT_ICS');
        $ics = new MT_ICS($arr_ical);

        $calendar=$ics->to_string();

        header('Content-type: text/calendar; charset=utf-8');
        header('Content-Disposition: inline; filename=calendar.ics');
        print $calendar;
        exit;
    }

    function GetAppointmentBy()
    {
        $id_service = $_POST['id_service'];
        $id_doctor = $_POST['id_doctor'];
        $date = $_POST['date'];
        $start = $_POST['start'];

        $app = $this->M_Dashboard->GetAppointmentBy($id_service, $id_doctor, $date, $start);

        print $app['error'];
    }

    function GoToAppointments($view="dashboard/Dashboard", $msg="", $success="", $warning="", $error="")
    {
        $data['msg']=$msg;
        $data['success']=$success;
        $data['warning']=$warning;
        $data['error']=$error;
        $data['view']=$view;

        $data['go_layout']=$this->input->post('go_layout');
        $data['delete_id']=$this->input->post('delete_id');
        $data['id_doc']=$this->input->post('id_doc');
        $data['id_serv']=$this->input->post('id_serv');
        $data['old_app']=$this->input->post('old_app');
        $data['ReminderEmail']=$this->input->post('ReminderEmail');
        $data['ReminderMsg']=$this->input->post('ReminderMsg');
        $data['ReminderContactBy']=$this->input->post('ReminderContactBy');

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
            print 1;
        }
    }
}