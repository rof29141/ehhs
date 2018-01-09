<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$page_title = "";
$position='center';
require_once(APPPATH."views/includes/header.php");
?>

<body >
<div id="wrapper">

    <div class="container text-center" style="margin-top: 40px;">
        <?php require_once(VIEW_URL."includes/banner.php");?>
    </div>

    <div class="container" style="padding-left: 40px;padding-right: 40px;">
        <?php print form_open('authentication/CreateAccount', "class='form-signin' id='frm_auth' role='form' autocomplete='on'"); ?>
            <div class="col col-xs-12 col-lg-6 col-lg-offset-3">
                <fieldset id="fieldset_contact" class="myfieldset" style="margin-top: 0px;">
                    <legend id="legend_contact" class="mylegend">Sign Up</legend>

                    <div class="row">
                        <div class="col col-xs-12 col-lg-6">
                            <div class="fields">
                                <strong>First Name</strong>
                                <input name="first" id="first" class="form-control" type="text" placeholder="Enter your First Name" />
                            </div>
                        </div>

                        <div class="col col-xs-12 col-lg-6">
                            <div class="fields">
                                <strong>Last Name</strong>
                                <input name="last" id="last" class="form-control" type="text" placeholder="Enter your Last Name" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-xs-12 col-lg-6">
                            <div class="fields">
                                <strong>Date of Birth</strong>
                                <input name="birth" id="birth" class="form-control" type="text" style="padding: 0px;padding-left: 8px;"/>
                            </div>
                        </div>

                        <div class="col col-xs-12 col-lg-6">
                            <div class="fields">
                                <strong>Cell phone</strong>
                                <input name="cell" class="form-control" type="text" placeholder="Enter your Cell Phone Number" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-xs-12 col-lg-6">
                            <div class="fields">
                                <strong>Email</strong>
                                <input name="email" id="email" class="form-control" type="email" placeholder="Enter your Email" autocomplete="off"/>
                            </div>
                        </div>

                        <div class="col col-xs-12 col-lg-6">
                            <div class="fields">
                                <strong>User ID</strong>
                                <input name="user" id="user" class="form-control" type="text" placeholder="Enter a unique User ID" autocomplete="off"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-xs-12 col-lg-6">
                            <div class="fields">
                                <strong>New Password</strong>
                                <input placeholder="Enter your New Password"  name="txt_pass" id="txt_pass"  type="password"  value="" class="form-control" autocomplete="off">
                            </div>
                        </div>

                        <div class="col col-xs-12 col-lg-6">
                            <div class="fields">
                                <strong>Confirm New Password</strong>
                                <input  name="txt_pass1" id="txt_pass1"  type="password"  size="15" class="form-control" placeholder="Confirm your New Password" autocomplete="off"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-xs-12 col-lg-12">
                            <div class="fields">
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
                        </div>

                        <div class="col col-xs-12 col-lg-12">
                            <div class="fields">
                                <strong>Answer 1</strong>
                                <input name="ans1" id="ans1" class="form-control" type="text" placeholder="Enter a Answer 1" autocomplete="off"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-xs-12 col-lg-12">
                            <div class="fields">
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
                        </div>

                        <div class="col col-xs-12 col-lg-12">
                            <div class="fields">
                                <strong>Answer 2</strong>
                                <input name="ans2" id="ans2" class="form-control" type="text" placeholder="Enter a Answer 2" autocomplete="off"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-xs-12 col-lg-12">
                            <div class="fields">
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
                        </div>

                        <div class="col col-xs-12 col-lg-12">
                            <div class="fields">
                                <strong>Answer 3</strong>
                                <input name="ans3" id="ans3" class="form-control" type="text" placeholder="Enter a Answer 3" autocomplete="off"/>
                            </div>
                        </div>
                    </div>

                    <div class="actions auth">
                        <button type="button" id="btn_sign_up" class="btn btn-lg btn-primary btn-block">
                            Sign Up
                        </button>
                        <input type="hidden" name="ok_mail" id="ok_mail" value="1">
                        <input type="hidden" name="ok_user" id="ok_user" value="1">
                        <input type="hidden" name="no_promp_mail" id="no_promp_mail" value="yes">
                        <input type="hidden" name="no_promp_user" id="no_promp_user" value="yes">
                    </div>

                    <fieldset>
                        <div class="text-center">
                            <a href="<?php print CTR_URL; ?>Authentication">Back to Login</a>
                        </div>
                    </fieldset>

                </fieldset>
            </div>
        <?php require_once(VIEW_URL."includes/hidden.php");?>
        <?php print form_close(); ?>
    </div>

</div>

<?php require_once(VIEW_URL."includes/footer.php");?>

<script type="text/javascript">

    $(document).ready(function()
    {
        $(".my_select2").select2({
            placeholder: {
                id: '-1',
                text: 'Select an option.'
            }
        });

        $.validator.addMethod("select", function(value, element, arg)
        {
            return arg !== value;
        }, "This field is required. Please, select an option.");

        $("#frm_auth").validate(
        {
            rules :
            {
                first:{required:true},
                last:{required:true},
                birth:{required:true},
                cell:{required:true},
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
                first:{required:'Please enter your First Name'},
                last:{required:'Please enter your Last Name'},
                birth:{required:'Please enter your Date of Birth'},
                cell:{required:'Please enter your Cell Phone number'},
                email : {required : 'Please enter your Email address.', email : 'Please enter a VALID Email address'},
                user : {required : 'Please enter a User ID'},
                txt_pass: {required: 'Please enter your new password'},
                txt_pass1: {required : 'Please confirm your password', equalTo : 'Please insert the same password'},
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

                $('html, body').animate({
                    scrollTop: $(validator.errorList[0].element).offset().top-100
                }, 2000);
            }
        });

        $('#user').on('keyup click blur', function (e)
        {
            CheckExistUserID();
        });

        $('#email').on('keyup click blur', function (e)
        {
            CheckExistEmail();
        });

        $('#btn_sign_up').on('click', function (e)
        {
            CheckExistUser();
        });

        function CheckExistUserID()
        {
            var user_id=$('#user').val();

            if(user_id.length>3)
            {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: 'CheckExistUserID',
                    data:{user_id:user_id}
                }).done(function(response, textStatus, jqXHR)
                {
                    $('#em_user').empty();

                    if(response=='EXIST' && $('#no_promp_user').val()=='yes')
                    {
                        $('<em class="invalid" style="top:0px;position:relative" id="em_user">This User ID already exists.</em>').insertAfter('#user');
                        $('#ok_user').val('0');

                        alertify.defaults.theme.ok = "btn btn-success";
                        alertify.confirm("<div class='text-center'><h4>The user </h4><h3>"+user_id+"</h3><h4>already exists in our database.</h4><br><h3>Are you the owner of this user?</h3><br>If 'Yes', you will be redireted to recover your password.</div>", function()
                        {
                            window.location.replace("GoForgotPassword");
                        }
                        ,function()
                        {
                            alertify.error('Declined.');
                            $('#no_promp_user').val('no');
                        })
                        .set({labels:{ok:'Yes', cancel: 'No'}});
                    }
                    else if(response=='EXIST' && $('#no_promp_user').val()=='no')
                    {
                        $('<em class="invalid" style="top:0px;position:relative" id="em_user">This User ID already exists.</em>').insertAfter('#user');
                    }
                    else
                    {
                        $('#ok_user').val('1');
                    }
                }).fail(function(jqHTR, textStatus, thrown)
                {
                    alertify.error('Something wrong with AJAX:' + textStatus);
                });
            }
        }

        function CheckExistEmail()
        {
            var email=$('#email').val();

            if(email.length>12)
            {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: 'CheckExistEmail',
                    data:{email:email}
                }).done(function(response, textStatus, jqXHR)
                {
                    $('#em_email').empty();

                    if(response=='EXIST' && $('#no_promp_mail').val()=='yes')
                    {
                        $('<em class="invalid" style="top:0px;position:relative" id="em_email">This Email already exists.</em>').insertAfter('#email');

                        alertify.defaults.theme.ok = "btn btn-success";
                        alertify.confirm("<div class='text-center'><h4>The email </h4><h3>"+email+"</h3><h4>already exists in our database.</h4><br><h3>Are you the owner of this email?</h3><br>If 'Yes', you will be redireted to recover your User ID.</div>", function()
                        {
                            window.location.replace("GoForgotUser/"+encodeURI(email));
                        }
                        ,function()
                        {
                            alertify.error('Declined.');
                            $('#no_promp_mail').val('no');
                            $('#ok_mail').val('0');
                        })
                        .set({labels:{ok:'Yes', cancel: 'No'}});
                    }
                    else if(response=='EXIST' && $('#no_promp_mail').val()=='no')
                    {
                        $('<em class="invalid" style="top:0px;position:relative" id="em_email">This Email already exists.</em>').insertAfter('#email');
                    }
                    else
                    {$('#ok_mail').val('1');}

                }).fail(function(jqHTR, textStatus, thrown)
                {
                    alertify.error('Something wrong with AJAX:' + textStatus);
                });
            }
        }

        function CheckExistUser()
        {
            var first=$('#first').val();
            var last=$('#last').val();
            var birth=$('#birth').val();

            if($("#frm_auth").valid())
            {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: 'CheckExistUser',
                    data:{first:first,last:last,birth:birth}
                }).done(function(response, textStatus, jqXHR)
                {
                    if(response=='EXIST')
                    {
                        alertify.defaults.theme.ok = "btn btn-success";
                        alertify.confirm("<div class='text-center'><h4>It looks like you may already exist in our database.</h4><h3>Are you a previous client of Advanced Cosmetic Surgery?</h3><br>If 'Yes', you will be redireted to answer some security questions.</div>", function()
                        {
                            window.location.replace("GoRecoverAccount");
                        }
                        ,function()
                        {
                            alertify.error('Declined.');
                            CheckExistEmail();CheckExistUserID();SaveUser();
                        }).set({labels:{ok:'Yes', cancel: 'No'}});
                    }
                    else
                    {
                        CheckExistEmail();CheckExistUserID();SaveUser();
                    }

                }).fail(function(jqHTR, textStatus, thrown)
                {
                    alertify.error('Something wrong with AJAX:' + textStatus);
                });
            }
        }

        function SaveUser()
        {
            if($('#ok_mail').val()==1 && $('#ok_user').val()==1)
            {
                var data = $('#frm_auth').find('input[datafld!=ignore], select[datafld!=ignore]').serialize();

                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: 'CreateAccount',
                    data: data
                }).done(function (response, textStatus, jqXHR) {
                    if (response == 'CREATED') {
                        window.location.replace("index/ACTIVATE");
                    }
                }).fail(function (jqHTR, textStatus, thrown) {
                    alertify.error('Something wrong with AJAX:' + textStatus);
                });
            }
            else
                $('html, body').animate({
                    scrollTop: $('#email').offset().top-200
                }, 1000);
        }
    });

</script>