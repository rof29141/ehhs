<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$page_title = "Login";
$position='center';
require_once(APPPATH."views/includes/header.php");
?>

<body >
<div id="wrapper">

    <div class="container text-center col col-lg-12" style="margin-top: 90px;">
        <span class="" style="padding: 0px;"><img style="max-width: 300px;margin-right: 5px;" src="<?php print $src_logo;?>" /></span>
    </div>

    <div class="col col-xs-12 col-sm-12 col-md-5 col-lg-4 col-md-offset-1 col-lg-offset-2" style="padding-top: 30px;" align="justify">
        <p>Advanced Cosmetic Surgery & Laser Center brings out the best in you by providing surgical and non-surgical treatments that achieve your goal of a more refreshing, youthful and beautiful you. Dr. Jon E. Mendelsohn is a double board-certified facial plastic surgeon specializing in both facial plastic surgery and non-surgical facial procedures.</p>
        <p>You can complete your <a href="<?php print CTR_URL; ?>User/GoPersonalInfoWoutLogin">Personal Contact Information</a> before your arrival will help save you time and allow us to spend more valuable time with you during your consultation.</p>

    </div>


    <div class="container auth col  col-md-6 col-lg-6">
        <?php print form_open('authentication/Verify', "class='form-signin' id='frm_auth' role='form'"); ?>
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
                    Sign in to your account <span style="vertical-align: middle" class="entypo-login"></span>
                </button>
            </div>

            <fieldset>
                <div class="text-center">
                    Forgot
                    <a href="<?php print CTR_URL; ?>Authentication/ForgotUser">User ID</a>
                    or
                    <a href="<?php print CTR_URL; ?>Authentication/ForgotPassword">Password?</a>
                </div>
                <div class="text-center">
                    <a href="<?php print CTR_URL; ?>Authentication/ResetPassword">Reset Password</a>
                </div>
            </fieldset>

        <?php require_once(VIEW_URL."includes/hidden.php");?>
        <?php print form_close(); ?>
    </div>

</div>


<?php require_once(VIEW_URL."includes/footer.php");?>
<?php require_once(VIEW_URL."includes/footer_scripts.php");?>

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