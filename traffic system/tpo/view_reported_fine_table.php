<?php
    include("../connection.php");
    if (!isset($_SESSION['registration_username'])) {
      // Redirect to the login page
      header("Location: index.php");
      exit();
  }
?>

<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Reference No</th>
            <th>Driving License No</th>
            <th>Provision</th>
            <th>Vehicle No</th>
            <th>Total Amount</th>
            <th>Issue Date</th>          
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Reference No</th>
            <th>Driving License No</th>
            <th>Provision</th>
            <th>Vehicle No</th>
            <th>Total Amount</th>
            <th>Issue Date</th>    
        </tr>
    </tfoot>
    <tbody>
    <?php //Read officer details from tpo table
		include "../connection.php";	
        $police_id = $_SESSION['registration_username'];	
		$sql=mysqli_query($con,"select * from issued_fines where issued_fines_police_id = '$police_id'");
		while($res=mysqli_fetch_assoc($sql))
		{		
		?>
        <tr>
            <td><?php echo $res['issued_fines_no']; ?></td>
            <td><?php echo $res['issued_fines_license_id']; ?></td>
            <td><?php echo $res['issued_fines_provisions']; ?></td>
            <td><?php echo $res['issued_fines_vehicle_no']; ?></td>
            <td><?php echo $res['issued_fines_total_amount']; ?></td> 
            <td><?php echo $res['issued_fines_date']; ?></td> 
        </tr>
	    <?php 	
		}?>
    </tbody>
</table>


