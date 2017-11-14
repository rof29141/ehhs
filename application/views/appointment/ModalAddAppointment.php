<div class="col-lg-12">

    <?php if($data['app']['error']!='0'){?>

        <div class="form-group">
            <label>Service</label>
            <input type="text" name="txt_service" id="txt_service" datafld="<?php echo $data['service']['data'][0]['__kp_PRIMARY_KEY'];?>" class="form-control required" readonly value="<?php if(isset($data['service']['data'][0]['Service'])) echo $data['service']['data'][0]['Service'];?>" />
            <input type="text" name="hdn_service" id="hdn_service" value="<?php if(isset($data['service']['data'][0]['ACS_ServiceValueList'])) echo $data['service']['data'][0]['ACS_ServiceValueList'];?>" />
            <input type="hidden" name="txt_patient" id="txt_patient" value="<?php if(isset($__zkp_Client_Rec)) echo $__zkp_Client_Rec;?>" />
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="form-group">
                    <label>Doctor</label>
                    <input type="text" name="txt_doctor" id="txt_doctor" datafld="<?php echo $data['doctor']['data'][0]['_zpk_Staff_Rec'];?>" class="form-control required" readonly value="<?php if(isset($data['doctor']['data'][0]['_zpk_Staff_Rec'])) echo $data['doctor']['data'][0]['FirstName'].' '.$data['doctor']['data'][0]['LastName'];?>" />
                </div>
            </div>

            <div class="col-lg-4">
                <img class="doc_img" src="<?php echo $data['doctor']['data'][0]['Photo'];?>"/>
            </div>
        </div>

        <div class="form-group">
            <label>Date</label>
            <input type="text" name="txt_date" id="txt_date" class="form-control required" readonly value="<?php if(isset($data['start'])) echo date('m/d/y', strtotime($data['start']));?>" />
        </div>

        <div class="form-group">
            <label>Time</label>
            <input type="text" name="txt_start" id="txt_start" class="form-control required" readonly value="<?php if(isset($data['start'])) echo substr($data['start'],16,8);?>" />
            <input type="hidden" name="txt_end" id="txt_end" class="form-control required" readonly value="<?php if(isset($data['end'])) echo substr($data['end'],16,8);?>" />
            <input type="hidden" name="txt_id_setting" id="txt_id_setting" class="form-control required" readonly value="<?php if(isset($data['setting_id'])) echo $data['setting_id'];?>" />
        </div>

        <div class="form-group pull-right">
            <button type="button" id="btn_submit_app" class="btn btn-success">Submit Appointment</button>
            <button type="button" id="" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

    <?php }else{echo 'Please, reload the page, exist an appointment in this date and time.';}?>
</div>

<script type="text/javascript">
    $(document).ready(function()
    {
        $('#btn_submit_app').on('click', function ()
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            var token=Math.floor((Math.random() * 1000000000000000) + 1);
            var title=toString($('#txt_doctor').val())+' / '+toString($('#txt_service').val());

            SaveAppointment($('#txt_service').attr('datafld'), $('#hdn_service').val(), $('#txt_patient').val(), $('#txt_doctor').attr('datafld'), $('#txt_date').val(), $('#txt_start').val(), $('#txt_end').val(), title, token, spinner, $('#txt_id_setting').val());
        });

        function SaveAppointment(id_service, ACS_ServiceValueList, id_patient, id_doctor, date,start, end, title, token, spinner, setting_id)
        {//alert(setting_id);
            var array_inputs='_kf_ServiceID='+id_service+'&APT_VisitType='+ACS_ServiceValueList+'&_zfk_ClientRec='+id_patient+'&ProviderRec='+id_doctor+'&APT_Date='+date+'&APT_Time='+start+'&APT_TimeEnd='+end+'&APT_Title='+title+'&TokenConfirmApp='+token+'&AppFromWeb=1&_kf_Setting_ID='+setting_id;
            var url = 'Main/SaveObject';
            var data = array_inputs+'&layout=PHP_Appointment&type=INSERT';

            $.ajax({
                type: "POST",
                dataType: "html",
                url: 'Dashboard/GetAppointmentBy',
                data:{id_service:id_service, id_doctor:id_doctor, date:date, start:start}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response=='0'){$('#modal').html('Please, reload the page, exist an appointment in this date and time.');spinner.stop();}
                else{SaveContentApp(url, data, title, token, spinner);}

            }).fail(function(jqHTR, textStatus, thrown)
            {
                alertify.error('Something wrong with AJAX:' + textStatus);
            });
        }

        function SaveContentApp(url, array_inputs, title, token, spinner)
        {
            $.ajax({
                type: "POST",
                dataType: "html",
                url: url,
                data:array_inputs
            }).done(function(response, textStatus, jqXHR)
            {
                if(response!='1')
                {
                    if(response=='0')
                    {
                        alertify.success('Data Saved.');
                        SendMail(title, token, spinner);

                        var id=$('#hdn_id').val();
                        var go_layout=$('#hdn_go_layout').val();

                        if(id!='' && go_layout!='')//reschedule
                            CancelAppointment(id, go_layout);
                    }
                    else{alertify.error('Error: The element could not be Saved. '+ response);spinner.stop();}
                }
                else
                    window.location.replace("Authentication");
            }).fail(function(jqHTR, textStatus, thrown)
            {
                alertify.error('Something wrong with AJAX:' + textStatus);
            });
        }

        function SendMail(title, token, spinner)
        {
            var from_email = "<?php echo $email_from;?>";
            var from_name = "<?php echo $email_from_name;?>";
            var email_to = "<?php echo $email;?>";
            var reply_to_email = '';
            var reply_to_name = '';
            var subject = "Please Confirm Your Appointment";
            var attachments = './assets/images/logo.png';//&./assets/upload/1111.pdf
            var link = "<?php echo base_url('/Dashboard/ConfirmApp/');?>" + token;
            var link_web = '351face.com';
            var body ='<p>Dear <?php echo $bd_FirstName." ".$bd_LastName;?>,</p>' +
                '<p>Thank you for submitting an application for an appointment at the <a href="' + link_web + '">Advanced Cosmetic Surgery & Laser Center.</a></p>' +
                '<br>' +
                '<p>Please click on this link to confirm your appointment details below.</p>' +
                '<p><a href="' + link + '"><button class="btn btn-success">Confirm Appointment</button></a></p>' +
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
                url:'Main/EnviarEmail',
                type:'POST',
                data:{from_email:from_email, from_name:from_name, email_to:email_to, reply_to_email:reply_to_email, reply_to_name:reply_to_name, subject:subject, body:body, attachments:attachments}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response == 'WRONG') {$('#modal').html('Your email is wrong.');}
                else {$('#modal').html('Please, check your inbox. A confirmation request email has been sent to ' + email_to+'<br><fieldset><div class="text-center"><a class="btn btn-default" data-dismiss="modal">Close</a></div></fieldset>');}
                spinner.stop();
            });
        }

        function CancelAppointment(id, go_layout)
        {
            $.ajax(
            {
                url:'Main/DeleteObject',
                type:'POST',
                data:{go_layout:go_layout,id:id}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response == 'NO_CANCEL') {
                    $('#modal').html('<div class="text-center">You can not reschedule the appointment, please, call the office at 513-351-FACE(3223).</div><br><div class="text-center"><a class="btn btn-default" data-dismiss="modal">Close</a></div>');
                }
                else
                {
                    $('#modal').html('<div class="text-center">Your appointment has been rescheduled.</div><br><div class="text-center"><a class="btn btn-default" data-dismiss="modal">Close</a></div>');
                }
                $('#modal_title').html('Reschedule Appointment');
                $('#remoteModal').modal('show');
            });
        }
    });
</script>