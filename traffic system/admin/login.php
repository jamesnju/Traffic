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
                    header("Location: dashboard.php");
                    // echo "<script>window.open('../admin/index.php','_self')</script>";
                } else if($data['registration_role']=='mtd'){
                    // Redirect student to student page
                    header("Location: ../mtd/dashboard.php");
                    // echo "<script>window.open('../student/index.php','_self')</script>";
                } else if($data['registration_role']=='driver'){
                    // Redirect other users to general user page
                    header("Location: ../user/dashboard.php");

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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="registration.css">
    <img src="../user/dashboard.php" alt="">
</head>
<body>
    <div class="inquire d-flex">
        <h2 class="text-center text-dark w-100">Login Form</h2>
        <fieldset class="row bg-dark">
            <form method="post" enctype="multipart/form-data">
                <label for="email">
                    <p class="text">Email</p>
                    <input type="email" placeholder="Enter email" name="registration_email" required>
                </label>
                <label for="password">
                    <p class="text">Password</p>
                    <input type="password" name="registration_password" placeholder="Enter password" required>
                </label>
                <button class="btn1 text-light" type="submit" name="login">Login</button>
                <p  class="text-light">Don't have an account? <a href="registration.php" class="text-danger text-decoration-none">Click here</a></p>
            </form>
        </fieldset>
    </div>
    <script src="./main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
