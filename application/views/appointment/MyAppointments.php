<ul class="nav nav-tabs bordered" id="myTab1">
    <li class="active"><a data-toggle="tab" href="#s1">All <span class="badge txt-color-white" id="badge_all"></span></a></li>
    <li><a data-toggle="tab" href="#s2">Pending <span class="badge txt-color-white" style="background-color: #d9534f;" id="badge_pending"></span></a></li>
    <li><a data-toggle="tab" href="#s3">Confirmed <span class="badge txt-color-white" style="background-color: #0F9B0F;" id="badge_confirm"></span></a></li>
    <li><a data-toggle="tab" href="#s4">Calendar <span class="badge txt-color-white" id="badge_all1"></span></a></li>
</ul>

<div class="tab-content" id="myTabContent1">

    <div class="tab-pane active" id="s1">
        <div class="row">
            <section>
                <?php

                $not_confirm=0;
                $confirm=0;
                $all=0;
                $next_app_date='';

                if(isset($data['my_all_appointments']['data']))
                {
                    $all=sizeof($data['my_all_appointments']['data']);
                    ?>

                    <fieldset class="myfieldset" style="margin-top: -10px">
                    <legend class="mylegend">All appointments</legend>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <ul class="timeline-v1">

                                    <?php
                                    for($i=0;$i<sizeof($data['my_all_appointments']['data']);$i++)
                                    {
                                        if($i==0 && $next_app_date=='')$next_app_date=date('M j, Y',strtotime($data['my_all_appointments']['data'][$i]['APT_Date'])) . ' ' . date('h:i A',strtotime($data['my_all_appointments']['data'][$i]['APT_Time']));

                                        if($data['my_all_appointments']['data'][$i]['APT_Date']==date('m/d/Y'))
                                            $label_date='<span class="badge" style="background-color: #CB201C;">Today at ' . date('h:i A',strtotime($data['my_all_appointments']['data'][$i]['APT_Time'])).'</span>';
                                        elseif($data['my_all_appointments']['data'][$i]['APT_Date']==date("m/d/Y", strtotime("+1 day")))
                                            $label_date='<span class="badge" style="background-color: #FF694E;">Tomorrow at ' . date('h:i A',strtotime($data['my_all_appointments']['data'][$i]['APT_Time'])).'</span>';
                                        else
                                            $label_date='<span class="badge">'. date('M jS Y',strtotime($data['my_all_appointments']['data'][$i]['APT_Date'])) . ' ' . date('h:i A',strtotime($data['my_all_appointments']['data'][$i]['APT_Time'])).'</span>';

                                        $timeline_date=date('m/d/Y',strtotime($data['my_all_appointments']['data'][$i]['APT_Date']));
                                        $timeline_month=date('F',strtotime($data['my_all_appointments']['data'][$i]['APT_Date']));


                                        if ($data['my_all_appointments']['data'][$i]['TokenConfirmApp'] != '')$status='Pending';else $status='Confirmed';
                                        $cancel_note = 'To Cancel or Reschedule less than 24 hours, call the office 513-351-FACE(3223)';

                                        $concern='Hello, I have a concern about an appointment with Id: '
                                            .$data['my_all_appointments']['data'][$i]['RecordID']. ' '
                                            .$data['my_all_appointments']['data'][$i]['APT_Title']. ' '
                                            .$data['my_all_appointments']['data'][$i]['APT_Date'].' '.date('h:i A',strtotime($data['my_all_appointments']['data'][$i]['APT_Time']));

                                        switch ($data['my_all_appointments']['data'][$i]['ReminderEmail'])
                                        {
                                            case '':
                                                $send_me_email="Don't reminder";
                                                break;
                                            case -1:
                                                $send_me_email="Don't reminder";
                                                break;
                                            case 30:
                                                $send_me_email="30 min before";
                                                break;
                                            case 60:
                                                $send_me_email="1 hr before";
                                                break;
                                            case 120:
                                                $send_me_email="2 hrs before";
                                                break;
                                            case 1440:
                                                $send_me_email="1 day before";
                                                break;
                                            case 2880:
                                                $send_me_email="2 days before";
                                                break;
                                        }

                                        switch ($data['my_all_appointments']['data'][$i]['ReminderContactBy'])
                                        {
                                            case '':
                                                $contact_by="Email only";
                                                break;
                                            case 'no':
                                                $contact_by="Email only";
                                                break;
                                            case 'call':
                                                $contact_by="Call";
                                                break;
                                            case 'sms':
                                                $contact_by="SMS";
                                                break;
                                        }

                                        switch ($data['my_all_appointments']['data'][$i]['ReminderSent'])
                                        {
                                            case 1:
                                                $sent_reminder='Yes';
                                                break;
                                            case 0:
                                                $sent_reminder='No';
                                                break;
                                            case '':
                                                $sent_reminder='No';
                                                break;
                                        }

                                        $info=
                                            '<b>Id:</b> '.$data['my_all_appointments']['data'][$i]['RecordID'].
                                            '<br><b>Title:</b> '.$data['my_all_appointments']['data'][$i]['APT_Title'].
                                            '<br><b>Date and Time:</b> '.date('M jS Y',strtotime($data['my_all_appointments']['data'][$i]['APT_Date'])).' '.date('h:i A',strtotime($data['my_all_appointments']['data'][$i]['APT_Time'])).
                                            '<br><b>Provider:</b> '.$data['my_all_appointments']['data'][$i]['FirstName'].' '.$data['my_all_appointments']['data'][$i]['LastName'].
                                            '<br><b>Status:</b> '.$status;
                                        if($send_me_email!='')$info.='<br><b>Send me an Email:</b> '.$send_me_email;
                                        if($data['my_all_appointments']['data'][$i]['ReminderMsg']!='')$info.='<br><b>My message:</b> '.$data['my_all_appointments']['data'][$i]['ReminderMsg'];
                                        $info.='<br><b>Contact me by:</b> '.$contact_by;
                                        if($sent_reminder!='')$info.='<br><b>Sent reminder:</b> '.$sent_reminder;

                                        date_default_timezone_set('America/New_York');
                                        $today_timestamp = strtotime('now');
                                        $date = strtotime($data['my_all_appointments']['data'][$i]['APT_Date'] . ' ' . $data['my_all_appointments']['data'][$i]['APT_Time']);
                                        $dif = $date - $today_timestamp;

                                        if ($dif > 86400)
                                        {
                                            $cancel_btn = 1;
                                        } else
                                        {
                                            $cancel_btn = 0;
                                        }
                                    ?>

                                        <li>
                                            <div class="timeline-badge primary">
                                                <i class="entypo-cd" style="color: #0F9B0F;"></i>
                                                <time class="cbp_tmtime hidden-xs" datetime=""><span><?php print $timeline_date;?></span> <span><?php print $timeline_month;?></span></time>
                                            </div>
                                            <div class="timeline-panel" style="padding-top: 10px;">
                                                <article style="padding-bottom: 10px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="card_<?php print $i; ?>">

                                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="height:150px;background-color: #ccc;text-align:center;padding: 5px;padding-top:35px;font-size: 10px;">
                                                        <?php if($data['my_all_appointments']['data'][$i]['APT_Date']==date('m/d/Y')){?>
                                                        <img src="<?php print base_url('assets/images/ribbon_left_danger.png')?>" class="ribbon_left" alt="">
                                                        <?php }elseif($data['my_all_appointments']['data'][$i]['APT_Date']==date("m/d/Y", strtotime("+1 day"))) {?>
                                                        <img src="<?php print base_url('assets/images/ribbon_left_warning.png')?>" class="ribbon_left" alt="">
                                                        <?php }?>

                                                        <?php
                                                        print '<img class="doc_img" style="width: 60px;" src="';
                                                        if ($data['my_all_appointments']['data'][$i]['Photo']) print $data['my_all_appointments']['data'][$i]['Photo']; else print base_url('assets/images/male.png');
                                                        print '"/><br><br>';
                                                        print $data['my_all_appointments']['data'][$i]['FirstName'] . ' ' . $data['my_all_appointments']['data'][$i]['LastName'].'<br>'.
                                                        $data['my_all_appointments']['data'][$i]['Service'];
                                                        ?>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" style="text-align:center;background-color: #eee;color:#000;padding: 10px;">
                                                        <div style="float: right;position: relative;font-size: 16px;">

                                                            <a target="_blank" href="<?php print base_url('/Appointment/PrintAppointment/' . $data['my_all_appointments']['data'][$i]['RecordID']); ?>">
                                                                <span class="entypo-printer"></span>
                                                            </a>
                                                            <br>
                                                            <a target="_blank" class="chat" data-content="<?php print $concern;?>">
                                                                <span class="entypo-chat"></span>
                                                            </a>
                                                            <br>
                                                            <a data-container="body" data-toggle="popover" data-html="true" data-placement="top" data-content="<?php print $info.'<br><br><b>'.$cancel_note.'</b>';?>">
                                                                <span class="entypo-info2"></span>
                                                            </a>
                                                            <br>
                                                            <a class="download_ical" id="<?php print $i;?>">
                                                                <span class="brankic-calendar"></span>
                                                            </a>
                                                        </div>

                                                        <div style="text-align:center;font-weight: bold; font-size: 12px;"><?php print $data['my_all_appointments']['data'][$i]['APT_Title']; ?></div>
                                                        <br>

                                                        <?php print $label_date;?>

                                                        <br><br>

                                                        <?php if ($data['my_all_appointments']['data'][$i]['TokenConfirmApp'] != '') { ?>

                                                            <div class="text-danger"
                                                                 style="text-align:center;font-weight: bold; font-size: 15px;">
                                                                Status: Pending <span class="brankic-warning"></span>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="text-success"
                                                                 style="text-align:center;font-weight: bold; font-size: 15px;">
                                                                Status: Confirmed <span class="brankic-checkmark"></span>
                                                            </div>
                                                        <?php } ?>

                                                        <hr style="border-top: 1px solid #8c8b8b;border-bottom: 1px solid #fff;margin-top: 7px; margin-bottom: 0px;">

                                                        <div style="text-align:right;">
                                                            <?php
                                                            if ($data['my_all_appointments']['data'][$i]['TokenConfirmApp'] != '')
                                                            {
                                                                $not_confirm++;
                                                                ?>
                                                                <button type="button"
                                                                        class="btn btn-xs btn_confirm_app btn-success"
                                                                        id="<?php print $i; ?>">Confirm
                                                                </button>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                $confirm++;
                                                                ?>
                                                                <button type="button" class="btn btn-xs resend_email btn-success"
                                                                        id="<?php print $i; ?>">Resend email
                                                                </button>
                                                                <?php
                                                            }
                                                            if ($cancel_btn == 1)
                                                            {
                                                                ?>
                                                                <button type="button" class="btn btn-xs btn_reschedule btn-warning" id="<?php print $i;?>">Reschedule</button>
                                                                <button type="button" class="btn btn-xs btn_cancel btn-danger" id="<?php print $i;?>">Cancel</button>
                                                                <?php
                                                            }
                                                            ?>

                                                        </div>

                                                        <form method="post" action="Dashboard/DownloadiCal"
                                                              id="frm_next_<?php print $i; ?>">

                                                            <input id="hdn_title_<?php print $i; ?>" type="hidden"
                                                                   value="<?php print $data['my_all_appointments']['data'][$i]['APT_Title']; ?>"/>
                                                            <input id="hdn_date_<?php print $i; ?>" type="hidden"
                                                                   value="<?php print $data['my_all_appointments']['data'][$i]['APT_Date']; ?>"/>
                                                            <input id="hdn_time_<?php print $i; ?>" type="hidden"
                                                                   value="<?php print date('h:i A',strtotime($data['my_all_appointments']['data'][$i]['APT_Time'])); ?>"/>
                                                            <input id="hdn_doc_<?php print $i; ?>" type="hidden"
                                                                   value="<?php print $data['my_all_appointments']['data'][$i]['FirstName'] . ' ' . $data['my_all_appointments']['data'][$i]['LastName']; ?>"/>
                                                            <input id="hdn_ser_<?php print $i; ?>" type="hidden"
                                                                   value="<?php print $data['my_all_appointments']['data'][$i]['Service']; ?>"/>
                                                            <input id="hdn_tok_<?php print $i; ?>" type="hidden"
                                                                   value="<?php print $data['my_all_appointments']['data'][$i]['TokenConfirmApp']; ?>"/>
                                                            <input id="hdn_id_doc_<?php print $i; ?>" type="hidden"
                                                                   value="<?php print $data['my_all_appointments']['data'][$i]['ProviderRec']; ?>"/>
                                                            <input id="hdn_id_serv_<?php print $i; ?>" type="hidden"
                                                                   value="<?php print $data['my_all_appointments']['data'][$i]['_kf_ServiceID']; ?>"/>
                                                            <input id="hdn_id_zpk_Appointment_Rec<?php print $i; ?>"
                                                                   type="hidden"
                                                                   value="<?php print $data['my_all_appointments']['data'][$i]['__zpk_Appointment_Rec']; ?>"/>
                                                            <input id="hdn_id_<?php print $i; ?>" type="hidden"
                                                                   value="<?php print $data['my_all_appointments']['data'][$i]['RecordID']; ?>"/>

                                                            <input name="hdn_ical_start_<?php print $i; ?>" type="hidden"
                                                                   value="<?php print $data['my_all_appointments']['data'][$i]['APT_Date'] . ' ' . date('h:i A',strtotime($data['my_all_appointments']['data'][$i]['APT_Time'])); ?>"/>
                                                            <input name="hdn_ical_end_<?php print $i; ?>" type="hidden"
                                                                   value="<?php print $data['my_all_appointments']['data'][$i]['APT_Date'] . ' ' . $data['my_all_appointments']['data'][$i]['APT_TimeEnd']; ?>"/>
                                                            <input name="hdn_ical_addr" type="hidden"
                                                                   value="<?php print '3805 Edwards Rd 100 Cincinnati, OH 45244'; ?>"/>
                                                            <input name="hdn_ical_url" type="hidden"
                                                                   value="<?php print '351face.com'; ?>"/>
                                                            <input name="hdn_ical_title_<?php print $i; ?>" type="hidden"
                                                                   value="<?php print $data['my_all_appointments']['data'][$i]['APT_Title']; ?>"/>
                                                            <input name="hdn_ical_date_<?php print $i; ?>" type="hidden"
                                                                   value="<?php print $data['my_all_appointments']['data'][$i]['APT_Date']; ?>"/>
                                                            <input name="hdn_item_<?php print $i; ?>" type="hidden"
                                                                   value="<?php print $i; ?>"/>
                                                            <input id="hdn_old_app_<?php print $i; ?>" type="hidden" value="<?php print $info; ?>"/>
                                                            <input id="hdn_ReminderEmail_<?php print $i; ?>" type="hidden" value="<?php print $data['my_all_appointments']['data'][$i]['ReminderEmail']; ?>"/>
                                                            <input id="hdn_ReminderMsg_<?php print $i; ?>" type="hidden" value="<?php print $data['my_all_appointments']['data'][$i]['ReminderMsg']; ?>"/>
                                                            <input id="hdn_ReminderContactBy_<?php print $i; ?>" type="hidden" value="<?php print $data['my_all_appointments']['data'][$i]['ReminderContactBy']; ?>"/>

                                                        </form>
                                                    </div>

                                                </article>
                                            </div>
                                        </li>
                                        <li class="clearfix" style="float: none;"></li>

                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                                <fieldset class="myfieldset" style="margin-top: -10px">
                                    <legend class="mylegend">Your next appointment is in</legend>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                        <div class="countdown" id="js-countdown">
                                            <div class="countdown__item countdown__item--large">
                                                <div class="countdown__timer js-countdown-days" aria-labelledby="day-countdown">

                                                </div>

                                                <div class="countdown__label" id="day-countdown">Days</div>
                                            </div>

                                            <div class="countdown__item">
                                                <div class="countdown__timer js-countdown-hours" aria-labelledby="hour-countdown">

                                                </div>

                                                <div class="countdown__label" id="hour-countdown">Hours</div>
                                            </div>

                                            <div class="countdown__item">
                                                <div class="countdown__timer js-countdown-minutes" aria-labelledby="minute-countdown">

                                                </div>

                                                <div class="countdown__label" id="minute-countdown">Minutes</div>
                                            </div>

                                            <div class="countdown__item">
                                                <div class="countdown__timer js-countdown-seconds" aria-labelledby="second-countdown">

                                                </div>

                                                <div class="countdown__label" id="second-countdown">Seconds</div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                <fieldset class="myfieldset" style="margin-top: -10px">
                                    <legend class="mylegend">Where you can find us?</legend>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <iframe width="100%" height="225px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3094.136945070171!2d-84.44422776430045!3d39.14886676372474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8841b287364d37bb%3A0xf2cae7e0cad59f0!2s3805+Edwards+Rd+%23100%2C+Cincinnati%2C+OH+45209!5e0!3m2!1sen!2sus!4v1514489513158" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-top: 20px;">
                                <fieldset class="myfieldset" style="margin-top: -10px">
                                    <legend class="mylegend">Advertisement</legend>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="bannercontainer" >
                                            <div class="banner" >
                                                <ul>
                                                    <!-- THE FIRST SLIDE -->
                                                    <li data-transition="fade,papercut" data-slotamount="10" data-masterspeed="300" data-target="_blank" data-slideindex="back">


                                                    <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                                                        <img src="assets/images/slider/revolution/bg1.jpg">

                                                        <div class="caption large_text sfb bg-black-opacity"
                                                             data-x="196"
                                                             data-y="12"
                                                             data-speed="300"
                                                             data-start="800"
                                                             data-easing="easeOutExpo">
                                                            Advanced Cosmetic Surgery
                                                        </div>

                                                        <div class="caption randomrotate"
                                                             data-x="209"
                                                             data-y="256"
                                                             data-speed="600"
                                                             data-start="1100"
                                                             data-easing="easeOutExpo">
                                                            <img class="img-border" src="assets/images/slider/revolution/p1.jpg" alt="Image 2">
                                                        </div>

                                                        <div class="caption randomrotate"
                                                             data-x="20"
                                                             data-y="272"
                                                             data-speed="600"
                                                             data-start="1200"
                                                             data-easing="easeOutExpo">
                                                            <img class="img-border" src="assets/images/slider/revolution/p2.jpg" alt="Image 3">
                                                        </div>

                                                        <div class="caption randomrotate"
                                                             data-x="220"
                                                             data-y="389"
                                                             data-speed="600"
                                                             data-start="1300"
                                                             data-easing="easeOutExpo">
                                                            <img class="img-border" src="assets/images/slider/revolution/p6.jpg" alt="Image 4">
                                                        </div>

                                                        <div class="caption randomrotate"
                                                             data-x="117"
                                                             data-y="257"
                                                             data-speed="300"
                                                             data-start="1400"
                                                             data-easing="easeOutExpo">
                                                            <img class="img-border" src="assets/images/slider/revolution/p4.jpg" alt="Image 5">
                                                        </div>

                                                        <div class="caption randomrotate"
                                                             data-x="34"
                                                             data-y="402"
                                                             data-speed="600"
                                                             data-start="1500"
                                                             data-easing="easeOutExpo">
                                                            <img class="img-border" src="assets/images/slider/revolution/p5.jpg" alt="Image 6">
                                                        </div>

                                                        <div class="caption randomrotate"
                                                             data-x="86"
                                                             data-y="325"
                                                             data-speed="300"
                                                             data-start="2000"
                                                             data-easing="easeOutExpo"  ><img src="assets/images/slider/revolution/p7.jpg" alt="Image 7">
                                                        </div>

                                                    </li>

                                                    <li data-transition="papercut" data-slotamount="15" data-masterspeed="300" data-target="_blank" data-delay="9400">

                                                        <!-- THE MAIN IMAGE IN THE SECOND SLIDE -->
                                                        <img src="assets/images/slider/revolution/bg2.jpg">

                                                        <div class="caption very_big_white lfl stl"
                                                             data-x="38"
                                                             data-y="343"
                                                             data-speed="300"
                                                             data-start="500"
                                                             data-easing="easeOutExpo" data-end="8800" data-endspeed="300" data-endeasing="easeInSine">
                                                            Feel proud to say every day!
                                                        </div>

                                                        <div class="caption big_white lfl stl"
                                                             data-x="38"
                                                             data-y="390"
                                                             data-speed="300"
                                                             data-start="800"
                                                             data-easing="easeOutExpo" data-end="9100" data-endspeed="300" data-endeasing="easeInSine">
                                                            “I woke up like this”
                                                        </div>

                                                        <div class="caption lft ltb"
                                                             data-x="600"
                                                             data-y="0"
                                                             data-speed="600"
                                                             data-start="1100"
                                                             data-easing="easeOutExpo" data-end="7100" data-endspeed="600" data-endeasing="easeInSine">
                                                            <img src="assets/images/slider/revolution/s2_p1.jpg" alt="Image 3">
                                                        </div>

                                                        <div class="caption bold_green_text sft stb"
                                                             data-x="610"
                                                             data-y="290"
                                                             data-speed="300"
                                                             data-start="1400"
                                                             data-easing="easeOutExpo" data-end="7300" data-endspeed="300" data-endeasing="easeInSine">
                                                            Cheer on your team without <br>the fear of underarm sweat!
                                                        </div>

                                                        <div class="caption big_black sfb stb"
                                                             data-x="610"
                                                             data-y="320"
                                                             data-speed="300"
                                                             data-start="1700"
                                                             data-easing="easeOutExpo" data-end="7200" data-endspeed="300" data-endeasing="easeInSine">

                                                        </div>

                                                        <div class="caption lft ltb"
                                                             data-x="600"
                                                             data-y="0"
                                                             data-speed="600"
                                                             data-start="3600"
                                                             data-easing="easeOutExpo" data-end="5600" data-endspeed="600" data-endeasing="easeInSine">
                                                            <img src="assets/images/slider/revolution/s2_p2.jpg" alt="Image 6">
                                                        </div>

                                                        <div class="caption bold_brown_text sft stb"
                                                             data-x="610"
                                                             data-y="290"
                                                             data-speed="300"
                                                             data-start="3900"
                                                             data-easing="easeOutExpo" data-end="5800" data-endspeed="300" data-endeasing="easeInSine" >
                                                            It’s not luck…
                                                        </div>

                                                        <div class="caption big_black sfb stb"
                                                             data-x="610"
                                                             data-y="320"
                                                             data-speed="300"
                                                             data-start="4200"
                                                             data-easing="easeOutExpo" data-end="5700" data-endspeed="300" data-endeasing="easeInSine">
                                                            It’s Advanced Cosmetic!
                                                        </div>


                                                    </li>
                                                </ul>

                                                <div class="tp-bannertimer tp-bottom"></div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>


                        </div>
                    </fieldset>
                    <?php
                }
                else print '<div class="text-center"><h3>You don\'t have any future appointments.</h3></div>';
                ?>
            </section>
        </div>
    </div>

    <div class="tab-pane fade" id="s2">
        <div class="row">
            <section>
                <?php
                if(isset($data['my_all_appointments']['data']))
                {
                    ?>

                    <fieldset class="myfieldset"  style="margin-top: -10px">
                        <legend class="mylegend">Pending appointments</legend>
                        <div class="row" style="margin-bottom: 10px;">

                            <?php
                            for($i=0;$i<sizeof($data['my_all_appointments']['data']);$i++)
                            {
                                if($data['my_all_appointments']['data'][$i]['TokenConfirmApp']!='')
                                {
                                    if($data['my_all_appointments']['data'][$i]['APT_Date']==date('m/d/Y'))
                                        $label_date='<span class="badge" style="background-color: #CB201C;">Today at ' . date('h:i A',strtotime($data['my_all_appointments']['data'][$i]['APT_Time'])).'</span>';
                                    elseif($data['my_all_appointments']['data'][$i]['APT_Date']==date("m/d/Y", strtotime("+1 day")))
                                        $label_date='<span class="badge" style="background-color: #FF694E;">Tomorrow at ' . date('h:i A',strtotime($data['my_all_appointments']['data'][$i]['APT_Time'])).'</span>';
                                    else
                                        $label_date='<span class="badge">'. date('M jS Y',strtotime($data['my_all_appointments']['data'][$i]['APT_Date'])) . ' ' . date('h:i A',strtotime($data['my_all_appointments']['data'][$i]['APT_Time'])).'</span>';
                                    ?>

                                    <article style="padding-bottom: 10px;" class="col-xs-12 col-sm-6 col-md-4 col-lg-4" id="card_<?php print $i; ?>">
                                        <div style="display: table;width: 100%;height: 90px;">
                                            <div style="display: table-row;">

                                                <div style="display: table-cell;background-color: #ccc;position:relative;vertical-align:middle;text-align:center;width: 30%;padding: 5px;font-size: 10px;">
                                                    <?php if($data['my_all_appointments']['data'][$i]['APT_Date']==date('m/d/Y')){?>
                                                        <img src="<?php print base_url('assets/images/ribbon_left_danger.png')?>" class="ribbon_left" alt="">
                                                    <?php }elseif($data['my_all_appointments']['data'][$i]['APT_Date']==date("m/d/Y", strtotime("+1 day"))) {?>
                                                        <img src="<?php print base_url('assets/images/ribbon_left_warning.png')?>" class="ribbon_left" alt="">
                                                    <?php }?>

                                                    <?php
                                                    print '<img class="doc_img" style="width: 60%;" src="';
                                                    if ($data['my_all_appointments']['data'][$i]['Photo']) print $data['my_all_appointments']['data'][$i]['Photo']; else print base_url('assets/images/male.png');
                                                    print '"/><br><br>';
                                                    print $data['my_all_appointments']['data'][$i]['FirstName'] . ' ' . $data['my_all_appointments']['data'][$i]['LastName'].'<br>'.
                                                    $data['my_all_appointments']['data'][$i]['Service'];
                                                    ?>
                                                </div>
                                                <div class="" style="text-align:center; display: table-cell;background-color: #eee;color:#000;padding: 10px;width: 70%;">
                                                    <div style="float: right;position: relative;font-size: 16px;">
                                                        <?php
                                                        if ($data['my_all_appointments']['data'][$i]['TokenConfirmApp'] != '')$status='Pending';else $status='Confirmed';
                                                        $cancel_note = 'To Cancel or Reschedule less than 24 hours, call the office 513-351-FACE(3223)';

                                                        $concern='Hello, I have a concern about an appointment with Id: '
                                                            .$data['my_all_appointments']['data'][$i]['RecordID']. ' '
                                                            .$data['my_all_appointments']['data'][$i]['APT_Title']. ' '
                                                            .$data['my_all_appointments']['data'][$i]['APT_Date'].' '.date('h:i A',strtotime($data['my_all_appointments']['data'][$i]['APT_Time']));

                                                        switch ($data['my_all_appointments']['data'][$i]['ReminderEmail'])
                                                        {
                                                            case '':
                                                                $send_me_email="Don't reminder";
                                                                break;
                                                            case -1:
                                                                $send_me_email="Don't reminder";
                                                                break;
                                                            case 30:
                                                                $send_me_email="30 min before";
                                                                break;
                                                            case 60:
                                                                $send_me_email="1 hr before";
                                                                break;
                                                            case 120:
                                                                $send_me_email="2 hrs before";
                                                                break;
                                                            case 1440:
                                                                $send_me_email="1 day before";
                                                                break;
                                                            case 2880:
                                                                $send_me_email="2 days before";
                                                                break;
                                                        }

                                                        switch ($data['my_all_appointments']['data'][$i]['ReminderContactBy'])
                                                        {
                                                            case '':
                                                                $contact_by="Email only";
                                                                break;
                                                            case 'no':
                                                                $contact_by="Email only";
                                                                break;
                                                            case 'call':
                                                                $contact_by="Call";
                                                                break;
                                                            case 'sms':
                                                                $contact_by="SMS";
                                                                break;
                                                        }

                                                        switch ($data['my_all_appointments']['data'][$i]['ReminderSent'])
                                                        {
                                                            case 1:
                                                                $sent_reminder='Yes';
                                                                break;
                                                            case 0:
                                                                $sent_reminder='No';
                                                                break;
                                                            case '':
                                                                $sent_reminder='No';
                                                                break;
                                                        }

                                                        $info=
                                                            '<b>Id:</b> '.$data['my_all_appointments']['data'][$i]['RecordID'].
                                                            '<br><b>Title:</b> '.$data['my_all_appointments']['data'][$i]['APT_Title'].
                                                            '<br><b>Date and Time:</b> '.date('M jS Y',strtotime($data['my_all_appointments']['data'][$i]['APT_Date'])).' '.date('h:i A',strtotime($data['my_all_appointments']['data'][$i]['APT_Time'])).
                                                            '<br><b>Provider:</b> '.$data['my_all_appointments']['data'][$i]['FirstName'].' '.$data['my_all_appointments']['data'][$i]['LastName'].
                                                            '<br><b>Status:</b> '.$status;
                                                        if($send_me_email!='')$info.='<br><b>Send me an Email:</b> '.$send_me_email;
                                                        if($data['my_all_appointments']['data'][$i]['ReminderMsg']!='')$info.='<br><b>My message:</b> '.$data['my_all_appointments']['data'][$i]['ReminderMsg'];
                                                        $info.='<br><b>Contact me by:</b> '.$contact_by;
                                                        if($sent_reminder!='')$info.='<br><b>Sent reminder:</b> '.$sent_reminder;
                                                        ?>
                                                        <a target="_blank" href="<?php print base_url('/Appointment/PrintAppointment/' . $data['my_all_appointments']['data'][$i]['RecordID']); ?>">
                                                            <span class="entypo-printer"></span>
                                                        </a>
                                                        <br>
                                                        <a target="_blank" class="chat" data-content="<?php print $concern;?>">
                                                            <span class="entypo-chat"></span>
                                                        </a>
                                                        <br>
                                                        <a data-container="body" data-toggle="popover" data-html="true" data-placement="top" data-content="<?php print $info.'<br><br><b>'.$cancel_note.'</b>';?>">
                                                            <span class="entypo-info2"></span>
                                                        </a>
                                                        <br>
                                                        <a class="download_ical" id="<?php print $i;?>">
                                                            <span class="brankic-calendar"></span>
                                                        </a>
                                                    </div>

                                                    <div style="text-align:center;font-weight: bold; font-size: 12px;"><?php print $data['my_all_appointments']['data'][$i]['APT_Title']; ?></div>
                                                    <br>

                                                    <?php print $label_date;?>

                                                    <br><br>

                                                    <?php if ($data['my_all_appointments']['data'][$i]['TokenConfirmApp'] != '') { ?>
                                                        <div class="text-danger"
                                                             style="text-align:center;font-weight: bold; font-size: 15px;">
                                                            Status: Pending <span class="brankic-warning"></span>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="text-success"
                                                             style="text-align:center;font-weight: bold; font-size: 15px;">
                                                            Status: Confirmed <span class="brankic-checkmark"></span>
                                                        </div>
                                                    <?php } ?>

                                                    <hr style="border-top: 1px solid #8c8b8b;border-bottom: 1px solid #fff;margin-top: 7px; margin-bottom: 0px;">
                                                    <?php
                                                    date_default_timezone_set('America/New_York');
                                                    $today_timestamp = strtotime('now');
                                                    $date = strtotime($data['my_all_appointments']['data'][$i]['APT_Date'] . ' ' . $data['my_all_appointments']['data'][$i]['APT_Time']);
                                                    $dif = $date - $today_timestamp;

                                                    if ($dif > 86400)
                                                    {
                                                        $cancel_btn = 1;
                                                    } else
                                                    {
                                                        $cancel_btn = 0;
                                                    }
                                                    ?>
                                                    <div style="text-align:right;">
                                                        <?php
                                                        if ($data['my_all_appointments']['data'][$i]['TokenConfirmApp'] != '')
                                                        {
                                                            ?>
                                                            <button type="button" class="btn btn-xs btn_confirm_app btn-success"
                                                                    id="<?php print $i; ?>">Confirm
                                                            </button>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <button type="button" class="btn btn-xs resend_email btn-success"
                                                                    id="<?php print $i; ?>">Resend email
                                                            </button>
                                                            <?php
                                                        }
                                                        if ($cancel_btn == 1)
                                                        {
                                                            ?>
                                                            <button type="button" class="btn btn-xs btn_reschedule btn-warning" id="<?php print $i;?>">Reschedule</button>
                                                            <button type="button" class="btn btn-xs btn_cancel btn-danger" id="<?php print $i;?>">Cancel</button>
                                                            <?php
                                                        }
                                                        ?>

                                                    </div>

                                                </div>
                                            </div>
                                    </article>

                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </fieldset>
                    <?php
                }
                else print '<div class="text-center"><h3>You don\'t have any pending appointments.</h3></div>';
                ?>
            </section>
        </div>
    </div>

    <div class="tab-pane fade" id="s3">
        <div class="row">
            <section>
                <?php
                if(isset($data['my_all_appointments']['data']))
                {
                    ?>

                    <fieldset class="myfieldset"  style="margin-top: -10px">
                        <legend class="mylegend">Confirmed appointments</legend>
                        <div class="row" style="margin-bottom: 10px;">

                            <?php
                            for($i=0;$i<sizeof($data['my_all_appointments']['data']);$i++)
                            {
                                if($data['my_all_appointments']['data'][$i]['TokenConfirmApp']=='')
                                {
                                    if($data['my_all_appointments']['data'][$i]['APT_Date']==date('m/d/Y'))
                                        $label_date='<span class="badge" style="background-color: #CB201C;">Today at ' . date('h:i A',strtotime($data['my_all_appointments']['data'][$i]['APT_Time'])).'</span>';
                                    elseif($data['my_all_appointments']['data'][$i]['APT_Date']==date("m/d/Y", strtotime("+1 day")))
                                        $label_date='<span class="badge" style="background-color: #FF694E;">Tomorrow at ' . date('h:i A',strtotime($data['my_all_appointments']['data'][$i]['APT_Time'])).'</span>';
                                    else
                                        $label_date='<span class="badge">'. date('M jS Y',strtotime($data['my_all_appointments']['data'][$i]['APT_Date'])) . ' ' . date('h:i A',strtotime($data['my_all_appointments']['data'][$i]['APT_Time'])).'</span>';
                                    ?>

                                    <article style="padding-bottom: 10px;" class="col-xs-12 col-sm-6 col-md-4 col-lg-4" id="card_<?php print $i; ?>">
                                        <div style="display: table;width: 100%;height: 90px;">
                                            <div style="display: table-row;">

                                                <div style="display: table-cell;background-color: #ccc;position:relative;vertical-align:middle;text-align:center;width: 30%;padding: 5px;font-size: 10px;">
                                                    <?php if($data['my_all_appointments']['data'][$i]['APT_Date']==date('m/d/Y')){?>
                                                        <img src="<?php print base_url('assets/images/ribbon_left_danger.png')?>" class="ribbon_left" alt="">
                                                    <?php }elseif($data['my_all_appointments']['data'][$i]['APT_Date']==date("m/d/Y", strtotime("+1 day"))) {?>
                                                        <img src="<?php print base_url('assets/images/ribbon_left_warning.png')?>" class="ribbon_left" alt="">
                                                    <?php }?>

                                                    <?php
                                                    print '<img class="doc_img" style="width: 60%;" src="';
                                                    if ($data['my_all_appointments']['data'][$i]['Photo']) print $data['my_all_appointments']['data'][$i]['Photo']; else print base_url('assets/images/male.png');
                                                    print '"/><br><br>';
                                                    print $data['my_all_appointments']['data'][$i]['FirstName'] . ' ' . $data['my_all_appointments']['data'][$i]['LastName'].'<br>'.
                                                    $data['my_all_appointments']['data'][$i]['Service'];
                                                    ?>
                                                </div>
                                                <div class="" style="text-align:center; display: table-cell;background-color: #eee;color:#000;padding: 10px;width: 70%;">
                                                    <div style="float: right;position: relative;font-size: 16px;">
                                                        <?php
                                                        if ($data['my_all_appointments']['data'][$i]['TokenConfirmApp'] != '')$status='Pending';else $status='Confirmed';
                                                        $cancel_note = 'To Cancel or Reschedule less than 24 hours, call the office 513-351-FACE(3223)';

                                                        $concern='Hello, I have a concern about an appointment with Id: '
                                                            .$data['my_all_appointments']['data'][$i]['RecordID']. ' '
                                                            .$data['my_all_appointments']['data'][$i]['APT_Title']. ' '
                                                            .$data['my_all_appointments']['data'][$i]['APT_Date'].' '.date('h:i A',strtotime($data['my_all_appointments']['data'][$i]['APT_Time']));

                                                        switch ($data['my_all_appointments']['data'][$i]['ReminderEmail'])
                                                        {
                                                            case '':
                                                                $send_me_email="Don't reminder";
                                                                break;
                                                            case -1:
                                                                $send_me_email="Don't reminder";
                                                                break;
                                                            case 30:
                                                                $send_me_email="30 min before";
                                                                break;
                                                            case 60:
                                                                $send_me_email="1 hr before";
                                                                break;
                                                            case 120:
                                                                $send_me_email="2 hrs before";
                                                                break;
                                                            case 1440:
                                                                $send_me_email="1 day before";
                                                                break;
                                                            case 2880:
                                                                $send_me_email="2 days before";
                                                                break;
                                                        }

                                                        switch ($data['my_all_appointments']['data'][$i]['ReminderContactBy'])
                                                        {
                                                            case '':
                                                                $contact_by="Email only";
                                                                break;
                                                            case 'no':
                                                                $contact_by="Email only";
                                                                break;
                                                            case 'call':
                                                                $contact_by="Call";
                                                                break;
                                                            case 'sms':
                                                                $contact_by="SMS";
                                                                break;
                                                        }

                                                        switch ($data['my_all_appointments']['data'][$i]['ReminderSent'])
                                                        {
                                                            case 1:
                                                                $sent_reminder='Yes';
                                                                break;
                                                            case 0:
                                                                $sent_reminder='No';
                                                                break;
                                                            case '':
                                                                $sent_reminder='No';
                                                                break;
                                                        }

                                                        $info=
                                                            '<b>Id:</b> '.$data['my_all_appointments']['data'][$i]['RecordID'].
                                                            '<br><b>Title:</b> '.$data['my_all_appointments']['data'][$i]['APT_Title'].
                                                            '<br><b>Date and Time:</b> '.date('M jS Y',strtotime($data['my_all_appointments']['data'][$i]['APT_Date'])).' '.date('h:i A',strtotime($data['my_all_appointments']['data'][$i]['APT_Time'])).
                                                            '<br><b>Provider:</b> '.$data['my_all_appointments']['data'][$i]['FirstName'].' '.$data['my_all_appointments']['data'][$i]['LastName'].
                                                            '<br><b>Status:</b> '.$status;
                                                        if($send_me_email!='')$info.='<br><b>Send me an Email:</b> '.$send_me_email;
                                                        if($data['my_all_appointments']['data'][$i]['ReminderMsg']!='')$info.='<br><b>My message:</b> '.$data['my_all_appointments']['data'][$i]['ReminderMsg'];
                                                        $info.='<br><b>Contact me by:</b> '.$contact_by;
                                                        if($sent_reminder!='')$info.='<br><b>Sent reminder:</b> '.$sent_reminder;
                                                        ?>
                                                        <a target="_blank" href="<?php print base_url('/Appointment/PrintAppointment/' . $data['my_all_appointments']['data'][$i]['RecordID']); ?>">
                                                            <span class="entypo-printer"></span>
                                                        </a>
                                                        <br>
                                                        <a target="_blank" class="chat" data-content="<?php print $concern;?>">
                                                            <span class="entypo-chat"></span>
                                                        </a>
                                                        <br>
                                                        <a data-container="body" data-toggle="popover" data-html="true" data-placement="top" data-content="<?php print $info.'<br><br><b>'.$cancel_note.'</b>';?>">
                                                            <span class="entypo-info2"></span>
                                                        </a>
                                                        <br>
                                                        <a class="download_ical" id="<?php print $i;?>">
                                                            <span class="brankic-calendar"></span>
                                                        </a>

                                                    </div>

                                                    <div style="text-align:center;font-weight: bold; font-size: 12px;"><?php print $data['my_all_appointments']['data'][$i]['APT_Title']; ?></div>
                                                    <br>

                                                    <?php print $label_date;?>

                                                    <br><br>

                                                    <?php if ($data['my_all_appointments']['data'][$i]['TokenConfirmApp'] != '') { ?>
                                                        <div class="text-danger"
                                                             style="text-align:center;font-weight: bold; font-size: 15px;">
                                                            Status: Pending <span class="brankic-warning"></span>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="text-success"
                                                             style="text-align:center;font-weight: bold; font-size: 15px;">
                                                            Status: Confirmed <span class="brankic-checkmark"></span>
                                                        </div>
                                                    <?php } ?>

                                                    <hr style="border-top: 1px solid #8c8b8b;border-bottom: 1px solid #fff;margin-top: 7px; margin-bottom: 0px;">
                                                    <?php
                                                    date_default_timezone_set('America/New_York');
                                                    $today_timestamp = strtotime('now');
                                                    $date = strtotime($data['my_all_appointments']['data'][$i]['APT_Date'] . ' ' . $data['my_all_appointments']['data'][$i]['APT_Time']);
                                                    $dif = $date - $today_timestamp;

                                                    if ($dif > 86400)
                                                    {
                                                        $cancel_btn = 1;
                                                    } else
                                                    {
                                                        $cancel_btn = 0;
                                                    }
                                                    ?>
                                                    <div style="text-align:right;">
                                                        <?php
                                                        if ($data['my_all_appointments']['data'][$i]['TokenConfirmApp'] != '')
                                                        {
                                                            ?>
                                                            <button type="button"
                                                                    class="btn btn-xs btn_confirm_app btn-success"
                                                                    style="1background-color: #492f91"
                                                                    id="<?php print $i; ?>">Confirm
                                                            </button>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <button type="button" class="btn btn-xs resend_email btn-success"
                                                                    style="1background-color: #492f91"
                                                                    id="<?php print $i; ?>">Resend email
                                                            </button>
                                                            <?php
                                                        }
                                                        if ($cancel_btn == 1)
                                                        {
                                                            ?>
                                                            <button type="button" class="btn btn-xs btn_reschedule btn-warning" id="<?php print $i;?>">Reschedule</button>
                                                            <button type="button" class="btn btn-xs btn_cancel btn-danger" id="<?php print $i;?>">Cancel</button>
                                                            <?php
                                                        }
                                                        ?>

                                                    </div>

                                                </div>
                                            </div>
                                    </article>
    
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </fieldset>
                    <?php
                }
                else print '<div class="text-center"><h3>You don\'t have any confirmed appointments.</h3></div>';
                ?>
            </section>
        </div>
    </div>

    <div class="tab-pane fade" id="s4">
        <div class="row">
            <section>

                <fieldset class="myfieldset" style="margin-top: -10px">
                    <legend class="mylegend">All appointments</legend>
                    <div class="row" style="margin-bottom: 10px;">

                        <div class="col-lg-offset-1 col-lg-10">
                            <div id='calendar' style="margin-top: 10px;"></div>
                        </div>

                    </div>
                </fieldset>

            </section>
        </div>
    </div>

</div>

<?php

$color_not_available = '#ffff66';
$text_color_not_available = '#000';
$events[]='';

if(isset($data['my_all_appointments']['data']))
{
    for($i=0;$i<sizeof($data['my_all_appointments']['data']);$i++)
    {
        $event['id'] = rand(1, 999999999999999);
        $event['title'] = $data['my_all_appointments']['data'][$i]['APT_Title'];
        $event['start'] = date("Y-m-d H:i:s", strtotime($data['my_all_appointments']['data'][$i]['APT_Date'] . ' ' . $data['my_all_appointments']['data'][$i]['APT_Time']));
        $event['end'] = date("Y-m-d H:i:s", strtotime($data['my_all_appointments']['data'][$i]['APT_Date'] . ' ' . $data['my_all_appointments']['data'][$i]['APT_TimeEnd']));
        $event['color'] = $color_not_available;
        $event['textColor'] = $text_color_not_available;
        if ($data['my_all_appointments']['data'][$i]['TokenConfirmApp'] != '')
            $event['confirm'] = 'text-danger';
        else
            $event['confirm'] = 'text-success';
        //if ($client_rec == $__zkp_Client_Rec)

        $events[] = $event;
    }
}

$events = json_encode($events);
?>
    <script type="text/javascript">
        $(document).ready(function()
        {
            if ($.fn.cssOriginal!=undefined)
                $.fn.css = $.fn.cssOriginal;

            $('.banner').revolution(
            {
                delay:5000,
                startheight:500,
                startwidth:960,


                hideThumbs:200,

                thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
                thumbHeight:50,
                thumbAmount:5,

                navigationType:"none",				// bullet, thumb, none
                navigationArrows:"solo",				// nexttobullets, solo (old name verticalcentered), none

                navigationStyle:"navbar",				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


                navigationHAlign:"center",				// Vertical Align top,center,bottom
                navigationVAlign:"bottom",					// Horizontal Align left,center,right
                navigationHOffset:0,
                navigationVOffset:20,

                soloArrowLeftHalign:"left",
                soloArrowLeftValign:"bottom",
                soloArrowLeftHOffset:20,
                soloArrowLeftVOffset:20,

                soloArrowRightHalign:"right",
                soloArrowRightValign:"bottom",
                soloArrowRightHOffset:20,
                soloArrowRightVOffset:20,

                touchenabled:"on",						// Enable Swipe Function : on/off
                onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off

                stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
                stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

                hideCaptionAtLimit:0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
                hideAllCaptionAtLilmit:0,				// Hide all The Captions if Width of Browser is less then this value
                hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value

                shadow:0,								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows  (No Shadow in Fullwidth Version !)
                fullWidth:"off"							// Turns On or Off the Fullwidth Image Centering in FullWidth Modus


            });

            $('#badge_all').html(<?php print $all;?>);
            $('#badge_all1').html(<?php print $all;?>);
            $('#badge_confirm').html(<?php print $confirm;?>);
            $('#badge_pending').html(<?php print $not_confirm;?>);

            $('.btn_confirm_app').on('click', function ()
            {
                var i = $(this).attr('id');//alert(i);

                var title=$('#hdn_title_'+i).val();
                var serv=$('#hdn_ser_'+i).val();
                var doc=$('#hdn_doc_'+i).val();
                var date=$('#hdn_date_'+i).val();
                var time=$('#hdn_time_'+i).val();
                var token=$('#hdn_tok_'+i).val();//alert(token);

                var from_email = "<?php print $email_from;?>";
                var from_name = "<?php print $email_from_name;?>";
                var email_to = "<?php print $email;?>";
                var reply_to_email = '';
                var reply_to_name = '';
                var subject = "Please Confirm Your Appointment";
                var attachments = './assets/images/logo.png';//&./assets/upload/1111.pdf
                var link = "<?php print base_url('/Dashboard/ConfirmApp/');?>" + token;
                var link_web = '351face.com';
                var body ='<p>Dear <?php print $bd_FirstName." ".$bd_LastName;?>,</p>' +
                    '<p>Thank you for submitting an application for an appointment at the <a href="' + link_web + '">Advanced Cosmetic Surgery & Laser Center.</a></p>' +
                    '<br>' +
                    '<p>Please click on this link to confirm your appointment details below.</p>' +
                    '<p><a href="' + link + '"><button class="btn btn-success">Confirm Appointment</button></a></p>' +
                    '<br>' +
                    '<p><strong>Date: </strong>'+date+'</p>' +
                    '<p><strong>Time: </strong>'+time+'</p>' +
                    '<p><strong>Provider: </strong>'+doc+'</p>' +
                    '<p><strong>Service: </strong>'+serv+'</p>' +
                    '<br>' +
                    '<p>Thank you,</p>' +
                    '<p>Advanced Cosmetic Surgery & Laser Center</p>' +
                    '<p>Rookwood Commons Shopping Center</p>' +
                    '<p>3805 Edwards Rd 100</p>' +
                    '<p>Cincinnati, OH 45244</p>' +
                    '<p>Phone: 513-351-FACE(3223)</p>' +
                    '<p>Fax: 513-396-8995</p>' +
                    '<br>' +
                    '<a href="' + link_web + '"><img src="cid:img_cid_0" alt="Advanced Cosmetic Surgery & Laser Center" /></a>';

                $.ajax(
                {
                    url:'Main/EnviarEmail',
                    type:'POST',
                    data:{from_email:from_email, from_name:from_name, email_to:email_to, reply_to_email:reply_to_email, reply_to_name:reply_to_name, subject:subject, body:body, attachments:attachments}
                }).done(function(response, textStatus, jqXHR)
                {
                    if(response == 'WRONG') {
                        $('#modal').html('Your email is wrong.');
                    }
                    else
                    {
                        $('#modal').html('A confirmation request email has been sent to ' + email_to+'<br><fieldset><div class="text-center"><a class="btn btn-default" data-dismiss="modal">Close</a></div></fieldset>');
                    }
                    $('#remoteModal').modal('show');
                });
            });

            $('.resend_email').on('click', function ()
            {
                var i = $(this).attr('id');//alert(i);

                var title=$('#hdn_title_'+i).val();
                var serv=$('#hdn_ser_'+i).val();
                var doc=$('#hdn_doc_'+i).val();
                var date=$('#hdn_date_'+i).val();
                var time=$('#hdn_time_'+i).val();

                var from_email = "<?php print $email_from;?>";
                var from_name = "<?php print $email_from_name;?>";
                var email_to = "<?php print $email;?>";
                var reply_to_email = '';
                var reply_to_name = '';
                var subject = "Appointment Reminder";
                var attachments = './assets/images/logo.png';//&./assets/upload/1111.pdf
                var link_web = '351face.com';
                var body = '<h1>Appointment Information</h1>' +
                    '<p>Dear <?php print $bd_FirstName." ".$bd_LastName;?>,</p>' +
                    '<p>You have an appointment at the <a href="' + link_web + '">Advanced Cosmetic Surgery & Laser Center.</a></p>' +
                    '<br>' +
                    '<p><strong>Title: </strong>'+title+'</p>' +
                    '<p><strong>Date: </strong>'+date+'</p>' +
                    '<p><strong>Time: </strong>'+time+'</p>' +
                    '<p><strong>Provider: </strong>'+doc+'</p>' +
                    '<p><strong>Service: </strong>'+serv+'</p>' +
                    '<br>' +
                    '<p>Thank you,</p>' +
                    '<p>Advanced Cosmetic Surgery & Laser Center</p>' +
                    '<p>Rookwood Commons Shopping Center</p>' +
                    '<p>3805 Edwards Rd 100</p>' +
                    '<p>Cincinnati, OH 45244</p>' +
                    '<p>Phone: 513-351-FACE(3223)</p>' +
                    '<p>Fax: 513-396-8995</p>' +
                    '<br>' +
                    //'<video poster="https://www.youtube.com/embed/fIRJu41GQSo" width="100%" height="50%" controls="controls">\n' +
                    //'<source src="https://www.youtube.com/embed/fIRJu41GQSo" type="video/mp4" />\n' +
                    //'<a href="https://www.youtube.com/embed/fIRJu41GQSo">\n' +
                    //'<img src="cid:img_cid_0" width="400" alt="Video" />\n' +
                    //'</a>\n' +
                    //'</video>' +
                    '<a href="' + link_web + '"><img src="cid:img_cid_0" alt="Advanced Cosmetic Surgery & Laser Center" /></a>';


                $.ajax(
                {
                    url:'Main/EnviarEmail',
                    type:'POST',
                    data:{from_email:from_email, from_name:from_name, email_to:email_to, reply_to_email:reply_to_email, reply_to_name:reply_to_name, subject:subject, body:body, attachments:attachments}
                }).done(function(response, textStatus, jqXHR)
                {
                    if(response == 'WRONG') {
                        $('#modal').html('<div class="text-center">Your email is wrong.</div><br><div class="text-center"><a class="btn btn-default" data-dismiss="modal">Close</a></div>');
                    }
                    else
                    {
                        $('#modal').html('<div class="text-center">A reminder email has been sent to ' + email_to+'</div><br><div class="text-center"><a class="btn btn-default" data-dismiss="modal">Close</a></div>');
                    }
                    $('#modal_title').html('Resend Email');
                    $('#remoteModal').modal('show');
                });
            });

            $('.download_ical').on('click', function ()
            {
                var i = $(this).attr('id');//alert(i);
                $('#frm_next_'+i).submit();
            });

            $('.btn_cancel').on('click', function ()
            {
                var i = $(this).attr('id');//alert(i);
                var id = $('#hdn_id_zpk_Appointment_Rec'+i).val();
                var go_layout='PHP_Appointment';
                var old_app = $('#hdn_old_app_'+i).val();

                //alertify.set('notifier','position', 'top-center');
                alertify.defaults.theme.ok = "btn btn-success";
                alertify.confirm("<div class='text-center'><h4>Are you sure you want to cancel?</h4></div><br><h6>Appointment to cancel:</h6>" + old_app, function()
                {
                    $.ajax(
                    {
                        url:'Appointment/CancelAppointment',
                        type:'POST',
                        data:{id:id}
                        /*url:'Main/DeleteObject',
                        type:'POST',
                        data:{go_layout:go_layout,id:id}*/
                    }).done(function(response, textStatus, jqXHR)
                    {
                        if(response == 'NO_CANCEL') {
                            $('#modal').html('<div class="text-center">You can not cancel the appointment, please, call the office at 513-351-FACE(3223).</div><br><div class="text-center"><a class="btn btn-default" data-dismiss="modal">Close</a></div>');
                        }
                        else
                        {
                            $('#modal').html('<div class="text-center">Your appointment has been canceled.</div><br><div class="text-center"><a class="btn btn-default" data-dismiss="modal">Close</a></div>');
                        }
                        $('#modal_title').html('Cancel Appointment');
                        $('#remoteModal').modal('show');
                        //$('#card_'+i).remove();

                        $("#remoteModal").on("hide.bs.modal", function ()
                        {
                            LoadContent('Appointment');
                        });
                    });
                }
                ,function()
                {
                    //alertify.set('notifier','position', 'top-center');
                    alertify.error('Declined.');
                }).set({labels:{ok:'Yes', cancel: 'Go back'}});


            });

            $('.btn_reschedule').on('click', function ()
            {
                $('.modal-backdrop').remove();
                $('body').removeClass("modal-open");

                var target = document.getElementById('container');
                var spinner = new Spinner(opts).spin(target);

                var i = $(this).attr('id');//alert(i);
                var delete_id = $('#hdn_id_zpk_Appointment_Rec'+i).val();//alert(id);
                var go_layout = 'PHP_Appointment';
                var id_doc = $('#hdn_id_doc_'+i).val();
                var id_serv = $('#hdn_id_serv_'+i).val();
                var old_app = $('#hdn_old_app_'+i).val();

                var ReminderEmail = $('#hdn_ReminderEmail_'+i).val();
                var ReminderMsg = $('#hdn_ReminderMsg_'+i).val();
                var ReminderContactBy = $('#hdn_ReminderContactBy_'+i).val();

                $( '.content-wrapper' ).empty();

                $.post("Dashboard/GoToAppointments", {go_layout:go_layout,delete_id:delete_id,id_doc:id_doc,id_serv:id_serv, old_app:old_app, ReminderEmail:ReminderEmail, ReminderMsg:ReminderMsg, ReminderContactBy:ReminderContactBy}, function(result)
                {
                    $('.content-wrapper').html(result);
                    alertify.defaults.transition = "slide";
                    alertify.defaults.theme.ok = "btn btn-success";
                    alertify.alert("<div class='text-center'><h4>To reschedule your appointment, click on any available space.</h4></div><br><br><h6>Appointment to reschedule:</h6><br>" + old_app);

                });
                spinner.stop();
            });

            $('.chat').on('click', function ()
            {
                Tawk_API.maximize();

                $("textarea#chatTextarea").html('dff');
                $("textarea#chatTextarea").text('dff');
            });

            $('body').on('click', '[data-toggle="popover"]',function(){
                $(this).popover('show')
            });

            $('body').on('mouseout', '[data-toggle="popover"]',function(){
                $(this).popover('hide')
            });

            $('#calendar').fullCalendar(
            {
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek'
                },
                selectable: true,
                hiddenDays: [ 0, 6 ],
                minTime:'6:00',
                maxTime:'19:00',
                allDaySlot:false,
                slotDuration:'00:15:00',
                displayEventTime: true,
                editable: false,
                timeFormat: 'hh:mm t',
                events: <?php print $events;?>,

                eventRender: function(event, eventElement)
                {
                    var view = $('#calendar').fullCalendar('getView');

                    var app='<br><br>'+event.title+'<br>'+ String(event.start);

                    if (event.confirm=='text-success')
                    {
                        eventElement.find(".fc-time").prepend('<div style="float: left;position: relative; font-size: 13px; top:0px;">' +
                            '<a data-container="body" data-toggle="popover" data-html="true" data-placement="top" data-content="<b>Appointment confirmed.</b>'+app+'" class="' + event.confirm + '">' +
                            '<span class="entypo-info2"></span></a>' +
                            '</div>&nbsp;');
                        if(view.name=='month')
                        {
                            eventElement.find(".fc-content").css({height: "16px"});
                        }
                    }
                    else if(event.confirm=='text-danger')
                    {
                        eventElement.find(".fc-time").prepend('<div style="float: left;position: relative; font-size: 13px; top:0px;">' +
                            '<a data-container="body" data-toggle="popover" data-html="true" data-placement="top" data-content="<b>Please, Confirm your appintment.</b>'+app+'" class="'+event.confirm+'">' +
                            '<span class="entypo-info2"></span></a>' +
                            '</div>&nbsp;');

                        if(view.name=='month')
                        {
                            eventElement.find(".fc-content").css({ height: "16px" });
                        }
                    }
                }
            });

            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                // TODO: check href of e.target to detect your tab
                //$("#show_cal:hidden").show();
                $('#calendar').fullCalendar('render');
            });

            const countdown = new Date("<?php print $next_app_date;?>");

            function getRemainingTime(endtime) {
                const milliseconds = Date.parse(endtime) - Date.parse(new Date());
                const seconds = Math.floor( (milliseconds/1000) % 60 );
                const minutes = Math.floor( (milliseconds/1000/60) % 60 );
                const hours = Math.floor( (milliseconds/(1000*60*60)) % 24 );
                const days = Math.floor( milliseconds/(1000*60*60*24) );

                return {
                    'total': milliseconds,
                    'seconds': seconds,
                    'minutes': minutes,
                    'hours': hours,
                    'days': days,
                };
            }

            function initClock(id, endtime) {
                const counter = document.getElementById(id);
                const daysItem = counter.querySelector('.js-countdown-days');
                const hoursItem = counter.querySelector('.js-countdown-hours');
                const minutesItem = counter.querySelector('.js-countdown-minutes');
                const secondsItem = counter.querySelector('.js-countdown-seconds');

                function updateClock() {
                    const time = getRemainingTime(endtime);

                    daysItem.innerHTML = time.days;
                    hoursItem.innerHTML = ('0' + time.hours).slice(-2);
                    minutesItem.innerHTML = ('0' + time.minutes).slice(-2);
                    secondsItem.innerHTML = ('0' + time.seconds).slice(-2);

                    if (time.total <= 0) {
                        clearInterval(timeinterval);
                    }
                }

                updateClock();
                const timeinterval = setInterval(updateClock, 1000);
            }

            initClock('js-countdown', countdown);


        });
    </script>