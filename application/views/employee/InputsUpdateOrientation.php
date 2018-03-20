
	<div class="col-sm-12">
		<fieldset class="myfieldset">
            <?php $lg='Employee orientation';?>
            <legend class="mylegend" id="orientation_lg1"><?php print $lg;?></legend>

            <div class="row" style="margin: 0px;">

                <div class="col-lg-3">
                    <p><b>Introduction to the Organization: </b>
                </div>

                <div class="col-lg-3">
                    <?php $num=1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                    <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                    <label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Initial Orientation &nbsp;&nbsp;
                </div>

                <div class="col-lg-3">
                    <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                    <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                    <label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Annual Update &nbsp;&nbsp;
                </div>

                <div class="col-lg-3">
                    <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                    <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                    <label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Ongoing Update</label></p>
                </div>

            </div>

            <div style='text-align:justify;'>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> History</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Corporate structure</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Mission, vision, values, goals and customer service perspective</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Types of care or services provided</label></p>
				<p><b>Organization's Polices and Producers:</b></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Ethics</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Advance Directives/Living Wills/ Healthcare Surrogate</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Confidentially of Patient, Staff and Organization Information</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Care or Service Responsibilities -Roles and Responsibilities of Interdisciplinary Healthcare Team Members</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Patient Rights</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Responsibilities Types of care or services provided</label></p>
				<p><b>Personnel Policies:</b></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Hours of work/ pay period</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Holidays Sick/Personal Time</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Insurance and other benefits</label></p>
				<p><b>Infection/Exposure Control:</b></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Personal hygiene</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Aseptic procedures</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Communicable Disease</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Precautions</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Cleaning, disinfection and sterilization of equipment and supplies</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Personal Safety/Security on the jobs , in the Automobile, in the Home</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Safety within the Patient's Place of Residence:
						<p>-Bathroom</p>
						<p>-Environmental</p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Fire</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Emergency Management</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Electrical</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Communication with Supervisors</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Reporting Concerns</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Joint commission Hotline and how to report safety concerns</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Important numbers to call</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Other Topics that may be included:</label></p>
				<p><b>Overview of: Specialty Services</b></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Personal Care and support</label></p>

                <?php $num=$num+1;$lb='orientation_'.$num.'_checkbox';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}?>
                <input type="hidden" name="orientation_id_cbx<?php print $num;?>" id="orientation_id_cbx<?php print $num;?>" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                <p><label class="checkbox"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_cbx<?php print $num;?>' id='orientation_cbx<?php print $num;?>' type='checkbox' class="required" <?php if(isset($sign) && $sign!='') print 'checked';$sign='';?>><i></i> Hand hygiene</label></p>

			</div>

            <?php //var_dump($data);
            if(isset($data['consent']['data']) && $data['consent']['data']!='')
            {//var_dump($data['consent']['data']);
                foreach ($data['consent']['data'] as $row)
                {
                    if($row->consent_name==$lg)
                    {
                        $id_consent=$row->id_consent;
                        $sign=$row->sign;
                        break;
                    }
                }
            }
            ?>
            <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="hidden" name="orientation_id_consent1" id="orientation_id_consent1" value="<?php if(isset($id_consent)) print $id_consent;?>" />

            <div class="form-group">
				<label>
					Initials 
					<?php 
					if(isset($data['profile']['data']->first_name)) print 'of '.$data['profile']['data']->first_name;
					if(isset($data['profile']['data']->second_name)) print ' '.$data['profile']['data']->second_name;
					if(isset($data['profile']['data']->last_name)) print ' '.$data['profile']['data']->last_name;
					?>
				</label>

				<input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="orientation_initial1" id="orientation_initial1" class="form-control required" size='4' style='width:100px !important;' value="<?php if(isset($sign) && $sign!='') print $sign;$sign='';?>"/>
			</div>
		
		</fieldset>
	
		<fieldset class="myfieldset">
            <?php $lg='Alzheimer\'s trainings and handouts information';?>
            <legend class="mylegend" id="orientation_lg2"><?php print $lg;?></legend>

            <div class="row" style="margin: 0px;">

                <div class="col-lg-3">
                    <p>Please check one: </p>
                </div>

                <div class="col-lg-3">
                    <?php $lb='orientation_radio1';if(isset($data['consent']['data']) && $data['consent']['data']!=''){foreach ($data['consent']['data'] as $row){if($row->consent_name==$lb){$id_consent=$row->id_consent;$sign=$row->sign;break;}}}$rbt1='Initial Orientation';$rbt2='Annual Update';$rbt3='Ongoing Update';?>
                    <input type="hidden" name="orientation_id_rbt1" id="orientation_id_rbt1" value="<?php if(isset($id_consent)) print $id_consent;?>" />
                    <label class="radio"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_rbt1' id='orientation_rbt1' type='radio' class="required" <?php if(isset($sign) && $sign!='' && $sign==$rbt1) print 'checked';?>><i class="rounded-x"></i> <?php print $rbt1;?> </label>
                </div>

                <div class="col-lg-3">
                    <label class="radio"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_rbt1' id='orientation_rbt2' type='radio' class="required" <?php if(isset($sign) && $sign!='' && $sign==$rbt2) print 'checked';?>><i class="rounded-x"></i> <?php print $rbt2;?> </label>
                </div>

                <div class="col-lg-3">
                    <label class="radio"><input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'disabled="disabled"';?> name='orientation_rbt1' id='orientation_rbt3' type='radio' class="required" <?php if(isset($sign) && $sign!='' && $sign==$rbt3) print 'checked';$sign='';?>><i class="rounded-x"></i> <?php print $rbt3;?> </label>
                </div>

            </div>

            <div style='text-align:justify;'>

				<p>This is the policy of the agency that all staff providing direct patient care must receive basic written information about interacting with participants that have Alzheimer's disease or dementia related disorders. All employees upon hire shall provide to the agency a two (2) hours training certificate in Alzheimer's disease and dementia related disorders as required in section 400.4785(1) (A), F.S. The employee will renew this certification Bi-annually.</p>

				<p>I have attended the Alzheimer's disease training program and I have received written basic information about interacting with participants that have Alzheimer's disease and dementia related disorders.</p> 

			</div>

            <?php //var_dump($data);
            if(isset($data['consent']['data']) && $data['consent']['data']!='')
            {//var_dump($data['consent']['data']);
                foreach ($data['consent']['data'] as $row)
                {
                    if($row->consent_name==$lg)
                    {
                        $id_consent=$row->id_consent;
                        $sign=$row->sign;
                        break;
                    }
                }
            }
            ?>
            <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="hidden" name="orientation_id_consent2" id="orientation_id_consent2" value="<?php if(isset($id_consent)) print $id_consent;?>" />


            <div class="form-group">
				<label>
					Initials 
					<?php 
					if(isset($data['profile']['data']->first_name)) print 'of '.$data['profile']['data']->first_name;
					if(isset($data['profile']['data']->second_name)) print ' '.$data['profile']['data']->second_name;
					if(isset($data['profile']['data']->last_name)) print ' '.$data['profile']['data']->last_name;
					?>
				</label>

                <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="orientation_initial2" id="orientation_initial2" class="form-control required" size='4' style='width:100px !important;' value="<?php if(isset($sign) && $sign!='') print $sign;$sign='';?>"/>
			</div>
		
		</fieldset>
	
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
                    <input <?php if(isset($data['completed_percent']['data']->completed_percent) && $data['completed_percent']['data']->completed_percent==100)print 'readonly';?> type="text" name="orientation_form_sign" id="orientation_form_sign" class="form-control required" value="<?php if(isset($data['form']['data']->form_sign)) print $data['form']['data']->form_sign;?>"/>
				</div>
			</section>
			
			<section class="col col-4">
				<label>Date</label>
                <input type="text" name="orientation_today_date" id="orientation_today_date" class="form-control required" disabled='disabled'  value="<?php print date('m/d/Y');?>" />
			</section>
		</div>

		<div class="form-group pull-right">
			<button type="button" id="btn_save_orientation" class="btn btn-primary">Next <span style="vertical-align: middle;font-size: 16px;" class="icon-control-forward"></span></button>
            <input type="hidden" name="orientation_id_form" id="orientation_id_form" value="<?php if(isset($data['form']['data']->id_form)) print $data['form']['data']->id_form;?>" />
		</div>

	</div>
<?php require_once(APPPATH."views/includes/footer_scripts.php");?>
<script type="text/javascript">
    jQuery(document).ready(function()
    {//jQuery("#frm8 input").prop("checked", true);
		jQuery('#btn_save_orientation').on('click', function ()
        {

            ValidateFrm('frm8');
			if (jQuery("#frm8").valid()) 
			{
			    var cbx_name1='orientation_1_checkbox';
                var cbx_name2='orientation_2_checkbox';
                var cbx_name3='orientation_3_checkbox';
                var cbx_name4='orientation_4_checkbox';
                var cbx_name5='orientation_5_checkbox';
                var cbx_name6='orientation_6_checkbox';
                var cbx_name7='orientation_7_checkbox';
                var cbx_name8='orientation_8_checkbox';
                var cbx_name9='orientation_9_checkbox';
                var cbx_name10='orientation_10_checkbox';
                var cbx_name11='orientation_11_checkbox';
                var cbx_name12='orientation_12_checkbox';
                var cbx_name13='orientation_13_checkbox';
                var cbx_name14='orientation_14_checkbox';
                var cbx_name15='orientation_15_checkbox';
                var cbx_name16='orientation_16_checkbox';
                var cbx_name17='orientation_17_checkbox';
                var cbx_name18='orientation_18_checkbox';
                var cbx_name19='orientation_19_checkbox';
                var cbx_name20='orientation_20_checkbox';
                var cbx_name21='orientation_21_checkbox';
                var cbx_name22='orientation_22_checkbox';
                var cbx_name23='orientation_23_checkbox';
                var cbx_name24='orientation_24_checkbox';
                var cbx_name25='orientation_25_checkbox';
                var cbx_name26='orientation_26_checkbox';
                var cbx_name27='orientation_27_checkbox';
                var cbx_name28='orientation_28_checkbox';
                var cbx_name29='orientation_29_checkbox';
                var cbx_name30='orientation_30_checkbox';
                var cbx_name31='orientation_31_checkbox';
                var cbx_name32='orientation_32_checkbox';
                var cbx_name33='orientation_33_checkbox';

                if(jQuery('#orientation_cbx1').prop('checked'))var cbx1=1;else var cbx1=0;
                if(jQuery('#orientation_cbx2').prop('checked'))var cbx2=1;else var cbx2=0;
                if(jQuery('#orientation_cbx3').prop('checked'))var cbx3=1;else var cbx3=0;
                if(jQuery('#orientation_cbx4').prop('checked'))var cbx4=1;else var cbx4=0;
                if(jQuery('#orientation_cbx5').prop('checked'))var cbx5=1;else var cbx5=0;
                if(jQuery('#orientation_cbx6').prop('checked'))var cbx6=1;else var cbx6=0;
                if(jQuery('#orientation_cbx7').prop('checked'))var cbx7=1;else var cbx7=0;
                if(jQuery('#orientation_cbx8').prop('checked'))var cbx8=1;else var cbx8=0;
                if(jQuery('#orientation_cbx9').prop('checked'))var cbx9=1;else var cbx9=0;
                if(jQuery('#orientation_cbx10').prop('checked'))var cbx10=1;else var cbx10=0;
                if(jQuery('#orientation_cbx11').prop('checked'))var cbx11=1;else var cbx11=0;
                if(jQuery('#orientation_cbx12').prop('checked'))var cbx12=1;else var cbx12=0;
                if(jQuery('#orientation_cbx13').prop('checked'))var cbx13=1;else var cbx13=0;
                if(jQuery('#orientation_cbx14').prop('checked'))var cbx14=1;else var cbx14=0;
                if(jQuery('#orientation_cbx15').prop('checked'))var cbx15=1;else var cbx15=0;
                if(jQuery('#orientation_cbx16').prop('checked'))var cbx16=1;else var cbx16=0;
                if(jQuery('#orientation_cbx17').prop('checked'))var cbx17=1;else var cbx17=0;
                if(jQuery('#orientation_cbx18').prop('checked'))var cbx18=1;else var cbx18=0;
                if(jQuery('#orientation_cbx19').prop('checked'))var cbx19=1;else var cbx19=0;
                if(jQuery('#orientation_cbx20').prop('checked'))var cbx20=1;else var cbx20=0;
                if(jQuery('#orientation_cbx21').prop('checked'))var cbx21=1;else var cbx21=0;
                if(jQuery('#orientation_cbx22').prop('checked'))var cbx22=1;else var cbx22=0;
                if(jQuery('#orientation_cbx23').prop('checked'))var cbx23=1;else var cbx23=0;
                if(jQuery('#orientation_cbx24').prop('checked'))var cbx24=1;else var cbx24=0;
                if(jQuery('#orientation_cbx25').prop('checked'))var cbx25=1;else var cbx25=0;
                if(jQuery('#orientation_cbx26').prop('checked'))var cbx26=1;else var cbx26=0;
                if(jQuery('#orientation_cbx27').prop('checked'))var cbx27=1;else var cbx27=0;
                if(jQuery('#orientation_cbx28').prop('checked'))var cbx28=1;else var cbx28=0;
                if(jQuery('#orientation_cbx29').prop('checked'))var cbx29=1;else var cbx29=0;
                if(jQuery('#orientation_cbx30').prop('checked'))var cbx30=1;else var cbx30=0;
                if(jQuery('#orientation_cbx31').prop('checked'))var cbx31=1;else var cbx31=0;
                if(jQuery('#orientation_cbx32').prop('checked'))var cbx32=1;else var cbx32=0;
                if(jQuery('#orientation_cbx33').prop('checked'))var cbx33=1;else var cbx33=0;

                var id_consent_cbx1=jQuery('#orientation_id_cbx1').val();
                var id_consent_cbx2=jQuery('#orientation_id_cbx2').val();
                var id_consent_cbx3=jQuery('#orientation_id_cbx3').val();
                var id_consent_cbx4=jQuery('#orientation_id_cbx4').val();
                var id_consent_cbx5=jQuery('#orientation_id_cbx5').val();
                var id_consent_cbx6=jQuery('#orientation_id_cbx6').val();
                var id_consent_cbx7=jQuery('#orientation_id_cbx7').val();
                var id_consent_cbx8=jQuery('#orientation_id_cbx8').val();
                var id_consent_cbx9=jQuery('#orientation_id_cbx9').val();
                var id_consent_cbx10=jQuery('#orientation_id_cbx10').val();
                var id_consent_cbx11=jQuery('#orientation_id_cbx11').val();
                var id_consent_cbx12=jQuery('#orientation_id_cbx12').val();
                var id_consent_cbx13=jQuery('#orientation_id_cbx13').val();
                var id_consent_cbx14=jQuery('#orientation_id_cbx14').val();
                var id_consent_cbx15=jQuery('#orientation_id_cbx15').val();
                var id_consent_cbx16=jQuery('#orientation_id_cbx16').val();
                var id_consent_cbx17=jQuery('#orientation_id_cbx17').val();
                var id_consent_cbx18=jQuery('#orientation_id_cbx18').val();
                var id_consent_cbx19=jQuery('#orientation_id_cbx19').val();
                var id_consent_cbx20=jQuery('#orientation_id_cbx20').val();
                var id_consent_cbx21=jQuery('#orientation_id_cbx21').val();
                var id_consent_cbx22=jQuery('#orientation_id_cbx22').val();
                var id_consent_cbx23=jQuery('#orientation_id_cbx23').val();
                var id_consent_cbx24=jQuery('#orientation_id_cbx24').val();
                var id_consent_cbx25=jQuery('#orientation_id_cbx25').val();
                var id_consent_cbx26=jQuery('#orientation_id_cbx26').val();
                var id_consent_cbx27=jQuery('#orientation_id_cbx27').val();
                var id_consent_cbx28=jQuery('#orientation_id_cbx28').val();
                var id_consent_cbx29=jQuery('#orientation_id_cbx29').val();
                var id_consent_cbx30=jQuery('#orientation_id_cbx30').val();
                var id_consent_cbx31=jQuery('#orientation_id_cbx31').val();
                var id_consent_cbx32=jQuery('#orientation_id_cbx32').val();
                var id_consent_cbx33=jQuery('#orientation_id_cbx33').val();

                var rbt_name1='orientation_radio1';
                if(jQuery('#orientation_rbt1').is(':checked'))var rbt1='<?php print $rbt1;?>';
                else if(jQuery('#orientation_rbt2').is(':checked'))var rbt1='<?php print $rbt2;?>';
                else if(jQuery('#orientation_rbt3').is(':checked'))var rbt1='<?php print $rbt3;?>';
                var id_consent_rbt1=jQuery('#orientation_id_rbt1').val();//alert(rbt1);

                var consent_name1=jQuery('#orientation_lg1').html();
                var consent_name2=jQuery('#orientation_lg2').html();

                var sign1=jQuery('#orientation_initial1').val();
                var sign2=jQuery('#orientation_initial2').val();

                var id_consent1=jQuery('#orientation_id_consent1').val();
                var id_consent2=jQuery('#orientation_id_consent2').val();

                var form_name='orientation';
                var form_sign=jQuery('#orientation_form_sign').val();
                var date=jQuery('#orientation_today_date').val();

                var id_employee=jQuery('#id_employee').val();
                var id_form=jQuery('#orientation_id_form').val();

                var completed_percent=48;

                var data =
                {
                    cbx_name1:cbx_name1,
                    cbx_name2:cbx_name2,
                    cbx_name3:cbx_name3,
                    cbx_name4:cbx_name4,
                    cbx_name5:cbx_name5,
                    cbx_name6:cbx_name6,
                    cbx_name7:cbx_name7,
                    cbx_name8:cbx_name8,
                    cbx_name9:cbx_name9,
                    cbx_name10:cbx_name10,
                    cbx_name11:cbx_name11,
                    cbx_name12:cbx_name12,
                    cbx_name13:cbx_name13,
                    cbx_name14:cbx_name14,
                    cbx_name15:cbx_name15,
                    cbx_name16:cbx_name16,
                    cbx_name17:cbx_name17,
                    cbx_name18:cbx_name18,
                    cbx_name19:cbx_name19,
                    cbx_name20:cbx_name20,
                    cbx_name21:cbx_name21,
                    cbx_name22:cbx_name22,
                    cbx_name23:cbx_name23,
                    cbx_name24:cbx_name24,
                    cbx_name25:cbx_name25,
                    cbx_name26:cbx_name26,
                    cbx_name27:cbx_name27,
                    cbx_name28:cbx_name28,
                    cbx_name29:cbx_name29,
                    cbx_name30:cbx_name30,
                    cbx_name31:cbx_name31,
                    cbx_name32:cbx_name32,
                    cbx_name33:cbx_name33,

                    cbx1:cbx1,
                    cbx2:cbx2,
                    cbx3:cbx3,
                    cbx4:cbx4,
                    cbx5:cbx5,
                    cbx6:cbx6,
                    cbx7:cbx7,
                    cbx8:cbx8,
                    cbx9:cbx9,
                    cbx10:cbx10,
                    cbx11:cbx11,
                    cbx12:cbx12,
                    cbx13:cbx13,
                    cbx14:cbx14,
                    cbx15:cbx15,
                    cbx16:cbx16,
                    cbx17:cbx17,
                    cbx18:cbx18,
                    cbx19:cbx19,
                    cbx20:cbx20,
                    cbx21:cbx21,
                    cbx22:cbx22,
                    cbx23:cbx23,
                    cbx24:cbx24,
                    cbx25:cbx25,
                    cbx26:cbx26,
                    cbx27:cbx27,
                    cbx28:cbx28,
                    cbx29:cbx29,
                    cbx30:cbx30,
                    cbx31:cbx31,
                    cbx32:cbx32,
                    cbx33:cbx33,

                    id_consent_cbx1:id_consent_cbx1,
                    id_consent_cbx2:id_consent_cbx2,
                    id_consent_cbx3:id_consent_cbx3,
                    id_consent_cbx4:id_consent_cbx4,
                    id_consent_cbx5:id_consent_cbx5,
                    id_consent_cbx6:id_consent_cbx6,
                    id_consent_cbx7:id_consent_cbx7,
                    id_consent_cbx8:id_consent_cbx8,
                    id_consent_cbx9:id_consent_cbx9,
                    id_consent_cbx10:id_consent_cbx10,
                    id_consent_cbx11:id_consent_cbx11,
                    id_consent_cbx12:id_consent_cbx12,
                    id_consent_cbx13:id_consent_cbx13,
                    id_consent_cbx14:id_consent_cbx14,
                    id_consent_cbx15:id_consent_cbx15,
                    id_consent_cbx16:id_consent_cbx16,
                    id_consent_cbx17:id_consent_cbx17,
                    id_consent_cbx18:id_consent_cbx18,
                    id_consent_cbx19:id_consent_cbx19,
                    id_consent_cbx20:id_consent_cbx20,
                    id_consent_cbx21:id_consent_cbx21,
                    id_consent_cbx22:id_consent_cbx22,
                    id_consent_cbx23:id_consent_cbx23,
                    id_consent_cbx24:id_consent_cbx24,
                    id_consent_cbx25:id_consent_cbx25,
                    id_consent_cbx26:id_consent_cbx26,
                    id_consent_cbx27:id_consent_cbx27,
                    id_consent_cbx28:id_consent_cbx28,
                    id_consent_cbx29:id_consent_cbx29,
                    id_consent_cbx30:id_consent_cbx30,
                    id_consent_cbx31:id_consent_cbx31,
                    id_consent_cbx32:id_consent_cbx32,
                    id_consent_cbx33:id_consent_cbx33,

                    rbt_name1:rbt_name1,
                    rbt1:rbt1,
                    id_consent_rbt1:id_consent_rbt1,

                    consent_name1:consent_name1,
                    consent_name2:consent_name2,
                    sign1:sign1,
                    sign2:sign2,
                    id_consent1:id_consent1,
                    id_consent2:id_consent2,
                    form_name:form_name,
                    form_sign:form_sign,
                    date:date,
                    completed_percent:completed_percent,
                    id_employee:id_employee,
                    id_form:id_form
                };

                var url = 'Employee/SaveOrientation';

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

                        jQuery("#frm8 input").prop("disabled", true);
                        jQuery('#btn_save_orientation').hide();

                        if('<?php print $session['rol'];?>'=='worker')
                        {
                            LoadDataTax(response);
                            jQuery('#tab9').show().tab('show');
                            jQuery('#s8').removeClass('active').addClass('fade');
                            jQuery('#s9').removeClass('fade').addClass('active');
                            goToByScroll('tab9');
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

        function LoadDataTax(id_employee)
        {
            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'data_tax',view_url:'employee/InputsUpdateTaxExemp', id_employee:id_employee}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_tax').html(response);
                }
            });
        }
    });

</script>