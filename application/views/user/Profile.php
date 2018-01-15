<div class="container" >
    <div class="row" style="margin-top: 50px;">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <fieldset class="myfieldset">
                <legend class="mylegend">Profile</legend>



                    <section class="col col-12" style="padding: 0px;">

                        <form class='fill-up validatable' role='form' name='frm' id='frm' action="">
                            <div id="data_profile"></div>
                        </form>

                    </section>


            </fieldset>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>


<script type="text/javascript">

    jQuery(document).ready(function()
    {
        Load();

        function Load()
        {
            LoadDataProfile();
        }

        function LoadDataProfile()
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'dataprofile',view_url:'user/InputsUpdateProfile'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_profile').html(response);
                    spinner.stop();
                }
            });
        }
    });

</script>