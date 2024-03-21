<?php
    include("../connection.php");
    session_start();
    if (!isset($_SESSION['registration_username'])) {
      // Redirect to the login page
      header("Location: index.php");
      exit();
  }
  if (!isset($_SESSION['police_station'])) {
    // Set default police station value here
    $_SESSION['police_station'] = "Default Police Station";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard | Traffic Police Officer</title>

    <!--Elements inside the head tag includes goes here-->
    <?php 
        include_once '../includes/header.php';
    ?>

</head>


<body class="overlay-scrollbar">

    <!--Top navigation bar includes goes here-->
    <?php 
        include 'includes/topNav.php';
    ?>


    <!--==================================================================================================================================SECTION_02====================================================================================================================================-->

    <!-- Left sidebar navigation start here =============================================-->
    <div class="leftsidebar overlay-scrollbar scrollbar-hover">
        <ul class="leftsidebar-nav overlay-scrollbar scrollbar-hover">
            <!--Left sidebar navigation items-->
            <li class="leftsidebar-nav-item">
                <a href="dashboard.php" class="leftsidebar-nav-link active">
                    <div>
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="add_new_fine.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <span>Add New Fine</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="driver_past_fine.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-history"></i>
                    </div>
                    <span>Driver's Past Fine</span>
                </a>
            </li>
           
            <li class="leftsidebar-nav-item">
                <a href="view_reported_fine.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-flag-checkered"></i>
                    </div>
                    <span>View Reported Fine</span>
                </a>
            </li>
            <!--Left sidebar navigation items-->
        </ul>
    </div>
    <!-- Left sidebar navigation end here ========================================-->


    <!--==================================================================================================================================SECTION_03====================================================================================================================================-->

    <!-- Dashboard main content start here =================================================-->
    <div class="dashwrapper animated fadeIn">
        <div class="container-fluid">
            <h6 class="mt-1 badge badge-pill badge-light tag-hover" style="padding: 10px; font-size: 0.75rem;">Police Officer ID : <a href="profile_details.php"><?php echo $_SESSION['registration_username']; ?></a></h6>
            <div class="row">
                <div class="col-12 p-3 d-lg-none d-md-block d-sm-block">
                    <a class="btn btn-secondary btn-lg btn-block" href="add_new_fine.php"><span><i style="font-size: 2rem;" class="fas fa-plus-circle"></i> <br>Add New Fine</span></a>
                </div>
                <div class="col-12 p-3 d-lg-none d-md-block d-sm-block">
                    <a class="btn btn-secondary btn-lg btn-block"  href="driver_past_fine.php"><span><i style="font-size: 2rem;" class="fas fa-history"></i> <br>View driver's Past Fine</span></a>
                </div>
                <div class="col-12 p-3 d-lg-none d-md-block d-sm-block">
                    <a class="btn btn-secondary btn-lg btn-block"  href="check_revenue_license.php"><span><i style="font-size: 2rem;" class="fas fa-file-invoice"></i> <br>Check Revenue License</span></a>
                </div>
            </div>    
            <!--Main four count boxes start here-->
            <div class="row p-2">
                <!--First count box start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 animated fadeIn">
                    <div data-toggle="tooltip" data-placement="bottom" data-title="Reported fine count by you" class="dashcounter color-one p-4 box-hover">
                        <p>
                            <i class="fas fa-flag-checkered"></i>
                        </p>
                        <!--Reported fine count goes here-->
                        <?php
$query = "SELECT IFNULL(issued_fines.issued_fines_no, 0) AS issued_fines_no
FROM registration
LEFT JOIN issued_fines ON issued_fines.issued_fines_police_id = registration.registration_username
WHERE registration.registration_role = 'tpo'";
                  $query_run = mysqli_query($con, $query);

                            $row = mysqli_num_rows($query_run);
                            echo '<h3 class="counter">'.$row.'</h3>';
                        ?>
                        <p class="dashcount-name">Reported Fine Count</p>
                    </div>
                </div>
                <!--First count box end-->
                <!--Second count box start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 animated fadeIn">
                    <div data-toggle="tooltip" data-placement="bottom" data-title="Reported fine amount by you" class="dashcounter color-two p-4 box-hover">
                        <p>
                            <i class="fas fa-coins"></i>
                        </p>
                        <!--Reported fine Total goes here-->
                        <?php
                            $query = "SELECT SUM(issued_fines_total_amount) From issued_fines WHERE issued_fines_police_id=(SELECT registration_username FROM registration WHERE registration_role = 'tpo' LIMIT 1)";
                            $result = mysqli_query($con,$query);
                            $row = mysqli_fetch_array($result);
                            $total = $row[0];
                            echo '<h3 class="counter">'.$total.'</h3>';
                        ?>       
                        <p class="dashcount-name">Reported Fine Amount (Ksh)</p>
                    </div>
                </div>
                <!--Second count box end-->
                <!--Third count box start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 animated fadeIn">
                    <div data-toggle="tooltip" data-placement="bottom" data-title="Your police station" class="dashcounter color-four p-4 box-hover">
                        <p>
                            <i class="fas fa-warehouse"></i>
                        </p>
                        <h3><?php echo $_SESSION['police_station'] ?></h3>
                        <p class="dashcount-name">Police Station</p>
                    </div>
                </div>
                <!--Third count box end-->
                <!--Fourth count box start-->
               
                <!--Fourth count box end-->
            </div>
            <!--Main four count boxes end here-->

            <!--Charts start here-->
            <div class="row p-2">
                <div class="col-md-12">
                    <div class="mycard">
                        <div class="mycard-header">
                            <h3 class="mycard-heading-charts">
                                Reported Fine Count <?php echo date("Y"); ?>
                            </h3>
                        </div>
                        <div class="mycard-content">
                            <canvas id="reportedFineCount" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-12">
                    <div class="mycard">
                        <div class="mycard-header">
                            <h3 class="mycard-heading-charts">
                                Reported Fine Amount <?php echo date("Y"); ?>
                            </h3>
                        </div>
                        <div class="mycard-content">
                            <canvas id="reportedFineAmount" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!--Charts end here-->

        </div>
    </div>
    <!-- Dashboard main content end here ========================================-->


    <!--Javascripts includes goes here-->
    <?php 
        include '../includes/footer.php';
    ?>

    <script type="text/javascript" language="javascript" src="../assets/vendors/bootstrap/bootstrap.min.js"></script>

    <!--Dashboard number counter settings goes here-->
    <script>
        $('.counter').counterUp({
            delay: 10,
            time: 1500
        });
    </script>

</body>

</html>



<!--===========================================================================================================================Charts start here =====================================
========================================================================================-->

<!-- 01.Chart => Pending fines and Paid fines amount================================== -->
<!-- PHP Code goes here -->
<?php
    $year = date("Y");
    $jan = mysqli_query($con, "SELECT issued_fines_no FROM issued_fines WHERE issued_fines_police_id = (SELECT registration_username FROM registration WHERE registration_role = 'tpo') AND MONTH(issued_fines_date) = 01 AND YEAR(issued_fines_date) = '$year'");
    $janVal = mysqli_num_rows($jan);

    // Similarly, you need to fetch data for each month and assign it to variables like janVal, febVal, etc.
    // I have shown an example for January, you can do the same for other months.
?>

<!-- PHP Code end here -->
<!-- bar chart -->
<script>
    jan = '<?php echo $janVal; ?>';
    // Assign values to other months as well

    new Chart(document.getElementById("reportedFineCount"), {
    type: 'line',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
      datasets: [
        {
          label: "Issued fine count",
          backgroundColor: "#d9534f",
          data: [jan,feb,march,april,may,june,july,aug,sep,oct,nov,dec]
        }
      ]
    },
    options: {
        legend: { display: false },
        responsive: true,
        title: {
            display: false,
        },
        animation: {
            duration: 2000,
        },
        maintainAspectRatio: false,
        bezierCurve: false
    }
});
</script>
<!-- 01.Chart => Pending fines and Paid fines amount================================== -->

<!-- 02.Chart => Pending fines and Paid fines amount================================== -->
<!-- PHP Code goes here -->
<?php
    $jan = mysqli_query($con, "SELECT SUM(issued_fines_total_amount) From issued_fines WHERE issued_fines_police_id=(SELECT registration_username FROM registration WHERE registration_role = 'tpo') AND MONTH(issued_fines_date) = 01 AND YEAR(issued_fines_date) = '$year'");
    $janVal = mysqli_fetch_array($jan);
    $janTotal = $janVal[0];

    // Similarly, you need to fetch data for each month and assign it to variables like janTotal, febTotal, etc.
    // I have shown an example for January, you can do the same for other months.
?>

<!-- PHP Code end here -->
<!-- bar chart -->
<script>
    jan = '<?php echo $janTotal; ?>';
    // Assign values to other months as well

    new Chart(document.getElementById("reportedFineAmount"), {
    type: 'bar',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
      datasets: [
        {
          label: "Issued fine count",
          backgroundColor: "#d46d31",
          data: [jan,feb,march,april,may,june,july,aug,sep,oct,nov,dec]
        }
      ]
    },
    options: {
        legend: { display: false },
        responsive: true,
        title: {
            display: false,
        },
        animation: {
            duration: 2000,
        },
        maintainAspectRatio: false,
        bezierCurve: false
    }
});
</script>
<!-- 02.Chart => Pending fines and Paid fines amount================================== -->
