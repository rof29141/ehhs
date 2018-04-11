<!--=== Content Part ===-->
<div class="container content">
    <div class="clearfix margin-bottom-30"></div>
    <div class="shadow-wrapper">
        <div class="tag-box tag-box-v1 box-shadow shadow-effect-2">
            <p style="text-align:justify">Esperanza Home Health Services, Inc Agency is committed to providing a level of quality care that encourages the safe and cost-effective delivery of home health services maximizing patient autonomy, and coordination of community and Agency resources, to decrease illness burden and unnecessary duplication of services, thereby promoting positive patient outcomes.</p>
        </div>
    </div>

    <div class="clearfix margin-bottom-20"></div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" style="padding: 0px;">
        <?php //if($section_left_auth!='')require_once APPPATH.'views'.$section_left_auth;


        $fill_profile='';$badge='';//var_dump($session['no_filled']);

        if(isset($session['no_filled']) && $session['no_filled']!='' && array_key_exists("NO_FILLED_PERSON", $session['no_filled']) && isset($profile_type['percent']))
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

        $total_pending_care=0;
        $total_pending_employee=0;
        $total_available_care=0;

        if(isset($session['rol']) && $session['rol']=='asist')
        {
            if($pending_care['error_code']=='0')$total_pending_care=sizeof($pending_care['data']);
            if($pending_employee['error_code']=='0')$total_pending_employee=sizeof($pending_employee['data']);
            if($available_care['error_code']=='0')$total_available_care=sizeof($available_care['data']);
            ?>
            <a onclick="LoadContent('Main/GoView/care-ListCare');">
                <div class="col-sm-4" style="margin-bottom: 10px;">
                    <div class="servive-block servive-block-default" style="height: 150px;">
                        <span class="badge badge-red" style="font-size: 35px; width: 75px;padding-top: 20px;padding-bottom: 20px;border-radius: 50% !important;">
                            <div class="count">
                                <?php print $total_pending_care;?>
                            </div>
                        </span>
                        <h3 class="heading-md" style="margin-top: 20px;margin-left: -10px;margin-right: -10px;">Pending Cares Schedule</h3>
                    </div>
                </div>
            </a>

            <a onclick="LoadContent('Main/GoView/employee-ListEmployee');">
                <div class="col-sm-4" style="margin-bottom: 10px;">
                    <div class="servive-block servive-block-default" style="height: 150px;">
                        <span class="badge badge-red" style="font-size: 35px; width: 75px;padding-top: 20px;padding-bottom: 20px;border-radius: 50% !important;">
                            <div class="count">
                                <?php print $total_pending_employee;?>
                            </div>
                        </span>
                        <h3 class="heading-md" style="margin-top: 20px;margin-left: -10px;margin-right: -10px;">Pending Employees</h3>
                    </div>
                </div>
            </a>

            <a onclick="LoadContent('Main/GoView/job-ListJob');">
                <div class="col-sm-4" style="margin-bottom: 10px;">
                    <div class="servive-block servive-block-default" style="height: 150px;">
                        <span class="badge badge-green" style="font-size: 35px; width: 75px;padding-top: 20px;padding-bottom: 20px;border-radius: 50% !important;">
                            <div class="count">
                                <?php print $total_available_care;?>
                            </div>
                        </span>
                        <h3 class="heading-md" style="margin-top: 20px;margin-left: -10px;margin-right: -10px;">Available Jobs</h3>
                    </div>
                </div>
            </a>
            <?php
        }
        elseif (isset($session['rol']) && $session['rol']=='worker')
        {
            if($available_care['error_code']=='0')$total_available_care=sizeof($available_care['data']);
            ?>

            <a onclick="LoadContent('Main/GoView/job-ListJob');">
                <div class="col-sm-4" style="margin-bottom: 10px;">
                    <div class="servive-block servive-block-default" style="height: 150px;">
                        <span class="badge badge-green" style="font-size: 35px; width: 75px;padding-top: 20px;padding-bottom: 20px;border-radius: 50% !important;">
                            <div class="count">
                                <?php print $total_available_care;?>
                            </div>
                        </span>
                        <h3 class="heading-md" style="margin-top: 20px;margin-left: -10px;margin-right: -10px;">Available Jobs</h3>
                    </div>
                </div>
            </a>

            <?php
            if($badge!='')
            {
                ?>

                <a onclick="LoadContent('User');">
                    <div class="col-sm-4" style="margin-bottom: 10px;">
                        <div class="servive-block servive-block-default" style="height: 150px;">
                        <i class="fa fa-exclamation-triangle" style="color:red;font-size: 72px;"></i>
                        <h3 class="heading-md" style="margin-top: 20px;margin-left: -20px;margin-right: -20px;">Account completed at <?php print $badge; ?></h3>
                        </div>
                    </div>
                </a>

                <?php
            }
            else
            {
                ?>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin-bottom: 10px;">
                    <iframe width="100%" height="150" src="https://www.youtube.com/embed/fjzxxhc1Agw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>

                <?php
            }

            $total_available_care=0;
            if($available_care['error_code']=='0')$total_available_care=sizeof($available_care['data']);

            ?>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin-bottom: 10px;">
                <iframe width="100%" height="150" src="https://www.youtube.com/embed/6nzlvShs2Oc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>

            <?php
        }
        elseif (isset($session['rol']) && $session['rol']=='')
        {
            ?>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin-bottom: 10px;text-align: left;margin-top: -10px;" id="div_auth">
                <?php
                if ($session['section_auth'] != '')
                    require_once APPPATH . 'views' . $session['section_auth'];
                ?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin-bottom: 10px;">
                <iframe width="100%" height="150" src="https://www.youtube.com/embed/fjzxxhc1Agw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin-bottom: 10px;">
                <iframe width="100%" height="150" src="https://www.youtube.com/embed/6nzlvShs2Oc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>

            <?php
        }
        elseif(isset($section_auth) && $section_auth!='')
        {
            ?>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin-bottom: 10px;text-align: left;margin-top: -5px;" id="div_auth">
                <?php
                //print $section_auth;
                require_once APPPATH . 'views' . $section_auth;
                ?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin-bottom: 10px;">
                <iframe width="100%" height="150" src="https://www.youtube.com/embed/fjzxxhc1Agw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin-bottom: 10px;">
                <iframe width="100%" height="150" src="https://www.youtube.com/embed/6nzlvShs2Oc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>

            <?php
        }
        ?>
    </div>


</div>

<script type="text/javascript">
    jQuery(document).ready(function()
    {
        jQuery('.count').each(function ()
        {
            //if(jQuery(this).text()>0)
            //{
                jQuery(this).prop('Counter', 0).animate({
                    Counter: jQuery(this).text()
                }, {
                    duration: 3000,
                    easing: 'swing',
                    step: function (now) {
                        jQuery(this).text(Math.ceil(now));
                    }
                });
            //}
        });
    });
</script>