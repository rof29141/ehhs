
	<div class="col-sm-12">
		<fieldset class="myfieldset">
            <?php $lg='Staff conflict of interest';?>
            <legend class="mylegend" id="tax_lg1"><?php print $lg;?></legend>
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
            <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="hidden" name="tax_id_consent1" id="tax_id_consent1" value="<?php if(isset($id_consent)) print $id_consent;?>" />


			<div style='text-align:justify;'>
				

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
				<input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="tax_initial1" id="tax_initial1" class="form-control required" size='4' style='width:100px !important;' value="<?php if(isset($sign) && $sign!='') print $sign;$sign='';?>"/>
			</div>
		
		</fieldset>
	
		<fieldset class="myfieldset">
            <?php $lg='Tax exempt';?>
            <legend class="mylegend" id="tax_lg2"><?php print $lg;?></legend>
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
            <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="hidden" name="tax_id_consent2" id="tax_id_consent2" value="<?php if(isset($id_consent)) print $id_consent;?>" />


            <div style='text-align:justify;'>
				<p>I, <b><?php 
				if(isset($data['profile']['data']->first_name)) print $data['profile']['data']->first_name;
				if(isset($data['profile']['data']->second_name)) print ' '.$data['profile']['data']->second_name;
				if(isset($data['profile']['data']->last_name)) print ' '.$data['profile']['data']->last_name;
				?></b> hereby acknowledge that I am an Independent Contractor. Therefore, I am responsible for my social security and other taxes, and will receive an IRS 1099 Form for the preceding year by February of each year which is also sent to the Internal Revenue Services (IRS).</p>

				<p>Social Security Number: <b><?php if(isset($data['profile']['data']->ssn)) print $data['profile']['data']->ssn;?></b></p>

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
                <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="tax_initial2" id="tax_initial2" class="form-control required" size='4' style='width:100px !important;' value="<?php if(isset($sign) && $sign!='') print $sign;$sign='';?>"/>
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
                    <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="tax_form_sign" id="tax_form_sign" class="form-control required" value="<?php if(isset($data['form']['data']->form_sign)) print $data['form']['data']->form_sign;?>"/>
				</div>
			</section>
			
			<section class="col col-4">
				<label>Date</label>
                <input type="text" name="tax_today_date" id="tax_today_date" class="form-control required" disabled='disabled'  value="<?php print date('m/d/Y');?>" />
			</section>
		</div>

		<div class="form-group pull-right">
			<button type="button" id="btn_save_tax" class="btn btn-primary">Next <span style="vertical-align: middle;font-size: 16px;" class="icon-control-forward"></span></button>
            <input type="hidden" name="tax_id_form" id="tax_id_form" value="<?php if(isset($data['form']['data']->id_form)) print $data['form']['data']->id_form;?>" />
		</div>

	</div>
<?php require_once(APPPATH."views/includes/footer_scripts.php");?>
<script type="text/javascript">
    jQuery(document).ready(function()
    {
		jQuery('#btn_save_tax').on('click', function ()
        {
            ValidateFrm('frm9');
			if (jQuery("#frm9").valid()) 
			{
                var consent_name1=jQuery('#tax_lg1').html();
                var consent_name2=jQuery('#tax_lg2').html();

                var sign1=jQuery('#tax_initial1').val();
                var sign2=jQuery('#tax_initial2').val();

                var id_consent1=jQuery('#tax_id_consent1').val();
                var id_consent2=jQuery('#tax_id_consent2').val();

                var form_name='tax';
                var form_sign=jQuery('#tax_form_sign').val();
                var date=jQuery('#tax_today_date').val();

                var id_employee=jQuery('#id_employee').val();
                var id_form=jQuery('#tax_id_form').val();

                var completed_percent=52;

                var data =
                    {
                        consent_name1:consent_name1,
                        consent_name2:consent_name2,
                        sign1:sign1,
                        sign2:sign2,
                        id_consent1:id_consent1,
                        id_consent2:id_consent2,
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

                        jQuery("#frm9 input").prop("disabled", true);
                        jQuery('#btn_save_tax').hide();

                        if('<?php print $session['rol'];?>'=='worker')
                        {
                            LoadDataInService(response);
                            jQuery('#tab10').show().tab('show');
                            jQuery('#s9').removeClass('active').addClass('fade');
                            jQuery('#s10').removeClass('fade').addClass('active');
                            goToByScroll('tab10');
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
            jQuery('#div_header').empty();

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
    });
</script>