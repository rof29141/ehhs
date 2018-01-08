<div class="container" >
    <div class="row myrow">

        <div class="col-lg-12">
            <fieldset class="myfieldset">
                <legend class="mylegend">User: List</legend>



                    <section class="col col-12" style="padding: 10px;">

                        <div class="col col-12">
                            <div class="col col-6 pull-left" id="data_table_DropDown"></div>
                            <div class="col col-6 pull-right">
                                <div id="other_btn" style="display: inline-block;">
                                    <a class="dt-button buttons-copy buttons-html5" id='btn_insert' data-goto="user/AddUser"><span>Add</span></a>
                                    <a class="dt-button buttons-copy buttons-html5" id='btn_update' data-goto="user/UpdateUser"><span>Edit</span></a>
                                    <a class="dt-button buttons-copy buttons-html5" id='btn_delete' datafld="PHP_Company_Users"><span>Delete</span></a>
                                    <a class="dt-button buttons-copy buttons-html5"><span>Change User</span></a>
                                    <a class="dt-button buttons-copy buttons-html5"><span>Change Pass</span></a>
                                </div>
                            </div>
                        </div>
                        <table id="data_table_User" class="table table-condensed table-responsive table-striped table-hover " style="margin-left: auto;margin-right: auto;" width="100%"></table>

                    </section>


            </fieldset>
        </div>
    </div>
</div>


<script type="text/javascript">

    $(document).ready(function()
    {
        Load();

        function Load()
        {
            LoadDataTable_DropDown();
            LoadDataTable_User();
        }

        function LoadDataTable_DropDown()
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            $.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'dropdownlistuser',view_url:'user/DropDownHideShow'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    $('#data_table_DropDown').html(response);
                    spinner.stop();
                }
            });
        }

        function DataTable_User()
        {
            var datatable_User=$('#data_table_User').DataTable(
            {
                dom:
                    "<'mysearch col-xs-12 col-sm-12 col-md-3 col-lg-3'f>" +
                    "<'col-xs-12 col-sm-12 col-md-2 col-lg-2'l>" +
                    "<'mybtns col-xs-12 col-sm-12 col-md-7 col-lg-7 pull-right'Br>'tip'",
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                "scrollX": true
            });

            return datatable_User;
        }

        function LoadDataTable_User()
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            $.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'datatableListUser',view_url:'user/DataTableListUser'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    $('#data_table_User').html(response);
                    var datatable_User=DataTable_User();
                    hide_show(datatable_User);
                    //var my_btn_table=$('.my_btn_table').html();
                    //$('#other_btn').append(my_btn_table);
                    //$('.my_btn_table').html('');
                    var other_btn=$('#other_btn').html();
                    $('.dt-buttons').append(other_btn);
                    $('#other_btn').html('');
                    spinner.stop();
                    RowDetail(datatable_User);
                }
            });
        }

        function hide_show(datatable)
        {
            $('body').on('click', '.toggle-vis', function () {
                var column = datatable.column($(this).attr('value'));
                column.visible(!column.visible());
            });

            $('body').on('click', '.toggle-vis1', function () {
                var column = datatable.column($(this).attr('for'));
                column.visible(!column.visible());
            });
        }

        function RowDetail(datatable_User)
        {
            $('body').on('click', '.detail', function ()
            {
                var id = $(this).attr('id');
                var tr = $(this).closest('tr');
                var row = datatable_User.row( tr );

                if(row.child.isShown())
                {
                    row.child.hide();
                    tr.removeClass('shown');
                    $(this).find('a').removeClass("entypo-arrow-down4").addClass("entypo-arrow-right4");
                }
                else
                {
                    var target = document.getElementById('container');
                    var spinner = new Spinner(opts).spin(target);
                    $(this).find('a').removeClass("entypo-arrow-right4").addClass("entypo-arrow-down4");

                    $.ajax({
                        url: 'Main/LlenarDataTable',
                        type: 'POST',
                        data: {data_type: 'detailDataTableUser', view_url: 'user/DetailDataTableUser', id:id}
                    }).done(function (response, textStatus, jqXHR) {
                        if (response)
                        {
                            row.child(response).show(500);
                        }
                        else
                            row.child('Data can not loaded.').show(500);

                        tr.addClass('shown');
                        spinner.stop();

                    });
                }
            });
        }
    });

</script>