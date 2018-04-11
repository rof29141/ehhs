<?php
$arr=array();
if(isset($data['form']['data']->form_sign))
{
	$json=stripslashes(html_entity_decode($data['form']['data']->form_sign));//echo $json;
	$arr= json_decode($json, true);
}
//var_dump($arr);
?>
	<div class="col-sm-12">
		<fieldset class="myfieldset">
			<legend class="mylegend">Employee emergency notification</legend>

			<div style='text-align:justify;'>
				<p>As per agency policy, every employee must complete at least two emergency notifications as well as update the form as necessary.</p>

				<p>In case of emergency notify: </p>
				

				<div class="row">
				
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<label>Name</label>
						<input type="text" name="name1" id="name1" class="form-control required"  value="<?php if(isset($arr[0]['name1']))print $arr[0]['name1'];?>" />
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<label>Relationship</label>
						<select name="relationship1" id="relationship1" class="my_select2 required_select" style="width: 100%;">
							<option value="-1" selected></option>
							<option <?php if(isset($arr[0]['relationship1']) && $arr[0]['relationship1']=='Wife')echo 'selected';?> value="Wife">Wife</option>
							<option <?php if(isset($arr[0]['relationship1']) && $arr[0]['relationship1']=='Husband')echo 'selected';?> value="Husband">Husband</option>
							<option <?php if(isset($arr[0]['relationship1']) && $arr[0]['relationship1']=='Mother')echo 'selected';?> value="Mother">Mother</option>
							<option <?php if(isset($arr[0]['relationship1']) && $arr[0]['relationship1']=='Father')echo 'selected';?> value="Father">Father</option>
							<option <?php if(isset($arr[0]['relationship1']) && $arr[0]['relationship1']=='Brother')echo 'selected';?> value="Brother">Brother</option>
							<option <?php if(isset($arr[0]['relationship1']) && $arr[0]['relationship1']=='Sister')echo 'selected';?> value="Sister">Sister</option>
							<option <?php if(isset($arr[0]['relationship1']) && $arr[0]['relationship1']=='Other')echo 'selected';?> value="Other">Other</option>
						</select>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<label>Cell</label>
						<input type="text" name="cell1" id="cell1" class="form-control required"  value="<?php if(isset($arr[0]['cell1']))print $arr[0]['cell1'];?>" />
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<label>Telephone</label>
						<input type="text" name="tel1" id="tel1" class="form-control required"  value="<?php if(isset($arr[0]['tel1']))print $arr[0]['tel1'];?>" />
					</div>
					
				</div>
				
				<div class="row">	
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<label>Address</label>
						<input type="text" name="add1" id="add1" class="form-control required"  value="<?php if(isset($arr[0]['add1']))print $arr[0]['add1'];?>" />
					</div>
				</div>
				
				<div class="row">	
				
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
						<label>Zip</label>
						<input type="text" name="zip1" id="zip1" class="form-control required"  value="<?php if(isset($arr[0]['zip1']))print $arr[0]['zip1'];?>" />
					</div>
					
					<section class="col col-9">
						<div id='div_address1'></div>
					</section>
				</div>
				<hr>
				
				<div class="row">
				
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<label>Name</label>
						<input type="text" name="name2" id="name2" class="form-control required"  value="<?php if(isset($arr[0]['name2']))print $arr[0]['name2'];?>" />
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<label>Relationship</label>
						<select name="relationship2" id="relationship2" class="my_select2 required_select" style="width: 100%;">
							<option value="-1" selected></option>
							<option <?php if(isset($arr[0]['relationship2']) && $arr[0]['relationship2']=='Wife')echo 'selected';?> value="Wife">Wife</option>
							<option <?php if(isset($arr[0]['relationship2']) && $arr[0]['relationship2']=='Husband')echo 'selected';?> value="Husband">Husband</option>
							<option <?php if(isset($arr[0]['relationship2']) && $arr[0]['relationship2']=='Mother')echo 'selected';?> value="Mother">Mother</option>
							<option <?php if(isset($arr[0]['relationship2']) && $arr[0]['relationship2']=='Father')echo 'selected';?> value="Father">Father</option>
							<option <?php if(isset($arr[0]['relationship2']) && $arr[0]['relationship2']=='Brother')echo 'selected';?> value="Brother">Brother</option>
							<option <?php if(isset($arr[0]['relationship2']) && $arr[0]['relationship2']=='Sister')echo 'selected';?> value="Sister">Sister</option>
							<option <?php if(isset($arr[0]['relationship2']) && $arr[0]['relationship2']=='Other')echo 'selected';?> value="Other">Other</option>
						</select>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<label>Cell</label>
						<input type="text" name="cell2" id="cell2" class="form-control required"  value="<?php if(isset($arr[0]['cell2']))print $arr[0]['cell2'];?>" />
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<label>Telephone</label>
						<input type="text" name="tel2" id="tel2" class="form-control required"  value="<?php if(isset($arr[0]['tel2']))print $arr[0]['tel2'];?>" />
					</div>
					
				</div>
				
				<div class="row">	
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<label>Address</label>
						<input type="text" name="add2" id="add2" class="form-control required"  value="<?php if(isset($arr[0]['add2']))print $arr[0]['add2'];?>" />
					</div>
				</div>
				
				<div class="row">	
				
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
						<label>Zip</label>
						<input type="text" name="zip2" id="zip2" class="form-control required"  value="<?php if(isset($arr[0]['zip2']))print $arr[0]['zip2'];?>" />
					</div>
			
					<section class="col col-9">
						<div id='div_address2'></div>
					</section>
				</div>
				<hr>

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
					if(isset($data['role']['data']->first_name)) print 'of '.$data['role']['data']->first_name;
					if(isset($data['role']['data']->second_name)) print ' '.$data['role']['data']->second_name;
					if(isset($data['role']['data']->last_name)) print ' '.$data['role']['data']->last_name;
					?>
				</label>
				<input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="emergency_initial1" id="emergency_initial1" class="form-control required" size='4' style='width:100px !important;' value="<?php if(isset($arr[0]['emergency_initial1']))print $arr[0]['emergency_initial1'];?>"/>
		
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
                    <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="emergency_form_sign" id="emergency_form_sign" class="form-control required" value="<?php if(isset($arr[0]['emergency_form_sign']))print $arr[0]['emergency_form_sign'];?>"/>
				</div>
			</section>
			
			<section class="col col-4">
				<label>Date</label>
                <input type="text" name="emergency_today_date" id="emergency_today_date" class="form-control required" disabled='disabled'  value="<?php print date('m/d/Y');?>" />
			</section>
		</div>

		<div class="form-group pull-right">
			<button type="button" id="btn_save_emergency" class="btn btn-primary">Next <span style="vertical-align: middle;font-size: 16px;" class="icon-control-forward"></span></button>
            <input type="hidden" name="emergency_id_form" id="emergency_id_form" value="<?php if(isset($data['form']['data']->id_form)) print $data['form']['data']->id_form;?>" />
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
		GetStateByZIP(1);
		GetStateByZIP(2);
		
		jQuery('#zip1').on('keyup click blur', function (e)
        {
            GetStateByZIP(1);
        });
		
		jQuery('#zip2').on('keyup click blur', function (e)
        {
            GetStateByZIP(2);
        });

		function GetStateByZIP(i)
        {
			var zip=jQuery('#zip'+i).val();

            if(zip.length>2)
            {
                jQuery.ajax({
                    type: "POST",
					dataType: 'json',
                    url: 'User/GetStateByZIP',
                    data:{zip:zip}
                }).done(function(data)
                {
                    jQuery('#div_address'+i).empty();
					if(data.msg=='OK')
					{
						//jQuery('#id_zip').val(data.id_zip);
						var address='<p style="line-height:20px;padding-top:20px;"><div class="col-sm-4"><b>City:</b> '+data.city+'</div>';
						var address=address+'&nbsp;&nbsp;&nbsp;&nbsp;<div class="col-sm-4"><b>State:</b> '+data.state+'</div>';
						var address=address+'&nbsp;&nbsp;&nbsp;&nbsp;<div class="col-sm-4"><b>Country:</b> '+data.country+'</div></p>';
					
						jQuery('#div_address'+i).html(address);
                    }
					else
					{
						jQuery('#div_address'+i).html('<p style="line-height:10px;padding-top:5px;color:red;">Wrong Zip Code</p>');
					}

                }).fail(function(jqHTR, textStatus, thrown)
                {
                    alertify.error('Something is wrong with AJAX:' + textStatus);
                });
            }
        }
		
		jQuery('#btn_save_emergency').on('click', function ()
        {
            ValidateFrm('frm12');
            if (jQuery("#frm12").valid())
            {
                var form_name='emergency';
                var x=jQuery('#frm12').find('input[datafld!=ignore], select[datafld!=ignore]').serializeArray();
                var date=jQuery('#emergency_today_date').val();
                var form_sign='[{';

                jQuery.each(x, function(i, field)
                {
                    if(field.value!='')
                    {
                        if(i!=0)
                            form_sign=form_sign+',';

                        form_sign = form_sign + '"' + field.name + '":"' + field.value + '"';
                    }
                });

                form_sign=form_sign+'}]';//alert(form_sign);

                var id_employee=jQuery('#id_employee').val();
                var id_form=jQuery('#emergency_id_form').val();

                var completed_percent=65;

                var data ='form_name='+form_name+
                '&form_sign='+form_sign+
                '&date='+date+
                '&completed_percent='+completed_percent+
                '&id_employee='+id_employee+
                '&id_form='+id_form;

                var url = 'Employee/SaveEmployeeForm';

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

                        jQuery("#frm19 input").prop("disabled", true);
                        jQuery('#btn_save_i9').hide();

                        if('<?php print $data['role']['data']->rol;?>'=='worker')
                        {
                            LoadDataConfidentiality(response);
                            jQuery('#tab13').show().tab('show');
                            jQuery('#s12').removeClass('active').addClass('fade');
                            jQuery('#s13').removeClass('fade').addClass('active');
                            goToByScroll('tab13');
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
    });
</script>