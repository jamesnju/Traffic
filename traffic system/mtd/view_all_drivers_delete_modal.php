 <?php  
    // create database connectivity  
	include "../connection.php";
	$output_del = ''; 
      
	  
	  if($_POST["did"] != '') 
      {  	
			//Check whether pending fines exist or not
			/*$pastfines = "SELECT * FROM issued_fines WHERE status='pending' AND license_id ='".$_POST["did"]."'";
			$exist_fines = mysqli_query($conn, $pastfines);
			if(mysql_num_rows($exist_fines)>0){
				header("Location: view_all_drivers.php?error=Pending Fines Availabe!");
			} 
			else { */	  
				$query = "DELETE FROM driver WHERE driver_license_id ='".$_POST["did"]."'";
				//$message = 'Delete success';
				//$output_del .= 'error 1' ;
			//}
      }  
      else  
      {		
		$output_del .= 'error 2' ;
      }
	  
	  
	  if(mysqli_query($con, $query))  
      {  
           $output_del .= '<label class="alert alert-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM driver";  
           $result = mysqli_query($con, $select_query);  
           $output_del .= '  
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">  
                     <tr>  
                          <th>Action</th>  
                          <th>License ID</th>  
                          <th>Driver Full Name</th>
						  <th>License Issue Date</th>  
                          <th>License Expire Date</th>                           
                     </tr>  
					 <tfoot>
						<tr>
							<th>Action</th>										
							<th>License ID</th>
							<th>Driver Full Name</th>
							<th>License Issue Date</th>
							<th>License Expire Date</th>
						</tr>
					</tfoot>
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output_del .= '  
                     <tr> 
						  <td>
							<input type="button" name="edit" value="Edit" id="'.$row["driver_license_id"] .'" class="btn btn-info btn-xs edit_data" /> 
							<input type="button" name="view" value="view" id="' . $row["driver_license_id"] . '" class="btn btn-warning btn-xs view_data" />
							<input type="button" name="delete" value="Delete" id="' . $row["driver_license_id"] . '" class="btn btn-danger btn-xs delete_data" />
						  </td>
							
						  <td>' . $row["driver_license_id"] . '</td>
                          <td>' . $row["driver_driver_name"] . '</td>						  
						  <td>' . $row["driver_license_issue_date"] . '</td>
						  <td>' . $row["driver_license_expire_date"] . '</td>
                          
						  
                     </tr>  
                ';  
           }  
           $output_del .= '</table>';  
      } 
	  echo $output_del; 
  
 ?>