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
                        <li><a onclick="LoadContent('Main/GoView/dashboard-AboutUs', 0, 'main-view')">About Us</a></li>
                        <li><a onclick="LoadContent('Main/GoView/dashboard-Mission', 0, 'main-view')">Mission and Goals</a></li>
                        <li><a onclick="LoadContent('Main/GoView/dashboard-Team', 0, 'main-view')">Our Team</a></li>
                        <!--<li><a onclick="LoadContent('Main/GoView/dashboard-Insurance', 0, 'main-view')">Insurance Partners</a></li>-->
                    </ul>

                </li>

                <?php
                if(isset($profile_type['profile_type']) && ($profile_type['profile_type']=='admin' || $profile_type['profile_type']=='asist'))
                {
                    ?>
                    <li class="">
                        <a onclick="LoadContent('Main/GoView/employee-ListEmployee')" class="dropdown-toggle" data-toggle="dropdown">
                            Employees
                        </a>
                    </li>
                <?php }?>

                <?php
                if(isset($profile_type['profile_type']) && ($profile_type['profile_type']=='admin' || $profile_type['profile_type']=='asist'))
                {
                    ?>
                    <li class="">
                        <a onclick="LoadContent('Main/GoView/client-ListClient')" class="dropdown-toggle" data-toggle="dropdown">
                            Clients
                        </a>
                    </li>
                <?php }?>

                <?php
                if(isset($profile_type['profile_type']) && ($profile_type['profile_type']=='admin' || $profile_type['profile_type']=='asist'))
                {
                    ?>
                    <li class="">
                        <a onclick="LoadContent('Care/GoAddCare')" class="dropdown-toggle" data-toggle="dropdown">
                            Care Schedule
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
                    <a onclick="LoadContent('Main/GoView/dashboard-ContactUs', 0, 'main-view')" class="dropdown-toggle" data-toggle="dropdown">
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