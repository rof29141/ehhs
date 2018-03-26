
<div class="col-sm-12">

    <div class="row">
		<section class="col col-6">
			<label class="input">
				<label>Username</label>
				<input placeholder="Enter the Username"type="text" name="user" id="user" class="form-control required" />
                <input type="hidden" name="id_user" id="id_user" class="form-control required"  value="" />
			</label>
		</section>
		
		<section class="col col-6">
			<label class="input">
				<label>Email address</label>
				<input placeholder="Enter the Email address" type="text" name="email" id="email" class="form-control required" />
			</label>
		</section>
	</div>

	<div class="row">   
		<section class="col col-6">
			<label class="input">
				<strong>New Password</strong>
				<input placeholder="Enter the Password"  name="txt_pass" id="txt_pass"  type="password"  value="" class="form-control required" autocomplete="off">
			</label>
		</section>
		
		<section class="col col-6">
			<label class="input">
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
			</label>
		</section>
	</div>
    
    <div class="row">

        <div class="col-md-12">
            <button type="button" id="btn_save_account" class="btn-u pull-right">Next <span style="vertical-align: middle;font-size: 16px;" class="icon-control-forward"></span></button>
            <input type="hidden" name="ok_mail" id="ok_mail" value="1">
            <input type="hidden" name="ok_user" id="ok_user" value="1">
        </div>
    </div>

</div>

<script type="text/javascript">
    jQuery(document).ready(function() {
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
                user: {required: true}
            },

            messages: {
                email: {
                    required: 'Please enter an email address.',
                    email: 'Please enter a valid email address'
                },
                user: {required: 'Please enter a Username'}
            },

            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            }
        });

        jQuery('#btn_save_account').on('click', function (e) {
            CheckExistEmail();CheckExistUserID();SaveUser();
        });

        function SaveUser()
        {
            if(jQuery('#ok_mail').val()==1 && jQuery('#ok_user').val()==1)
            {
                var user = jQuery('#user').val();
                var email = jQuery('#email').val();
                var pass = jQuery('#txt_pass').val();
                var role = jQuery('#rol').val();

                var data = '';

                data = 'user=' + user;
                data = data + '&email=' + email;
                data = data + '&pass=' + pass;
                data = data + '&rol=' + role;

                if (jQuery('#frm').valid())
                {
                    var target = document.getElementById('container');
                    var spinner = new Spinner(opts).spin(target);

                    data = data + '&type=INSERT&table=user';

                    jQuery.ajax({
                        type: "POST",
                        dataType: "html",
                        url: 'User/SaveAccount',
                        data: data
                    }).done(function (response, textStatus, jqXHR)
                    {
                        if(jQuery.isNumeric(response) && response>0)
                        {
                            jQuery('#id_user').val(response);
                            alertify.success('Data saved.');
                            LoadDataProfile(response, role);
                        }
                        else{alertify.error('Error: The element could not be Saved. '+ response);}
                        spinner.stop();

                    }).fail(function (jqHTR, textStatus, thrown) {
                        alertify.error('Something is wrong with AJAX:' + textStatus);
                    });

                    jQuery('#tab2').show().tab('show');
                    jQuery('#s1').removeClass('active').addClass('fade');
                    jQuery('#s2').removeClass('fade').addClass('active');
                    goToByScroll('tab2');
                }
            }
            else
                jQuery('html, body').animate({
                    scrollTop: jQuery('#email').offset().top-200
                }, 1000);
        }

        function LoadDataProfile(id_user, role)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_profile',view_url:'user/InputsUpdateProfile',id_user:id_user,role:role}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_profile').html(response);
                }
            });
        }

        jQuery('#user').on('keyup click blur', function (e)
        {
            CheckExistUserID();
        });

        jQuery('#email').on('keyup click blur', function (e)
        {
            CheckExistEmail();
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

                    if(response=='EXIST')
                    {
                        jQuery('<em class="invalid" style="top:0px;position:relative" id="em_user">This Username already exists.</em>').insertAfter('#user');
                        jQuery('#ok_user').val('0');
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

            if(email.length>8)
            {
                jQuery.ajax({
                    type: "POST",
                    dataType: "html",
                    url: 'Authentication/CheckExistEmail',
                    data:{email:email}
                }).done(function(response, textStatus, jqXHR)
                {
                    jQuery('#em_email').empty();

                    if(response=='EXIST')
                    {
                        jQuery('<em class="invalid" style="top:0px;position:relative" id="em_email">This Email already exists.</em>').insertAfter('#email');
                        jQuery('#ok_mail').val('0');
                    }
                    else
                    {jQuery('#ok_mail').val('1');}

                }).fail(function(jqHTR, textStatus, thrown)
                {
                    alertify.error('Something is wrong with AJAX:' + textStatus);
                });
            }
        }
    });
</script>