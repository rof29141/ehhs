<div class="container" >
    <div class="row" style="margin-top: 70px;">
        <div class="col-lg-12">

            <div class="tab-v1">

                <?php
                $employment=0;$probation=0;$statement=0;$equipment=0;$medical=0;$orientation=0;$tax=0;$inservice=0;$over=0;$emergency=0;
				$confidentiality=0;$agreement=0;$affidavit=0;$comunicado=0;$references=0;$quiz=0;$i9=0;$w9=0;$upload=0;
				$prefered=0;

                if(isset($role['data']->rol))
                    $role=$role['data']->rol;

                //echo $role;

                if(isset($role) && $role=='worker')
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
                            if($row->form_name=='confidentiality')$confidentiality=1;
                            if($row->form_name=='agreement')$agreement=1;
                            if($row->form_name=='affidavit')$affidavit=1;
                            if($row->form_name=='comunicado')$comunicado=1;
                            if($row->form_name=='references')$references=1;
                            if($row->form_name=='quiz')$quiz=1;
                            if($row->form_name=='i9')$i9=1;
                            if($row->form_name=='w9')$w9=1;
                            if($row->form_name=='upload')$upload=1;
                        }
                    }
                }
                elseif (isset($role) && $role=='patient')
                {
                    if (isset($client) && $client['error_code'] == '0')
                    {
                        if($client['data'][0]->id_client!='')$prefered = 1;//echo $client['data'][0]->id_client;
                    }
                }

                ?>

                <ul class="nav nav-tabs bordered" id="myTab1">
                    <li id="tab1" class="active"><a data-toggle="tab" href="#s1">Account</a></li>
                    <li id="tab2" <?php if(!isset($id_user)){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s2">Personal</a></li>
                    <?php if(isset($role) && $role=='worker'){?><li id="tab3" <?php if($employment==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s3">Employment</a></li><?php }?>
                    <?php if(isset($role) && $role=='worker'){?><li id="tab4" <?php if($probation==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s4">Acknowledgment</a></li><?php }?>
                    <?php if(isset($role) && $role=='worker'){?><li id="tab5" <?php if($statement==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s5">Statement</a></li><?php }?>
                    <?php if(isset($role) && $role=='worker'){?><li id="tab6" <?php if($equipment==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s6">Equiment</a></li><?php }?>
                    <?php if(isset($role) && $role=='worker'){?><li id="tab7" <?php if($medical==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s7">Medical</a></li><?php }?>
                    <?php if(isset($role) && $role=='worker'){?><li id="tab8" <?php if($orientation==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s8">Orientation</a></li><?php }?>
                    <?php if(isset($role) && $role=='worker'){?><li id="tab9" <?php if($tax==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s9">Tax Exempt</a></li><?php }?>
                    <?php if(isset($role) && $role=='worker'){?><li id="tab10" <?php if($inservice==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s10">In Service</a></li><?php }?>
                    <?php if(isset($role) && $role=='worker'){?><li id="tab11" <?php if($over==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s11">Over Time</a></li><?php }?>
                    <?php if(isset($role) && $role=='worker'){?><li id="tab12" <?php if($emergency==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s12">Emergency</a></li><?php }?>
                    <?php if(isset($role) && $role=='worker'){?><li id="tab13" <?php if($confidentiality==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s13">Confidentiality</a></li><?php }?>
                    <?php if(isset($role) && $role=='worker'){?><li id="tab14" <?php if($agreement==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s14">Agreement</a></li><?php }?>
                    <?php if(isset($role) && $role=='worker'){?><li id="tab15" <?php if($affidavit==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s15">Affidavit</a></li><?php }?>
                    <?php if(isset($role) && $role=='worker'){?><li id="tab16" <?php if($comunicado==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s16">Comunicado</a></li><?php }?>
                    <?php if(isset($role) && $role=='worker'){?><li id="tab17" <?php if($references==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s17">References</a></li><?php }?>
                    <?php if(isset($role) && $role=='worker'){?><li id="tab18" <?php if($quiz==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s17">Quiz</a></li><?php }?>
                    <?php if(isset($role) && $role=='worker'){?><li id="tab19" <?php if($i9==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s19">I9</a></li><?php }?>
                    <?php if(isset($role) && $role=='worker'){?><li id="tab20" <?php if($w9==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s20">W9</a></li><?php }?>
                    <?php if(isset($role) && $role=='worker'){?><li id="tab21" <?php if($upload==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s21">Upload</a></li><?php }?>

                    <?php if(isset($role) && $role=='patient'){?><li id="tab100" <?php if($prefered==0){?>style="display: none;" <?php }?>><a data-toggle="tab" href="#s100">Preferences</a></li><?php }?>
                </ul>

                <div class="tab-content" id="myTabContent1">

                    <div class="tab-pane active" id="s1">
                        <div class="row">

                            <div class="col-lg-6 col-lg-offset-3">
                                <fieldset class="myfieldset">
                                    <legend class="mylegend">Security Information</legend>

                                    <form class='sky-form validatable' role='form' name='frm' id='frm' action="">
                                        <div class="col-sm-12 text-right">
                                            <span id="account" class="fa fa-print"></span>
                                        </div>
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
                                        <div class="col-sm-12 text-right">
                                            <span id="profile" class="fa fa-print"></span>
                                        </div>
                                        <div id="data_profile"></div>
                                    </form>

                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <?php if(isset($role) && $role=='worker')
                    {
                        ?>

                        <div class="tab-pane fade" id="s3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="myfieldset">
                                        <legend class="mylegend">Consent</legend>

                                        <form class="sky-form" role='form' name='frm3' id='frm3' action="">
                                            <div class="col-sm-12 text-right">
                                                <span id="employment" class="fa fa-print"></span>
                                            </div>
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
                                            <div class="col-sm-12 text-right">
                                                <span id="probation" class="fa fa-print"></span>
                                            </div>
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
                                            <div class="col-sm-12 text-right">
                                                <span id="statement" class="fa fa-print"></span>
                                            </div>
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
                                            <div class="col-sm-12 text-right">
                                                <span id="equipment" class="fa fa-print"></span>
                                            </div>
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
                                            <div class="col-sm-12 text-right">
                                                <span id="medical" class="fa fa-print"></span>
                                            </div>
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
                                            <div class="col-sm-12 text-right">
                                                <span id="orientation" class="fa fa-print"></span>
                                            </div>
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
                                            <div class="col-sm-12 text-right">
                                                <span id="tax" class="fa fa-print"></span>
                                            </div>
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
                                            <div class="col-sm-12 text-right">
                                                <span id="inservice" class="fa fa-print"></span>
                                            </div>
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
                                            <div class="col-sm-12 text-right">
                                                <span id="over" class="fa fa-print"></span>
                                            </div>
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
                                            <div class="col-sm-12 text-right">
                                                <span id="emergency" class="fa fa-print"></span>
                                            </div>
                                            <div id="data_emergency"></div>
                                        </form>

                                    </fieldset>
                                </div>
                            </div>
                        </div>
						
						<div class="tab-pane fade" id="s13">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="myfieldset">
                                        <legend class="mylegend">Consent</legend>

                                        <form class="sky-form" role='form' name='frm13' id='frm13' action="">
                                            <div class="col-sm-12 text-right">
                                                <span id="confidentiality" class="fa fa-print"></span>
                                            </div>
                                            <div id="data_confidentiality"></div>
                                        </form>

                                    </fieldset>
                                </div>
                            </div>
                        </div>
						
						<div class="tab-pane fade" id="s14">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="myfieldset">
                                        <legend class="mylegend">Consent</legend>

                                        <form class="sky-form" role='form' name='frm14' id='frm14' action="">
                                            <div class="col-sm-12 text-right">
                                                <span id="agreement" class="fa fa-print"></span>
                                            </div>
                                            <div id="data_agreement"></div>
                                        </form>

                                    </fieldset>
                                </div>
                            </div>
                        </div>
						
						<div class="tab-pane fade" id="s15">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="myfieldset">
                                        <legend class="mylegend">Consent</legend>

                                        <form class="sky-form" role='form' name='frm15' id='frm15' action="">
                                            <div class="col-sm-12 text-right">
                                                <span id="affidavit" class="fa fa-print"></span>
                                            </div>
                                            <div id="data_affidavit"></div>
                                        </form>

                                    </fieldset>
                                </div>
                            </div>
                        </div>
						
						<div class="tab-pane fade" id="s16">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="myfieldset">
                                        <legend class="mylegend">Consent</legend>

                                        <form class="sky-form" role='form' name='frm16' id='frm16' action="">
                                            <div class="col-sm-12 text-right">
                                                <span id="comunicado" class="fa fa-print"></span>
                                            </div>
                                            <div id="data_comunicado"></div>
                                        </form>

                                    </fieldset>
                                </div>
                            </div>
                        </div>
						
						<div class="tab-pane fade" id="s17">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="myfieldset">
                                        <legend class="mylegend">Consent</legend>

                                        <form class="sky-form" role='form' name='frm17' id='frm17' action="">
                                            <div class="col-sm-12 text-right">
                                                <span id="references" class="fa fa-print"></span>
                                            </div>
                                            <div id="data_references"></div>
                                        </form>

                                    </fieldset>
                                </div>
                            </div>
                        </div>
						
						<div class="tab-pane fade" id="s18">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="myfieldset">
                                        <legend class="mylegend">Consent</legend>

                                        <form class="sky-form" role='form' name='frm18' id='frm18' action="">
                                            <div class="col-sm-12 text-right">
                                                <span id="quiz" class="fa fa-print"></span>
                                            </div>
                                            <div id="data_quiz"></div>
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
                                            <div class="col-sm-12 text-right">
                                                <span id="i9" class="fa fa-print"></span>
                                            </div>
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
                                            <div class="col-sm-12 text-right">
                                                <span id="w9" class="fa fa-print"></span>
                                            </div>
                                            <div id="data_w9"></div>
                                        </form>

                                    </fieldset>
                                </div>
                            </div>
                        </div> 
						
						<div class="tab-pane fade" id="s21">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="myfieldset">
                                        <legend class="mylegend">Upload</legend>

                                        <form class="sky-form" role='form' name='frm21' id='frm21' action="">
                                            <div class="col-sm-12 text-right">
                                                <span id="upload" class="fa fa-print"></span>
                                            </div>
                                            <div id="data_upload"></div>
                                        </form>

                                    </fieldset>
                                </div>
                            </div>
                        </div> 

                        <?php
                    }
                    ?>

                    <?php if(isset($role) && $role=='patient')
                    {
                        ?>

                        <div class="tab-pane fade" id="s100">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="myfieldset">
                                        <legend class="mylegend">Client Information</legend>

                                        <form class="sky-form" role='form' name='frm3' id='frm3' action="">
                                            <div id="data_client_preference"></div>
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

        jQuery('.fa-print').on('click', function ()
        {
            var html='';
            var id='data_'+jQuery(this).attr('id');//alert(id);

            if(id=='data_account')html=jQuery('#s1').html();
            if(id=='data_profile')html=jQuery('#s2').html();
            if(id=='data_employment')html=jQuery('#s3').html();
            if(id=='data_probation')html=jQuery('#s4').html();
            if(id=='data_statement')html=jQuery('#s5').html();
            if(id=='data_equipment')html=jQuery('#s6').html();
            if(id=='data_medical')html=jQuery('#s7').html();
            if(id=='data_orientation')html=jQuery('#s8').html();
            if(id=='data_tax')html=jQuery('#s9').html();
            if(id=='data_inservice')html=jQuery('#s10').html();
            if(id=='data_over')html=jQuery('#s11').html();
            if(id=='data_emergency')html=jQuery('#s12').html();
            if(id=='data_confidentiality')html=jQuery('#s13').html();
            if(id=='data_agreement')html=jQuery('#s14').html();
            if(id=='data_affidavit')html=jQuery('#s15').html();
            if(id=='data_comunicado')html=jQuery('#s16').html();
            if(id=='data_references')html=jQuery('#s17').html();
            if(id=='data_quiz')html=jQuery('#s18').html();
            if(id=='data_i9')html=jQuery('#s19').html();
            if(id=='data_w9')html=jQuery('#s20').html();
            if(id=='data_upload')html=jQuery('#s21').html();

            var myWindow = window.open("<?php print base_url('PrintView');?>", "_blank", '');
            myWindow.onload = function(){
                myWindow.init(html);
            }
        });

        LoadDataAccount();

        function LoadDataAccount()
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            var view_url='user/InputsUpdateAccount';

            if('<?php if(isset($id_user))print $id_user;?>'=='')
            var view_url='user/InputsInsertAccount';

            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_account',view_url:view_url,id_user:"<?php if(isset($id_user))print $id_user;?>",role:"<?php if(isset($role))print $role;?>"}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_account').html(response);
                    if('<?php if(isset($id_user)) echo $id_user?>'!='')LoadDataProfile();
                    spinner.stop();
                }
            });
        }

        function LoadDataProfile()
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_profile',view_url:'user/InputsUpdateProfile',id_user:"<?php if(isset($id_user))print $id_user;?>",role:"<?php if(isset($role))print $role;?>"}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_profile').html(response);
                    if('<?php echo $employment?>'==1)LoadDataEmployment(jQuery('#id_person').val());
                    else if('<?php echo $prefered?>'==1)LoadDataClientPreference(jQuery('#id_person').val());
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
            //---------------------WORKER--------------------
            if('<?php echo $probation?>'==1)LoadDataProbation(jQuery('#id_employee').val());
            if('<?php echo $statement?>'==1)LoadDataStatement(jQuery('#id_employee').val());
            if('<?php echo $equipment?>'==1)LoadDataEquipment(jQuery('#id_employee').val());
            if('<?php echo $medical?>'==1)LoadDataMedical(jQuery('#id_employee').val());
            if('<?php echo $orientation?>'==1)LoadDataOrientation(jQuery('#id_employee').val());
            if('<?php echo $tax?>'==1)LoadDataTax(jQuery('#id_employee').val());
            if('<?php echo $inservice?>'==1)LoadDataInService(jQuery('#id_employee').val());
            if('<?php echo $over?>'==1)LoadDataOver(jQuery('#id_employee').val());
            if('<?php echo $emergency?>'==1)LoadDataEmergency(jQuery('#id_employee').val());
            if('<?php echo $confidentiality?>'==1)LoadDataConfidentiality(jQuery('#id_employee').val());
            if('<?php echo $agreement?>'==1)LoadDataAgreement(jQuery('#id_employee').val());
            if('<?php echo $affidavit?>'==1)LoadDataAffidavit(jQuery('#id_employee').val());
            if('<?php echo $comunicado?>'==1)LoadDataComunicado(jQuery('#id_employee').val());
            if('<?php echo $references?>'==1)LoadDataReferences(jQuery('#id_employee').val());
            if('<?php echo $quiz?>'==1)LoadDataQuiz(jQuery('#id_employee').val());
            if('<?php echo $i9?>'==1)LoadDataW9(jQuery('#id_employee').val());
            if('<?php echo $w9?>'==1)LoadDataI9(jQuery('#id_employee').val());
            if('<?php echo $upload?>'==1)LoadDataUpload(jQuery('#id_employee').val());
            //---------------------WORKER--------------------
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
		
		function LoadDataConfidentiality(id_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_confidentiality',view_url:'employee/InputsUpdateConfidentiality', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_confidentiality').html(response);
                }
            });
        }
		
		function LoadDataAgreement(id_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_agreement',view_url:'employee/InputsUpdateAgreement', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_agreement').html(response);
                }
            });
        }
		
		function LoadDataAffidavit(id_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_affidavit',view_url:'employee/InputsUpdateAffidavit', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_affidavit').html(response);
                }
            });
        }
		
		function LoadDataComunicado(id_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_comunicado',view_url:'employee/InputsUpdateComunicado', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_comunicado').html(response);
                }
            });
        }
		
		function LoadDataReferences(id_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_references',view_url:'employee/InputsUpdateReferences', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_references').html(response);
                }
            });
        }
		
		function LoadDataQuiz(id_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_quiz',view_url:'employee/InputsUpdateQuiz', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_quiz').html(response);
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
                    jQuery('#data_w9').html(response);
                }
            });
        }
		
		function LoadDataUpload(id_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_upload',view_url:'employee/InputsUpdateUpload', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_upload').html(response);
                }
            });
        }



        function LoadDataClientPreference(id_person='')
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_client_preference',view_url:'client/InputsUpdatePreference', id_person:id_person}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_client_preference').html(response);
                }
            });
        }

    });

</script>