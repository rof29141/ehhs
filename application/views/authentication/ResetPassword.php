
<form class="reg-page" id='frm_auth'>
    <div class="reg-header">
        <h2>Forgot User</h2>
    </div>

    <div class="col-md-12 input-group margin-bottom-5">
        <strong>Username</strong>
        <input name="user" id="user" class="form-control" type="text" placeholder="Enter your Username" />
	</div>
    
	 <div class="col-md-12 input-group margin-bottom-5">
        <strong>Password</strong>
        <input name="password" id="password" class="form-control" type="password" placeholder="Enter your Password" />
	</div>
	
	 <div class="col-md-12 input-group margin-bottom-5">
        <strong>New Password</strong>
        <input placeholder="Enter your New password"  name="txt_pass" id="txt_pass"  type="password"  value="" class="form-control" >
	</div>
	
	 <div class="col-md-12 input-group margin-bottom-5">
        <strong>Confirm New Password</strong>
        <input  name="txt_pass1" id="txt_pass1"  type="password"  size="15" class="form-control" placeholder="Confirm your password" />
	</div>

    <div class="row">

        <div class="col-md-12">
            <button class="btn-u pull-right" id="change_pass" type="button">Change Password</button>
        </div>
    </div>

    <hr>

    <div class="text-center">
        <a onclick="LoadContent('Authentication/GoLogin', 0, 'div_auth')">Back To Login</a>
    </div>
</form>

<script type="text/javascript">
	jQuery(function() {

		jQuery("#frm_auth").validate(
        {

			rules : {
				user : {
					required : true
				},
				password : {
					required : true,
					minlength : 3,
					maxlength : 20
				},
                txt_pass: {
                    required: true
                },
                txt_pass1: {
                    required: true,
                    equalTo: "#txt_pass"
                }
			},

			messages : {
				user : {
					required : 'Please enter your Username.'
				},
				password : {
					required : 'Please enter your password.'
				},
                txt_pass: {
                    required: 'Please enter your new password'
                },
                txt_pass1: {
                    required : 'Please confirm your password',
                    equalTo : 'Please insert the same password'
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
		jQuery('#change_pass').on('click', function(e)
        {
            if(jQuery("#frm_auth").valid())
            {
                request=jQuery.ajax({
                    url:'Authentication/ResetNewPass',
                    type:'POST',
                    data:'user='+jQuery('#user').val()+'&password='+jQuery('#password').val()+'&txt_pass='+jQuery('#txt_pass').val()
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