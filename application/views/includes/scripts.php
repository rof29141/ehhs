<link rel="stylesheet" type="text/css" href="<?php print ASSETS_URL; ?>/css/theme.css" />
<link rel="stylesheet" type="text/css" href="<?php print ASSETS_URL; ?>/css/vendor/animate.css" />
<link rel="stylesheet" type="text/css" href="<?php print ASSETS_URL; ?>/css/vendor/brankic.css" />
<link rel="stylesheet" type="text/css" href="<?php print ASSETS_URL; ?>/css/vendor/entypo.css" />

<link rel="stylesheet" href="<?php print ASSETS_URL; ?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php print ASSETS_URL; ?>/js/alertifyjs/css/alertify.css">

<script src="<?php print ASSETS_URL; ?>/js/jquery-3.2.1.min.js"></script>
<script src="<?php print ASSETS_URL; ?>/js/bootstrap.min.js"></script>

<script src="<?php print ASSETS_URL; ?>/js/jquery-validate/jquery.validate.min.js"></script>
<script src="<?php print ASSETS_URL; ?>/js/alertifyjs/alertify.js"> </script>
<script src="<?php print ASSETS_URL; ?>/js/spin.min.js"></script>

<!--[if lt IE 9]>
<script src="https://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
<![endif]-->

<link rel="stylesheet" type="text/css" href="<?php print ASSETS_URL; ?>/css/datatable/datatables.min.css"/>
<script type="text/javascript" src="<?php print ASSETS_URL; ?>/js/datatables.min.js"></script>

<link rel='stylesheet' href='<?php print ASSETS_URL; ?>/js/fullcalendar-3.5.1/fullcalendar.css' />

<link rel="stylesheet" href="<?php print ASSETS_URL; ?>/css/features/feature_timeline1.css">
<link rel="stylesheet" href="<?php print ASSETS_URL; ?>/css/features/feature_timeline2.css">

<script type="text/javascript" src="<?php print ASSETS_URL; ?>/js/app.js"></script>
<script type="text/javascript" src="<?php print ASSETS_URL; ?>/js/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<link rel="stylesheet" href="<?php print ASSETS_URL; ?>/css/features/revolution_slider/rs-plugin/css/settings.css">


<script src='<?php print ASSETS_URL; ?>/js/fullcalendar-3.5.1/lib/moment.min.js'></script>
<script src='<?php print ASSETS_URL; ?>/js/fullcalendar-3.5.1/fullcalendar.js'></script>

<link href="<?php print ASSETS_URL; ?>/js/select2/select2.min.css" rel="stylesheet" />
<script src="<?php print ASSETS_URL; ?>/js/select2/select2.min.js"></script>


<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js"></script>

<style type="text/css">
    .carousel-indicators .active{ background: #31708f; } .content{ margin-top:20px; } .adjust1{ float:left; width:100%; margin-bottom:0; } .adjust2{ margin:0; }
    .carousel-indicators li{ border :1px solid #ccc; background-color: #2c596d;} .carousel-control{ color:#31708f; width:5%; } .carousel-control:hover, .carousel-control:focus{ color:#31708f; } .carousel-control.left, .carousel-control.right { background-image: none; } .media-object{ margin:auto; margin-top:15%; } @media screen and (max-width: 768px) { .media-object{ margin-top:0; } }

    /* Countdown */

    .countdown {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 75%;
        max-width: 20rem;
        margin: 0 auto;
    }

    .countdown__item {
        display: flex;
        flex-direction: column;
        flex: 0 1 auto;
        min-width: 31%;
        margin-bottom: 1rem;
    }

    .countdown__item--large {
        flex: auto;
        width: 100%;
        font-size: 2.75em;
    }

    .countdown__timer {
        padding: .25em;
        background-color: white;
        border: 1px solid black;
        border-radius: 3px;
        font-weight: bold;
        font-size: 2em;
        text-align: center;
    }

    .countdown__label {
        font-size: 1em;
        padding-top: .40em;
        text-align: center;

    .countdown__item--large {
    :before,
    :after {
         content: '';
         display: block;
         height: 1px;
         background-image: linear-gradient(
                 left,
                 rgba(0, 0, 0, 0),
                 rgba(0, 0, 0, .4),
                 rgba(0, 0, 0, 0));
    }

    }
    }



    /* Countdown */

    .slotholder{text-align: center;}

    /* Calendar

    .fc-time:after{ content: "m"; }*/

    /* Calendar */

    /* select2 */

    .doctor_img {width: 30px;border-radius: 50%;margin-right: 5px;}
    .doc_img {width: 60px;border-radius: 50%;}

    /* select2 */

    /* Upload file */

    .bar {
        height: 18px;
        background: green;
    }
    .fileinput-button {

        overflow: hidden;
    }
    .fileinput-button input {

        margin: 0;
        opacity: 0;
        -ms-filter: 'alpha(opacity=0)';
        font-size: 200px !important;
        direction: ltr;
        cursor: pointer;
    }

    /* Fixes for IE < 8 */
    @media screen\9 {
        .fileinput-button input {
            filter: alpha(opacity=0);
            font-size: 100%;
            height: 100%;
        }
    }
    /* Upload file */


    /* Authentication */

    body {
        padding-top: 0px;
        padding-bottom: 40px;
        background-color: #fff;
    }

    .auth {
        max-width: 430px;
        padding: 15px;
        margin: 0 auto;
    }

    .auth .auth-heading,

    .auth .checkbox {
        margin-bottom: 10px;
    }

    .auth .checkbox {
        font-weight: normal;
    }

    .auth .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
        margin-bottom: 3px;
    }

    .auth .form-control:focus {
        z-index: 2;
    }

    .invalid{
        margin-bottom: 2px;
        margin-top: 2px;
        border-radius: 5px;
        font-style: normal;
        font-size: 11px;
        line-height: 15px;
        color: #D56161;
        border-color: #A90329;
    }

    .btn{
        margin-top: 15px;
        margin-bottom: 10px;
    }

    .fields{
        margin-top: 10px;
        margin-bottom: 10px;
    }

    /* Authentication */

    /* Sticky footer styles */

    html {
        position: relative;
        min-height: 100%;
    }

    body {
        /* Margin bottom by footer height */
        margin-bottom: 40px;
    }

    .footer {
        position: absolute;
        bottom: -80px;
        width: 100%;
        /* Set the fixed height of the footer here */
        height: 40px;
        line-height: 40px; /* Vertically center the text there */
        background-color: #f5f5f5;
    }

    @media only screen and (max-width: 768px) {
        bottom: -40px;
    }

    /* Sticky footer styles */

    /* Navbar */

    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu>.dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -6px;
        margin-left: -1px;
        -webkit-border-radius: 0 6px 6px 6px;
        -moz-border-radius: 0 6px 6px;
        border-radius: 0 6px 6px 6px;
        display: none;
    }
    @media only screen and (min-width: 768px)
    {
        .dropdown-submenu:hover > .dropdown-menu {
            display: block;
        }
        .dropdown-submenu-top:hover>.dropdown-menu {
             display: block;
        }
        .dropdown-submenu>a:after {
            display: block;
            content: " ";
            float: right;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid;
            border-width: 5px 0 5px 5px;
            border-left-color: #ccc;
            margin-top: 5px;
            margin-right: -10px;
        }

        .dropdown-submenu:hover>a:after {
            border-left-color: #fff;
        }

        .dropdown-submenu.pull-left {
            float: none;
        }

        .dropdown-submenu.pull-left>.dropdown-menu {
            left: -100%;
            margin-left: 10px;
            -webkit-border-radius: 6px 0 6px 6px;
            -moz-border-radius: 6px 0 6px 6px;
            border-radius: 6px 0 6px 6px;
        }
        .navbar-nav > li > .dropdown-menu {
            border-radius: 4px; }
        /* line 149, /home/andrei/core-admin-release/core-admin/source/stylesheets/navigation.scss */
        .navbar-nav > li > .dropdown-menu > li > a {
            /*white-space: normal; */}
        hr.divider:after, li.divider:after {
            content: '';
            height: 1px;
            top: 1px;
            left: 0;
            width: 100%;
            position: absolute;
            background: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iNTAlIiB4Mj0iMTAwJSIgeTI9IjUwJSI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0icmdiYSgyNTAsIDI1MCwgMjUwLCAwKSIvPjxzdG9wIG9mZnNldD0iNTAlIiBzdG9wLWNvbG9yPSIjZmFmYWZhIi8+PHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSJyZ2JhKDI1MCwgMjUwLCAyNTAsIDApIi8+PC9saW5lYXJHcmFkaWVudD48L2RlZnM+PHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNncmFkKSIgLz48L3N2Zz4g');
            background: -webkit-gradient(linear, 0% 50%, 100% 50%, color-stop(0%, rgba(250, 250, 250, 0)), color-stop(50%, #fafafa), color-stop(100%, rgba(250, 250, 250, 0)));
            background: -webkit-linear-gradient(left, rgba(250, 250, 250, 0), #fafafa, rgba(250, 250, 250, 0));
            background: -moz-linear-gradient(left, rgba(250, 250, 250, 0), #fafafa, rgba(250, 250, 250, 0));
            background: -o-linear-gradient(left, rgba(250, 250, 250, 0), #fafafa, rgba(250, 250, 250, 0));
            background: linear-gradient(left, rgba(250, 250, 250, 0), #fafafa, rgba(250, 250, 250, 0)); }
        /* line 223, /home/andrei/core-admin-release/core-admin/source/stylesheets/sidebar.scss */
        hr.divider + .padded, hr.divider + .vpadded, li.divider + .padded, li.divider + .vpadded {
            padding-top: 0; }

    }



    .dropdown-submenu>a:after {
        display: block;
        content: " ";
        float: right;
        width: 0;
        height: 0;
        border-color: transparent;
        border-style: solid;
        border-width: 5px 0 5px 5px;
        border-left-color: #ccc;
        margin-top: 5px;
        margin-right: -10px;
    }

    .dropdown-submenu:hover>a:after {
        border-left-color: #fff;
    }

    .dropdown-submenu.pull-left {
        float: none;
    }

    .dropdown-submenu.pull-left>.dropdown-menu {
        left: -100%;
        margin-left: 10px;
        -webkit-border-radius: 6px 0 6px 6px;
        -moz-border-radius: 6px 0 6px 6px;
        border-radius: 6px 0 6px 6px;
    }

    .navbar-nav>li>a { color: #fff;}

    /* Navbar */

    .ribbon_left{position:absolute;left:-4px;top:-4px}

    .tab-pane{
        padding: 20px;
        border: 1px #dadada solid;border-top: 0;
    }

    .label_danger{
        background:#cc0000;
        line-height:10px;
        padding: 3px;
        padding-left:10px;
        padding-right:10px;
        color: #fff;
        border-radius: 7px 7px 7px 7px;
        -moz-border-radius: 7px 7px 7px 7px;
        -webkit-border-radius: 7px 7px 7px 7px;
        border: 0px solid #000000;}

    .label_warning{
        background:#e7a61a;
        line-height:10px;
        padding: 3px;
        padding-left:10px;
        padding-right:10px;
        color: #fff;
        border-radius: 7px 7px 7px 7px;
        -moz-border-radius: 7px 7px 7px 7px;
        -webkit-border-radius: 7px 7px 7px 7px;
        border: 0px solid #000000;}


    /* Button of DataTables */
    .dt-button
    {
        display: inline-block;
        margin-bottom: 0;
        font-weight: 400;
        text-align: center;
        vertical-align: middle;
        cursor: pointer;
        background-image: none;
        white-space: nowrap;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        border-radius: 4px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.14), inset 0 1px 0 rgba(255, 255, 255, 0.2);
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        -webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        -ms-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
        transition: all 0.2s linear;
        color: #333 !important;
        border: 1px solid #979797;
        background-color: white;
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fff), color-stop(100%, #dcdcdc));
        background: -webkit-linear-gradient(top, #fff 0%, #dcdcdc 100%);
        background: -moz-linear-gradient(top, #fff 0%, #dcdcdc 100%);
        background: -ms-linear-gradient(top, #fff 0%, #dcdcdc 100%);
        background: -o-linear-gradient(top, #fff 0%, #dcdcdc 100%);
        background: linear-gradient(to bottom, #fff 0%, #dcdcdc 100%);
        margin: 2px;
    }

    .myitem {
        display: block;
        width: 100%;
    }
    label .mylabel {
        display: inline;
        margin: 0px;
    }

    .dataTables_filter{float: left !important;}

    .dataTables_length {
        float: left;
        text-align: left;
        height: 60px;
        vertical-align: middle;
        width: 100%;
    }
    .mybtns {
        padding: 8px; 0; 0; 0;
        float: right;
        text-align: right;
        height: 60px;
        vertical-align: middle;
        width: 100%;
    }
    .mysearch {
        height: 60px !important;
        padding-top: 10px;
        width: 100%;
        float: left !important;
        text-align: left !important;
    }

    .data_table_DropDown{
        float:left;
    }

    @media only screen and (max-width: 1285px)
    {
        .dataTables_filter{text-align: center !important;}

        .dataTables_length {
            text-align: center;
            height: 60px;
            vertical-align: middle;
            width: 100%;
        }
        .mybtns {
            padding: 8px; 0; 0; 0;
            text-align: center;
            height: 180px;
            vertical-align: middle;
            width: 100%;
        }
        .mysearch {
            height: 120px !important;
            padding-top: 10px;
            width: 100%;
            text-align: center !important;
        }
        .data_table_DropDown{
            text-align: center;
        }
    }

    @media only screen and (max-width: 350px)
    {
        .mybtns {
            padding: 8px; 0; 0; 0;
            text-align: center;
            height: 240px;
            vertical-align: middle;
            width: 100%;
        }
    }

    .dataTables_scroll
    {
        overflow:auto;
    }
    /* Button of DataTables */

    /* DropDown */
    .multiselect {
        width: 200px;
    }

    .selectBox {
        position: relative;
        width: 100%;
    }

    .selectBox select {
        width: 100%;
        font-weight: bold;
    }

    .overSelect {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }

    #checkboxes {
        display: none;
        border: 1px #dadada solid;
        background-color: #fff;
        color:#000;
        position: absolute;
        z-index: 1051;
        width: 200px;
    }

    #checkboxes label {
        display: inline;
    }

    #checkboxes label:hover {
        background-color: #ccc;
    }
    /* DropDown */

    /* Banner */
    #img_logo {
        background:url(<?php print $src_logo;?>);
        background-size: auto 90px;
        background-repeat: no-repeat;
        width:100%;
        height:88px;
        margin-right: 5px;
        margin-left: 40px;
        vertical-align: middle;
    }

    #banner_img {
        display:table-cell;width:25%;font-size: 24px;vertical-align: middle;color: #000;
    }

    #banner_project {
        display:table-cell;width:50%;font-size: 24px;vertical-align: middle;color: #000;
    }

    #banner_name {
        display:table-cell;width:25%;font-size: 14px;vertical-align: middle;color: #000;
    }

    @media only screen and (max-width: 1560px) {


        #banner_img {
            width:30%;
        }

        #banner_project {
            width:40%;
        }

        #banner_name {
            width:30%;
        }
    }

    @media only screen and (max-width: 900px) {
        #img_logo {
            background:url(<?php print $src_logo1;?>);
            background-size: auto 48px;
            background-repeat: no-repeat;
            width:100%;
            height:70px;
            margin-right: 5px;
            vertical-align: middle;
        }

        #banner_img {
            display:table-cell;width:15%;font-size: 24px;vertical-align: middle;
        }

        #banner_project {
            display: none;
        }

        #banner_name {
            display:table-cell;width:85%;font-size: 14px;vertical-align: middle;
        }
    }
    /* Banner */

    /* Fieldset */
    .myfieldset {
        border: 1px solid #d7d7d7;margin: 20px 0px 20px 0px; padding-top:20px; padding: 10px;
    }
    .myfieldsetinside {
        border: 1px solid #d7d7d7;margin: 0; padding: 10px;
    }

    .mylegend {
        margin: 0px 0px 0px 10px;width:auto;font-family: Verdana;font-size: 14px;border: 0px;padding:5px;
    }
    /* Fieldset */

    .upd{
        cursor:pointer;
    }

    .myrow{margin: 20px;}

    @media only screen and (max-width: 330px) {
        .myfieldset {border: 1px solid #d7d7d7;margin: 30px 0px 20px 0px;padding: 10px;}

        .myrow{margin: 0px;}

    }

    .fc-left{font-size: 18px;padding: 8px;margin: 3px;}

    .section_services{font-size: 18px;}

    p{text-align: justify}
    .input_label{font-weight: normal;}




    .select2-results__option[aria-selected="true"] {
        display: none;
    }

    .mycbxbtn{
        padding: 1px !important;
        height: 20px !important;
        top: -1px !important;
        margin-top: 0 !important;
    }


    /*Badge*/
    @media only screen and (max-width: 330px) {
        .badge{display: none;}
    }
    /*Badge*/


    /* Social Media */
    .social {
        position: fixed; /* Hacemos que la posición en pantalla sea fija para que siempre se muestre en pantalla*/
        left: 0; /* Establecemos la barra en la izquierda */
        top: 300px; /* Bajamos la barra 200px de arriba a abajo */
        z-index: 2000; /* Utilizamos la propiedad z-index para que no se superponga algún otro elemento como sliders, galerías, etc */
    }

    .social ul {
        list-style: none;
        padding-left: 0;
        margin-left: 0;
    }

    .social ul li a {
        display: inline-block;
        color:#fff;
        background: #000;
        padding: 5px 10px;
        text-decoration: none;
        -webkit-transition:all 500ms ease;
        -o-transition:all 500ms ease;
        transition:all 500ms ease; /* Establecemos una transición a todas las propiedades */
    }

    .entypo-facebook:hover {background:#3b5998;padding: 20px 15px 20px 15px;} /* Establecemos los colores de cada red social, aprovechando su class */
    .entypo-twitter:hover {background: #00abf0;padding: 20px 15px 20px 15px;}
    .entypo-linkedin:hover {background: #d95232;padding: 20px 15px 20px 15px;}
    .entypo-video:hover {background: #ae181f;padding: 20px 15px 20px 15px;}
    .entypo-mail:hover {background: #000;padding: 20px 15px 20px 15px;}
    .brankic-globe2:hover {background: #492f91;padding: 20px 15px 20px 15px;}

    .social ul li a {
        background: #666666; /* Cambiamos el fondo cuando el usuario pase el mouse */
    }

    @media only screen and (max-width: 330px) {
        .badge{display: none;}
    }
    /* Social Media */




</style>

<script type="text/javascript">

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