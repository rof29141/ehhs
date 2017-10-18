<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$page_title = "";
$position='center';
require_once(APPPATH."views/includes/header.php");
?>

<body >
<div id="wrapper">
    <div class="container text-center" style="margin-top: 90px;">
        <?php require_once(VIEW_URL."includes/banner.php");?>
    </div>

    <div class="container">

        <div style="align-content: center;">

            <div class="col-lg-3"></div>

            <form method="POST" action="../DownloadiCal" id="frm" name="frm">
                <div class="col-lg-6" style="background-color: #fff;">
                    <fieldset class="myfieldset">
                        <legend class="mylegend">Confirm Appointment</legend>

                        <div class="col-lg-12 text-center" id="confirm_app">

                            Thanks, Appointment confirmed.
                            <br>
                            Please, check your inbox. Has been sent an email.
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