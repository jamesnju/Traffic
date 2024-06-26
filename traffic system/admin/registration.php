<?php

session_start();
include "../connection.php";
if(isset($_POST['register'])){

    $username = $_POST['registration_username'];
    $email = $_POST['registration_email']; 
    $role = $_POST['registration_role'];
    $password = $_POST['registration_password'];
    $hash_password = password_hash($password,PASSWORD_DEFAULT);
    $registration_confirm_password = $_POST['registration_confirm_password'];
    
   // registration_id	registration_username	registration_email	registration_role	registration_password
    $select_query = "select * from `registration` where registration_username='$username' or registration_email='$email'";
    $query= mysqli_query($con, $select_query);
    $row=mysqli_num_rows($query);

    if($row>0){
        echo  "<script>alert('username or email Exist')</script>";
        // echo "<script>window.open('registration.php','_self')</script>";
    }else if($password != $registration_confirm_password){
        echo  "<script>alert('password do not match')</script>";
        // echo "<script>window.open('registration.php','_self')</script>";
    }else {
        $insert_query = "INSERT INTO `registration` (registration_username, registration_email, 
        registration_role, registration_password, registration_confirm_password) 
        VALUES ('$username','$email','$role', '$hash_password', '$hash_password')";
        $result = mysqli_query($con, $insert_query);
        echo "<script>alert('success')</script>";
        // echo "<script>window.open('login.php','_self')</script>";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
 </head>
<body>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="inquire">
                <h2 class="text-center text-success">Registration Form</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="fullname">Tutor First Name</label>
                        <input type="text" class="form-control" name="registration_username" placeholder="Enter Name.." autofocus>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Enter email" name="registration_email">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" placeholder="Enter role.." name="registration_role">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="registration_password" placeholder="Enter password*******">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" name="registration_confirm_password" placeholder="Enter confirm password*****">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
                    <p class="text-center">Have an account? <a href="index.php" class="text-danger text-decoration">Click here to register</a></p>

                </form>
            </div>
        </div>
    </div>
</div>

    <script src="./main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>