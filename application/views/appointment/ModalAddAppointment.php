<div class="col-lg-12">

    <div class="form-group">
        <label>Service</label>
        <input type="text" name="txt_service" id="txt_service" datafld="<?php echo $data['service']['data'][0]['__kp_PRIMARY_KEY'];?>" class="form-control required" readonly value="<?php if(isset($data['service']['data'][0]['Service'])) echo $data['service']['data'][0]['Service'];?>" />
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
                <label>Doctor</label>
                <input type="text" name="txt_doctor" id="txt_doctor" datafld="<?php echo $data['doctor']['data'][0]['_zpk_Staff_Rec'];?>" class="form-control required" readonly value="<?php if(isset($data['doctor']['data'][0]['_zpk_Staff_Rec'])) echo $data['doctor']['data'][0]['FirstName'].' '.$data['doctor']['data'][0]['LastName'];?>" />
            </div>
        </div>

        <div class="col-lg-4">
            <img class="doc_img" src="<?php echo $data['doctor']['data'][0]['Photo'];?>"/>
        </div>
    </div>

    <div class="form-group">
        <label>Date</label>
        <input type="text" name="txt_date" id="txt_date" class="form-control required" readonly value="<?php if(isset($data['start'])) echo date('m/d/y', strtotime($data['start']));?>" />
    </div>

    <div class="form-group">
        <label>Time</label>
        <input type="text" name="txt_start" id="txt_start" class="form-control required" readonly value="<?php if(isset($data['start'])) echo substr($data['start'],16,8);?>" />
        <input type="hidden" name="txt_end" id="txt_end" class="form-control required" readonly value="<?php if(isset($data['end'])) echo substr($data['end'],16,8);?>" />
    </div>

    <div class="form-group">
        <label>Title</label>
        <input type="text" name="txt_date" id="txt_title" class="form-control required" placeholder="Please, write a title of the appointment."/>
    </div>

    <div class="form-group pull-right">
        <button type="button" id="btn_submit_app" class="btn btn-success">Submit Appointment</button>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function()
    {

    });
</script>