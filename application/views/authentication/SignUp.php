<form class="reg-page" id='frm_auth'>
    <div class="reg-header">
        <h2>Create Account</h2>
    </div>
    
    <div class="col-md-12 input-group margin-bottom-5">
        <strong>Email</strong>
        <input name="email" id="email" class="form-control" type="email" placeholder="Enter your Email" autocomplete="off"/>
    </div>
    
    <div class="col-md-12 input-group margin-bottom-5">
        <strong>Username</strong>
        <input name="user" id="user" class="form-control" type="text" placeholder="Enter a unique Username" autocomplete="off"/>
    </div>
    
    <div class="col-md-12 input-group margin-bottom-5">
        <strong>New Password</strong>
        <input placeholder="Enter your New Password"  name="txt_pass" id="txt_pass"  type="password"  value="" class="form-control" autocomplete="off">
    </div>
    
    <div class="col-md-12 input-group margin-bottom-5">
        <strong>Confirm New Password</strong>
        <input  name="txt_pass1" id="txt_pass1"  type="password"  size="15" class="form-control" placeholder="Confirm your New Password" autocomplete="off"/>
    </div>
	
	<div class="col-md-12 input-group margin-bottom-5">
		<strong>Worker or Patient?</strong>
		<select name="rol" id="rol" class="my_select2" style="width: 100%;">
			<option value="-1"></option>
			<option selected value="worker">Worker</option>
			<option value="patient">Patient</option>
		</select>
	</div>
	
	<div class="col-md-12 input-group margin-bottom-5">
		<strong>Security Question 1</strong>
		<select name="sec1" id="sec1" class="my_select2" style="width: 100%;">
			<option value="-1"></option>
			<option value="1">What is the first name of the person you first kissed?</option>
			<option value="2">What time of the day were you born?</option>
			<option value="3">In what city or town does your nearest sibling live?</option>
			<option value="4">What is the last name of the teacher who gave you your first failing grade?</option>
			<option value="5">What was your childhood nickname?</option>
			<option value="6">What is the name of your favorite childhood friend?</option>
			<option value="7">In what city or town did your mother and father meet?</option>
			<option value="8">What is your favorite team?</option>
			<option value="9">What is your favorite movie?</option>
			<option value="10">What was your favorite sport in high school?</option>
			<option value="12">What was your favorite food as a child?</option>
			<option value="13">What was the make and model of your first car?</option>
			<option value="14">What was the name of the hospital where you were born?</option>
			<option value="15">What was the last name of your third grade teacher?</option>
		</select>
	</div>
	
	<div class="col-md-12 input-group margin-bottom-5">
		<strong>Answer 1</strong>
		<input name="ans1" id="ans1" class="form-control" type="text" placeholder="Enter a Answer 1" autocomplete="off"/>
	</div>
	
    <div class="col-md-12 input-group margin-bottom-5">
		<strong>Security Question 2</strong>
		<select name="sec2" id="sec2" class="my_select2" style="width: 100%;">
			<option value="-1"></option>
			<option value="1">What is the first name of the person you first kissed?</option>
			<option value="2">What time of the day were you born?</option>
			<option value="3">In what city or town does your nearest sibling live?</option>
			<option value="4">What is the last name of the teacher who gave you your first failing grade?</option>
			<option value="5">What was your childhood nickname?</option>
			<option value="6">What is the name of your favorite childhood friend?</option>
			<option value="7">In what city or town did your mother and father meet?</option>
			<option value="8">What is your favorite team?</option>
			<option value="9">What is your favorite movie?</option>
			<option value="10">What was your favorite sport in high school?</option>
			<option value="12">What was your favorite food as a child?</option>
			<option value="13">What was the make and model of your first car?</option>
			<option value="14">What was the name of the hospital where you were born?</option>
			<option value="15">What was the last name of your third grade teacher?</option>
		</select>
	</div>
	
	<div class="col-md-12 input-group margin-bottom-5">
		<strong>Answer 2</strong>
		<input name="ans2" id="ans2" class="form-control" type="text" placeholder="Enter a Answer 2" autocomplete="off"/>
	</div>
	
	<div class="col-md-12 input-group margin-bottom-5">
		<strong>Security Question 3</strong>
		<select name="sec3" id="sec3" class="my_select2" style="width: 100%;">
			<option value="-1"></option>
			<option value="1">What is the first name of the person you first kissed?</option>
			<option value="2">What time of the day were you born?</option>
			<option value="3">In what city or town does your nearest sibling live?</option>
			<option value="4">What is the last name of the teacher who gave you your first failing grade?</option>
			<option value="5">What was your childhood nickname?</option>
			<option value="6">What is the name of your favorite childhood friend?</option>
			<option value="7">In what city or town did your mother and father meet?</option>
			<option value="8">What is your favorite team?</option>
			<option value="9">What is your favorite movie?</option>
			<option value="10">What was your favorite sport in high school?</option>
			<option value="12">What was your favorite food as a child?</option>
			<option value="13">What was the make and model of your first car?</option>
			<option value="14">What was the name of the hospital where you were born?</option>
			<option value="15">What was the last name of your third grade teacher?</option>
		</select>
	</div>
	
	<div class="col-md-12 input-group margin-bottom-5">
		<strong>Answer 3</strong>
		<input name="ans3" id="ans3" class="form-control" type="text" placeholder="Enter a Answer 3" autocomplete="off"/>
	</div> 
    
    <div class="row">

        <div class="col-md-12">
            <button type="button" id="btn_sign_up" class="btn-u pull-right">
				Sign Up
			</button>
			<input type="hidden" name="ok_mail" id="ok_mail" value="1">
			<input type="hidden" name="ok_user" id="ok_user" value="1">
			<input type="hidden" name="no_promp_mail" id="no_promp_mail" value="yes">
			<input type="hidden" name="no_promp_user" id="no_promp_user" value="yes">
        </div>
    </div>

    <hr>

    <div class="text-center">
		<a onclick="LoadContent('Authentication/GoRecoverAccount', 0, 'div_auth')">Don't have access to this email?</a><br>
        <a onclick="LoadContent('Authentication/GoLogin', 0, 'div_auth')">Back To Login</a>
    </div>
</form>

<script type="text/javascript">

    jQuery(document).ready(function()
    {
        jQuery(".my_select2").select2({
            placeholder: {
                id: '-1',
                text: 'Select an option.'
            }
        });

        jQuery.validator.addMethod("select", function(value, element, arg)
        {
            return arg !== value;
        }, "This field is required. Please, select an option.");

        jQuery("#frm_auth").validate(
        {
            rules :
            {
                email : {required : true,email : true},
                user : {required : true},
                txt_pass: {required: true},
                txt_pass1: {required: true,equalTo: "#txt_pass"},
                sec1: {select: "-1"},
                sec2: {select: "-1"},
                sec3: {select: "-1"},
                ans1:{required:true},
                ans2:{required:true},
                ans3:{required:true}
            },

            messages :
            {
                email : {required : 'Please enter your Email address.', email : 'Please enter a VALID Email address'},
                user : {required : 'Please enter a Username'},
                txt_pass: {required: 'Please enter your new Password'},
                txt_pass1: {required : 'Please confirm your Password', equalTo : 'Please insert the same password'},
                ans1:{required:'Please enter the Answer 1'},
                ans2:{required:'Please enter the Answer 2'},
                ans3:{required:'Please enter the Answer 3'}
            },

            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            },

            ignore: [],
            focusInvalid: false,
            invalidHandler: function(form, validator) {

                if (!validator.numberOfInvalids())
                    return;

                jQuery('html, body').animate({
                    scrollTop: jQuery(validator.errorList[0].element).offset().top-100
                }, 2000);
            }
        });

        jQuery('#user').on('keyup click blur', function (e)
        {
            CheckExistUserID();
        });

        jQuery('#email').on('keyup click blur', function (e)
        {
            CheckExistEmail();
        });

        jQuery('#btn_sign_up').on('click', function (e)
        {
            CheckExistEmail();CheckExistUserID();SaveUser();;
        });

        function CheckExistUserID()
        {
            var user_id=jQuery('#user').val();
			var email=jQuery('#email').val();

            if(user_id.length>3)
            {
                jQuery.ajax({
                    type: "POST",
                    dataType: "html",
                    url: 'Authentication/CheckExistUserID',
                    data:{user_id:user_id}
                }).done(function(response, textStatus, jqXHR)
                {
                    jQuery('#em_user').empty();

                    if(response=='EXIST' && jQuery('#no_promp_user').val()=='yes')
                    {
                        jQuery('<em class="invalid" style="top:0px;position:relative" id="em_user">This Username already exists.</em>').insertAfter('#user');
                        jQuery('#ok_user').val('0');

                        alertify.defaults.theme.ok = "btn btn-success";
                        alertify.confirm("<div class='text-center'><h4>The username </h4><h3>"+user_id+"</h3><h4>already exists in our database.</h4><br><h3>Are you the owner of this user?</h3><br>If 'Yes', you will be redireted to recover your password.</div>", function()
                        {
                            LoadContent('Authentication/GoForgotPassword/'+encodeURI(email), 0, 'div_auth');
                        }
                        ,function()
                        {
                            alertify.error('Declined.');
                            jQuery('#no_promp_user').val('no');
                        })
                        .set({labels:{ok:'Yes', cancel: 'No'}});
                    }
                    else if(response=='EXIST' && jQuery('#no_promp_user').val()=='no')
                    {
                        jQuery('<em class="invalid" style="top:0px;position:relative" id="em_user">This Username already exists.</em>').insertAfter('#user');
                    }
                    else
                    {
                        jQuery('#ok_user').val('1');
                    }
                }).fail(function(jqHTR, textStatus, thrown)
                {
                    alertify.error('Something is wrong with AJAX:' + textStatus);
                });
            }
        }

        function CheckExistEmail()
        {
            var email=jQuery('#email').val();

            if(email.length>12)
            {
                jQuery.ajax({
                    type: "POST",
                    dataType: "html",
                    url: 'Authentication/CheckExistEmail',
                    data:{email:email}
                }).done(function(response, textStatus, jqXHR)
                {
                    jQuery('#em_email').empty();

                    if(response=='EXIST' && jQuery('#no_promp_mail').val()=='yes')
                    {
                        jQuery('<em class="invalid" style="top:0px;position:relative" id="em_email">This Email already exists.</em>').insertAfter('#email');

                        alertify.defaults.theme.ok = "btn btn-success";
                        alertify.confirm("<div class='text-center'><h4>The email address</h4><h3>"+email+"</h3><h4>already exists in our database.</h4><br><h3>Are you the owner of this email?</h3><br>If 'Yes', you will be redireted to recover your Password.</div>", function()
                        {
                            LoadContent('Authentication/GoForgotPassword/'+encodeURI(email), 0, 'div_auth');
                        }
                        ,function()
                        {
                            alertify.error('Declined.');
                            jQuery('#no_promp_mail').val('no');
                            jQuery('#ok_mail').val('0');
                        })
                        .set({labels:{ok:'Yes', cancel: 'No'}});
                    }
                    else if(response=='EXIST' && jQuery('#no_promp_mail').val()=='no')
                    {
                        jQuery('<em class="invalid" style="top:0px;position:relative" id="em_email">This Email already exists.</em>').insertAfter('#email');
                    }
                    else
                    {jQuery('#ok_mail').val('1');}

                }).fail(function(jqHTR, textStatus, thrown)
                {
                    alertify.error('Something is wrong with AJAX:' + textStatus);
                });
            }
        }

        function SaveUser()
        {
            if(jQuery('#ok_mail').val()==1 && jQuery('#ok_user').val()==1)
            {
                var data = jQuery('#frm_auth').find('input[datafld!=ignore], select[datafld!=ignore]').serialize();

                jQuery.ajax({
                    type: "POST",
                    dataType: "html",
                    url: 'Authentication/CreateAccount',
                    data: data
                }).done(function (response, textStatus, jqXHR) {
                    if (response == 'CREATED') {
						alertify.success('Thank you for Signing Up! Please check your email to activate your account.');
                        LoadContent('Authentication/GoLogin', 0, 'div_auth')
                    }
                }).fail(function (jqHTR, textStatus, thrown) {
                    alertify.error('Something is wrong with AJAX:' + textStatus);
                });
            }
            else
                jQuery('html, body').animate({
                    scrollTop: jQuery('#email').offset().top-200
                }, 1000);
        }
    });

</script>