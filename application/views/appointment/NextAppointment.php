
    <?php
    if(isset($data['my_next_appointments']['data']))
    {
    for($i=0;$i<count($data['my_next_appointments']['data']);$i=$i+3)
    {
        $j=$i+1;
        $k=$i+2;
    ?>
        <div class="row" style="margin-bottom: 10px;">
            <article class="col-sm-12 col-md-12 col-lg-4">
                <div style="display: table;width: 100%;height: 90px;">
                    <div style="display: table-row;">

                        <div  style="display: table-cell;background-color: #ccc;position:relative;vertical-align:middle;text-align:center;width: 30%;padding: 10px;">
                            <?php
                                echo '<img class="doc_img" style="width: 100px;" src="'.$data['my_next_appointments']['data'][$i]['Photo'].'"/><br><br>';
                                echo $data['my_next_appointments']['data'][$i]['FirstName'].' '.$data['my_next_appointments']['data'][$i]['LastName'];
                            ?>
                        </div>
                        <div class="" style="text-align:center; display: table-cell;background-color: #eee;color:#000;padding: 10px;width: 70%;">
                            <div class="" style="text-align:center;font-weight: bold; font-size: 11px;">
                                <?php echo $data['my_next_appointments']['data'][$i]['APT_Title'];?>
                            </div>
                            <br>
                            <div class="" style="text-align:center;font-weight: bold; font-size: 13px;"><?php echo $data['my_next_appointments']['data'][$i]['APT_Date'];?></div>
                            <div class="" style="text-align:center;font-weight: bold; font-size: 13px;"><?php echo $data['my_next_appointments']['data'][$i]['APT_Time'];?></div>

                            <br>

                            <?php if($data['my_next_appointments']['data'][$i]['TokenConfirmApp']!=''){?>
                                <div class="" style="text-align:center;font-weight: bold; font-size: 15px; color: red;">Status: Not Confirmed</div>
                            <?php }else {?>
                                <div class="" style="text-align:center;font-weight: bold; font-size: 15px; color: green;">Status: Confirmed</div>
                            <?php }?>

                            <hr style="border-top: 1px solid #8c8b8b;border-bottom: 1px solid #fff;margin-top: 7px; margin-bottom: 0px;">

                            <div style="text-align:right;">
                                <?php if($data['my_next_appointments']['data'][$i]['TokenConfirmApp']!=''){?>
                                    <button type="button" class="btn btn_confirm_app" style="background-color: #492f91" id="<?php echo $i;?>">Please, Confirm appointment</button>
                                <?php }else {?>
                                    <div style="text-align:right;">
                                        <button type="button" class="btn download_ical" style="background-color: #492f91" id="<?php echo $i;?>">Download iCal</button>
                                        <button type="button" class="btn resend_email" style="background-color: #492f91" id="<?php echo $i;?>">Resend email</button>
                                    </div>
                                <?php }?>
                            </div>

                            <form method="post" action="Dashboard/DownloadiCal" id="frm_next_<?php echo $i;?>">

                                <input id="hdn_title_<?php echo $i;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$i]['APT_Title'];?>"/>
                                <input id="hdn_date_<?php echo $i;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$i]['APT_Date'];?>"/>
                                <input id="hdn_time_<?php echo $i;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$i]['APT_Time'];?>"/>
                                <input id="hdn_doc_<?php echo $i;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$i]['FirstName'].' '.$data['my_next_appointments']['data'][$i]['LastName'];?>"/>
                                <input id="hdn_ser_<?php echo $i;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$i]['Service'];?>"/>
                                <input id="hdn_tok_<?php echo $i;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$i]['TokenConfirmApp'];?>"/>

                                <input name="hdn_ical_start_<?php echo $i;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$i]['APT_Date'].' '.$data['my_next_appointments']['data'][$i]['APT_Time'];?>"/>
                                <input name="hdn_ical_end_<?php echo $i;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$i]['APT_Date'].' '.$data['my_next_appointments']['data'][$i]['APT_TimeEnd'];?>"/>
                                <input name="hdn_ical_addr" type="hidden" value="<?php echo '3805 Edwards Rd #100 Cincinnati, OH 45244';?>"/>
                                <input name="hdn_ical_url" type="hidden" value="<?php echo '351face.com';?>"/>
                                <input name="hdn_ical_title_<?php echo $i;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$i]['APT_Title'];?>"/>
                                <input name="hdn_ical_date_<?php echo $i;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$i]['APT_Date'];?>"/>
                                <input name="hdn_item_<?php echo $i;?>" type="hidden" value="<?php echo $i;?>"/>

                            </form>
                        </div>
                    </div1
                </div>
            </article>

            <?php if(isset($data['my_next_appointments']['data'][$j]['APT_Date'])){?>

            <article class="col-sm-12 col-md-12 col-lg-4">
                <div style="display: table;width: 100%;height: 90px;">
                    <div style="display: table-row;">

                        <div  style="display: table-cell;background-color: #ccc;position:relative;vertical-align:middle;text-align:center;width: 30%;padding: 10px;">
                            <?php
                            echo '<img class="doc_img" style="width: 100px;" src="'.$data['my_next_appointments']['data'][$j]['Photo'].'"/><br><br>';
                            echo $data['my_next_appointments']['data'][$j]['FirstName'].' '.$data['my_next_appointments']['data'][$j]['LastName'];
                            ?>
                        </div>
                        <div class="" style="text-align:center; display: table-cell;background-color: #eee;color:#000;padding: 10px;width: 70%;">
                            <div class="" style="text-align:center;font-weight: bold; font-size: 11px;">
                                <?php echo $data['my_next_appointments']['data'][$j]['APT_Title'];?>
                            </div>
                            <br>
                            <div class="" style="text-align:center;font-weight: bold; font-size: 13px;"><?php echo $data['my_next_appointments']['data'][$j]['APT_Date'];?></div>
                            <div class="" style="text-align:center;font-weight: bold; font-size: 13px;"><?php echo $data['my_next_appointments']['data'][$j]['APT_Time'];?></div>

                            <br>

                            <?php if($data['my_next_appointments']['data'][$j]['TokenConfirmApp']!=''){?>
                                <div class="" style="text-align:center;font-weight: bold; font-size: 15px; color: red;">Status: Not Confirmed</div>
                            <?php }else {?>
                                <div class="" style="text-align:center;font-weight: bold; font-size: 15px; color: green;">Status: Confirmed</div>
                            <?php }?>

                            <hr style="border-top: 1px solid #8c8b8b;border-bottom: 1px solid #fff;margin-top: 7px; margin-bottom: 0px;">

                            <div style="text-align:right;">
                                <?php if($data['my_next_appointments']['data'][$j]['TokenConfirmApp']!=''){?>
                                    <button type="button" class="btn btn_confirm_app" style="background-color: #492f91" id="<?php echo $j;?>">Please, Confirm appointment</button>
                                <?php }else {?>
                                    <div style="text-align:right;">
                                        <button type="button" class="btn download_ical" style="background-color: #492f91" id="<?php echo $j;?>">Download iCal</button>
                                        <button type="button" class="btn resend_email" style="background-color: #492f91" id="<?php echo $j;?>">Resend email</button>
                                    </div>
                                <?php }?>
                            </div>

                            <form method="post" action="Dashboard/DownloadiCal" id="frm_next_<?php echo $j;?>">

                                <input id="hdn_title_<?php echo $j;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$j]['APT_Title'];?>"/>
                                <input id="hdn_date_<?php echo $j;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$j]['APT_Date'];?>"/>
                                <input id="hdn_time_<?php echo $j;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$j]['APT_Time'];?>"/>
                                <input id="hdn_doc_<?php echo $j;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$j]['FirstName'].' '.$data['my_next_appointments']['data'][$j]['LastName'];?>"/>
                                <input id="hdn_ser_<?php echo $j;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$j]['Service'];?>"/>
                                <input id="hdn_tok_<?php echo $j;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$j]['TokenConfirmApp'];?>"/>

                                <input name="hdn_ical_start_<?php echo $j;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$j]['APT_Date'].' '.$data['my_next_appointments']['data'][$j]['APT_Time'];?>"/>
                                <input name="hdn_ical_end_<?php echo $j;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$j]['APT_Date'].' '.$data['my_next_appointments']['data'][$j]['APT_TimeEnd'];?>"/>
                                <input name="hdn_ical_addr" type="hidden" value="<?php echo '3805 Edwards Rd #100 Cincinnati, OH 45244';?>"/>
                                <input name="hdn_ical_url" type="hidden" value="<?php echo '351face.com';?>"/>
                                <input name="hdn_ical_title_<?php echo $j;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$j]['APT_Title'];?>"/>
                                <input name="hdn_ical_date_<?php echo $j;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$j]['APT_Date'];?>"/>
                                <input name="hdn_item_<?php echo $j;?>" type="hidden" value="<?php echo $j;?>"/>

                            </form>

                        </div>
                    </div>
                </div>
            </article>

            <?php }if(isset($data['my_next_appointments']['data'][$k]['APT_Date'])){?>

            <article class="col-sm-12 col-md-12 col-lg-4">
                <div style="display: table;width: 100%;height: 90px;">
                    <div style="display: table-row;">

                        <div  style="display: table-cell;background-color: #ccc;position:relative;vertical-align:middle;text-align:center;width: 30%;padding: 10px;">
                            <?php
                            echo '<img class="doc_img" style="width: 100px;" src="'.$data['my_next_appointments']['data'][$k]['Photo'].'"/><br><br>';
                            echo $data['my_next_appointments']['data'][$k]['FirstName'].' '.$data['my_next_appointments']['data'][$k]['LastName'];
                            ?>
                        </div>
                        <div class="" style="text-align:center; display: table-cell;background-color: #eee;color:#000;padding: 10px;width: 70%;">
                            <div class="" style="text-align:center;font-weight: bold; font-size: 11px;">
                                <?php echo $data['my_next_appointments']['data'][$k]['APT_Title'];?>
                            </div>
                            <br>
                            <div class="" style="text-align:center;font-weight: bold; font-size: 13px;"><?php echo $data['my_next_appointments']['data'][$k]['APT_Date'];?></div>
                            <div class="" style="text-align:center;font-weight: bold; font-size: 13px;"><?php echo $data['my_next_appointments']['data'][$k]['APT_Time'];?></div>

                            <br>

                            <?php if($data['my_next_appointments']['data'][$k]['TokenConfirmApp']!=''){?>
                                <div class="" style="text-align:center;font-weight: bold; font-size: 15px; color: red;">Status: Not Confirmed</div>
                            <?php }else {?>
                                <div class="" style="text-align:center;font-weight: bold; font-size: 15px; color: green;">Status: Confirmed</div>
                            <?php }?>

                            <hr style="border-top: 1px solid #8c8b8b;border-bottom: 1px solid #fff;margin-top: 7px; margin-bottom: 0px;">

                            <div style="text-align:right;">
                                <?php if($data['my_next_appointments']['data'][$k]['TokenConfirmApp']!=''){?>
                                    <button type="button" class="btn btn_confirm_app" style="background-color: #492f91" id="<?php echo $k;?>">Please, Confirm appointment</button>
                                <?php }else {?>
                                    <div style="text-align:right;">
                                        <button type="button" class="btn download_ical" style="background-color: #492f91" id="<?php echo $k;?>">Download iCal</button>
                                        <button type="button" class="btn resend_email" style="background-color: #492f91" id="<?php echo $k;?>">Resend email</button>
                                    </div>
                                <?php }?>
                            </div>

                            <form method="post" action="Dashboard/DownloadiCal" id="frm_next_<?php echo $k;?>">

                                <input id="hdn_title_<?php echo $k;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$k]['APT_Title'];?>"/>
                                <input id="hdn_date_<?php echo $k;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$k]['APT_Date'];?>"/>
                                <input id="hdn_time_<?php echo $k;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$k]['APT_Time'];?>"/>
                                <input id="hdn_doc_<?php echo $k;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$k]['FirstName'].' '.$data['my_next_appointments']['data'][$k]['LastName'];?>"/>
                                <input id="hdn_ser_<?php echo $k;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$k]['Service'];?>"/>
                                <input id="hdn_tok_<?php echo $k;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$k]['TokenConfirmApp'];?>"/>

                                <input name="hdn_ical_start_<?php echo $k;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$k]['APT_Date'].' '.$data['my_next_appointments']['data'][$k]['APT_Time'];?>"/>
                                <input name="hdn_ical_end_<?php echo $k;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$k]['APT_Date'].' '.$data['my_next_appointments']['data'][$k]['APT_TimeEnd'];?>"/>
                                <input name="hdn_ical_addr" type="hidden" value="<?php echo '3805 Edwards Rd #100 Cincinnati, OH 45244';?>"/>
                                <input name="hdn_ical_url" type="hidden" value="<?php echo '351face.com';?>"/>
                                <input name="hdn_ical_title_<?php echo $k;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$k]['APT_Title'];?>"/>
                                <input name="hdn_ical_date_<?php echo $k;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$k]['APT_Date'];?>"/>
                                <input name="hdn_item_<?php echo $k;?>" type="hidden" value="<?php echo $k;?>"/>

                            </form>
                        </div>
                    </div>
                </div>
            </article>

            <?php }?>

        </div>

    <?php }}else echo '<div class="text-center"><h3>You don\'t have any future appointments.</h3></div>' ;?>

    <?php


    //$attachments = ;



    ?>
    <script type="text/javascript">
        $(document).ready(function()
        {
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
                        $('#modal').html('Please, check your inbox. Has been sent an email to ' + email_to+'<br><fieldset><div class="text-center"><a class="btn btn-default" data-dismiss="modal">Close</a></div></fieldset>');
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
                var subject = "Appointment information";
                var attachments = './assets/images/logo.png';//&./assets/upload/1111.pdf
                var link_web = '351face.com';
                var body = '<h1>Appointment information</h1>' +
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
                        $('#modal').html('Your email is wrong.');
                    }
                    else
                    {
                        $('#modal').html('Please, check your inbox. Has been sent an email to ' + email_to+'<br><fieldset><div class="text-center"><a class="btn btn-default" data-dismiss="modal">Close</a></div></fieldset>');
                    }
                    $('#remoteModal').modal('show');
                });
            });

            $('.download_ical').on('click', function ()
            {
                var i = $(this).attr('id');//alert(i);
                $('#frm_next_'+i).submit();
            });

        });
    </script>