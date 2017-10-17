<div class="container" >
    <div class="row" style="margin: 20px;">
        <div class="col-lg-12">
            <fieldset class="myfieldset">
                <legend class="mylegend">Create an Appointment</legend>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group" style="margin-left: 35px;">
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
                text: 'Select a Service'
            }
        });

        $('#sel_service').on('change', function ()
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
    });
</script>