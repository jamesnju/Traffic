<?php 
session_start();

// Check if the user is logged in
if (!isset($_SESSION['registration_username']) ) {
    // Redirect to the login page if not logged in
    header("Location: index.php");
    exit();
}

// Proceed with form submission logic only if the user is logged in

include "../connection.php";

if (isset($_POST['addfine'])) {
    $fineid = $_POST['fineid'];
    $sectionofact = $_POST['sectionofact'];
    $provision = $_POST['provision'];
    $fineamount = $_POST['fineamount'];
    
    // Insert new fine ticket details into the database
    $insert_query = "INSERT INTO fine_tickets(fine_id, section_of_act, provision, fine_amount) VALUES ('$fineid', '$sectionofact', '$provision', '$fineamount')";
    $insert_result = mysqli_query($con, $insert_query);
    
    if ($insert_result) {
        echo "<script>alert('Fine ticket added successfully');</script>";
    } else {
        echo "<script>alert('Failed to add fine ticket');</script>";
    }
    
    //header("Location: fine_tickets.php");
    exit();
} else {
    //header("Location: fine_tickets.php");
    exit();
}
?>
