<form class="reg-page" id='frm_auth'>
    <div class="reg-header">
        <h2><?php print $language['main_msg_login'];?></h2>
    </div>

    <div class="input-group margin-bottom-5">
        <span class="input-group-addon"><i style='font-size:13px;' class="fa fa-user"></i></span>
        <input type="text" name="user" id="user" placeholder="<?php print $language['main_label_user'];?>" class="form-control">
    </div>
    <div class="input-group margin-bottom-5">
        <span class="input-group-addon" ><i style='font-size:16px;' class="fa fa-lock"></i></span>
        <input type="password" name="pass" id="pass" placeholder="<?php print $language['main_label_pass'];?>" class="form-control">
    </div>

    <div class="row">
        <div class="col-md-6">
            <a onclick="LoadContent('Authentication/GoSignUp', 0, 'auth')">Create account</a>
        </div>
        <div class="col-md-6">
            <button class="btn-u pull-right" id='btn_login' type="button">Login</button>
        </div>
    </div>

    <hr>

    <div class="text-center">
        Forgot
        <a onclick="LoadContent('Authentication/GoForgotUser', 0, 'auth')">User ID</a>
        or
        <a onclick="LoadContent('Authentication/GoForgotPassword', 0, 'auth')">Password?</a>
    </div>
    <div class="text-center">
        <a onclick="LoadContent('Authentication/GoResetPassword', 0, 'auth')">Reset Password</a>
    </div>
</form>
<script type="text/javascript">
	jQuery(function() {

		jQuery("#frm_auth").validate(
        {

			rules : {
				email : {
					required : true
				},
				password : {
					required : true,
					minlength : 3,
					maxlength : 20
				}
			},

			messages : {
				email : {
					required : 'Please enter your email address.'
				},
				password : {
					required : 'Please enter your password.'
				}
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			}
		});
    });

    jQuery(document).ready(function()
    {
		jQuery('#btn_login').on('click', function(e)
        {
            if(jQuery("#frm_auth").valid())
            {
                request=jQuery.ajax({
                    url:'Authentication/Verify',
                    type:'POST',
                    data:'user='+jQuery('#user').val()+'&pass='+jQuery('#pass').val()+'&send=user'
                });

                request.done(function(response, textStatus, jqXHR)
                {
                    if(response == 'LOGGED') 
					{
						alertify.success('Welcome.');
                        jQuery('#auth').html('');
                    }
					else if(response=='WRONG_PASS') {
                        alertify.error('Wrong Password.');
                    }
					else if(response=='WRONG_ID') {
                        alertify.error('Wrong User');
                    }
					else if(response) {
                        alertify.error('Sorry, your account doesn\'t have been activate yet. Has been sent an email to: '+response);
                    }
                });
            }
        });
    });

</script>