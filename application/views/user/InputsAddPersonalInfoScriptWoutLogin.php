<script type="text/javascript">
    $(document).ready(function()
    {
        $('#btn_save_personal_info').on('click', function ()
        {
            ValidateFrm();
            if($("#frm").valid())
            {
                if ($('#bd_PreferredReminderContact_Type_1').is(':checked'))
                    var one='phone_mobile ';
                else
                    var one='';

                if ($('#bd_PreferredReminderContact_Type_2').is(':checked'))
                    var two='phone_home ';
                else
                    var two='';

                if ($('#bd_PreferredReminderContact_Type_3').is(':checked'))
                    var three='phone_work ';
                else
                    var three='';

                if ($('#bd_PreferredReminderContact_Type_4').is(':checked'))
                    var four='sms_text ';
                else
                    var four='';

                if ($('#bd_PreferredReminderContact_Type_5').is(':checked'))
                    var five='email_primary ';
                else
                    var five='';

                if ($('#bd_PreferredReminderContact_Type_6').is(':checked'))
                    var six='no';
                else
                    var six='';

                if (one!='' || two!='' || three!='' || four!='' || five!='' || six!='')
                {
                    var cbx_contact_method = one + two + three + four + five + six;


                    var layout = 'PHP_Patients';
                    var type='UPDATE';
                    var fields_values='id='+$('#id').val()+'&bd_user_name=' + $('#bd_user_name').val() + '&bd_Salutation=' + $('#bd_Salutation').val() + '&bd_FirstName=' + $('#bd_FirstName').val() +
                        '&bd_MiddleInitial=' + $('#bd_MiddleInitial').val() + '&bd_LastName=' + $('#bd_LastName').val() + '&bd_user_email=' + $('#bd_user_email').val() +
                        '&bd_DateOfBirth=' + $('#bd_DateOfBirth').val() + '&bd_Phone=' + $('#bd_Phone').val() + '&bd_Cell=' + $('#bd_Cell').val() +
                        '&bd_Address1=' + $('#bd_Address1').val() + '&bd_Address2=' + $('#bd_Address2').val() + '&bd_City=' + $('#bd_City').val() +
                        '&bd_State=' + $('#bd_State').val() + '&bd_Country=' + $('#bd_Country').val() + '&bd_ZipCode=' + $('#bd_ZipCode').val() +
                        '&bd_Sex=' + $('#bd_Sex').val() + '&bd_EmployStatus=' + $('#bd_EmployStatus').val() + '&bd_Wrk_Name=' + $('#bd_Wrk_Name').val()+
                        '&bd_SocialSecurity=' + $('#bd_SocialSecurity').val() + '&bd_PreferredReminderContact_Type=' + cbx_contact_method + '&bd_MaritalStatus=' + $('#bd_MaritalStatus').val()+
                        '&bd_Wrk_Address=' + $('#bd_Wrk_Address').val() + '&bd_Wrk_ZipCode=' + $('#bd_Wrk_ZipCode').val() + '&bd_Wrk_City=' + $('#bd_Wrk_City').val()+
                        '&bd_Wrk_Country=' + $('#bd_Wrk_Country').val() + '&bd_Wrk_Phone=' + $('#bd_Wrk_Phone').val() + '&bd_PatientReferral=' + $('#bd_PatientReferral').val()+
                        '&bd_StudentStatus=' + $('#bd_StudentStatus').val() + '&bd_ICE_Name1=' + $('#bd_ICE_Name1').val() + '&bd_ICE_Relationship1=' + $('#bd_ICE_Relationship1').val()+
                        '&bd_ICE_Phone1=' + $('#bd_ICE_Phone1').val();

                    var url = 'Main/SaveObject';
                    var data = fields_values + '&layout=' + layout + '&type=' + type;

                    var target = document.getElementById('container');
                    var spinner = new Spinner(opts).spin(target);

                    $.ajax({
                        type: "POST",
                        dataType: "html",
                        url: url,
                        data: data
                    }).done(function (response, textStatus, jqXHR) {
                        if (response != '1') {
                            if ($.isNumeric(response)) {
                                var recordID = $('#id').val();

                                $.ajax({
                                    type: "POST",
                                    dataType: "html",
                                    url: 'User/GetPrimaryKeyByRecordID',
                                    data: {recordID: recordID}
                                }).done(function (response, textStatus, jqXHR) {
                                    if ($.isNumeric(response)) {
                                        var primary_key = response;
                                        var layout = 'PHP_Personal_Info';
                                        var type='INSERT';
                                        var fields_values = $('#frm').find('input[datafld!=ignore], select[datafld!=ignore]').serialize()+'&id_pers_info='+$('#__kp_PERSONAL_INFO_TEMP_ID').val()+'&id_patient='+$('#id').val();
                                        var data = fields_values + '&layout=' + layout + '&type=' + type;
                                        $('.content-wrapper').empty();
                                        $.ajax({
                                            type: "POST",
                                            dataType: "html",
                                            url: 'User/SavePersonalInfo',
                                            data: data
                                        }).done(function (response, textStatus, jqXHR) {
                                            if ($.isNumeric(response)) {
                                                alertify.success('Data Saved.');
                                            }
                                            else {
                                                alertify.error('Error: The element could not be Saved. ' + response);
                                            }
                                            spinner.stop();
                                            LoadContent($('#view').val());
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
                    $('#fieldset_contact').css('border','1px solid #A90329');
                    $('#legend_contact').css('color','#D56161');
                    $('<em class="invalid" style="top:-10px;position:relative" id="em_contact">The field is required.</em>').insertAfter('#fieldset_contact');
                    $('html, body').animate({
                        scrollTop: $('#fieldset_contact').offset().top-200
                    }, 1000);
                }
            }
        });

        function ValidateFrm() {
            $.validator.setDefaults(
                {
                    //errorElement: "span",
                    //errorClass: "help-block",
                    //	validClass: 'stay',
                    highlight: function (element, errorClass, validClass) {//alert('high');
                        $(element).addClass(errorClass); //.removeClass(errorClass);
                        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                        $(element).closest('.myfieldset_child').css('border','1px solid #A90329');
                        $(element).closest('.mylegend_child').css('color','#D56161');
                    },
                    unhighlight: function (element, errorClass, validClass) {//alert('unhigh');
                        $(element).removeClass(errorClass); //.addClass(validClass);
                        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                        $(element).closest('.myfieldset_child').css('border','1px solid #000');
                        $(element).closest('.mylegend_child').css('color','#000');
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

            $("#frm").validate(
                {
                    ignore: [],
                    focusInvalid: false,
                    invalidHandler: function(form, validator)
                    {
                        if (!validator.numberOfInvalids())
                            return;

                        $('html, body').animate({
                            scrollTop: $(validator.errorList[0].element).offset().top-300
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