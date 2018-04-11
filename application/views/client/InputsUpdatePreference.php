
	<div class="col-sm-12">
		<fieldset class="myfieldset">
			<?php $lg='Preferences';?>
			<legend class="mylegend" id="preference_lg1"><?php print $lg;?></legend>

			<div style='text-align:center;'>
				<h5 style="text-align: center; color: red;">You can add a preferred patient assistance or not select anyone. If you don't select anyone the office will assign you one.</h5>
			</div>

            <div class="col-md-12">
                <!-- Thumbnails v1 -->
                <div class="row">
                    <?php
                    if(isset($data['approved_employee']['error_code']) && $data['approved_employee']['error_code']=='0')
                    {
                        $i=0;

                        foreach ($data['approved_employee']['data'] as $row)
                        {
                            if($row->gender=='male')$gender='Male';
                            if($row->gender=='female')$gender='Female';


                            ?>
                            <div class="col-md-4">
                                <div class="thumbnail thumbnail-style thumbnail-kenburn">
                                    <div class="thumbnail-img">
                                        <div class="overflow-hidden text-center"style="padding: 15px;">
                                            <?php if(isset($row->id_person)){?>
                                                <img class="photo_person" src="<?php print base_url('/assets/upload/person_photo/photo_'.$row->id_person.'.jpg');?>" alt="<?php if(isset($row->first_name)) print $row->first_name;?>" />
                                            <?php }else{?>
                                                <img class="photo_person" src="<?php print base_url('/assets/images/male.png');?>" alt="" />
                                            <?php }?>
                                        </div>

                                    </div>
                                    <div class="caption text-center">
                                        <h3><a class="hover-effect" href="#"><?php if(isset($row->first_name)) print $row->first_name;?></a></h3>
                                        <p><?php print $gender;?></p>
                                        <input type="radio" name="rbt_employee" datafld="ignore" <?php if(isset($data['client']['data'][0]->id_employee_preferred) && $data['client']['data'][0]->id_employee_preferred==$row->id_employee){print 'checked';}?> value="<?php print $row->id_employee;?>"/>
                                    </div>
                                </div>
                            </div>
                            <?php

                            $i++;
                        }
                    }else
                    {
                        ?>

                        <div class="col-md-12 text-center"><h3>No exists any caregiver available.</h3></div>

                        <?php
                    }
                    ?>
                </div>
            </div>
		
		</fieldset>



		<div class="form-group pull-right">
			<button type="button" id="btn_save_preference" class="btn btn-primary">Save </button>
            <input type="hidden" datafld='ignore' name="id_person" id="id_person" value="<?php if(isset($data['id_person'])) print $data['id_person'];?>" />
            <input type="hidden" datafld='ignore' name="id_client" id="id_client" value="<?php if(isset($data['client']['data'][0]->id_client)) print $data['client']['data'][0]->id_client;?>" />
		</div>

	</div>
<?php require_once(APPPATH."views/includes/footer_scripts.php");?>
<script type="text/javascript">
    jQuery(document).ready(function()
    {
		jQuery('#btn_save_preference').on('click', function ()
        {
            ValidateFrm('frm3');
			if (jQuery("#frm3").valid())
			{
                var id_employee_preferred=jQuery("input[name='rbt_employee']:checked").val();

                var table='client';
                var id_person=jQuery('#id_person').val();
                var id=jQuery('#id_client').val();

                if(id=='')
                    var type='INSERT';
                else
                    var type='UPDATE';


                var data =
                {
                    table:table,
                    type:type,
                    id_employee_preferred:id_employee_preferred,
                    id_person:id_person,
                    field_id:'id_client',
                    id:id
                };

                var url = 'Main/SaveObject';

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
                        jQuery('#id_client').val(response)
                        RebuildHeader();
                        alertify.success('Data Saved.');

                        //jQuery('#btn_save_preference').hide();
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
		
		function LoadDataStatement(id_approved_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_statement',view_url:'approved_employee/InputsUpdateStatement', id_approved_employee:id_approved_employee}
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