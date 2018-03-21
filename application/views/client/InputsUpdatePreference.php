
	<div class="col-sm-12">
		<fieldset class="myfieldset">
			<?php $lg='Preferences';?>
			<legend class="mylegend" id="probation_lg1"><?php print $lg;?></legend>

			<div style='text-align:justify;'>
				<p>You can add a prefered asistant or not select anyone.</p>
			</div>

			<div class="form-group">
                <strong>Employee</strong>
                <select name="sel_prefered_employee" id="sel_prefered_employee" class="my_select2" style="width: 100%;">
                    <?php for ($i=0;$i<sizeof($result_vl['vl']['data']);$i++){?>
                        <option  <?php if(isset($result['_kf_SecurityQuestion_SN'])){if($result['_kf_SecurityQuestion_SN']==$result_vl['vl']['data'][$i]['_zhk_RecordSerialNumber']){?> selected <?php }}?>value="<?php print $result_vl['vl']['data'][$i]['_zhk_RecordSerialNumber'];?>"><?php print $result_vl['vl']['data'][$i]['Security_Questions'];?></option>
                    <?php }?>
                </select>
            </div>
		
		</fieldset>



		<div class="form-group pull-right">
			<button type="button" id="btn_save_probation" class="btn btn-primary">Next <span style="vertical-align: middle;font-size: 16px;" class="icon-control-forward"></span></button>
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