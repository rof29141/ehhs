<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$page_title = "Restore Password";
$position='center';
require_once(APPPATH."views/includes/header.php");
?>

<body id="signin" class="clear">
<div id="wrapper">

    <div class="container text-center" style="margin-top: 90px;">
        <?php require_once(VIEW_URL."includes/banner.php");?>
    </div>

    <div class="container auth">
        <?php print form_open('authentication/SaveNewPass', "class='smart-form client-form' name='frm_auth' id='frm_auth' role='form'"); ?>

        <section>
            <div class="fields">
                <strong>Password</strong>
                <input placeholder="New password"  name="txt_pass" id="txt_pass"  type="password"  value=""tabindex="1" class="form-control" required>
            </div>
        </section>

        <section>
            <div class="fields">
                <strong>Confirm Password</strong>
                <input  name="txt_pass1" id="txt_pass1"  type="password" tabindex="2" size="15" class="form-control" required placeholder="Confirm your password" />
            </div>
        </section>

        <div class="actions">
            <input type="hidden" id="inp_token" name="inp_token" value="<?php print $token; ?>">
            <input type="hidden" id="inp_id" name="inp_id" value="<?php print $id; ?>">
            <button type="submit" id='restore_pass' name='restore_pass'class="btn btn-lg btn-primary btn-block">
                 Reset Password
            </button>
        </div>

        <?php require_once(VIEW_URL."includes/hidden.php");?>
        <?php print form_close(); ?>
    </div>

</div>

<?php require_once(VIEW_URL."includes/footer.php");?>

<script type="text/javascript">
    $(function()
    {
        $("#frm_auth").validate({
            // Rules for form validation
            rules: {
                txt_pass: {
                    required: true
                },
                txt_pass1: {
                    required: true,
                    equalTo: "#txt_pass"
                },

            },

            // Messages for form validation
            messages: {
                txt_pass: {
                    required: 'Please enter your new password'
                },
                txt_pass1: {
                    required : 'Please confirm your password',
                    equalTo : 'Please insert the same password'
                },
            },

            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
    });
</script>