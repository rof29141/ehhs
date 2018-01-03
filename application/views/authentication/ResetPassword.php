<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$page_title = "Reset Password";
$position='center';
require_once(APPPATH."views/includes/header.php");
?>

<body >
<div id="wrapper">

    <div class="container text-center" style="margin-top: 90px;">
        <?php require_once(VIEW_URL."includes/banner.php");?>
    </div>

    <div class="container auth" style="padding-left: 40px;padding-right: 40px;">
        <?php print form_open('authentication/ResetNewPass', "class='form-signin' id='frm_auth' role='form'"); ?>
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

            <section>
                <div class="fields">
                    <strong>New Password</strong>
                    <input placeholder="Enter your New password"  name="txt_pass" id="txt_pass"  type="password"  value="" class="form-control" >
                </div>
            </section>

            <section>
                <div class="fields">
                    <strong>Confirm New Password</strong>
                    <input  name="txt_pass1" id="txt_pass1"  type="password"  size="15" class="form-control" placeholder="Confirm your password" />
                </div>
            </section>

            <div class="actions">
                <button type="submit" class="btn btn-lg btn-primary btn-block">
                    Change Password
                </button>
            </div>

            <fieldset>
                <div class="text-center">
                    <a href="<?php print CTR_URL; ?>Authentication">Back to Login</a>
                </div>
            </fieldset>

        <?php require_once(VIEW_URL."includes/hidden.php");?>
        <?php print form_close(); ?>
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
				email : {
					required : 'Please enter your User ID.'
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

    $(document).ready(function()
    {

    });

</script>