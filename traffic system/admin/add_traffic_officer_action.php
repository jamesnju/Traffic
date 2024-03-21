<?php
include "../connection.php";

if(isset($_POST['add-tpo-submit'])){

    $officerid = $_POST['officerid'];
    $officeremail = $_POST['officeremail'];
    $officerpassword = $_POST['officerpassword'];
    $officerpasswordconfirm = $_POST['officerpasswordconfirm'];
    $officername = $_POST['officername'];
    $policestation = $_POST['policestation'];

    // Validate all fields are filled
    if (empty($officerid) || empty($officeremail) || empty($officerpassword) || empty($officerpasswordconfirm) || empty($officername) || empty($policestation)) {
        header("Location: add_traffic_officer.php?error=All fields are required!");
        exit();
    }

    // Validate password match
    if ($officerpassword !== $officerpasswordconfirm) {
        header("Location: add_traffic_officer.php?error=Password does not match!");
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($officerpassword, PASSWORD_DEFAULT);

    // Check if the officer ID already exists
    $sql_check_officer_id = "SELECT * FROM tpo WHERE tpo_id='$officerid'";
    $result_check_officer_id = mysqli_query($con, $sql_check_officer_id);
    if (mysqli_num_rows($result_check_officer_id) > 0) {
        header("Location: add_traffic_officer.php?error=Traffic police officer ID already exists!");
        exit();
    }

    // Check if the email already exists
    $sql_check_email = "SELECT * FROM tpo WHERE tpo_email='$officeremail'";
    $result_check_email = mysqli_query($con, $sql_check_email);
    if (mysqli_num_rows($result_check_email) > 0) {
        header("Location: add_traffic_officer.php?error=Email already exists!");
        exit();
    }

    // Insert officer details into the tpo table
    $sql_insert_tpo = "INSERT INTO tpo(tpo_id, tpo_email, tpo_name, tpo_station, tpo_registered_at, tpo_status) VALUES('$officerid', '$officeremail', '$officername', '$policestation', NOW(), 'verified')";
    $result_insert_tpo = mysqli_query($con, $sql_insert_tpo);
    if ($result_insert_tpo) {
        // Insert registration details into the registration table
        $sql_insert_registration = "INSERT INTO registration(registration_username, registration_email, registration_role, registration_password, registration_confirm_password) VALUES ('$officername', '$officeremail', 'admin', '$hashed_password', '$hashed_password')";
        $result_insert_registration = mysqli_query($con, $sql_insert_registration);
        if ($result_insert_registration) {
            header("Location: add_traffic_officer.php?success=Traffic police officer added successfully");
            exit();
        } else {
            header("Location: add_traffic_officer.php?error=Failed to add traffic police officer registration details!");
            exit();
        }
    } else {
        header("Location: add_traffic_officer.php?error=Failed to add traffic police officer details!");
        exit();
    }
} else {
    echo "submit not set";
}
?>
