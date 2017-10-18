
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
                <div style="display: table;width: 100%;height: 80px;">
                    <div style="display: table-row;">

                        <div  style="display: table-cell;background-color: #ccc;position:relative;vertical-align:middle;text-align:center;width: 30%;padding: 10px;">
                            <?php
                                echo '<img class="doc_img" style="width: 60px;" src="'.$data['my_next_appointments']['data'][$i]['Photo'].'"/><br><br>';
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

                            <?php if($data['my_next_appointments']['data'][$i]['TokenConfirmApp']!=''){?>
                                <div  style="text-align:right;padding: 5px;"><a class="btn btn_confirm_app" style="background-color: #492f91" id="<?php echo $i;?>">Please, Confirm appointment</a></div>
                            <?php }else {?>
                                <div style="text-align:right;padding: 5px;"><a class="btn resend_email" style="background-color: #492f91" id="<?php echo $i;?>">Resend email</a></div>
                            <?php }?>

                            <input id="hdn_title_<?php echo $i;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$i]['APT_Title'];?>"/>
                            <input id="hdn_date_<?php echo $i;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$i]['APT_Date'].' '.$data['my_next_appointments']['data'][$i]['APT_Time'];?>"/>
                            <input id="hdn_doc_<?php echo $i;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$i]['FirstName'].' '.$data['my_next_appointments']['data'][$i]['LastName'];?>"/>
                            <input id="hdn_ser_<?php echo $i;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$i]['Service'];?>"/>
                            <input id="hdn_tok_<?php echo $i;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$i]['TokenConfirmApp'];?>"/>

                        </div>
                    </div1
                </div>
            </article>

            <?php if(isset($data['my_next_appointments']['data'][$j]['APT_Date'])){?>

            <article class="col-sm-12 col-md-12 col-lg-4">
                <div style="display: table;width: 100%;height: 80px;">
                    <div style="display: table-row;">

                        <div  style="display: table-cell;background-color: #ccc;position:relative;vertical-align:middle;text-align:center;width: 30%;padding: 10px;">
                            <?php
                            echo '<img class="doc_img" style="width: 60px;" src="'.$data['my_next_appointments']['data'][$j]['Photo'].'"/><br><br>';
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

                            <?php if($data['my_next_appointments']['data'][$j]['TokenConfirmApp']!=''){?>
                            <div  style="text-align:right;padding: 5px;"><a class="btn btn_confirm_app" style="background-color: #492f91"id="<?php echo $j;?>">Please, Confirm appointment</a></div>
                            <?php }else {?>
                            <div style="text-align:right;padding: 5px;"><a class="btn resend_email" style="background-color: #492f91" id="<?php echo $j;?>">Resend email</a></div>
                            <?php }?>

                            <input id="hdn_title_<?php echo $j;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$j]['APT_Title'];?>"/>
                            <input id="hdn_date_<?php echo $j;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$j]['APT_Date'].' '.$data['my_next_appointments']['data'][$j]['APT_Time'];?>"/>
                            <input id="hdn_doc_<?php echo $j;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$j]['FirstName'].' '.$data['my_next_appointments']['data'][$j]['LastName'];?>"/>
                            <input id="hdn_ser_<?php echo $j;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$j]['Service'];?>"/>
                            <input id="hdn_tok_<?php echo $j;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$j]['TokenConfirmApp'];?>"/>

                        </div>
                    </div>
                </div>
            </article>

            <?php }if(isset($data['my_next_appointments']['data'][$k]['APT_Date'])){?>

            <article class="col-sm-12 col-md-12 col-lg-4">
                <div style="display: table;width: 100%;height: 80px;">
                    <div style="display: table-row;">

                        <div  style="display: table-cell;background-color: #ccc;position:relative;vertical-align:middle;text-align:center;width: 30%;padding: 10px;">
                            <?php
                            echo '<img class="doc_img" style="width: 60px;" src="'.$data['my_next_appointments']['data'][$k]['Photo'].'"/><br><br>';
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

                            <?php if($data['my_next_appointments']['data'][$k]['TokenConfirmApp']!=''){?>
                                <div  style="text-align:right;padding: 5px;"><a class="btn btn_confirm_app" style="background-color: #492f91"style="background-color: #492f91" id="<?php echo $k;?>">Please, Confirm appointment</a></div>
                            <?php }else {?>
                                <div style="text-align:right;padding: 5px;"><a class="btn resend_email" style="background-color: #492f91" id="<?php echo $k;?>">Resend email</a></div>
                            <?php }?>


                            <input id="hdn_title_<?php echo $k;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$k]['APT_Title'];?>"/>
                            <input id="hdn_date_<?php echo $k;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$k]['APT_Date'].' '.$data['my_next_appointments']['data'][$k]['APT_Time'];?>"/>
                            <input id="hdn_doc_<?php echo $k;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$k]['FirstName'].' '.$data['my_next_appointments']['data'][$k]['LastName'];?>"/>
                            <input id="hdn_ser_<?php echo $k;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$k]['Service'];?>"/>
                            <input id="hdn_tok_<?php echo $k;?>" type="hidden" value="<?php echo $data['my_next_appointments']['data'][$k]['TokenConfirmApp'];?>"/>

                        </div>
                    </div>
                </div>
            </article>

            <?php }?>
        </div>

    <?php }}else echo '<div class="text-center"><h3>You don\'t have any future appointments.</h3></div>' ;?>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $('body').on('click', '.btn_confirm_app', function ()
            {
                var i = $(this).attr('id');//alert(i);

                var title=$('#hdn_title_'+i).val();
                var serv=$('#hdn_ser_'+i).val();
                var doc=$('#hdn_doc_'+i).val();
                var date=$('#hdn_date_'+i).val();
                var token=$('#hdn_tok_'+i).val();//alert(token);

                var from_email = "<?php echo $email_from;?>";
                var from_name = "<?php echo $email_from_name;?>";
                var email_to = "<?php echo $email;?>";
                var reply_to_email = '';
                var reply_to_name = '';
                var subject = "Please, Confirm appointment";
                var link = "<?php echo base_url('/Dashboard/ConfirmApp/');?>" + token;
                var link_web = '351face.com';
                var body = '<h1>Appointment confirmation</h1>' +
                    '<p>You submitted an aplicatiion for an appointment in <a href="' + link_web + '">Advanced Cosmetic Surgery & Laser Center.</a></p>' +
                    '<br>' +
                    '<p><strong>Service: </strong>'+serv+'</p>' +
                    '<p><strong>Doctor: </strong>'+doc+'</p>' +
                    '<p><strong>Date: </strong>'+date+'</p>' +
                    '<br>' +
                    '<p>Please use this link to confirm your appoint.</p>' +
                    '<p>Here is your link: </p><p><a href="' + link + '"><button class="btn btn-default">Please, Confirm appointment</button></a></p>' +
                    '<p>If you don\'t recognize the email, you can delete this email.</p>' +
                    '<br>' +
                    '<p>Thanks,</p>' +
                    '<p>Advanced Cosmetic Surgery & Laser Center</p>' +
                    '<p>Rookwood Commons Shopping Center</p>' +
                    '<p>3805 Edwards Rd #100</p>' +
                    '<p>Cincinnati, OH 45244</p>' +
                    '<p>Phone: 513-351-FACE(3223)</p>' +
                    '<p>Fax: 513-396-8995</p>';


                $.ajax(
                    {
                        url:'Main/EnviarEmail',
                        type:'POST',
                        data:{from_email:from_email, from_name:from_name, email_to:email_to, reply_to_email:reply_to_email, reply_to_name:reply_to_name, subject:subject, body:body}
                    }).done(function(response, textStatus, jqXHR)
                {
                    if(response == 'WRONG') {
                        $('#modal').html('Your email is wrong.');
                    }
                    else
                    {
                        $('#modal').html('Please, check your inbox. Has been sent an email to ' + email_to);
                    }
                });
            });

            $('body').on('click', '.resend_email', function ()
            {
                var i = $(this).attr('id');//alert(i);

                var title=$('#hdn_title_'+i).val();
                var serv=$('#hdn_ser_'+i).val();
                var doc=$('#hdn_doc_'+i).val();
                var date=$('#hdn_date_'+i).val();

                var from_email = 'dispatch-system@tekexperts.com';
                var from_name = 'Advanced Cosmetic Surgery';
                var email_to = 'raydel@mactutor.net';
                var reply_to_email = '';
                var reply_to_name = '';
                var subject = "Appointment information";
                var link_web = '351face.com';
                var body = '<h1>Appointment information</h1>' +
                    '<p>You have an appointment in <a href="' + link_web + '">Advanced Cosmetic Surgery & Laser Center.</a></p>' +
                    '<br>' +
                    '<p><strong>Service: </strong>'+serv+'</p>' +
                    '<p><strong>Doctor: </strong>'+doc+'</p>' +
                    '<p><strong>Date: </strong>'+date+'</p>' +
                    '<br>' +
                    '<p>If you don\'t recognize the email, you can delete this email.</p>' +
                    '<br>' +
                    '<p>Thanks,</p>' +
                    '<p>Advanced Cosmetic Surgery & Laser Center</p>' +
                    '<p>Rookwood Commons Shopping Center</p>' +
                    '<p>3805 Edwards Rd #100</p>' +
                    '<p>Cincinnati, OH 45244</p>' +
                    '<p>Phone: 513-351-FACE(3223)</p>' +
                    '<p>Fax: 513-396-8995</p>';


                $.ajax(
                    {
                        url:'Main/EnviarEmail',
                        type:'POST',
                        data:{from_email:from_email, from_name:from_name, email_to:email_to, reply_to_email:reply_to_email, reply_to_name:reply_to_name, subject:subject, body:body}
                    }).done(function(response, textStatus, jqXHR)
                {
                    if(response == 'WRONG') {
                        $('#modal').html('Your email is wrong.');
                    }
                    else
                    {
                        $('#modal').html('Please, check your inbox. Has been sent an email to ' + email_to);
                    }
                });
            });

        });
    </script>