<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$page_title = "Login";
$position='center';
require_once(APPPATH."views/includes/header.php");
?>

<body >
<div id="wrapper">

    <div class="container text-center" style="margin-top: 90px;">
        <?php require_once(VIEW_URL."includes/banner.php");?>
    </div>

    <div class="container auth">
        <?php echo form_open('authentication/Verify', "class='form-signin' id='frm_auth' role='form'"); ?>
            <section>
                <div class="fields">
                    <strong>User ID</strong>
                    <input name="email" class="form-control" type="text" placeholder="Enter your User ID" />
                </div>
            </section>

            <section>
                <div class="fields">
                    <strong>Password</strong>
                    <input name="password" class="form-control" type="password" placeholder="Enter your Password" />
                </div>
            </section>


            <div class="actions">
                <button type="submit" class="btn btn-lg btn-primary btn-block">
                    Sign in to your account
                </button>
            </div>

            <fieldset>
                <div class="text-center">
                    Forgot
                    <a href="<?php echo CTR_URL; ?>Authentication/ForgotUser">User ID</a>
                    or
                    <a href="<?php echo CTR_URL; ?>Authentication/ForgotPassword">Password?</a>
                </div>
                <div class="text-center">
                    <a href="<?php echo CTR_URL; ?>Authentication/ResetPassword">Reset Password</a>
                </div>
            </fieldset>

            <br>

            <fieldset>
                <div class="text-center">
                    <a href="<?php echo CTR_URL; ?>Authentication/GoToServices">Our Services</a>
                </div>
            </fieldset>

        <?php require_once(VIEW_URL."includes/hidden.php");?>
        <?php echo form_close(); ?>
    </div>

</div>


<?php require_once(VIEW_URL."includes/footer.php");?>

<script type="text/javascript">
	$(function() {

		$("#frm_auth").validate(
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

    $(document).ready(function()
    {

    });

</script>