

<form class="reg-page" id='frm_auth'>
    <div class="reg-header">
        <h2>Forgot Password</h2>
    </div>

    <div class="col-md-12 input-group margin-bottom-5">
        <strong>Email address</strong>
        <input type="email" class="form-control" name="inp_email" id="inp_email" placeholder="Enter your Email">
    </div>
    
    <div class="row">

        <div class="col-md-12">
            <button class="btn-u pull-right" id="reset_pass" type="button">Send me a link</button>
        </div>
    </div>

    <hr>

    <div class="text-center">
        <a onclick="LoadContent('Authentication/GoRecoverAccount', 0, 'auth')">Don't have access to this email?</a><br>
        <a onclick="LoadContent('Authentication/GoLogin', 0, 'auth')">Back To Login</a>
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
        jQuery('#reset_pass').on('click', function(e)
        {
            if (jQuery("#frm_auth").valid())
            {
                jQuery.ajax({
                    url: 'Authentication/ValidateEmail',
                    type: 'POST',
                    data: 'email=' + jQuery('#inp_email').val() + '&send=pass'
                }).done(function (response, textStatus, jqXHR)
                {
                    if(response == 'WRONG') {
                        alertify.error('Your email is wrong.');
                    }
                    else {
                        alertify.success('Please, check your inbox. Has been sent an email to ' + jQuery('#inp_email').val());
                        jQuery('#frm_auth').html('<div class="actions"><a style="color:#fff;" onclick="LoadContent(\'Authentication/GoLogin\', 0, \'auth\')"><div class="btn-u pull-right">Return to login</div></a></div>');
                    }
                });
            }
        });
    });
</script>