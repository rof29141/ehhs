
<div class="col-sm-12">

    <h5 style="text-align: center; color: red;">If you don't have nothing to change just click on the Next button.</h5>

	<div class="row">   
		<section class="col col-6">
			<label class="input">
				<label>Username</label>
				<input type="text" name="user" id="user" class="form-control required" <?php if(!isset($data['user']['data']->user) || $data['user']['data']->user!='')print 'disabled';?> value="<?php if(isset($data['user']['data']->user)) print $data['user']['data']->user;?>" />
				<input type="hidden" name="id_user" id="id_user" class="form-control required"  value="<?php if(isset($data['user']['data']->id_user)) print $data['user']['data']->id_user;?>" />
			</label>
		</section>
		
		<section class="col col-6">
			<label class="input">
				<label>Email address</label>
				<input type="text" name="email" id="email" class="form-control required" disabled value="<?php if(isset($data['user']['data']->email)) print $data['user']['data']->email;?>" />
			</label>
		</section>
	</div>

	<div class="row">   
		<section class="col col-6">
			<label class="input">
				<strong>New Password</strong>
				<input placeholder="Enter your New Password"  name="txt_pass" id="txt_pass"  type="password"  value="" class="form-control" autocomplete="off">
			</label>
		</section>
		
		<section class="col col-6">
			<label class="input">
				<strong>Confirm New Password</strong>
				<input  name="txt_pass1" id="txt_pass1"  type="password"  size="15" class="form-control" placeholder="Confirm your New Password" autocomplete="off"/>
			</label>
		</section>
	</div>
	
	<div class="form-group">
		<strong>Rol</strong>
		<select name="rol" id="rol" class="my_select2" style="width: 100%;" disabled>
			<option value="-1"></option>
            <?php
                if(isset($data['user']['data']->rol) && $data['user']['data']->rol!='')
                    $role=$data['user']['data']->rol;
                else
                    $role=$data['role'];
            ?>
			<option <?php if($role=='admin')echo 'selected';?> value="admin">Administrator</option>
			<option <?php if($role=='asist')echo 'selected';?> value="asist">Asistance</option>
			<option <?php if($role=='worker')echo 'selected';?> value="worker">Worker</option>
			<option <?php if($role=='patient')echo 'selected';?> value="patient">Patient</option>
		</select>
	</div>
	
	<div class="form-group">
		<strong>Security Question 1</strong>
		<select name="sec1" id="sec1" class="my_select2" style="width: 100%;">
			<option value="-1"></option>
			<option <?php if(isset($data['user']['data']->sec1) && $data['user']['data']->sec1=='1')echo 'selected';?> value="1">What is the first name of the person you first kissed?</option>
			<option <?php if(isset($data['user']['data']->sec1) && $data['user']['data']->sec1=='2')echo 'selected';?> value="2">What time of the day were you born?</option>
			<option <?php if(isset($data['user']['data']->sec1) && $data['user']['data']->sec1=='3')echo 'selected';?> value="3">In what city or town does your nearest sibling live?</option>
			<option <?php if(isset($data['user']['data']->sec1) && $data['user']['data']->sec1=='4')echo 'selected';?> value="4">What is the last name of the teacher who gave you your first failing grade?</option>
			<option <?php if(isset($data['user']['data']->sec1) && $data['user']['data']->sec1=='5')echo 'selected';?> value="5">What was your childhood nickname?</option>
			<option <?php if(isset($data['user']['data']->sec1) && $data['user']['data']->sec1=='6')echo 'selected';?> value="6">What is the name of your favorite childhood friend?</option>
			<option <?php if(isset($data['user']['data']->sec1) && $data['user']['data']->sec1=='7')echo 'selected';?> value="7">In what city or town did your mother and father meet?</option>
			<option <?php if(isset($data['user']['data']->sec1) && $data['user']['data']->sec1=='8')echo 'selected';?> value="8">What is your favorite team?</option>
			<option <?php if(isset($data['user']['data']->sec1) && $data['user']['data']->sec1=='9')echo 'selected';?> value="9">What is your favorite movie?</option>
			<option <?php if(isset($data['user']['data']->sec1) && $data['user']['data']->sec1=='10')echo 'selected';?> value="10">What was your favorite sport in high school?</option>
			<option <?php if(isset($data['user']['data']->sec1) && $data['user']['data']->sec1=='11')echo 'selected';?> value="11">What was your favorite food as a child?</option>
			<option <?php if(isset($data['user']['data']->sec1) && $data['user']['data']->sec1=='12')echo 'selected';?> value="12">What was the make and model of your first car?</option>
			<option <?php if(isset($data['user']['data']->sec1) && $data['user']['data']->sec1=='13')echo 'selected';?> value="13">What was the name of the hospital where you were born?</option>
			<option <?php if(isset($data['user']['data']->sec1) && $data['user']['data']->sec1=='14')echo 'selected';?> value="14">What was the last name of your third grade teacher?</option>
		</select>
	</div>
	
	<div class="form-group">
		<strong>Answer 1</strong>
		<input name="ans1" id="ans1" class="form-control" type="text" placeholder="Enter a Answer 1" autocomplete="off"/>
	</div>
	
    <div class="form-group">
		<strong>Security Question 2</strong>
		<select name="sec2" id="sec2" class="my_select2" style="width: 100%;">
			<option value="-1"></option>
			<option <?php if(isset($data['user']['data']->sec2) && $data['user']['data']->sec2=='1')echo 'selected';?> value="1">What is the first name of the person you first kissed?</option>
			<option <?php if(isset($data['user']['data']->sec2) && $data['user']['data']->sec2=='2')echo 'selected';?> value="2">What time of the day were you born?</option>
			<option <?php if(isset($data['user']['data']->sec2) && $data['user']['data']->sec2=='3')echo 'selected';?> value="3">In what city or town does your nearest sibling live?</option>
			<option <?php if(isset($data['user']['data']->sec2) && $data['user']['data']->sec2=='4')echo 'selected';?> value="4">What is the last name of the teacher who gave you your first failing grade?</option>
			<option <?php if(isset($data['user']['data']->sec2) && $data['user']['data']->sec2=='5')echo 'selected';?> value="5">What was your childhood nickname?</option>
			<option <?php if(isset($data['user']['data']->sec2) && $data['user']['data']->sec2=='6')echo 'selected';?> value="6">What is the name of your favorite childhood friend?</option>
			<option <?php if(isset($data['user']['data']->sec2) && $data['user']['data']->sec2=='7')echo 'selected';?> value="7">In what city or town did your mother and father meet?</option>
			<option <?php if(isset($data['user']['data']->sec2) && $data['user']['data']->sec2=='8')echo 'selected';?> value="8">What is your favorite team?</option>
			<option <?php if(isset($data['user']['data']->sec2) && $data['user']['data']->sec2=='9')echo 'selected';?> value="9">What is your favorite movie?</option>
			<option <?php if(isset($data['user']['data']->sec2) && $data['user']['data']->sec2=='10')echo 'selected';?> value="10">What was your favorite sport in high school?</option>
			<option <?php if(isset($data['user']['data']->sec2) && $data['user']['data']->sec2=='11')echo 'selected';?> value="11">What was your favorite food as a child?</option>
			<option <?php if(isset($data['user']['data']->sec2) && $data['user']['data']->sec2=='12')echo 'selected';?> value="12">What was the make and model of your first car?</option>
			<option <?php if(isset($data['user']['data']->sec2) && $data['user']['data']->sec2=='13')echo 'selected';?> value="13">What was the name of the hospital where you were born?</option>
			<option <?php if(isset($data['user']['data']->sec2) && $data['user']['data']->sec2=='14')echo 'selected';?> value="14">What was the last name of your third grade teacher?</option>
		</select>
	</div>
	
	<div class="form-group">
		<strong>Answer 2</strong>
		<input name="ans2" id="ans2" class="form-control" type="text" placeholder="Enter a Answer 2" autocomplete="off"/>
	</div>
	
	<div class="form-group">
		<strong>Security Question 3</strong>
		<select name="sec3" id="sec3" class="my_select2" style="width: 100%;">
			<option value="-1"></option>
			<option <?php if(isset($data['user']['data']->sec3) && $data['user']['data']->sec3=='1')echo 'selected';?> value="1">What is the first name of the person you first kissed?</option>
			<option <?php if(isset($data['user']['data']->sec3) && $data['user']['data']->sec3=='2')echo 'selected';?> value="2">What time of the day were you born?</option>
			<option <?php if(isset($data['user']['data']->sec3) && $data['user']['data']->sec3=='3')echo 'selected';?> value="3">In what city or town does your nearest sibling live?</option>
			<option <?php if(isset($data['user']['data']->sec3) && $data['user']['data']->sec3=='4')echo 'selected';?> value="4">What is the last name of the teacher who gave you your first failing grade?</option>
			<option <?php if(isset($data['user']['data']->sec3) && $data['user']['data']->sec3=='5')echo 'selected';?> value="5">What was your childhood nickname?</option>
			<option <?php if(isset($data['user']['data']->sec3) && $data['user']['data']->sec3=='6')echo 'selected';?> value="6">What is the name of your favorite childhood friend?</option>
			<option <?php if(isset($data['user']['data']->sec3) && $data['user']['data']->sec3=='7')echo 'selected';?> value="7">In what city or town did your mother and father meet?</option>
			<option <?php if(isset($data['user']['data']->sec3) && $data['user']['data']->sec3=='8')echo 'selected';?> value="8">What is your favorite team?</option>
			<option <?php if(isset($data['user']['data']->sec3) && $data['user']['data']->sec3=='9')echo 'selected';?> value="9">What is your favorite movie?</option>
			<option <?php if(isset($data['user']['data']->sec3) && $data['user']['data']->sec3=='10')echo 'selected';?> value="10">What was your favorite sport in high school?</option>
			<option <?php if(isset($data['user']['data']->sec3) && $data['user']['data']->sec3=='11')echo 'selected';?> value="11">What was your favorite food as a child?</option>
			<option <?php if(isset($data['user']['data']->sec3) && $data['user']['data']->sec3=='12')echo 'selected';?> value="12">What was the make and model of your first car?</option>
			<option <?php if(isset($data['user']['data']->sec3) && $data['user']['data']->sec3=='13')echo 'selected';?> value="13">What was the name of the hospital where you were born?</option>
			<option <?php if(isset($data['user']['data']->sec3) && $data['user']['data']->sec3=='14')echo 'selected';?> value="14">What was the last name of your third grade teacher?</option>
		</select>
	</div>
	
	<div class="form-group">
		<strong>Answer 3</strong>
		<input name="ans3" id="ans3" class="form-control" type="text" placeholder="Enter a Answer 3" autocomplete="off"/>
	</div> 
    
	<div class="form-group pull-right">
		<button type="button" id="btn_save_account" class="btn btn-primary">Next <span style="vertical-align: middle;font-size: 16px;" class="icon-control-forward"></span></button>
	</div>
   
</div>

<script type="text/javascript">
    jQuery(document).ready(function()
    {
        jQuery(".my_select2").select2({
            placeholder: {
                id: '-1',
                text: 'Select an option.'
            }
        });

        jQuery("#frm").validate(
        {
            rules: {
                email: {required: true, email: true},
                user: {required: true},
                txt_pass1: {equalTo: "#txt_pass"}
            },

            messages: {
                email: {
                    required: 'Please enter your Email address.',
                    email: 'Please enter a VALID Email address'
                },
                user: {required: 'Please enter a Username'},
                txt_pass1: {equalTo: 'Please insert the same password'}
            },

            // Do not change code below
            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            }
        });


        jQuery('#btn_save_account').on('click', function (e)
        {
            SaveUser();
        });


        function SaveUser()
        {
            var id_user=jQuery('#id_user').val();
            var pass=jQuery('#txt_pass').val();
            var pass1=jQuery('#txt_pass').val();

            var sec1=jQuery('#sec1').val();
            var sec2=jQuery('#sec2').val();
            var sec3=jQuery('#sec3').val();

			var ans1=jQuery('#ans1').val();
            var ans2=jQuery('#ans2').val();
            var ans3=jQuery('#ans3').val();

            var data='';

            if(pass!='')data = 'pass='+pass;

            if(sec1!='')data = data+'&sec1='+sec1;
            if(sec2!='')data = data+'&sec2='+sec2;
            if(sec3!='')data = data+'&sec3='+sec3;

            if(ans1!='')data = data+'&ans1='+ans1;
            if(ans2!='')data = data+'&ans2='+ans2;
            if(ans3!='')data = data+'&ans3='+ans3;

            if(jQuery('#frm').valid())
            {
                if (pass != '' || pass1 != '' || ans1 != '' || ans2 != '' || ans3 != '') {
                    data = data + '&type=UPDATE&table=user' + '&pk_id_user=' + id_user;

                    jQuery.ajax({
                        type: "POST",
                        dataType: "html",
                        url: 'User/SaveAccount',
                        data: data
                    }).done(function (response, textStatus, jqXHR) {
                        if (response == '0') {
                            alertify.success('Data saved.');


                        }
                        else
                            alertify.error('Something is wrong: ' + response);
                    }).fail(function (jqHTR, textStatus, thrown) {
                        alertify.error('Something is wrong with AJAX:' + textStatus);
                    });
                }

                jQuery('#tab2').show().tab('show');
                jQuery('#s1').removeClass('active').addClass('fade');
                jQuery('#s2').removeClass('fade').addClass('active');
                goToByScroll('tab2');
            }
        }
    });
</script>