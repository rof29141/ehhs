<div class="container" >
    <div class="row myrow">

        <div class="col-lg-12">
            <fieldset class="myfieldset">
                <legend class="mylegend">List Client</legend>



                    <section class="col col-12" style="padding: 10px;">
                        
                        <table id="data_table_client" class="table table-condensed table-responsive table-striped table-hover " style="margin-left: auto;margin-right: auto;" width="100%"></table>

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
                    //var other_btn=jQuery('#other_btn').html();
                    //jQuery('.dt-buttons').append(other_btn);
                    //jQuery('#other_btn').html('');
                    spinner.stop();
                }
            });
        }
    });

</script>