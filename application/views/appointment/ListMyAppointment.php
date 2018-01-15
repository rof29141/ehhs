<div class="container" >
    <div class="row" style="margin-top: 70px;margin-bottom: 40px;">
        <div class="col-lg-12" style="padding-left: 5px;padding-right: 5px;">

            <div style="margin-top: -10px;">

                <section class="col col-12" style="padding-top: 45px;">
                    <div id='next_app'></div>
                </section>

            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="remoteModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true">

    <div class="modal-content" style="align-content: center;">

        <div class="col-lg-4"></div>

        <form method="post" action="" id="frm">
            <div class="col-lg-4" style="top:20px;background-color: #fff;">
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

    jQuery(document).ready(function()
    {
        Load_Appointment();

        function Load_Appointment()
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'MyAppointments',view_url:'appointment/MyAppointments'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#next_app').html(response);
                    spinner.stop();
                }
            });
        }
    });

</script>