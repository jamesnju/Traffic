<?php
if (isset($_SESSION['license_id']) && isset($_SESSION['driver_email']) && isset($_SESSION['driver_name']) && isset($_SESSION['home_address'])) {
?>



<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Action</th>
            <th>Reference No</th>
            <th>Provision</th>
            <th>Vehicle No</th>
            <th>Issue Date</th>
            <th>Expire Date</th>
          
            <th>Amount Ksh</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Action</th>
            <th>Reference No</th>
            <th>Provision</th>
            <th>Vehicle No</th>
            <th>Issue Date</th>
            <th>Expire Date</th>
            
            <th>Amount Ksh</th>
        </tr>
    </tfoot>
    <tbody>
        <?php //Read details from issued_fine table
		include "../connection.php";	
        $license_id = $_SESSION['license_id'];	
		$sql=mysqli_query($conn,"select * from issued_fines where issued_fines_license_id = '$license_id' AND issued_fines_status='pending'");
		while($res=mysqli_fetch_assoc($sql))
		{		
		?>
        <tr>
            <td class="d-flex justify-content-start">  
                <button type="button" name="view" value="View" id="<?php echo $res["issued_fines_no"]; ?>" class="btn btn-info btn-xs view_data"><i class="fas fa-info-circle"></i></button>
				<button type="button" name="paynow" value="Paynow" id="<?php echo $res["issued_fines_no"]; ?>" class="btn btn-warning btn-xs pay_now">Pay Now <i class="fas fa-coins"></i></button>
			</td>

            <td><?php echo $res['issued_fines_no']; ?></td>
            <td><?php echo $res['issued_fines_provisions']; ?></td>
            <td><?php echo $res['issued_fines_vehicle_no']; ?></td>
            <td><?php echo $res['issued_fines_date']; ?></td>
            <td><?php echo $res['issued_fines_expire_date']; ?></td>
            
            <td><?php echo $res['issued_fines_total_amount']; ?></td>
        </tr>
        <?php 	
		}?>
    </tbody>
</table>

<?php
}else{ 
	header("Location: login.php");
	exit();
}
?>

