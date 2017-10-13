<div class="container" >
    <div class="row" style="margin: 20px;">
        <div class="col-lg-12">
            <fieldset class="myfieldset">
                <legend class="mylegend">Create an Appointment</legend>

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
        $('#calendar').fullCalendar(
            {
                selectable: true,

                eventClick: function(calEvent, jsEvent, view) {

                    if(calEvent.title=='Available')
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