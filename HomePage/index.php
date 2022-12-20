

<?php

include_once "../Connection.php";



//include_once "pages/Backend_Database/DBclasses.php";
//include_once "pages/Backend_Database/DBstudent.php";
//include_once "pages/Backend_Database/DBsubject.php";
//include_once "pages/Backend_Database/DBrecords.php";
//include_once "pages/Backend_Database/Connection.php";
include_once "pages/Backend_Database/DBindex.php";

//session_start();



//Total number Of student 
$Sql_Student = "SELECT COUNT(fName) FROM students";
$Query_Student = mysqli_query($Connection, $Sql_Student);
$Result_student = mysqli_fetch_all($Query_Student, MYSQLI_ASSOC);

//Total number Of subjects
$Sql_Subject = "SELECT COUNT(DISTINCT subjectName) FROM subjects";
$Query_Subject = mysqli_query($Connection, $Sql_Subject);
$Result_Subject = mysqli_fetch_all($Query_Subject, MYSQLI_ASSOC);


//Overall average of the registerd students 
$Sql_Average = "SELECT AVG(mark) FROM records";
$Query_Average = mysqli_query($Connection, $Sql_Average);
$Result_Average = mysqli_fetch_all($Query_Average, MYSQLI_ASSOC);




?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Report Card Managment System</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <!-- <link rel="shortcut icon" href="#" /> -->

    <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  </head>


  <body>
   
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <!-- <a class="navbar-brand brand-logo" href="index.html"><img src="#" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="#" alt="logo" /></a> -->
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="assets/images/faces/user.png" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?php echo $_SESSION['name']; ?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="../Index.php">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
            
            <li class="nav-item nav-settings d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-format-line-spacing"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="assets/images/faces/user.png" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php echo $_SESSION['name']; ?></span>
                  <span class="text-secondary text-small">Lecturer</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="pages/Classes/classes.php">
                <span class="menu-title">Classes</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>
            

            <li class="nav-item">
              <a class="nav-link" href="pages/Subject/subject.php">
                <span class="menu-title">Subjects</span>
                <i class="mdi mdi-file-document menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="pages/Student/student.php">
                <span class="menu-title">Students</span>
                <i class="mdi mdi-account-card-details menu-icon"></i>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="pages/Records/records.php">
                <span class="menu-title">Records</span>
                <i class="mdi mdi-folder-multiple menu-icon"></i>
              </a>
            </li>

            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3">Spredsheet</h6>
                </div>
                <a href ="pages/Excel/excel.php" class="btn btn-block btn-lg btn-gradient-primary mt-4">Import Excel</a>
                <div class="mt-4">
              </span>
            </li>
 
          </ul>
        </nav>




        







        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <!-- <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" /> -->
                    <h4 class="font-weight-normal mb-3">Overall Student <i class="mdi mdi-account mdi-24px float-right"></i>
                    </h4>
                    <?php foreach($Result_student as $Total_Student){  ?>
                    <h2 class="mb-5"><?php echo $Total_Student['COUNT(fName)']; ?></h2>
                    <?php } ?>
                    <h6 class="card-text">Students</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <!-- <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" /> -->
                    <h4 class="font-weight-normal mb-3">Number of Subjects <i class="mdi mdi-book-open-page-variant mdi-24px float-right"></i>
                    </h4>
                    <?php foreach($Result_Subject as $Total_subject){  ?>
                    <h2 class="mb-5"><?php echo $Total_subject['COUNT(DISTINCT subjectName)']; ?></h2>
                    <?php } ?>
                    <h6 class="card-text">Subjects</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <!-- <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" /> -->
                    <h4 class="font-weight-normal mb-3">Overall Average <i class="mdi mdi-library-books mdi-24px float-right"></i>
                    </h4>
                    <?php foreach($Result_Average as $Total_Average) ?>
                    <h2 class="mb-5"><?php echo $Total_Average['AVG(mark)']; ?></h2>
                    <h6 class="card-text">Class Combined Average</h6>
                  </div>
                </div>
              </div>
            </div>

            <!-- <div class="row"> -->
              <!-- <div class="col-md-7 grid-margin stretch-card"> -->
                <!-- <div class="card"> -->
                  <!-- <div class="card-body"> -->
                    <!-- <div class="clearfix"> -->
                      <!-- <h4 class="card-title float-left">Visit And Sales Statistics</h4> -->
                      <!-- <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div> -->
                    <!-- </div> -->
                    <!-- <canvas id="visit-sale-chart" class="mt-4"></canvas> -->
                  <!-- </div> -->
                <!-- </div> -->
              <!-- </div> -->
<!--  -->
<!--  -->
  <!--  -->
            <!--  -->
 <!--  -->
              <!-- <div class="col-md-5 grid-margin stretch-card"> -->
                <!-- <div class="card"> -->
                  <!-- <div class="card-body"> -->
                    <!-- <h4 class="card-title">Traffic Sources</h4> -->
                    <!-- <div id="traffic-charts"></div> -->
                  <!-- </div> -->
                <!-- </div> -->
              <!-- </div> -->
            <!-- </div> -->
     




        
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>