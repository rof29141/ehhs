<?php
if($this->session->userdata('language'))
{
    $session_lang = $this->session->userdata('language');
    $language = $session_lang['lang'];
}
else
    $language='english';
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
                    <li><a onclick="SwitchLanguage('english');">English <i class="fa fa-check check_lang" id="check_english" <?php if($language!='english'){?>style="display: none;"<?php }?>></i></a></li>
                    <li><a onclick="SwitchLanguage('spanish');">Spanish <i class="fa fa-check check_lang" id="check_spanish" <?php if($language!='spanish'){?>style="display: none;"<?php }?>></i></a></li>
                </ul>
            </li>
            <li class="topbar-devider"></li>
            <li><a href="page_faq.html">Help</a></li>
            <li class="topbar-devider"></li>
        </ul>
        <!-- End Topbar Navigation -->
    </div>
</div>
<!-- End Topbar -->


