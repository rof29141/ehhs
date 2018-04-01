<div class="container" >
    <div class="row myrow">

        <div class="col-lg-12">
            <fieldset class="myfieldset">
                <legend class="mylegend">List Patient</legend>

                    <section class="col col-12" style="padding: 10px;">
                        <div class="col col-12">
                            <div class="col col-6 pull-left" id=""></div>
                            <div class="col col-6 pull-right">
                                <div style="display: inline-block;margin: 15px;">
                                    <!--<a class="btn btn-primary" onclick="LoadContent('Care/GoAddCare');"><span>Add Care Schedule</span></a>-->
                                    <a class="btn btn-primary" id='btn_activate'><span>Activate</span></a>
                                    <a class="btn btn-primary" id='btn_inactivate'><span>Inactivate</span></a>
                                    <a class="btn btn-primary" id='btn_insert'><span>Add</span></a>
                                    <a class="btn btn-primary" id='btn_update'><span>Edit</span></a>
                                    <a class="btn btn-primary" id='btn_delete'><span>Delete</span></a>
                                </div>
                            </div>
                        </div>
                        <table id="data_table_client" class="table table-condensed table-responsive table-striped table-hover " style="margin-left: auto;margin-right: auto;" width="100%"></table>
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
        Load();

        function Load()
        {
            LoadDataTable_Client();
        }

        function DataTable_Client()
        {
            var data_table_client=jQuery('#data_table_client').DataTable(
                {
                    dom:
                    "<'col-xs-12 col-sm-12 col-md-3 col-lg-3'f>" +
                    "<'col-xs-12 col-sm-12 col-md-2 col-lg-2'l>" +
                    "<'col-xs-12 col-sm-12 col-md-7 col-lg-7 pull-right'Br>'tip'",
                    "scrollX": true
                });

            return data_table_client;
        }

        function LoadDataTable_Client()
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_list_client',view_url:'client/DataTableListClient'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_table_client').html(response);
                    var datatable_Client=DataTable_Client();
                    spinner.stop();
                }
            });
        }
    });

</script>