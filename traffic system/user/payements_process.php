<?php
session_start();
if (isset($_SESSION['license_id']) && isset($_SESSION['driver_email']) && isset($_SESSION['driver_name']) && isset($_SESSION['home_address'])) {
?>

<?php
    // Include necessary files and perform database connection
    include("../connection.php");

    // Check if the Confirm Pay button is clicked
    if(isset($_POST['confirm_pay'])) {
        // Get the reference ID
        $ref_id = $_GET['ref_no'];

        // Update database to mark the fine as paid
        $update_sql = "UPDATE issued_fines SET issued_fines_status = 'Paid' WHERE issued_fines_no = '$ref_id'";
        $update_res = mysqli_query($conn, $update_sql);

        if($update_res) {
            $message = "Payment successful. Fine has been marked as paid.";
        } else {
            $message = "Failed to update database. Please try again.";
        }
    }
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
    <title>Fine Payment Process</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('path/to/your/image.jpg');
            background-size: cover;
            background-position: center;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: rgba(255, 255, 255, 0.7); /* Adding some transparency to the container */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        .message {
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        form {
            text-align: center;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Confirm Payment</h2>
        <?php if(isset($message)): ?>
            <div class="message <?php echo ($update_res) ? 'success' : 'error'; ?>"><?php echo $message; ?></div>
        <?php endif; ?>
        <form method="post">
            <!-- Display fine details here -->
            
            <!-- Add a hidden input field to indicate Confirm Pay button is clicked -->
            <input type="hidden" name="confirm_pay" value="1">
            <!-- Add a button to confirm payment -->
            <button type="submit">Confirm Pay</button>
        </form>
    </div>

</body>
</html>

<?php
} else { 
    header("Location: login.php");
    exit();
}
?>
