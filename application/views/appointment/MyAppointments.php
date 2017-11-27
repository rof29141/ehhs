<ul class="nav nav-tabs bordered" id="myTab1">
    <li class="active"><a data-toggle="tab" href="#s1">All <span class="badge bg-color-blue txt-color-white" id="badge_all"></span></a></li>
    <li><a data-toggle="tab" href="#s2">Pending <span class="badge bg-color-blue txt-color-white" id="badge_pending"></span></a></li>
    <li><a data-toggle="tab" href="#s3">Confirmed <span class="badge bg-color-blue txt-color-white" id="badge_confirm"></span></a></li>
    <li><a data-toggle="tab" id="show_cal" href="#s4">Calendar</a></li>
</ul>

<div class="tab-content" id="myTabContent1">

    <div class="tab-pane active" id="s1">
        <div class="row">
            <section>
                <?php
                if(isset($data['my_all_appointments']['data']))
                {
                    $not_confirm=0;
                    $confirm=0;
                    ?>

                    <fieldset class="myfieldset" style="margin-top: -10px">
                    <legend class="mylegend">All appointments</legend>
                        <div class="row" style="margin-bottom: 10px;">

                        <?php
                        for($i=0;$i<count($data['my_all_appointments']['data']);$i++)
                        {
                            if($data['my_all_appointments']['data'][$i]['APT_Date']==date('m/d/Y'))
                                $date='<div class="text-center font-weight-bold" style="font-size: 14px;"><a class="label_warning">Today at ' . $data['my_all_appointments']['data'][$i]['APT_Time'].'</a></div>';
                            else
                                $date='<div class="text-center font-weight-bold" style="font-size: 14px;">'. $data['my_all_appointments']['data'][$i]['APT_Date'] . ' ' . $data['my_all_appointments']['data'][$i]['APT_Time'].'</div>';
                            ?>

                            <article style="padding-bottom: 10px;" class="col-sm-12 col-md-6 col-lg-4">
                                <div style="display: table;width: 100%;height: 90px;">
                                    <div style="display: table-row;">

                                        <div style="display: table-cell;background-color: #ccc;position:relative;vertical-align:middle;text-align:center;width: 30%;padding: 5px;font-size: 10px;">
                                            <?php
                                            echo '<img class="doc_img" style="width: 70%;" src="';
                                            if ($data['my_all_appointments']['data'][$i]['Photo']) echo $data['my_all_appointments']['data'][$i]['Photo']; else echo base_url('assets/images/male.png');
                                            echo '"/><br><br>';
                                            echo $data['my_all_appointments']['data'][$i]['FirstName'] . ' ' . $data['my_all_appointments']['data'][$i]['LastName'];
                                            ?>
                                        </div>
                                        <div class="" style="text-align:center; display: table-cell;background-color: #eee;color:#000;padding: 10px;width: 70%;">
                                            <div style="float: right;position: relative;font-size: 16px;">
                                                <?php
                                                if ($data['my_all_appointments']['data'][$i]['TokenConfirmApp'] != '')$status='Not confirmed';else $status='Confirmed';
                                                $cancel_note = 'To Cancel or Reschedule less than 24 hours, call the office 513-351-FACE(3223)';

                                                $concern='Hello, I have a concern about an appointment with Id: '
                                                    .$data['my_all_appointments']['data'][$i]['RecordID']. ' '
                                                    .$data['my_all_appointments']['data'][$i]['APT_Title']. ' '
                                                    .$data['my_all_appointments']['data'][$i]['APT_Date'].' '.$data['my_all_appointments']['data'][$i]['APT_Time'];

                                                $info=
                                                    '<b>Id:</b> '.$data['my_all_appointments']['data'][$i]['RecordID'].
                                                    '<br><b>Title:</b> '.$data['my_all_appointments']['data'][$i]['APT_Title'].
                                                    '<br><b>Date and Time:</b> '.$data['my_all_appointments']['data'][$i]['APT_Date'].' '.$data['my_all_appointments']['data'][$i]['APT_Time'].
                                                    '<br><b>Provider:</b> '.$data['my_all_appointments']['data'][$i]['FirstName'].' '.$data['my_all_appointments']['data'][$i]['LastName'].
                                                    '<br><b>Status:</b> '.$status.
                                                    '<br><br><b>'.$cancel_note.'</b>';
                                                ?>
                                                <a target="_blank" href="<?php echo base_url('/Appointment/PrintAppointment/' . $data['my_all_appointments']['data'][$i]['RecordID']); ?>">
                                                    <span class="entypo-printer"></span>
                                                </a>
                                                <br>
                                                <a target="_blank" class="chat" data-content="<?php echo $concern;?>">
                                                    <span class="entypo-chat"></span>
                                                </a>
                                                <br>
                                                <a data-container="body" data-toggle="popover" data-html="true" data-placement="top" data-content="<?php echo $info;?>">
                                                    <span class="entypo-info2"></span>
                                                </a>
                                            </div>

                                            <div class=""
                                                 style="text-align:center;font-weight: bold; font-size: 11px;"><?php echo $data['my_all_appointments']['data'][$i]['APT_Title']; ?></div>
                                            <br>
                                            <div class=""
                                                 style="text-align:center;font-weight: bold; font-size: 12px;"><?php echo $data['my_all_appointments']['data'][$i]['Service']; ?></div>
                                            <br>
                                            <?php echo $date;?>

                                            <br>

                                            <?php if ($data['my_all_appointments']['data'][$i]['TokenConfirmApp'] != '') { ?>
                                                <div class="text-warning"
                                                     style="text-align:center;font-weight: bold; font-size: 15px;">
                                                    Status: Not Confirmed <span class="brankic-warning"></span>
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
                                            $today = strtotime(date('m/d/Y h:i:s'));
                                            $date = strtotime($data['my_all_appointments']['data'][$i]['APT_Date'] . ' ' . $data['my_all_appointments']['data'][$i]['APT_Time']);
                                            $dif = $date - $today;

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
                                                /*
                                                if ($cancel_btn == 0)
                                                {
                                                    ?>

                                                    <div style="text-align: center;padding-left:5px;padding-right:5px;top: 5px;position: relative;display: inline-block;"
                                                         class="note"><?php echo $cancel_note; ?></div>
                                                    <?php
                                                }*/
                                                ?>

                                                <?php

                                                if ($cancel_btn == 1)
                                                {
                                                    ?>
                                                    <button type="button" class="btn btn_cancel_app btn-danger"
                                                            style="1background-color: #492f91"
                                                            id="<?php echo $i; ?>">Cancel
                                                    </button>
                                                    <?php
                                                }
                                                if ($data['my_all_appointments']['data'][$i]['TokenConfirmApp'] != '')
                                                {
                                                    $not_confirm++;
                                                    ?>
                                                    <button type="button"
                                                            class="btn btn_confirm_app btn-success"
                                                            style="1background-color: #492f91"
                                                            id="<?php echo $i; ?>">Confirm
                                                    </button>
                                                    <?php
                                                }
                                                else
                                                {
                                                    $confirm++;
                                                    ?>
                                                    <button type="button" class="btn download_ical btn-success"
                                                            style="1background-color: #492f91"
                                                            id="<?php echo $i; ?>">Download iCal
                                                    </button>
                                                    <button type="button" class="btn resend_email btn-success"
                                                            style="1background-color: #492f91"
                                                            id="<?php echo $i; ?>">Resend email
                                                    </button>
                                                    <?php
                                                }
                                                ?>

                                            </div>

                                            <form method="post" action="Dashboard/DownloadiCal"
                                                  id="frm_next_<?php echo $i; ?>">

                                                <input id="hdn_title_<?php echo $i; ?>" type="hidden"
                                                       value="<?php echo $data['my_all_appointments']['data'][$i]['APT_Title']; ?>"/>
                                                <input id="hdn_date_<?php echo $i; ?>" type="hidden"
                                                       value="<?php echo $data['my_all_appointments']['data'][$i]['APT_Date']; ?>"/>
                                                <input id="hdn_time_<?php echo $i; ?>" type="hidden"
                                                       value="<?php echo $data['my_all_appointments']['data'][$i]['APT_Time']; ?>"/>
                                                <input id="hdn_doc_<?php echo $i; ?>" type="hidden"
                                                       value="<?php echo $data['my_all_appointments']['data'][$i]['FirstName'] . ' ' . $data['my_all_appointments']['data'][$i]['LastName']; ?>"/>
                                                <input id="hdn_ser_<?php echo $i; ?>" type="hidden"
                                                       value="<?php echo $data['my_all_appointments']['data'][$i]['Service']; ?>"/>
                                                <input id="hdn_tok_<?php echo $i; ?>" type="hidden"
                                                       value="<?php echo $data['my_all_appointments']['data'][$i]['TokenConfirmApp']; ?>"/>
                                                <input id="hdn_id_doc_<?php echo $i; ?>" type="hidden"
                                                       value="<?php echo $data['my_all_appointments']['data'][$i]['ProviderRec']; ?>"/>
                                                <input id="hdn_id_serv_<?php echo $i; ?>" type="hidden"
                                                       value="<?php echo $data['my_all_appointments']['data'][$i]['_kf_ServiceID']; ?>"/>
                                                <input id="hdn_id_zpk_Appointment_Rec<?php echo $i; ?>"
                                                       type="hidden"
                                                       value="<?php echo $data['my_all_appointments']['data'][$i]['__zpk_Appointment_Rec']; ?>"/>
                                                <input id="hdn_id_<?php echo $i; ?>" type="hidden"
                                                       value="<?php echo $data['my_all_appointments']['data'][$i]['RecordID']; ?>"/>

                                                <input name="hdn_ical_start_<?php echo $i; ?>" type="hidden"
                                                       value="<?php echo $data['my_all_appointments']['data'][$i]['APT_Date'] . ' ' . $data['my_all_appointments']['data'][$i]['APT_Time']; ?>"/>
                                                <input name="hdn_ical_end_<?php echo $i; ?>" type="hidden"
                                                       value="<?php echo $data['my_all_appointments']['data'][$i]['APT_Date'] . ' ' . $data['my_all_appointments']['data'][$i]['APT_TimeEnd']; ?>"/>
                                                <input name="hdn_ical_addr" type="hidden"
                                                       value="<?php echo '3805 Edwards Rd #100 Cincinnati, OH 45244'; ?>"/>
                                                <input name="hdn_ical_url" type="hidden"
                                                       value="<?php echo '351face.com'; ?>"/>
                                                <input name="hdn_ical_title_<?php echo $i; ?>" type="hidden"
                                                       value="<?php echo $data['my_all_appointments']['data'][$i]['APT_Title']; ?>"/>
                                                <input name="hdn_ical_date_<?php echo $i; ?>" type="hidden"
                                                       value="<?php echo $data['my_all_appointments']['data'][$i]['APT_Date']; ?>"/>
                                                <input name="hdn_item_<?php echo $i; ?>" type="hidden"
                                                       value="<?php echo $i; ?>"/>

                                            </form>
                                        </div>
                                    </div>
                            </article>

                            <?php
                        }
                        ?>
                        </div>
                    </fieldset>
                    <?php
                }
                else echo '<div class="text-center"><h3>You don\'t have any future appointments.</h3></div>';
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
                            for($i=0;$i<count($data['my_all_appointments']['data']);$i++)
                            {
                                if($data['my_all_appointments']['data'][$i]['TokenConfirmApp']!='')
                                {
                                    if($data['my_all_appointments']['data'][$i]['APT_Date']==date('m/d/Y'))
                                        $date='<div class="text-center font-weight-bold" style="font-size: 14px;"><a class="label_warning">Today at ' . $data['my_all_appointments']['data'][$i]['APT_Time'].'</a></div>';
                                    else
                                        $date='<div class="text-center font-weight-bold" style="font-size: 14px;">'. $data['my_all_appointments']['data'][$i]['APT_Date'] . ' ' . $data['my_all_appointments']['data'][$i]['APT_Time'].'</div>';
                                    ?>

                                    <article style="padding-bottom: 10px;" class="col-sm-12 col-md-6 col-lg-4">
                                        <div style="display: table;width: 100%;height: 90px;">
                                            <div style="display: table-row;">

                                                <div style="display: table-cell;background-color: #ccc;position:relative;vertical-align:middle;text-align:center;width: 30%;padding: 5px;font-size: 10px;">
                                                    <?php
                                                    echo '<img class="doc_img" style="width: 70%;" src="';
                                                    if ($data['my_all_appointments']['data'][$i]['Photo']) echo $data['my_all_appointments']['data'][$i]['Photo']; else echo base_url('assets/images/male.png');
                                                    echo '"/><br><br>';
                                                    echo $data['my_all_appointments']['data'][$i]['FirstName'] . ' ' . $data['my_all_appointments']['data'][$i]['LastName'];
                                                    ?>
                                                </div>
                                                <div class="" style="text-align:center; display: table-cell;background-color: #eee;color:#000;padding: 10px;width: 70%;">
                                                    <div style="float: right;position: relative;font-size: 16px;">
                                                        <?php
                                                        if ($data['my_all_appointments']['data'][$i]['TokenConfirmApp'] != '')$status='Not confirmed';else $status='Confirmed';
                                                        $cancel_note = 'To Cancel or Reschedule less than 24 hours, call the office 513-351-FACE(3223)';

                                                        $concern='Hello, I have a concern about an appointment with Id: '
                                                            .$data['my_all_appointments']['data'][$i]['RecordID']. ' '
                                                            .$data['my_all_appointments']['data'][$i]['APT_Title']. ' '
                                                            .$data['my_all_appointments']['data'][$i]['APT_Date'].' '.$data['my_all_appointments']['data'][$i]['APT_Time'];

                                                        $info=
                                                            '<b>Id:</b> '.$data['my_all_appointments']['data'][$i]['RecordID'].
                                                            '<br><b>Title:</b> '.$data['my_all_appointments']['data'][$i]['APT_Title'].
                                                            '<br><b>Date and Time:</b> '.$data['my_all_appointments']['data'][$i]['APT_Date'].' '.$data['my_all_appointments']['data'][$i]['APT_Time'].
                                                            '<br><b>Provider:</b> '.$data['my_all_appointments']['data'][$i]['FirstName'].' '.$data['my_all_appointments']['data'][$i]['LastName'].
                                                            '<br><b>Status:</b> '.$status.
                                                            '<br><br><b>'.$cancel_note.'</b>';
                                                        ?>
                                                        <a target="_blank" href="<?php echo base_url('/Appointment/PrintAppointment/' . $data['my_all_appointments']['data'][$i]['RecordID']); ?>">
                                                            <span class="entypo-printer"></span>
                                                        </a>
                                                        <br>
                                                        <a target="_blank" class="chat" data-content="<?php echo $concern;?>">
                                                            <span class="entypo-chat"></span>
                                                        </a>
                                                        <br>
                                                        <a data-container="body" data-toggle="popover" data-html="true" data-placement="top" data-content="<?php echo $info;?>">
                                                            <span class="entypo-info2"></span>
                                                        </a>
                                                    </div>

                                                    <div class=""
                                                         style="text-align:center;font-weight: bold; font-size: 11px;"><?php echo $data['my_all_appointments']['data'][$i]['APT_Title']; ?></div>
                                                    <br>
                                                    <div class=""
                                                         style="text-align:center;font-weight: bold; font-size: 12px;"><?php echo $data['my_all_appointments']['data'][$i]['Service']; ?></div>
                                                    <br>
                                                    <?php echo $date;?>

                                                    <br>

                                                    <?php if ($data['my_all_appointments']['data'][$i]['TokenConfirmApp'] != '') { ?>
                                                        <div class="text-warning"
                                                             style="text-align:center;font-weight: bold; font-size: 15px;">
                                                            Status: Not Confirmed <span class="brankic-warning"></span>
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
                                                    $today = strtotime(date('m/d/Y h:i:s'));
                                                    $date = strtotime($data['my_all_appointments']['data'][$i]['APT_Date'] . ' ' . $data['my_all_appointments']['data'][$i]['APT_Time']);
                                                    $dif = $date - $today;

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
                                                        /*
                                                        if ($cancel_btn == 0)
                                                        {
                                                            ?>

                                                            <div style="text-align: center;padding-left:5px;padding-right:5px;top: 5px;position: relative;display: inline-block;"
                                                                 class="note"><?php echo $cancel_note; ?></div>
                                                            <?php
                                                        }*/
                                                        ?>

                                                        <?php

                                                        if ($cancel_btn == 1)
                                                        {
                                                            ?>
                                                            <button type="button" class="btn btn_cancel_app btn-danger"
                                                                    style="1background-color: #492f91"
                                                                    id="<?php echo $i; ?>">Cancel
                                                            </button>
                                                            <?php
                                                        }
                                                        if ($data['my_all_appointments']['data'][$i]['TokenConfirmApp'] != '')
                                                        {

                                                            ?>
                                                            <button type="button"
                                                                    class="btn btn_confirm_app btn-success"
                                                                    style="1background-color: #492f91"
                                                                    id="<?php echo $i; ?>">Confirm
                                                            </button>
                                                            <?php
                                                        } else
                                                        {
                                                            ?>
                                                            <button type="button" class="btn download_ical btn-success"
                                                                    style="1background-color: #492f91"
                                                                    id="<?php echo $i; ?>">Download iCal
                                                            </button>
                                                            <button type="button" class="btn resend_email btn-success"
                                                                    style="1background-color: #492f91"
                                                                    id="<?php echo $i; ?>">Resend email
                                                            </button>
                                                            <?php
                                                        }
                                                        ?>

                                                    </div>

                                                    <form method="post" action="Dashboard/DownloadiCal"
                                                          id="frm_next_<?php echo $i; ?>">

                                                        <input id="hdn_title_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['APT_Title']; ?>"/>
                                                        <input id="hdn_date_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['APT_Date']; ?>"/>
                                                        <input id="hdn_time_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['APT_Time']; ?>"/>
                                                        <input id="hdn_doc_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['FirstName'] . ' ' . $data['my_all_appointments']['data'][$i]['LastName']; ?>"/>
                                                        <input id="hdn_ser_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['Service']; ?>"/>
                                                        <input id="hdn_tok_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['TokenConfirmApp']; ?>"/>
                                                        <input id="hdn_id_doc_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['ProviderRec']; ?>"/>
                                                        <input id="hdn_id_serv_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['_kf_ServiceID']; ?>"/>
                                                        <input id="hdn_id_zpk_Appointment_Rec<?php echo $i; ?>"
                                                               type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['__zpk_Appointment_Rec']; ?>"/>
                                                        <input id="hdn_id_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['RecordID']; ?>"/>

                                                        <input name="hdn_ical_start_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['APT_Date'] . ' ' . $data['my_all_appointments']['data'][$i]['APT_Time']; ?>"/>
                                                        <input name="hdn_ical_end_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['APT_Date'] . ' ' . $data['my_all_appointments']['data'][$i]['APT_TimeEnd']; ?>"/>
                                                        <input name="hdn_ical_addr" type="hidden"
                                                               value="<?php echo '3805 Edwards Rd #100 Cincinnati, OH 45244'; ?>"/>
                                                        <input name="hdn_ical_url" type="hidden"
                                                               value="<?php echo '351face.com'; ?>"/>
                                                        <input name="hdn_ical_title_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['APT_Title']; ?>"/>
                                                        <input name="hdn_ical_date_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['APT_Date']; ?>"/>
                                                        <input name="hdn_item_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $i; ?>"/>

                                                    </form>
                                                </div>
                                                </div1
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
                else echo '<div class="text-center"><h3>You don\'t have any pending appointments.</h3></div>';
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
                            for($i=0;$i<count($data['my_all_appointments']['data']);$i++)
                            {
                                if($data['my_all_appointments']['data'][$i]['TokenConfirmApp']=='')
                                {
                                    if($data['my_all_appointments']['data'][$i]['APT_Date']==date('m/d/Y'))
                                        $date='<div class="text-center font-weight-bold" style="font-size: 14px;"><a class="label_warning">Today at ' . $data['my_all_appointments']['data'][$i]['APT_Time'].'</a></div>';
                                    else
                                        $date='<div class="text-center font-weight-bold" style="font-size: 14px;">'. $data['my_all_appointments']['data'][$i]['APT_Date'] . ' ' . $data['my_all_appointments']['data'][$i]['APT_Time'].'</div>';
                                    ?>

                                    <article style="padding-bottom: 10px;" class="col-sm-12 col-md-6 col-lg-4">
                                        <div style="display: table;width: 100%;height: 90px;">
                                            <div style="display: table-row;">

                                                <div style="display: table-cell;background-color: #ccc;position:relative;vertical-align:middle;text-align:center;width: 30%;padding: 5px;font-size: 10px;">
                                                    <?php
                                                    echo '<img class="doc_img" style="width: 70%;" src="';
                                                    if ($data['my_all_appointments']['data'][$i]['Photo']) echo $data['my_all_appointments']['data'][$i]['Photo']; else echo base_url('assets/images/male.png');
                                                    echo '"/><br><br>';
                                                    echo $data['my_all_appointments']['data'][$i]['FirstName'] . ' ' . $data['my_all_appointments']['data'][$i]['LastName'];
                                                    ?>
                                                </div>
                                                <div class="" style="text-align:center; display: table-cell;background-color: #eee;color:#000;padding: 10px;width: 70%;">
                                                    <div style="float: right;position: relative;font-size: 16px;">
                                                        <?php
                                                        if ($data['my_all_appointments']['data'][$i]['TokenConfirmApp'] != '')$status='Not confirmed';else $status='Confirmed';
                                                        $cancel_note = 'To Cancel or Reschedule less than 24 hours, call the office 513-351-FACE(3223)';

                                                        $concern='Hello, I have a concern about an appointment with Id: '
                                                            .$data['my_all_appointments']['data'][$i]['RecordID']. ' '
                                                            .$data['my_all_appointments']['data'][$i]['APT_Title']. ' '
                                                            .$data['my_all_appointments']['data'][$i]['APT_Date'].' '.$data['my_all_appointments']['data'][$i]['APT_Time'];

                                                        $info=
                                                            '<b>Id:</b> '.$data['my_all_appointments']['data'][$i]['RecordID'].
                                                            '<br><b>Title:</b> '.$data['my_all_appointments']['data'][$i]['APT_Title'].
                                                            '<br><b>Date and Time:</b> '.$data['my_all_appointments']['data'][$i]['APT_Date'].' '.$data['my_all_appointments']['data'][$i]['APT_Time'].
                                                            '<br><b>Provider:</b> '.$data['my_all_appointments']['data'][$i]['FirstName'].' '.$data['my_all_appointments']['data'][$i]['LastName'].
                                                            '<br><b>Status:</b> '.$status.
                                                            '<br><br><b>'.$cancel_note.'</b>';
                                                        ?>
                                                        <a target="_blank" href="<?php echo base_url('/Appointment/PrintAppointment/' . $data['my_all_appointments']['data'][$i]['RecordID']); ?>">
                                                            <span class="entypo-printer"></span>
                                                        </a>
                                                        <br>
                                                        <a target="_blank" class="chat" data-content="<?php echo $concern;?>">
                                                            <span class="entypo-chat"></span>
                                                        </a>
                                                        <br>
                                                        <a data-container="body" data-toggle="popover" data-html="true" data-placement="top" data-content="<?php echo $info;?>">
                                                            <span class="entypo-info2"></span>
                                                        </a>
                                                    </div>

                                                    <div class=""
                                                         style="text-align:center;font-weight: bold; font-size: 11px;"><?php echo $data['my_all_appointments']['data'][$i]['APT_Title']; ?></div>
                                                    <br>
                                                    <div class=""
                                                         style="text-align:center;font-weight: bold; font-size: 12px;"><?php echo $data['my_all_appointments']['data'][$i]['Service']; ?></div>
                                                    <br>
                                                    <?php echo $date;?>

                                                    <br>

                                                    <?php if ($data['my_all_appointments']['data'][$i]['TokenConfirmApp'] != '') { ?>
                                                        <div class="text-warning"
                                                             style="text-align:center;font-weight: bold; font-size: 15px;">
                                                            Status: Not Confirmed <span class="brankic-warning"></span>
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
                                                    $today = strtotime(date('m/d/Y h:i:s'));
                                                    $date = strtotime($data['my_all_appointments']['data'][$i]['APT_Date'] . ' ' . $data['my_all_appointments']['data'][$i]['APT_Time']);
                                                    $dif = $date - $today;

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
                                                        /*
                                                        if ($cancel_btn == 0)
                                                        {
                                                            ?>

                                                            <div style="text-align: center;padding-left:5px;padding-right:5px;top: 5px;position: relative;display: inline-block;"
                                                                 class="note"><?php echo $cancel_note; ?></div>
                                                            <?php
                                                        }*/
                                                        ?>

                                                        <?php

                                                        if ($cancel_btn == 1)
                                                        {
                                                            ?>
                                                            <button type="button" class="btn btn_cancel_app btn-danger"
                                                                    style="1background-color: #492f91"
                                                                    id="<?php echo $i; ?>">Cancel
                                                            </button>
                                                            <?php
                                                        }
                                                        if ($data['my_all_appointments']['data'][$i]['TokenConfirmApp'] != '')
                                                        {

                                                            ?>
                                                            <button type="button"
                                                                    class="btn btn_confirm_app btn-success"
                                                                    style="1background-color: #492f91"
                                                                    id="<?php echo $i; ?>">Confirm
                                                            </button>
                                                            <?php
                                                        } else
                                                        {
                                                            ?>
                                                            <button type="button" class="btn download_ical btn-success"
                                                                    style="1background-color: #492f91"
                                                                    id="<?php echo $i; ?>">Download iCal
                                                            </button>
                                                            <button type="button" class="btn resend_email btn-success"
                                                                    style="1background-color: #492f91"
                                                                    id="<?php echo $i; ?>">Resend email
                                                            </button>
                                                            <?php
                                                        }
                                                        ?>

                                                    </div>

                                                    <form method="post" action="Dashboard/DownloadiCal"
                                                          id="frm_next_<?php echo $i; ?>">

                                                        <input id="hdn_title_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['APT_Title']; ?>"/>
                                                        <input id="hdn_date_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['APT_Date']; ?>"/>
                                                        <input id="hdn_time_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['APT_Time']; ?>"/>
                                                        <input id="hdn_doc_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['FirstName'] . ' ' . $data['my_all_appointments']['data'][$i]['LastName']; ?>"/>
                                                        <input id="hdn_ser_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['Service']; ?>"/>
                                                        <input id="hdn_tok_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['TokenConfirmApp']; ?>"/>
                                                        <input id="hdn_id_doc_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['ProviderRec']; ?>"/>
                                                        <input id="hdn_id_serv_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['_kf_ServiceID']; ?>"/>
                                                        <input id="hdn_id_zpk_Appointment_Rec<?php echo $i; ?>"
                                                               type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['__zpk_Appointment_Rec']; ?>"/>
                                                        <input id="hdn_id_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['RecordID']; ?>"/>

                                                        <input name="hdn_ical_start_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['APT_Date'] . ' ' . $data['my_all_appointments']['data'][$i]['APT_Time']; ?>"/>
                                                        <input name="hdn_ical_end_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['APT_Date'] . ' ' . $data['my_all_appointments']['data'][$i]['APT_TimeEnd']; ?>"/>
                                                        <input name="hdn_ical_addr" type="hidden"
                                                               value="<?php echo '3805 Edwards Rd #100 Cincinnati, OH 45244'; ?>"/>
                                                        <input name="hdn_ical_url" type="hidden"
                                                               value="<?php echo '351face.com'; ?>"/>
                                                        <input name="hdn_ical_title_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['APT_Title']; ?>"/>
                                                        <input name="hdn_ical_date_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $data['my_all_appointments']['data'][$i]['APT_Date']; ?>"/>
                                                        <input name="hdn_item_<?php echo $i; ?>" type="hidden"
                                                               value="<?php echo $i; ?>"/>

                                                    </form>
                                                </div>
                                                </div1
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
                else echo '<div class="text-center"><h3>You don\'t have any confirm appointments.</h3></div>';
                ?>
            </section>
        </div>
    </div>

    <div class="tab-pane fade" id="s4">
        <div class="row">
            <section>
                <div class="row" style="margin: 0px;">
                    <div class="col-lg-12">

                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div id='calendar' style="margin-top: 10px;"></div>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>

                    </div>

                </div>
            </section>
        </div>
    </div>

</div>

<?php

$color_not_available = '#ffff66';
$text_color_not_available = '#000';

if(isset($data['my_all_appointments']['data']))
{
    for($i=0;$i<count($data['my_all_appointments']['data']);$i++)
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
}$events = json_encode($events);
?>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $('#badge_all').html(<?php echo count($data['my_all_appointments']['data']);?>);
            $('#badge_confirm').html(<?php echo $confirm;?>);
            $('#badge_pending').html(<?php echo $not_confirm;?>);

            $('.btn_confirm_app').on('click', function ()
            {
                var i = $(this).attr('id');//alert(i);

                var title=$('#hdn_title_'+i).val();
                var serv=$('#hdn_ser_'+i).val();
                var doc=$('#hdn_doc_'+i).val();
                var date=$('#hdn_date_'+i).val();
                var time=$('#hdn_time_'+i).val();
                var token=$('#hdn_tok_'+i).val();//alert(token);

                var from_email = "<?php echo $email_from;?>";
                var from_name = "<?php echo $email_from_name;?>";
                var email_to = "<?php echo $email;?>";
                var reply_to_email = '';
                var reply_to_name = '';
                var subject = "Please confirm your appointment";
                var attachments = './assets/images/logo.png';//&./assets/upload/1111.pdf
                var link = "<?php echo base_url('/Dashboard/ConfirmApp/');?>" + token;
                var link_web = '351face.com';
                var body ='<p>Dear <?php echo $bd_FirstName." ".$bd_LastName;?>,</p>' +
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
                    '<p>3805 Edwards Rd #100</p>' +
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
                        $('#modal').html('Please, check your inbox. A confirmation request email has been sent to ' + email_to+'<br><fieldset><div class="text-center"><a class="btn btn-default" data-dismiss="modal">Close</a></div></fieldset>');
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

                var from_email = 'dispatch-system@tekexperts.com';
                var from_name = 'Advanced Cosmetic Surgery';
                var email_to = 'raydel@mactutor.net';
                var reply_to_email = '';
                var reply_to_name = '';
                var subject = "Appointment Information";
                var attachments = './assets/images/logo.png';//&./assets/upload/1111.pdf
                var link_web = '351face.com';
                var body = '<h1>Appointment Information</h1>' +
                    '<p>Dear <?php echo $bd_FirstName." ".$bd_LastName;?>,</p>' +
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
                    '<p>3805 Edwards Rd #100</p>' +
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
                        $('#modal').html('<div class="text-center">Please, check your inbox. A reminder email has been sent to ' + email_to+'</div><br><div class="text-center"><a class="btn btn-default" data-dismiss="modal">Close</a></div>');
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

            $('.btn_cancel_app').on('click', function ()
            {
                var i = $(this).attr('id');//alert(i);

                $('#modal').html('<div class="text-center">Do you want to cancel or reschedule the appointment?</div><br><div class="text-right"><a class="btn btn-warning btn_reschedule" id="'+i+'" data-dismiss="modal">Reschedule</a> <a class="btn btn-danger btn_cancel" id="'+i+'" data-dismiss="modal">Cancel</a> <a class="btn btn-default" data-dismiss="modal">Close</a></div>');
                $('#modal_title').html('Cancel or Reschedule');
                $('#remoteModal').modal('show');

                $('.btn_cancel').on('click', function ()
                {
                    var i = $(this).attr('id');//alert(i);
                    var id = $('#hdn_id_zpk_Appointment_Rec'+i).val();
                    var go_layout='PHP_Appointment';

                    //alertify.set('notifier','position', 'top-center');
                    alertify.confirm("Do you confirm the action?", function()
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
                            $('#'+i).remove();
                        });
                    }
                    ,function()
                    {
                        //alertify.set('notifier','position', 'top-center');
                        alertify.error('Declined.');
                    });
                });

                $('.btn_reschedule').on('click', function ()
                {
                    $('.modal-backdrop').remove();
                    $('body').removeClass("modal-open");

                    var target = document.getElementById('container');
                    var spinner = new Spinner(opts).spin(target);

                    var i = $(this).attr('id');//alert(i);
                    var id = $('#hdn_id_zpk_Appointment_Rec'+i).val();//alert(id);
                    var go_layout = 'PHP_Appointment';
                    var id_doc = $('#hdn_id_doc_'+i).val();
                    var id_serv = $('#hdn_id_serv_'+i).val();
                    $( '.content-wrapper' ).empty();

                    $.post("Dashboard/GoToAppointments", {go_layout:go_layout,id:id,id_doc:id_doc,id_serv:id_serv}, function(result)
                    {
                        $('.content-wrapper').html(result);
                        spinner.stop();
                    });
                });
            });

            $('.chat').on('click', function ()
            {
                Tawk_API.maximize();

                $("textarea#chatTextarea").html('dff');
                $("textarea#chatTextarea").text('dff');
            });

            $('body').on('mouseover', '[data-toggle="popover"]', function(){
                $(this).popover('show')
            });

            $('body').on('mouseout', '[data-toggle="popover"]', function(){
                $(this).popover('hide')
            });

            $('body').on('click', '[data-toggle="popover"]', function(){
                $(this).popover('toggle')
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
                events: <?php echo $events;?>,

                eventRender: function(event, eventElement)
                {
                    var view = $('#calendar').fullCalendar('getView');

                    if (event.confirm=='text-success')
                    {
                        eventElement.find(".fc-time").append('<div style="float: right;position: relative; font-size: 16px; top:-15px;">' +
                            '<a data-container="body" data-toggle="popover" data-placement="top" data-content="Appointment confirmed." class="' + event.confirm + '">' +
                            '<span class="brankic-checkmark"></span></a>' +
                            '</div>');
                        if(view.name=='month')
                            eventElement.find(".fc-content").css({ height: "14px" });
                    }
                    else if(event.confirm=='text-danger')
                    {
                        eventElement.find(".fc-time").append('<div style="float: right;position: relative; font-size: 15px; top:-15px;">' +
                            '<a data-container="body" data-toggle="popover" data-placement="top" data-content="Please, Confirm your appintment." class="'+event.confirm+'">' +
                            '<span class="brankic-warning"></span></a>' +
                            '</div>');

                        if(view.name=='month')
                            eventElement.find(".fc-content").css({ height: "14px" });
                    }
                },

            });

            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                // TODO: check href of e.target to detect your tab
                $("#show_cal:hidden").show();
                $('#calendar').fullCalendar('render');
            })
        });
    </script>