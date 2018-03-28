<div class="container" >
    <div class="row myrow">

        <div class="col-lg-12">
            <fieldset class="myfieldset">
                <legend class="mylegend">List Care Scheduled</legend>

                    <section class="col col-12" style="padding: 10px;">
                        <div class="col col-12">
                            <div class="col col-6 pull-left" id=""></div>
                            <div class="col col-6 pull-right">
                                <div style="display: inline-block;margin: 15px;">
                                    <a class="btn btn-primary" id='btn_insert' onclick="LoadContent('Care/GoAddCare');"><span>Add</span></a>
                                    <a class="btn btn-primary" id='btn_approve'><span>Approve</span></a>
                                    <a class="btn btn-primary" id='btn_reject'><span>Reject</span></a>
                                </div>
                            </div>
                        </div>
                        <table id="data_table_care" class="table table-condensed table-responsive table-striped table-hover " style="margin-left: auto;margin-right: auto;" width="100%"></table>
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
            LoadDataTable_Care();
        }

        function DataTable_Care()
        {
            var data_table_care=jQuery('#data_table_care').DataTable(
                {
                    dom:
                    "<'col-xs-12 col-sm-12 col-md-3 col-lg-3'f>" +
                    "<'col-xs-12 col-sm-12 col-md-2 col-lg-2'l>" +
                    "<'col-xs-12 col-sm-12 col-md-7 col-lg-7 pull-right'Br>'tip'",
                    "scrollX": true
                });

            return data_table_care;
        }

        function LoadDataTable_Care()
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_list_care',view_url:'care/DataTableListCare', show_client:1}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_table_care').html(response);
                    var datatable_Care=DataTable_Care();
                    spinner.stop();
                }
            });
        }
    });

</script>