<div class="container" >
    <div class="row" style="margin: 20px;">
        <div class="col-lg-12">


                <div class="row">
                    <div style="margin-top: 20px;">
                        <div id='calendar' style="margin-top: 40px;"></div>
                    </div>
                </div>


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

</div><?php //echo $events;?>


<script type="text/javascript">

    $(document).ready(function()
    {
        $('#calendar').fullCalendar(
            {
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek'
                },
                selectable: true,
                hiddenDays: [ 0, 6 ],
                businessHours: {
                    // days of week. an array of zero-based day of week integers (0=Sunday)
                    dow: [ 1, 2, 3, 4 ], // Monday - Thursday

                    start: '6:00', // a start time (10am in this example)
                    end: '19:00', // an end time (6pm in this example)
                },
                minTime:'6:00',
                maxTime:'19:00',
                allDaySlot:false,
                defaultView:'agendaWeek',
                height: 'auto',

                eventClick: function(calEvent, jsEvent, view) {

                    if(calEvent.title==' Available')
                    {
                        var id_service=$('#sel_service').val();
                        var id_doctor=$('#sel_doctor').val();
                        var start=String(calEvent.start);//alert(start);
                        var end=String(calEvent.end);//alert(end);

                        FillModalApp(id_service, id_doctor, start, end);
                    }
                },
                displayEventTime: true,
                editable: false,
                timeFormat: 'hh:mm t',
                events: <?php echo $events;?>,

            });
            //console.log('<?php echo $events;?>');
        function FillModalApp(id_service, id_doctor, start, end)
        {
            //alert(id_service+' '+id_doctor+' '+start);//, 'id_doctor':id_doctor, 'start':start

            $.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {'data_type':'appointment','view_url':'appointment/ModalAddAppointment','id_service':id_service, 'id_doctor':id_doctor, 'start':start, 'end':end}
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