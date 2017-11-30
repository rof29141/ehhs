<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$page_title = "";
$position='center';
require_once(APPPATH."views/includes/header.php");
?>

<body >
<div id="wrapper">
    <div class="container text-center" style="margin-top: 90px;">
        <?php require_once(VIEW_URL."includes/banner.php");?>
    </div>

    <div class="container">

        <div style="align-content: center;">

            <div class="col-lg-3"></div>

            <form method="POST" action="../SendMailDownloadiCal" id="frm" name="frm">
                <div class="col-lg-6" style="background-color: #fff;">
                    <fieldset class="myfieldset">
                        <legend class="mylegend">Confirm Appointment</legend>

                        <div class="col-lg-12" id="confirm_app">

                            <div class="form-group">
                                <label>Patient</label>
                                <input type="text" name="txt_patient" id="txt_patient" class="form-control required" readonly value="<?php if(isset($bd_FirstName) && isset($bd_LastName)) echo $bd_FirstName.' '.$bd_LastName;?>" />
                            </div>

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
                                <input name="hdn_bd_user_email" type="hidden" value="<?php echo $bd_user_email;?>"/>
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
        $('#btn_confirm_app').on('click', function ()
        {
            ConfirmAppointment($('#txt_app').val());
        });

        function SendMail()
        {
            var from_email = "<?php echo $email_from;?>";
            var from_name = "<?php echo $email_from_name;?>";
            var email_to = "<?php echo $email;?>";
            var reply_to_email = '';
            var reply_to_name = '';
            var subject = "Appointment Confirmed";
            var attachments = './assets/images/logo.png';
            var link_web = '351face.com';
            var body = '<h1>Appointment Confirmed</h1>' +
                '<p>The patient <b><?php echo $bd_FirstName." ".$bd_LastName;?></b> has submited an appointment.' +
                '<br>' +
                '<p><strong>Date: </strong>'+$('#txt_date').val()+'</p>' +
                '<p><strong>Time: </strong>'+$('#txt_start').val()+'</p>' +
                '<p><strong>Provider: </strong>'+$('#txt_doctor').val()+'</p>' +
                '<p><strong>Service: </strong>'+$('#txt_service').val()+'</p>' +
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
                url:'../../Main/EnviarEmail',
                type:'POST',
                data:{from_email:from_email, from_name:from_name, email_to:email_to, reply_to_email:reply_to_email, reply_to_name:reply_to_name, subject:subject, body:body, attachments:attachments}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response == 'WRONG') {
                    $('#modal').html('Your email is wrong.');
                }
                else
                {
                    document.frm.submit();
                }
            });
        }

        function ConfirmAppointment(id)
        {
            var array_inputs='&TokenConfirmApp='+'&id='+id;
            var url = '../../Main/SaveObjectWoutLogged';
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
                    SendMail();
                }
                else{alertify.error('Error: The element could not be Saved. '+ response);}


            }).fail(function(jqHTR, textStatus, thrown)
            {
                alertify.error('Something wrong with AJAX:' + textStatus);
            });
        }
    });
</script>