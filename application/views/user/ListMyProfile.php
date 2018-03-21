<div class="container" >
    <div class="row" style="margin-top: 70px;">
        <div class="col-lg-12">

            <div class="tab-v1">

                <?php
                $employment=0;$probation=0;$statement=0;$equipment=0;$medical=0;$orientation=0;$tax=0;$inservice=0;$over=0;$emergency=0;

                if($session['rol']=='worker')
                {
                    if ($all_forms['error_code'] == '0')
                    {
                        foreach ($all_forms['data'] as $row)
                        {
                            if($row->form_name=='employment')$employment = 1;
                            if($row->form_name=='probation')$probation=1;
                            if($row->form_name=='statement')$statement=1;
                            if($row->form_name=='equipment')$equipment=1;
                            if($row->form_name=='medical')$medical=1;
                            if($row->form_name=='orientation')$orientation=1;
                            if($row->form_name=='tax')$tax=1;
                            if($row->form_name=='inservice')$inservice=1;
                            if($row->form_name=='over')$over=1;
                            if($row->form_name=='emergency')$emergency=1;
                        }
                    }
                }

                ?>

                <ul class="nav nav-tabs bordered" id="myTab1">
                    <li id="tab1" class="active"><a data-toggle="tab" href="#s1">Account</a></li>
                    <li id="tab2"><a data-toggle="tab" href="#s2">Profile</a></li>
                    <?php if($session['rol']=='worker'){?><li id="tab3" <?php if($employment==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s3">Employment</a></li><?php }?>
                    <?php if($session['rol']=='worker'){?><li id="tab4" <?php if($probation==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s4">Acknowledgment</a></li><?php }?>
                    <?php if($session['rol']=='worker'){?><li id="tab5" <?php if($statement==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s5">Statement</a></li><?php }?>
                    <?php if($session['rol']=='worker'){?><li id="tab6" <?php if($equipment==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s6">Equiment</a></li><?php }?>
                    <?php if($session['rol']=='worker'){?><li id="tab7" <?php if($medical==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s7">Medical</a></li><?php }?>
                    <?php if($session['rol']=='worker'){?><li id="tab8" <?php if($orientation==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s8">Orientation</a></li><?php }?>
                    <?php if($session['rol']=='worker'){?><li id="tab9" <?php if($tax==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s9">Tax Exempt</a></li><?php }?>
                    <?php if($session['rol']=='worker'){?><li id="tab10" <?php if($inservice==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s10">In Service</a></li><?php }?>
                    <?php if($session['rol']=='worker'){?><li id="tab11" <?php if($over==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s11">Over Time</a></li><?php }?>
                    <?php if($session['rol']=='worker'){?><li id="tab12" <?php if($emergency==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s12">Emergency</a></li><?php }?>
                    <?php if($session['rol']=='worker'){?><li id="tab12" <?php if($over==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s19">I9</a></li><?php }?>
                    <?php if($session['rol']=='worker'){?><li id="tab12" <?php if($over==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s20">W9</a></li><?php }?>
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
						
						
						
                        <div class="tab-pane fade" id="s19">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="myfieldset">
                                        <legend class="mylegend">I9</legend>

                                        <form class="sky-form" role='form' name='frm19' id='frm19' action="">
                                            <div id="data_i9"></div>
                                        </form>

                                    </fieldset>
                                </div>
                            </div>
                        </div> 
						
						<div class="tab-pane fade" id="s20">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="myfieldset">
                                        <legend class="mylegend">W9</legend>

                                        <form class="sky-form" role='form' name='frm20' id='frm20' action="">
                                            <div id="data_w9"></div>
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
        LoadDataAccount();

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
                    if('<?php echo $employment?>'==1)LoadDataEmployment(jQuery('#id_person').val());
                }
            });
        }

        function LoadDataEmployment(id_person='')
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_employment',view_url:'employee/InputsUpdateEmployment', id_person:id_person}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_employment').html(response);
                    LoadOther();
                }
            });
        }

        function LoadOther()
        {
            if('<?php echo $probation?>'==1)LoadDataProbation(jQuery('#id_employee').val());
            if('<?php echo $statement?>'==1)LoadDataStatement(jQuery('#id_employee').val());
            if('<?php echo $equipment?>'==1)LoadDataEquipment(jQuery('#id_employee').val());
            if('<?php echo $medical?>'==1)LoadDataMedical(jQuery('#id_employee').val());
            if('<?php echo $orientation?>'==1)LoadDataOrientation(jQuery('#id_employee').val());
            if('<?php echo $tax?>'==1)LoadDataTax(jQuery('#id_employee').val());
            if('<?php echo $inservice?>'==1)LoadDataInService(jQuery('#id_employee').val());
            if('<?php echo $over?>'==1)LoadDataOver(jQuery('#id_employee').val());
            if('<?php echo $emergency?>'==1)LoadDataEmergency(jQuery('#id_employee').val());


            if('<?php echo $over?>'==1)LoadDataW9(jQuery('#id_employee').val());
            if('<?php echo $over?>'==1)LoadDataI9(jQuery('#id_employee').val());
        }


        function LoadDataProbation(id_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_probation',view_url:'employee/InputsUpdateProbation', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_probation').html(response);
                }
            });
        }

        function LoadDataStatement(id_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_statement',view_url:'employee/InputsUpdateStatement', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_statement').html(response);
                }
            });
        }

        function LoadDataEquipment(id_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_equipment',view_url:'employee/InputsUpdateEquipment', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_equipment').html(response);
                }
            });
        }

        function LoadDataMedical(id_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_medical',view_url:'employee/InputsUpdateMedical', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_medical').html(response);
                }
            });
        }

        function LoadDataOrientation(id_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_orientation',view_url:'employee/InputsUpdateOrientation', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_orientation').html(response);
                }
            });
        }

        function LoadDataTax(id_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_tax',view_url:'employee/InputsUpdateTaxExemp', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_tax').html(response);
                }
            });
        }

        function LoadDataInService(id_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_inservice',view_url:'employee/InputsUpdateInService', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_inservice').html(response);
                }
            });
        }

        function LoadDataOver(id_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_over',view_url:'employee/InputsUpdateOverTime', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_over').html(response);
                }
            });
        }

        function LoadDataEmergency(id_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_emergency',view_url:'employee/InputsUpdateEmergencyNotification', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_emergency').html(response);
                }
            });
        }
		
		
		function LoadDataI9(id_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_i9',view_url:'employee/InputsUpdateI9', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_i9').html(response);
                }
            });
        }
		
		function LoadDataW9(id_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_w9',view_url:'employee/InputsUpdateW9', id_employee:id_employee}
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