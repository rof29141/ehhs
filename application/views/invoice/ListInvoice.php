<div class="container" >
    <div class="row" style="margin-top: 70px;">
        <div class="col-lg-12">

            <fieldset class="myfieldset">
                <legend class="mylegend">My Invoices</legend>

                    <section>

                        <div style="margin-top: 20px;">

                            <section class="col col-12" style="padding: 0px;">

                                <div class="col col-12">
                                    <div class="col col-4 pull-left" id="data_table_DropDown"></div>
                                    <div class="col col-8 pull-right">

                                    </div>
                                </div>
                                <table id="data_table_Invoice" class="table table-condensed table-responsive table-striped table-hover " style="margin-left: auto;margin-right: auto;" width="100%"></table>

                            </section>

                        </div>

                    </section>
                    
            </fieldset>
        </div>
    </div>
</div>

<div class="modal fade" id="remoteModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-content" style="align-content: center;">

        <div class="col-lg-3"></div>

        <form method="post" action="" id="frm">
            <div class="col-lg-6" style="top:100px;background-color: #fff;">
                <fieldset class="myfieldset">
                    <legend class="mylegend">Detail Invoice</legend>
                    <div display="padding:15px"id="modal"></div>
                </fieldset>
            </div>
        </form>

        <div class="col-lg-3"></div>

    </div>

</div>

<script type="text/javascript">

    jQuery(document).ready(function()
    {
        LoadDataTable_Invoice();

        function DataTable_Invoice()
        {

            jQuery('.hasinput').each( function () {
                var title = jQuery(this).text();
                jQuery(this).html( '<input type="text" placeholder="Search '+title+'" />' );
            } );

            var datatable_Invoice=jQuery('#data_table_Invoice').DataTable(
                {
                    dom:
                    "<'mysearch col-xs-12 col-sm-12 col-md-3 col-lg-3'f>" +
                    "<'col-xs-12 col-sm-12 col-md-2 col-lg-2'l>" +
                    "<'mybtns col-xs-12 col-sm-12 col-md-7 col-lg-7 pull-right'Br>'tip'",
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                    "scrollX": true
                });

            return datatable_Invoice;
        }

        function LoadDataTable_Invoice()
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'datatableListMyInvoice',view_url:'invoice/DataTableListInvoice'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_table_Invoice').html(response);
                    var datatable_Invoice=DataTable_Invoice();

                    var other_btn=jQuery('#other_btn').html();
                    jQuery('#data_table_Invoice_wrapper').find(jQuery('.dt-buttons')).append(other_btn);
                    jQuery('#other_btn').html('');
                    spinner.stop();
                }
            });
        }
    });

</script>