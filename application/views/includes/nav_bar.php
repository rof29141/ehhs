<!-- Navbar -->
<div class="navbar navbar-default" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="fa fa-bars"></span>
			</button>
			
		</div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">
                <!-- Home -->
                <li class="active">
                    <a onclick="LoadContent('Dashboard/GoDashboard', 0, 'main-view');" class="dropdown-toggle" data-toggle="dropdown">
                        Home
                    </a>
                </li>
                <!-- End Home -->

                <!-- Pages -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                        Our Business
                    </a>
                    <ul class="dropdown-menu">
                        <li><a onclick="LoadContent('Dashboard/GoDashboard')">About Us</a></li>
                        <li><a onclick="LoadContent('Dashboard/GoDashboard')">About Basic</a></li>
                        <li><a onclick="LoadContent('Dashboard/GoDashboard')">About Me</a></li>
                        <li><a onclick="LoadContent('Dashboard/GoDashboard')">About Our Team</a></li>
                    </ul>

                </li>

                <?php
                if(isset($profile_type['profile_type']) && ($profile_type['profile_type']=='admin' || $profile_type['profile_type']=='asist'))
                {
                    ?>
                    <li class="">
                        <a onclick="LoadContent('User/GoListUser')" class="dropdown-toggle" data-toggle="dropdown">
                            Accounts
                            <span class="badge badge-blue"><?php print $profile_type['available_jobs'];?></span>
                        </a>
                    </li>
                <?php }?>

                <?php
                if(isset($profile_type['profile_type']) && ($profile_type['profile_type']=='admin' || $profile_type['profile_type']=='asist'))
                {
                    ?>
                    <li class="">
                        <a onclick="LoadContent('Form1')" class="dropdown-toggle" data-toggle="dropdown">
                            Form 1
                        </a>
                    </li>
                <?php }?>

                <?php
                if(isset($profile_type['profile_type']) && ($profile_type['profile_type']=='admin' || $profile_type['profile_type']=='worker'))
                {
                ?>
                <li class="">
                    <a onclick="LoadContent('Job/GoAvailableJobs')" class="dropdown-toggle" data-toggle="dropdown">
                        Available Jobs
                        <span class="badge badge-blue"><?php print $profile_type['available_jobs'];?></span>
                    </a>
                </li>
                <?php }?>

                <li class="">
                    <a class="dropdown-toggle chat" data-toggle="dropdown">
                        Contact Us
                    </a>
                </li>
                <!-- End Pages -->
            </ul>
        </div><!--/navbar-collapse-->
    </div>
</div>
<!-- End Navbar -->

<script type="text/javascript">
jQuery('.chat').on('click', function ()
{
Tawk_API.maximize();
});
</script>