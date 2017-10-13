<div class="col-lg-12">

    <?php if($data['app']['error']!='0'){?>

        <div class="form-group">
            <label>Service</label>
            <input type="text" name="txt_service" id="txt_service" datafld="<?php echo $data['service']['data'][0]['__kp_PRIMARY_KEY'];?>" class="form-control required" readonly value="<?php if(isset($data['service']['data'][0]['Service'])) echo $data['service']['data'][0]['Service'];?>" />
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
        </div>

        <div class="form-group pull-right">
            <button type="button" id="btn_submit_app" class="btn btn-success">Submit Appointment</button>
        </div>

    <?php }else{echo 'Please, reload the page, exist an appointment in this date and time.';}?>
</div>

<script type="text/javascript">
    $(document).ready(function()
    {
        $('body').on('click', '#btn_submit_app', function ()
        {
            var token=Math.floor((Math.random() * 1000000000000000) + 1);
            var title='Appointment with '+$('#txt_doctor').val()+' at '+$('#txt_date').val();

            var from_email = 'dispatch-system@tekexperts.com';
            var from_name = 'Advanced Cosmetic Surgery';
            var email_to = 'raydel@mactutor.net';
            var reply_to_email = '';
            var reply_to_name = '';
            var subject = "Confirm Appointment";
            var link = "<?php echo base_url('/Dashboard/ConfirmApp/');?>" + token;
            var link_web = '351face.com';
            var body = '<h1>Appointment confirmation</h1>' +
                '<p>You submitted an aplicatiion for an appointment in <a href="' + link_web + '">Advanced Cosmetic Surgery & Laser Center.</a></p>' +
                '<br>' +
                '<p><strong>Service: </strong>'+$('#txt_service').val()+'</p>' +
                '<p><strong>Doctor: </strong>'+$('#txt_doctor').val()+'</p>' +
                '<p><strong>Date: </strong>'+$('#txt_date').val()+' '+$('#txt_start').val()+'</p>' +
                '<br>' +
                '<p>Please use this link to confirm your appoint.</p>' +
                '<p>Here is your link: </p><p><a href="' + link + '"><button class="btn btn-success">Confirm Appointment</button></a></p>' +
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
                    SaveAppointment($('#txt_service').attr('datafld'), $('#txt_patient').val(), $('#txt_doctor').attr('datafld'), $('#txt_date').val(), $('#txt_start').val(), $('#txt_end').val(), title, token);
                    $('#modal').html('Please, check your inbox. Has been sent an email to ' + email_to);
                }
            });
        });

        function SaveAppointment(id_service, id_patient, id_doctor, date,start, end, title, token)
        {
            //alert(id_service+' '+id_doctor+' '+start);//, 'id_doctor':id_doctor, 'start':start
            var array_inputs='_kf_ServiceID='+id_service+'&_zfk_ClientRec='+id_patient+'&ProviderRec='+id_doctor+'&APT_Date='+date+'&APT_Time='+start+'&APT_TimeEnd='+end+'&APT_Title='+title+'&TokenConfirmApp='+token+'&AppFromWeb=1';
            var url = 'Main/SaveObject';
            var data = array_inputs+'&layout=PHP_Appointment&type=INSERT';

            SaveContentApp(url, data);
        }

        function SaveContentApp(url, array_inputs)
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            $.ajax({
                type: "POST",
                dataType: "html",
                url: url,
                data:array_inputs
            }).done(function(response, textStatus, jqXHR)
            {
                if(response!='1')
                {
                    if(response=='0'){alertify.success('Data Saved.');}
                    else{alertify.error('Error: The element could not be Saved. '+ response);}
                    spinner.stop();
                }
                else
                    window.location.replace("Authentication");
            }).fail(function(jqHTR, textStatus, thrown)
            {
                alertify.error('Something wrong with AJAX:' + textStatus);
            });
        }
    });
</script>