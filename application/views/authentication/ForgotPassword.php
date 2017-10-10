<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$page_title = "Forgot Password";
$position='center';
require_once(APPPATH."views/includes/header.php");
?>

<body>
<div id="wrapper">

    <div class="container text-center" style="margin-top: 90px;">
        <?php require_once(VIEW_URL."includes/banner.php");?>
    </div>

    <fieldset class="container auth">
        <?php echo form_open('', "class='smart-form client-form' id='frm_auth' role='form' method='post'"); ?>
        <div class="fields">
            <strong>Email address</strong>
            <input type="email" class="form-control" name="inp_email" id="inp_email" placeholder="Enter your Email">
        </div>

        <div id="div_sec_question" style="display: none;">

        </div>

        <div id="div_sec_answer" style="display: none;">
            <div class="fields">
                <strong>Security Answer</strong>
                <input type="text" class="form-control" name="inp_answer" id="inp_answer" placeholder="Enter your Answer">
            </div>
        </div>

        <div class="actions">
            <button type="button" id="reset_pass" class="btn btn-lg btn-primary btn-block">
                Continue
            </button>
        </div>

        <fieldset>
            <div class="text-center">
                <a href="<?php echo CTR_URL; ?>Authentication">Back to Login</a>
            </div>
        </fieldset>

        <?php require_once(VIEW_URL."includes/hidden.php");?>
        <?php echo form_close(); ?>
    </div>

</div>

<?php require_once(VIEW_URL."includes/footer.php");?>

<script type="text/javascript">
    $(function()
    {
        $("#frm_auth").validate(
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


    $(document).ready(function()
    {
        $('#reset_pass').on('click', function(e)
        {
            if($('#div_sec_question').css('display') == 'none')
            {
                if ($("#frm_auth").valid())
                {
                    request = $.ajax({
                        url: 'ValidateEmail',
                        type: 'POST',
                        data: 'email=' + $('#inp_email').val() + '&send=sec_question_continue'
                    });

                    request.done(function (response, textStatus, jqXHR)
                    {
                        if(response == 'WRONG') {
                            alertify.error('Your email is wrong.');
                        }
                        else {
                            $('#div_sec_question').html(response);
                            alertify.warning('Please, answer your security question.');
                            $("#reset_pass").html('Validate and Send me a link to Reset Password');
                            $("#div_sec_question").css('display', 'block');
                            $("#div_sec_answer").css('display', 'block');
                            $(".my_select2").select2();
                        }
                    });
                }
            }
            else
            {
                if ($("#frm_auth").valid())
                {
                    request = $.ajax({
                        url: 'ValidateEmail',
                        type: 'POST',
                        data: 'email=' + $('#inp_email').val() + '&answer=' + $('#inp_answer').val() + '&send=pass'
                    });

                    request.done(function (response, textStatus, jqXHR)
                    {
                        if(response == 'WRONG_ANS') {
                            alertify.error('Your answer is wrong.');
                        }
                        else if(response == 'EMPTY_ANS') {
                            alertify.error('The field security answer is required.');
                        }
                        else {
                            alertify.success('Please, check your inbox. Has been sent an email to ' + $('#inp_email').val());
                            $('#frm_auth').html('<div class="actions"><a style="color:#fff;" href="<?php echo CTR_URL; ?>Authentication"><div class="btn btn-lg btn-primary btn-block">Return to login</div></a></div>');
                        }
                    });
                }
            }
        });
    });
</script>