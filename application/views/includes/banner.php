<?php
if($position=='center')
{
?>

    <span class="" style="padding: 0px;"><img style="max-width: 300px;margin-right: 5px;" src="<?php echo $src_logo;?>" /></span>
    <br><br>
    <span class="text-center" style="padding: 0px;font-size: 22px;"><?php echo $project.' <br> '.$page_title;?></span>



<?php
}
elseif($position=='left')
{
?>
    <div style="height: 50px;top:0;background-color: #eee;display: table;width: 100%;padding-left: 10px;padding-right: 10px;">
        <div class="container" style="height: 80px; display: table-row">

            <div class="text-left" id="banner_img"><div id="img_logo"></div></div>
            <div class="text-center" id="banner_project"><?php echo $project;?></div>
            <div class="text-right" id="banner_name">
                <?php //echo $company_name;?>
                <!--<br>-->
                <a onclick="LoadContent('User');"><img style="width: 40px;border-radius: 50%;margin-right: 5px;" src="<?php echo ASSETS_URL; ?>/images/male.png" /><?php echo $bd_FirstName.' '.$bd_LastName.' ('.$user_name.')';?></a></div>

        </div>
    </div>

<?php
}
?>