<!-- Google Map -->
<div id="map" class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14096.16267688686!2d-82.4903188!3d27.9620407!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88c2c399cf3fa8d5%3A0x5080f3b7ab8ce9b2!2s2700+N+Macdill+Ave%2C+Tampa%2C+FL+33607!5e0!3m2!1sen!2sus!4v1516761605292" width="100%" height="340" frameborder="0" style="border:10px solid #fff;" allowfullscreen></iframe>
</div><!---/map-->
<!-- End Google Map -->

<!--=== Content Part ===-->
<div class="container content">
    <div class="row">
        <div class="col-md-8 mb-margin-bottom-30">
            <div class="headline"><h2>Contact Form</h2></div>
            <div style="text-align: center;"><h3>We love to hear what you think, god or bad!</h3><br /></div>

            <iframe src="https://tawk.to/chat/5a5fc457d7591465c706da4a/default/?$_tawk_popout=true" width="100%" height="400px" frameborder="0" style="border:10px solid #fff;"></iframe>

        </div><!--/col-md-9-->

        <div class="col-md-4">
            <!-- Contacts -->
            <div class="headline"><h2>Contacts</h2></div>
            <ul class="list-unstyled who margin-bottom-30">
                <li><a href="#"><i class="fa fa-home"></i>2700 N. Macdill Ave ampa, FL, 33607 US, Suite: 211</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i><a href="mailto:esperanzahhs@gmail.com" class="">esperanzahhs@gmail.com</a></a></li>
                <li><a href="#"><i class="fa fa-phone"></i>813-374-0214 - 813-298-569&nbsp;&nbsp;813-374-029 (Fax)</a></li>
                <li><a href="#"><i class="fa fa-globe"></i>http://www.example.com</a></li>
            </ul>

            <!-- Business Hours -->
            <div class="headline"><h2>Business Hours</h2></div>
            <ul class="list-unstyled margin-bottom-30">
                <li><strong>Monday-Friday:</strong> 9am to 5pm</li>
                <li><strong>Saturday:</strong> Closed</li>
                <li><strong>Sunday:</strong> Closed</li>
            </ul>

        </div><!--/col-md-3-->
    </div><!--/row-->

</div><!--/container-->
<!--=== End Content Part ===-->

<script type="text/javascript">
    
	alertify.defaults.transition = "zoom";

	var msg = '<?php if(isset($msg))print $msg;?>';
	if (msg != '' && msg != null) alertify.message(msg);

	var success = '<?php if(isset($success))print $success;?>';
	if (success != '' && success != null) alertify.success(success);

	var warning = '<?php if(isset($warning))print $warning;?>';
	if (warning != '' && warning != null) alertify.alert(warning);

	var error = '<?php if(isset($error))print $error;?>';
	if (error != '' && error != null) alertify.error(error);
    
</script>