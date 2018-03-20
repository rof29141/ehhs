
	<div class="col-sm-12">
		<fieldset class="myfieldset">
            <?php $lg='Hepatitis B declaration';?>
            <legend class="mylegend" id="medical_lg1"><?php print $lg;?></legend>

			<div style='text-align:justify;'>
				<p>Hepatitis B is a major infectious occupational health hazard in the Health Care industry. The critical risk for health personnel is contact with blood and other body fluids. Persons previously infected with hepatitis B virus are immune to the disease, for persons who have not had the disease ,for persons who have not had the disease, Hepatitis B it vaccine will provide immunity. The vaccine is given in three separate does and failure to receive all doses may cause the vaccine to be ineffective and not results in immunity. Clinical studies have shown that 85 to 96 percent of those vaccinate evidence immunity. Periodic testing of vaccinated persons for antibody to Hepatitis B will confirm immune status.</p>
				<p>I understand that due to my risk or occupational exposure to blood or other potentially infectious material may be at risk of acquiring Hepatitis B virus (HBV) infections, I have been given the opportunity to be vaccinated with Hepatitis B vaccine , at no charge to my self.</p>
				<p>I have read the above information and have received verbal and written instructions regarding the efficacy , risk and complications of receiving the vaccine. Any questions i had have been answered. I acknowledge that i am aware of tine availability of tine Hepatitis B vaccine and the benefit that such vaccination provides in the prevention of infection  with Hepatitis B virus.</p>


                <?php
                $lb='medical_1_checbox';
                if(isset($data['consent']['data']) && $data['consent']['data']!='')
                {
                    foreach ($data['consent']['data'] as $row)
                    {
                        if($row->consent_name==$lb)
                        {
                            $id_consent=$row->id_consent;
                            $sign=$row->sign;
                            break;
                        }
                    }
                }
                ?>
                <input type="hidden" name="medical_id_cbx1" id="medical_id_cbx1" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox checkbox_bold"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?>name='medical_cbx_hep1' id='medical_cbx_hep1' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> I decline Hepatitis B vaccination at this thine because I have been previously immunized with a complete series (three injections ) of the Hepatitis B vaccine or i have been diagnosed as having the Hepatitis B virus disease and i am immune.</label></p>


                <?php
                $lb='medical_2_checbox';
                if(isset($data['consent']['data']) && $data['consent']['data']!='')
                {
                    foreach ($data['consent']['data'] as $row)
                    {
                        if($row->consent_name==$lb)
                        {
                            $id_consent=$row->id_consent;
                            $sign=$row->sign;
                            break;
                        }
                    }
                }
                ?>
                <input type="hidden" name="medical_id_cbx2" id="medical_id_cbx2" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox checkbox_bold"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?>name='medical_cbx_hep2' id='medical_cbx_hep2' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> I decline Hepatitis B vaccination at this slate. I understand that by declining this vaccine, I continue to be at risk or acquiring Hepatitis B. If in the future I continue to have occupational exposure to blood or other potentially infectious material and i want to be Vaccinated with Hepatitis B vaccine , I can receive the vaccination series at no charge to me.</label></p>


                <?php
                $lb='medical_3_checbox';
                if(isset($data['consent']['data']) && $data['consent']['data']!='')
                {
                    foreach ($data['consent']['data'] as $row)
                    {
                        if($row->consent_name==$lb)
                        {
                            $id_consent=$row->id_consent;
                            $sign=$row->sign;
                            break;
                        }
                    }
                }
                ?>
                <input type="hidden" name="medical_id_cbx3" id="medical_id_cbx3" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox checkbox_bold"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?>name='medical_cbx_hep3' id='medical_cbx_hep3' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> I accept vaccination with time hepatitis B vaccine.</label></p>


                <?php
                $lb='Date of 1st injection';
                if(isset($data['consent']['data']) && $data['consent']['data']!='')
                {
                    foreach ($data['consent']['data'] as $row)
                    {
                        if($row->consent_name==$lb)
                        {
                            $id_consent=$row->id_consent;
                            $sign=$row->sign;
                            break;
                        }
                    }
                }
                ?>
                <input type="hidden" name="medical_id_label1" id="medical_id_label1" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><div id="medical_lb1"><?php print $lb;?></div><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="medical_data1" id="medical_data1" class="form-control required" size='10' style='width:100px !important;' value="<?php if(isset($sign) && $sign!='') print $sign;$sign='';?>"></p>


                <?php
                $lb='Date of 2nd injection';
                if(isset($data['consent']['data']) && $data['consent']['data']!='')
                {
                    foreach ($data['consent']['data'] as $row)
                    {
                        if($row->consent_name==$lb)
                        {
                            $id_consent=$row->id_consent;
                            $sign=$row->sign;
                            break;
                        }
                    }
                }
                ?>
                <input type="hidden" name="medical_id_label2" id="medical_id_label2" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><div id="medical_lb2"><?php print $lb;?></div><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="medical_data2" id="medical_data2" class="form-control required" size='10' style='width:100px !important;' value="<?php if(isset($sign) && $sign!='') print $sign;$sign='';?>"></p>


                <?php
                $lb='Date of 3rd injection';
                if(isset($data['consent']['data']) && $data['consent']['data']!='')
                {
                    foreach ($data['consent']['data'] as $row)
                    {
                        if($row->consent_name==$lb)
                        {
                            $id_consent=$row->id_consent;
                            $sign=$row->sign;
                            break;
                        }
                    }
                }
                ?>
                <input type="hidden" name="medical_id_label3" id="medical_id_label3" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><div id="medical_lb3"><?php print $lb;?></div><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="medical_data3" id="medical_data3" class="form-control required" size='10' style='width:100px !important;' value="<?php if(isset($sign) && $sign!='') print $sign;$sign='';?>"></p>


			</div>

            <?php //var_dump($data);
            if(isset($data['consent']['data']) && $data['consent']['data']!='')
            {//var_dump($data['consent']['data']);
                foreach ($data['consent']['data'] as $row)
                {
                    if($row->consent_name==$lg)
                    {
                        $id_consent=$row->id_consent;
                        $sign=$row->sign;
                        break;
                    }
                }
            }
            ?>
            <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="hidden" name="medical_id_consent1" id="medical_id_consent1" value="<?php if(isset($id_consent)) print $id_consent;?>" />

			<div class="form-group">
				<label>
					Initials 
					<?php 
					if(isset($data['profile']['data']->first_name)) print 'of '.$data['profile']['data']->first_name;
					if(isset($data['profile']['data']->second_name)) print ' '.$data['profile']['data']->second_name;
					if(isset($data['profile']['data']->last_name)) print ' '.$data['profile']['data']->last_name;
					?>
				</label>
				<input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="medical_initial1" id="medical_initial1" class="form-control required" size='4' style='width:100px !important;' value="<?php if(isset($sign) && $sign!='') print $sign;$sign='';?>"/>
			</div>
		
		</fieldset>
	
		<fieldset class="myfieldset">
            <?php $lg='Universal precautions';?>
            <legend class="mylegend" id="medical_lg2"><?php print $lg;?></legend>
            <?php
            if(isset($data['consent']['data']) && $data['consent']['data']!='')
            {
                foreach ($data['consent']['data'] as $row)
                {
                    if($row->consent_name==$lg)
                    {
                        $id_consent=$row->id_consent;
                        $sign=$row->sign;
                        break;
                    }
                }
            }
            ?>
            <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="hidden" name="medical_id_consent2" id="medical_id_consent2" value="<?php if(isset($id_consent)) print $id_consent;?>" />

			<div style='text-align:justify;'>                
				<p>It is the policy of our Agency that home health care providers will adhere to the following, when delivering care to all patients. By adhering to the following universal precautionary measures, the risk of transmission of disease, is decreased when the infection status of the patient is unknown.</p>
				<p>Gloves must be worn when delivering patient care, handling specimens, doing domestic cleaning, and handling items that may be soiled with blood or body fluids. Gloves or aprons must be worn during procedures or while managing a patient situation when there will be exposure to body fluids, blood, draining wounds or mucous membranes. Gloves are to be worn when handling all specimens to prevent contamination from body specimen fluids or blood.</p>
				<p>Mask and protective eyewear or face shield must be work during procedures  that are likely to generate droplets of body fluids, blood or when the patient is coughing excessively.</p>
				<p>Hand washing: Hands must be washed before gloving and after gloves are removed. Hands and other skin surfaces must be washed immediately and thoroughly if contaminated with body fluids or blood and after all patient care activities.</p>
				<p>Home healthcare providers, who have open cuts, sores, or dermatitis on their hands must wear gloves for all patient contact.</p>
			</div>

			<div class="form-group">
				<label>
					Initials 
					<?php 
					if(isset($data['profile']['data']->first_name)) print 'of '.$data['profile']['data']->first_name;
					if(isset($data['profile']['data']->second_name)) print ' '.$data['profile']['data']->second_name;
					if(isset($data['profile']['data']->last_name)) print ' '.$data['profile']['data']->last_name;
					?>
				</label>
                <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="medical_initial2" id="medical_initial2" class="form-control required" size='4' style='width:100px !important;' value="<?php if(isset($sign) && $sign!='') print $sign;$sign='';?>"/>
			</div>
		
		</fieldset>
	
		<fieldset class="myfieldset">
            <?php $lg='Release physical-medical examination criminal background';?>
            <legend class="mylegend" id="medical_lg3"><?php print $lg;?></legend>
            <?php
            if(isset($data['consent']['data']) && $data['consent']['data']!='')
            {
                foreach ($data['consent']['data'] as $row)
                {
                    if($row->consent_name==$lg)
                    {
                        $id_consent=$row->id_consent;
                        $sign=$row->sign;
                        break;
                    }
                }
            }
            ?>
            <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="hidden" name="medical_id_consent3" id="medical_id_consent3" value="<?php if(isset($id_consent)) print $id_consent;?>" />

			<div style='text-align:justify;'>                
				<p>I have been formally no medical/criminal data are to be removed from the home health and/or Criminal background screening data is maintaining confidentially and understand that the medical information regarding my health status may not be discussed with anyone , either  inside or outside the agency (except an needed to conduct the business of the day).</p>
				<p>I understand that no medical/criminal data are to be removed from the home health agency unless a Release of Information from has been completed and signed for me. It is my understanding that such Release of Information (THIS FORM), authorized the Agency to release my Physical/Background Information data tonState/Federal surveyors at their request if needed for conduct the annual survey or any necessary investigation.</p>
				<p>I have been formally instructed in the Personnel Policies and Regulations, and I have read and signed a job description for my specific classification.</p>

			</div>

			<div class="form-group">
				<label>
					Initials 
					<?php 
					if(isset($data['profile']['data']->first_name)) print 'of '.$data['profile']['data']->first_name;
					if(isset($data['profile']['data']->second_name)) print ' '.$data['profile']['data']->second_name;
					if(isset($data['profile']['data']->last_name)) print ' '.$data['profile']['data']->last_name;
					?>
				</label>
                <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="medical_initial3" id="medical_initial3" class="form-control required" size='4' style='width:100px !important;' value="<?php if(isset($sign) && $sign!='') print $sign;$sign='';?>"/>
			</div>
		
		</fieldset>
		
		<div class="row">   
			<section class="col col-8">
				<div class="form-group">
					<label>
						Sign typing your full name 
						<?php 
						if(isset($data['profile']['data']->first_name)) print 'like this: '.$data['profile']['data']->first_name;
						if(isset($data['profile']['data']->second_name)) print ' '.$data['profile']['data']->second_name;
						if(isset($data['profile']['data']->last_name)) print ' '.$data['profile']['data']->last_name;
						?>
					</label>
                    <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="medical_form_sign" id="medical_form_sign" class="form-control required" value="<?php if(isset($data['form']['data']->form_sign)) print $data['form']['data']->form_sign;?>"/>
				</div>
			</section>
			
			<section class="col col-4">
				<label>Date</label>
                <input type="text" name="medical_today_date" id="medical_today_date" class="form-control required" disabled='disabled'  value="<?php print date('m/d/Y');?>" />
			</section>
		</div>

		<div class="form-group pull-right">
            <button type="button" id="btn_save_medical" class="btn btn-primary">Next <span style="vertical-align: middle;font-size: 16px;" class="icon-control-forward"></span></button>
            <input type="hidden" name="medical_id_form" id="medical_id_form" value="<?php if(isset($data['form']['data']->id_form)) print $data['form']['data']->id_form;?>" />
		</div>

	</div>
<?php require_once(APPPATH."views/includes/footer_scripts.php");?>
<script type="text/javascript">
    jQuery(document).ready(function()
    {
        App.init();
        Datepicker.initDatepicker();

        jQuery('#btn_save_medical').on('click', function ()
        {
            ValidateFrm('frm7');
			if (jQuery("#frm7").valid()) 
			{
                var label_name1=jQuery('#medical_lb1').html();
                var label_name2=jQuery('#medical_lb2').html();
                var label_name3=jQuery('#medical_lb3').html();

                var data1=jQuery('#medical_data1').val();
                var data2=jQuery('#medical_data2').val();
                var data3=jQuery('#medical_data3').val();

                var id_consent_lb1=jQuery('#medical_id_label1').val();
                var id_consent_lb2=jQuery('#medical_id_label2').val();
                var id_consent_lb3=jQuery('#medical_id_label3').val();


                var cbx_name1='medical_1_checbox';
                var cbx_name2='medical_2_checbox';
                var cbx_name3='medical_3_checbox';

                if(jQuery('#medical_cbx_hep1').prop('checked'))
                var cbx1=1;else var cbx1=0;
                if(jQuery('#medical_cbx_hep2').prop('checked'))
                var cbx2=1;else var cbx2=0;
                if(jQuery('#medical_cbx_hep3').prop('checked'))
                var cbx3=1;else var cbx3=0;

                var id_consent_cbx1=jQuery('#medical_id_cbx1').val();
                var id_consent_cbx2=jQuery('#medical_id_cbx2').val();
                var id_consent_cbx3=jQuery('#medical_id_cbx3').val();



			    var consent_name1=jQuery('#medical_lg1').html();
                var consent_name2=jQuery('#medical_lg2').html();
                var consent_name3=jQuery('#medical_lg3').html();

                var sign1=jQuery('#medical_initial1').val();
                var sign2=jQuery('#medical_initial2').val();
                var sign3=jQuery('#medical_initial3').val();

                var id_consent1=jQuery('#medical_id_consent1').val();
                var id_consent2=jQuery('#medical_id_consent2').val();
                var id_consent3=jQuery('#medical_id_consent3').val();

                var form_name='medical';
                var form_sign=jQuery('#medical_form_sign').val();
                var date=jQuery('#medical_today_date').val();

                var id_employee=jQuery('#id_employee').val();
                var id_form=jQuery('#medical_id_form').val();

                var completed_percent=40;

                var data =
                {
                    cbx_name1:cbx_name1,
                    cbx_name2:cbx_name2,
                    cbx_name3:cbx_name3,
                    cbx1:cbx1,
                    cbx2:cbx2,
                    cbx3:cbx3,
                    id_consent_cbx1:id_consent_cbx1,
                    id_consent_cbx2:id_consent_cbx2,
                    id_consent_cbx3:id_consent_cbx3,
                    label_name1:label_name1,
                    label_name2:label_name2,
                    label_name3:label_name3,
                    data1:data1,
                    data2:data2,
                    data3:data3,
                    id_consent_lb1:id_consent_lb1,
                    id_consent_lb2:id_consent_lb2,
                    id_consent_lb3:id_consent_lb3,
                    consent_name1:consent_name1,
                    consent_name2:consent_name2,
                    consent_name3:consent_name3,
                    sign1:sign1,
                    sign2:sign2,
                    sign3:sign3,
                    id_consent1:id_consent1,
                    id_consent2:id_consent2,
                    id_consent3:id_consent3,
                    form_name:form_name,
                    form_sign:form_sign,
                    date:date,
                    completed_percent:completed_percent,
                    id_employee:id_employee,
                    id_form:id_form
                };

                var url = 'Employee/SaveMedical';

                var target = document.getElementById('container');
                var spinner = new Spinner(opts).spin(target);

                jQuery.ajax({
                    type: "POST",
                    dataType: "html",
                    url: url,
                    data:data
                }).done(function(response, textStatus, jqXHR)
                {
                    if(jQuery.isNumeric(response) && response>0)
                    {
                        RebuildHeader();
                        alertify.success('Data Saved.');

                        jQuery('#medical_initial1').attr('readonly', true);
                        jQuery('#medical_initial2').attr('readonly', true);
                        jQuery('#medical_initial3').attr('readonly', true);
                        jQuery('#medical_form_sign').attr('readonly', true);
                        jQuery('#btn_save_medical').hide();

                        if('<?php print $session['rol'];?>'=='worker')
                        {
                            LoadDataOrientation(response);
                            jQuery('#tab8').show().tab('show');
                            jQuery('#s7').removeClass('active').addClass('fade');
                            jQuery('#s8').removeClass('fade').addClass('active');
                            goToByScroll('tab8');
                        }
                    }
                    else{alertify.error('Error: The element could not be Saved. '+ response);}
                    spinner.stop();

                }).fail(function(jqHTR, textStatus, thrown)
                {
                    alertify.error('Something is wrong with AJAX:' + textStatus);
                });
			}
		});

        function RebuildHeader()
        {
            jQuery( '#div_header' ).empty();

            jQuery.ajax({
                url:'Main/RebuildHeader',
                type:'POST'
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#div_header').html(response);
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
    });
</script>