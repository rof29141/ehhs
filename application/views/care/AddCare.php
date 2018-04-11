<div class="container" >
    <div class="row" style="margin-top: 70px;">
        <div class="col-lg-12">

            <div class="row">

                <div class="col-lg-5">
                    <fieldset class="myfieldset">
                        <legend class="mylegend">Add Care Schedule</legend>

                        <form class='sky-form validatable' role='form' name='frm' id='frm' action="">
                            <div class="col-sm-12">

                                <div class="row">
                                    <section class="col col-9">
                                        <label>Patient</label>
                                        <select name="sel_client" id="sel_client" class="my_select2 required_select" style="width: 100%;">
                                            <option value="-1" selected></option>
                                            <?php
                                            if(isset($client['data']))
                                            {
                                                $i=0;

                                                foreach ($client['data'] as $row)
                                                {
                                                    ?>

                                                    <option <?php if($row->id_client==$id_client)print 'selected';?> value="<?php print $row->id_client;?>" id="<?php print $row->id_client;?>" title="<?php print $row->id_person;?>"><?php print $row->first_name.' '.$row->second_name;?></option>

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
                                    <section class="col col-7">
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

                                    <section class="col col-5">
                                        <label class="input">
                                            <label>Repeat every N weeks</label>
                                            <input type="number" name="repeat_every_week" id="repeat_every_week" class="form-control required" value="1" min="1"/>
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

                <div class="col-lg-7">
                    <fieldset class="myfieldset">
                        <legend class="mylegend">List Care Schedule</legend>

                        <table id="data_table_care" class="table table-condensed table-responsive table-striped table-hover " style="margin-left: auto;margin-right: auto;" width="100%"></table>

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

        jQuery(".my_select2").select2({
            placeholder: {
                id: '-1', // the value of the option
                text: 'Select a Patient'
            },
            templateResult: ShowPhoto,
            templateSelection: ShowPhoto1
        });

        jQuery('#sel_client').on('change', function()
        {
            var id_client=jQuery(this).val();
            LoadTableCare(id_client);
        });

        if('<?php print $id_client;?>'!='')LoadTableCare(<?php print $id_client;?>);

        function LoadTableCare(id_client='')
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_list_care',view_url:'care/DataTableListCare', id_client:id_client}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_table_care').html(response);
                    spinner.stop();
                }
            });
        }

        jQuery('#btn_save_care').on('click', function (e)
        {
            ValidateFrm('frm');
            if(jQuery('#frm').valid())
            {
                var table='care_schedule';
                var id_client=jQuery('#sel_client').val();
                var start_time=jQuery('#start_time').val();
                var end_time=jQuery('#end_time').val();
                var start_date=jQuery('#start_date').val();
                var end_date=jQuery('#end_date').val();
                var repeat_every_week=jQuery('#repeat_every_week').val();

                if(jQuery('#cbx_sunday').prop('checked'))var week_days='1';else var week_days='0';
                if(jQuery('#cbx_monday').prop('checked'))week_days=week_days+',1';else week_days=week_days+',0';
                if(jQuery('#cbx_tuesday').prop('checked'))week_days=week_days+',1';else week_days=week_days+',0';
                if(jQuery('#cbx_wenesday').prop('checked'))week_days=week_days+',1';else week_days=week_days+',0';
                if(jQuery('#cbx_thursday').prop('checked'))week_days=week_days+',1';else week_days=week_days+',0';
                if(jQuery('#cbx_friday').prop('checked'))week_days=week_days+',1';else week_days=week_days+',0';
                if(jQuery('#cbx_saturday').prop('checked'))week_days=week_days+',1';else week_days=week_days+',0';

                var url = 'Main/SaveObject';
                var data = 'approved=1&id_client='+id_client+'&start_time='+start_time+'&end_time='+end_time+'&start_date='+start_date+'&end_date='+end_date+'&repeat_every_week='+repeat_every_week+'&week_days='+week_days+'&table='+table+'&type=INSERT';

                var target = document.getElementById('container');
                var spinner = new Spinner(opts).spin(target);

                jQuery.ajax({
                    type: "POST",
                    dataType: "html",
                    url: url,
                    data:data
                }).done(function(response, textStatus, jqXHR)
                {
                    if(jQuery.isNumeric(response))
                    {
                        alertify.success('Data Saved.');
                        LoadContent('Care/GoAddCare');
                    }
                    else{alertify.error('Error: The element could not be Saved. '+ response);}
                    spinner.stop();

                }).fail(function(jqHTR, textStatus, thrown)
                {
                    alertify.error('Something is wrong with AJAX:' + textStatus);
                });
            }
        });

    });

</script>