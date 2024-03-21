<?php 
session_start();
include "../connection.php";

if (isset($_POST['licenseid']) && isset($_POST['driveremail'])
    && isset($_POST['driverpassword']) && isset($_POST['cdriverpassword'])
    && isset($_POST['drivername']) && isset($_POST['classofvehicle'])
    && isset($_POST['homeaddress']) && isset($_POST['licenseissuedate'])
    && isset($_POST['licenseexpiredate'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $licenseid = validate($_POST['licenseid']);
    $driveremail = validate($_POST['driveremail']);
    $driverpassword = validate($_POST['driverpassword']);
    $cdriverpassword = validate($_POST['cdriverpassword']);
    $drivername = validate($_POST['drivername']);
    $classofvehicle = validate($_POST['classofvehicle']);
    $homeaddress = validate($_POST['homeaddress']);
    $licenseissuedate = validate($_POST['licenseissuedate']);
    $licenseexpiredate = validate($_POST['licenseexpiredate']);

    $user_data = 'licenseid='. $licenseid. '&driveremail='. $driveremail. '&drivername='. $drivername. '&classofvehicle='. $classofvehicle. '&homeaddress='. $homeaddress. '&licenseissuedate='. $licenseissuedate. '&licenseexpiredate='. $licenseexpiredate;

    //Check text field empty or not
    if (empty($licenseid)) {
        header("Location: add_driver.php?error=License ID is required!&$user_data");
        exit();
    } elseif (empty($driveremail)) {
        header("Location: add_driver.php?error=Driver Email is required!&$user_data");
        exit();
    } elseif (empty($driverpassword)) {
        header("Location: add_driver.php?error=Driver Password is required!&$user_data");
        exit();
    } elseif (empty($cdriverpassword)) {
        header("Location: add_driver.php?error=Confirm password is required!&$user_data");
        exit();
    } elseif (empty($drivername)) {
        header("Location: add_driver.php?error=Driver Full Name is required!&$user_data");
        exit();
    } elseif (empty($classofvehicle)) {
        header("Location: add_driver.php?error=Class Of Vehicle is required!&$user_data");
        exit();
    } elseif (empty($homeaddress)) {
        header("Location: add_driver.php?error=Driver Address is required!&$user_data");
        exit();
    } elseif (empty($licenseissuedate)) {
        header("Location: add_driver.php?error=License Issue Date is required!&$user_data");
        exit();
    } elseif (empty($licenseexpiredate)) {
        header("Location: add_driver.php?error=License Expire Date is required!&$user_data");
        exit();
    } elseif ($driverpassword !== $cdriverpassword) {
        header("Location: add_driver.php?error=Password  does not match!&$user_data");
        exit();
    } else {
        // hashing the password
        // $driverpassword_hashed = md5($driverpassword);
        $driverpassword_hashed = password_hash($driverpassword,PASSWORD_DEFAULT);

        $sql = "SELECT * FROM driver WHERE driver_license_id ='$licenseid' ";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: add_driver.php?error=License ID already exists!");
            exit();
        } else {
            //Insert driver data into database
            $sql2 = "INSERT INTO driver(driver_license_id, driver_email, driver_name, driver_home_address, driver_license_issue_date, driver_license_expire_date, driver_class_of_vehicle, driver_registered_at, driver_status) VALUES('$licenseid', '$driveremail', '$drivername', '$homeaddress', '$licenseissuedate', '$licenseexpiredate', '$classofvehicle', NOW(), 'verified')";
            $result2 = mysqli_query($con, $sql2);

            // Insert driver details into registration table
            $sql3 = "INSERT INTO registration(registration_username, registration_email,registration_role, registration_password, registration_confirm_password) VALUES ('$drivername', '$driveremail','driver', '$driverpassword_hashed', '$driverpassword_hashed')";
            $result3 = mysqli_query($con, $sql3);

            if ($result2 && $result3) {
                header("Location: add_driver.php?success=Added Successfully");
                exit();
            } else {
                header("Location: add_driver.php?error=Unknown error occurred!");
                exit();
            }
        }
    }
} else {
    header("Location: add_driver.php");
    exit();
}
?>
