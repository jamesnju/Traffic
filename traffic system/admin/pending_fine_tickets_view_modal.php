<?php  
 if(isset($_POST["did"]))  
 {  
	
      $output = '';  
      include "../connection.php";
      $query = "SELECT * FROM issued_fines WHERE issued_fines_no = '".$_POST["did"]."'";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
        
           <table class="table table-borderless"> <tbody> ';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '
				<tr class="content">
					<td>Reference No</td>
					<td>'.$row["issued_fines_no"].'</td>
				</tr>
				
				<tr class="content">
					<td>Police ID</td>
					<td>'.$row["issued_fines_police_id"].'</td>
				</tr>
                
				<tr class="content">
					<td>License ID</td>
					<td>'.$row["issued_fines_license_id"].'</td>
				</tr>
				
				<tr class="content">
					<td>Vehicle No</td>
					<td>'.$row["issued_fines_vehicle_no"].'</td>
				</tr>
               
			    <tr class="content">
					<td>Class of Vehicle</td>
					<td>'.$row["issued_fines_class_of_vehicle"].'</td>
				</tr>
				<tr class="content">
					<td>Place</td>
					<td>'.$row["issued_fines_place"].'</td>
				</tr>
				
				<tr class="content">
					<td>Issued Date</td>
					<td>'.$row["issued_fines_date"].'</td>
				</tr>
				
				<tr class="content">
					<td>Issued Time</td>
					<td>'.$row["issued_fines_time"].'</td>
				</tr>
				
				<tr class="content">
					<td>Expire Date</td>
					<td>'.$row["issued_fines_expire_date"].'</td>
				</tr>
				
				
				
				
				
				<tr class="content">
					<td>Provisions</td>
					<td>'.$row["issued_fines_provisions"].'</td>
				</tr>
				
				<tr class="content">
					<td>Total Amount</td>
					<td>'.$row["issued_fines_total_amount"].'</td>
				</tr>
				
				<tr class="content">
					<td>Status</td>
					<td style="word-break: break-all;">'.$row["issued_fines_status"].'</td>
				</tr>
				
           ';  
      }  
      $output .= '  
           </tbody></table>  
      
      ';  
      echo $output;  
 }  
?>
