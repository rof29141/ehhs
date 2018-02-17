<div class="container" >
    <div class="row" style="margin-top: 70px;">
        <div class="col-lg-12">

            <div class="tab-v1">

                <ul class="nav nav-tabs bordered" id="myTab1">
                    <li id="tab1" class="active"><a data-toggle="tab" href="#s1">Account</a></li>
                    <li id="tab2"><a data-toggle="tab" href="#s2">Profile</a></li>
                    <?php if($session['rol']=='worker'){?><li id="tab3" style="display: none;"><a data-toggle="tab" href="#s3">Empployment</a></li><?php }?>
                    <?php if($session['rol']=='worker'){?><li id="tab4" style="display: none;"><a data-toggle="tab" href="#s4">Acknowledgment</a></li><?php }?>
                    <?php if($session['rol']=='worker'){?><li id="tab5" style="display: none;"><a data-toggle="tab" href="#s5">Statement</a></li><?php }?>
                    <?php if($session['rol']=='worker'){?><li id="tab6" style="display: none;"><a data-toggle="tab" href="#s6">Equiment</a></li><?php }?>
                    <?php if($session['rol']=='worker'){?><li id="tab7" style="display: none;"><a data-toggle="tab" href="#s7">Medical</a></li><?php }?>
                    <?php if($session['rol']=='worker'){?><li id="tab8" style="display: none;"><a data-toggle="tab" href="#s8">Orientation</a></li><?php }?>
                    <?php if($session['rol']=='worker'){?><li id="tab9" style="display: none;"><a data-toggle="tab" href="#s9">Tax Exempt</a></li><?php }?>
                    <?php if($session['rol']=='worker'){?><li id="tab10" style="display: none;"><a data-toggle="tab" href="#s10">In Service</a></li><?php }?>
                    <?php if($session['rol']=='worker'){?><li id="tab11" style="display: none;"><a data-toggle="tab" href="#s11">Over Time</a></li><?php }?>
                    <?php if($session['rol']=='worker'){?><li id="tab12" style="display: none;"><a data-toggle="tab" href="#s12">Emergency</a></li><?php }?>
                </ul>

                <div class="tab-content" id="myTabContent1">

                    <div class="tab-pane active" id="s1">
                        <div class="row">

                            <div class="col-lg-6 col-lg-offset-3">
                                <fieldset class="myfieldset">
                                    <legend class="mylegend">Security Information</legend>

									<form class='sky-form validatable' role='form' name='frm' id='frm' action="">
										<div id="data_account"></div>
									</form>

                                </fieldset>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="s2">
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3">
                                <fieldset class="myfieldset">
                                    <legend class="mylegend">Personal Information</legend>

									<form class="sky-form" role='form' name='frm1' id='frm1' action="">
										<div id="data_profile"></div>
									</form>

                                </fieldset>
                            </div>
                        </div>
                    </div>
					
					<?php if($session['rol']=='worker')
					{
					    ?>
					
                        <div class="tab-pane fade" id="s3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="myfieldset">
                                        <legend class="mylegend">Consent</legend>

                                        <form class="sky-form" role='form' name='frm3' id='frm3' action="">
                                            <div id="data_employment"></div>
                                        </form>

                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="s4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="myfieldset">
                                        <legend class="mylegend">Consent</legend>

                                        <form class="sky-form" role='form' name='frm4' id='frm4' action="">
                                            <div id="data_probation"></div>
                                        </form>

                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="s5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="myfieldset">
                                        <legend class="mylegend">Consent</legend>

                                        <form class="sky-form" role='form' name='frm5' id='frm5' action="">
                                            <div id="data_statement"></div>
                                        </form>

                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="s6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="myfieldset">
                                        <legend class="mylegend">Consent</legend>

                                        <form class="sky-form" role='form' name='frm6' id='frm6' action="">
                                            <div id="data_equipment"></div>
                                        </form>

                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="s7">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="myfieldset">
                                        <legend class="mylegend">Consent</legend>

                                        <form class="sky-form" role='form' name='frm7' id='frm7' action="">
                                            <div id="data_medical"></div>
                                        </form>

                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="s8">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="myfieldset">
                                        <legend class="mylegend">Consent</legend>

                                        <form class="sky-form" role='form' name='frm8' id='frm8' action="">
                                            <div id="data_orientation"></div>
                                        </form>

                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="s9">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="myfieldset">
                                        <legend class="mylegend">Consent</legend>

                                        <form class="sky-form" role='form' name='frm9' id='frm9' action="">
                                            <div id="data_tax"></div>
                                        </form>

                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="s10">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="myfieldset">
                                        <legend class="mylegend">Consent</legend>

                                        <form class="sky-form" role='form' name='frm10' id='frm10' action="">
                                            <div id="data_inservice"></div>
                                        </form>

                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="s11">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="myfieldset">
                                        <legend class="mylegend">Consent</legend>

                                        <form class="sky-form" role='form' name='frm11' id='frm11' action="">
                                            <div id="data_over"></div>
                                        </form>

                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="s12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="myfieldset">
                                        <legend class="mylegend">Consent</legend>

                                        <form class="sky-form" role='form' name='frm12' id='frm12' action="">
                                            <div id="data_emergency"></div>
                                        </form>

                                    </fieldset>
                                </div>
                            </div>
                        </div>
					
					<?php
					}
					?>
					
                </div>

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">

    jQuery(document).ready(function()
    {
        Load();

        function Load()
        {
            LoadDataAccount();
        }

        function LoadDataAccount()
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_account',view_url:'user/InputsUpdateAccount'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_account').html(response);
					LoadDataProfile();
                    spinner.stop();
                }
            });
        }
		
		function LoadDataProfile()
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_profile',view_url:'user/InputsUpdateProfile'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_profile').html(response);
                }
            });
        }
		
		function LoadDataEmployment()
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_employment',view_url:'employee/InputsUpdateEmployment'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_employment').html(response);
                    LoadDataProbation();
                }
            });
        }
		
		function LoadDataProbation()
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_probation',view_url:'employee/InputsUpdateProbation'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_probation').html(response);
					LoadDataStatement();
                }
            });
        }
		
		function LoadDataStatement()
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_statement',view_url:'employee/InputsUpdateStatement'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_statement').html(response);
					LoadDataEquipment();
                }
            });
        }
		
		function LoadDataEquipment()
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_equipment',view_url:'employee/InputsUpdateEquipment'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_equipment').html(response);
					LoadDataMedical();
                }
            });
        }
		
		function LoadDataMedical()
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_medical',view_url:'employee/InputsUpdateMedical'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_medical').html(response);
					LoadDataOrientation();
                }
            });
        }
		
		function LoadDataOrientation()
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_orientation',view_url:'employee/InputsUpdateOrientation'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_orientation').html(response);
					LoadDataTax();
                }
            });
        }
		
		function LoadDataTax()
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_tax',view_url:'employee/InputsUpdateTaxExemp'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_tax').html(response);
					LoadDataInService();
                }
            });
        }
		
		function LoadDataInService()
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_inservice',view_url:'employee/InputsUpdateInService'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_inservice').html(response);
					LoadDataOver();
                }
            });
        }
		
		function LoadDataOver()
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_over',view_url:'employee/InputsUpdateOverTime'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_over').html(response);
					LoadDataEmergency();
                }
            });
        }
		
		function LoadDataEmergency()
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_emergency',view_url:'employee/InputsUpdateEmergencyNotification'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_emergency').html(response);
                }
            });
        }
    });

</script>