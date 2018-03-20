<form class="reg-page" id='frm_auth'>
    <div class="reg-header">
        <h2>Recover Account by Email or Username</h2>
    </div>

    <div class="col-md-12 input-group margin-bottom-5">
        <strong>Username</strong>
        <input name="user" id="user" class="form-control" type="text" placeholder="Enter your registered Username" autocomplete="off"/>
    </div>
	
	<div class="col col-xs-12 col-lg-12">
		<div class="text-center">
			Or
		</div>
	</div>
   
	<div class="col-md-12 input-group margin-bottom-5">
        <strong>Email</strong>
        <input name="email" id="email" class="form-control" type="text" placeholder="Enter your registered Email" autocomplete="off"/>
    </div>
   
	<div id="questions_aswers" style="display: none;"></div>

    <div class="row">
        <div class="col-md-12">
			<button type="button" id="btn_show" class="btn-u pull-right">
				Show security questions
			</button>

			<button type="button" id="btn_recover" class="btn-u pull-right" style="display: none;">
				Recover my account
			</button>
        </div>
    </div>

    <hr>

    <div class="text-center">
        <a onclick="LoadContent('Authentication/GoLogin', 0, 'div_auth')">Back To Login</a>
    </div>
</form>

<script type="text/javascript">

    jQuery(document).ready(function()
    {
        jQuery('#btn_show').on('click', function()
        {
            if(jQuery('#user').val()!='' || jQuery('#email').val()!='')
            {
                var target = document.getElementById('wrapper');
                var spinner = new Spinner(opts).spin(target);
                var user_email='';

                if(jQuery('#email').val()!='')
                {
                    var url='Authentication/ValidateEmail';
                    var data={email:jQuery('#email').val(), send:'recover'};
                }
                else if(jQuery('#user').val()!='')
                {
                    var url='Authentication/ValidateUserID';
                    var data={user:jQuery('#user').val(), type:'recover'};
                }

                jQuery.ajax({
                    url:url,
                    type:'POST',
                    data:data
                }).done(function(response, textStatus, jqXHR)
                {
                    if(jQuery('#email').val()!='')
                    {
                        user_email='email';
                    }
                    else if(jQuery('#user').val()!='')
                    {
                        user_email='user';
                    }

                    if (response == 'WRONG') {
                        alertify.error('Your '+user_email+' is wrong.');
                    }
                    else if (response == 'EMPTY') {
                        alertify.error('The field '+user_email+' is required.');
                    }
                    else if (response == 'SEC_EMPTY') {
                        alertify.error('Your account have at least 1 Security Questions blank, please call the office to recover your account.');
                    }
                    else
                    {
                        jQuery('#questions_aswers').html(response);
                        jQuery('#questions_aswers').show(500);
                        jQuery('#btn_show').hide();
                        jQuery('#btn_recover').show();
                    }

                    spinner.stop();
                });
            }
            else
            alertify.error('You have to enter a registered Username or your Email address.');
        });

        jQuery('#btn_recover').on('click', function()
        {
            if(jQuery("#frm_auth").valid())
            {
                if(jQuery('#user').val()!='')
                {
                    var user_email='user';
                    var search=jQuery('#user').val();
                }
                else if(jQuery('#email').val()!='')
                {
                    var user_email='email';
                    var search=jQuery('#email').val();
                }

                var data={user_email:user_email, search:search, ans1:jQuery('#ans1').val(), ans2:jQuery('#ans2').val(), ans3:jQuery('#ans3').val()};

                jQuery.ajax({
                    url:'Authentication/ValidateSecAnswers',
                    type:'POST',
                    data:data
                }).done(function(response, textStatus, jqXHR)
                {
                    if(response == 'ANW1_WRONG')
                        alertify.error('Your answer 1 is wrong.');
                    else if(response == 'ANW2_WRONG')
                        alertify.error('Your answer 2 is wrong.');
                    else if(response == 'ANW3_WRONG')
                        alertify.error('Your answer 3 is wrong.');
                    else if(response == 'EMPTY')
                        alertify.error('You have to fill all answers.');
                    else
                    {
                        alertify.alert("<div class='text-center'><h3>Your new credentials are:</h3><h4>"+response+"</h4><br>You can change your email address for a new one if you don't have access.</div>", function()
                        {
                            LoadContent('Authentication/GoLogin', 0, 'div_auth');
                        });
                    }
                });
            }
        });
    });
</script>