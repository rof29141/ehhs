<div class="container" >
    <div class="row" style="margin-top: 70px;">
        <div class="col-lg-12">

            <fieldset class="myfieldset">
                <legend class="mylegend" id="my_legend_rewards"></legend>

                <ul class="nav nav-tabs bordered" id="myTab1">
                    <li <?php if($active_fade=='profile')print 'class="active"';?>><a data-toggle="tab" href="#s1">Profile</a></li>
                    <li <?php if($active_fade=='rewards')print 'class="active"';?>><a data-toggle="tab" href="#s2">Rewards</a></li>
                </ul>

                <div class="tab-content" id="myTabContent1">

                    <div class="tab-pane <?php if($active_fade=='profile')print 'active';else 'fade';?>" id="s1">
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

                    <div class="tab-pane <?php if($active_fade=='rewards')print 'active';else 'fade';?>" id="s2">
                        <div class="row">
                            <section>
                                <?php //var_dump($data);
                                if(isset($data['rewards']['data']))
                                {
                                    ?>


                                    <div class="row" style="margin-bottom: 10px;padding: 10px;">

                                        <?php
                                        $cant=sizeof($data['rewards']['data']);
                                        for($i=0;$i<$cant;$i++)
                                        {
                                            $RewardAvailableTotal=$data['rewards']['data'][$i]['RewardAvailableTotal'];
                                            $RewardTotalEarned=$data['rewards']['data'][$i]['RewardTotalEarned'];
                                            $RewardTotalRedeemed=$data['rewards']['data'][$i]['RewardTotalRedeemed'];
                                            $RewardTotalExpired=$data['rewards']['data'][$i]['RewardTotalExpired'];
                                            ?>

                                            <article style="text-align: center;font-size: 16px;" class="col-sm-6 col-md-3 col-lg-2">
                                                <fieldset class="myfieldset">
                                                    <legend class="mylegend">Rewards available</legend>
                                                    <div class="btn-success" style="font-size:24px;padding:5px;padding-top:35px;margin-left:auto;margin-right:auto;text-align:center;border-radius: 50%;width: 120px;height: 120px;"><?php print $RewardAvailableTotal.'<br>';if($RewardAvailableTotal>1)print ' points';else print ' point';?></div>
                                                </fieldset>
                                            </article>

                                            <article style="text-align: center;font-size: 16px;" class="col-sm-6 col-md-3 col-lg-2">
                                                <fieldset class="myfieldset">
                                                    <legend class="mylegend">Rewards earned</legend>
                                                    <div class="btn-warning" style="font-size:24px;padding:5px;padding-top:35px;margin-left:auto;margin-right:auto;text-align:center;border-radius: 50%;width: 120px;height: 120px;"><?php print $RewardTotalEarned.'<br>';if($RewardTotalEarned>1)print ' points';else print ' point';?></div>
                                                </fieldset>
                                            </article>

                                            <article style="text-align: center;font-size: 16px;" class="col-sm-6 col-md-3 col-lg-2">
                                                <fieldset class="myfieldset">
                                                    <legend class="mylegend">Rewards redeemed</legend>
                                                    <div class="btn-info" style="font-size:24px;padding:5px;padding-top:35px;margin-left:auto;margin-right:auto;text-align:center;border-radius: 50%;width: 120px;height: 120px;"><?php print $RewardTotalRedeemed.'<br>';if($RewardTotalRedeemed>1)print ' points';else print ' point';?></div>
                                                </fieldset>
                                            </article>

                                            <article style="text-align: center;font-size: 16px;" class="col-sm-6 col-md-3 col-lg-2">
                                                <fieldset class="myfieldset">
                                                    <legend class="mylegend">Rewards expired</legend>
                                                    <div class="btn-danger" style="font-size:24px;padding:5px;padding-top:35px;margin-left:auto;margin-right:auto;text-align:center;border-radius: 50%;width: 120px;height: 120px;"><?php print $RewardTotalExpired.'<br>';if($RewardTotalExpired>1)print ' points';else print ' point';?></div>
                                                </fieldset>
                                            </article>

                                            <article style="text-align: center;font-size: 16px;" class="col-sm-12 col-md-12 col-lg-4">
                                                <fieldset class="myfieldset">
                                                    <legend class="mylegend">Member information</legend>

                                                    <div style="display: table;width: 100%;height: 90px;">
                                                        <div style="display: table-row;">

                                                            <div class="" style="text-align:center;display:table-cell;color:#000;padding: 10px;">

                                                                <div class="" style="text-align:center;font-weight: bold; font-size: 14px;">Member serial: <?php print $data['rewards']['data'][$i]['MemberSerial']; ?></div>
                                                                <hr style="border-top: 1px solid #8c8b8b;border-bottom: 1px solid #fff;margin-top: 7px; margin-bottom: 0px;">
                                                                <br>
                                                                <div class="" style="text-align:center;font-weight: bold; font-size: 12px;">Subscribed on: <?php print $data['rewards']['data'][$i]['SubscribedOn']; ?></div>
                                                                <br>
                                                                <div class="" style="text-align:center;font-weight: bold; font-size: 12px;">Subscription Expiry Date: <?php print $data['rewards']['data'][$i]['SubscriptionExpiryDate']; ?></div>
                                                                <br>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </article>


                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                                else print '<div class="text-center"><h3>You don\'t have any appointments.</h3></div>';
                                ?>
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
        Load();

        function Load()
        {
            LoadDataProfile();
        }

        function LoadDataProfile()
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            $.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'dataprofile',view_url:'user/InputsUpdateProfile'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    $('#data_profile').html(response);
                    spinner.stop();
                }
            });
        }
    });

</script>