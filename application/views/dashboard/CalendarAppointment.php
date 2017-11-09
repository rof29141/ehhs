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
            <div class="col-lg-4" style="top:100px;background-color: #fff;">
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
            minTime:'6:00',
            maxTime:'19:00',
            allDaySlot:false,
            defaultView:'agendaWeek',
            height: 'auto',
            slotDuration:'00:15:00',

            eventClick: function(calEvent, jsEvent, view) {

                if(calEvent.title==' Available')
                {
                    var id_service=$('#sel_service').val();
                    var id_doctor=$('#sel_doctor').val();
                    var start=String(calEvent.start);//alert(start);
                    var end=String(calEvent.end);//alert(end);
                    var setting_id=String(calEvent.setting_id);//alert(setting_id);

                    FillModalApp(id_service, id_doctor, start, end, setting_id);
                }
            },
            displayEventTime: true,
            editable: false,
            timeFormat: 'hh:mm t',
            events: <?php echo $events;?>,

        });

        var today = new Date().getDay();//0=Sun, 1=Mon, ..., 6=Sat
        var last_day = '<?php echo $last_day;?>'-1;//last day of the appointments

        //alert(today+'>='+last_day);

        if(today>=last_day){$('#calendar').fullCalendar('next');}

        //alert('<?php echo $events;?>');
        function FillModalApp(id_service, id_doctor, start, end, setting_id)
        {
            //alert(id_service+' '+id_doctor+' '+start);//, 'id_doctor':id_doctor, 'start':start

            $.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {'data_type':'appointment','view_url':'appointment/ModalAddAppointment','id_service':id_service, 'id_doctor':id_doctor, 'start':start, 'end':end, 'setting_id':setting_id}
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