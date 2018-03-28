<div class="container" >
    <div class="row" style="margin-top: 70px;">
        <div class="col-lg-12">

            <div class="row">

                <div class="col-lg-5">
                    <fieldset class="myfieldset">
                        <legend class="mylegend">Assign Job to Employee</legend>

                        <form class='sky-form validatable' role='form' name='frm' id='frm' action="">
                            <div class="col-sm-12">

                                <div class="row">
                                    <section class="col col-9">
                                        <label>Employee</label>
                                        <select name="sel_employee" id="sel_employee" class="my_select2_employee required_select" style="width: 100%;">
                                            <option value="-1" selected></option>
                                            <?php
                                            if(isset($worker['data']))
                                            {
                                                $i=0;

                                                foreach ($worker['data'] as $row)
                                                {
                                                    ?>

                                                    <option <?php if($row->id_employee==$id_employee)print 'selected';?> value="<?php print $row->id_employee;?>" id="<?php print $row->id_employee;?>" title="<?php print $row->id_person;?>"><?php print $row->first_name.' '.$row->second_name;?></option>

                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </section>
                                    
                                    <section class="col col-3 text-center">
                                        <div id=employee_pic></div>
                                    </section>
                                </div>

                                <div class="row">
                                    <table id="data_table_care" class="table table-condensed table-responsive table-striped table-hover " style="margin-left: auto;margin-right: auto;" width="100%">
                                        <?php require APPPATH.'views/care/DataTableListCare.php';?>
                                    </table>
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
                        <legend class="mylegend">List Assigned Jobs</legend>

                        <table id="data_table_job" class="table table-condensed table-responsive table-striped table-hover " style="margin-left: auto;margin-right: auto;" width="100%"></table>

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
            if(data.title)jQuery('#employee_pic').html('<img class="photo_person" src="<?php print base_url('/assets/upload/person_photo/photo_');?>'+data.title+'.jpg"/>');
            else jQuery('#employee_pic').html('<img class="photo_person" src="<?php print base_url('assets/images/male.png');?>"/>');
            return result;
        };

        jQuery(".my_select2_employee").select2({
            placeholder: {
                id: '-1', // the value of the option
                text: 'Select an Employee'
            },
            templateResult: ShowPhoto,
            templateSelection: ShowPhoto1
        });

        jQuery('#sel_employee').on('change', function()
        {
            var id_employee=jQuery(this).val();
            //LoadTableJob(id_employee);
        });

        if('<?php print $id_employee;?>'!='')LoadTableCare(<?php print $id_employee;?>);

        function LoadTableJob(id_employee='')
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_list_job',view_url:'care/DataTableListJob', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_table_job').html(response);
                    spinner.stop();
                }
            });
        }

        jQuery('#btn_save_care').on('click', function (e)
        {
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