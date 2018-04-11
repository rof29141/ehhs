<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$position='left';
ini_set('memory_limit', '2048M');

require_once("includes/config.php");
?>
<!DOCTYPE html>
<head>
    <title><?php if(isset($project))print $project;?></title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <?php
    require_once("includes/scripts.php");
    ?>
</head>
<body>

    <div class="wrapper">
        <div id="main-view" class="col-md-12 text-left"></div>
    <div>
</body>
</html>

<script type="text/javascript">
    //var dataFromParent;
    function init(dataFromParent)
    {
        jQuery('#main-view').html(dataFromParent);
        jQuery('.fa-print').hide();
        jQuery('.btn').hide();
        jQuery('.selection').hide();
        jQuery('input').attr('readonly', 'readonly');
        jQuery(".my_select2").prop("disabled", true);
        jQuery(".my_select2").select2();
        window.print();
    }
</script>