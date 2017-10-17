<?php
    require_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?php if(isset($project))echo $project;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?php echo $src_favico; ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo $src_favico; ?>" type="image/x-icon">

    <?php
        require_once("scripts.php");
    ?>
</head>