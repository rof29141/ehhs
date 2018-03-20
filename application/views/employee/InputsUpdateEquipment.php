
	<div class="col-sm-12">
		<fieldset class="myfieldset">
            <?php $lg='Infection  control';?>
            <legend class="mylegend" id="equipment_lg1"><?php print $lg;?></legend>
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
            <input type="hidden" name="equipment_id_consent1" id="equipment_id_consent1" value="<?php if(isset($id_consent)) print $id_consent;?>" />


            <div style='text-align:justify;'>
				<p>For your well being, and the well being of your patient, we outline the following procedures to guard against infection.</p>
				<p>1.	Please wash your hand before and after each procedures.</p>
				<p>2.	In the event of an exposure to a pathogen please make an immediate report to the Director of Nursing. This office must be notified immediately and the staff involved must report to the nearest hospital emergency room and will return to work only after a physician has cleared him/her of any communicable infection.</p>
				<p>3.	When working with an AIDS and other high risk infection 's patient, remember to avoid any and all contact with the patient's body fluids, especially blood and blood products. Read and be familiar with the attached pamphlet on how to prevent catching the AIDS or any other virus.</p>
				<p>4.	This agency is not liable for our health care worker who contracts AIDS virus in the course of performing his/her professional duties.</p>
				<p>For more policies on infection control our agency asks all of its employees to read the accompanying scripts which are summaries from the CDC and the Department of Health and Rehabilitative Services. I hereby acknowledge that I have read and understand the Infection Control Policy contained in the Field Employees Procedure Manual. I am familiar with the procedures appropriate to my position as a field employee.</p>


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
				<input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="equipment_initial1" id="equipment_initial1" class="form-control required" size='4' style='width:100px !important;' value="<?php if(isset($sign) && $sign!='') print $sign;$sign='';?>"/>
			</div>
		
		</fieldset>
	
		<fieldset class="myfieldset">
            <?php $lg='Use of personal protective equipment';?>
            <legend class="mylegend" id="equipment_lg2"><?php print $lg;?></legend>
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
            <input type="hidden" name="equipment_id_consent2" id="equipment_id_consent2" value="<?php if(isset($id_consent)) print $id_consent;?>" />


            <div style='text-align:justify;'>
				<p>I, the undersigned, understand and agree that as a condition of employment i am required to wear/use the following personal protective equipment supplied and/or required by my employer: Company Supplied:<?php print COMPANY;?></p>
				<p>Company Required (Supplied by Employee/Contractor): <?php print COMPANY;?></p>
				<p>I agree to inform my employer immediately upon the failure of any of the above listed equipment so the same can be promptly repaired or replaced.</p>
				<p>In the event I sustain an on the job injury as a direct result  of my failure to wear/use the personal protective equipment listed above, my workers' compensation benefits could be substantially reduced.</p>
				<p>I realize that in the event i do not use all of this Personal Protective Equipment and i sustain a personal injury caused by my failure  to use/wear said Personal Protective Equipment, I may be denied up to 25% of the indemnity portion of my claim. As provided by this State's Workers' Compensation statutes.</p>

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
                <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="equipment_initial2" id="equipment_initial2" class="form-control required" size='4' style='width:100px !important;' value="<?php if(isset($sign) && $sign!='') print $sign;$sign='';?>"/>
			</div>
		
		</fieldset>
	
		<fieldset class="myfieldset">
            <?php $lg='Personal policies sake and adequate care of the patient';?>
            <legend class="mylegend" id="equipment_lg3"><?php print $lg;?></legend>
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
            <input type="hidden" name="equipment_id_consent3" id="equipment_id_consent3" value="<?php if(isset($id_consent)) print $id_consent;?>" />


            <div style='text-align:justify;'>
				<p>This Home Health Agency, hereby sets forth the following guidelines to be adhered to by all employees of this agency:</p>
				<p>*Upon arrival at a patient's home, the nurse/employee shall make physical checks of the essential safety devices such as proper locks on doors, proper ventilation, proper beds /chair , proper bedding, adequate bathroom systems, adequate kitchen with all electrical devices,  to be sure they are in good working condition.</p>
				<p>*The employees shall also check the appropriate boxes on our "Patient Safety Checklist" and make the appropriate report to our offices as soon as possible.</p>
				<p>*Upon receipt of such report, the Director of Nursing shall take necessary action to ensure that any safety deficiencies are corrected.</p>
				<p>I have received, read, (or it has been read to me ) and understand the "Company Policy and Safety Rules and Regulations", and agree to abide by them. I further understand that failure to do so could result in disciplinary action or termination.</p> 

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
                <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="equipment_initial3" id="equipment_initial3" class="form-control required" size='4' style='width:100px !important;' value="<?php if(isset($sign) && $sign!='') print $sign;$sign='';?>"/>
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
                    <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="equipment_form_sign" id="equipment_form_sign" class="form-control required" value="<?php if(isset($data['form']['data']->form_sign)) print $data['form']['data']->form_sign;?>"/>
				</div>
			</section>
			
			<section class="col col-4">
				<label>Date</label>
                <input type="text" name="equipment_today_date" id="equipment_today_date" class="form-control required" disabled='disabled'  value="<?php print date('m/d/Y');?>" />
			</section>
		</div>

		<div class="form-group pull-right">
			<button type="button" id="btn_save_equipment" class="btn btn-primary">Next <span style="vertical-align: middle;font-size: 16px;" class="icon-control-forward"></span></button>
            <input type="hidden" name="equipment_id_form" id="equipment_id_form" value="<?php if(isset($data['form']['data']->id_form)) print $data['form']['data']->id_form;?>" />
		</div>

	</div>
<?php require_once(APPPATH."views/includes/footer_scripts.php");?>
<script type="text/javascript">
    jQuery(document).ready(function()
    {
		jQuery('#btn_save_equipment').on('click', function ()
        {
            ValidateFrm('frm6');
			if (jQuery("#frm6").valid()) 
			{
                var consent_name1=jQuery('#equipment_lg1').html();
                var consent_name2=jQuery('#equipment_lg2').html();
                var consent_name3=jQuery('#equipment_lg3').html();

                var sign1=jQuery('#equipment_initial1').val();
                var sign2=jQuery('#equipment_initial2').val();
                var sign3=jQuery('#equipment_initial3').val();

                var id_consent1=jQuery('#equipment_id_consent1').val();
                var id_consent2=jQuery('#equipment_id_consent2').val();
                var id_consent3=jQuery('#equipment_id_consent3').val();

                var form_name='equipment';
                var form_sign=jQuery('#equipment_form_sign').val();
                var date=jQuery('#equipment_today_date').val();

                var id_employee=jQuery('#id_employee').val();
                var id_form=jQuery('#equipment_id_form').val();

                var completed_percent=32;

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

                        jQuery('#equipment_initial1').attr('readonly', true);
                        jQuery('#equipment_initial2').attr('readonly', true);
                        jQuery('#equipment_initial3').attr('readonly', true);
                        jQuery('#equipment_form_sign').attr('readonly', true);
                        jQuery('#btn_save_equipment').hide();

                        if('<?php print $session['rol'];?>'=='worker')
                        {
                            LoadDataMedical(response);
                            jQuery('#tab7').show().tab('show');
                            jQuery('#s6').removeClass('active').addClass('fade');
                            jQuery('#s7').removeClass('fade').addClass('active');
                            goToByScroll('tab7');
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
    });
</script>