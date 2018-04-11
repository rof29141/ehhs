<?php
$arr=array();
if(isset($data['form']['data']->form_sign))
{
	$json=stripslashes(html_entity_decode($data['form']['data']->form_sign));//echo $json;
	$arr= json_decode($json, true);
}
?>

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
                <input name="last-name" id="last-name" class="form-control required" value="<?php if(isset($arr[0]['last-name']))print $arr[0]['last-name'];?>"/>
              </div>

              <div class="col-sm-4">
                <label for="first-name">First Name <em>(Given Name)</em></label>
                <input name="first-name" id="first-name" class="form-control required" value="<?php if(isset($arr[0]['first-name']))print $arr[0]['first-name'];?>"/>
              </div>

              <div class="col-sm-4">
                <label for="middle-initial">Middle Initial</label>
                <input name="middle-initial" id="middle-initial" class="form-control" value="<?php if(isset($arr[0]['middle-initial']))print $arr[0]['middle-initial'];?>"/>
              </div>

            </div>
          </div>

          <div class="col-sm-4">
            <label for="other-names">Other Names Used <em>(if any)</em></label>
            <input name="other-names" id="other-names" class="form-control" value="<?php if(isset($arr[0]['other-names']))print $arr[0]['other-names'];?>"/>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-4">
            <label for="address">Address <em>(Street Number and Name)</em></label>
            <input name="address" id="address" class="form-control required" value="<?php if(isset($arr[0]['address']))print $arr[0]['address'];?>"/>
          </div>

          <div class="col-sm-2">
            <label for="apt-number">Apt. Number</label>
            <input name="apt-number" id="apt-number" class="form-control required" value="<?php if(isset($arr[0]['apt-number']))print $arr[0]['apt-number'];?>"/>
          </div>

          <div class="col-sm-3">
            <label for="city-or-town">City or Town</label>
            <input name="city-or-town" id="city-or-town" class="form-control required" value="<?php if(isset($arr[0]['city-or-town']))print $arr[0]['city-or-town'];?>"/>
          </div>

          <div class="col-sm-1">
            <label for="state">State</label>
            <input name="state" id="state" class="form-control required" value="<?php if(isset($arr[0]['state']))print $arr[0]['state'];?>"/>
          </div>

          <div class="col-sm-2">
            <label for="zip-code">Zip Code</label>
            <input name="zip-code" id="zip-code" class="form-control required" value="<?php if(isset($arr[0]['zip-code']))print $arr[0]['zip-code'];?>"/>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-3">
            <label for="date-of-birth">Date of Birth <em>(mm/dd/yyyy)</em></label>
            <input name="date-of-birth" id="date-of-birth" type="text" class="form-control required" value="<?php if(isset($arr[0]['date-of-birth']))print $arr[0]['date-of-birth'];?>"/>
          </div>

          <div class="col-sm-3">
            <label for="ssn">U.S. Social Security Number</label>
            <input name="ssnI9" id="ssnI9" class="form-control required" value="<?php if(isset($arr[0]['ssnI9']))print $arr[0]['ssnI9'];?>"/>
          </div>

          <div class="col-sm-3">
            <label for="email">Employee's E-mail Address</label>
            <input name="email" id="email" type="email" class="form-control required" value="<?php if(isset($arr[0]['email']))print $arr[0]['email'];?>"/>
          </div>

          <div class="col-sm-3">
            <label for="telephone">Employee's Telephone Number</label>
            <input name="telephone" id="telephone" type="tel" class="form-control required" value="<?php if(isset($arr[0]['telephone']))print $arr[0]['telephone'];?>"/>
          </div>
        </div>
      </div>

      <p><strong>I am aware that federal law provides for imprisonment and/or fines for
          false statements or use of false documents in connection with the
          completion of this form.</strong></p>

      <p><strong>I attest, under penalty of perjury, that I am (check one of the
          following):</strong></p>

      <ul class="list-unstyled checkbox-list">
        <li><input type="radio" name="person-status" id="citizen" class="required"
          value="citizen" <?php if(isset($arr[0]['person-status']) && $arr[0]['person-status']=='citizen')print 'checked';?>/>
          <label for="citizen">1. A citizen of the United States</label>
        </li>

        <li><input type="radio" name="person-status" id="noncitizen"
          value="noncitizen" <?php if(isset($arr[0]['person-status']) && $arr[0]['person-status']=='noncitizen')print 'checked';?>/>
          <label for="noncitizen">2. A noncitizen national of the United
            States</label>
          <em>(See instructions)</em></li>

        <li><input type="radio" name="person-status" id="permanent-resident"
          value="permanent-resident" <?php if(isset($arr[0]['person-status']) && $arr[0]['person-status']=='permanent-resident')print 'checked';?>/>
          <label for="permanent-resident">3. A lawful permanent resident</label>
          <label for="alien-number">(Alien Registration Number/USCIS
            Number):</label>
          <input name="alien-number" id="alien-number" class="form-control input-control" value="<?php if(isset($arr[0]['alien-number']))print $arr[0]['alien-number'];?>"/></li>





                  <div class="col-sm-9" style="padding: 0px;">
                        <li><input type="radio" name="person-status" id="alien-authorized" value="alien-authorized" <?php if(isset($arr[0]['person-status']) && $arr[0]['person-status']=='alien-authorized')print 'checked';?>/>
                          <label for="alien-authorized">4. An alien authorized to work
                            until</label>
                          <label for="expiration">(expiration date, if applicable,
                            mm/dd/yyyy)</label>
                          <input name="expiration" id="expiration" type="text" class="form-control input-control" value="<?php if(isset($arr[0]['expiration']))print $arr[0]['expiration'];?>"/>Some
                          aliens may write "N/A" in the expiration date field. <em>(See instructions)</em>

                          <p><em>Aliens authorized to work must provide only one of the following document numbers to complete Form I-9:
                                  An Alien Registration Number/USCIS Number OR Form I-94 Admission Number OR Foreign Passport Number.</em></p>
                          <ol>

                            <li><label for="alien-authorized-number">Alien Registration
                                Number/USCIS Number:</label>
                              <input name="alien-authorized-number" id="alien-authorized-number" class="form-control input-control"  value="<?php if(isset($arr[0]['alien-authorized-number']))print $arr[0]['alien-authorized-number'];?>"/>
                            </li>
                              <strong class="big">OR</strong><br>

                            <li><label for="formi94admissionnumber">Form I-94 Admission Number:</label>
                                <input name="formi94admissionnumber" id="formi94admissionnumber" class="form-control input-control"  value="<?php if(isset($arr[0]['formi94admissionnumber']))print $arr[0]['formi94admissionnumber'];?>"/>
                            </li>
                                <strong class="big">OR</strong><br>

                            <li><label for="foreign-passport">Foreign Passport Number:</label>
                                <input name="foreign-passport" id="foreign-passport" class="form-control input-control" value="<?php if(isset($arr[0]['foreign-passport']))print $arr[0]['foreign-passport'];?>"/>
                                <br>

                                <label for="foreign-country">Country of Issuance:</label>
                                <input name="foreign-country" id="foreign-country" class="form-control input-control" value="<?php if(isset($arr[0]['foreign-country']))print $arr[0]['foreign-country'];?>"/>
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
            <input name="signature" id="signature" class="form-control required" value="<?php if(isset($arr[0]['signature']))print $arr[0]['signature'];?>"/>
          </div>

          <div class="col-sm-4">
            <label for="signature-date">Today's Date <em>(mm/dd/yyyy)</em>:</label>
            <input name="signature-date" id="signature-date" type="text" class="form-control" readonly  value="<?php print date('m/d/Y');?>" value="<?php if(isset($arr[0]['signature-date']))print $arr[0]['signature-date'];?>"/>
          </div>
        </div>
      </div>

      <div class="header-box ">
        <strong>Preparer and/or Translator Certification (check one):</strong><br>
          <ul class="list-unstyled checkbox-list">
              <li>
                  <input type="radio" name="use_trans" id="not_use_trans" value="not_use_trans" <?php if(isset($arr[0]['use_trans']) && $arr[0]['use_trans']=='not_use_trans')print 'checked';?>>
                  <label for="not_use_trans">I did not use a preparer or translator.</label>
              </li>
              <li>
                  <input type="radio" name="use_trans" id="use_trans" value="use_trans" <?php if(isset($arr[0]['use_trans']) && $arr[0]['use_trans']=='use_trans')print 'checked';?>>
                  <label for="use_trans">A preparer(s) and/or translator(s) assisted the employee in completing Section 1.</label>
              </li>
          </ul>
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
            <input name="preparer-signature" id="preparer-signature" class="form-control" value="<?php if(isset($arr[0]['preparer-signature']))print $arr[0]['preparer-signature'];?>"/>
          </div>

          <div class="col-sm-4">
            <label for="preparer-signature-date">Today's Date
                <em>(mm/dd/yyyy)</em>:</label>
            <input name="preparer-signature-date" id="preparer-signature-date" type="text" class="form-control input-control" readonly value="<?php print date('m/d/Y');?>"/>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <label for="preparer-last-name">Last Name <em>(Family Name)</em></label>
            <input name="preparer-last-name" id="preparer-last-name" class="form-control" value="<?php if(isset($arr[0]['preparer-last-name']))print $arr[0]['preparer-last-name'];?>"/>
          </div>

          <div class="col-sm-6">
            <label for="preparer-first-name">First Name <em>(Given Name)</em></label>
            <input name="preparer-first-name" id="preparer-first-name" class="form-control" value="<?php if(isset($arr[0]['preparer-first-name']))print $arr[0]['preparer-first-name'];?>"/>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-5">
            <label for="preparer-address">Address <em>(Street Number and Name)</em></label>
            <input name="preparer-address" id="preparer-address" class="form-control" value="<?php if(isset($arr[0]['preparer-address']))print $arr[0]['preparer-address'];?>"/>
          </div>

          <div class="col-sm-4">
            <label for="preparer-city-or-town">City or Town</label>
            <input name="preparer-city-or-town" id="preparer-city-or-town" class="form-control" value="<?php if(isset($arr[0]['preparer-city-or-town']))print $arr[0]['preparer-city-or-town'];?>"/>
          </div>

          <div class="col-sm-1">
            <label for="preparer-state">State</label>
            <input name="preparer-state" id="preparer-state" class="form-control" value="<?php if(isset($arr[0]['preparer-state']))print $arr[0]['preparer-state'];?>"/>
          </div>

          <div class="col-sm-2">
            <label for="preparer-zip-code">Zip Code</label>
            <input name="preparer-zip-code" id="preparer-zip-code" class="form-control" value="<?php if(isset($arr[0]['preparer-zip-code']))print $arr[0]['preparer-zip-code'];?>"/>
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
            <label for="employer-www">Last Name <em>(Family Name)</em></label>
            <input id="employer-www" class="form-control"/>
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
	

		<div class="form-group pull-right" style="margin-top: 30px;">
			<button type="button" id="btn_save_i9" class="btn btn-primary">Next <span style="vertical-align: middle;font-size: 16px;" class="icon-control-forward"></span></button>
            <input type="hidden" datafld=ignore name="i9_id_form" id="i9_id_form" value="<?php if(isset($data['form']['data']->id_form)) print $data['form']['data']->id_form;?>" />
            <input type="hidden" name="i9_today_date" id="i9_today_date" class="form-control required" readonly  value="<?php print date('m/d/Y');?>" />
		</div>

	</div>
<?php require_once(APPPATH."views/includes/footer_scripts.php");?>
<script type="text/javascript">
    jQuery(document).ready(function()
    {
        App.init();
        Masking.initMasking();
        Datepicker.initDatepicker();

        jQuery('#btn_save_i9').on('click', function ()
        {
            ValidateFrm('frm19');
			if (jQuery("#frm19").valid())
            {
                var form_name='i9';
                var x=jQuery('#frm19').find('input[datafld!=ignore], select[datafld!=ignore]').serializeArray();
                var date=jQuery('#i9_today_date').val();
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
                var id_form=jQuery('#i9_id_form').val();

                var completed_percent=63;

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
                            LoadDataW9(response);
                            jQuery('#tab20').show().tab('show');
                            jQuery('#s19').removeClass('active').addClass('fade');
                            jQuery('#s20').removeClass('fade').addClass('active');
                            goToByScroll('tab20');
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