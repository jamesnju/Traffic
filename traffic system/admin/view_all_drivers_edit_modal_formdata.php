 <?php  
 
 include "../connection.php";
 if(isset($_POST["did"]))  
 {  
      $query = "SELECT * FROM driver WHERE driver_license_id = '".$_POST["did"]."'";  
      $result = mysqli_query($con, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>