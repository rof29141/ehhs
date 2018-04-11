
	<div class="col-sm-12">
		<fieldset class="myfieldset">
            <?php $lg='Employee statement of commitment';?>
            <legend class="mylegend" id="over_lg1"><?php print $lg;?></legend>
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
            <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="hidden" name="over_id_consent1" id="over_id_consent1" value="<?php if(isset($id_consent)) print $id_consent;?>" />


            <div style='text-align:justify;'>
				<p>I, <b><?php 
				if(isset($data['role']['data']->first_name)) print $data['role']['data']->first_name;
				if(isset($data['role']['data']->second_name)) print ' '.$data['role']['data']->second_name;
				if(isset($data['role']['data']->last_name)) print ' '.$data['role']['data']->last_name;
				?></b> Subcontractor of Esperanza Home Health Agency, certify that resigned voluntarily any right to overtime pay, because these times are temporary and not permanent, and them working voluntarily without expecting any remuneration additional.</p>

				<p>I certify that I have signed this document voluntarily, and aware of its contents.</p>


			</div>

			<div class="form-group">
				<label>
					Initials 
					<?php 
					if(isset($data['role']['data']->first_name)) print 'of '.$data['role']['data']->first_name;
					if(isset($data['role']['data']->second_name)) print ' '.$data['role']['data']->second_name;
					if(isset($data['role']['data']->last_name)) print ' '.$data['role']['data']->last_name;
					?>
				</label>
				<input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="over_initial1" id="over_initial1" class="form-control required" size='4' style='width:100px !important;' value="<?php if(isset($sign) && $sign!='') print $sign;$sign='';?>"/>
			</div>
		
		</fieldset>
	
		<div class="row">   
			<section class="col col-8">
				<div class="form-group">
					<label>
						Sign typing your full name 
						<?php 
						if(isset($data['role']['data']->first_name)) print 'like this: '.$data['role']['data']->first_name;
						if(isset($data['role']['data']->second_name)) print ' '.$data['role']['data']->second_name;
						if(isset($data['role']['data']->last_name)) print ' '.$data['role']['data']->last_name;
						?>
					</label>
                    <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="over_form_sign" id="over_form_sign" class="form-control required" value="<?php if(isset($data['form']['data']->form_sign)) print $data['form']['data']->form_sign;?>"/>
				</div>
			</section>
			
			<section class="col col-4">
				<label>Date</label>
                <input type="text" name="over_today_date" id="over_today_date" class="form-control required" disabled='disabled'  value="<?php print date('m/d/Y');?>" />
			</section>
		</div>

		<div class="form-group pull-right">
			<button type="button" id="btn_save_over" class="btn btn-primary">Next <span style="vertical-align: middle;font-size: 16px;" class="icon-control-forward"></span></button>
            <input type="hidden" name="over_id_form" id="over_id_form" value="<?php if(isset($data['form']['data']->id_form)) print $data['form']['data']->id_form;?>" />
		</div>

	</div>
<?php require_once(APPPATH."views/includes/footer_scripts.php");?>
<script type="text/javascript">
    jQuery(document).ready(function()
    {
		jQuery('#btn_save_over').on('click', function ()
        {
            ValidateFrm('frm11');
			if (jQuery("#frm11").valid()) 
			{
                var consent_name1=jQuery('#over_lg1').html();
                var sign1=jQuery('#over_initial1').val();
                var id_consent1=jQuery('#over_id_consent1').val();

                var form_name='over';
                var form_sign=jQuery('#over_form_sign').val();
                var date=jQuery('#over_today_date').val();

                var id_employee=jQuery('#id_employee').val();
                var id_form=jQuery('#over_id_form').val();

                var completed_percent=60;

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

                        jQuery("#frm11 input").prop("disabled", true);
                        jQuery('#btn_save_over').hide();

                        if('<?php print $data['role']['data']->rol;?>'=='worker')
                        {
                            LoadDataEmergency(response);
                            jQuery('#tab12').show().tab('show');
                            jQuery('#s11').removeClass('active').addClass('fade');
                            jQuery('#s12').removeClass('fade').addClass('active');
                            goToByScroll('tab12');
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
    });
</script>