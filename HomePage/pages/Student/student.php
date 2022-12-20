<?php

require_once "../Backend_Database/DBstudent.php";
session_start();

// SQL command for the selct option

$Sql = "SELECT DISTINCT subjectClassName FROM subjects";
$Query = mysqli_query($Connection, $Sql);
$Select = mysqli_fetch_all($Query, MYSQLI_ASSOC);
// SQL end ...

// Sql command for table view
$Sql1 = "SELECT * FROM students";
$Query1 = mysqli_query($Connection, $Sql1);
$Results = mysqli_fetch_all($Query1, MYSQLI_ASSOC);


// end ...

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
       <!---   <a class="navbar-brand brand-logo" href="../../index.html"><img src="../../assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
       ---></div>
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
                  <img src="../../assets/images/faces/user.png" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?php echo $_SESSION['name']; ?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../../Index.php">
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
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="../../assets/images/faces/user.png" alt="profile">
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
              <a class="nav-link" href="../../index.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="../Classes/classes.php">
                <span class="menu-title">Classes</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>
            

            <li class="nav-item">
              <a class="nav-link" href="../Subject/subject.php">
                <span class="menu-title">Subjects</span>
                <i class="mdi mdi-file-document menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="../Student/student.php">
                <span class="menu-title">Students</span>
                <i class="mdi mdi-account-card-details menu-icon"></i>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="../Records/records.php">
                <span class="menu-title">Records</span>
                <i class="mdi mdi-folder-multiple menu-icon"></i>
              </a>
            </li>

            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3">Spredsheet</h6>
                </div>
                <a href ="../Excel/excel.php" class="btn btn-block btn-lg btn-gradient-primary mt-4">Import Excel</a>
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
                  <i class="mdi mdi-account-card-details"></i>
                </span> Student
              </h3>
            </div>


            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Students Informaion</h4>
                  <p class="card-description"> Add class details
                  </p>

                  <form action="student.php" method = "post">
                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Enter Your First" name ="first_name" />
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Enter Your Last Name" name = "last_name"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-9">
                            <input type="date" class="form-control" placeholder="DD/MM/YY" name ="date_of_birth"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Enter Your Age" name = "age"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">  
                          <div class="col-sm-9">
                            <select class="form-control" name = "gender">
                              <option value ="#">Select Gender</option>
                              <option value ="Male">Male</option>
                              <option value ="Female">Female</option>
                            </select>
                        </div>
                      </div>

                      
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-sm-9">
                          <select class="form-control" name = "student_class_name">
                              <option value ="#">Select Class Name</option>
                                <?php foreach($Select as $Option) {  ?>
                                <option><?php echo $Option['subjectClassName']; ?></option>
                                <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>




                       <div class="col-md-3">
                            <div class="form-group row">
                            <button type="submit" class="btn btn-primary btn-fw" name = "create2">Create</button>
                            </div>
                      </div>       

                    </div>  
                  </form>

                </div>
              </div>
            </div>
          </div>


            

   


          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Students Records</h4>
                </p>
                <table id="table" class="table table-striped">
                  <thead>
                    <tr>
                      <th> User </th>
                      <th> Full Name </th>
                      <th> Class </th>
                      <th> Date of bith </th>
                      <th> Age </th>
                      <th> Gender </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($Results as $Student){  ?>
                      <form action="" method="post">
                      <tr>
                        <td class="py-1">
                          <img src="../../assets/images/faces/user.png" alt="image" />
                        </td>
                        <td> <?php echo $Student['fName']." ".$Student['lName']; ?> </td>
                        <td> <?php echo $Student['studentClass']; ?> </td>
                        <td> <?php echo $Student['dateOfBirth']; ?> </td>
                        <td> <?php echo $Student['age']; ?> </td>
                        <td> <?php echo $Student['gender']; ?> </td>
                        <td>
                          <input type="hidden" name ="id_deleteStudent" value ="<?php echo $Student['id']; ?>">
                          <a href = "EditStudent.php?id=<?php echo $Student['id']; ?>" class="btn btn-warning btn-icon-text">
                            <i class="mdi mdi-border-color btn-icon-prepend"></i> Edit </a>
  
                            <button type="submit" name ="deleteStudent" class="btn btn-danger btn-icon-text">
                              <i class="mdi mdi-delete btn-icon-prepend"></i> Delete </button>
                        </td>
                      </tr>
                      </form>
                    <?php }  ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>



    </div>


        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>