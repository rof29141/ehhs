<div class="container" >
    <div class="row" style="margin-top: 70px;">
        <div class="col-lg-12">

            <fieldset class="myfieldset">
                <legend class="mylegend">Appointment History</legend>

                <ul class="nav nav-tabs bordered" id="myTab1">
                    <li class="active"><a data-toggle="tab" href="#s1">Card view <span class="badge bg-color-blue txt-color-white" id="badge_all"></span></a></li>
                    <li><a data-toggle="tab" href="#s2">List view <span class="badge bg-color-blue txt-color-white" id="badge_pending"></span></a></li>
                </ul>

                <div class="tab-content" id="myTabContent1">

                    <div class="tab-pane active" id="s1">
                        <div class="row">
                            <section>
                                <?php
                                if(isset($data['my_appointments']['data']))
                                {
                                    ?>

                                    <fieldset class="myfieldset" style="margin-top: -10px">
                                        <legend class="mylegend">All appointments</legend>
                                        <div class="row" style="margin-bottom: 10px;">

                                            <?php
                                            for($i=0;$i<count($data['my_appointments']['data']);$i++)
                                            {
                                                if($data['my_appointments']['data'][$i]['APT_Date']==date('m/d/Y'))
                                                    $date='<div class="text-center font-weight-bold" style="font-size: 14px;"><a class="label_warning">Today at ' . $data['my_appointments']['data'][$i]['APT_Time'].'</a></div>';
                                                else
                                                    $date='<div class="text-center font-weight-bold" style="font-size: 14px;">'. $data['my_appointments']['data'][$i]['APT_Date'] . ' ' . $data['my_appointments']['data'][$i]['APT_Time'].'</div>';
                                                ?>

                                                <article style="padding-bottom: 10px;" class="col-sm-12 col-md-6 col-lg-4">
                                                    <div style="display: table;width: 100%;height: 90px;">
                                                        <div style="display: table-row;">

                                                            <div style="display: table-cell;background-color: #ccc;position:relative;vertical-align:middle;text-align:center;width: 30%;padding: 5px;font-size: 10px;">
                                                                <?php
                                                                echo '<img class="doc_img" style="width: 70%;" src="';
                                                                if ($data['my_appointments']['data'][$i]['Photo']) echo $data['my_appointments']['data'][$i]['Photo']; else echo base_url('assets/images/male.png');
                                                                echo '"/><br><br>';
                                                                echo $data['my_appointments']['data'][$i]['FirstName'] . ' ' . $data['my_appointments']['data'][$i]['LastName'];
                                                                ?>
                                                            </div>
                                                            <div class="" style="text-align:center; display: table-cell;background-color: #eee;color:#000;padding: 10px;width: 70%;">
                                                                <div style="float: right;position: relative;font-size: 16px;">
                                                                    <?php
                                                                    if ($data['my_appointments']['data'][$i]['TokenConfirmApp'] != '')$status='Not confirmed';else $status='Confirmed';
                                                                    $cancel_note = 'To Cancel or Reschedule less than 24 hours, call the office 513-351-FACE(3223)';

                                                                    $concern='Hello, I have a concern about an appointment with Record ID: '
                                                                        .$data['my_appointments']['data'][$i]['RecordID']. ' '
                                                                        .$data['my_appointments']['data'][$i]['APT_Title']. ' '
                                                                        .$data['my_appointments']['data'][$i]['APT_Date'].' '.$data['my_appointments']['data'][$i]['APT_Time'];

                                                                    $info=
                                                                        '<b>Record ID:</b> '.$data['my_appointments']['data'][$i]['RecordID'].
                                                                        '<br><b>Title:</b> '.$data['my_appointments']['data'][$i]['APT_Title'].
                                                                        '<br><b>Date and Time:</b> '.$data['my_appointments']['data'][$i]['APT_Date'].' '.$data['my_appointments']['data'][$i]['APT_Time'].
                                                                        '<br><b>Provider:</b> '.$data['my_appointments']['data'][$i]['FirstName'].' '.$data['my_appointments']['data'][$i]['LastName'].
                                                                        '<br><b>Status:</b> '.$status.
                                                                        '<br><br><b>'.$cancel_note.'</b>';
                                                                    ?>
                                                                    <a target="_blank" href="<?php echo base_url('/Appointment/PrintAppointment/' . $data['my_appointments']['data'][$i]['RecordID']); ?>">
                                                                        <span class="entypo-printer"></span>
                                                                    </a>
                                                                    <br>
                                                                    <a target="_blank" class="chat" data-content="<?php echo $concern;?>">
                                                                        <span class="entypo-chat"></span>
                                                                    </a>
                                                                    <br>
                                                                    <a data-container="body" data-toggle="popover" data-html="true" data-placement="top" data-content="<?php echo $info;?>">
                                                                        <span class="entypo-info2"></span>
                                                                    </a>
                                                                </div>

                                                                <div class=""
                                                                     style="text-align:center;font-weight: bold; font-size: 11px;"><?php echo $data['my_appointments']['data'][$i]['APT_Title']; ?></div>
                                                                <br>
                                                                <div class=""
                                                                     style="text-align:center;font-weight: bold; font-size: 12px;"><?php echo $data['my_appointments']['data'][$i]['Service']; ?></div>
                                                                <br>
                                                                <?php echo $date;?>

                                                                <br>



                                                                <hr style="border-top: 1px solid #8c8b8b;border-bottom: 1px solid #fff;margin-top: 7px; margin-bottom: 0px;">


                                                            </div>
                                                        </div>
                                                </article>

                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </fieldset>
                                    <?php
                                }
                                else echo '<div class="text-center"><h3>You don\'t have any appointments.</h3></div>';
                                ?>
                            </section>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="s2">
                        <div class="row">
                            <section>

                                <div style="margin-top: 20px;">

                                    <section class="col col-12" style="padding: 0px;">

                                        <div class="col col-12">
                                            <div class="col col-4 pull-left" id="data_table_DropDown"></div>
                                            <div class="col col-8 pull-right">

                                            </div>
                                        </div>
                                        <table id="data_table_Appointment" class="table table-condensed table-responsive table-striped table-hover " style="margin-left: auto;margin-right: auto;" width="100%"></table>

                                    </section>

                                </div>

                            </section>
                        </div>
                    </div>

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

        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });

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

        $('.chat').on('click', function ()
        {
            Tawk_API.maximize();
        });

        $('[data-toggle="popover"]').on('mouseover', function(){
            $(this).popover('show')
        });

        $('[data-toggle="popover"]').on('mouseout', function(){
            $(this).popover('hide')
        });

        $('[data-toggle="popover"]').on('click', function(){
            $(this).popover('toggle')
        });
    });

</script>