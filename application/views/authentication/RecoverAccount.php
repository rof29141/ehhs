<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$page_title = "";
$position='center';
require_once(APPPATH."views/includes/header.php");
?>

<body>
<div id="wrapper">

    <div class="container text-center" style="margin-top: 40px;">
        <?php require_once(VIEW_URL."includes/banner.php");?>
    </div>

    <fieldset class="container auth" style="padding-left: 40px;padding-right: 40px;">
        <?php print form_open('', "class='smart-form client-form' id='frm_auth' role='form' method='post'"); ?>

        <fieldset id="fieldset_contact" class="myfieldset" style="margin-top: 0px;">
            <legend id="legend_contact" class="mylegend">Recover Account by Email or User ID</legend>

            <div class="row">
                <div class="col col-xs-12 col-lg-12">
                    <div class="fields">
                        <strong>User ID</strong>
                        <input name="user" id="user" class="form-control" type="text" placeholder="Enter your registered User ID" autocomplete="off"/>
                    </div>
                </div>

                <div class="col col-xs-12 col-lg-12">
                    <div class="text-center">
                        Or
                    </div>
                </div>

                <div class="col col-xs-12 col-lg-12">
                    <div class="fields">
                        <strong>Email</strong>
                        <input name="email" id="email" class="form-control" type="text" placeholder="Enter your registered Email" autocomplete="off"/>
                    </div>
                </div>
            </div>

            <div id="questions_aswers" style="display: none;"></div>

            <div class="actions">
                <button type="button" id="btn_show" class="btn btn-lg btn-primary btn-block">
                    Show security questions
                </button>

                <button type="button" id="btn_recover" class="btn btn-lg btn-primary btn-block" style="display: none;">
                    Recover my account
                </button>
            </div>

            <fieldset>
                <div class="text-center">
                    <a href="<?php print CTR_URL; ?>Authentication">Back to Login</a>
                </div>
            </fieldset>

        </fieldset>

        <?php require_once(VIEW_URL."includes/hidden.php");?>
        <?php print form_close(); ?>
    </div>

</div>

<?php require_once(VIEW_URL."includes/footer.php");?>

<script type="text/javascript">

    $(document).ready(function()
    {
        var opts = {
            lines: 10, // The number of lines to draw
            length: 20, // The length of each line
            width: 9, // The line thickness
            radius: 30, // The radius of the inner circle
            corners: 1, // Corner roundness (0..1)
            rotate: 0, // The rotation offset
            direction: 1, // 1: clockwise, -1: counterclockwise
            color: '#000', // #rgb or #rrggbb or array of colors
            speed: 1.1, // Rounds per second
            trail: 91, // Afterglow percentage
            shadow: false, // Whether to render a shadow
            hwaccel: false, // Whether to use hardware acceleration
            className: 'spinner', // The CSS class to assign to the spinner
            zIndex: 2e9, // The z-index (defaults to 2000000000)
            top: '50%', // Top position relative to parent
            left: '50%' // Left position relative to parent
        };

        $('#btn_show').on('click', function()
        {
            if($('#user').val()!='' || $('#email').val()!='')
            {
                var target = document.getElementById('wrapper');
                var spinner = new Spinner(opts).spin(target);
                var user_email='';

                if($('#email').val()!='')
                {
                    var url='ValidateEmail';
                    var data={email:$('#email').val(), send:'recover'};
                }
                else if($('#user').val()!='')
                {
                    var url='ValidateUserID';
                    var data={user:$('#user').val(), type:'recover'};
                }

                $.ajax({
                    url:url,
                    type:'POST',
                    data:data
                }).done(function(response, textStatus, jqXHR)
                {
                    if($('#email').val()!='')
                    {
                        user_email='email';
                    }
                    else if($('#user').val()!='')
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
                        $('#questions_aswers').html(response);
                        $('#questions_aswers').show(500);
                        $('#btn_show').hide();
                        $('#btn_recover').show();
                    }

                    spinner.stop();
                });
            }
            else
            alertify.error('You have to enter a registered User ID or your Email address.');
        });

        $('#btn_recover').on('click', function()
        {
            if($("#frm_auth").valid())
            {
                if($('#user').val()!='')
                {
                    var user_email='user';
                    var search=$('#user').val();
                }
                else if($('#email').val()!='')
                {
                    var user_email='email';
                    var search=$('#email').val();
                }

                var data={user_email:user_email, search:search, ans1:$('#ans1').val(), ans2:$('#ans2').val(), ans3:$('#ans3').val()};

                $.ajax({
                    url:'ValidateSecAnswers',
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
                            window.location.replace("index");
                        });
                    }
                });
            }
        });
    });
</script>