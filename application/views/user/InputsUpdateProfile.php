<?php
if(isset($data['role']['data']->rol) && $data['role']['data']->rol!='')
    $role=$data['role']['data']->rol;
else
    $role=$data['role'];
?>
	<div class="col-sm-12">

		<div class="form-group">
			<label>First Name</label>
			<input type="text" name="first_name" id="first_name" class="form-control required"  value="<?php if(isset($data['profile']['data']->first_name)) print $data['profile']['data']->first_name;?>" />
			<input type="hidden" datafld='ignore' name="id_person" id="id_person" class="form-control"  value="<?php if(isset($data['profile']['data']->id_person)) print $data['profile']['data']->id_person;?>" />
			<input type="hidden" name="id_user" id="id_user" class="form-control"  value="<?php if(isset($data['profile']['data']->id_user) && $data['profile']['data']->id_user!='') print $data['profile']['data']->id_user;else print $data['id_user'];?>" />
		</div>
		
		<div class="form-group">
			<label>Second Name</label>
			<input type="text" name="second_name" id="second_name" class="form-control required" value="<?php if(isset($data['profile']['data']->second_name)) print $data['profile']['data']->second_name;?>" />
		</div>
		
		<div class="form-group">
			<label>Last Name</label>
			<input type="text" name="last_name" id="last_name" class="form-control required" value="<?php if(isset($data['profile']['data']->last_name)) print $data['profile']['data']->last_name;?>" />
		</div>
		
		<div class="row">   
			<section class="col col-4">
				<label class="form-group">
					<label>Gender</label>
					<select name="gender" id="gender" class="my_select2 required_select" style="width: 100%;">
						<option value="-1" selected></option>
						<option <?php if(isset($data['profile']['data']->gender) && $data['profile']['data']->gender=='male')echo 'selected';?> value="male">Male</option>
						<option <?php if(isset($data['profile']['data']->gender) && $data['profile']['data']->gender=='female')echo 'selected';?> value="female">Female</option>
					</select>
				</label>
			</section>
			<section class="col col-4">
				<label class="form-group">
					<label>SSN</label>
					<input type="text" name="ssn" id="ssn" class="form-control required" value="<?php if(isset($data['profile']['data']->ssn)) print $data['profile']['data']->ssn;?>" />
				</label>
			</section>
			<section class="col col-4">
				<label class="form-group">
					<label>Date of Birth</label>
					<input type="text" name="birthday" id="birthday" class="form-control required" value="<?php if(isset($data['profile']['data']->birthday)) print $data['profile']['data']->birthday;?>" />
				</label>
			</section>
		</div>

		<div class="form-group">
			<label>Address</label>
			<input type="text" name="address" id="address" class="form-control required" value="<?php if(isset($data['profile']['data']->address)) print $data['profile']['data']->address;?>" />
		</div>

		<div class="row">   
			<section class="col col-3">
				<label class="form-group">
					<label>Zip Code</label>
					<input type="text" datafld='ignore' name="zip" id="zip" class="form-control required"  value="<?php if(isset($data['profile']['data']->zip)) print $data['profile']['data']->zip;?>" />
					<input type="hidden" name="id_zip" id="id_zip" class="form-control"  value="<?php if(isset($data['profile']['data']->id_zip)) print $data['profile']['data']->id_zip;?>" />
				</label>
			</section>
			<section class="col col-5">
				<div id='div_address'></div>
			</section>
			<section class="col col-4">
				<label class="form-group">
					<label>Phone</label>
					<input type="text" name="cel" id="cel" class="form-control required"  value="<?php if(isset($data['profile']['data']->cel)) print $data['profile']['data']->cel;?>" />
				</label>
			</section>
		</div>

		<div class="row">   
			<section class="col col-8">
				<div class="form-group">
					<label>Photo</label>
					<label for="file" class="input input-file">
						<span class="btn button" style="margin-top:5px;line-height: 32px !important;">
							<i class="glyphicon glyphicon-plus"></i>
							<span>Add files</span>
							<input datafld='ignore' data-url="User/UploadFile" id="multiple_fileupload" type="file" name="multiple_fileupload">
						</span>
					</label>
					<div class="files">Allowed: jpg<br><div id="files"></div></div>
					<input type='hidden' name="random" id="random" class='required' <?php if(isset($data['profile']['data']->id_person)){?>value='no'<?php }?>>
				</div>
			</section>
			
			<section class="col col-4">
				
				<div class="text-center">
					<?php if(isset($data['profile']['data']->id_person)){?>
						<img class="photo_person" src="<?php print base_url('/assets/upload/person_photo/photo_'.$data['profile']['data']->id_person.'.jpg');?>" alt="<?php if(isset($data['profile']['data']->first_name)) print $data['profile']['data']->first_name;?>" />
					<?php }else{?>
						<img class="photo_person" src="<?php print base_url('/assets/images/male.png');?>" alt="" />
					<?php }?>
				</div>
				
			</section>
		</div>

		<div class="form-group pull-right">
            <?php
                if(isset($role) && $role!='admin' && $role!='asist')$next=1;
            ?>
			<button type="button" disabled id="btn_save_profile" class="btn btn-primary"><?php if(isset($next) && $next==1){?>Next <span style="vertical-align: middle;font-size: 16px;" class="icon-control-forward"></span><?php }else {?>Save<?php }?></button>
		</div>

	</div>
<?php require_once(APPPATH."views/includes/footer_scripts.php");?>
<script type="text/javascript">
	function DeleteFile(id, folder, name)
    {
        var target = document.getElementById('main-view');
        var spinner = new Spinner(opts).spin(target);

        jQuery.ajax({
            type: "POST",
            dataType: "html",
            url: 'User/DeleteFile',
            data:{folder:folder, name:name}
        }).done(function(response, textStatus, jqXHR)
        {//alert(response);
            if(response=='DELETED')
            {
                jQuery('#'+id).hide('slow',function() {
                    jQuery('#'+id).remove();
                });
				if(jQuery('#id_person').val()=='')jQuery('#random').val('');else jQuery('#random').val('no');
            }
            spinner.stop();
        }).fail(function(jqHTR, textStatus, thrown)
        {
            alertify.error('Something is wrong with AJAX:' + textStatus);
            spinner.stop();
        });
    }

    jQuery(document).ready(function()
    {
		ShowPhoto();

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

		jQuery('#zip').on('keyup click blur', function (e)
        {
            GetStateByZIP();
        });

		function GetStateByZIP()
        {
            var zip=jQuery('#zip').val();

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
						jQuery('#id_zip').val(data.id_zip);
						var address='<p style="line-height:10px;padding-top:5px;"><b>City:</b> '+data.city+'</p>';
						var address=address+'<p style="line-height:10px;"><b>State:</b> '+data.state+'</p>';
						var address=address+'<p style="line-height:10px;"><b>Country:</b> '+data.country+'</p>';

						jQuery('#div_address').html(address);
						jQuery('#btn_save_profile').attr('disabled',false);
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

		var random=Math.floor((Math.random() * 900000000000) + 1);

        jQuery('#multiple_fileupload').fileupload(
        {
            dataType: 'json',
            formData: {random:random},
            done: function (e, data)
            {
                var files=jQuery("#files").html();

                //alert(files);
                //alert(files.indexOf(data.result.file_name));

                if(files.indexOf(data.result.file_name) == -1)
                {
                    var id_random=Math.floor((Math.random() * 900000000000) + 1);

                    if (data.result.status == 'error')
                    {
                        alertify.error(data.result.msg);
                        //jQuery('<span class="badge badge-red rounded" style="padding:5px; margin:5px;line-height: 32px;">' +
                            //data.result.file_name + ' ('+data.result.file_size+' kb)'+
                            //'</span>').appendTo('#files');
                    }
                    else
                    {
                        jQuery('#random').val(random);
						var html_file='<span id="'+ id_random +'" class="badge-green rounded" style="padding:5px; margin:5px;line-height: 32px;color:white;">' +
                            data.result.file_name + ' ('+data.result.file_size+' kb)'+
                            '<a onclick="DeleteFile(\''+ id_random +'\',\''+ random+'\',\''+data.result.file_name +'\')"><i class="fa fa-trash-o" style="font-size:15px;color:white; margin-left:5px;cursor: pointer;"></i></a></span>';
						jQuery('#files').html(html_file);
						jQuery('#files').show();
                    }
                }
            }
        }).prop('disabled', !jQuery.support.fileInput).parent().addClass(jQuery.support.fileInput ? undefined : 'disabled');

		jQuery('#btn_save_profile').on('click', function ()
        {
            ValidateFrm('frm1');
			if (jQuery("#frm1").valid())
			{
                var table='person';
				var id=jQuery('#id_person').val();

				if(id=='')
				var type='INSERT';
				else
				var type='UPDATE';

                var array_inputs=jQuery('#frm1').find('input[datafld!=ignore], select[datafld!=ignore]').serialize();
                var url = 'User/SaveProfile';
                var data = array_inputs+'&table='+table+'&type='+type+'&pk_id_person='+id;

                data = data + '&update_sessions=0';

				var target = document.getElementById('container');
				var spinner = new Spinner(opts).spin(target);

				jQuery.ajax({
					type: "POST",
					dataType: "html",
					url: url,
					data:data
				}).done(function(response, textStatus, jqXHR)
				{
                    if(jQuery.isNumeric(response))
                    {
                        jQuery('#id_person').val(response);

                        jQuery('#files').hide('slow',function() {
                            jQuery('#files').html('');
                        });
                        if(jQuery('#id_person').val()=='')jQuery('#random').val('');else jQuery('#random').val('no');

                        ShowPhoto(response);
                        RebuildHeader();
                        alertify.success('Data Saved.');

                        if('<?php print $role;?>'=='worker')
                        {
                            LoadDataEmployment(jQuery('#id_person').val());
                            jQuery('#tab3').show().tab('show');
                            jQuery('#s2').removeClass('active').addClass('fade');
                            jQuery('#s3').removeClass('fade').addClass('active');
                            goToByScroll('tab3');
                        }
                        else if('<?php print $role;?>'=='patient')
                        {
                            LoadDataClientPreference(jQuery('#id_person').val());
                            jQuery('#tab3').show().tab('show');
                            jQuery('#s2').removeClass('active').addClass('fade');
                            jQuery('#s3').removeClass('fade').addClass('active');
                            goToByScroll('tab3');
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

		function ShowPhoto(id_person='')
		{
			d = new Date();
			if(id_person!='')
			{//alert("<?php print base_url('/assets/upload/person_photo/photo_');?>"+id_person+".jpg?"+d.getTime());
				jQuery(".photo_person").attr("src", "<?php print base_url('/assets/upload/person_photo/photo_');?>"+id_person+".jpg?"+d.getTime());
			}
			else
			jQuery(".photo_person").attr("src", "<?php if(isset($data['profile']['data']->id_person))print base_url('/assets/upload/person_photo/photo_'.$data['profile']['data']->id_person.'.jpg');?>?"+d.getTime());
		}

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

        function LoadDataEmployment(id_person='')
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_employment',view_url:'employee/InputsUpdateEmployment', id_person:id_person}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_employment').html(response);
                }
            });
        }

        function LoadDataClientPreference(id_person='')
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_client_preference',view_url:'client/InputsUpdatePreference', id_person:id_person}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_client_preference').html(response);
                }
            });
        }
    });
</script>