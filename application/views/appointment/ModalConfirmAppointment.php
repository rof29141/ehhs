<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$page_title = "Reset Password";
$position='center';
require_once(APPPATH."views/includes/header.php");
?>

<body >
<div id="wrapper">


    <div class="container">

        <div class="modal-content" style="align-content: center;">

            <div class="col-lg-3"></div>

            <form method="POST" action="../DownloadiCal" id="frm" name="frm">
                <div class="col-lg-6" style="background-color: #fff;">
                    <fieldset class="myfieldset">
                        <legend class="mylegend">Confirm Appointment</legend>

                        <div class="col-lg-12" id="confirm_app">

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="txt_title" id="txt_title" class="form-control required" readonly value="<?php if(isset($APT_Title)) echo $APT_Title;?>" />
                            </div>

                            <div class="form-group">
                                <label>Service</label>
                                <input type="text" name="txt_service" id="txt_service" class="form-control required" readonly value="<?php if(isset($Service)) echo $Service;?>" />
                                <input type="hidden" name="txt_app" id="txt_app" value="<?php if(isset($RecordID)) echo $RecordID;?>" />
                            </div>

                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>Doctor</label>
                                        <input type="text" name="txt_doctor" id="txt_doctor" class="form-control required" readonly value="<?php if(isset($FirstName)) echo $FirstName.' '.$LastName;?>" />
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <img class="doc_img" src="<?php echo $Photo;?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Date</label>
                                <input type="text" name="txt_date" id="txt_date" class="form-control required" readonly value="<?php if(isset($APT_Date)) echo $APT_Date;?>" />
                            </div>

                            <div class="form-group">
                                <label>Time</label>
                                <input type="text" name="txt_start" id="txt_start" class="form-control required" readonly value="<?php if(isset($APT_Time)) echo $APT_Time;?>" />
                            </div>

                            <div class="form-group pull-right">
                                <button type="button" id="btn_confirm_app" class="btn btn-success">Confirm Appointment</button>

                                <input name="hdn_ical_addr" type="hidden" value="<?php echo '3805 Edwards Rd #100 Cincinnati, OH 45244';?>"/>
                                <input name="hdn_ical_title" type="hidden" value="<?php echo $APT_Title;?>"/>
                                <input name="hdn_ical_date" type="hidden" value="<?php echo $APT_Date;?>"/>
                                <input name="hdn_ical_start" type="hidden" value="<?php echo $APT_Date.' '.$APT_Time;?>"/>
                                <input name="hdn_ical_end" type="hidden" value="<?php echo $APT_Date.' '.$APT_TimeEnd;?>"/>
                                <input name="hdn_ical_url" type="hidden" value="<?php echo '351face.com';?>"/>
                            </div>

                        </div>

                    </fieldset>
                </div>
            </form>

            <div class="col-lg-3"></div>

        </div>

    </div>
</div>

<?php require_once(VIEW_URL."includes/footer.php");?>

<script type="text/javascript">
    $(document).ready(function()
    {
        $('body').on('click', '#btn_confirm_app', function ()
        {
            document.frm.submit();
            var from_email = 'dispatch-system@tekexperts.com';
            var from_name = 'Advanced Cosmetic Surgery';
            var email_to = 'raydel@mactutor.net';
            var reply_to_email = '';
            var reply_to_name = '';
            var subject = "Appointment confirmed";
            var link_web = '351face.com';
            var body = '<h1>Appointment Confirmed</h1>' +
                '<p>A patient has submmited an appointment' +
                '<br>' +
                '<p><strong>Service: </strong>'+$('#txt_service').val()+'</p>' +
                '<p><strong>Doctor: </strong>'+$('#txt_doctor').val()+'</p>' +
                '<p><strong>Date: </strong>'+$('#txt_date').val()+' '+$('#txt_start').val()+'</p>' +
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
                url:'../../Main/EnviarEmail',
                type:'POST',
                data:{from_email:from_email, from_name:from_name, email_to:email_to, reply_to_email:reply_to_email, reply_to_name:reply_to_name, subject:subject, body:body}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response == 'WRONG') {
                    $('#modal').html('Your email is wrong.');
                }
                else
                {
                    ConfirmAppointment($('#txt_app').val());
                    //SendMailtoStaff($('#txt_service').val(), $('#txt_doctor').val(), $('#txt_date').val());
                    $('#modal').html('Please, check your inbox. Has been sent an email to ' + email_to);
                }
            });
        });

        function ConfirmAppointment(id)
        {
            //alert(id_service+' '+id_doctor+' '+start);//, 'id_doctor':id_doctor, 'start':start
            var array_inputs='&TokenConfirmApp='+'&id='+id;
            var url = '../../Main/SaveObjectWoutLogin';
            var data = array_inputs+'&layout=PHP_Appointment&type=UPDATE';

            SaveContentApp(url, data);
        }

        function SaveContentApp(url, array_inputs)
        {
            $.ajax({
                type: "POST",
                dataType: "html",
                url: url,
                data:array_inputs
            }).done(function(response, textStatus, jqXHR)
            {
                if(response=='0')
                {
                    $('#confirm_app').html('Thanks, Appointment confirmed.<br><fieldset><div class="text-center"><a href="<?php echo CTR_URL; ?>Authentication">Back to Login</a></div></fieldset>');

                }
                else{alertify.error('Error: The element could not be Saved. '+ response);}


            }).fail(function(jqHTR, textStatus, thrown)
            {
                alertify.error('Something wrong with AJAX:' + textStatus);
            });
        }

        function SendMailtoStaff(service, doctor, date)
        {
            var from_email = 'dispatch-system@tekexperts.com';
            var from_name = 'Advanced Cosmetic Surgery';
            var email_to = 'raydel@mactutor.net';
            var reply_to_email = '';
            var reply_to_name = '';
            var subject = "Appointment confirmed";
            var link_web = '351face.com';
            var body = '<h1>Appointment Confirmed</h1>' +
                '<p>A patient has submmited an appointment' +
                '<br>' +
                '<p><strong>Service: </strong>'+service+'</p>' +
                '<p><strong>Doctor: </strong>'+doctor+'</p>' +
                '<p><strong>Date: </strong>'+date+' '+$('#txt_start').val()+'</p>' +
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
                url:'../../Main/EnviarEmail',
                type:'POST',
                data:{from_email:from_email, from_name:from_name, email_to:email_to, reply_to_email:reply_to_email, reply_to_name:reply_to_name, subject:subject, body:body}
            }).done(function(response, textStatus, jqXHR)
            {});
        }
    });
</script>