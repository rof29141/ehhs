<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$page_title = "Confirmed";
$position='center';
require_once(APPPATH."views/includes/header.php");
?>

<body >
<div id="wrapper">


    <div class="container">

        <div class="modal-content" style="align-content: center;">

            <div class="col-lg-3"></div>

            <form method="POST" action="../DownloadiCal" id="frm" name="frm">
                <div class="col-lg-6" style="background-color: #fff;">
                    <fieldset class="myfieldset">
                        <legend class="mylegend">Confirmed Appointment</legend>

                        <div class="col-lg-12" id="confirm_app">

                            Thanks, Appointment confirmed.
                            <br>
                            <fieldset class="container auth">
                                <div class="text-center">
                                    <a class="btn btn-success" href="<?php echo CTR_URL; ?>Authentication">Back to Login</a>
                                </div>
                            </fieldset>
                        </div>

                    </fieldset>
                </div>
            </form>

            <div class="col-lg-3"></div>

        </div>

    </div>
</div>

<?php require_once(VIEW_URL."includes/footer.php");?>