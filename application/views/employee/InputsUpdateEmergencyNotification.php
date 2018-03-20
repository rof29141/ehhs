
	<div class="col-sm-12">
		<fieldset class="myfieldset">
			<legend class="mylegend">Employee emergency notification</legend>

			<div style='text-align:justify;'>
				<p>As per agency policy, every employee must complete at least two emergency notifications as well as update the form as necessary.</p>

				<p>In case of emergency notify: </p>
				
				<p>
				<div class="row">
				
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<label>Name</label>
						<input type="text" name="name1" id="name1" class="form-control required"  value="<?php if(isset($data['profile']['data']->cel)) print $data['profile']['data']->cel;?>" />
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<label>Relationship</label>
						<select name="relationship1" id="relationship1" class="my_select2 required_select" style="width: 100%;">
							<option value="-1" selected></option>
							<option <?php if(isset($data['profile']['data']->gender) && $data['profile']['data']->gender=='male')echo 'selected';?> value="male">Wife</option>
							<option <?php if(isset($data['profile']['data']->gender) && $data['profile']['data']->gender=='female')echo 'selected';?> value="female">Husband</option>
							<option <?php if(isset($data['profile']['data']->gender) && $data['profile']['data']->gender=='female')echo 'selected';?> value="female">Mother</option>
							<option <?php if(isset($data['profile']['data']->gender) && $data['profile']['data']->gender=='female')echo 'selected';?> value="female">Father</option>
							<option <?php if(isset($data['profile']['data']->gender) && $data['profile']['data']->gender=='female')echo 'selected';?> value="female">Brother</option>
							<option <?php if(isset($data['profile']['data']->gender) && $data['profile']['data']->gender=='female')echo 'selected';?> value="female">Sister</option>
							<option <?php if(isset($data['profile']['data']->gender) && $data['profile']['data']->gender=='female')echo 'selected';?> value="female">Other</option>
						</select>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<label>Cell</label>
						<input type="text" name="name1" id="name1" class="form-control required"  value="<?php if(isset($data['profile']['data']->cel)) print $data['profile']['data']->cel;?>" />
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<label>Telephone</label>
						<input type="text" name="name1" id="name1" class="form-control required"  value="<?php if(isset($data['profile']['data']->cel)) print $data['profile']['data']->cel;?>" />
					</div>
					
				</div>
				
				<div class="row">	
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<label>Address</label>
						<input type="text" name="name1" id="name1" class="form-control required"  value="<?php if(isset($data['profile']['data']->cel)) print $data['profile']['data']->cel;?>" />
					</div>
				</div>
				
				<div class="row">	
				
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
						<label>Zip</label>
						<input type="text" name="zip1" id="zip1" class="form-control required"  value="<?php if(isset($data['profile']['data']->cel)) print $data['profile']['data']->cel;?>" />
					</div>
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<div id='div_address1'></div>
					</div>
				</div>
				<hr>

				

				
				</p>

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
			<legend class="mylegend">Anexo al contrato</legend>

			<div style='text-align:justify;'>                
				<p>
					Para el conocimiento de todos los providers de la compa&ntilde;&iacute;a
					El horario de oficina establecido por la Agencia serF desde 9:00 am hasta 5:00pm, de Lunes a Viernes, las llamadas telef&oacute;nicas ser&aacute;n recibidas en el mismo 
					horario de trabajo si llamas despu&eacute;s del horario de trabajo por favor dejar su 
					mensaje al (813)298-5692 / 813-374-0214 que ser&aacute; respondido lo antes posible.
				</p>
				<p>
					Las notas de los servicios realizados (Progress notes), deber&aacute;n ser escritas en tinta negra y deber&aacute;n ser entregadas en la oficina el d&iacute;a Lunes de cada semana entre las 9:00 y 10:00 am en persona, de no cumplir con lo anterior equivale a no recibir su pago.
					Las notas de los servicios realizados (Progress notes), deber&aacute;n ser escritas en ingles con letra clara y legible sin tachaduras, para su posterior revisi&oacute;n, adem&aacute;s se deber&aacute; entregar el original y una copia firmada como corresponde, de no cumplir con lo anterior equivale a trabajo no realizado y no recibir&aacute; su pago.
					Se deber&aacute; cumplir con todos los trainings exigidos por Medicaid Waiver, los cuales deber&aacute;n ser completados y entregados en el tiempo se&ntilde;alado por la Agencia. Los providers seran responsables de cumplir con esto.
					Horas no laboradas que se anoten como trabajadas, se considera Fraude y causara el despido inmediato del provider.
					NO CUMPLIR CON ESTOS REQUISITOS EQUIVALE A LA CANCELACION DEL   CONTRATO
				</p>
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
			<button type="button" id="btn_save_statement" class="btn btn-primary">Next <span style="vertical-align: middle;font-size: 16px;" class="icon-control-forward"></span></button>
            <input type="hidden" name="probation_id_form" id="probation_id_form" value="<?php if(isset($data['form']['data']->id_form)) print $data['form']['data']->id_form;?>" />
		</div>

	</div>
<?php require_once(APPPATH."views/includes/footer_scripts.php");?>
<script type="text/javascript">
    jQuery(document).ready(function()
    {
		jQuery(".my_select2").select2({
            placeholder: {
                id: '-1',
                text: 'Select an option.'
            }
        });
		App.init();
        Masking.initMasking();
        Datepicker.initDatepicker();
		GetStateByZIP();
		
		jQuery('#zip1').on('keyup click blur', function (e)
        {
            GetStateByZIP();
        });

		function GetStateByZIP()
        {
			var zip=jQuery('#zip1').val();

            if(zip.length>2)
            {
                jQuery.ajax({
                    type: "POST",
					dataType: 'json',
                    url: 'User/GetStateByZIP',
                    data:{zip:zip}
                }).done(function(data)
                {
                    jQuery('#div_address').empty();
					if(data.msg=='OK')
					{
						//jQuery('#id_zip').val(data.id_zip);
						var address='<p style="line-height:20px;padding-top:20px;"><div class="col-sm-4"><b>City:</b> '+data.city+'</div>';
						var address=address+'&nbsp;&nbsp;&nbsp;&nbsp;<div class="col-sm-4"><b>State:</b> '+data.state+'</div>';
						var address=address+'&nbsp;&nbsp;&nbsp;&nbsp;<div class="col-sm-4"><b>Country:</b> '+data.country+'</div></p>';
					
						jQuery('#div_address1').html(address);
						jQuery('#btn_save_emergency').attr('disabled',false);
                    }
					else
					{
						jQuery('#div_address').html('<p style="line-height:10px;padding-top:5px;color:red;">Wrong Zip Code</p>');
						jQuery('#btn_save_profile').attr('disabled',true);
					}

                }).fail(function(jqHTR, textStatus, thrown)
                {
                    alertify.error('Something is wrong with AJAX:' + textStatus);
                });
            }
        }
		
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