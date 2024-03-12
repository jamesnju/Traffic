<!--Login Action here--->
<?php

session_start();
include "../connection.php";

if (isset($_POST['police_id']) && isset($_POST['officer_password'])) {

	function validate($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$police_id = validate($_POST['police_id']);
	$officer_password = validate($_POST['officer_password']);

	if (empty($police_id)) {
		header("Location: index.php?error=Police ID is required!");
		exit();
	}else if (empty($officer_password)) {
		header("Location: index.php?error=Password is required!");
		exit();
		
	}else{
 
		$officer_password = md5($officer_password);

		$sql = "SELECT * FROM tpo WHERE tpo_id='$police_id' AND tpo_password='$officer_password'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if ($row['tpo_id'] === $police_id && $row['tpo_password'] === $officer_password) {
				$_SESSION['police_id'] = $row['tpo_id'];
				$_SESSION['officer_name'] = $row['tpo_name'];
				$_SESSION['officer_email'] = $row['tpo_email'];
				$_SESSION['police_station'] = $row['tpo_station'];
				
				header("Location: dashboard.php");
				exit();
				
			}else{
				header("Location: index.php?error= Incorrect Police ID or Password!");
				exit();
			}

		}else{
			header("Location: index.php?error= Incorrect Police ID or Password!");
			exit();
		} 
	}


}else{
	header("Location: index.php");
	exit();
}



?>