<?php
include "../connection.php";
session_start();

// Check if the user is logged in
if (!isset($_SESSION['registration_username'])) {
    // Redirect to the login page
    header("Location: index.php");
    exit();
}

if (isset($_POST['change-password'])) {
    $newpassword = $_POST['newpassword'];
    $passwordconfirm = $_POST['passwordconfirm'];

    $user_data = 'newpassword=' . $newpassword . '&passwordconfirm=' . $passwordconfirm;

    if (empty($newpassword)) {
        header("Location: mtd_account.php?error=New Password is required!&$user_data");
        exit();
    } else if (empty($passwordconfirm)) {
        header("Location: mtd_account.php?error=Confirm Password is required!&$user_data");
        exit();
    } else {
        $newpassword = md5($newpassword);
        $passwordconfirm = md5($passwordconfirm);

        // Retrieve the user's registration ID using their username from the session
        $registration_username = $_SESSION['registration_username'];
        $query = "SELECT registration_id FROM registration WHERE registration_username = '$registration_username'";
        $result = mysqli_query($con, $query);

        if (!$result) {
            header("Location: mtd_account.php?error=Error retrieving user information.");
            exit();
        }

        $row = mysqli_fetch_assoc($result);
        $registration_id = $row['registration_id'];

        // Update the password in the registration table
        $update_query = "UPDATE registration SET registration_password='$newpassword' WHERE registration_id='$registration_id'";
        $update_result = mysqli_query($con, $update_query);

        if ($update_result) {
            header("Location: mtd_account.php?success=Password changed successfully.");
            exit();
        } else {
            header("Location: mtd_account.php?error=Failed to update password.");
            exit();
        }
    }
} else {
    header("Location: mtd_account.php?error=Invalid request.");
    exit();
}
?>
