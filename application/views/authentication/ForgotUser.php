<form class="reg-page" id='frm_auth'>
    <div class="reg-header">
        <h2>Forgot Username</h2>
    </div>

    <div class="col-md-12 input-group margin-bottom-5">
        <strong>Email address</strong>
        <input type="email" class="form-control" name="inp_email" id="inp_email" placeholder="Enter your Email" value="<?php if(isset($email))echo $email;?>">
    </div>
    
    <div class="row">

        <div class="col-md-12">
            <button class="btn-u pull-right" id="send_user" type="button">Send me the Username</button>
        </div>
    </div>

    <hr>

    <div class="text-center">
		<a onclick="LoadContent('Authentication/GoRecoverAccount', 0, 'div_auth')">Don't have access to this email?</a><br>
        <a onclick="LoadContent('Authentication/GoLogin', 0, 'div_auth')">Back To Login</a>
    </div>
</form>

<script type="text/javascript">
    jQuery(function()
    {
        jQuery("#frm_auth").validate(
        {
            rules : {
                inp_email : {
                    required : true,
                    email : true
                }
            },
            messages : {
                inp_email : {
                    required : 'Please enter your email address',
                    email : 'Please enter a VALID email address'
                }
            },
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
    });


    jQuery(document).ready(function()
    {
        jQuery('#send_user').on('click', function(e)
        {
            if(jQuery("#frm_auth").valid())
            {
                request=jQuery.ajax({
                    url:'Authentication/ValidateEmail',
                    type:'POST',
                    data:'email='+jQuery('#inp_email').val()+'&send=user'
                });

                request.done(function(response, textStatus, jqXHR)
                {
                    if(response == 'WRONG') {
                        alertify.error('Your email is wrong.');
                    }
                    else if(response == 'EMPTY') {
                        alertify.error('The field email is required.');
                    }
                    else {
                        alertify.success('Please, check your inbox. Has been sent an email to ' + jQuery('#inp_email').val());
                        jQuery('#frm_auth').html('<div class="actions"><a style="color:#fff;" onclick="LoadContent(\'Authentication/GoLogin\', 0, \'div_auth\')"><div class="btn-u pull-right">Return to login</div></a></div>');
                    }
                });
            }
        });
    });
</script>