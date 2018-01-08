<?php
if($position=='center')
{
?>

    <span style="padding: 0px;"><img style="max-width: 300px;margin-right: 5px;" src="<?php print $src_logo;?>" /></span>
    <br>
    <span class="text-center" style="padding: 0px;font-size: 22px;"></span><span class="text-center" style="padding: 0px;font-size: 24px;"><br> <?php print $page_title;?></span>



<?php
}
elseif($position=='left')
{
    if(isset($data['rewards']['data']))$points=$data['rewards']['data'][0]['RewardAvailableTotal'];//<img style="width: 40px;border-radius: 50%;margin-right: 5px;" src="<?php print ASSETS_URL; /images/male.png" />.' ('.$user_name.')'
?>
    <div style="height: 50px;top:0;background-color: #eee;display: table;width: 100%;padding-left: 5px;padding-right: 5px;">
        <div class="container" style="height: 90px; display: table-row">

            <div class="text-left" id="banner_img">
                <div id="img_logo"></div>
            </div>

            <div class="text-center" id="banner_project"><?php print $project;?></div>

            <div class="text-right" id="banner_name">
                <a onclick="LoadContent('User/ListMyProfileRewards/profile');" style="color: #000;"><?php print $bd_FirstName.' '.$bd_LastName;?></a>
                <br><br>
                <?php if(isset($data['rewards']['data'])){?>

                    <a onclick="LoadContent('User/ListMyProfileRewards/rewards');" style="color: #000;">
                        <div style="display: inline-block">Rewards available: </div> <span class="badge txt-color-white" <?php if($points==0)print 'style="background-color:#D9534F;"';else print 'style="background-color:#5CB85C;';?>><?php print $points;?></span><?php if($points>1 || $points==0)print ' points';else print ' point';?>
                    </a>
                    <br><br>
                <?php }?>
                    <div id="counter"></div>


            </div>

        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function()
        {

            const countdown = new Date("<?php print $next_app_date;?>");

            function getRemainingTime(endtime)
            {
                const milliseconds = Date.parse(endtime) - Date.parse(new Date());
                const seconds = Math.floor( (milliseconds/1000) % 60 );
                const minutes = Math.floor( (milliseconds/1000/60) % 60 );
                const hours = Math.floor( (milliseconds/(1000*60*60)) % 24 );
                const days = Math.floor( milliseconds/(1000*60*60*24) );

                return {
                    'total': milliseconds,
                    'seconds': seconds,
                    'minutes': minutes,
                    'hours': hours,
                    'days': days
                };
            }

            function initClock(countdown)
            {
                function updateClock()
                {
                    const time = getRemainingTime(countdown);
                    var d='';
                    var h='';
                    var m='';
                    var s='';

                    if (time.total > 0)
                    {
                        var chain='<div style="display: inline-block" >Next appointment in</div> ';

                        if(time.days == 1)
                            d='<span class="badge txt-color-white" style="margin-right: 2px;">'+time.days+'</span>day ';
                        else if(time.days > 1)
                            d='<span class="badge txt-color-white" style="margin-right: 2px;">'+time.days+'</span>days ';

                        if(time.hours == 1)
                            h='<span class="badge txt-color-white" style="margin-right: 2px;">'+('0' + time.hours).slice(-2)+'</span>hr ';
                        else if(time.hours > 1)
                            h='<span class="badge txt-color-white" style="margin-right: 2px;">'+('0' + time.hours).slice(-2)+'</span>hrs ';

                        if(time.minutes == 1)
                            m='<span class="badge txt-color-white" style="margin-right: 2px;">'+('0' + time.minutes).slice(-2)+'</span>min ';
                        else if(time.minutes > 1)
                            m='<span class="badge txt-color-white" style="margin-right: 2px;">'+('0' + time.minutes).slice(-2)+'</span>mins ';

                        if(time.seconds == 1)
                            s='<span class="badge txt-color-white" style="margin-right: 2px;">'+('0' + time.seconds).slice(-2)+'</span>sec ';
                        else if(time.seconds > 1)
                            s='<span class="badge txt-color-white" style="margin-right: 2px;">'+('0' + time.seconds).slice(-2)+'</span>secs ';

                        $('#counter').html(chain+d+h+m+s);
                    }
                    else
                    {
                        $('#counter').html('');//clearInterval(timeinterval);
                    }

                }

                updateClock();
                const timeinterval = setInterval(updateClock, 1000);
            }

            initClock(countdown);
        });
    </script>

<?php
}
?>

