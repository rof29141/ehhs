<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$position='left';
require_once(APPPATH."views/includes/header.php");
ini_set('memory_limit', '2048M');
?>

<body>

    <div class="wrapper">
        <?php require_once(VIEW_URL."includes/hidden.php");?>
        <?php require_once(VIEW_URL."includes/nav.php");?>

        <div id="main-view"></div>

        <?php require_once(VIEW_URL."includes/footer_scripts.php");?>
        <?php require_once(VIEW_URL."includes/footer.php");?>



<script type="text/javascript">

    /*-------------------DO NOT CHANGE THE CODE-------------------*/
	if('<?php print $ctr?>'!='' && '<?php print $func?>'!='' && '<?php print $view_area?>'!='')
	{
		var str='<?php print $ctr."/".$func;?>';
		var str=str+'<?php if(isset($param1))print "/".$param1;?>';
		var str=str+'<?php if(isset($param2))print "/".$param2;?>';
		
		//alert(str);
		LoadContent(str, 0, '<?php print $view_area?>');
	}
	else
    {
		LoadContent('Dashboard', 0, 'main-view');
	}

    function UpdateContent(go_function, go_view, go_back, id='')
    {
        jQuery( '.content-wrapper' ).empty();
        var target = document.getElementById('container');
        var spinner = new Spinner(opts).spin(target);

        jQuery.ajax({
            type: "POST",
            dataType: "html",
            url: go_function,
            data:{go_view:go_view, go_back:go_back, id:id}
        }).done(function(response, textStatus, jqXHR)
        {
            if(response!='1' && response!='')
            {
                jQuery('.content-wrapper').html(response);
                jQuery('#view').val(go_back);
                spinner.stop();
            }
            else
                window.location.replace("Authentication");
        }).fail(function(jqHTR, textStatus, thrown)
        {
            alertify.error('Something wrong with AJAX:' + textStatus);
        });
    }

    function DeleteContent(go_function, go_layout, id)
    {
        jQuery( '.content-wrapper' ).empty();
        var target = document.getElementById('container');
        var spinner = new Spinner(opts).spin(target);

        jQuery.ajax({
            type: "POST",
            dataType: "html",
            url: go_function,
            data:{go_layout:go_layout, id:id}
        }).done(function(response, textStatus, jqXHR)
        {
            if(response!='1' && response!='')
            {
                if(response=='0'){alertify.success('Element deleted.');}
                else if(response=='01'){alertify.warning('You have to delete something. The ID is empty.');}
                else if(response=='02'){alertify.warning('You have to delete something. The Layout is empty.');}
                else {alertify.error('Error: The element could not be deleted. '+ response);}
                spinner.stop();
                LoadContent(jQuery('#view').val());
            }
            else
                window.location.replace("Authentication");
        }).fail(function(jqHTR, textStatus, thrown)
        {
            alertify.error('Something wrong with AJAX:' + textStatus);
        });
    }

    function LoadContent(pag, click=1, div='main-view')
    {
        //if(click!=0)jQuery('.navbar-toggle').click();

        //var target = document.getElementById('main-view');
        //var spinner = new Spinner(opts).spin(target);
		//alert(pag);
        jQuery.ajax({
            type: "POST",
            dataType: "html",
            url: pag
        }).done(function(response, textStatus, jqXHR)
        {//alert(response);
            if(response!='')
            {
                jQuery('#'+div).empty();
				jQuery('#'+div).html(response);
                jQuery('#view').val(pag);
                //spinner.stop();
            }
        }).fail(function(jqHTR, textStatus, thrown)
        {
            alertify.error('Something wrong with AJAX:' + textStatus);
        });
    }

    function SaveContent(url, array_inputs)
    {
        jQuery( '.content-wrapper' ).empty();
        var target = document.getElementById('container');
        var spinner = new Spinner(opts).spin(target);

        jQuery.ajax({
            type: "POST",
            dataType: "html",
            url: url,
            data:array_inputs
        }).done(function(response, textStatus, jqXHR)
        {
            if(response!='1' && response!='')
            {
                if(jQuery.isNumeric(response)){alertify.success('Data Saved.');}
                else{alertify.error('Error: The element could not be Saved. '+ response);}
                spinner.stop();
                LoadContent(jQuery('#view').val());
            }
            else
                window.location.replace("Authentication");
        }).fail(function(jqHTR, textStatus, thrown)
        {
            alertify.error('Something wrong with AJAX:' + textStatus);
        });
    }

    function SwitchLanguage(language)
    {
        jQuery('.check_lang').hide();
        jQuery('#check_'+language).show();

        jQuery.ajax({
            type: "POST",
            dataType: "html",
            url: 'Main/SwitchLanguage',
            data:{language:language}
        }).done(function(response, textStatus, jqXHR)
        {
            window.location.replace("Main");
        }).fail(function(jqHTR, textStatus, thrown)
        {
            alertify.error('Something wrong with AJAX:' + textStatus);
        });
    }

    /*-------------------DO NOT CHANGE THE CODE-------------------*/

</script>