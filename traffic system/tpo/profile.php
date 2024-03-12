<?php
session_start();
if (isset($_SESSION['police_id']) && isset($_SESSION['officer_email']) && isset($_SESSION['officer_name']) && isset($_SESSION['police_station'])) {
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Profile | Motor Traffic Department</title>

    <!--Elements inside the head tag includes goes here-->
    <?php 
        include_once '../includes/header.php';
    ?>

</head>


<body class="overlay-scrollbar">

    <!--Top navigation bar includes goes here-->
    <?php 
        include 'includes/topNav.php';
    ?>


    <!--==================================================================================================================================SECTION_02====================================================================================================================================-->

    <!-- Left sidebar navigation start here =============================================-->
    <div class="leftsidebar overlay-scrollbar scrollbar-hover">
        <ul class="leftsidebar-nav overlay-scrollbar scrollbar-hover">
            <!--Left sidebar navigation items-->
            <li class="leftsidebar-nav-item">
                <a href="dashboard.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="add_new_fine.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <span>Add New Fine</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="driver_past_fine.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-history"></i>
                    </div>
                    <span>Driver's Past Fine</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="check_revenue_license.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <span>Revenue License</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="view_reported_fine.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-flag-checkered"></i>
                    </div>
                    <span>View Reported Fine</span>
                </a>
            </li>
            <!--Left sidebar navigation items-->
        </ul>
    </div>
    <!-- Left sidebar navigation end here ========================================-->


    <!--==================================================================================================================================SECTION_03====================================================================================================================================-->

    <!-- Dashboard main content start here =================================================-->
    <div class="dashwrapper animated fadeIn">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="container-fluid">
                <h1 class="mt-4">Edit Profile</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Profile</li>
                </ol>
                <!-- Edit profile password warning and success msg goes here -->
                <?php if (isset($_GET['error'])) { ?>
						<div class="alert alert-danger" id="success-alert">
						<i class="fas fa-exclamation-circle"></i>
						<?php echo $_GET['error']; ?>
						<button type="button" class="close" data-dismiss="alert">&times;</button>
					</div>
				<?php } ?>
                <?php if (isset($_GET['success'])) { ?>
						<div class="alert alert-success" id="success-alert">
						<i class="fas fa-check-circle"></i>
						<?php echo $_GET['success']; ?>
  						<button type="button" class="close" data-dismiss="alert">&times;</button>
					</div>
				<?php } ?>
                <div class="card mb-4">
                    <div class="card-body p-lg-5">

                    <form action="formAction" method="POST">
                    <h4>Your Email Address</h4>
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <input type="email" class="form-control" id="change_email" value="<?php echo $_SESSION["officer_email"]; ?>" placeholder="Type your new email here" disabled>
                         </div>
                    <!--<div class="form-group col-md-3">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save changes</button>
                    </div>-->
                </div>
            </form>

            <span class="row m-3"></span>

            <!--Edit profile includes goes here-->
            <form action="profile_action" method="POST">
            <h4 class="mt-5">Change your Password</h4>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="old_password">Old Password</label>
                    <input type="password" class="form-control" id="old_password" name="oldpassword" placeholder="Type your old password">
                </div>
                <div class="form-group col-md-4">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="newpassword" placeholder="Type your new password">
                </div>
                <div class="form-group col-md-4">
                    <label for="password_confirm">Confirm New Password</label>
                    <input type="password" class="form-control" id="password_confirm" name="passwordconfirm" placeholder="Confirm your new password">
                </div>
            </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save changes</button>
            </form>

                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Dashboard main content end here ========================================-->


    <!--Javascripts includes goes here-->
    <?php 
        include '../includes/footer.php';
    ?>

    <script>
    	//To close the success & error alert with slide up animation
	$("#success-alert").delay(4000).fadeTo(2000, 500).slideUp(1000, function(){
    	$("#success-alert").slideUp(1000);
	});
    </script>

</body>

</html>

<?php
}else{ 
	header("Location: index.php");
	exit();
}
?>
