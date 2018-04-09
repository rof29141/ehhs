<?php
if(isset($data['form']['data']->form_sign))
    //print $data['form']['data']->form_sign;

    $json=stripslashes(html_entity_decode($data['form']['data']->form_sign));//echo $json;
$arr= json_decode($json, true);
//var_dump($arr);
?>

<div class="col-sm-12">

        <div style="width: 100%; font-family: Arial, Helvetica, sans-serif;">
            <div style="width: 100%; font-size: 7pt;">
                <div style="float: left; width: 20%; height: 95px; border-bottom: 2px solid black; border-right: 2px solid black;">
                    <div style="clear: both; position: relative; bottom: 8px;">
                        Form <span style="font-weight: bold; font-size: 27pt; padding-left: 8px;">W-9</span>
                        <br />
                        (Rev. November 2017)
                        <br />
                        Department of the Treasury
                        <br />
                        Internal Revenue Services
                    </div>
                </div>

                <div style="float: left; height: 95px; width: 60%; border-bottom: 2px solid black; border-right: 2px solid black; text-align: center; font-weight: bold; font-size: 14pt;">
                    <div style="clear: both; margin-top: 14px;">
                        Request for Taxpayer
                        <br />
                        Identification Number and Certification
                    </div>
                </div>

                <div style="float: left; height: 95px; border-bottom: 2px solid black; width: 20%; font-size: 9pt; font-weight: bold;">
                    <div style="padding-top: 14px; padding-left: 8px;">
                        Give form to the requester. Do not send to the IRS.
                    </div>
                </div>
            </div>

            <div style="width: 100%;">
                <div style="float: left; width: 33px; border-right: 1px solid black;">

                </div>

                <div style="float: left; width: 100%;">
                    <div class="row" style="clear: both; width: 100%; border-bottom: 1px solid black; margin: 0px;">
                        <div style="clear: both; padding-left: 6px; font-size: 7pt;">
                            <label for="first-name">1 Name (as shown on your income tax return). Name is required on this line; do not leave this line blank.</label>
                            <input name="first-name" id="first-name" class="form-control" style="border:0px;border-bottom: 1px;" value="<?php if(isset($arr[0]['first-name']))print $arr[0]['first-name'];?>"/>
                        </div>
                    </div>

                    <div class="row" style="clear: both; width: 100%; border-bottom: 1px solid black;margin: 0px;">
                        <div style="clear: both; padding-left: 6px; font-size: 7pt;">
                            <label for="entity-name">2 Business name/disregarded entity name, if different from above.</label>
                            <input name="entity-name" id="entity-name" class="form-control" style="border-width: 0px 0px 1px 0px;" value="<?php if(isset($arr[0]['entity-name']))print $arr[0]['entity-name'];?>"/>
                        </div>
                    </div>

                    <div class="row" style="clear: both; width: 100%; border-bottom: 1px solid black;margin: 0px; font-size: 7pt;">
                        <div class="col-sm-8" style="padding:0px;float: left; border-right: 1px solid black;height: 260px;">
                            <div style="clear: both; padding-left: 6px;">
                                3 Check appropriate box for federal tax classification of the person whose name is entered on line 1. Check only
                                one of the following seven boxes.
                            </div>

                            <div style="clear: both;font-size: 8pt;">
                                <span style="">
                                    <input name="single-member-LLC" id="single-member-LLC" value="single-member-LLC" type="checkbox" <?php if(isset($arr[0]['single-member-LLC']) && $arr[0]['single-member-LLC']=='single-member-LLC')print 'checked';?>/> Individual/sole proprietor or single-member LLC
                                </span>

                                <span style="">
                                    <input name="C-Corporation" id="C-Corporation" value="C-Corporation" type="checkbox" <?php if(isset($arr[0]['C-Corporation']) && $arr[0]['C-Corporation']=='C-Corporation')print 'checked';?>/> C Corporation
                                </span>

                                <span style="">
                                    <input name="S-Corporation" id="S-Corporation" value="S-Corporation" type="checkbox" <?php if(isset($arr[0]['S-Corporation']) && $arr[0]['S-Corporation']=='S-Corporation')print 'checked';?>/> S Corporation
                                </span>
                                <br>
                                <span style="">
                                    <input name="Partnership" id="Partnership" value="Partnership" type="checkbox" <?php if(isset($arr[0]['Partnership']) && $arr[0]['Partnership']=='Partnership')print 'checked';?>/> Partnership
                                </span>

                                <span style="">
                                    <input name="Trust-estate" id="Trust-estate" value="Trust-estate" type="checkbox" <?php if(isset($arr[0]['Trust-estate']) && $arr[0]['Trust-estate']=='Trust-estate')print 'checked';?>/> Trust/estate
                                </span>
                            </div>

                            <div class="taxClassification" style="clear: both; font-size: 8pt; ">
                                <input name="LLC" id="LLC" value="LLC" type="checkbox" <?php if(isset($arr[0]['LLC']) && $arr[0]['LLC']=='LLC')print 'checked';?>/>Limited liability company. Enter the tax classification
                                <br>(C=C Corporation, S=S Corporation, P=partnership)▶ <input name="clasification" id="clasification" value="<?php if(isset($arr[0]['clasification']))print $arr[0]['clasification'];?>" class="form-control" style="border-width: 0px 0px 1px 0px;width: 100px;display:inline;"/>
                                <br>Note: Check the appropriate box in the line above for the tax classification of the single-member owner.  Do not check LLC if the LLC is classified as a single-member LLC that is disregarded from the owner unless the owner of the LLC is another LLC that is not disregarded from the owner for U.S. federal tax purposes. Otherwise, a single-member LLC that is disregarded from the owner should check the appropriate box for the tax classification of its owner.
                            </div>

                            <div class="taxClassification" style="clear: both; padding-left: 6px; font-size: 8pt; padding-top: 16px;">
                                <input name="others" id="others" value="others" type="checkbox" <?php if(isset($arr[0]['others']) && $arr[0]['others']=='others')print 'checked';?>/> Other (see instructions)▶
                            </div>
                        </div>

                        <div class="col-sm-4" style="float: left;">
                            <div style="">
                                4 Exemptions (codes apply only to certain entities, not individuals; see instructions on page 3)
                            </div>
                            <br>
                            Exempt payee code (if any)<input name="Exempt-payee" id="Exempt-payee" class="form-control" style="border-width: 0px 0px 1px 0px;width: 60px;display:inline;" value="<?php if(isset($arr[0]['Exempt-payee']))print $arr[0]['Exempt-payee'];?>"/>
                            <br>
                            Exemption from FATCA reporting code (if any)<input name="Exempt-FATCA" id="Exempt-FATCA" class="form-control" style="border-width: 0px 0px 1px 0px;width: 100px;display:inline;" value="<?php if(isset($arr[0]['Exempt-FATCA']))print $arr[0]['Exempt-FATCA'];?>"/>
                            <br><br><br><br><br><br>
                            <div style="font-size: 7px;">(Applies to accounts maintained outside the U.S.)</div>
                        </div>
                    </div>

                    <div class="row" style="margin:0px;clear: both; width: 100%; border-bottom: 1px solid black;font-size: 7pt;">
                        <div class="col-sm-8" style="padding:0px;float: left; border-right: 1px solid black; ">
                            <div class="row" style="margin:0px;clear: both; border-bottom: 1px solid black; ">
                                <label for="Address">5 Address (number, street, and apt. or suite no.) See instructions.</label>
                                <input name="Address" id="Address" class="form-control" style="border-width: 0px 0px 1px 0px;" value="<?php if(isset($arr[0]['Address']))print $arr[0]['Address'];?>"/>
                            </div>

                            <div class="row" style="margin:0px;clear: both; ">
                                <label for="City-state">6 City, state, and ZIP code</label>
                                <input name="City-state" id="City-state" class="form-control" style="border-width: 0px 0px 1px 0px;" value="<?php if(isset($arr[0]['City-state']))print $arr[0]['City-state'];?>"/>
                            </div>
                        </div>

                        <div class="col-sm-4" style="">
                            <label for="Requester-name">Requester’s name and address (optional)</label>
                            <input name="Requester-name" id="Requester-name" class="form-control" style="border-width: 0px 0px 1px 0px;" value="<?php if(isset($arr[0]['Requester-name']))print $arr[0]['Requester-name'];?>"/>
                        </div>
                    </div>

                    <div class="row" style="margin:0px;clear: both; width: 100%;font-size: 7pt;">
                        <label for="account-number">7 List account number(s) here (optional)</label>
                        <input name="account-number" id="account-number" class="form-control" style="border-width: 0px 0px 1px 0px;" value="<?php if(isset($arr[0]['account-number']))print $arr[0]['account-number'];?>"/>
                    </div>
                </div>
            </div>

            <div style="width: 100%;">
                <div style="clear: both; width: 100%; border-top: 1px solid black; border-bottom: 1px solid black; height: 25px;">
                    <div style="float: left; background-color: black; width: 56px; height: 24px; line-height: 24px; color: #FFFFFF; text-align: center; font-size: 10pt; font-weight: bold;">
                        Part I
                    </div>

                    <div style="float: left; padding-left: 29px; font-weight: bold; font-size: 10pt;height: 25px;">
                        Taxpayer Identification Number (TIN)
                    </div>
                </div>

                <div class="row" style="clear: both; width: 100%; height: 128px;">
                    <div class="col-sm-8" style="float: left; font-size: 8pt;">
                        <p style="margin-top: 4px; margin-bottom: 0px;">
                            Enter your TIN in the appropriate box.  The TIN provided must match the name given on the "Name" line to avoid backup withholding.  For individuals, this is your social security number (SSN). However, for a resident alien, sole proprietor, or disregarded entity, see the Part I instructions on page 3. For other entities, it is your employer identification number (EIN). If you do not have a number, see <span style="font-style: italic;">How to get a TIN</span> on page 3.
                        </p>

                        <p style="margin-top: 7px; margin-bottom: 0px;">
                            <span style="font-weight: bold;">Note.</span> If the account is in more than one name, see the chart on page 4 for guidleines on whose number to enter.
                        </p>
                    </div>

                    <div class="col-sm-4" style="float: left;">
                        <div style="clear: both;">
                            <label for="ssn">Social security number</label>
                            <input name="ssn" id="ssn" class="form-control" style="border-width: 0px 0px 1px 0px;" value="<?php if(isset($arr[0]['ssn']))print $arr[0]['ssn'];?>"/>
                        </div>

                        <div style="clear: both;">
                            <label for="EIN">Employer identification number</label>
                            <input name="EIN" id="EIN" class="form-control" style="border-width: 0px 0px 1px 0px;" value="<?php if(isset($arr[0]['EIN']))print $arr[0]['EIN'];?>"/>
                        </div>
                    </div>
                </div>
            </div>


            <div style="width: 100%;">
                <div style="clear: both; width: 100%; border-top: 1px solid black; border-bottom: 1px solid black; height: 25px;">
                    <div style="float: left; background-color: black; width: 56px; height: 24px; line-height: 24px; color: #FFFFFF; text-align: center; font-size: 10pt; font-weight: bold;">
                        Part II
                    </div>

                    <div style="float: left; padding-left: 29px;height: 25px; font-weight: bold; font-size: 10pt;">
                        Certification
                    </div>
                </div>

                <div style="clear: both; width: 100%; font-size: 8pt;">
                    <p style="margin-top: 4px; margin-bottom: 0px;">
                        Under penalties of perjury, I certify that:
                    </p>

                    <p style="margin-top: 7px; margin-bottom: 0px;">
                        1. The number shown on this form is my correct taxpayer identification number (or I am waiting for a number to be issued to me), and
                    </p>

                    <p style="margin-top: 7px; margin-bottom: 0px;">
                        2. I am not subject to backup withholding because: (a) I am exempt from backup withholding, or (b) I have not been notified by the Internal Revenue Service (IRS) that I am subject to backup withholding as a result of a failure to report all interest or dividends, or (c) the IRS has notified me that I am no longer subject to backup withholding, and
                    </p>

                    <p style="margin-top: 7px; margin-bottom: 0px;">
                        3. I am a U.S. citizen or other U.S. person (defined below).
                    </p>

                    <p style="margin-top: 7px; margin-bottom: 2px;">
                        Certification instructions. You must cross out item 2 above if you have been notified by the IRS that you are currently subject to backup withholding because you have failed to report all interest and dividends on your tax return. For real estate transactions, item 2 does not apply. For mortgage interest paid, acquisition or abandonment of secured property, cancellation of debt, contributions to an individual retirement arrangement (IRA), and generally, payments other than interest and dividends, you are not required to sign the certification, but you must provide your correct TIN. See the instructions on page 4.
                    </p>
                </div>

                <div class="row" style="margin:0px;height:46px;clear: both; width: 100%; border-top: 1px solid black; border-bottom: 1px solid black;">
                    <div class="col-sm-1" style="float: left; width: 55px; border-right: 1px solid black;  font-size: 10pt; font-weight: bold;">
                        Sign
                        <br/ >
                        Here
                    </div>

                    <div class="col-sm-2" style="text-align: right">
                        Signature of
                        <br />
                        U.S. person ▶
                    </div>

                    <div class="col-sm-4" style="text-align: left;padding-top: 7px;">
                        <input name="sign" id="sign" type="text" class="form-control" style="display: inline;border-width: 0px 0px 1px 0px;width: 90%;"  value="<?php if(isset($arr[0]['sign']))print $arr[0]['sign'];?>">
                    </div>

                    <div class="col-sm-2" style="text-align: right;padding-top: 15px;">
                        Date ▶
                    </div>

                    <div class="col-sm-3" style="text-align: left;padding-top: 7px;">
                        <input type="text" id="datew9" class="form-control" size="10" style="display: inline;border-width: 0px 0px 1px 0px;"disabled='disabled'  value="<?php print date('m/d/Y');?>">
                    </div>
                </div>
            </div>

        </div>

		<div class="form-group pull-right" style="margin-top: 30px;">
			<button type="button" id="btn_save_w9" class="btn btn-primary">Next <span style="vertical-align: middle;font-size: 16px;" class="icon-control-forward"></span></button>
            <input type="hidden" name="w9_id_form" id="w9_id_form" value="<?php if(isset($data['form']['data']->id_form)) print $data['form']['data']->id_form;?>" />
            <input type="hidden" name="w9_today_date" id="w9_today_date" class="form-control required" readonly  value="<?php print date('m/d/Y');?>" />
		</div>

	</div>
<?php require_once(APPPATH."views/includes/footer_scripts.php");?>
<script type="text/javascript">
    jQuery(document).ready(function()
    {
        App.init();
        Masking.initMasking();
        Datepicker.initDatepicker();

        jQuery('#btn_save_w9').on('click', function ()
        {
            ValidateFrm('frm20');
            if (jQuery("#frm20").valid())
            {
                var form_name='W9';
                var x=jQuery('#frm20').find('input[datafld!=ignore], select[datafld!=ignore]').serializeArray();
                var date=jQuery('#w9_today_date').val();
                var form_sign='[{';

                jQuery.each(x, function(i, field)
                {
                    if(field.value!='')
                    {
                        if(i!=0)
                            form_sign=form_sign+',';

                        form_sign = form_sign + '"' + field.name + '":"' + field.value + '"';
                    }
                });

                form_sign=form_sign+'}]';//alert(form_sign);

                var id_employee=jQuery('#id_employee').val();
                var id_form=jQuery('#w9_id_form').val();

                var completed_percent=70;

                var data ='form_name='+form_name+
                '&form_sign='+form_sign+
                '&date='+date+
                '&completed_percent='+completed_percent+
                '&id_employee='+id_employee+
                '&id_form='+id_form;

                var url = 'Employee/SaveEmployeeForm';

                var target = document.getElementById('container');
                var spinner = new Spinner(opts).spin(target);

                jQuery.ajax({
                    type: "POST",
                    dataType: "html",
                    url: url,
                    data:data
                }).done(function(response, textStatus, jqXHR)
                {
                    if(jQuery.isNumeric(response) && response>0)
                    {
                        RebuildHeader();
                        alertify.success('Data Saved.');

                        //jQuery("#frm19 input").prop("disabled", true);
                        //jQuery('#btn_save_i9').hide();

                        if('<?php print $data['role']['data']->rol;?>'=='worker')
                        {
                            //LoadDataW9(response);
                            jQuery('#tab21').show().tab('show');
                            jQuery('#s20').removeClass('active').addClass('fade');
                            jQuery('#s21').removeClass('fade').addClass('active');
                            //goToByScroll('tab21');
                        }
                    }
                    else{alertify.error('Error: The element could not be Saved. '+ response);}
                    spinner.stop();

                }).fail(function(jqHTR, textStatus, thrown)
                {
                    alertify.error('Something is wrong with AJAX:' + textStatus);
                });
            }
        });

        function RebuildHeader()
        {
            jQuery('#div_header').empty();

            jQuery.ajax({
                url:'Main/RebuildHeader',
                type:'POST'
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#div_header').html(response);
                }
            });
        }

        function LoadDataW9(id_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_w9',view_url:'employee/InputsUpdateW9', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_w9').html(response);
                }
            });
        }
    });
</script>