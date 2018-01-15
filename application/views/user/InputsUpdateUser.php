<div class="col-sm-12">

    <div class="form-group">
        <label>User ID</label>
        <input type="text" name="UserName" id="UserName" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['UserName'])) print $data['user']['data'][0]['UserName'];?>" />
        <input type="hidden" name="id" id="id" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['_RecordID'])) print $data['user']['data'][0]['_RecordID'];?>" />
    </div>

    <div class="form-group">
        <label>First Name</label>
        <input type="text" name="PT_NameFirst" id="PT_NameFirst" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['PT_NameFirst'])) print $data['user']['data'][0]['PT_NameFirst'];?>" />
    </div>

    <div class="form-group">
        <label>Last Name</label>
        <input type="text" name="PT_NameLast" id="PT_NameLast" class="form-control required" value="<?php if(isset($data['user']['data'][0]['PT_NameLast'])) print $data['user']['data'][0]['PT_NameLast'];?>" />
    </div>

    <div class="form-group">
        <label>Title</label>
        <input type="text" name="PT_Title" id="PT_Title" class="form-control required" value="<?php if(isset($data['user']['data'][0]['PT_Title'])) print $data['user']['data'][0]['PT_Title'];?>" />
    </div>

    <div class="form-group">
        <label>Company</label>
        <input type="text" name="PHP_Company_Name" id="PHP_Company_Name" readonly datafld="ignore" class="form-control required" value="<?php if(isset($data['user']['data'][0]['CompanyName'])) print $data['user']['data'][0]['CompanyName'];?>" />
    </div>
    <div class="form-group">
        <label>Email address</label>
        <input type="email" name="UserEmail" id="UserEmail" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['UserEmail'])) print $data['user']['data'][0]['UserEmail'];?>" />
    </div>

    <div class="form-group">
        <label>Confirm Email address</label>
        <input type="email" name="UserEmail2" id="UserEmail2" class="form-control required equalTo" datafld="ignore"  value="" />
    </div>

    <div class="form-group">
        <label>Question</label>
        <select class="my_select2" id="_kf_SecurityQuestion_SN" name="_kf_SecurityQuestion_SN">
            <?php for ($i=0;$i<sizeof($data['vl']['data']);$i++){?>
                <option <?php if(isset($data['user']['data'][0]['_kf_SecurityQuestion_SN'])){if($data['user']['data'][0]['_kf_SecurityQuestion_SN']==$data['vl']['data'][$i]['_zhk_RecordSerialNumber']){?> selected <?php }}?>value="<?php print $data['vl']['data'][$i]['_zhk_RecordSerialNumber'];?>"><?php print $data['vl']['data'][$i]['Security_Questions'];?></option>
            <?php }?>
        </select>
    </div>

    <div class="form-group">
        <label>Answer</label>
        <input type="text" name="SecurityAnswer" id="SecurityAnswer" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['SecurityAnswer'])) print $data['user']['data'][0]['SecurityAnswer'];?>" />
    </div>

    <div class="form-group pull-right">
        <button type="button" onclick="LoadContent('User/GoListUser')" id="btn_cancel" class="btn btn-default">Cancel</button>
        <button type="button" datafld="PHP_Company_Users" datatype="UPDATE" id="btn_save" class="btn btn-success">Save</button>
    </div>

</div>

<script type="text/javascript">
    jQuery(document).ready(function()
    {
        jQuery(".my_select2").select2();

        jQuery("#frm").validate(
        {
            rules : {
                UserEmail: {
                    required: true
                },
                UserEmail2: {
                    required: true,
                    equalTo: "#UserEmail"
                }
            },

            messages : {
                UserEmail: {
                    required: 'Please enter your email'
                },
                UserEmail2: {
                    required : 'Please confirm your email',
                    equalTo : 'Please insert the same email'
                }
            },

            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
    });
</script>