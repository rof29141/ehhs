<?php
if(array_key_exists("data", $data['rewards']))
{
    $cant = sizeof($data['rewards']['data']);
    for ($i = 0; $i < $cant; $i++)
    {
        $RewardAvailableTotal = $data['rewards']['data'][$i]['RewardAvailableTotal'];
        $RewardTotalEarned = $data['rewards']['data'][$i]['RewardTotalEarned'];
        $RewardTotalRedeemed = $data['rewards']['data'][$i]['RewardTotalRedeemed'];
        $RewardTotalExpired = $data['rewards']['data'][$i]['RewardTotalExpired'];

        if($data['rewards']['data'][$i]['MemberSerial']!='')$MemberSerial=$data['rewards']['data'][$i]['MemberSerial'];else $MemberSerial='-';
        if($data['rewards']['data'][$i]['SubscribedOn']!='')$SubscribedOn=$data['rewards']['data'][$i]['SubscribedOn'];else $SubscribedOn='-';
        if($data['rewards']['data'][$i]['SubscriptionExpiryDate']!='')$SubscriptionExpiryDate=$data['rewards']['data'][$i]['SubscriptionExpiryDate'];else $SubscriptionExpiryDate='-';
    }
}
else
{
    $RewardAvailableTotal = '0';
    $RewardTotalEarned = '0';
    $RewardTotalRedeemed = '0';
    $RewardTotalExpired = '0';

    $MemberSerial='-';
    $SubscribedOn='-';
    $SubscriptionExpiryDate='-';
}
?>

<article style="text-align: center;font-size: 16px;"
         class="col-sm-6 col-md-3 col-lg-2">
    <fieldset class="myfieldset">
        <legend class="mylegend">Available</legend>
        <div class="btn-success"
             style="font-size:24px;padding:5px;padding-top:35px;margin-left:auto;margin-right:auto;text-align:center;border-radius: 50%;width: 120px;height: 120px;"><?php if (!isset($RewardAvailableTotal)) $RewardAvailableTotal = 0; elseif ($RewardAvailableTotal == '') $RewardAvailableTotal = 0;?>
            <div class="count"><?php print $RewardAvailableTotal . '<br>';?></div>
            <?php if ($RewardAvailableTotal > 1 || $RewardAvailableTotal == 0) print ' points'; else print ' point'; ?></div>
    </fieldset>
</article>

<article style="text-align: center;font-size: 16px;"
         class="col-sm-6 col-md-3 col-lg-2">
    <fieldset class="myfieldset">
        <legend class="mylegend">Earned</legend>
        <div class="btn-warning"
             style="font-size:24px;padding:5px;padding-top:35px;margin-left:auto;margin-right:auto;text-align:center;border-radius: 50%;width: 120px;height: 120px;"><?php if (!isset($RewardTotalEarned)) $RewardTotalEarned = 0; elseif ($RewardTotalEarned == '') $RewardTotalEarned = 0;?>
            <div class="count"><?php print $RewardTotalEarned . '<br>';?></div>
            <?php if ($RewardTotalEarned > 1 || $RewardTotalEarned == 0) print ' points'; else print ' point'; ?></div>
    </fieldset>
</article>

<article style="text-align: center;font-size: 16px;"
         class="col-sm-6 col-md-3 col-lg-2">
    <fieldset class="myfieldset">
        <legend class="mylegend">Redeemed</legend>
        <div class="btn-info"
             style="font-size:24px;padding:5px;padding-top:35px;margin-left:auto;margin-right:auto;text-align:center;border-radius: 50%;width: 120px;height: 120px;"><?php if (!isset($RewardTotalRedeemed)) $RewardTotalRedeemed = 0; elseif ($RewardTotalRedeemed == '') $RewardTotalRedeemed = 0;?>
            <div class="count"><?php print $RewardTotalRedeemed . '<br>';?></div>
            <?php if ($RewardTotalRedeemed > 1 || $RewardTotalRedeemed == 0) print ' points'; else print ' point'; ?></div>
    </fieldset>
</article>

<article style="text-align: center;font-size: 16px;"
         class="col-sm-6 col-md-3 col-lg-2">
    <fieldset class="myfieldset">
        <legend class="mylegend">Expired</legend>
        <div class="btn-danger "
             style="font-size:24px;padding:5px;padding-top:35px;margin-left:auto;margin-right:auto;text-align:center;border-radius: 50%;width: 120px;height: 120px;"><?php if (!isset($RewardTotalExpired)) $RewardTotalExpired = 0; elseif ($RewardTotalExpired == '') $RewardTotalExpired = 0;?>
            <div class="count"><?php print $RewardTotalExpired . '<br>';?></div>
            <?php if ($RewardTotalExpired > 1 || $RewardTotalExpired == 0) print ' points'; else print ' point'; ?></div>
    </fieldset>
</article>

<article style="text-align: center;font-size: 16px;"
         class="col-sm-12 col-md-12 col-lg-4">
    <fieldset class="myfieldset">
        <legend class="mylegend">Member information</legend>

        <div style="display: table;width: 100%;height: 90px;">
            <div style="display: table-row;">

                <div class=""
                     style="text-align:center;display:table-cell;color:#000;padding: 10px;">

                    <div class=""
                         style="text-align:center;font-weight: bold; font-size: 14px;">
                        Member
                        serial: <?php print $MemberSerial; ?></div>
                    <hr style="border-top: 1px solid #8c8b8b;border-bottom: 1px solid #fff;margin-top: 7px; margin-bottom: 0px;">
                    <br>
                    <div class=""
                         style="text-align:center;font-weight: bold; font-size: 12px;">
                        Subscribed
                        on: <?php print $SubscribedOn; ?></div>
                    <br>
                    <div class=""
                         style="text-align:center;font-weight: bold; font-size: 12px;">
                        Subscription Expiry
                        Date: <?php print $SubscriptionExpiryDate; ?></div>
                    <br>

                </div>
            </div>
        </div>
    </fieldset>
</article>

<script type="text/javascript">
    $(document).ready(function()
    {
        $('.count').each(function ()
        {
            $(this).prop('Counter',0).animate({
            Counter: $(this).text()
            }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
            $(this).text(Math.ceil(now));
            }
            });
        });
    });
</script>