<div class="container" >
    <div class="row myrow">

        <div class="col-lg-12">
            <fieldset class="myfieldset">
                <legend class="mylegend">Available Jobs</legend>

                    <section class="col col-12" style="padding: 10px;">
                        <?php if($session['rol']=='worker'){?>
                        <div class="col col-12">
                            <div class="col col-6 pull-left" id=""></div>
                            <div class="col col-6 pull-right">
                                <div style="display: inline-block;margin: 15px;">
                                    <!--<a class="btn btn-primary" onclick="LoadContent('Care/GoAddCare');"><span>Add Care Schedule</span></a>-->
                                    <a class="btn btn-primary" id='btn_interested'><span>I am interested</span></a>
                                    <a class="btn btn-primary" id='btn_not_interested'><span>I am not interested</span></a>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                        <table id="data_table_available_job" class="table table-condensed table-responsive table-striped table-hover " style="margin-left: auto;margin-right: auto;" width="100%"></table>
                    </section>

            </fieldset>
        </div>
    </div>
</div>

<script type="text/javascript">

    function ShowPhoto(id_person='')
    {//alert(id_person);
        d = new Date();
        if(id_person!='')
        {//alert("<?php print base_url('/assets/upload/person_photo/photo_');?>"+id_person+".jpg?"+d.getTime());
            jQuery("#photo_person_row_"+id_person).attr("src", "<?php print base_url('/assets/upload/person_photo/photo_');?>"+id_person+".jpg?"+d.getTime());
        }
    }

    jQuery(document).ready(function()
    {
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
    });

</script>