
	<div class="col-sm-12">
		<fieldset class="myfieldset">
            <?php $lg='Agency policies';?>
            <legend class="mylegend" id="inservice_lg1"><?php print $lg;?></legend>
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
            <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="hidden" name="inservice_id_consent1" id="inservice_id_consent1" value="<?php if(isset($id_consent)) print $id_consent;?>" />

			<div style='text-align:justify;'>
				<p>Very important RESPECT MUTUO the agency must treat with respect and Professionalism its workers as it will receive the same treatment from them.</p>
				<ul>
					<li>The schedule agreed between the client and the agency.</li>
					<li>It is a conflict of interest to receive a payment from the client to extend the Schedule of Services stipulated by the LTC program will be considered a fraud and your contract with the agency will be canceled immediately.</li>
					<li>The attention to an agency call is mandatory without excuses.</li>
					<li>For the worker it is mandatory to keep all the trainings and documents required by the agency per day.</li>
					<li>Work done with expired documentation will not be paid.</li>
					<li>Vacations must be scheduled and informed to the agency 30 days in advance.</li>
					<li>Progressive notes will be printed with black ink and eligible letter without erasures, blurs or correctors, can not be written in Spanish, signed by the patient, need to be delivered to the agency every Monday between 9:00 am and 12:00 pm.</li>
					<li>The worker should not give any information to a third person (not part of the agency) about the agency or about the patient you should inform anything  to the agency.</li>
					<li>Violation of the principle of co-conduct will lead to loss of contract with the agency.</li>
					<li>The client assigned to a CNA / HHA can not be transferred to another CNA without first consulting with the agency this is considered a violation and termination of the contract with the CNA.</li>
					<li>Workers' families can not come to the office to investigate or resolve worker issues.</li>
					<li>When the CNA goes on vacation we must replace it with another CAN until the return of his. Failure to do so could lead to problems with the LTC program.</li>
				</ul>
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
				<input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="inservice_initial1" id="inservice_initial1" class="form-control required" size='4' style='width:100px !important;' value="<?php if(isset($sign) && $sign!='') print $sign;$sign='';?>"/>
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
                    <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="inservice_form_sign" id="inservice_form_sign" class="form-control required" value="<?php if(isset($data['form']['data']->form_sign)) print $data['form']['data']->form_sign;?>"/>
				</div>
			</section>
			
			<section class="col col-4">
				<label>Date</label>
                <input type="text" name="inservice_today_date" id="inservice_today_date" class="form-control required" disabled='disabled'  value="<?php print date('m/d/Y');?>" />
			</section>
		</div>

		<div class="form-group pull-right">
			<button type="button" id="btn_save_inservice" class="btn btn-primary">Next <span style="vertical-align: middle;font-size: 16px;" class="icon-control-forward"></span></button>
            <input type="hidden" name="inservice_id_form" id="inservice_id_form" value="<?php if(isset($data['form']['data']->id_form)) print $data['form']['data']->id_form;?>" />
		</div>

	</div>
<?php require_once(APPPATH."views/includes/footer_scripts.php");?>
<script type="text/javascript">
    jQuery(document).ready(function()
    {
		jQuery('#btn_save_inservice').on('click', function ()
        {
            ValidateFrm('frm10');
			if (jQuery("#frm10").valid()) 
			{
                var consent_name1=jQuery('#inservice_lg1').html();
                var sign1=jQuery('#inservice_initial1').val();
                var id_consent1=jQuery('#inservice_id_consent1').val();

                var form_name='inservice';
                var form_sign=jQuery('#inservice_form_sign').val();
                var date=jQuery('#inservice_today_date').val();

                var id_employee=jQuery('#id_employee').val();
                var id_form=jQuery('#inservice_id_form').val();

                var completed_percent=56;

                var data =
                    {
                        consent_name1:consent_name1,
                        sign1:sign1,
                        id_consent1:id_consent1,
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

                        jQuery("#frm10 input").prop("disabled", true);
                        jQuery('#btn_save_inservice').hide();

                        if('<?php print $session['rol'];?>'=='worker')
                        {
                            LoadDataOver(response);
                            jQuery('#tab11').show().tab('show');
                            jQuery('#s10').removeClass('active').addClass('fade');
                            jQuery('#s11').removeClass('fade').addClass('active');
                            goToByScroll('tab11');
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
    });
</script>