 <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/i9.css" rel="stylesheet">
	<div class="col-sm-12">


            <div style='text-align:justify;'>
				
				
				


    <div class="section-header row">
      <div class="col-sm-3 dhs-seal">

        <img style="width: 60px;" src="<?php print base_url('assets/images/dhs.png');?>" alt="DHS Seal"/>

      </div>

      <div class="col-sm-6 text-center">
        <h1>Employment Eligibility Verification</h1>


        <div><strong>Department of Homeland Security</strong></div>
        U.S. Citizenship and Immigration Services

      </div>

      <div class="col-sm-3 text-center">
        <strong>USCIS<br> Form I-9</strong>

        <small>
          <div>OMB No. 1615-0047</div>
          <div>Expires 08/31/2019</div>
        </small>

      </div>
    </div>

    <hr class="heavy"/>



      <p><strong>► START HERE. <small>Read instructions carefully before
            completing this form. The instructions must be available during
            completion of this form.</small></strong><br>
      <strong>ANTI-DISCRIMINATION NOTICE:</strong> It is illegal to
        discriminate against work-authorized individuals. Employers
        <strong>CANNOT</strong> specify which document(s) they will accept from an
        employee. The refusal to hire an individual because the documentation
        presented has a future expiration date may also constitute illegal
        discrimination.</p>

      <div class="header-box ">
        <strong>Section 1. Employee Information and Attestation</strong>
        <em>(Employees must complete and sign Section 1 of Form I-9 no later
          than the <strong>first day of employment</strong>, but not before
          accepting a job offer.)</em>
      </div>

      <div class="form-box ">
        <div class="row">
          <div class="col-sm-8">

            <div class="row">
              <div class="col-sm-4">
                <label for="last-name">Last Name <em>(Family Name)</em></label>
                <input id="last-name" class="form-control"/>
              </div>

              <div class="col-sm-4">
                <label for="first-name">First Name <em>(Given Name)</em></label>
                <input id="first-name" class="form-control"/>
              </div>

              <div class="col-sm-4">
                <label for="middle-initial">Middle Initial</label>
                <input id="middle-initial" class="form-control"/>
              </div>

            </div>
          </div>

          <div class="col-sm-4">
            <label for="other-names">Other Names Used <em>(if any)</em></label>
            <input id="other-names" class="form-control"/>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-4">
            <label for="address">Address <em>(Street Number and Name)</em></label>
            <input id="address" class="form-control"/>
          </div>

          <div class="col-sm-2">
            <label for="apt-number">Apt. Number</label>
            <input id="apt-number" class="form-control"/>
          </div>

          <div class="col-sm-3">
            <label for="city-or-town">City or Town</label>
            <input id="city-or-town" class="form-control"/>
          </div>

          <div class="col-sm-1">
            <label for="state">State</label>
            <input id="state" class="form-control"/>
          </div>

          <div class="col-sm-2">
            <label for="zip-code">Zip Code</label>
            <input id="zip-code" class="form-control"/>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-3">
            <label for="date-of-birth">Date of Birth <em>(mm/dd/yyyy)</em></label>
            <input id="date-of-birth" type="text" class="form-control"/>
          </div>

          <div class="col-sm-3">
            <label for="ssn">U.S. Social Security Number</label>
            <input id="ssnI9" class="form-control"/>
          </div>

          <div class="col-sm-3">
            <label for="email">Employee's E-mail Address</label>
            <input id="email" type="email" class="form-control"/>
          </div>

          <div class="col-sm-3">
            <label for="telephone">Employee's Telephone Number</label>
            <input id="telephone" type="tel" class="form-control"/>
          </div>
        </div>
      </div>

      <p><strong>I am aware that federal law provides for imprisonment and/or fines for
          false statements or use of false documents in connection with the
          completion of this form.</strong></p>

      <p><strong>I attest, under penalty of perjury, that I am (check one of the
          following):</strong></p>

      <ul class="list-unstyled checkbox-list">
        <li><input type="radio" name="person-status" id="citizen"
          value="citizen"/>
          <label for="citizen">1. A citizen of the United States</label>
        </li>

        <li><input type="radio" name="person-status" id="noncitizen"
          value="noncitizen"/>
          <label for="noncitizen">2. A noncitizen national of the United
            States</label>
          <em>(See instructions)</em></li>

        <li><input type="radio" name="person-status" id="permanent-resident"
          value="permanent-resident"/>
          <label for="permanent-resident">3. A lawful permanent resident</label>
          <label for="alien-number">(Alien Registration Number/USCIS
            Number):</label>
          <input id="alien-number" class="form-control input-control"/></li>





                  <div class="col-sm-9" style="padding: 0px;">
                        <li><input type="radio" name="person-status" id="alien-authorized" value="alien-authorized"/>
                          <label for="alien-authorized">4. An alien authorized to work
                            until</label>
                          <label for="expiration">(expiration date, if applicable,
                            mm/dd/yyyy)</label>
                          <input id="expiration" type="text" class="form-control input-control"/>Some
                          aliens may write "N/A" in the expiration date field. <em>(See instructions)</em>

                          <p><em>Aliens authorized to work must provide only one of the following document numbers to complete Form I-9:
                                  An Alien Registration Number/USCIS Number OR Form I-94 Admission Number OR Foreign Passport Number.</em></p>
                          <ol>

                            <li><label for="alien-authorized-number">Alien Registration
                                Number/USCIS Number:</label>
                              <input id="alien-authorized-number" class="form-control input-control" />
                            </li>
                              <strong class="big">OR</strong><br>

                            <li><label for="formi94admissionnumber">Form I-94 Admission Number:</label>
                                <input id="formi94admissionnumber" class="form-control input-control" />
                            </li>
                                <strong class="big">OR</strong><br>

                            <li><label for="foreign-passport">Foreign Passport Number:</label>
                                <input id="foreign-passport" class="form-control input-control"/>
                                <br>

                                <label for="foreign-country">Country of Issuance:</label>
                                <input id="foreign-country" class="form-control input-control"/>
                            </li>

                          </ol>
                        </li>
                  </div>


                  <div class="col-sm-3 text-center" style="padding-top: 20px;">
                      QR Code - Section 1
                      <br>
                      Do Not Write In This Space
                  </div>


      </ul>

      <div class="form-box" style="margin-bottom: 15px;">
        <div class="row">
          <div class="col-sm-8">
            <label for="signature">Signature of Employee:</label>
            <input id="signature" class="form-control"/>
          </div>

          <div class="col-sm-4">
            <label for="signature-date">Today's Date <em>(mm/dd/yyyy)</em>:</label>
            <input id="signature-date" type="text" class="form-control"/>
          </div>
        </div>
      </div>

      <div class="header-box ">
        <strong>Preparer and/or Translator Certification (check one):</strong><br>
          <label class="checkbox"><input type="checkbox" name="not_use_trans" id="not_use_trans"><i></i>I did not use a preparer or translator.</label>
          <label class="checkbox"><input type="checkbox" name="use_trans" id="use_trans"><i></i>A preparer(s) and/or translator(s) assisted the employee in completing Section 1.</label>
        <em>(Fields below must be completed and signed when preparers and/or translators assist an employee in completing Section 1.)</em>
      </div>


      <p><strong>I attest, under penalty of perjury, that I have assisted in the
          completion of this form and that to the best of my knowledge the
          information is true and correct.</strong></p>

      <div class="form-box ">
        <div class="row">
          <div class="col-sm-8">
            <label for="preparer-signature">Signature of Preparer or
              Translator:</label>
            <input id="preparer-signature" class="form-control"/>
          </div>

          <div class="col-sm-4">
            <label for="preparer-signature-date">Today's Date
                <em>(mm/dd/yyyy)</em>:</label>
            <input id="preparer-signature-date" type="text"
              class="form-control input-control"/>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <label for="preparer-last-name">Last Name <em>(Family Name)</em></label>
            <input id="preparer-last-name" class="form-control"/>
          </div>

          <div class="col-sm-6">
            <label for="preparer-first-name">First Name <em>(Given Name)</em></label>
            <input id="preparer-first-name" class="form-control"/>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-5">
            <label for="preparer-address">Address <em>(Street Number and Name)</em></label>
            <input id="preparer-address" class="form-control"/>
          </div>

          <div class="col-sm-4">
            <label for="preparer-city-or-town">City or Town</label>
            <input id="preparer-city-or-town" class="form-control"/>
          </div>

          <div class="col-sm-1">
            <label for="preparer-state">State</label>
            <input id="preparer-state" class="form-control"/>
          </div>

          <div class="col-sm-2">
            <label for="preparer-zip-code">Zip Code</label>
            <input id="preparer-zip-code" class="form-control"/>
          </div>
        </div>
      </div>
<!--
      <div class="stop">
        <img src="images/stop.png" alt="Stop">
        <div class="stop-text">Employer Completes Next Page</div>
        <img src="images/stop.png" alt="Stop">
      </div>

      <hr class="heavy"/>

      <div class="header-box">
        <strong>Section 2. Employer or Authorized Representative Review and
          Verification</strong>
        <p><em>(Employers or their authorized representative must complete and
            sign Section 2 within 3 business days of the employee's first day of
            employment. You must physically examine one document from List A
            <strong>OR</strong> examine a combination of one document from List
            B and one document from List C as listed on the "Lists of Acceptable
            Documents" on the next page of this form. For each document you
            review, record the following information: document title, issuing
            authority, document number, and expiration date, if any.)</em></p>
      </div>

      <div class="form-cell">
        <label for="employee">Employee Last Name, First Name and Middle Initial
          from Section 1:</label>
        <input id="employee" class="form-control input-control"/>
      </div>

      <table class="documents">
        <thead>
          <tr>
            <th>
              <h6>List A</h6>
              Identity and Employment Authorization
            </th>

            <th class="or-column">or</th>

            <th>
              <h6>List B</h6>
              Identity

              <div class="cell-corner">and</div>
            </th>

            <th>
              <h6>List C</h6>
              Employment Authorization
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td id="document-list-a">
              <div class="document-item" id="document-item-template">
                <div class="document-cell">
                  <label for="document-title-a[0]">Document Title:</label>
                  <input id="document-title-a[0]" class="form-control"/>
                </div>

                <div class="document-cell">
                  <label for="document-authority-a[0]">Issuing Authority:</label>
                  <input id="document-authority-a[0]" class="form-control"/>
                </div>

                <div class="document-cell">
                  <label for="document-number-a[0]">Document Number:</label>
                  <input id="document-number-a[0]" class="form-control"/>
                </div>

                <div class="document-cell">
                  <label for="document-expiration-a[0]">Expiration Date
                    <em>(if any) (mm/dd/yyyy)</em></label>
                  <input id="document-expiration-a[0]" class="form-control"/>
                </div>
              </div>

              <button class="document-add btn" id="document-add-a">+</button>
            </td>

            <td class="or-column"></td>

            <td id="document-list-b">
              <button class="document-add btn" id="document-add-b">+</button>
            </td>

            <td id="document-list-c">
              <button class="document-add btn" id="document-add-c">+</button>
            </td>
          </tr>
        </tbody>
      </table>

      <h4 class="large">Certification</h4>
      <p><strong>I attest, under penalty of perjury, that (1) I have examined
          the document(s) presented by the above-named employee, (2) the
          above-listed document(s) appear to be genuine and to relate to the
          employee named, and (3) to the best of my knowledge the employee is
          authorized to work in the United States.</strong></p>

      <p><label for="first-day"><strong>The employee's first day of employment
            <em>(mm/dd/yyyy)</em>:</strong></label>
        <strong><input id="first-day" type="date"
          class="form-control input-control"/>
        <em>(See instructions for exemptions.)</em></strong>
      </p>

      <div class="form-box ">
        <div class="row">
          <div class="col-sm-5">
            <label for="employer-signature">Signature of Employer or Authorized
              Representative</label>
            <input id="employer-signature" class="form-control"/>
          </div>

          <div class="col-sm-2">
            <label for="employer-signature-date">Date (mm/dd/yyyy):</label>
            <input id="employer-signature-date" type="date"
              class="form-control input-control"/>
          </div>

          <div class="col-sm-5">
            <label for="employer-title">Title of Employer or Authorized
              Representative</label>
            <input id="employer-title" class="form-control input-control"/>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-3">
            <label for="employer-last-name">Last Name <em>(Family Name)</em></label>
            <input id="employer-last-name" class="form-control"/>
          </div>

          <div class="col-sm-3">
            <label for="employer-first-name">First Name <em>(Given Name)</em></label>
            <input id="employer-first-name" class="form-control"/>
          </div>

          <div class="col-sm-6">
            <label for="employer-business-name">Employer's Business or
              Organization Name</label>
            <input id="employer-business-name" class="form-control"/>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <label for="employer-address">Employer's Business or Organization
              Address <em>(Street Number and Name)</em></label>
            <input id="employer-address" class="form-control"/>
          </div>

          <div class="col-sm-3">
            <label for="employer-city-or-town">City or Town</label>
            <input id="employer-city-or-town" class="form-control"/>
          </div>

          <div class="col-sm-1">
            <label for="employer-state">State</label>
            <input id="employer-state" class="form-control"/>
          </div>

          <div class="col-sm-2">
            <label for="employer-zip-code">Zip Code</label>
            <input id="employer-zip-code" class="form-control"/>
          </div>
        </div>
      </div>

      <div class="header-box ">
        <strong>Section 3. Reverification and Rehires</strong>
        <em>(To be completed and signed by employer or authorized
          representative.)</em>
      </div>

      <div class="form-box ">
        <div class="row">
          <div class="col-sm-8">
            <label for="new-name"><strong>A.</strong>
              New Name <em>(if applicable)</em> Last Name <em>(Family Name)</em>
              First Name <em>(Given Name) Middle Initial</em></label>
            <input id="new-name" class="form-control"/>
          </div>

          <div class="col-sm-4">
            <label for="rehire-date"><strong>B.</strong>
              Date of Rehire <em>(if applicable) (mm/dd/yyyy)</em></label>
            <input id="rehire-date" type="date" class="form-control"/>
          </div>
        </div>
      </div>

      <div class="form-cell ">
        <strong>C.</strong> If employee's previous grant of employment
        authorization has expired, provide the information for the document from
        List A or List C the employee presented that establishes current
        employment authorization in the space provided below.
      </div>

      <div class="form-box ">
        <div class="row">
          <div class="col-sm-4">
            <label for="document-title">Document Title:</label>
            <input id="document-title" class="form-control"/>
          </div>

          <div class="col-sm-4">
            <label for="document-number">Document Number:</label>
            <input id="document-number" class="form-control"/>
          </div>

          <div class="col-sm-4">
            <label for="expiration-date">Expiration Date
              <em>(if any) (mm/dd/yyyy)</em></label>
            <input id="expiration-date" type="date" class="form-control"/>
          </div>
        </div>
      </div>

      <p><strong>I attest, under penalty of perjury, that to the best of my
          knowledge, this employee is authorized to work in the United States,
          and if the employee presented document(s), the document(s) I have
          examined appear to be genuine and to relate to the
          individual.</strong></p>

      <div class="form-box ">
        <div class="row">
          <div class="col-sm-5">
            <label for="employer-signature2">Signature of Employer or Authorized
              Representative:</label>
            <input id="employer-signature2" class="form-control"/>
          </div>

          <div class="col-sm-2">
            <label for="employer-signature-date">Date
              <em>(mm/dd/yyyy)</em>:</label>
            <input id="employer-signature2-date" type="date"
              class="form-control"/>
          </div>

          <div class="col-sm-5">
            <label for="employer-name">Print Name of Employer or Authorized
              Representative:</label>
            <input id="employer-name" class="form-control"/>
          </div>
        </div>
      </div>

      <hr class="heavy"/>

      <h2>LISTS OF ACCEPTABLE DOCUMENTS</h2>
      <h2>All documents must be UNEXPIRED</h2>

      <br>

      <p class="text-center">Employees may present one selection from List
        A<br>
        or a combination of one selection from List B and one selection from
        List C.</p>

      <table class="documents-table">
        <thead>
          <tr>
            <th>
              <h6>List A</h6>
              Documents that Establish<br>
              Both Identity and<br>
              Employment Authorization
            </th>

            <th class="or-column">or</th>

            <th>
              <h6>List B</h6>
              Documents that Establish Identity

              <div class="cell-corner">and</div>
            </th>

            <th>
              <h6>List C</h6>
              Documents that Establish Employment Authorization
            </th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>
              <ol>
                <li>U.S. Passport or U.S. Passport Card</li>
                <li>Permanent Resident Card or Alien
                  Registration Receipt Card (Form I-551)</li>
                <li>Foreign passport that contains a temporary I-551 stamp
                  or temporary I-551 printed notation on a machine- readable
                  immigrant visa</li>
                <li>Employment Authorization Document that contains a
                  photograph (Form I-766)</li>

                <li>For a nonimmigrant alien authorized to work for a
                  specific employer because of his or her status:
                  <ol>
                    <li>Foreign passport; and</li>
                    <li>Form I-94 or Form I-94A that has the following:
                      <ol>
                        <li>The same name as the passport; and</li>
                        <li>An endorsement of the alien's nonimmigrant
                          status as long as that period of endorsement has
                          not yet expired and the proposed employment is not
                          in conflict with any restrictions or limitations
                          identified on the form.</li>
                      </ol>
                    </li>
                  </ol>
                </li>

                <li>Passport from the Federated States of Micronesia (FSM)
                  or the Republic of the Marshall Islands (RMI) with Form
                  I-94 or Form I-94A indicating nonimmigrant admission under
                  the Compact of Free Association Between the United States
                  and the FSM or RMI</li>
              </ol>
            </td>

            <td class="or-column"></td>

            <td>
              <ol>
                <li>Driver's license or ID card issued by a State or
                  outlying possession of the United States provided it
                  contains a photograph or information such as name, date of
                  birth, gender, height, eye color, and address</li>
                <li>ID card issued by federal, state or local government
                  agencies or entities, provided it contains a photograph or
                  information such as name, date of birth, gender, height,
                  eye color, and address</li>
                <li>School ID card with a photograph</li>
                <li>Voter's registration card</li>
                <li>U.S. Military card or draft record</li>
                <li>Military dependent's ID card</li>
                <li>U.S. Coast Guard Merchant Mariner Card</li>
                <li>Native American tribal document</li>
                <li>Driver's license issued by a Canadian
                  government authority</li>
                <li class="list-break-note">For persons under age 18 who are
                    unable to present a document listed above:</li>
                <li>School record or report card</li>
                <li>Clinic, doctor, or hospital record</li>
                <li>Day-care or nursery school record</li>
              </ol>
            </td>

            <td>
              <ol>
                <li>A Social Security Account Number card, unless the card
                  includes one of the following restrictions:
                  <ol class="angry-list">
                    <li>Not valid for employment</li>
                    <li>Valid for work only with INS authorization</li>
                    <li>Valid for work only with DHS authorization</li>
                  </ol>
                </li>

                <li>Certification of Birth Abroad issued by the Department
                  of State (Form FS-545)</li>
                <li>Certification of Report of Birth issued by the
                  Department of State (Form DS-1350)</li>
                <li>Original or certified copy of birth certificate issued
                  by a State, county, municipal authority, or territory of
                  the United States bearing an official seal</li>
                <li>Native American tribal document</li>
                <li>U.S. Citizen ID Card (Form I-197)</li>
                <li>Identification Card for Use of Resident Citizen in the
                  United States (Form I-179)</li>
                <li>Employment authorization document issued by the
                  Department of Homeland Security</li>
              </ol>
            </td>
          </tr>
        </tbody>
      </table>

      <div class="end-notes">
        <p>Illustrations of many of these documents appear in Part 8 of the
          Handbook for Employers (M-274).</p>
        <p>Refer to Section 2 of the instructions, titled "Employer or
          Authorized Representative Review and Verification," for more
          information about acceptable receipts.</p>
      </div>
-->

				
				
				

			</div>


	
		<div class="row">   
			<section class="col col-8">
				<div class="form-group">
					<label>
						Sign typing your full name 
						<?php 
						if(isset($data['profile']['data']->first_name)) print 'like this: '.$data['profile']['data']->first_name;
						if(isset($data['profile']['data']->second_name)) print ' '.$data['profile']['data']->second_name;
						if(isset($data['profile']['data']->last_name)) print ' '.$data['profile']['data']->last_name;
						?>
					</label>
                    <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="over_form_sign" id="over_form_sign" class="form-control required" value="<?php if(isset($data['form']['data']->form_sign)) print $data['form']['data']->form_sign;?>"/>
				</div>
			</section>
			
			<section class="col col-4">
				<label>Date</label>
                <input type="text" name="over_today_date" id="over_today_date" class="form-control required" disabled='disabled'  value="<?php print date('m/d/Y');?>" />
			</section>
		</div>

		<div class="form-group pull-right">
			<button type="button" id="btn_save_over" class="btn btn-primary">Next <span style="vertical-align: middle;font-size: 16px;" class="icon-control-forward"></span></button>
            <input type="hidden" name="over_id_form" id="over_id_form" value="<?php if(isset($data['form']['data']->id_form)) print $data['form']['data']->id_form;?>" />
		</div>

	</div>
<?php require_once(APPPATH."views/includes/footer_scripts.php");?>
<script type="text/javascript">
    jQuery(document).ready(function()
    {
		jQuery('#btn_save_over').on('click', function ()
        {
            ValidateFrm('frm11');
			if (jQuery("#frm11").valid()) 
			{
                var consent_name1=jQuery('#over_lg1').html();
                var sign1=jQuery('#over_initial1').val();
                var id_consent1=jQuery('#over_id_consent1').val();

                var form_name='over';
                var form_sign=jQuery('#over_form_sign').val();
                var date=jQuery('#over_today_date').val();

                var id_employee=jQuery('#id_employee').val();
                var id_form=jQuery('#over_id_form').val();

                var completed_percent=60;

                var data =
                    {
                        consent_name1:consent_name1,
                        sign1:sign1,
                        id_consent1:id_consent1,
                        form_name:form_name,
                        form_sign:form_sign,
                        date:date,
                        completed_percent:completed_percent,
                        id_employee:id_employee,
                        id_form:id_form
                    };

                var url = 'Employee/SaveEmployeeFormConsent';

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

                        jQuery("#frm11 input").prop("disabled", true);
                        jQuery('#btn_save_over').hide();

                        if('<?php print $data['role']['data']->rol;?>'=='worker')
                        {
                            LoadDataEmergency(response);
                            jQuery('#tab12').show().tab('show');
                            jQuery('#s11').removeClass('active').addClass('fade');
                            jQuery('#s12').removeClass('fade').addClass('active');
                            goToByScroll('tab12');
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

        function LoadDataEmergency(id_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_emergency',view_url:'employee/InputsUpdateEmergencyNotification', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_emergency').html(response);
                }
            });
        }
    });
</script>