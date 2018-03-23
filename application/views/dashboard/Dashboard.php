
<!--=== Content Part ===-->
<div class="container content">
    <div class="clearfix margin-bottom-30"></div>
    <div class="shadow-wrapper">
        <div class="tag-box tag-box-v1 box-shadow shadow-effect-2">
            <p style="text-align:justify">Esperanza Home Health Services, Inc Agency is committed to providing a level of quality care that encourages the safe and cost-effective delivery of home health services maximizing patient autonomy, and coordination of community and Agency resources, to decrease illness burden and unnecessary duplication of services, thereby promoting positive patient outcomes.</p>
        </div>
    </div>

    <div class="clearfix margin-bottom-40"></div>

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 text-center">
        <?php //if($section_left_auth!='')require_once APPPATH.'views'.$section_left_auth;


        $fill_profile='';$badge='';//var_dump($session['no_filled']);

        if($session['no_filled']!='' && array_key_exists("NO_FILLED_PERSON", $session['no_filled']) && isset($profile_type['percent']))
            $fill_profile = '<i class="fa fa-exclamation-triangle" style="color:white;"></i>';
        elseif(isset($session['no_filled']) && array_key_exists("NO_FILLED_PERSON", $session['no_filled']) && !isset($profile_type['percent']))
            $fill_profile = "<i class='fa fa-exclamation-triangle' style='color:red;'></i> Dear user, your profile is not completed yet,<br> please click in <a onclick='LoadContent(\"User\");'>MY ACCOUNT</a> to complete it.";

        if(isset($profile_type['percent']) && $profile_type['percent']==100)
        {
            $badge = '<span class="badge badge-green rounded-2x">100%</span>';
        }
        elseif(isset($profile_type['percent']) && $profile_type['percent']>=0)
        {
            $badge = '<span class="badge badge-red rounded-2x">'.$fill_profile.' '.$profile_type['percent'] . '%</span>';
        }
        elseif(!isset($profile_type['percent']))
        {
            $badge = $fill_profile;
        }

        print '<h4>'.$badge.'</h4>';

        if($badge=='' && $session['rol']=='patient')

        ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" id="div_auth">
        <?php if($session['section_auth']!='')require_once APPPATH.'views'.$session['section_auth'];?>
    </div>

    <!-- Service Blocks
    <div class="margin-bottom-5"></div>
    <div class="row margin-bottom-40">

        <div class="col-md-3 col-sm-6">
            <div class="servive-block servive-block-blue rounded">
                <i class="icon-custom icon-color-light rounded-x icon-line icon-diamond"></i>
                <h2 class="heading-md">Blue Box</h2>
                <p>Donec id elit non mi porta gravida at eget metus id elit mi egetine usce dapibus elit nondapibus</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="servive-block servive-block-default">
                <i class="icon-custom rounded-x icon-bg-dark fa fa-compress"></i>
                <h2 class="heading-md">Fully Responsive</h2>
                <p>Donec id elit non mi porta gravida at eget metus id elit mi egetine. Fusce dapibus</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="servive-block servive-block-default">
                <i class="icon-custom rounded-x icon-bg-dark icon-line icon-rocket"></i>
                <h2 class="heading-md">Launch Ready</h2>
                <p>Donec id elit non mi porta gravida at eget metus id elit mi egetine. Fusce dapibus</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="servive-block servive-block-default">
                <i class="icon-custom rounded-x icon-bg-dark icon-line icon-support"></i>
                <h2 class="heading-md">Dedicated Support</h2>
                <p>Donec id elit non mi porta gravida at eget metus id elit mi egetine usce dapibus elit nondapibus</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="servive-block servive-block-default">
                <i class="icon-custom rounded-x icon-bg-dark fa fa-lightbulb-o"></i>
                <h2 class="heading-md">Creative Ideas</h2>
                <p>Donec id elit non mi porta gravida at eget metus id elit mi egetine. Fusce dapibus</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="servive-block servive-block-default">
                <i class="icon-custom rounded-x icon-bg-dark fa fa-compress"></i>
                <h2 class="heading-md">Fully Responsive</h2>
                <p>Donec id elit non mi porta gravida at eget metus id elit mi egetine. Fusce dapibus</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="servive-block servive-block-default">
                <i class="icon-custom rounded-x icon-bg-dark icon-line icon-rocket"></i>
                <h2 class="heading-md">Launch Ready</h2>
                <p>Donec id elit non mi porta gravida at eget metus id elit mi egetine. Fusce dapibus</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="servive-block servive-block-default">
                <i class="icon-custom rounded-x icon-bg-dark icon-line icon-support"></i>
                <h2 class="heading-md">Dedicated Support</h2>
                <p>Donec id elit non mi porta gravida at eget metus id elit mi egetine usce dapibus elit nondapibus</p>
            </div>
        </div>
    </div>
     End Service Blokcs -->
</div>




    <!-- End Info Blokcs -->

<!--/container-->
<!-- End Content Part -->


<script type="text/javascript">
    
	alertify.defaults.transition = "zoom";

	var msg = '<?php if(isset($msg))print $msg;?>';
	if (msg != '' && msg != null) alertify.message(msg);

	var success = '<?php if(isset($success))print $success;?>';
	if (success != '' && success != null) alertify.success(success);

	var warning = '<?php if(isset($warning))print $warning;?>';
	if (warning != '' && warning != null) alertify.alert(warning);

	var error = '<?php if(isset($error))print $error;?>';
	if (error != '' && error != null) alertify.error(error);
    
</script>