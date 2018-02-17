
<!--=== Header ===-->
<div class="header" id="div_header">

    <?php require_once 'top_bar.php'?>
    <?php require_once 'nav_bar.php'?>

</div>
<!--=== End Header ===-->
<?php
$slider=1;

if($slider==1)
{
    ?>
    <!--=== Slider ===-->
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <ul>
                <!-- THE FIRST SLIDE -->
                <li data-transition="3dcurtain-vertical" data-slotamount="40" data-masterspeed="400" data-thumb="<?php print base_url('assets/images/slider/revolution/thumbs/thumb1.jpg'); ?>">

                    <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                    <img width='100%' src="<?php print base_url('assets/images/slider/revolution/bg1.png'); ?>">

                    <div class="caption large_text sfb bg-black-opacity"
                         data-x="150"
                         data-y="12"
                         data-speed="500"
                         data-start="800"
                         data-easing="easeOutExpo">
                        <?php print COMPANY;?>
                    </div>

                    <div class="caption randomrotate"
                         data-x="149"
                         data-y="116"
                         data-speed="600"
                         data-start="1100"
                         data-easing="easeOutExpo">
                        <img width="190px;" class="img-border" style='border-radius:5px !important;' src="<?php print base_url('assets/images/slider/revolution/p1.jpg'); ?>" alt="Image 2">
                    </div>

                    <div class="caption randomrotate"
                         data-x="-90"
                         data-y="112"
                         data-speed="600"
                         data-start="1200"
                         data-easing="easeOutExpo">
                        <img width="190px;"class="img-border" style='border-radius:5px !important;' src="<?php print base_url('assets/images/slider/revolution/p2.jpg'); ?>" alt="Image 2">
                    </div>

                    <div class="caption randomrotate"
                         data-x="190"
                         data-y="279"
                         data-speed="600"
                         data-start="1300"
                         data-easing="easeOutExpo">
                        <img width="170px;" class="img-border"style='border-radius:5px !important;' src="<?php print base_url('assets/images/slider/revolution/p3.jpg'); ?>" alt="Image 3">
                    </div>

                    <div class="caption randomrotate"
                         data-x="47"
                         data-y="150"
                         data-speed="500"
                         data-start="1400"
                         data-easing="easeOutExpo">
                        <img width="170px;" class="img-border"style='border-radius:5px !important;' src="<?php print base_url('assets/images/slider/revolution/p4.jpg'); ?>" alt="Image 4">
                    </div>

                    <div class="caption randomrotate"
                         data-x="-70"
                         data-y="232"
                         data-speed="600"
                         data-start="1500"
                         data-easing="easeOutExpo">
                        <img width="170px;" class="img-border"style='border-radius:5px !important;' src="<?php print base_url('assets/images/slider/revolution/p5.jpg'); ?>" alt="Image 5">
                    </div>

                    <div class="caption randomrotate"
                         data-x="-30"
                         data-y="321"
                         data-speed="500"
                         data-start="1600"
                         data-easing="easeOutExpo">
                        <img width="210px;" class="img-border"style='border-radius:5px !important;' src="<?php print base_url('assets/images/slider/revolution/p6.jpg'); ?>" alt="Image 6">
                    </div>

                    <div class="caption randomrotate"
                         data-x="130"
                         data-y="364"
                         data-speed="500"
                         data-start="1700"
                         data-easing="easeOutExpo">
                        <img class="img-border"style='border-radius:5px !important;' src="<?php print base_url('assets/images/slider/revolution/p7.jpg'); ?>" alt="Image 7">
                    </div>

                    <div class="caption randomrotate"
                         data-x="120"
                         data-y="239"
                         data-speed="500"
                         data-start="1800"
                         data-easing="easeOutExpo">
                        <img class="img-border"style='border-radius:5px !important;' src="<?php print base_url('assets/images/slider/revolution/p8.jpg'); ?>" alt="Image 8">
                    </div>

                    <div class="caption large_text sfb bg-black-opacity"
                         data-x="400"
                         data-y="260"
                         data-speed="500"
                         data-start="3000"
                         data-easing="easeOutExpo" data-end="6500" data-endspeed="300" data-endeasing="easeInSine">
                        We are helping families since
                    </div>

                    <div class="caption big_black sfb stb"
                         data-x="630"
                         data-y="320"
                         data-speed="500"
                         data-start="3500"
                         data-easing="easeOutExpo" data-end="7000" data-endspeed="300" data-endeasing="easeInSine">
                        <span style="color: #ffcc00;">2010</span>
                    </div>

                    <!--<div class="caption randomrotate"
                         data-x="950"
                         data-y="50"
                         data-speed="1"
                         data-start="6000"
                         data-easing="easeOutExpo" data-end="9000" data-endspeed="300" data-endeasing="easeInSine">
                        <img class="img-border" style='width:150px;border-radius:50% !important;'src="<?php print base_url('assets/images/logo.jpg'); ?>" alt="<?php print COMPANY;?>">
                    </div>-->
                </li>

                <!-- THE SECOND SLIDE -->
                <li data-transition="papercut" data-slotamount="15" data-masterspeed="300" data-delay="15000">

                    <!-- THE MAIN IMAGE IN THE SECOND SLIDE -->
                    <img width='100%' src="<?php print base_url('assets/images/slider/revolution/bg2.png'); ?>">
					
					<div class="caption large_text sfb bg-black-opacity"
                         data-x="196"
                         data-y="12"
                         data-speed="500"
                         data-start="200"
                         data-easing="easeOutExpo">
                         We are in business since
                         <span style="color: #ffcc00;">2010</span>
                    </div>
					
					<div class="caption big_white lfl stl"
                         data-x="10"
                         data-y="140"
                         data-speed="500"
                         data-start="500"
                         data-easing="easeOutExpo" data-end="8500" data-endspeed="300" data-endeasing="easeInSine">
                         We clean and bathe patients or residents
                    </div>

                    <div class="caption big_white lfl stl"
                         data-x="10"
                         data-y="180"
                         data-speed="500"
                         data-start="1000"
                         data-easing="easeOutExpo" data-end="9500" data-endspeed="300" data-endeasing="easeInSine">
                        Turn, reposition and transfer patients between bed and wheelchairs
                    </div>

                    <div class="caption big_white lfl stl"
                         data-x="10"
                         data-y="220"
                         data-speed="500"
                         data-start="1500"
                         data-easing="easeOutExpo" data-end="10500" data-endspeed="300" data-endeasing="easeInSine">
                        Help patients use the toilet and dress
                    </div>

                    <div class="caption big_white lfl stl"
                         data-x="10"
                         data-y="260"
                         data-speed="500"
                         data-start="2000"
                         data-easing="easeOutExpo" data-end="11500" data-endspeed="300" data-endeasing="easeInSine">
                        Listen to and record patient's health concerns and report that information to nurses
                    </div>

                    <div class="caption big_white lfl stl"
                         data-x="10"
                         data-y="300"
                         data-speed="500"
                         data-start="2500"
                         data-easing="easeOutExpo" data-end="12500" data-endspeed="300" data-endeasing="easeInSine">
                        We serve meals and help patients eat
                    </div>

                    <div class="caption big_white lfl stl"
                         data-x="10"
                         data-y="340"
                         data-speed="500"
                         data-start="3000"
                         data-easing="easeOutExpo" data-end="13500" data-endspeed="300" data-endeasing="easeInSine">
                        Measure patient's vital signs, such as blood pressure and temperature
                    </div>

                    <!--

                    <div class="caption lft ltb"
                         data-x="600"
                         data-y="0"
                         data-speed="600"
                         data-start="1100"
                         data-easing="easeOutExpo" data-end="3100" data-endspeed="600" data-endeasing="easeInSine">
                        <img src="<?php print base_url('assets/images/slider/revolution/drink2.jpg'); ?>"
                             alt="Image 3">
                    </div>



                    <div class="caption lft ltb"
                         data-x="600"
                         data-y="0"
                         data-speed="600"
                         data-start="3600"
                         data-easing="easeOutExpo" data-end="5600" data-endspeed="600" data-endeasing="easeInSine">
                        <img src="<?php print base_url('assets/images/slider/revolution/drink1.jpg'); ?>"
                             alt="Image 6">
                    </div>

                    <div class="caption bold_brown_text sft stb"
                         data-x="760"
                         data-y="290"
                         data-speed="500"
                         data-start="3900"
                         data-easing="easeOutExpo" data-end="5800" data-endspeed="300" data-endeasing="easeInSine">
                         We serve meals and help patients eat
                    </div>

                    <div class="caption big_black sfb stb"
                         data-x="780"
                         data-y="320"
                         data-speed="500"
                         data-start="4200"
                         data-easing="easeOutExpo" data-end="5700" data-endspeed="300" data-endeasing="easeInSine">
                         Measure patient's vital signs, such as blood pressure and temperature
                    </div>

                    <div class="caption lft ltb"
                         data-x="600"
                         data-y="0"
                         data-speed="600"
                         data-start="6100"
                         data-easing="easeOutExpo" data-end="8100" data-endspeed="300" data-endeasing="easeInSine">
                        <img src="<?php print base_url('assets/images/slider/revolution/drink3.jpg'); ?>"
                             alt="Image 9">
                    </div>

                    <div class="caption bold_red_text sft stb"
                         data-x="760"
                         data-y="290"
                         data-speed="500"
                         data-start="6400"
                         data-easing="easeOutExpo" data-end="8300" data-endspeed="300" data-endeasing="easeInSine">
                        L'EAU DE CHLOE
                    </div>

                    <div class="caption big_black sfb stb"
                         data-x="780"
                         data-y="320"
                         data-speed="500"
                         data-start="6700"
                         data-easing="easeOutExpo" data-end="8200" data-endspeed="300" data-endeasing="easeInSine">
                        $ 142
                    </div>-->
                </li>

                
            </ul>

            <div class="tp-bannertimer tp-bottom"></div>
        </div>
    </div>
    <!--=== End Slider ===-->
    <?php
}
?>