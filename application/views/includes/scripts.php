<!-- CSS Global Compulsory-->
<link rel="stylesheet" href="<?php print ASSETS_URL; ?>/unify/plugins/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="<?php print ASSETS_URL; ?>/unify/css/style.css">

<!-- CSS Implementing Plugins -->
<link rel="stylesheet" href="<?php print ASSETS_URL; ?>/unify/plugins/line-icons/line-icons.css">
<link rel="stylesheet" href="<?php print ASSETS_URL; ?>/unify/plugins/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="<?php print ASSETS_URL; ?>/unify/plugins/revolution_slider/rs-plugin/css/settings.css">
<link rel="stylesheet" href="<?php print ASSETS_URL; ?>/unify/plugins/owl-carousel/owl-carousel/owl.carousel.css">

<link rel="stylesheet" href="<?php print ASSETS_URL; ?>/css/timepicker.css">

<!-- CSS Theme -->
<link rel="stylesheet" href="<?php print ASSETS_URL; ?>/unify/css/themes/blue.css" id="style_color">
<link rel="stylesheet" href="<?php print ASSETS_URL; ?>/unify/css/themes/headers/default.css" id="style_color-header-1">

<link rel="stylesheet" href="<?php print ASSETS_URL; ?>/js/alertifyjs/css/alertify.css">
<link href="<?php print ASSETS_URL; ?>/js/select2/select2.min.css" rel="stylesheet" />
<link rel="shortcut icon" href="<?php print $src_favico; ?>" type="image/x-icon">

<link rel="stylesheet" href="<?php print ASSETS_URL; ?>/unify/plugins/sky-forms/version-2.0.1/css/custom-sky-forms.css">
<link rel="stylesheet" href="<?php print ASSETS_URL; ?>/js/jQuery-File-Upload-9.20.0/css/jquery.fileupload.css">

<script src="<?php print ASSETS_URL; ?>/js/jquery-3.2.1.min.js"></script>
<script src="<?php print ASSETS_URL; ?>/js/bootstrap.min.js"></script>

<script src="<?php print ASSETS_URL; ?>/js/jQuery-File-Upload-9.20.0/js/vendor/jquery.ui.widget.js"></script>
<script src="<?php print ASSETS_URL; ?>/js/jQuery-File-Upload-9.20.0/js/jquery.iframe-transport.js"></script>
<script src="<?php print ASSETS_URL; ?>/js/jQuery-File-Upload-9.20.0/js/jquery.fileupload.js"></script>



<script src="<?php print ASSETS_URL; ?>/js/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php print ASSETS_URL; ?>/js/jquery-validate/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php print ASSETS_URL; ?>/js/alertifyjs/alertify.js"> </script>
<script type="text/javascript" src="<?php print ASSETS_URL; ?>/js/spin.min.js"></script>

<script type="text/javascript" src="<?php print ASSETS_URL; ?>/unify/plugins/jquery-migrate-1.2.1.min.js"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="<?php print ASSETS_URL; ?>/unify/plugins/back-to-top.js"></script>
<script type="text/javascript" src="<?php print ASSETS_URL; ?>/unify/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="<?php print ASSETS_URL; ?>/unify/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<script src="<?php print ASSETS_URL; ?>/unify/plugins/sky-forms/version-2.0.1/js/jquery.maskedinput.min.js"></script>
<script src="<?php print ASSETS_URL; ?>/unify/plugins/sky-forms/version-2.0.1/js/jquery-ui.min.js"></script>

<!-- JS Page Level -->
<script type="text/javascript" src="<?php print ASSETS_URL; ?>/unify/js/app.js"></script>
<script type="text/javascript" src="<?php print ASSETS_URL; ?>/unify/js/pages/index.js"></script>
<script type="text/javascript" src="<?php print ASSETS_URL; ?>/unify/js/plugins/owl-carousel.js"></script>
<script type="text/javascript" src="<?php print ASSETS_URL; ?>/unify/js/plugins/masking.js"></script>
<script type="text/javascript" src="<?php print ASSETS_URL; ?>/unify/js/plugins/datepicker.js"></script>
<script type="text/javascript" src="<?php print ASSETS_URL; ?>/js/timepicker.js"></script>




<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.3/css/rowReorder.bootstrap4.min.css">

<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.3/js/dataTables.rowReorder.min.js"></script>

<style type="text/css">

    /*---TOOLTIP---*/




    .mytooltip {
        position: relative;
        display: inline-block;
        border-bottom: 1px dotted #ccc;
        color: #006080;
    }

    .mytooltip .mytooltiptext {
        visibility: hidden;
        position: absolute;
        width: 120px;
        background-color: #555;
        color: #fff;
        text-align: center;
        padding: 2px 0;
        border-radius: 6px;
        z-index: 1;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .mytooltip:hover .mytooltiptext {
        visibility: visible;
        opacity: 1;
    }

    .mytooltip-right {
        top: -5px;
        left: 125%;
    }

    .mytooltip-right::after {
        content: "";
        position: absolute;
        top: 50%;
        right: 100%;
        margin-top: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: transparent #555 transparent transparent;
    }

    .mytooltip-bottom {
        top: 135%;
        left: 50%;
        margin-left: -60px;
    }

    .mytooltip-bottom::after {
        content: "";
        position: absolute;
        bottom: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: transparent transparent #555 transparent;
    }

    .mytooltip-top {
        bottom: 125%;
        left: 50%;
        margin-left: -60px;
    }

    .mytooltip-top::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #555 transparent transparent transparent;
    }

    .mytooltip-left {
        top: -5px;
        bottom:auto;
        right: 128%;
    }
    .mytooltip-left::after {
        content: "";
        position: absolute;
        top: 50%;
        left: 100%;
        margin-top: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: transparent transparent transparent #555;
    }


    /*---TOOLTIP---*/



a:hover {
text-decoration:none;
cursor: pointer;
}

.photo_person {
	display: inline-block;
	height: 80px;
	background-repeat: no-repeat;
	background-position: center center;
	background-size: cover;
	width: 80px;
	border-radius: 50% !important;
}

.photo_person_row {
	display: inline-block;
	height: 20px;
	background-repeat: no-repeat;
	background-position: center center;
	background-size: cover;
	width: 20px;
	border-radius: 50% !important;
}

.has-error .select2-selection {
    border: 1px solid #a94442;
    border-radius: 4px;
}

.files{line-height: 32px;border: 1px solid #999;padding-left: 5px;padding-right: 90px;}/*file inputs*/

.invalid{
    margin-bottom: 4px;
    margin-top: 0px;
    border-radius: 5px;
    font-style: normal;
    font-size: 11px;
    line-height: 15px;
    color: #D56161;
    border-color: #A90329;
    font-weight: normal;
}

.img_up{background:url(<?php print ASSETS_URL.'/unify/img/up.png';?>);}


.mysearch{border-color: #999;border-width: 1px;font-size: 14px;color: #404040;height: 34px;padding: 6px 12px;-webkit-transition: border-color 0.3s;-moz-box-sizing: border-box;}




/* Fieldset */
.myfieldset {
	border: 1px solid #d7d7d7;margin: 5px 0px 5px 0px; padding-top:10px;margin-bottom:10px; padding: 5px;
}
.myfieldsetinside {
	border: 1px solid #d7d7d7;margin: 0; padding: 10px;
}

.mylegend {
	margin: 0px 0px 0px 10px;width:auto;font-family: Verdana;font-size: 14px;border: 0px;padding:5px;
}
/* Fieldset */
</style>

