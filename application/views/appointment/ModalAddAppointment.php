<div class="col-sm-12">

    <div class="form-group">
        <label>Service</label>
        <input type="text" name="txt_service" id="txt_service" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['UserName'])) echo $data['user']['data'][0]['UserName'];?>" />
        <input type="hidden" name="id" id="id" class="form-control required"  value="<?php if(isset($data['user']['data'][0]['_RecordID'])) echo $data['user']['data'][0]['_RecordID'];?>" />
    </div>

    <div class="form-group">
        <label>Doctor</label>
        <input type="text" name="_zpk_Staff_Rec" id="_zpk_Staff_Rec" class="form-control required"  value="<?php if(isset($data['doctors']['data'][0]['_zpk_Staff_Rec'])) echo $data['doctors']['data'][0]['FirstName'].' '.$data['doctors']['data'][0]['LastName'];?>" />
    </div>

    <div class="form-group">
        <label>Date</label>
        <input type="text" name="PT_NameLast" id="PT_NameLast" class="form-control required" value="<?php if(isset($data['user']['data'][0]['PT_NameLast'])) echo $data['user']['data'][0]['PT_NameLast'];?>" />
    </div>

    <div class="form-group pull-right">
        <button type="button" datafld="PHP_Company_Users" id="btn_save" class="btn btn-success">Submit Appointment</button>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function()
    {
        $(".my_select2").select2();

        $("#frm").validate(
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