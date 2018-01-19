<?php //var_dump($language);
if(!isset($session['caption_language']))
    $session['caption_language']='english';

$badge='';

if(isset($profile_type['percent']) && $profile_type['percent']==100)
{
    $badge = '<span class="badge badge-green rounded-2x">100%</span>';
}
elseif(isset($profile_type['percent']) && $profile_type['percent']>0)
{
    $badge = '<span class="badge badge-red rounded-2x">' . $profile_type['percent'] . '%</span>';
}

?>
<!-- Topbar -->
<div class="topbar">
    <div class="container">
        <!-- Topbar Navigation -->
        <ul class="loginbar pull-right">
            <li>
                <i class="fa fa-globe"></i>
                <a>Languages</a>
                <ul class="lenguages">
                    <li><a onclick="SwitchLanguage('english');">English <i class="fa fa-check check_lang" id="check_english" <?php if($session['caption_language']!='english'){?>style="display: none;"<?php }?>></i></a></li>
                    <li><a onclick="SwitchLanguage('spanish');">Spanish <i class="fa fa-check check_lang" id="check_spanish" <?php if($session['caption_language']!='spanish'){?>style="display: none;"<?php }?>></i></a></li>
                </ul>
            </li>

            <?php if(isset($session['user_name']) && $session['user_name']!=''){?>
                <li class="topbar-devider"></li>
                <li id="logout"><a onclick="LoadContent('User');">My Account <?php print $badge;?></a></li>
            <?php }?>

            <?php if(isset($session['user_name']) && $session['user_name']!=''){?>
                <li class="topbar-devider"></li>
                <li id="logout"><a onclick="Logout('Authentication/Logout');">Logout</a></li>
            <?php }?>
        </ul>
        <!-- End Topbar Navigation -->
    </div>
</div>
<!-- End Topbar -->

<script type="text/javascript">

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

    function Logout(pag, click=1, div='main-view')
    {
        var target = document.getElementById('main-view');
        var spinner = new Spinner(opts).spin(target);

        jQuery.ajax({
            type: "POST",
            dataType: "html",
            url: pag
        }).done(function(response, textStatus, jqXHR)
        {
            if(response)
            {
                jQuery('#'+div).empty();
                jQuery('#'+div).html(response);
                jQuery('#view').val(pag);
                RebuildHeader(spinner);
            }
            else if(response=='NO_LOGGED')
                alertify.error('You don\'t have profile_type.');
        }).fail(function(jqHTR, textStatus, thrown)
        {
            alertify.error('Something wrong with AJAX:' + textStatus);
        });
    }

    function RebuildHeader(spinner)
    {
        jQuery('#div_header').empty();

        jQuery.ajax({
            url:'Main/RebuildHeader',
            type:'POST'
        }).done(function(response, textStatus, jqXHR)
        {
            if(response)
            {
                jQuery('#div_header').html(response);
                spinner.stop();
            }
        });
    }

</script>


