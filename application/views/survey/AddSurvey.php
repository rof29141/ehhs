<style>
    .myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    .myImg:hover {opacity: 0.7;}

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 200px; /* Location of the box */
        left: 0;
        top: 90px;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content, #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)}
        to {-webkit-transform:scale(1)}
    }

    @keyframes zoom {
        from {transform:scale(0)}
        to {transform:scale(1)}
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 75px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    .myImg{
        max-width: 160px;
        padding-top: 20px;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
    }
</style>

<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
</div>

<div class="container" >
    <div class="row" style="margin-top: 70px;">
        <div class="col-lg-12">
            <form name="frm" id="frm" >
                <fieldset class="myfieldset">
                    <legend class="mylegend">Cosmetic Interest Questionnare</legend>

                    <div id="questionnare">

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 text-mutted" style="margin: 15px;" align="justify">
                                Please rate each area of interest.  Dr. Mendelsohn and Dr. Maier will review your areas of interest and contact you to provide additional information to you.  If interested, we can arrange a complimentary consultation.   (The form may take a moment to load so please be patient.)
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                    <label>First Name:</label>
                                    <input type="text" name="bd_FirstName" id="bd_FirstName" class="form-control" datafld="ignore" readonly value="<?php if(isset($data['user']['data'][0]['bd_FirstName'])) echo $data['user']['data'][0]['bd_FirstName'];?>" />
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                    <label>Last Name:</label>
                                    <input type="text" name="bd_LastName" id="bd_LastName" class="form-control" datafld="ignore" readonly value="<?php if(isset($data['user']['data'][0]['bd_LastName'])) echo $data['user']['data'][0]['bd_LastName'];?>" />
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                    <label>Date of Birth:</label>
                                    <input type="text" name="bd_DateOfBirth" id="bd_DateOfBirth" class="form-control" datafld="ignore" readonly value="<?php if(isset($data['user']['data'][0]['bd_DateOfBirth'])) echo $data['user']['data'][0]['bd_DateOfBirth'];?>" />
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                    <label>Email address:</label>
                                    <input type="email" name="bd_user_email" id="bd_user_email" class="form-control" datafld="ignore" readonly value="<?php if(isset($data['user']['data'][0]['bd_user_email'])) echo $data['user']['data'][0]['bd_user_email'];?>" />
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                    <label>Phone:</label>
                                    <input type="text" name="bd_Phone" id="bd_Phone" class="form-control" datafld="ignore" readonly value="<?php if(isset($data['user']['data'][0]['bd_Phone'])) echo $data['user']['data'][0]['bd_Phone'];?>" />
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                    <label>Zip:</label>
                                    <input type="text" name="bd_ZipCode" id="bd_ZipCode" class="form-control" datafld="ignore" readonly value="<?php if(isset($data['user']['data'][0]['bd_ZipCode'])) echo $data['user']['data'][0]['bd_ZipCode'];?>" />
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                <fieldset id="fieldset_contact" class="myfieldset" style="margin-top: 0px;">
                                    <legend id="legend_contact" class="mylegend">I am interested in having an Educator contact me by</legend>

                                    <label><input type="checkbox" name="cbx_contact_1" id="cbx_contact_1" class="cbx_contact" datafld="ignore"/> Phone call</label><br>
                                    <label><input type="checkbox" name="cbx_contact_2" id="cbx_contact_2" class="cbx_contact" datafld="ignore"/> Phone SMS</label><br>
                                    <label><input type="checkbox" name="cbx_contact_3" id="cbx_contact_3" class="cbx_contact" datafld="ignore"/> Email</label><br>
                                    <label><input type="checkbox" name="cbx_contact_4" id="cbx_contact_4" class="cbx_contact" datafld="ignore"/> Don't contact me</label><br>

                                </fieldset>
                            </div>


                        </div>

                        <div class="row">

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Eyelashes/Latisse</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_eye" id="rbt_eye" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_eye" id="rbt_eye" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_eye" id="rbt_eye" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_eye" id="rbt_eye" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_eye" id="rbt_eye" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="1" src="<?php echo base_url('assets/images/survey/Latisse.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Tired Eyes/Drooping Eyelids</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_tired_eye" id="rbt_tired_eye" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_tired_eye" id="rbt_tired_eye" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_tired_eye" id="rbt_tired_eye" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_tired_eye" id="rbt_tired_eye" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_tired_eye" id="rbt_tired_eye" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="2" src="<?php echo base_url('assets/images/survey/03_tired_eyes@2x.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Eyelashes/Latisse</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_eye_lids" id="rbt_eye_lids" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_eye_lids" id="rbt_eye_lids" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_eye_lids" id="rbt_eye_lids" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_eye_lids" id="rbt_eye_lids" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_eye_lids" id="rbt_eye_lids" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="3" src="<?php echo base_url('assets/images/survey/eye_lids.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>


                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Skin Wrinkles</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_wrinkles" id="rbt_wrinkles" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_wrinkles" id="rbt_wrinkles" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_wrinkles" id="rbt_wrinkles" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_wrinkles" id="rbt_wrinkles" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_wrinkles" id="rbt_wrinkles" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="4" src="<?php echo base_url('assets/images/survey/3_1208px.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Forehead Wrinkles</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_forehead" id="rbt_forehead" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_forehead" id="rbt_forehead" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_forehead" id="rbt_forehead" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_forehead" id="rbt_forehead" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_forehead" id="rbt_forehead" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="2" src="<?php echo base_url('assets/images/survey/forehead_ciq.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Crow's Feet</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_crows_feet" id="rbt_crows_feet" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_crows_feet" id="rbt_crows_feet" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_crows_feet" id="rbt_crows_feet" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_crows_feet" id="rbt_crows_feet" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_crows_feet" id="rbt_crows_feet" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="6" src="<?php echo base_url('assets/images/survey/crows_feet.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>


                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Botox Cosmetic</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_botox_cosmetic" id="rbt_botox_cosmetic" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_botox_cosmetic" id="rbt_botox_cosmetic" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_botox_cosmetic" id="rbt_botox_cosmetic" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_botox_cosmetic" id="rbt_botox_cosmetic" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_botox_cosmetic" id="rbt_botox_cosmetic" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="7" src="<?php echo base_url('assets/images/survey/1208x-1110-eyes.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Frown Lines</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_frown_lines" id="rbt_frown_lines" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_frown_lines" id="rbt_frown_lines" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_frown_lines" id="rbt_frown_lines" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_frown_lines" id="rbt_frown_lines" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_frown_lines" id="rbt_frown_lines" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="8" src="<?php echo base_url('assets/images/survey/male_fron_lines.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Lip Lines</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_lip_lines" id="rbt_lip_lines" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_lip_lines" id="rbt_lip_lines" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_lip_lines" id="rbt_lip_lines" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_lip_lines" id="rbt_lip_lines" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_lip_lines" id="rbt_lip_lines" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="9" src="<?php echo base_url('assets/images/survey/1208-x-1110-lip-lines.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>


                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Lips</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_lips" id="rbt_lips" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_lips" id="rbt_lips" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_lips" id="rbt_lips" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_lips" id="rbt_lips" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_lips" id="rbt_lips" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="10" src="<?php echo base_url('assets/images/survey/34.92_Lips_1110.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Facial Folds/Fillers</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_facial_folds_fillers" id="rbt_facial_folds_fillers" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_facial_folds_fillers" id="rbt_facial_folds_fillers" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_facial_folds_fillers" id="rbt_facial_folds_fillers" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_facial_folds_fillers" id="rbt_facial_folds_fillers" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_facial_folds_fillers" id="rbt_facial_folds_fillers" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="11" src="<?php echo base_url('assets/images/survey/facial_folds.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Brown Spots</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_brown_spots" id="rbt_brown_spots" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_brown_spots" id="rbt_brown_spots" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_brown_spots" id="rbt_brown_spots" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_brown_spots" id="rbt_brown_spots" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_brown_spots" id="rbt_brown_spots" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="9" src="<?php echo base_url('assets/images/survey/17_1208px.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>


                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Scars</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_scars" id="rbt_scars" value="5" class="error_fieldset required"  class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_scars" id="rbt_scars" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_scars" id="rbt_scars" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_scars" id="rbt_scars" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_scars" id="rbt_scars" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="13" src="<?php echo base_url('assets/images/survey/13_1208px.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Chest/Sun Damage</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_chest_sun_damage" id="rbt_chest_sun_damage" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_chest_sun_damage" id="rbt_chest_sun_damage" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_chest_sun_damage" id="rbt_chest_sun_damage" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_chest_sun_damage" id="rbt_chest_sun_damage" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_chest_sun_damage" id="rbt_chest_sun_damage" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="14" src="<?php echo base_url('assets/images/survey/18_1208px.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Facial Redness</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_fatial_redness" id="rbt_fatial_redness" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_fatial_redness" id="rbt_fatial_redness" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_fatial_redness" id="rbt_fatial_redness" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_fatial_redness" id="rbt_fatial_redness" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_fatial_redness" id="rbt_fatial_redness" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="15" src="<?php echo base_url('assets/images/survey/facial_redness.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>


                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Nose Shape/Size</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_nose_shape_size" id="rbt_nose_shape_size" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_nose_shape_size" id="rbt_nose_shape_size" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_nose_shape_size" id="rbt_nose_shape_size" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_nose_shape_size" id="rbt_nose_shape_size" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_nose_shape_size" id="rbt_nose_shape_size" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="16" src="<?php echo base_url('assets/images/survey/nose.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Frown Lines</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_jawline" id="rbt_jawline" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_jawline" id="rbt_jawline" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_jawline" id="rbt_jawline" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_jawline" id="rbt_jawline" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_jawline" id="rbt_jawline" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="17" src="<?php echo base_url('assets/images/survey/06_jowls_jawline@2x.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Jowls</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_jowls" id="rbt_jowls" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_jowls" id="rbt_jowls" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_jowls" id="rbt_jowls" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_jowls" id="rbt_jowls" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_jowls" id="rbt_jowls" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="18" src="<?php echo base_url('assets/images/survey/facial_sagging.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>


                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Neck</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_neck" id="rbt_neck" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_neck" id="rbt_neck" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_neck" id="rbt_neck" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_neck" id="rbt_neck" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_neck" id="rbt_neck" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="19" src="<?php echo base_url('assets/images/survey/large-default19.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Chin</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_chin" id="rbt_chin" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_chin" id="rbt_chin" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_chin" id="rbt_chin" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_chin" id="rbt_chin" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_chin" id="rbt_chin" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="20" src="<?php echo base_url('assets/images/survey/large-default20.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Turkey Gobbler</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_turkey_gobbler" id="rbt_turkey_gobbler" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_turkey_gobbler" id="rbt_turkey_gobbler" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_turkey_gobbler" id="rbt_turkey_gobbler" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_turkey_gobbler" id="rbt_turkey_gobbler" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_turkey_gobbler" id="rbt_turkey_gobbler" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="21" src="<?php echo base_url('assets/images/survey/05_turkey_gobbler@2x.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>


                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Facelift</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_facelift" id="rbt_facelift" value="5" class="error_fieldset required"  class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_facelift" id="rbt_facelift" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_facelift" id="rbt_facelift" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_facelift" id="rbt_facelift" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_facelift" id="rbt_facelift" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="22" src="<?php echo base_url('assets/images/survey/10_facelift@2x.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Skin Lesions</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_skin_lesions" id="rbt_skin_lesions" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_skin_lesions" id="rbt_skin_lesions" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_skin_lesions" id="rbt_skin_lesions" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_skin_lesions" id="rbt_skin_lesions" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_skin_lesions" id="rbt_skin_lesions" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="23" src="<?php echo base_url('assets/images/survey/large-default23.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Acne Scars</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_acnescars" id="rbt_acnescars" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_acnescars" id="rbt_acnescars" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_acnescars" id="rbt_acnescars" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_acnescars" id="rbt_acnescars" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_acnescars" id="rbt_acnescars" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="24" src="<?php echo base_url('assets/images/survey/14_1208px.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>


                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Hair Removal</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_hair_removal" id="rbt_hair_removal" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_hair_removal" id="rbt_hair_removal" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_hair_removal" id="rbt_hair_removal" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_hair_removal" id="rbt_hair_removal" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_hair_removal" id="rbt_hair_removal" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="25" src="<?php echo base_url('assets/images/survey/8_1208px.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Hair Loss/Replacement</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_hair_loss_eplacement" id="rbt_hair_loss_eplacement" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_hair_loss_eplacement" id="rbt_hair_loss_eplacement" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_hair_loss_eplacement" id="rbt_hair_loss_eplacement" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_hair_loss_eplacement" id="rbt_hair_loss_eplacement" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_hair_loss_eplacement" id="rbt_hair_loss_eplacement" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="26" src="<?php echo base_url('assets/images/survey/large-default26.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Belly</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_belly" id="rbt_belly" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_belly" id="rbt_belly" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_belly" id="rbt_belly" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_belly" id="rbt_belly" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_belly" id="rbt_belly" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="27" src="<?php echo base_url('assets/images/survey/11_1208px.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>


                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Coolsculpting</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_coolsculpting" id="rbt_coolsculpting" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_coolsculpting" id="rbt_coolsculpting" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_coolsculpting" id="rbt_coolsculpting" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_coolsculpting" id="rbt_coolsculpting" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_coolsculpting" id="rbt_coolsculpting" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="28" src="<?php echo base_url('assets/images/survey/large-default28.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Weight Loss</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_weight_loss" id="rbt_weight_loss" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_weight_loss" id="rbt_weight_loss" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_weight_loss" id="rbt_weight_loss" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_weight_loss" id="rbt_weight_loss" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_weight_loss" id="rbt_weight_loss" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="29" src="<?php echo base_url('assets/images/survey/large-default29.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Liposuction</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_liposuction" id="rbt_liposuction" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_liposuction" id="rbt_liposuction" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_liposuction" id="rbt_liposuction" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_liposuction" id="rbt_liposuction" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_liposuction" id="rbt_liposuction" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="30" src="<?php echo base_url('assets/images/survey/1110-x-1208-4.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>


                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Mommy Makeover</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_mommy_makeover" id="rbt_mommy_makeover" value="5" class="error_fieldset required"  class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_mommy_makeover" id="rbt_mommy_makeover" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_mommy_makeover" id="rbt_mommy_makeover" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_mommy_makeover" id="rbt_mommy_makeover" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_mommy_makeover" id="rbt_mommy_makeover" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="31" src="<?php echo base_url('assets/images/survey/1110-x1208-34.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Tummy Tuck</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_tummy_tuck" id="rbt_tummy_tuck" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_tummy_tuck" id="rbt_tummy_tuck" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_tummy_tuck" id="rbt_tummy_tuck" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_tummy_tuck" id="rbt_tummy_tuck" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_tummy_tuck" id="rbt_tummy_tuck" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="32" src="<?php echo base_url('assets/images/survey/large-default32.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Drooping Breasts</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_drooping_breasts" id="rbt_drooping_breasts" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_drooping_breasts" id="rbt_drooping_breasts" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_drooping_breasts" id="rbt_drooping_breasts" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_drooping_breasts" id="rbt_drooping_breasts" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_drooping_breasts" id="rbt_drooping_breasts" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="33" src="<?php echo base_url('assets/images/survey/large-default33.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>


                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Breast Augmentation</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_breast_augmentation" id="rbt_breast_augmentation" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_breast_augmentation" id="rbt_breast_augmentation" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_breast_augmentation" id="rbt_breast_augmentation" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_breast_augmentation" id="rbt_breast_augmentation" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_breast_augmentation" id="rbt_breast_augmentation" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="34" src="<?php echo base_url('assets/images/survey/large-default34.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Leg Veins</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_leg_veins" id="rbt_leg_veins" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_leg_veins" id="rbt_leg_veins" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_leg_veins" id="rbt_leg_veins" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_leg_veins" id="rbt_leg_veins" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_leg_veins" id="rbt_leg_veins" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="35" src="<?php echo base_url('assets/images/survey/16_1208px.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Tattoo Removal</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_tattoo_removal" id="rbt_tattoo_removal" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_tattoo_removal" id="rbt_tattoo_removal" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_tattoo_removal" id="rbt_tattoo_removal" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_tattoo_removal" id="rbt_tattoo_removal" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_tattoo_removal" id="rbt_tattoo_removal" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="36" src="<?php echo base_url('assets/images/survey/large-default36.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>


                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Hands</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_hands" id="rbt_hands" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_hands" id="rbt_hands" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_hands" id="rbt_hands" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_hands" id="rbt_hands" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_hands" id="rbt_hands" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="37" src="<?php echo base_url('assets/images/survey/19_1208px.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Cellulite</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_cellulite" id="rbt_cellulite" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_cellulite" id="rbt_cellulite" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_cellulite" id="rbt_cellulite" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_cellulite" id="rbt_cellulite" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_cellulite" id="rbt_cellulite" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="37" src="<?php echo base_url('assets/images/survey/20_1208px.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Buttocks</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_buttocks" id="rbt_buttocks" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_buttocks" id="rbt_buttocks" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_buttocks" id="rbt_buttocks" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_buttocks" id="rbt_buttocks" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_buttocks" id="rbt_buttocks" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="38" src="<?php echo base_url('assets/images/survey/Buttocks.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>


                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Excessive Sweating/Hyperhidrosis</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_hyperhidrosis" id="rbt_hyperhidrosis" value="5" class="error_fieldset required"  class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_hyperhidrosis" id="rbt_hyperhidrosis" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_hyperhidrosis" id="rbt_hyperhidrosis" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_hyperhidrosis" id="rbt_hyperhidrosis" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_hyperhidrosis" id="rbt_hyperhidrosis" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="39" src="<?php echo base_url('assets/images/survey/Hyperhidrosis.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Teeth Whitening/Cosmetic Dentistry</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_teeth_whitening" id="rbt_teeth_whitening" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_teeth_whitening" id="rbt_teeth_whitening" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_teeth_whitening" id="rbt_teeth_whitening" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_teeth_whitening" id="rbt_teeth_whitening" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_teeth_whitening" id="rbt_teeth_whitening" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="40" src="<?php echo base_url('assets/images/survey/Teeth-ba.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Image Consulting</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_image_consulting" id="rbt_image_consulting" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_image_consulting" id="rbt_image_consulting" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_image_consulting" id="rbt_image_consulting" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_image_consulting" id="rbt_image_consulting" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_image_consulting" id="rbt_image_consulting" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="41" src="<?php echo base_url('assets/images/survey/image-consulting.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>


                            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                                <fieldset class="myfieldset" style="margin-top: 0px;">
                                    <legend class="mylegend">Personal Makeover</legend>

                                    <div class="row">
                                        <div class="text-center col-sm-3 col-md-4 col-lg-4">
                                            <div class="text-center text-success">High interest</div>
                                            <label><input type="radio" name="rbt_personal_makeover" id="rbt_personal_makeover" value="5" class="error_fieldset required" /> 5</label><br>
                                            <label><input type="radio" name="rbt_personal_makeover" id="rbt_personal_makeover" value="4" /> 4</label><br>
                                            <label><input type="radio" name="rbt_personal_makeover" id="rbt_personal_makeover" value="3" /> 3</label><br>
                                            <label><input type="radio" name="rbt_personal_makeover" id="rbt_personal_makeover" value="2" /> 2</label><br>
                                            <label><input type="radio" name="rbt_personal_makeover" id="rbt_personal_makeover" value="1" /> 1</label><br>
                                            <div class="text-center text-danger">No interest</div>
                                        </div>
                                        <div class="col-sm-9 col-md-8 col-lg-8 text-center">
                                            <img style="height: 120px;" class="myImg" id="42" src="<?php echo base_url('assets/images/survey/large-default43.png');?>">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                        </div>


                        <div class="form-group pull-right">
                            <button type="button" datatype="INSERT" id="btn_save_survey" class="btn btn-success">Save</button>
                        </div>

                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function()
    {
        $('.myImg').on('click', function () {
            var img = $(this);
            var modal = document.getElementById('myModal');

            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");

                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;

            var span = document.getElementsByClassName("close")[0];

            span.onclick = function() {
                modal.style.display = "none";
            }
        });

        $('#btn_save_survey').on('click', function ()
        {
            ValidateFrm();
            if ($("#frm").valid())
            {
                if ($('#cbx_contact_1').is(':checked'))
                    var one='1,';
                else
                    var one='';

                if ($('#cbx_contact_2').is(':checked'))
                    var two='2,';
                else
                    var two='';

                if ($('#cbx_contact_3').is(':checked'))
                    var three='3,';
                else
                    var three='';

                if ($('#cbx_contact_4').is(':checked'))
                    var four='4';
                else
                    var four='';

                if (one!='' || two!='' || three!='' || four!='')
                {
                    var cbx_contact_method = one + two + three + four;

                    var array_inputs = $('#frm').find('input[datafld!=ignore], select[datafld!=ignore]').serialize();
                    var url = 'Survey/SaveSurvay';
                    var data = array_inputs + '&contact_method=' + cbx_contact_method;

                    //$( '.content-wrapper' ).empty();
                    var target = document.getElementById('container');
                    var spinner = new Spinner(opts).spin(target);

                    $.ajax({
                        type: "POST",
                        dataType: "html",
                        url: url,
                        data: data
                    }).done(function (response, textStatus, jqXHR) {
                        if (response != '1') {
                            if (response == '0') {
                                alertify.success('Data Saved.');
                            }
                            else {
                                alertify.error('Error: The element could not be Saved. ' + response);
                            }
                            spinner.stop();
                            $('#questionnare').html('<div>Thank you for your feedback.</div>');
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
                    $('<em class="invalid" style="top:-50px;position:relative" id="em_contact">The field is required.</em>').insertAfter('#fieldset_contact');
                    $('html, body').animate({
                        scrollTop: $('#fieldset_contact').offset().top-200
                    }, 1000);
                }

            }
        });

        $('.cbx_contact').on('click', function () {
            $('#fieldset_contact').css('border','1px solid #d7d7d7');
            $('#legend_contact').css('color','#000');
            $('#em_contact').remove();

        });

        function ValidateFrm()
        {
            $.validator.setDefaults(
            {
                //errorElement: "span",
                //errorClass: "help-block",
                //	validClass: 'stay',
                highlight: function (element, errorClass, validClass) {//alert('high');
                    $(element).addClass(errorClass); //.removeClass(errorClass);
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');

                    $(element).closest('.myfieldset').css('border', '1px solid #A90329');
                    $(element).closest('.myfieldset').children('legend').css('color', '#D56161');

                },
                unhighlight: function (element, errorClass, validClass) {//alert('unhigh');

                    $(element).closest('.myfieldset').css('border', '1px solid #d7d7d7');
                    $(element).closest('.myfieldset').children('legend').css('color', '#000');


                    $(element).removeClass(errorClass); //.addClass(validClass);
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                },
                errorPlacement: function (error, element)
                {
                    if(element.parent('.input-group').length)
                    {
                        error.insertAfter(element.parent());
                    }
                    else if(element.hasClass('my_select2'))
                    {
                        error.insertAfter(element.next('span'));
                    }

                    else if(element.hasClass('error_fieldset'))
                    {
                        error.insertAfter(element.closest('.myfieldset'));
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
                invalidHandler: function(form, validator) {

                    if (!validator.numberOfInvalids())
                        return;

                    $('html, body').animate({
                        scrollTop: $(validator.errorList[0].element).offset().top-100
                    }, 2000);
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