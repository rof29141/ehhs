<?php
if($position=='center')
{
?>

    <span class="" style="padding: 0px;"><img style="max-width: 300px;margin-right: 5px;" src="<?php print $src_logo;?>" /></span>
    <br><br>
    <span class="text-center" style="padding: 0px;font-size: 22px;"><?php print $project.' <br> '.$page_title;?></span>



<?php
}
elseif($position=='left')
{
    $points=$data['rewards']['data'][0]['RewardAvailableTotal'];//<img style="width: 40px;border-radius: 50%;margin-right: 5px;" src="<?php print ASSETS_URL; /images/male.png" />.' ('.$user_name.')'
?>
    <div style="height: 50px;top:0;background-color: #eee;display: table;width: 100%;padding-left: 10px;padding-right: 10px;">
        <div class="container" style="height: 90px; display: table-row">

            <div class="text-left" id="banner_img"><div id="img_logo"></div></div>
            <div class="text-center" id="banner_project"><?php print $project;?></div>
            <div class="text-right" id="banner_name">
                <a onclick="LoadContent('User/ListMyProfileRewards/profile');"><?php print $bd_FirstName.' '.$bd_LastName;?></a>
                <br><br>
                <a onclick="LoadContent('User/ListMyProfileRewards/rewards');">
                    <div style="display: inline-block">Rewards available: </div> <div class="btn-success" style="display:inline-block;padding-top:12px;text-align:center;border-radius: 50%;width: 35px;height: 35px;"><?php print $points;?></div><?php if($points>1)print ' points';else print ' point';?>
                </a>
            </div>

        </div>
    </div>

<?php
}
?>