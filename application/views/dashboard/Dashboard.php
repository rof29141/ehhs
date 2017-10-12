<div class="container" >
    <div class="row" style="margin: 20px;">
        <div class="col-lg-12">
            <fieldset class="myfieldset">
                <legend class="mylegend">Create an Appointment</legend>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Service</label>
                            <select class="my_select2" id="sel_service" name="sel_service">
                                <option value="-1"></option>
                                <?php $group_service='';for ($i=0;$i<count($service['data']);$i++){
                                    if($service['data'][$i]['GroupService']!=$group_service)
                                    {
                                    ?>
                                        <optgroup label="<?php echo $service['data'][$i]['GroupService'];?>">
                                    <?php
                                    }

                                    ?>
                                            <option value="<?php echo $service['data'][$i]['__kp_PRIMARY_KEY'];?>"><?php echo $service['data'][$i]['Service'];?></option>
                                    <?php

                                    if($service['data'][$i]['GroupService']!=$group_service)
                                    {
                                    ?>
                                        </optgroup>
                                    <?php
                                        $group_service=$service['data'][$i]['GroupService'];
                                    }
                                }?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <div id="drop_down_doc"></div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div id=doc_photo></div>
                    </div>
                </div>

                <div id='calendar_app'></div>

            </fieldset>
        </div>

    </div>
</div>

<div class="modal fade" id="remoteModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-content" style="align-content: center;">

        <div class="col-lg-4"></div>

        <form method="post" action="" id="frm">
            <div class="col-lg-4" style="background-color: #fff;">
                <fieldset class="myfieldset">
                    <legend class="mylegend">Confirm Appointment</legend>
                        <div display="padding:15px"id="modal"></div>
                </fieldset>
            </div>
        </form>

        <div class="col-lg-4"></div>

    </div>

</div>

<script type="text/javascript">

    $(document).ready(function()
    {
        $(".my_select2").select2({
            placeholder: {
                id: '-1', // the value of the option
                text: 'Select an option'
            }
        });

        $('body').on('change', '#sel_service', function ()
        {
            var id_service = $(this).val();
            if(id_service!='' && id_service!=0 && id_service!=null)
            {
                $('#drop_down_doc').html();
                var target = document.getElementById('container');
                var spinner = new Spinner(opts).spin(target);

                $.ajax({
                    url: 'Main/LlenarDataTable',
                    type: 'POST',
                    data: {data_type: 'dropdown_doctor', view_url: 'dashboard/DropDownDoctor', id_service: id_service}
                }).done(function (response, textStatus, jqXHR) {
                    if(response!='NOT_SETTINGS')
                    {
                        $('#drop_down_doc').html(response);
                    }
                    else
                    {
                        alertify.error('Settings not defined for this service.');
                        $('#drop_down_doc').html('');
                        $('#calendar_app').html('');
                        $('#doc_photo').html('');
                    }

                    spinner.stop();
                });
            }
        });

        $('body').on('change', '#sel_doctor', function ()
        {
            var id_service = $('#sel_service').val();
            var id_doctor = $(this).val();
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            $.ajax({
                url: 'Dashboard/GetAppointments',
                type: 'POST',
                data: {id_service:id_service,id_doctor:id_doctor}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    $('#calendar_app').html(response);
                    spinner.stop();
                }
            });
        });

        $('body').on('click', '#btn_submit_app', function ()
        {
            var from_email = 'dispatch-system@tekexperts.com';
            var from_name = 'Advanced Cosmetic Surgery';
            var email_to = 'raydel@mactutor.net';
            var reply_to_email = '';
            var reply_to_name = '';
            var subject = "Confirm Appointment";
            var link = "<?php echo base_url('/Dashboard/Confirm/');?>" + Math.floor((Math.random() * 1000000000000000) + 1);
            var link_web = '351face.com';
            var body = '<h1>Appointment confirmation</h1>' +
                '<p>You submitted an aplicatiion for an appointment in <a href="' + link_web + '">Advanced Cosmetic Surgery & Laser Center.</a></p>' +
                '<br>' +
                '<p><strong>Service: </strong>'+$('#txt_service').val()+'</p>' +
                '<p><strong>Doctor: </strong>'+$('#txt_doctor').val()+'</p>' +
                '<p><strong>Date: </strong>'+$('#txt_start').val()+'</p>' +
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
                    SaveAppointment($('#txt_service').attr('datafld'),"<?php echo 1;?>", $('#txt_doctor').attr('datafld'), $('#txt_start').val(), $('#txt_end').val());
                    $('#modal').html('Please, check your inbox. Has been sent an email to ' + email_to);
                }
            });
        });

        function SaveAppointment(id_service, id_patient, id_doctor, date,start, end, title)
        {
            //alert(id_service+' '+id_doctor+' '+start);//, 'id_doctor':id_doctor, 'start':start
            var array_inputs='_kf_ServiceID='+id_service+'&_zfk_ClientRec='+id_patient+'&ProviderRec='+id_doctor+'&APT_Date='+date+'&APT_Time='+start+'&APT_TimeEnd='+end+'&APT_Title='+title;
            var url = 'Main/SaveObject';
            var data = array_inputs+'&layout=PHP_Appointment&type=INSERT';

            SaveContent(url, data);
        }
    });
</script>