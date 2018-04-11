<div class="container" >
    <div class="row" style="margin-top: 70px;">
        <div class="col-lg-12">

            <script>
                function ShowPhoto (data)
                {
                    if (data.id==0) { return data.text; }

                    var result= jQuery('<span><img class="photo_person_row" src="<?php print base_url('/assets/upload/person_photo/photo_');?>'+data.title+'.jpg"/> ' + data.text + '</span>');
                    return result;
                };
            </script>

            <div class="row">

                <div class="col-lg-12">
                    <fieldset class="myfieldset">
                        <legend class="mylegend">Assign Job to Employee</legend>

                        <form class='sky-form' role='form' name='frm' id='frm' action="">
                            <div class="col-sm-12">

                                <div class="row">
                                    <section class="col col-6">
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
                                    
                                    <section class="col col-6 text-center">
                                        <div id=employee_pic></div>
                                    </section>
                                </div>

                                <div class="row" style="margin-bottom: 20px;">
                                    <fieldset class="myfieldset" style="margin-top: 5px;padding: 0px;">
                                        <legend class="mylegend">List Assigned Jobs</legend>

                                        <table id="data_table_job" class="table table-condensed table-responsive table-striped table-hover " style="margin-left: auto;margin-right: auto;" width="100%"></table>

                                    </fieldset>
                                </div>

                                <div class="row">
                                    <fieldset class="myfieldset" style="margin-top: 5px;padding: 0px;">
                                        <legend class="mylegend">Available Jobs</legend>
                                        <table id="data_table_available_job" class="table table-condensed table-responsive table-striped table-hover " style="margin-left: auto;margin-right: auto;" width="100%"></table>
                                    </fieldset>
                                </div>

                                <div class="form-group pull-right">
                                    <button type="button" id="btn_save_employee_care" disabled class="btn btn-primary">Save</button>
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



        if('<?php print $id_employee;?>'!='')LoadTableCare(<?php print $id_employee;?>);

        function LoadTableJob(id_employee='')
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_list_job',view_url:'job/DataTableListJob', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    if(jQuery('#data_table_job').html()!='')jQuery("#data_table_job").dataTable().fnDestroy();
                    jQuery('#data_table_job').html(response);
                    DataTable_Job();
                    spinner.stop();
                }
            });
        }

        function DataTable_Job()
        {
            var data_table_job=jQuery('#data_table_job').DataTable(
                {
                    dom:
                    "<'col-xs-12 col-sm-12 col-md-3 col-lg-3'f>" +
                    "<'col-xs-12 col-sm-12 col-md-2 col-lg-2'l>" +
                    "<'col-xs-12 col-sm-12 col-md-7 col-lg-7 pull-right'Br>'tip'",
                    "scrollX": true
                });

            return data_table_job;
        }




        LoadTableAvailable();

        function LoadTableAvailable()
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_list_available_job',view_url:'job/DataTableListCare', show_client:1}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    if(jQuery('#data_table_available_job').html()!='')jQuery("#data_table_available_job").dataTable().fnDestroy();
                    jQuery('#data_table_available_job').html(response);
                    DataTable_AvailableJob();
                    spinner.stop();
                }
            });
        }

        function DataTable_AvailableJob()
        {
            var data_table_available_job=jQuery('#data_table_available_job').DataTable(
                {
                    dom:
                    "<'col-xs-12 col-sm-12 col-md-3 col-lg-3'f>" +
                    "<'col-xs-12 col-sm-12 col-md-2 col-lg-2'l>" +
                    "<'col-xs-12 col-sm-12 col-md-7 col-lg-7 pull-right'Br>'tip'",
                    "scrollX": true
                });

            return data_table_available_job;
        }




        jQuery('#sel_employee').on('change', function()
        {
            var id_employee=jQuery(this).val();
            LoadTableJob(id_employee);
            EnableDisableBtn();
        });

        jQuery('body').on('click', '.cbx_row_care', function()
        {
            EnableDisableBtn();
        });

        function EnableDisableBtn()
        {
            var id_employee=jQuery('#sel_employee').val();

            var id='';
            jQuery('.cbx_row_care:checked').each(
                function()
                {
                    if(id=='')
                        id = jQuery(this).attr('id');
                    else
                        id = id + '-' + jQuery(this).attr('id');
                }
            );

            if(id!='' && id_employee!='' && id_employee!='-1')
                jQuery('#btn_save_employee_care').attr('disabled',false);
            else
                jQuery('#btn_save_employee_care').attr('disabled',true);
        }

        jQuery('#btn_save_employee_care').on('click', function (e)
        {
            var id_employee=jQuery('#sel_employee').val();

            var id='';
            jQuery('.cbx_row_care:checked').each(
                function()
                {
                    if(id=='')
                        id = jQuery(this).attr('id');
                    else
                        id = id + '-' + jQuery(this).attr('id');
                }
            );

            if(id!='' && id_employee!='' && id_employee!='-1')
            {
                var table='employee_care';
                var date_took='<?php print date("m/d/Y");?>';
                var time_took='<?php print date("G:i:s");?>';

                var url = 'Job/SaveJob';
                var data = 'date_took='+date_took +'&time_took='+time_took +'&id='+id+'&id_employee='+id_employee+'&table='+table+'&type=INSERT';

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
                        LoadTableJob(jQuery('#sel_employee').val());
                        LoadTableAvailable();
                    }
                    else{alertify.error('Error: The element could not be Saved. '+ response);}
                    spinner.stop();

                }).fail(function(jqHTR, textStatus, thrown)
                {
                    alertify.error('Something is wrong with AJAX:' + textStatus);
                });
            }
        });




        jQuery('body').on('click', '.btn_del_employee_care', function (e)
        {
            var id = jQuery(this).attr('id');

            if(id!='')
            {
                var go_function='Main/DeleteObject';
                var table='employee_care';
                var field_id='id_employee_care';

                alertify.defaults.transition = "slide";
                alertify.defaults.theme.ok = "btn btn-success";
                alertify.defaults.theme.cancel = "btn btn-default";
                alertify.confirm("<h4>Do you confirm the action?</h4>", function (e)
                {
                    DeleteJob(go_function, table, field_id, id);
                }
                ,function()
                {
                    alertify.error('Declined.');
                });
            }
        });

        function DeleteJob(go_function, table, field_id, id)
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            jQuery.ajax({
                type: "POST",
                dataType: "html",
                url: go_function,
                data:{table:table, field_id:field_id, id:id}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response!='NO_LOGGED')
                {
                    if(response=='0'){alertify.success('Element deleted.');}
                    else if(response=='EMPTY_ID'){alertify.warning('You have to delete something. The ID is empty.');}
                    else if(response=='EMPTY_TABLE'){alertify.warning('You have to delete something. The table is empty.');}
                    else {alertify.error('Error: The element could not be deleted. '+ response);}
                    spinner.stop();
                    LoadTableJob(jQuery('#sel_employee').val());
                    LoadTableAvailable();
                }
                else if(response=='NO_LOGGED')
                {
                    alertify.error("You don\'t have access.");
                    window.location.replace("Main/Main");
                }
            }).fail(function(jqHTR, textStatus, thrown)
            {
                alertify.error('Something is wrong with AJAX:' + textStatus);
            });
        }
    });

</script>