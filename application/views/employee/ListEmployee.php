<div class="container" >
    <div class="row myrow">

        <div class="col-lg-12">
            <fieldset class="myfieldset">
                <legend class="mylegend">List Employee</legend>

                    <section class="col col-12" style="padding: 10px;">
                        <table id="data_table_employee" class="table table-condensed table-responsive table-striped table-hover " style="margin-left: auto;margin-right: auto;" width="100%"></table>
                    </section>

            </fieldset>
        </div>
    </div>
</div>


<script type="text/javascript">

    jQuery(document).ready(function()
    {
        Load();

        function Load()
        {
            LoadDataTable_Employee();
        }

        function DataTable_Employee()
        {
            var data_table_employee=jQuery('#data_table_employee').DataTable(
                {
                    dom:
                    "<'col-xs-12 col-sm-12 col-md-3 col-lg-3'f>" +
                    "<'col-xs-12 col-sm-12 col-md-2 col-lg-2'l>" +
                    "<'col-xs-12 col-sm-12 col-md-7 col-lg-7 pull-right'Br>'tip'",
                    "scrollX": true
                });

            return data_table_employee;
        }

        function LoadDataTable_Employee()
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_list_employee',view_url:'employee/DataTableListEmployee'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_table_employee').html(response);
                    var datatable_Employee=DataTable_Employee();
                    spinner.stop();
                }
            });
        }
    });

</script>