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