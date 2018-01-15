<div class="col-sm-12">

    <div class="form-group">
        <label>User ID</label>
        <input type="text" name="bd_user_name" id="bd_user_name" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['bd_user_name'])) print $data['user']['data'][0]['bd_user_name'];?>" />
        <input type="hidden" name="id" id="id" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['RecordID'])) print $data['user']['data'][0]['RecordID'];?>" />
    </div>

    <div class="form-group">
        <label>First Name</label>
        <input type="text" name="bd_FirstName" id="bd_FirstName" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['bd_FirstName'])) print $data['user']['data'][0]['bd_FirstName'];?>" />
    </div>

    <div class="form-group">
        <label>Last Name</label>
        <input type="text" name="bd_LastName" id="bd_LastName" class="form-control required" value="<?php if(isset($data['user']['data'][0]['bd_LastName'])) print $data['user']['data'][0]['bd_LastName'];?>" />
    </div>

    <div class="form-group">
        <label>Email address</label>
        <input type="email" name="bd_user_email" id="bd_user_email" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['bd_user_email'])) print $data['user']['data'][0]['bd_user_email'];?>" />
    </div>

    <div class="form-group">
        <label>Date of Birth</label>
        <input type="text" name="bd_DateOfBirth" id="bd_DateOfBirth" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['bd_DateOfBirth'])) print $data['user']['data'][0]['bd_DateOfBirth'];?>" />
    </div>

    <div class="form-group">
        <label>Phone</label>
        <input type="text" name="bd_Phone" id="bd_Phone" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['bd_Phone'])) print $data['user']['data'][0]['bd_Phone'];?>" />
    </div>

    <div class="form-group">
        <label>Zip Code</label>
        <input type="text" name="bd_ZipCode" id="bd_ZipCode" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['bd_ZipCode'])) print $data['user']['data'][0]['bd_ZipCode'];?>" />
    </div>

    <div class="form-group pull-right">
        <button type="button" datafld="PHP_Patients" datatype="UPDATE" id="btn_save" class="btn btn-success">Save</button>
    </div>

</div>

<script type="text/javascript">
    jQuery(document).ready(function()
    {
        jQuery(".my_select2").select2();

        jQuery("#frm").validate(
        {
            rules : {
                bd_user_email: {
                    required: true
                }
            },

            messages : {
                bd_user_email: {
                    required: 'Please enter your email'
                }
            },

            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });

        jQuery('#my_legend_rewards').html('<?php print $data['user']['data'][0]['bd_FirstName'].' '.$data['user']['data'][0]['bd_LastName'];?>');
    });
</script>