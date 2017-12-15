<div class="container" style="background-color: #fff; border: 1px;">
    <div class="row" style="margin: 0px;">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <fieldset class="myfieldset">
                <legend class="mylegend">Update User</legend>

                <div class="col-sm-12">

                    <div class="form-group">
                        <label>User ID</label>
                        <input type="text" name="UserName" id="UserName" class="form-control required" readonly value="<?php if(isset($data['user']['data'][0]['UserName'])) print $data['user']['data'][0]['UserName'];?>" />
                        <input type="hidden" name="id" id="id" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['_RecordID'])) print $data['user']['data'][0]['_RecordID'];?>" />
                    </div>

                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="PT_NameFirst" id="PT_NameFirst" class="form-control required" readonly value="<?php if(isset($data['user']['data'][0]['PT_NameFirst'])) print $data['user']['data'][0]['PT_NameFirst'];?>" />
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="PT_NameLast" id="PT_NameLast" class="form-control required" readonly value="<?php if(isset($data['user']['data'][0]['PT_NameLast'])) print $data['user']['data'][0]['PT_NameLast'];?>" />
                    </div>

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="PT_Title" id="PT_Title" class="form-control required" readonly value="<?php if(isset($data['user']['data'][0]['PT_Title'])) print $data['user']['data'][0]['PT_Title'];?>" />
                    </div>

                    <div class="form-group">
                        <label>Company</label>
                        <input type="text" name="PHP_Company_Name" id="PHP_Company_Name" readonly datafld="ignore" class="form-control required" value="<?php if(isset($data['user']['data'][0]['CompanyName'])) print $data['user']['data'][0]['CompanyName'];?>" />
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="UserEmail" id="UserEmail" class="form-control required" readonly value="<?php if(isset($data['user']['data'][0]['UserEmail'])) print $data['user']['data'][0]['UserEmail'];?>" />
                    </div>

                    <div class="form-group">
                        <label>Question</label>
                        <select class="my_select2" id="_kf_SecurityQuestion_SN" name="_kf_SecurityQuestion_SN" disabled>
                            <?php for ($i=0;$i<sizeof($data['vl']['data']);$i++){?>
                                <option <?php if(isset($data['user']['data'][0]['_kf_SecurityQuestion_SN'])){if($data['user']['data'][0]['_kf_SecurityQuestion_SN']==$data['vl']['data'][$i]['_zhk_RecordSerialNumber']){?> selected <?php }}?>value="<?php print $data['vl']['data'][$i]['_zhk_RecordSerialNumber'];?>"><?php print $data['vl']['data'][$i]['Security_Questions'];?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Answer</label>
                        <input type="text" name="SecurityAnswer" id="SecurityAnswer" class="form-control required" readonly value="<?php if(isset($data['user']['data'][0]['SecurityAnswer'])) print $data['user']['data'][0]['SecurityAnswer'];?>" />
                    </div>

                </div>

            </fieldset>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(".my_select2").select2();
    });
</script>