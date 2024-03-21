<?php
    include('../connection.php');
    session_start();


    if(isset($_POST['login'])){
        $email = $_POST['registration_email']; 
        $password = $_POST['registration_password'];

        $fetch_query = "SELECT * FROM `registration` WHERE registration_email='$email'";
        $result_query = mysqli_query($con, $fetch_query);
        $row_count = mysqli_num_rows($result_query);

        if($row_count > 0){
            $data = mysqli_fetch_assoc($result_query);
            $_SESSION['registration_username'] = $data['registration_username'];
            if(password_verify($password, $data['registration_password'])){
                if ($data['registration_role'] == 'admin') {
                    // Redirect admin to admin page
                    // header("Location: ../admin/dashboard.php");
                    // echo "<script>window.open('../admin/index.php','_self')</script>";
                } else if($data['registration_role']=='mtd'){
                    // Redirect student to student page
                    // header("Location: ../mtd/dashboard.php");
                    // echo "<script>window.open('../student/index.php','_self')</script>";
                } else if($data['registration_role']=='driver'){
                    // Redirect other users to general user page
                    header("Location: dashboard.php");

                    // echo "<script>window.open('../index.php','_self')</script>";
                }
            }
            else{
                echo "<script>alert('Wrong email or password')</script>";
            }
        } else {
            echo "<script>alert('User not found')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <img src="../admin/dashboard.php" alt="">

<head>
    <title>Login | Driver</title>
    <!--Meta tags start-->
    <meta charset="UTF-8">
    <meta name="description" content="Smart Traffic Fine Management System for Sri Lanka">
    <meta name="keywords" content="Traffic, Fine, System, Sri Lanka">
    <meta name="author" content="Uva Wellassa University">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <!--Meta tags end-->
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/vendors/bootstrap/bootstrap.min.css">
    <!--===============================================================================================-->
    <!-- Import fontawesome from CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- End fontawesome from CDN -->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/vendors/animatecss/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/css/login.css">
    <!--===============================================================================================-->
</head>

<body>
    <!--Login form start here--->
    <div class="container">
        <div class="row login-section">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body animated fadeIn">
                        <h1 class="card-icon"><i class="fas fa-car"></i></h1>
                        <h5 class="card-title text-center">Driver Log In</h5>
                        <!--Warning msg start-->
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

                <form class="form-signin" action="" method="POST">
                            <div class="form-label-group">
                                <!-- <input type="email" id="inputEmail" name="admin_email" class="form-control" placeholder="Email address"> -->
                                <input type="email" placeholder="Enter email" name="registration_email" class="form-control" required>

                            </div>
                            <div class="form-label-group">
                                <!-- <input type="password" id="inputPassword" name="admin_password" class="form-control" placeholder="Password"> -->
                                <input type="password" name="registration_password" class="form-control" placeholder="Enter password" required>

                            </div>
                            <!-- <button class="btn btn-lg btn-block text-uppercase" type="submit">Log in</button> -->
                            <button class="btn btn-lg btn-block text-uppercase" type="submit" name="login">Log in</button>

                            <hr class="my-4">
                            </span> <span class="ml-2"><a href="../gov.php"><i class="fas fa-home"></i> Home</a></span></h6>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Login form end here--->

    <!--===============================================================================================-->
    <script src="../assets/vendors/jquery/jquery-3.5.1.js"></script>
    <!--===============================================================================================-->
    <script src="../assets/vendors/bootstrap/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script>
    	//To close the success & error alert with slide up animation
	$("#success-alert").delay(4000).fadeTo(2000, 500).slideUp(1000, function(){
    	$("#success-alert").slideUp(1000);
	});
    </script>
</body>

</html>