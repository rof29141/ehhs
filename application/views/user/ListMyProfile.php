<div class="container" >
    <div class="row" style="margin-top: 70px;">
        <div class="col-lg-12">

            <div class="tab-v1">

                <ul class="nav nav-tabs bordered" id="myTab1">
                    <li class="active"><a data-toggle="tab" href="#s1">Profile</a></li>
                    <li><a data-toggle="tab" href="#s2">Rewards</a></li>
                </ul>

                <div class="tab-content" id="myTabContent1">

                    <div class="tab-pane active" id="s1">
                        <div class="row">

                            <div class="col-lg-4 col-lg-offset-4">
                                <fieldset class="myfieldset">
                                    <legend class="mylegend">Profile</legend>

                                    <section class="col col-12" style="padding: 0px;">

                                        <form class='fill-up validatable' role='form' name='frm' id='frm' action="">
                                            <div id="data_profile"></div>
                                        </form>

                                    </section>

                                </fieldset>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="s2">
                        <div class="row">
                            <section>

                                <div class="row" id="reward" style="margin-bottom: 10px;padding: 10px;">
                                    <?php require_once 'Rewards.php';?>
                                </div>

                            </section>
                        </div>
                    </div>
                </div>

            </div>

        </div>
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