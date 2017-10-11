<div class="container" >
    <div class="row" style="margin: 20px;">
        <div class="col-lg-12">
            <fieldset class="myfieldset">
                <legend class="mylegend">Create an Appointment</legend>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Service</label>
                            <select class="my_select2" id="sel_service" name="sel_service">

                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Doctor</label>
                            <select class="my_select2" id="sel_doctor" name="sel_doctor">
                                <?php for ($i=0;$i<count($doctors['data']);$i++){?>
                                    <option value="<?php echo $doctors['data'][$i]['_zpk_Staff_Rec'];?>"><?php echo $doctors['data'][$i]['FirstName'].' '.$doctors['data'][$i]['LastName'];?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div style="margin-top: 20px;">
                        <div id='calendar' style="margin-top: 40px;"></div>
                    </div>
                </div>

            </fieldset>
        </div>

    </div>
</div>

<div class="modal fade" id="remoteModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-content" style="align-content: center;">

        <div class="col-lg-4"></div>

        <form method="post" action="" id="frm">
            <div class="col-lg-4" style="background-color: #fff;">
                <fieldset class="myfieldset">
                    <legend class="mylegend">Confirm Appointment</legend>
                        <div display="padding:15px"id="modal"></div>
                </fieldset>
            </div>
        </form>

        <div class="col-lg-4"></div>

    </div>

</div>


<script type="text/javascript">

    $(document).ready(function()
    {
        $(".my_select2").select2();

        Load();

        function Load()
        {
            LoadTable_CalendarAlerts();
        }

        function LoadTable_CalendarAlerts()
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            $.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'tableCalendarAlerts',view_url:'dashboard/CalendarAlerts'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    $('#data_table_CalendarAlerts').html(response);
                    spinner.stop();
                }
            });
        }

        $('#calendar').fullCalendar({
            //hiddenDays: [ 1, 3, 5 ],

            selectable: true,
            businessHours: [ // specify an array instead
                {
                    dow: [ 2, 4 ], // Monday, Tuesday, Wednesday
                    start: '09:00', // 8am
                    end: '11:00' // 6pm
                }
            ],

            eventClick: function(calEvent, jsEvent, view) {

            if(calEvent.title=='Available')
            {
                var id_service=1;//$('#sel_service').val();
                var id_doctor=1;//$('#sel_doctor').val();
                var start=String(calEvent.start);//alert(start);

                FillModalApp(id_service, id_doctor, start);
            }

            },
            displayEventTime: true,
            editable: true,
            timeFormat: 'hh:mm t',
            events: <?php echo $events;?>,


            /*[
                {
                    title: 'Available',
                    start: '2017-10-10 09:00:00',
                    end: '2017-10-10 09:29:00',
                },
                {
                    title: 'Available',
                    start: '09:00:00',
                    end: '09:29:00',
                    dow: [ 2, 4 ],
                },
                {
                    title: 'Available',
                    start: '2017-10-10T09:30:00'
                },
                {
                    title: 'Available',
                    start: '2017-10-10T10:00:00'
                },
                {
                    title: 'Available',
                    start: '2017-10-10T10:30:00'
                },
                {
                    title: 'Available',
                    start: '2017-10-10T11:00:00'
                },
                {
                    title: 'Unavailable',
                    start: '2017-10-10T11:30:00',
                    color  : 'red'
                },
                {
                    title: 'Available',
                    start: '2017-10-10T13:00:00'
                },
                {
                    title: 'Available',
                    start: '2017-10-10T13:30:00'
                },
                {
                    title: 'Available',
                    start: '2017-10-10T14:00:00'
                },
                {
                    title: 'Available',
                    start: '2017-10-10T14:30:00'
                },
                {
                    title: 'Available',
                    start: '2017-10-10T15:00:00'
                },
                {
                    title: 'Available',
                    start: '2017-10-10T15:30:00'
                },

            ]*/
        });

        function FillModalApp(id_service, id_doctor, start)
        {
            //alert(id_service+' '+id_doctor+' '+start);, 'id_doctor':id_doctor, 'start':start

            $.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {'data_type':'appointment','view_url':'appointment/ModalAddAppointment','id_service':id_service, 'id_doctor':id_doctor, 'start':start}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response!='')
                {//alert(response);
                    $('#modal').html(response);
                    $('#remoteModal').modal('show');

                }
            });
        }
    });
</script>