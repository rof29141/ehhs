<div class="container" >
    <div class="row" style="margin: 20px;">
        <div class="col-lg-12">
            <fieldset class="myfieldset">
                <legend class="mylegend">History</legend>

                <div style="margin-top: 20px;">

                    <section class="col col-12" style="padding: 10px;">

                        <div class="col col-12">
                            <div class="col col-4 pull-left" id="data_table_DropDown"></div>
                            <div class="col col-8 pull-right">

                            </div>
                        </div>
                        <table id="data_table_Appointment" class="table table-condensed table-responsive table-striped table-hover " style="margin-left: auto;margin-right: auto;" width="100%"></table>

                    </section>

                </div>
            </fieldset>
        </div>



    </div>
</div>

<script type="text/javascript">

    $(document).ready(function()
    {
        LoadDataTable_Appointment();

        function DataTable_Appointment()
        {

            $('.hasinput').each( function () {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
            } );

            var datatable_Appointment=$('#data_table_Appointment').DataTable(
                {
                    dom:
                    "<'mysearch col-xs-12 col-sm-12 col-md-3 col-lg-3'f>" +
                    "<'col-xs-12 col-sm-12 col-md-2 col-lg-2'l>" +
                    "<'mybtns col-xs-12 col-sm-12 col-md-7 col-lg-7 pull-right'Br>'tip'",
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                    "scrollX": true
                });

            return datatable_Appointment;
        }

        function LoadDataTable_Appointment()
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            $.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'datatableListMyAppointment',view_url:'appointment/DataTableListAppointment'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    $('#data_table_Appointment').html(response);
                    var datatable_Appointment=DataTable_Appointment();

                    var other_btn=$('#other_btn').html();
                    $('#data_table_Appointment_wrapper').find($('.dt-buttons')).append(other_btn);
                    $('#other_btn').html('');
                    spinner.stop();
                }
            });
        }
    });

</script>