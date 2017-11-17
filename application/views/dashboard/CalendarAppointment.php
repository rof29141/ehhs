
    <div class="row" style="margin: 0px;">
        <div class="col-lg-12">


                <div class="row">
                    <div style="margin-top: 20px;">
                        <div id='calendar' style="margin-top: 40px;"></div>
                    </div>
                </div>


        </div>

    </div>
<div class="modal fade" id="remoteModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-content" style="align-content: center;">

        <div class="col-lg-4"></div>

        <form method="post" action="" id="frm">
            <div class="col-lg-4" style="top:20px;background-color: #fff;">
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

                    for (var i in calEvent) {
                        console.log(i+":"+calEvent[i]);
                    }

                    FillModalApp(id_service, id_doctor, start, end, setting_id, calEvent);
                }
            },
            displayEventTime: true,
            editable: false,
            timeFormat: 'hh:mm t',
            events: <?php echo $events;?>,

            eventRender: function(event, eventElement)
            {
                var view = $('#calendar').fullCalendar('getView');

                if (event.confirm=='text-success')
                {
                    eventElement.find(".fc-time").append('<div style="float: right;position: relative; font-size: 16px; top:-15px;">' +
                        '<a data-container="body" data-toggle="popover" data-placement="top" data-content="Appointment confirmed." class="' + event.confirm + '">' +
                        '<span class="brankic-checkmark"></span></a>' +
                        '</div>');
                    if(view.name=='month')
                        eventElement.find(".fc-content").css({ height: "14px" });
                }
                else if(event.confirm=='text-danger')
                {
                    eventElement.find(".fc-time").append('<div style="float: right;position: relative; font-size: 15px; top:-15px;">' +
                        '<a data-container="body" data-toggle="popover" data-placement="top" data-content="Please, Confirm your appintment." class="'+event.confirm+'">' +
                        '<span class="brankic-warning"></span></a>' +
                        '</div>');

                    if(view.name=='month')
                        eventElement.find(".fc-content").css({ height: "14px" });
                }
            },

        });

        var today = new Date().getDay();//0=Sun, 1=Mon, ..., 6=Sat
        var last_day = '<?php echo $last_day;?>'-1;//last day of the appointments

        if(today>=last_day){$('#calendar').fullCalendar('next');}

        //alert('<?php echo $events;?>');
        function FillModalApp(id_service, id_doctor, start, end, setting_id, calEvent)
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
                    $('#hdn_calEvent').val(calEvent);

                    $('#btn_submit_app').on('click', function ()
                    {
                        calEvent.title = "Appointment Submited";
                        calEvent.color = "#ffff66";
                        calEvent.textColor = "#000";
                        $('#calendar').fullCalendar('updateEvent', calEvent);
                    });
                }
            });
        }

        $('[data-toggle="popover"]').on('mouseover mouseout', function(){
            $(this).popover('toggle')
        });
    });
</script>