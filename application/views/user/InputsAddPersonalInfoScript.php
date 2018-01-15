<script type="text/javascript">
    jQuery(document).ready(function()
    {
        jQuery('#btn_save_personal_info').on('click', function ()
        {
            ValidateFrm();
            if(jQuery("#frm").valid())
            {
                if (jQuery('#bd_PreferredReminderContact_Type_1').is(':checked'))
                    var one='phone_mobile ';
                else
                    var one='';

                if (jQuery('#bd_PreferredReminderContact_Type_2').is(':checked'))
                    var two='phone_home ';
                else
                    var two='';

                if (jQuery('#bd_PreferredReminderContact_Type_3').is(':checked'))
                    var three='phone_work ';
                else
                    var three='';

                if (jQuery('#bd_PreferredReminderContact_Type_4').is(':checked'))
                    var four='sms_text ';
                else
                    var four='';

                if (jQuery('#bd_PreferredReminderContact_Type_5').is(':checked'))
                    var five='email_primary ';
                else
                    var five='';

                if (jQuery('#bd_PreferredReminderContact_Type_6').is(':checked'))
                    var six='no';
                else
                    var six='';

                if (one!='' || two!='' || three!='' || four!='' || five!='' || six!='')
                {
                    var cbx_contact_method = one + two + three + four + five + six;


                    var layout = 'PHP_Patients';
                    var type='UPDATE';
                    var fields_values='id='+jQuery('#id').val()+'&bd_user_name=' + jQuery('#bd_user_name').val() + '&bd_Salutation=' + jQuery('#bd_Salutation').val() + '&bd_FirstName=' + jQuery('#bd_FirstName').val() +
                        '&bd_MiddleInitial=' + jQuery('#bd_MiddleInitial').val() + '&bd_LastName=' + jQuery('#bd_LastName').val() + '&bd_user_email=' + jQuery('#bd_user_email').val() +
                        '&bd_DateOfBirth=' + jQuery('#bd_DateOfBirth').val() + '&bd_Phone=' + jQuery('#bd_Phone').val() + '&bd_Cell=' + jQuery('#bd_Cell').val() +
                        '&bd_Address1=' + jQuery('#bd_Address1').val() + '&bd_Address2=' + jQuery('#bd_Address2').val() + '&bd_City=' + jQuery('#bd_City').val() +
                        '&bd_State=' + jQuery('#bd_State').val() + '&bd_Country=' + jQuery('#bd_Country').val() + '&bd_ZipCode=' + jQuery('#bd_ZipCode').val() +
                        '&bd_Sex=' + jQuery("input[name='bd_Sex']:checked").val() + '&bd_EmployStatus=' + jQuery("input[name='bd_EmployStatus']:checked").val() + '&bd_Wrk_Name=' + jQuery('#bd_Wrk_Name').val()+
                        '&bd_SocialSecurity=' + jQuery('#bd_SocialSecurity').val() + '&bd_PreferredReminderContact_Type=' + cbx_contact_method + '&bd_MaritalStatus=' + jQuery("input[name='bd_MaritalStatus']:checked").val()+
                        '&bd_Wrk_Address=' + jQuery('#bd_Wrk_Address').val() + '&bd_Wrk_ZipCode=' + jQuery('#bd_Wrk_ZipCode').val() + '&bd_Wrk_City=' + jQuery('#bd_Wrk_City').val()+
                        '&bd_Wrk_Country=' + jQuery('#bd_Wrk_Country').val() + '&bd_Wrk_Phone=' + jQuery('#bd_Wrk_Phone').val() + '&bd_PatientReferral=' + jQuery('#bd_PatientReferral').val()+
                        '&bd_StudentStatus=' + jQuery('#bd_StudentStatus').val() + '&bd_ICE_Name1=' + jQuery('#bd_ICE_Name1').val() + '&bd_ICE_Relationship1=' + jQuery('#bd_ICE_Relationship1').val()+
                        '&bd_ICE_Phone1=' + jQuery('#bd_ICE_Phone1').val();

                    var url = 'Main/SaveObject';
                    var data = fields_values + '&layout=' + layout + '&type=' + type;

                    var target = document.getElementById('container');
                    var spinner = new Spinner(opts).spin(target);

                    jQuery.ajax({
                        type: "POST",
                        dataType: "html",
                        url: url,
                        data: data
                    }).done(function (response, textStatus, jqXHR) {
                        if (response != '1') {
                            if (jQuery.isNumeric(response)) {
                                var recordID = jQuery('#id').val();

                                jQuery.ajax({
                                    type: "POST",
                                    dataType: "html",
                                    url: 'User/GetPrimaryKeyByRecordID',
                                    data: {recordID: recordID}
                                }).done(function (response, textStatus, jqXHR)
                                {
                                    if (jQuery.isNumeric(response)) {
                                        var primary_key = response;
                                        var layout = 'PHP_Personal_Info';
                                        var type='INSERT';
                                        var fields_values = jQuery('#frm').find('input[datafld!=ignore], select[datafld!=ignore]').serialize()+'&id_pers_info='+jQuery('#__kp_PERSONAL_INFO_TEMP_ID').val()+'&id_patient='+primary_key;
                                        var data = fields_values + '&layout=' + layout + '&type=' + type;
                                        jQuery.ajax({
                                            type: "POST",
                                            dataType: "html",
                                            url: 'User/SavePersonalInfo',
                                            data: data
                                        }).done(function (response, textStatus, jqXHR) {
                                            if (jQuery.isNumeric(response))
                                            {
                                                jQuery('#personal_info').empty();
                                                jQuery('#personal_info').html('<div class="text-center col col-12"><h5>Thank you for completing your Personal Information, we will be in touch soon.</h5></div>');
                                                alertify.success('Data Saved.');
                                            }
                                            else {
                                                alertify.error('Error: The element could not be Saved. ' + response);
                                            }
                                            spinner.stop();
                                        });
                                    }
                                    else {
                                        alertify.error('Error: The element could not be Saved. ' + response);
                                    }
                                    spinner.stop();


                                }).fail(function (jqHTR, textStatus, thrown) {
                                    alertify.error('Something wrong with AJAX:' + textStatus);
                                });

                            }
                            else {
                                alertify.error('Error: The element could not be Saved. ' + response);
                            }
                            spinner.stop();


                        }
                        else
                            window.location.replace("Authentication");
                    }).fail(function (jqHTR, textStatus, thrown) {
                        alertify.error('Something wrong with AJAX:' + textStatus);
                    });

                }
                else
                {
                    jQuery('#fieldset_contact').css('border','1px solid #A90329');
                    jQuery('#legend_contact').css('color','#D56161');
                    jQuery('<em class="invalid" style="top:-10px;position:relative" id="em_contact">The field is required.</em>').insertAfter('#fieldset_contact');
                    jQuery('html, body').animate({
                        scrollTop: jQuery('#fieldset_contact').offset().top-200
                    }, 1000);
                }
            }
        });

        function ValidateFrm() {
            jQuery.validator.setDefaults(
                {
                    //errorElement: "span",
                    //errorClass: "help-block",
                    //	validClass: 'stay',
                    highlight: function (element, errorClass, validClass) {//alert('high');
                        jQuery(element).addClass(errorClass); //.removeClass(errorClass);
                        jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                        jQuery(element).closest('.myfieldset_child').css('border','1px solid #A90329');
                        jQuery(element).closest('.mylegend_child').css('color','#D56161');
                    },
                    unhighlight: function (element, errorClass, validClass) {//alert('unhigh');
                        jQuery(element).removeClass(errorClass); //.addClass(validClass);
                        jQuery(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                        jQuery(element).closest('.myfieldset_child').css('border','1px solid #000');
                        jQuery(element).closest('.mylegend_child').css('color','#000');
                    },
                    errorPlacement: function (error, element)
                    {
                        if(element.is(":radio"))
                        {
                            error.appendTo(element.parents('.myfieldset_child'));
                        }

                        else if(element.parent('.input-group').length)
                        {
                            error.insertAfter(element.parent());
                        }
                        else if(element.hasClass('my_select2'))
                        {
                            error.insertAfter(element.next('span'));
                        }
                        else
                        {
                            error.insertAfter(element);
                        }
                    }
                });

            jQuery("#frm").validate(
                {
                    ignore: [],
                    focusInvalid: false,
                    invalidHandler: function(form, validator)
                    {
                        if (!validator.numberOfInvalids())
                            return;

                        jQuery('html, body').animate({
                            scrollTop: jQuery(validator.errorList[0].element).offset().top-300
                        }, 1000);
                    }
                });

            jQuery.validator.addMethod("select", function(value, element, arg)
            {
                return arg !== value;
            }, "This field is required. Please, select an option.");

            jQuery("#frm").find('.required').each(function()
            {
                jQuery(this).rules( "add",{required: true});
            });

            jQuery("#frm").find('.required_select').each(function()
            {
                jQuery(this).rules( "add",{select: "-1"});
            });
        }
    });
</script>