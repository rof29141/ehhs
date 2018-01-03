<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$page_title = "Forgot User";
$position='center';
require_once(APPPATH."views/includes/header.php");
?>

<body>
<div id="wrapper">

    <div class="container text-center" style="margin-top: 90px;">
        <?php require_once(VIEW_URL."includes/banner.php");?>
    </div>

    <fieldset class="container auth" style="padding-left: 40px;padding-right: 40px;">
        <?php print form_open('', "class='smart-form client-form' id='frm_auth' role='form' method='post'"); ?>
        <div class="fields">
            <strong>Email address</strong>
            <input type="email" class="form-control" name="inp_email" id="inp_email" placeholder="Enter your Email">
        </div>


        <div class="actions">
            <button type="button" id="send_user" class="btn btn-lg btn-primary btn-block">
                Send me the User ID
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
        $('#send_user').on('click', function(e)
        {
            if($("#frm_auth").valid())
            {
                request=$.ajax({
                    url:'ValidateEmail',
                    type:'POST',
                    data:'email='+$('#inp_email').val()+'&send=user'
                });

                request.done(function(response, textStatus, jqXHR)
                {
                    if(response == 'WRONG') {
                        alertify.error('Your email is wrong.');
                    }
                    else if(response == 'EMPTY') {
                        alertify.error('The field email is required.');
                    }
                    else {
                        alertify.success('Please, check your inbox. Has been sent an email to ' + $('#inp_email').val());
                        $('#frm_auth').html('<div class="actions"><a style="color:#fff;" href="<?php print CTR_URL; ?>Authentication"><div class="btn btn-lg btn-primary btn-block">Return to login</div></a></div>');
                    }
                });
            }
        });
    });
</script>