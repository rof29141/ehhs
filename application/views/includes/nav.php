
<!--=== Header ===-->
<div class="header">

    <?php require_once 'top_bar.php'?>

    <!-- Navbar -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-bars"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img id="logo-header" src="<?php print ASSETS_URL; ?>/unify/img/logo1-default.png" alt="Logo">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <!-- Home -->
                    <li class="active">
                        <a href="#" onclick="LoadContent('Dashboard/GoDashboard', 0, 'main-view');" class="dropdown-toggle" data-toggle="dropdown">
                            Home
                        </a>
                    </li>
                    <!-- End Home -->

                    <!-- Pages -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            Our Business
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#" onclick="LoadContent('Dashboard/GoDashboard')">About Us</a></li>
                            <li><a href="#" onclick="LoadContent('Dashboard/GoDashboard')">About Basic</a></li>
                            <li><a href="#" onclick="LoadContent('Dashboard/GoDashboard')">About Me</a></li>
                            <li><a href="#" onclick="LoadContent('Dashboard/GoDashboard')">About Our Team</a></li>
                        </ul>

                    </li>
                    <!-- End Pages -->


                </ul>
            </div><!--/navbar-collapse-->
        </div>
    </div>
    <!-- End Navbar -->
</div>
<!--=== End Header ===-->

<!--=== Slider ===-->
<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <ul>
            <!-- THE FIRST SLIDE -->
            <li data-transition="3dcurtain-vertical" data-slotamount="10" data-masterspeed="300" data-thumb="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/thumbs/thumb1.jpg">

                <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                <img src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/bg1.jpg">

                <div class="caption large_text sfb bg-black-opacity"
                     data-x="176"
                     data-y="12"
                     data-speed="300"
                     data-start="800"
                     data-easing="easeOutExpo">
                    OVER
                    <span style="color: #ffcc00;">7000</span>
                    SATISFIED CUSTOMERS
                </div>

                <div class="caption randomrotate"
                     data-x="189"
                     data-y="76"
                     data-speed="600"
                     data-start="1100"
                     data-easing="easeOutExpo">
                    <img class="img-border" src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/p1.jpg" alt="Image 2">
                </div>

                <div class="caption randomrotate"
                     data-x="0"
                     data-y="92"
                     data-speed="600"
                     data-start="1200"
                     data-easing="easeOutExpo">
                    <img class="img-border" src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/p2.jpg" alt="Image 3">
                </div>

                <div class="caption randomrotate"
                     data-x="200"
                     data-y="209"
                     data-speed="600"
                     data-start="1300"
                     data-easing="easeOutExpo">
                    <img class="img-border" src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/p6.jpg" alt="Image 4">
                </div>

                <div class="caption randomrotate"
                     data-x="97"
                     data-y="117"
                     data-speed="300"
                     data-start="1400"
                     data-easing="easeOutExpo">
                    <img class="img-border" src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/p4.jpg" alt="Image 5">
                </div>

                <div class="caption randomrotate"
                     data-x="14"
                     data-y="222"
                     data-speed="600"
                     data-start="1500"
                     data-easing="easeOutExpo">
                    <img class="img-border" src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/p5.jpg" alt="Image 6">
                </div>

                <div class="caption randomrotate"
                     data-x="638"
                     data-y="201"
                     data-speed="300"
                     data-start="1600"
                     data-easing="easeOutExpo">
                    <img class="img-border" src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/p3.jpg" alt="Image 7">
                </div>

                <div class="caption randomrotate"
                     data-x="717"
                     data-y="294"
                     data-speed="300"
                     data-start="1700"
                     data-easing="easeOutExpo">
                    <img class="img-border" src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/p4.jpg" alt="Image 8">
                </div>

                <div class="caption randomrotate"
                     data-x="682"
                     data-y="79"
                     data-speed="300"
                     data-start="1800"
                     data-easing="easeOutExpo">
                    <img class="img-border" src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/p8.jpg" alt="Image 9">
                </div>

                <div class="caption randomrotate"
                     data-x="807"
                     data-y="71"
                     data-speed="300"
                     data-start="1900"
                     data-easing="easeOutExpo">
                    <img class="img-border" src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/p10.jpg" alt="Image 10">
                </div>

                <div class="caption randomrotate"
                     data-x="818"
                     data-y="271"
                     data-speed="300"
                     data-start="2000"
                     data-easing="easeOutExpo">
                    <img class="img-border" src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/p5.jpg" alt="Image 11">
                </div>

                <div class="caption randomrotate"
                     data-x="95"
                     data-y="248"
                     data-speed="300"
                     data-start="2100"
                     data-easing="easeOutExpo">
                    <img class="img-border" src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/p9.jpg" alt="Image 12">
                </div>

                <div class="caption randomrotate"
                     data-x="762"
                     data-y="165"
                     data-speed="300"
                     data-start="2200"
                     data-easing="easeOutExpo">
                    <img class="img-border" src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/p7.jpg" alt="Image 13">
                </div>
            </li>

            <!-- THE SECOND SLIDE -->
            <li data-transition="papercut" data-slotamount="15" data-masterspeed="300" data-delay="9400" data-thumb="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/thumbs/thumb2.jpg">

                <!-- THE MAIN IMAGE IN THE SECOND SLIDE -->
                <img src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/bg2.jpg">

                <div class="caption very_big_white lfl stl"
                     data-x="18"
                     data-y="343"
                     data-speed="300"
                     data-start="500"
                     data-easing="easeOutExpo" data-end="8800" data-endspeed="300" data-endeasing="easeInSine">
                    TIMELINED CAPTIONS
                </div>

                <div class="caption big_white lfl stl"
                     data-x="18"
                     data-y="390"
                     data-speed="300"
                     data-start="800"
                     data-easing="easeOutExpo" data-end="9100" data-endspeed="300" data-endeasing="easeInSine">
                    MOVE CAPTIONS IN AND OUT ON ONE SLIDE
                </div>

                <div class="caption lft ltb"
                     data-x="600"
                     data-y="0"
                     data-speed="600"
                     data-start="1100"
                     data-easing="easeOutExpo" data-end="3100" data-endspeed="600" data-endeasing="easeInSine">
                    <img src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/drink2.jpg" alt="Image 3">
                </div>

                <div class="caption bold_green_text sft stb"
                     data-x="760"
                     data-y="290"
                     data-speed="300"
                     data-start="1400"
                     data-easing="easeOutExpo" data-end="3300" data-endspeed="300" data-endeasing="easeInSine">
                    PRADA
                </div>

                <div class="caption big_black sfb stb"
                     data-x="780"
                     data-y="320"
                     data-speed="300"
                     data-start="1700"
                     data-easing="easeOutExpo" data-end="3200" data-endspeed="300" data-endeasing="easeInSine">
                    $ 128
                </div>

                <div class="caption lft ltb"
                     data-x="600"
                     data-y="0"
                     data-speed="600"
                     data-start="3600"
                     data-easing="easeOutExpo" data-end="5600" data-endspeed="600" data-endeasing="easeInSine">
                    <img src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/drink1.jpg" alt="Image 6">
                </div>

                <div class="caption bold_brown_text sft stb"
                     data-x="760"
                     data-y="290"
                     data-speed="300"
                     data-start="3900"
                     data-easing="easeOutExpo" data-end="5800" data-endspeed="300" data-endeasing="easeInSine" >
                    Dolce & Gabbana
                </div>

                <div class="caption big_black sfb stb"
                     data-x="780"
                     data-y="320"
                     data-speed="300"
                     data-start="4200"
                     data-easing="easeOutExpo" data-end="5700" data-endspeed="300" data-endeasing="easeInSine">
                    $ 116
                </div>

                <div class="caption lft ltb"
                     data-x="600"
                     data-y="0"
                     data-speed="600"
                     data-start="6100"
                     data-easing="easeOutExpo" data-end="8100" data-endspeed="300" data-endeasing="easeInSine">
                    <img src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/drink3.jpg" alt="Image 9">
                </div>

                <div class="caption bold_red_text sft stb"
                     data-x="760"
                     data-y="290"
                     data-speed="300"
                     data-start="6400"
                     data-easing="easeOutExpo" data-end="8300" data-endspeed="300" data-endeasing="easeInSine">
                    L'EAU DE CHLOE
                </div>

                <div class="caption big_black sfb stb"
                     data-x="780"
                     data-y="320"
                     data-speed="300"
                     data-start="6700"
                     data-easing="easeOutExpo" data-end="8200" data-endspeed="300" data-endeasing="easeInSine">
                    $ 142
                </div>
            </li>

            <!-- THE THIRD SLIDE -->
            <li data-transition="slideleft" data-slotamount="1" data-masterspeed="300" data-thumb="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/thumbs/thumb3.jpg">

                <!-- THE MAIN IMAGE IN THE THIRD SLIDE -->
                <img src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/bg3.jpg" >

                <div class="caption large_text sft"
                     data-x="10"
                     data-y="44"
                     data-speed="300"
                     data-start="800"
                     data-easing="easeOutExpo">
                    TOUCH ENABLED
                </div>

                <div class="caption medium_text sfl"
                     data-x="39"
                     data-y="82"
                     data-speed="300"
                     data-start="1100"
                     data-easing="easeOutExpo">
                    AND
                </div>

                <div class="caption large_text sfr"
                     data-x="88"
                     data-y="78"
                     data-speed="300"
                     data-start="1100"
                     data-easing="easeOutExpo">
                    <span style="color: #72c02c;">RESPONSIVE</span>
                </div>

                <div class="caption lfl"
                     data-x="10"
                     data-y="150"
                     data-speed="800"
                     data-start="900"
                     data-easing="easeOutExpo">
                    <img src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/imac.png" alt="Image 4">
                </div>

                <div class="caption lfl"
                     data-x="210"
                     data-y="245"
                     data-speed="600"
                     data-start="1000"
                     data-easing="easeOutExpo">
                    <img src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/ipad.png" alt="Image 5">
                </div>

                <div class="caption lfl"
                     data-x="322"
                     data-y="313"
                     data-speed="400"
                     data-start="1100"
                     data-easing="easeOutExpo">
                    <img src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/iphone.png" alt="Image 6">
                </div>

                <div class="caption lft"
                     data-x="500"
                     data-y="130"
                     data-speed="300"
                     data-start="500"
                     data-easing="easeOutExpo">
                    <img src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/html5andcss3.png" alt="Image 6">
                </div>
            </li>

            <!-- THE FOURTH SLIDE -->
            <li data-transition="flyin" data-slotamount="1" data-masterspeed="300" data-thumb="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/thumbs/thumb4.jpg">

                <!-- THE MAIN IMAGE IN THE FOURTH SLIDE -->
                <img src="<?php print ASSETS_URL; ?>/unify/img/sliders/revolution/bg4.jpg" >

                <div class="caption lfb boxshadow"
                     data-x="20"
                     data-y="120"
                     data-speed="900"
                     data-start="500"
                     data-easing="easeOutBack">
                    <iframe src="http://player.vimeo.com/video/54035990?title=0&amp;byline=0&amp;portrait=0" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                </div>

                <div class="caption sft big_black"
                     data-x="570"
                     data-y="120"
                     data-speed="300"
                     data-start="1200"
                     data-easing="easeOutExpo">
                    Video Support
                </div>

                <div class="caption sft big_white"
                     data-x="570"
                     data-y="162"
                     data-speed="300"
                     data-start="1300"
                     data-easing="easeOutExpo">
                    Vimeo Example
                </div>

                <div class="caption lfb medium_grey"
                     data-x="570"
                     data-y="215"
                     data-speed="300"
                     data-start="1400"
                     data-easing="easeOutExpo">
                    You can easily add
                </div>

                <div class="caption lfb medium_grey"
                     data-x="570"
                     data-y="240"
                     data-speed="300"
                     data-start="1500"
                     data-easing="easeOutExpo">
                    Vimeo & Youtube Videos
                </div>

                <div class="caption lfb medium_grey"
                     data-x="570"
                     data-y="265"
                     data-speed="300"
                     data-start="1600"
                     data-easing="easeOutExpo">
                    to your Slides
                </div>
            </li>
        </ul>

        <div class="tp-bannertimer tp-bottom"></div>
    </div>
</div>
<!--=== End Slider ===-->