<div class="container" >
    <div class="row" style="margin: 20px;">
        <div class="col-lg-12">
            <fieldset class="myfieldset">
                <legend class="mylegend">Create an Appointment</legend>

                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>Service</label>
                            <select class="my_select2" id="sel_service" name="sel_service">
                                <option value="-1"></option>
                                <?php $group_service='';
                                for ($i=0;$i<count($service['data']);$i++)
                                {

                                    if($service['data'][$i]['GroupService']!=$group_service)
                                    {
                                        $group_service=$service['data'][$i]['GroupService'];
                                    ?>
                                        <optgroup label="<?php echo $service['data'][$i]['GroupService'];?>">
                                    <?php
                                    }

                                    ?>
                                            <option <?php if(isset($id_serv) && $id_serv==$service['data'][$i]['__kp_PRIMARY_KEY']){echo 'selected';$desc=$service['data'][$i]['Description'];}?> value="<?php echo $service['data'][$i]['__kp_PRIMARY_KEY'];?>"><?php echo $service['data'][$i]['Service'];?></option>
                                    <?php

                                    if($service['data'][$i]['GroupService']!=$group_service)
                                    {
                                    ?>
                                        </optgroup>
                                    <?php
                                    }
                                }?>
                            </select>
                            <?php
                            for ($i=0;$i<count($service['data']);$i++)
                            {
                                ?>
                                <input type="hidden" name="hdn_serv_desc_<?php echo $service['data'][$i]['__kp_PRIMARY_KEY'];?>"id="hdn_serv_desc_<?php echo $service['data'][$i]['__kp_PRIMARY_KEY'];?>" value="<?php if(isset($service['data'][$i]['Description'])) echo $service['data'][$i]['Description'];?>" />
                                <?php
                            }
                            ?>
                            <div class="note" style="padding-top: 5px;">Please, call to the office at 513-351-FACE(3223) if you don't see the service you need.</div>

                            <div class="note" id="serv_desc" style="padding-top: 5px;color: #000;"><?php if(isset($desc))echo $desc;?></div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <div id="drop_down_doc"></div>
                        </div>
                    </div>

                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div id=doc_photo></div>
                    </div>
                </div>

                <div id='calendar_app'></div>

            </fieldset>
        </div>

    </div>
</div>

<form name="frm" id="frm">
    <input id="hdn_go_layout" type="hidden" value="<?php if(isset($go_layout))echo $go_layout;?>"/>
    <input id="hdn_id" type="hidden" value="<?php if(isset($delete_id))echo $delete_id;?>"/>
</form>

<div class="modal fade" id="remoteModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-content" style="align-content: center;">

        <div class="col-lg-4"></div>

        <form method="post" action="" id="frm">
            <div class="col-lg-4" style="top:20px;background-color: #fff;">
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
                text: 'Select a Service'
            }
        });

        $('#sel_service').on('change', function ()
        {
            $('#drop_down_doc').html('');
            $('#calendar_app').html('');
            $('#doc_photo').html('');

            var id_service = $(this).val();
            if(id_service!='' && id_service!=0 && id_service!=null)
            {
                var desc=$('#hdn_serv_desc_'+ id_service).val();
                $('#serv_desc').html(desc);

                var target = document.getElementById('container');
                var spinner = new Spinner(opts).spin(target);

                $.ajax({
                    url: 'Main/LlenarDataTable',
                    type: 'POST',
                    data: {data_type: 'dropdown_doctor', view_url: 'dashboard/DropDownDoctor', id_service: id_service}
                }).done(function (response, textStatus, jqXHR) {

                    if(response=='1')
                    {
                        window.location.replace("Authentication");
                    }
                    else if(response=='NOT_DOCTOR')
                    {
                        alertify.error('Doctor not asingned for this service.');
                    }
                    else
                    {
                        $('#drop_down_doc').html(response);
                    }
                    spinner.stop();
                });
            }
        });

        $(function ()
        {
            var id_doctor = "<?php if(isset($id_doc)) echo $id_doc;else echo 'NO_DOC'?>";

            if (id_doctor != 'NO_DOC')
            {
                var id_service = "<?php if(isset($id_serv)) echo $id_serv;else echo 'NO_SERV'?>";

                if (id_service != 'NO_SERV')
                {
                    var target = document.getElementById('container');
                    var spinner = new Spinner(opts).spin(target);

                    $.ajax({
                        url: 'Main/LlenarDataTable',
                        type: 'POST',
                        data: {
                            data_type: 'dropdown_doctor',
                            view_url: 'dashboard/DropDownDoctor',
                            id_service: id_service,
                            id_doctor: id_doctor
                        }
                    }).done(function (response, textStatus, jqXHR) {

                        if (response == '1') {
                            window.location.replace("Authentication");
                        }
                        else if (response == 'NOT_DOCTOR') {
                            alertify.error('Doctor not asingned for this service.');
                        }
                        else {
                            $('#drop_down_doc').html(response);
                        }
                        spinner.stop();
                    });
                }
            }
        });
    });
</script>