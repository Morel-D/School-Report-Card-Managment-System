<?php
require_once "../Backend_Database/DBrecords.php";
session_start();

$Sql_Subject = "SELECT * FROM students GROUP BY studentClass";
$Query_Subject = mysqli_query($Connection, $Sql_Subject);
$Result_Subject = mysqli_fetch_all($Query_Subject, MYSQLI_ASSOC);



// Calculate and display records 

$Sql_display = "SELECT  fullName, SUM(mark), AVG(mark), studentClass FROM records, students GROUP BY fullName";
$Query_display = mysqli_query($Connection, $Sql_display);
$Result_display = mysqli_fetch_all($Query_display, MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Records</title>
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
        <!---  <a class="navbar-brand brand-logo" href="../../index.html"><img src="../../assets/images/logo.svg" alt="logo" /></a>
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
                  <i class="mdi mdi-folder-multiple"></i>
                </span> Records
              </h3>
            </div>


            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Records Informaion</h4>
                  <br>
                  

                  <form action="" method = "post">
                    <div class="row">

                    <div class="col-md-6">
                        <div class="form-group row">  
                          <label for="">Select Class Name</label>
                          <div class="col-sm-9">
                            <select class="form-control" name = "Option_Class_Name" onchange="this.form.submit();">
                              <option value = "#" selected>Select Class</option>
                               <?php foreach($Result_Subject as $Student1){  ?>                                
                                  <option value = "<?php echo $Student1['studentClass']; ?>"><?php echo $Student1['studentClass']; ?></option>
                                  
                               <?php } ?>
                               <input type="hidden" value ="<?php echo $_POST['Option_Class_Name']; ?>" name = "New_sub_class_name">
                            </select>
                        </div>
                      </div>

             

                      <div class="col-md-12">
                        <div class="form-group row">  
                          <label for="">Select Student Name</label>
                          <div class="col-sm-9">
                            <select class="form-control" name = "OptionName">

                            <?php
                               
                               $OptionCName = $_POST['Option_Class_Name'];

                               if(isset($_POST['Option_Class_Name'])){

                                $Sql_student = "SELECT * FROM students WHERE studentClass = '$OptionCName'"; 
                                $Query_student = mysqli_query($Connection, $Sql_student);
                                $Result_student = mysqli_fetch_all($Query_student, MYSQLI_ASSOC);
                               
                                foreach($Result_student as $Student) {
                             ?>
                              <option value = "<?php echo $Student['fName']." ".$Student['lName']; ?>"><?php echo $Student['fName']." ".$Student['lName']; ?></option>

                              <?php }} ?>
                              
                            </select>
                        </div>
                      </div>
                       <div class="col-md-3">
                            <div class="form-group row">
                            <button type="submit" class="btn btn-primary btn-fw" name = "display">Display</button>
                            </div>
                      </div>       
                    </div>  
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
  
  


        <div class="row">
          <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Student Marks</h4>
                </p>
        <?php 
        

               
        if(isset($_POST['display'])){ 
 
        $New_Class = mysqli_real_escape_string($Connection, $_POST['New_sub_class_name']); 
        $Sql_subjectsName = "SELECT subjectName FROM subjects WHERE subjectClassName = '$New_Class'"; 
        $Query_subjectsName = mysqli_query($Connection, $Sql_subjectsName);
        $Resluts_subjectsName = mysqli_fetch_all($Query_subjectsName, MYSQLI_ASSOC);


        $row = count($Resluts_subjectsName);
        
        ?>
                <table class="table table-hover">
                  <thead>

  <form action="" method="post"> 
                  <div class="col-sm-9">
                       <label for="">Full Name: <br><b><?php echo $_POST['OptionName']; ?></b> </label> <input type="hidden" class="form-control" value = "<?php echo $_POST['OptionName']; ?>" name = "fname">
                  </div>
                  <input type="hidden" value ="<?php echo $row; ?>" name = "num_row">

                  
                  
                  <?php
                  
                  $i = 0;

                  foreach((array) $Resluts_subjectsName as $SubjectName){  ?>

                         <tr>
                           <td>
                              <div class="col-sm-6">
                                  <label for=""><?php echo $SubjectName['subjectName']; ?></label> <input type="hidden" value = "<?php echo $SubjectName['subjectName']; ?>" name = "<?php echo $i.'subject'; ?>"> <br><br>
                                 <input type="text" class="form-control" placeholder="note" name = "<?php echo $i.'notes'; ?>" />
                              </div> 
                            </td>
                         </tr>

                         <?php $i++; ?>
                  <?php } ?>       

                  
                   <tr>
                    <td>
                      <button type="submit" class="btn btn-primary btn-fw" name = "submit3">Submit</button>
                    </td>
                   </tr>           
                     
                                
                             

            </form> 

                  


                  </thead>
                  <tbody>
                   
                  </tbody>
                </table>

        <?php }
        
        else {

          echo "<br><br><lable>No Avalaible Subject</label>";

        }
        
        ?>     

              </div>
            </div>
          </div>



          <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Marks Recording</h4>
                </p>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Student Name</th>
                      <th>Total</th>
                      <th>Average</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php foreach($Result_display as $Record){  ?>
                    <tr>
                      <td><?php echo $Record['fullName'] ?></td>
                      <td><?php echo $Record['SUM(mark)']; ?></td>
                      <td><?php echo $Record['AVG(mark)']; ?></td>
                      <td>
                        <form action="../Details/details.php" method="post">
                          <input type="hidden" value ="<?php echo $Record['fullName']; ?>" name = "new_name">
                            <button type="submit" class="btn btn-warning btn-icon" name ="view">
                              <i class="mdi mdi-eye btn-icon-prepend"></i>
                            </button>
                        </form>
                        <form action="" method="post">
                          <input type="hidden" name ="deleteName" value ="<?php echo $Record['fullName'] ?>">
                        <button type="submit" name ="deleteRecord" class="btn btn-danger btn-icon">
                          <i class="mdi mdi-delete btn-icon-prepend"></i>
                        </button>
                        </form>
                      </td>
                    </tr>

                    <?php } ?>


                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>  


          





          </div>
          <!-- content-wrapper ends -->
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