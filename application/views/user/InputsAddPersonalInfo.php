<div class="col-sm-12">

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>User ID</label>
            <input type="text" name="bd_user_name" id="bd_user_name" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['bd_user_name'])) echo $data['user']['data'][0]['bd_user_name'];?>" />
            <input type="hidden" name="id" id="id" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['RecordID'])) echo $data['user']['data'][0]['RecordID'];?>" />
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Salutation</label>
            <input type="text" name="bd_Salutation" id="bd_Salutation" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['bd_Salutation'])) echo $data['user']['data'][0]['bd_Salutation'];?>" />
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>First Name</label>
            <input type="text" name="bd_FirstName" id="bd_FirstName" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['bd_FirstName'])) echo $data['user']['data'][0]['bd_FirstName'];?>" />
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Middle Name (Initial)</label>
            <input type="text" name="bd_MiddleInitial" id="bd_MiddleInitial" class="form-control"  value="<?php if(isset($data['user']['data'][0]['bd_MiddleInitial'])) echo $data['user']['data'][0]['bd_MiddleInitial'];?>" />
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Last Name</label>
            <input type="text" name="bd_LastName" id="bd_LastName" class="form-control required" value="<?php if(isset($data['user']['data'][0]['bd_LastName'])) echo $data['user']['data'][0]['bd_LastName'];?>" />
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Email address</label>
            <input type="email" name="bd_user_email" id="bd_user_email" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['bd_user_email'])) echo $data['user']['data'][0]['bd_user_email'];?>" />
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Date of Birth</label>
            <input type="text" name="bd_DateOfBirth" id="bd_DateOfBirth" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['bd_DateOfBirth'])) echo $data['user']['data'][0]['bd_DateOfBirth'];?>" />
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Phone</label>
            <input type="text" name="bd_Phone" id="bd_Phone" class="form-control"  value="<?php if(isset($data['user']['data'][0]['bd_Phone'])) echo $data['user']['data'][0]['bd_Phone'];?>" />
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Cell</label>
            <input type="text" name="bd_Cell" id="bd_Cell" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['bd_Cell'])) echo $data['user']['data'][0]['bd_Cell'];?>" />
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Address 1</label>
            <input type="text" name="bd_Address1" id="bd_Address1" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['bd_Address1'])) echo $data['user']['data'][0]['bd_Address1'];?>" />
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Address 2</label>
            <input type="text" name="bd_Address2" id="bd_Address2" class="form-control"  value="<?php if(isset($data['user']['data'][0]['bd_Address2'])) echo $data['user']['data'][0]['bd_Address2'];?>" />
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>City</label>
            <input type="text" name="bd_City" id="bd_City" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['bd_City'])) echo $data['user']['data'][0]['bd_City'];?>" />
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>State</label>
            <input type="text" name="bd_State" id="bd_State" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['bd_State'])) echo $data['user']['data'][0]['bd_State'];?>" />
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Country</label>
            <input type="text" name="bd_Country" id="bd_Country" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['bd_Country'])) echo $data['user']['data'][0]['bd_Country'];?>" />
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Zip Code</label>
            <input type="text" name="bd_ZipCode" id="bd_ZipCode" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['bd_ZipCode'])) echo $data['user']['data'][0]['bd_ZipCode'];?>" />
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Social Security</label>
            <input type="text" name="bd_SocialSecurity" id="bd_SocialSecurity" class="form-control"  value="<?php if(isset($data['user']['data'][0]['bd_SocialSecurity'])) echo $data['user']['data'][0]['bd_SocialSecurity'];?>" />
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <fieldset id="fieldset_contact" class="myfieldset" style="margin-top: 0px;">
                <legend id="legend_contact" class="mylegend">Best manner to be reached</legend>

                <label><input type="checkbox" name="bd_PreferredReminderContact_Type" id="bd_PreferredReminderContact_Type" class="error_fieldset required" value="phone_mobile" <?php if(isset($data['user']['data'][0]['bd_Sex']) && $data['user']['data'][0]['bd_Sex']=='phone_mobile') echo 'checked';?>/> Cell Phone</label><br>
                <label><input type="checkbox" name="bd_PreferredReminderContact_Type" id="bd_PreferredReminderContact_Type" value="phone_home" <?php if(isset($data['user']['data'][0]['bd_Sex']) && $data['user']['data'][0]['bd_Sex']=='phone_home') echo 'checked';?>/> Home Phone</label><br>
                <label><input type="checkbox" name="bd_PreferredReminderContact_Type" id="bd_PreferredReminderContact_Type" value="phone_work" <?php if(isset($data['user']['data'][0]['bd_Sex']) && $data['user']['data'][0]['bd_Sex']=='phone_work') echo 'checked';?>/> Work Phone</label><br>
                <label><input type="checkbox" name="bd_PreferredReminderContact_Type" id="bd_PreferredReminderContact_Type" value="sms_text" <?php if(isset($data['user']['data'][0]['bd_Sex']) && $data['user']['data'][0]['bd_Sex']=='sms_text') echo 'checked';?>/> Text Message</label><br>
                <label><input type="checkbox" name="bd_PreferredReminderContact_Type" id="bd_PreferredReminderContact_Type" value="email_primary" <?php if(isset($data['user']['data'][0]['bd_Sex']) && $data['user']['data'][0]['bd_Sex']=='email_primary') echo 'checked';?>/> E-mail Address</label><br>
                <label><input type="checkbox" name="bd_PreferredReminderContact_Type" id="bd_PreferredReminderContact_Type" value="no" <?php if(isset($data['user']['data'][0]['bd_Sex']) && $data['user']['data'][0]['bd_Sex']=='no') echo 'checked';?>/> Do Not Contact me</label><br>

            </fieldset>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <fieldset id="fieldset_contact" class="myfieldset" style="margin-top: 0px;">
                <legend id="legend_contact" class="mylegend">Marital Status</legend>

                <label><input type="radio" name="bd_MaritalStatus" id="bd_MaritalStatus" class="error_fieldset required" value="S" <?php if(isset($data['user']['data'][0]['bd_MaritalStatus']) && $data['user']['data'][0]['bd_MaritalStatus']=='S') echo 'checked';?>/> Single</label><br>
                <label><input type="radio" name="bd_MaritalStatus" id="bd_MaritalStatus" value="M" <?php if(isset($data['user']['data'][0]['bd_MaritalStatus']) && $data['user']['data'][0]['bd_MaritalStatus']=='M') echo 'checked';?>/> Married</label><br>
                <label><input type="radio" name="bd_MaritalStatus" id="bd_MaritalStatus" value="D" <?php if(isset($data['user']['data'][0]['bd_MaritalStatus']) && $data['user']['data'][0]['bd_MaritalStatus']=='D') echo 'checked';?>/> Divorced</label><br>
                <label><input type="radio" name="bd_MaritalStatus" id="bd_MaritalStatus" value="W" <?php if(isset($data['user']['data'][0]['bd_MaritalStatus']) && $data['user']['data'][0]['bd_MaritalStatus']=='W') echo 'checked';?>/> Widowed</label><br>
                <label><input type="radio" name="bd_MaritalStatus" id="bd_MaritalStatus" value="O" <?php if(isset($data['user']['data'][0]['bd_MaritalStatus']) && $data['user']['data'][0]['bd_MaritalStatus']=='O') echo 'checked';?>/> Other</label><br>

            </fieldset>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <fieldset id="fieldset_contact" class="myfieldset" style="margin-top: 0px;">
                <legend id="legend_contact" class="mylegend">Gender</legend>

                <label><input type="radio" name="bd_Sex" id="bd_Sex" class="error_fieldset required" value="M" <?php if(isset($data['user']['data'][0]['bd_Sex']) && $data['user']['data'][0]['bd_Sex']=='M') echo 'checked';?>/> Male</label><br>
                <label><input type="radio" name="bd_Sex" id="bd_Sex" value="F" <?php if(isset($data['user']['data'][0]['bd_Sex']) && $data['user']['data'][0]['bd_Sex']=='F') echo 'checked';?>/> Female</label><br>

            </fieldset>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <fieldset id="fieldset_contact" class="myfieldset" style="margin-top: 0px;">
                <legend id="legend_contact" class="mylegend">Employment Status</legend>

                <label><input type="radio" name="bd_EmployStatus" id="bd_EmployStatus" class="error_fieldset required" value="F" <?php if(isset($data['user']['data'][0]['bd_EmployStatus']) && $data['user']['data'][0]['bd_EmployStatus']=='F') echo 'checked';?>/> Full-time</label><br>
                <label><input type="radio" name="bd_EmployStatus" id="bd_EmployStatus" value="P" <?php if(isset($data['user']['data'][0]['bd_EmployStatus']) && $data['user']['data'][0]['bd_EmployStatus']=='P') echo 'checked';?>/> Part-time</label><br>
                <label><input type="radio" name="bd_EmployStatus" id="bd_EmployStatus" value="N" <?php if(isset($data['user']['data'][0]['bd_EmployStatus']) && $data['user']['data'][0]['bd_EmployStatus']=='N') echo 'checked';?>/> Not Employed outside the home</label><br>

            </fieldset>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Employer Name</label>
            <input type="text" name="bd_Wrk_Name" id="bd_Wrk_Name" class="form-control" value="<?php if(isset($data['user']['data'][0]['bd_Wrk_Name'])) echo $data['user']['data'][0]['bd_Wrk_Name'];?>" />
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Employer Address</label>
            <input type="text" name="bd_Wrk_Address" id="bd_Wrk_Address" class="form-control" value="<?php if(isset($data['user']['data'][0]['bd_Wrk_Address'])) echo $data['user']['data'][0]['bd_Wrk_Address'];?>" />
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Employer Zip Code</label>
            <input type="text" name="bd_Wrk_ZipCode" id="bd_Wrk_ZipCode" class="form-control" value="<?php if(isset($data['user']['data'][0]['bd_Wrk_ZipCode'])) echo $data['user']['data'][0]['bd_Wrk_ZipCode'];?>" />
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Employer City</label>
            <input type="text" name="bd_Wrk_City" id="bd_Wrk_City" class="form-control" value="<?php if(isset($data['user']['data'][0]['bd_Wrk_City'])) echo $data['user']['data'][0]['bd_Wrk_City'];?>" />
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Employer Country</label>
            <input type="text" name="bd_Wrk_Country" id="bd_Wrk_Country" class="form-control" value="<?php if(isset($data['user']['data'][0]['bd_Wrk_Country'])) echo $data['user']['data'][0]['bd_Wrk_Country'];?>" />
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Employer Phone</label>
            <input type="text" name="bd_Wrk_Phone" id="bd_Wrk_Phone" class="form-control" value="<?php if(isset($data['user']['data'][0]['bd_Wrk_Phone'])) echo $data['user']['data'][0]['bd_Wrk_Phone'];?>" />
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Whom may we thank for your referral?</label>
            <input type="text" name="bd_PatientReferral" id="bd_PatientReferral" class="form-control" value="<?php if(isset($data['user']['data'][0]['bd_PatientReferral'])) echo $data['user']['data'][0]['bd_PatientReferral'];?>" />
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <fieldset id="fieldset_contact" class="myfieldset" style="margin-top: 0px;">
                <legend id="legend_contact" class="mylegend">Student Status</legend>

                <label><input type="radio" name="bd_StudentStatus" id="bd_StudentStatus" class="error_fieldset required" value="F" <?php if(isset($data['user']['data'][0]['bd_StudentStatus']) && $data['user']['data'][0]['bd_StudentStatus']=='F') echo 'checked';?>/> Full-time</label><br>
                <label><input type="radio" name="bd_StudentStatus" id="bd_StudentStatus" value="P" <?php if(isset($data['user']['data'][0]['bd_StudentStatus']) && $data['user']['data'][0]['bd_StudentStatus']=='P') echo 'checked';?>/> Part-time</label><br>
                <label><input type="radio" name="bd_StudentStatus" id="bd_StudentStatus" value="N" <?php if(isset($data['user']['data'][0]['bd_StudentStatus']) && $data['user']['data'][0]['bd_StudentStatus']=='N') echo 'checked';?>/> Non-Student</label><br>

            </fieldset>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Emergency Contact Name</label>
            <input type="text" name="bd_ICE_Name1" id="bd_ICE_Name1" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['bd_ICE_Name1'])) echo $data['user']['data'][0]['bd_ICE_Name1'];?>" />
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Emergency Contact Relationship</label>
            <input type="text" name="bd_ICE_Relationship1" id="bd_ICE_Relationship1" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['bd_ICE_Relationship1'])) echo $data['user']['data'][0]['bd_ICE_Relationship1'];?>" />
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label>Emergency Contact Phone</label>
            <input type="text" name="bd_ICE_Phone1" id="bd_ICE_Phone1" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['bd_ICE_Phone1'])) echo $data['user']['data'][0]['bd_ICE_Phone1'];?>" />
        </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 form-group pull-right">
        <button type="button" datafld="PHP_Patients" datatype="UPDATE" id="btn_save" class="btn btn-success">Save</button>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function()
    {
        $(".my_select2").select2();

        $('#btn_save_personal_info').on('click', function ()
        {
            ValidateFrm();
            if ($("#frm").valid())
            {
                var array_inputs = $('#frm').find('input[datafld!=ignore], select[datafld!=ignore]').serialize();
                var url = 'Main/SaveSurvay';
                var data = array_inputs;// + '&contact_method=' + cbx_contact_method;

                var target = document.getElementById('container');
                var spinner = new Spinner(opts).spin(target);

                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: url,
                    data: data
                }).done(function (response, textStatus, jqXHR) {
                    if (response != '1') {
                        if (response == '0') {
                            alertify.success('Data Saved.');
                        }
                        else {
                            alertify.error('Error: The element could not be Saved. ' + response);
                        }
                        spinner.stop();
                        $('#data_personal_info').html('<div>Thank you for your feedback.</div>');
                    }
                    else
                        window.location.replace("Authentication");
                }).fail(function (jqHTR, textStatus, thrown) {
                    alertify.error('Something wrong with AJAX:' + textStatus);
                });
            }
        });

        function ValidateFrm()
        {
            $.validator.setDefaults(
            {
                //errorElement: "span",
                //errorClass: "help-block",
                //	validClass: 'stay',
                highlight: function (element, errorClass, validClass) {//alert('high');
                    $(element).addClass(errorClass); //.removeClass(errorClass);
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');

                    $(element).closest('.myfieldset').css('border', '1px solid #A90329');
                    $(element).closest('.myfieldset').children('legend').css('color', '#D56161');

                },
                unhighlight: function (element, errorClass, validClass) {//alert('unhigh');

                    $(element).closest('.myfieldset').css('border', '1px solid #d7d7d7');
                    $(element).closest('.myfieldset').children('legend').css('color', '#000');


                    $(element).removeClass(errorClass); //.addClass(validClass);
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                },
                errorPlacement: function (error, element)
                {
                    if(element.parent('.input-group').length)
                    {
                        error.insertAfter(element.parent());
                    }
                    else if(element.hasClass('my_select2'))
                    {
                        error.insertAfter(element.next('span'));
                    }

                    else if(element.hasClass('error_fieldset'))
                    {
                        error.insertAfter(element.closest('.myfieldset'));
                    }
                    else
                    {
                        error.insertAfter(element);
                    }
                }
            });

            $("#frm").validate(
            {
                ignore: [],
                focusInvalid: false,
                invalidHandler: function(form, validator) {

                    if (!validator.numberOfInvalids())
                        return;

                    $('html, body').animate({
                        scrollTop: $(validator.errorList[0].element).offset().top-200
                    }, 1000);
                }
            });

            $.validator.addMethod("select", function(value, element, arg)
            {
                return arg !== value;
            }, "This field is required. Please, select an option.");

            $("#frm").find('.required').each(function()
            {
                $(this).rules( "add",{required: true});
            });

            $("#frm").find('.required_select').each(function()
            {
                $(this).rules( "add",{select: "-1"});
            });
        }
    });
</script>