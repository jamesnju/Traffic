<?php
// Check if the session variable is set
// session_start();
if (!isset($_SESSION['registration_username'])) {
    // Redirect to the login page or perform other actions
    exit();
}

// Include the database connection file
include "../connection.php";

// SQL query to select data from the issued_fines table
$sql = "SELECT * FROM issued_fines WHERE issued_fines_status='pending'";
$result = mysqli_query($con, $sql);

?>

<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Action</th>
            <th>Reference No</th>
            <th>Offense ID</th>
            <th>Vehicle No</th>
            <th>Issue Date</th>
            <th>Paid Date</th>
            <th>Amount Ksh</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Action</th>
            <th>Reference No</th>
            <th>Offense ID</th>
            <th>Vehicle No</th>
            <th>Issue Date</th>
            <th>Paid Date</th>
            <th>Amount Ksh</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        // Check if any rows were returned by the query
        if (mysqli_num_rows($result) > 0) {
            // Loop through each row of data
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td class="d-flex justify-content-start">
                        <button type="button" name="view" value="View" id="<?php echo $row["issued_fines_no"]; ?>" class="btn btn-info btn-xs view_data"><i class="fas fa-info-circle"></i></button>
                    </td>
                    <td><?php echo $row['issued_fines_no']; ?></td>
                    <td><?php echo $row['issued_fines_provisions']; ?></td>
                    <td><?php echo $row['issued_fines_vehicle_no']; ?></td>
                    <td><?php echo $row['issued_fines_date']; ?></td>
                    <td><?php echo $row['issued_fines_date']; ?></td>
                    <td><?php echo $row['issued_fines_total_amount']; ?></td>
                </tr>
            <?php
            }
        } else {
            // Display a message if no rows were returned by the query
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php
// Close the database connection
mysqli_close($con);
?>
