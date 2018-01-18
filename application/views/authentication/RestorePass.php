<form class="reg-page" id='frm_auth'>
    <div class="reg-header">
        <h2>Restore Password</h2>
    </div>
	
	 <div class="col-md-12 input-group margin-bottom-5">
        <strong>Password</strong>
		<input placeholder="New password"  name="txt_pass" id="txt_pass"  type="password"  value=""tabindex="1" class="form-control" required>
	</div>
	
	 <div class="col-md-12 input-group margin-bottom-5">
        <strong>Confirm Password</strong>
        <input  name="txt_pass1" id="txt_pass1"  type="password" tabindex="2" size="15" class="form-control" required placeholder="Confirm your password" />
	</div>

    <div class="row">

        <div class="col-md-12">
			<input type="hidden" id="inp_token" name="inp_token" value="<?php print $token; ?>">
            <input type="hidden" id="inp_id" name="inp_id" value="<?php print $id; ?>">
            <button class="btn-u pull-right" id='restore_pass' type="button">Reset Password</button>
        </div>
    </div>

    <hr>

    <div class="text-center">
        <a onclick="LoadContent('Authentication/GoLogin', 0, 'div_auth')">Back To Login</a>
    </div>
</form>

<script type="text/javascript">
    jQuery(function()
    {
        jQuery("#frm_auth").validate({
            // Rules for form validation
            rules: {
                txt_pass: {
                    required: true
                },
                txt_pass1: {
                    required: true,
                    equalTo: "#txt_pass"
                },

            },

            // Messages for form validation
            messages: {
                txt_pass: {
                    required: 'Please enter your new password'
                },
                txt_pass1: {
                    required : 'Please confirm your password',
                    equalTo : 'Please insert the same password'
                },
            },

            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
		
		jQuery('#restore_pass').on('click', function(e)
        {
            if(jQuery("#frm_auth").valid())
            {
                request=jQuery.ajax({
                    url:'Authentication/SaveNewPass',
                    type:'POST',
                    data:'txt_pass='+jQuery('#txt_pass').val()+'&inp_token='+jQuery('#inp_token').val()+'&inp_id='+jQuery('#inp_id').val()
                });

                request.done(function(response, textStatus, jqXHR)
                {
                    if(response == 'OK') {
						alertify.success('Password changed.');
                        LoadContent('Authentication/GoLogin', 0, 'div_auth')
                    }
                    else {
                        alertify.error(response);
                    }
                });
            }
        });
    });
</script>