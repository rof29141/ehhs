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
                        <legend class="mylegend">Appointment Confirmed</legend>

                        <div class="col-lg-12 text-center" id="confirm_app">

                            Thank you for your confirmation.
                            <br>
                            An email has been sent to <?php print $email;?>
                            <br>
                            <fieldset class="container auth">
                                <div class="text-center">
                                    <a class="btn btn-success" href="<?php print CTR_URL; ?>Authentication">Back to Login</a>
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