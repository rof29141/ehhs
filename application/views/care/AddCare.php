<div class="container" >
    <div class="row" style="margin-top: 70px;">
        <div class="col-lg-12">

            <div class="row">

                <div class="col-lg-8 col-lg-offset-2">
                    <fieldset class="myfieldset">
                        <legend class="mylegend">Add Care Schedule</legend>

                        <form class='sky-form validatable' role='form' name='frm' id='frm' action="">
                            <div class="col-sm-12">

                                <div class="row">
                                    <section class="col col-9">
                                        <label>Patient</label>
                                            <select name="sel_client" id="sel_client" class="my_select2_client required_select" style="width: 100%;">
                                                <option value="-1" selected></option>
                                                <?php
                                                if(isset($client['data']))
                                                {
                                                    $i=0;

                                                    foreach ($client['data'] as $row)
                                                    {
                                                        ?>

                                                        <option id="<?php print $row->id_client;?>" title="<?php print $row->id_person;?>"><?php print $row->first_name.' '.$row->second_name;?></option>

                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                    </section>
                                    
                                    <section class="col col-3 text-center">
                                        <div id=client_pic></div>
                                    </section>
                                </div>

                                <div class="row">
                                    <section class="col col-6">
                                        <label class="input">
                                            <label>Start Time</label>
                                            <input placeholder="Enter the Start Time"type="text" name="start_time" id="start_time" class="form-control required" data-autoclose="true"/>
                                        </label>
                                    </section>

                                    <section class="col col-6">
                                        <label class="input">
                                            <label>End Time</label>
                                            <input placeholder="Enter the End Time" type="text" name="end_time" id="end_time" class="form-control required" data-autoclose="true"/>
                                        </label>
                                    </section>
                                </div>

                                <div class="row">
                                    <section class="col col-6">
                                        <label class="input">
                                            <label>Start Date</label>
                                            <input placeholder="Enter the Start Date"type="text" name="start_date" id="start_date" class="form-control required"/>
                                        </label>
                                    </section>

                                    <section class="col col-6">
                                        <label class="input">
                                            <label>End Date</label>
                                            <input placeholder="Enter the End Date" type="text" name="end_date" id="end_date" class="form-control required"/>
                                        </label>
                                    </section>
                                </div>

                                <div class="row">
                                    <section class="col col-6">
                                        <fieldset class="myfieldset" style="padding-top:0px;padding-bottom: 10px;">
                                            <legend class="mylegend" >Days of week</legend>
                                            <label class="toggle"><input type="checkbox" id="cbx_sunday" name="cbx_sunday" checked><i class="rounded-4x"></i>Sunday</label>
                                            <label class="toggle"><input type="checkbox" id="cbx_monday" name="cbx_monday" checked><i class="rounded-4x"></i>Monday</label>
                                            <label class="toggle"><input type="checkbox" id="cbx_tuesday" name="cbx_tuesday" checked><i class="rounded-4x"></i>Tuesday</label>
                                            <label class="toggle"><input type="checkbox" id="cbx_wenesday" name="cbx_wenesday" checked><i class="rounded-4x"></i>Wesnesday</label>
                                            <label class="toggle"><input type="checkbox" id="cbx_thursday" name="cbx_thursday" checked><i class="rounded-4x"></i>Thursday</label>
                                            <label class="toggle"><input type="checkbox" id="cbx_friday" name="cbx_friday" checked><i class="rounded-4x"></i>Friday</label>
                                            <label class="toggle"><input type="checkbox" id="cbx_saturday" name="cbx_saturday" checked><i class="rounded-4x"></i>Saturday</label>
                                        </fieldset>

                                    </section>

                                    <section class="col col-6">
                                        <label class="input">
                                            <label>Repeat every N weeks</label>
                                            <input type="number" name="repeat" id="repeat" class="form-control required" value="1" min="1" max="10"/>
                                        </label>
                                    </section>
                                </div>

                                <div class="form-group pull-right">
                                    <button type="button" id="btn_save_care" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>

                    </fieldset>
                </div>

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">

    jQuery(document).ready(function()
    {
        jQuery('#start_time').timepicki();
        jQuery('#end_time').timepicki();

        Datepicker.initDatepicker();

        jQuery("#frm").validate(
        {
            rules: {
                start_time : {
                    required : true
                },
                end_time : {
                    required : true
                }
            },

            messages: {
                start_time : {
                    required : 'Please enter a start time.'
                },
                end_time : {
                    required : 'Please enter a end time.'
                }
            },

            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            }
        });

        function ShowPhoto (data)
        {
            if (data.id==0) { return data.text; }

            var result= jQuery('<span><img class="photo_person_row" src="<?php print base_url('/assets/upload/person_photo/photo_');?>'+data.title+'.jpg"/> ' + data.text + '</span>');
            return result;
        };

        function ShowPhoto1 (data)
        {
            if (data.id==0) { return data.text; }

            var result= jQuery(
                '<span>' + data.text + '</span>'
            );
            if(data.title)jQuery('#client_pic').html('<img class="photo_person" src="<?php print base_url('/assets/upload/person_photo/photo_');?>'+data.title+'.jpg"/>');
            else jQuery('#client_pic').html('<img class="photo_person" src="<?php print base_url('assets/images/male.png');?>"/>');
            return result;
        };

        jQuery(".my_select2_client").select2({
            placeholder: {
                id: '-1', // the value of the option
                text: 'Select a Patient'
            },
            templateResult: ShowPhoto,
            templateSelection: ShowPhoto1
        });

        jQuery('#btn_save_care').on('click', function (e)
        {
            if(jQuery('#frm').valid())
            {
                var table='care_schedule';
                var id=jQuery('#id_person').val();

                if(id=='')
                    var type='INSERT';
                else
                    var type='UPDATE';

                var array_inputs=jQuery('#frm1').find('input[datafld!=ignore], select[datafld!=ignore]').serialize();
                var url = 'User/SaveProfile';
                var data = array_inputs+'&table='+table+'&type=INSERT';

                data = data + '&update_sessions=0';

                var target = document.getElementById('container');
                var spinner = new Spinner(opts).spin(target);

                jQuery.ajax({
                    type: "POST",
                    dataType: "html",
                    url: url,
                    data:data
                }).done(function(response, textStatus, jqXHR)
                {
                    if(response!='1' && response!='')
                    {
                        if(jQuery.isNumeric(response))
                        {
                            jQuery('#id_person').val(response);

                            jQuery('#files').hide('slow',function() {
                                jQuery('#files').html('');
                            });
                            if(jQuery('#id_person').val()=='')jQuery('#random').val('');else jQuery('#random').val('no');

                            ShowPhoto(response);
                            RebuildHeader();
                            alertify.success('Data Saved.');

                            if('<?php print $role;?>'=='worker')
                            {
                                LoadDataEmployment(jQuery('#id_person').val());
                                jQuery('#tab3').show().tab('show');
                                jQuery('#s2').removeClass('active').addClass('fade');
                                jQuery('#s3').removeClass('fade').addClass('active');
                                goToByScroll('tab3');
                            }
                            else if('<?php print $role;?>'=='patient')
                            {
                                LoadDataClientPreference(jQuery('#id_person').val());
                                jQuery('#tab3').show().tab('show');
                                jQuery('#s2').removeClass('active').addClass('fade');
                                jQuery('#s3').removeClass('fade').addClass('active');
                                goToByScroll('tab3');
                            }
                        }
                        else{alertify.error('Error: The element could not be Saved. '+ response);}
                        spinner.stop();
                    }
                    //else
                    //window.location.replace("Authentication");
                }).fail(function(jqHTR, textStatus, thrown)
                {
                    alertify.error('Something is wrong with AJAX:' + textStatus);
                });
            }
        });

    });

</script>