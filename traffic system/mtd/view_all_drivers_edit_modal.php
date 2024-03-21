<?php  
if (!empty($_POST)) {    
    include "../connection.php";
    $output = '';  
    $message = '';  
    $license_id = mysqli_real_escape_string($con, $_POST["did"]);  
    $address = mysqli_real_escape_string($con, $_POST["daddress"]);
    $driver_email = mysqli_real_escape_string($con, $_POST["driver_email"]);  
    $driver_name = mysqli_real_escape_string($con, $_POST["driver_name"]);  
    $license_issue_date = mysqli_real_escape_string($con, $_POST["license_issue_date"]);
    $license_expire_date = mysqli_real_escape_string($con, $_POST["license_expire_date"]);
    $registered_date = mysqli_real_escape_string($con, $_POST["registered_date"]);
    $class_of_vehicle = mysqli_real_escape_string($con, $_POST["class_of_vehicle"]);
    
    if ($_POST["did"] != '') {  
        $query = "  
        UPDATE driver   
        SET license_id='$license_id',
        driver_email='$driver_email',
        home_address='$address',
        driver_name='$driver_name',
        license_issue_date='$license_issue_date',
        license_expire_date='$license_expire_date',
        class_of_vehicle='$class_of_vehicle',
        registered_at='$registered_date'          
        WHERE license_id='".$_POST["did"]."'";  
        $message = 'Data Updated';  
    } else {  
        $output = "not updated"; 
    }
  
    if (mysqli_query($con, $query)) { 
        // Redirect to view_all_drivers.php after successful update
        header("Location: ./view_all_drivers.php");
        exit();
    }  
}  
?>
