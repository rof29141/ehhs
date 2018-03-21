
	<div class="col-sm-12">
		<fieldset class="myfieldset">
			<?php $lg='Employee Acknowledgment of probation';?>
			<legend class="mylegend" id="probation_lg1"><?php print $lg;?></legend>
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
			<input type="hidden" name="probation_id_consent1" id="probation_id_consent1" value="<?php if(isset($id_consent)) print $id_consent;?>" />

			<div style='text-align:justify;'>
				<p>I understand that I am on probation as an employee for the first ninety days of my emploment which started on <b><?php print $data['business_date'];?></b> for the purpose of the florida unemployment compensation law. I understand if my employer discharges me for unsatisfactory work preformance under the florida he will not have his account charged for in the future. I acknowledge that I signed this form within seven (7) days of my employment.</p>
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
				<input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="probation_initial1" id="probation_initial1" class="form-control required" size='4' style='width:100px !important;' value="<?php if(isset($sign) && $sign!='') print $sign;$sign='';?>"/>
			</div>
		
		</fieldset>
	
		<fieldset class="myfieldset">
			<?php $lg='Tax exempt form';?>
			<legend class="mylegend" id="probation_lg2"><?php print $lg;?></legend>
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
            <input type="hidden" name="probation_id_consent2" id="probation_id_consent2" value="<?php if(isset($id_consent)) print $id_consent;?>" />

			<div style='text-align:justify;'>                
				<p>We comply with the americans with disabilities act of 1990. During the interview process, you may be asked questions concerning your ability, to perform job-related functions. If you are given a conditional offer of employment, you may be required to complete a post-job offer medical history questionnaire and/ or undergo a medical a medical examination. If required, all entering employees in the same job category will be subjected to the same medical questionnaire and/ or examination and all information will be kept confidential and in separate files. </p>
				<p>We are an equal employment opportunity employer. We adhere to a policy of making employment decisions without regard to race, color, sex, religion, national origin, handicap, or material status. We assure you that your opportunity for employment with us depends solely upon your qualifications. </p>
				<p>Please read and sign statements below </p>
				<p>I understand that in accordance with florida statue 443.131 (3) (a) (2), if hired, I will be placed on a 90-day probationary period, my employer may seek to contest any unemployment benefit I might attempt to obtain as results of my termination.</p>
				<p>I understand and agree that all policies ad procedures are not intended to be a contract of employment nor do they give me a right of continued employment, or understandings regarding the terms of employment. There may be no amendments or exceptions to this statement unless they are in writing and signed by the president. </p>
				<p>I understand that I may be required to undergo blood and/ or urinalysis screen for drug or alcohol use. </p>
				<p>I certify that all information given on this employment application, any resume that I submit to the company, and any related papers and answers given during oral interviews are true and correct. I understand that my employer will make a through investigation of my work and personal history. I authorize the giving and receiving of any such information requested by my employer during the course of such investigation. I understand that falsification of any information giving by others during the course of this investigation of any derogatory information discovered as a result of this investigation may -subject-me-to immediate-dismissal. I hereby release from liability all persons who provide information to my employer during the course of any any such investigation.</p>
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
				<input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="probation_initial2" id="probation_initial2" class="form-control required" size='4' style='width:100px !important;' value="<?php if(isset($sign) && $sign!='') print $sign;$sign='';?>"/>
			</div>
		
		</fieldset>
	
		<fieldset class="myfieldset">
			<?php $lg='Transportation responsibility contract';?>
            <legend class="mylegend" id="probation_lg3"><?php print $lg;?></legend>
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
            <input type="hidden" name="probation_id_consent3" id="probation_id_consent3" value="<?php if(isset($id_consent)) print $id_consent;?>" />

			<div style='text-align:justify;'>                
				<p>It has been explained to me that im being offered employment by This Home Health Agency with the understanding that I have personal transportation at my disposal to be used for travel to and from the patient assignments. I further understand that I am responsible for auto liability of $10,000.00 / $20,000.00 for bodily injury and $ 5,000.00 in property damage.</p>
				<p>I also agree not to use my vehicle to transport any patient.</p>

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
				<input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="probation_initial3" id="probation_initial3" class="form-control required" size='4' style='width:100px !important;' value="<?php if(isset($sign) && $sign!='') print $sign;$sign='';?>"/>
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
					<input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="probation_form_sign" id="probation_form_sign" class="form-control required" value="<?php if(isset($data['form']['data']->form_sign)) print $data['form']['data']->form_sign;?>"/>
				</div>
			</section>
			
			<section class="col col-4">
				<label>Date</label>
				<input type="text" name="probation_today_date" id="probation_today_date" class="form-control required" disabled='disabled'  value="<?php print date('m/d/Y');?>" />
			</section>
		</div>

		<div class="form-group pull-right">
			<button type="button" id="btn_save_probation" class="btn btn-primary">Next <span style="vertical-align: middle;font-size: 16px;" class="icon-control-forward"></span></button>
			<input type="hidden" name="probation_id_form" id="probation_id_form" value="<?php if(isset($data['form']['data']->id_form)) print $data['form']['data']->id_form;?>" />
		</div>

	</div>
<?php require_once(APPPATH."views/includes/footer_scripts.php");?>
<script type="text/javascript">
    jQuery(document).ready(function()
    {
		jQuery('#btn_save_probation').on('click', function ()
        {
            ValidateFrm('frm4');
			if (jQuery("#frm4").valid()) 
			{
				var consent_name1=jQuery('#probation_lg1').html();
                var consent_name2=jQuery('#probation_lg2').html();
                var consent_name3=jQuery('#probation_lg3').html();

                var sign1=jQuery('#probation_initial1').val();
                var sign2=jQuery('#probation_initial2').val();
                var sign3=jQuery('#probation_initial3').val();

                var id_consent1=jQuery('#probation_id_consent1').val();
                var id_consent2=jQuery('#probation_id_consent2').val();
                var id_consent3=jQuery('#probation_id_consent3').val();

                var form_name='probation';
                var form_sign=jQuery('#probation_form_sign').val();
                var date=jQuery('#probation_today_date').val();

                var id_employee=jQuery('#id_employee').val();
                var id_form=jQuery('#probation_id_form').val();

                var completed_percent=16;

                var data =
                {
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

                var url = 'Employee/SaveEmployeeFormConsent';

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

                        jQuery('#probation_initial1').attr('readonly', true);
                        jQuery('#probation_initial2').attr('readonly', true);
                        jQuery('#probation_initial3').attr('readonly', true);
                        jQuery('#probation_form_sign').attr('readonly', true);
                        jQuery('#btn_save_probation').hide();
						
						if('<?php print $data['role']['data']->rol;?>'=='worker')
						{
							LoadDataStatement(response);
                            jQuery('#tab5').show().tab('show');
                            jQuery('#s4').removeClass('active').addClass('fade');
                            jQuery('#s5').removeClass('fade').addClass('active');
                            goToByScroll('tab5');
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
    });
</script>