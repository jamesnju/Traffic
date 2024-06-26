<?php
    include("../connection.php");
    if (!isset($_SESSION['registration_username'])) {
      // Redirect to the login page
      header("Location: index.php");
      exit();
  }
?>

<div class="card mt-5 mb-4">
    <div class="card-header">
        <i class="fas fa-history"></i> Search Driver Past Fines
    </div>
    <div class="card-body mobilePaading">
        <form action="" method="POST">
            <div class="form-row">
                <div class="form-group col-xs-9">
                    <input type="text" class="form-control" id="license_id" name="licenseid" placeholder="Driving License No">
                </div>
                <div class="form-group col-xs-3">
                    <button type="submit" name="search" class="btn btn-primary mb-2" name="search"><i class="fas fa-search"></i> Check</button>
                </div>
            </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Refferance No</th>
                                    <th>Provision</th>
                                    <th>Vehicle No</th>
                                    <th>Place</th>
                                    <th>Issue Date</th>   
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($_POST['search']))
                            {
	                                $dlno=$_POST['licenseid'];
                                    include "../connection.php";
                                    $sql=mysqli_query($con,"SELECT * FROM issued_fines WHERE issued_fines_license_id = '$dlno'");
                                    while($res=mysqli_fetch_assoc($sql))
                                    {
                                    ?>
                                    <tr>
                                        <td><?php echo $res['issued_fines_no']; ?></td>
                                        <td><?php echo $res['issued_fines_provisions']; ?></td> 
                                        <td><?php echo $res['issued_fines_vehicle_no']; ?></td>
                                        <td><?php echo $res['issued_fines_place']; ?></td>
                                        <td><?php echo $res['issued_fines_date']; ?></td>
                                        
                                    </tr>
                                    <?php 	
                                    }}?>
                            </tbody>
                        </table>
                    </div>
        </form>
    </div>
</div>


