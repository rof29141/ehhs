<div class="container" >
    <div class="row" style="margin: 20px;">
        <div class="col-lg-12">
            <fieldset class="myfieldset">
                <legend class="mylegend">Next appointments</legend>

                <div style="margin-top: 20px;">

                    <section class="col col-12" style="padding: 10px;">
                        <div id='next_app'></div>
                    </section>

                </div>
            </fieldset>
        </div>
    </div>
</div>


<div class="modal fade" id="remoteModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true">

    <div class="modal-content" style="align-content: center;">

        <div class="col-lg-4"></div>

        <form method="post" action="" id="frm">
            <div class="col-lg-4" style="top:100px;background-color: #fff;">
                <fieldset class="myfieldset">
                    <legend class="mylegend" id="modal_title">Appointment</legend>
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
        Load();

        function Load()
        {
            LoadNext_Appointment();
        }

        function LoadNext_Appointment()
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            $.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'NextMyAppointment',view_url:'appointment/NextAppointment'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    $('#next_app').html(response);
                    spinner.stop();
                }
            });
        }
    });

</script>