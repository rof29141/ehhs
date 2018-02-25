
	<div class="col-sm-12">
		<fieldset class="myfieldset">
			<legend class="mylegend">Employee statement of commitment</legend>

			<div style='text-align:justify;'>
				<p>I have read and understand This Home Health Agency, Personnel Policy Manual. In compliance with those policies I agree to confirm to the following:</p>
				<p>I will always maintain professionalism in the home to which i am assigned.</p>
				<p>I will immediately contact This Home Health Agency, regarding any areas of discrepancy between the client's assessment of the assignment requirements  and my understanding of my specific performance level as designated by This Home Health Agency.</p>
				<p>I have read and understand the This Home Health Agency, job description appropriate to my  level of performance.</p>
				<p>I will not accept assignments beyond my designated performance level as determined by This Home Health Agency.</p>
				<p>I will abide with the This Home Health Agency Standard Code of Dress as described in the Personnel Policy Manual.</p>
				<p>I will arrive in in time for the assignments I have accepted. In the event of an emergency which may cause me to be late, I will notify the  This Home Health Agency, office of the situation and expected arrival time.</p>
				<p>I will not accept any money or gifts from This Home Health Agency's Clients.</p>
				<p>I will receive payment for services rendered directly from This Home Health Agency.</p>
				<p>I will notify This Home Health  Agency, immediately if i am unable to arrive for my assignment commitment.</p> 
				<p>I understand the This Home Health Agency,  office will then contact the client.</p>
				<p>I also understand that not calling This Home Health Agency, office when I am unable to meet my assignment commitment will be grounds for immediate termination.</p>
				<p>I will not make or accept personal telephone calls on the client's home.</p>
				<p>I will not transport a patient or family member in my personal vehicle.</p>
				<p>I will not smoke in a patient's home.</p>

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
			<legend class="mylegend">Voluntary substance Testing</legend>

			<div style='text-align:justify;'>                
				<p>In order to protect myself and my employer, I <?php 
					if(isset($data['profile']['data']->first_name)) print 'of '.$data['profile']['data']->first_name;
					if(isset($data['profile']['data']->second_name)) print ' '.$data['profile']['data']->second_name;
					if(isset($data['profile']['data']->last_name)) print ' '.$data['profile']['data']->last_name;
					?> 
					voluntarily authorize blood and urine testing for  alcohol and/or drug use. I agree to allow such samples and testing to be completed at a time and place to be chosen by my employer. I understand should such samples and testing be requested it is either due to the company's Drug Free Workplace Program, suspicion that i am under the influence of alcohol/drugs  which cluod result in an on-the-job injury, or may affect the quality of my work. I further authorized the results of samples/testing to be released to my employer.</p>
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
				statement
			</div>
		
		</fieldset>
	
		<fieldset class="myfieldset">
			<legend class="mylegend">Policy on patient's  progress notes</legend>

			<div style='text-align:justify;'>                
				<p>It is the policy of this Home Health Agency that weekly Progress Notes shall be written on each of our patients, preferably each Friday. Such a Progress Note, to be written on our standard "Progress Notes" form, shall be written by a Skilled Nurse/Professional, who also should supervise the case in review, together with Supervisor RN/Staff. Completed progress notes, along with other pertinent patient records, shall be submitted to the Director of Nursing (at the office) once every one-three week. During that period a note faxed from employee may be in place of the original, until the regular 1-3 weeks delivery time frame, progress note is received in the office. Home health care staff members will ensure complete concise documentation of services, issues and conditions occurring during the period of services rendered to the client. It is our Policy that we allow the use of automatic mechanism to help our staff to complete their progress notes report like typing by Typewriter, Word Processor, or Computer Software, in compliance with the following steps:</p>
				<p>1-Ensure the compliance of HIPPA regulations and guidelines, including the care of the Patient's Privacy Rights.</p>
				<p>2-Don't allow any other person access to any Patient Information needed to complete the work, if necessary finish the notes at the staff residence.</p>
				<p>3-Destroy all Patient Information after completing the progress notes.</p>
				<p>4- Inform immediately to the Agency's Privacy Officer if any breach of HIPPA guidelines for Patient's Privacy Rights is suspected.</p>
				<p>5-In the use of computer software don't save any Patient Information in the Staff Personal Computer, is the information is used, the staff must delete that information, immediately after completing their work.</p>
				
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
				statement
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
                <input type="text" name="probation_today_date" id="probation_today_date" class="form-control required" disabled='disabled'  value="<?php print date('m/d/Y');?>" />
			</section>
		</div>

		<div class="form-group pull-right">
			<button type="button" id="btn_save_statement" class="btn btn-primary">Next <span style="vertical-align: middle;font-size: 16px;" class="icon-control-forward"></span></button>
            <input type="hidden" name="probation_id_form" id="probation_id_form" value="<?php if(isset($data['form']['data']->id_form)) print $data['form']['data']->id_form;?>" />
		</div>

	</div>
<?php require_once(APPPATH."views/includes/footer_scripts.php");?>
<script type="text/javascript">
    jQuery(document).ready(function()
    {
		jQuery('#btn_save_statement').on('click', function ()
        {
            ValidateFrm('frm12');
			if (jQuery("#frm12").valid())
			{

                jQuery('#tab13').show().tab('show');
                jQuery('#s12').removeClass('active').addClass('fade');
                jQuery('#s13').removeClass('fade').addClass('active');
                goToByScroll('tab13');
			}
		});
    });
</script>