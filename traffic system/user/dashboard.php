<?php
    include("../connection.php");
    session_start();
    if (!isset($_SESSION['registration_username'])) {
      // Redirect to the login page
      header("Location: login.php");
      exit();
  }
  // Fetch pending fine count
  $pending_count_query = mysqli_query($con, "SELECT COUNT(*) FROM issued_fines WHERE issued_fines_license_id IN (SELECT issued_fines_license_id FROM issued_fines WHERE issued_fines_license_id=issued_fines_license_id) AND issued_fines_status='pending'");
  $pending_count_row = mysqli_fetch_array($pending_count_query);
  $pending_count = $pending_count_row[0];

  // Fetch pending fine amount
  $pending_amount_query = mysqli_query($con, "SELECT SUM(issued_fines_total_amount) FROM issued_fines WHERE issued_fines_license_id IN (SELECT issued_fines_license_id FROM issued_fines WHERE issued_fines_license_id=issued_fines_license_id) AND issued_fines_status='pending'");
  $pending_amount_row = mysqli_fetch_array($pending_amount_query);
  $pending_amount = $pending_amount_row[0];

  // Fetch paid fine amount
  $paid_amount_query = mysqli_query($con, "SELECT SUM(issued_fines_total_amount) FROM issued_fines WHERE issued_fines_license_id IN (SELECT issued_fines_license_id FROM issued_fines WHERE issued_fines_license_id=issued_fines_license_id) AND issued_fines_status='paid'");
  $paid_amount_row = mysqli_fetch_array($paid_amount_query);
  $paid_amount = $paid_amount_row[0];

  // Fetch paid fine count
  $paid_count_query = mysqli_query($con, "SELECT COUNT(*) FROM issued_fines WHERE issued_fines_license_id IN (SELECT issued_fines_license_id FROM issued_fines WHERE issued_fines_license_id=issued_fines_license_id) AND issued_fines_status='paid'");
  $paid_count_row = mysqli_fetch_array($paid_count_query);
  $paid_count = $paid_count_row[0];
?>


<!DOCTYPE html>
<html>

<head>
    <title>Dashboard | Driver</title>

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
                <a href="pending_fine.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                    <span>Driver's Pending Fine</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="paid_fine.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-coins"></i>
                    </div>
                    <span>Driver's Paid Fine</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="fine_tickets.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-receipt"></i>
                    </div>
                    <span>Provision Details</span>
                </a>
            </li>
            <!--Left sidebar navigation items-->
        </ul>
    </div>
    <!-- Left sidebar navigation end here ============================================-->


    <!--==================================================================================================================================SECTION_03====================================================================================================================================-->

    <!-- Dashboard main content start here =================================================-->
    <div class="dashwrapper animated fadeIn">
        <div class="container-fluid">
            <h6 class="mt-1 badge badge-pill badge-light tag-hover" style="padding: 10px; font-size: 0.75rem;">Account Holder : <a href="profile_details.php"><?php echo $_SESSION['registration_username']; ?></a></h6>
            <!--Main four count boxes start here-->
            <div class="row p-2">
                <!--First count box start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 animated fadeIn">
                    <div data-toggle="tooltip" data-placement="bottom" data-title="Number of fines you have to pay" class="dashcounter color-one p-4 box-hover">
                        <p>
                            <i class="fas fa-bullhorn"></i>
                        </p>
                        <h3 class="counter"><?php echo $pending_count; ?></h3>
                        <p class="dashcount-name">Pending Fine Count </p>
                    </div>
                </div>
                <!--First count box end-->
                <!--Second count box start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 animated fadeIn">
                    <div data-toggle="tooltip" data-placement="bottom" data-title="Total fine amount you have to pay" class="dashcounter color-two p-4 box-hover">
                        <p>
                            <i class="fas fa-hourglass-half"></i>
                        </p>
                        <h3 class="counter"><?php echo $pending_amount; ?></h3>    
                        <p class="dashcount-name">Pending Fine Amount (Ksh)</p>
                    </div>
                </div>
                <!--Second count box end-->
                <!--Third count box start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 animated fadeIn">
                    <div data-toggle="tooltip" data-placement="bottom" data-title="Number of fines you paid" class="dashcounter color-four p-4 box-hover">
                        <p>
                            <i class="fas fa-list-ol"></i>
                        </p>
                        <h3 class="counter"><?php echo $paid_count; ?></h3>

                        <p class="dashcount-name">Paid Fine Count</p>
                    </div>
                </div>
                <!--Third count box end-->
                <!--Fourth count box start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 animated fadeIn">
                    <div data-toggle="tooltip" data-placement="bottom" data-title="Total fine amount you paid" class="dashcounter color-three p-4 box-hover">
                        <p>
                            <i class="fas fa-coins"></i>
                        </p>
                        <h3 class="counter"><?php echo $paid_amount; ?></h3>
                        <p class="dashcount-name">Paid Fine Amount (Ksh)</p>
                    </div>
                </div>
                <!--Fourth count box end-->
            </div>
            <!--Main four count boxes end here-->

            <!--Charts start here-->
            <div class="row p-2">
                <div class="col-md-12">
                    <div class="mycard">
                        <div class="mycard-header">
                            <h3 class="mycard-heading-charts">
                                Fine Tickets Count <?php echo date("Y");  ?>
                            </h3>
                        </div>
                        <div class="mycard-content">
                            <canvas id="issuedFineCount" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-6">
                    <div class="mycard">
                        <div class="mycard-header">
                            <h3 class="mycard-heading-charts">
                                Pending Fine and Paid Fine Amount
                            </h3>
                        </div>
                        <div class="mycard-content">
                            <canvas id="PendingPaidfines" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mycard">
                        <div class="mycard-header">
                            <h3 class="mycard-heading-charts">
                                Pending Fine Count & Paid Fine Count
                            </h3>
                        </div>
                        <div class="mycard-content">
                            <canvas id="DriverAndTpoCount" height="200"></canvas>
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
            time: 500
        });
    </script>

</body>

</html>




<?php
    include ("../connection.php");
    $registration_username = $_SESSION['registration_username'];
    $result = mysqli_query($con,"SELECT SUM(issued_fines_total_amount) From issued_fines WHERE issued_fines_license_id='$registration_username' AND issued_fines_status='pending'");
    $row = mysqli_fetch_array($result);
    $totalPending = $row[0];
?>
<?php
    include ("../connection.php");
    $registration_username = $_SESSION['registration_username'];
    $result = mysqli_query($con,"SELECT SUM(issued_fines_total_amount) From issued_fines WHERE issued_fines_license_id='$registration_username' AND issued_fines_status='paid'");
    $row = mysqli_fetch_array($result);
    $totalPaid = $row[0];
?>
<!-- PHP Code end here -->
<!-- doughnut-chart -->
<script>
    pending = '<?php echo $totalPending ?>'
    paid = '<?php echo $totalPaid ?>'
    new Chart(document.getElementById("PendingPaidfines"), {
    type: 'doughnut',
    data: {
      labels: ["Paid Fine Amount (Ksh)", "Pending Fine Amount (Ksh)"],
      datasets: [
        {
          backgroundColor: ["#431374", "#d46d31"],
          data: [paid, pending]
        }
      ]
    },
    options: {
        responsive: true,
        title: {
            display: false,
        },
        animation: {
            duration: 2000,
        },
        legend: {
            onClick: (e) => e.stopPropagation(),
            position: 'top',
        }
    }
});
</script>
<!-- 01.Chart => Pending fines and Paid fines amount================================== -->


<!-- 02.Chart => Pending fines and Paid fines Count================================== -->
<!-- PHP Code goes here -->
<?php
    include ("../connection.php");
    $registration_username = $_SESSION['registration_username'];
    $pendingcountQuery = mysqli_query($con, "SELECT issued_fines_no FROM issued_fines WHERE issued_fines_license_id='$registration_username' AND issued_fines_status='pending'");
    $pendingCount = mysqli_num_rows($pendingcountQuery);

    $paidcountQuery = mysqli_query($con, "SELECT issued_fines_no FROM issued_fines WHERE issued_fines_license_id='$registration_username' AND issued_fines_status='paid'");
    $paidCount = mysqli_num_rows($paidcountQuery);
?>
<!-- PHP Code end here -->
<!-- doughnut-chart -->
<script>
    pending = '<?php echo $pendingCount ?>'
    paid = '<?php echo $paidCount ?>'
    new Chart(document.getElementById("DriverAndTpoCount"), {
    type: 'doughnut',
    data: {
      labels: ["Pending Fine Count", "Paid Fine Count"],
      datasets: [
        {
          backgroundColor: ["#e84545", "#1d9e8b"],
          data: [pending, paid]
        }
      ]
    },
    options: {
        responsive: true,
        title: {
            display: false,
        },
        animation: {
            duration: 2000,
        },
        legend: {
            onClick: (e) => e.stopPropagation(),
            position: 'top',
        }
    }
});
</script>
<!-- 02.Chart => Pending fines and Paid fines amount================================== -->


<!-- 03.Chart => Pending fines and Paid fines amount================================== -->
<!-- PHP Code goes here -->
<?php
    include "../connection.php";
    $year = date("Y");

$months = array(
    "january" => 1,
    "february" => 2,
    "march" => 3,
    "april" => 4,
    "may" => 5,
    "june" => 6,
    "july" => 7,
    "august" => 8,
    "september" => 9,
    "october" => 10,
    "november" => 11,
    "december" => 12
);

foreach ($months as $monthName => $monthNumber) {
    $query = "SELECT issued_fines_no FROM issued_fines WHERE MONTH(issued_fines_date) = $monthNumber AND YEAR(issued_fines_date) = '$year'";
    ${$monthName . "Val"} = mysqli_num_rows(mysqli_query($con, $query));
}

?>

<!-- PHP Code end here -->
<!-- bar chart -->
<Script>
    jan = '<?php echo $janVal; ?>';
    feb = '<?php echo $febVal; ?>';
    march = '<?php echo $marchVal; ?>';
    april = '<?php echo $aprilVal; ?>';
    may = '<?php echo $mayVal; ?>';
    june = '<?php echo $juneVal; ?>';
    july = '<?php echo $julyVal; ?>';
    aug = '<?php echo $augustVal; ?>';
    sep = '<?php echo $sepVal; ?>';
    oct = '<?php echo $octVal; ?>';
    nov = '<?php echo $novVal; ?>';
    dec = '<?php echo $decVal; ?>';

    new Chart(document.getElementById("issuedFineCount"), {
    type: 'line',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
      datasets: [
        {
          label: "Issued fine count",
          backgroundColor: "#5cb85c",
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
<!-- 03.Chart => Pending fines and Paid fines amount================================== -->
