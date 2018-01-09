<?php
    require_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?php if(isset($project))print $project;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?php print $src_favico; ?>" type="image/x-icon">
    <link rel="icon" href="<?php print $src_favico; ?>" type="image/x-icon">

    <?php
        require_once("scripts.php");
    ?>
</head>

<div class="social">
    <ul>
        <li class="btn_social"><a href="https://twitter.com/drjonmendelsohn" target="_blank" class="entypo-twitter"></a></li>
        <li class="btn_social"><a href="https://www.facebook.com/351face" target="_blank" class="entypo-facebook"></a></li>
        <li class="btn_social"><a href="http://www.linkedin.com/pub/jon-mendelsohn/9/4a5/405" target="_blank" class="entypo-linkedin"></a></li>
        <li class="btn_social"><a href="https://www.youtube.com/channel/UC2EAnLCK6NE-2YCWHY5QBjw" target="_blank" class="entypo-video"></a></li>
        <li class="btn_social"><a href="https://351face.com" target="_blank" class="brankic-globe2"></a></li>
        <li class="btn_social"><a href="mailto:info@351face.com" class="entypo-mail"></a></li>
    </ul>
</div>