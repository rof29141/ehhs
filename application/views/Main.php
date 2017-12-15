<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$position='left';
require_once(APPPATH."views/includes/header.php");
ini_set('memory_limit', '2048M');
?>

<link href="<?php print base_url('assets/css/application.css') ?>" rel="stylesheet">

<body>


    <?php require_once(VIEW_URL."includes/hidden.php");?>
    <?php require_once(VIEW_URL."includes/nav.php");?>


        <div class="content-wrapper" id="container" style="position:relative; top: 80px; background-color: #ffffff;"></div>



<?php require_once(VIEW_URL."includes/footer_scripts.php");?>
<?php require_once(VIEW_URL."includes/footer.php");?>

<script type="text/javascript">

    /*-------------------DO NOT CHANGE THE CODE-------------------*/

    LoadContent('Appointment');

    function UpdateContent(go_function, go_view, go_back, id='')
    {
        $( '.content-wrapper' ).empty();
        var target = document.getElementById('container');
        var spinner = new Spinner(opts).spin(target);

        $.ajax({
            type: "POST",
            dataType: "html",
            url: go_function,
            data:{go_view:go_view, go_back:go_back, id:id}
        }).done(function(response, textStatus, jqXHR)
        {
            if(response!='1')
            {
                $('.content-wrapper').html(response);
                $('#view').val(go_back);
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
        $( '.content-wrapper' ).empty();
        var target = document.getElementById('container');
        var spinner = new Spinner(opts).spin(target);

        $.ajax({
            type: "POST",
            dataType: "html",
            url: go_function,
            data:{go_layout:go_layout, id:id}
        }).done(function(response, textStatus, jqXHR)
        {
            if(response!='1')
            {
                if(response=='0'){alertify.success('Element deleted.');}
                else if(response=='01'){alertify.warning('You have to delete something. The ID is empty.');}
                else if(response=='02'){alertify.warning('You have to delete something. The Layout is empty.');}
                else {alertify.error('Error: The element could not be deleted. '+ response);}
                spinner.stop();
                LoadContent($('#view').val());
            }
            else
                window.location.replace("Authentication");
        }).fail(function(jqHTR, textStatus, thrown)
        {
            alertify.error('Something wrong with AJAX:' + textStatus);
        });
    }

    function LoadContent(pag)
    {
        //$('.content-wrapper').html('');
        $( '.content-wrapper' ).empty();
        var target = document.getElementById('container');
        var spinner = new Spinner(opts).spin(target);

        $.ajax({
            type: "POST",
            dataType: "html",
            url: pag
        }).done(function(response, textStatus, jqXHR)
        {
            if(response!='1')
            {
                $('.content-wrapper').html(response);
                $('#view').val(pag);
                spinner.stop();
            }
            else
                window.location.replace("Authentication");
        }).fail(function(jqHTR, textStatus, thrown)
        {
            alertify.error('Something wrong with AJAX:' + textStatus);
        });
    }

    function SaveContent(url, array_inputs)
    {
        $( '.content-wrapper' ).empty();
        var target = document.getElementById('container');
        var spinner = new Spinner(opts).spin(target);

        $.ajax({
            type: "POST",
            dataType: "html",
            url: url,
            data:array_inputs
        }).done(function(response, textStatus, jqXHR)
        {
            if(response!='1')
            {
                if(response=='0'){alertify.success('Data Saved.');}
                else{alertify.error('Error: The element could not be Saved. '+ response);}
                spinner.stop();
                LoadContent($('#view').val());
            }
            else
                window.location.replace("Authentication");
        }).fail(function(jqHTR, textStatus, thrown)
        {
            alertify.error('Something wrong with AJAX:' + textStatus);
        });
    }

    /*-------------------DO NOT CHANGE THE CODE-------------------*/

    $(document).ready(function()
    {

    });

</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5a14683d198bd56b8c03c7bd/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->