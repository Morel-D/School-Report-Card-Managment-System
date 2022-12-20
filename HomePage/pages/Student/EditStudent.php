<?php 

require_once "../Backend_Database/DBstudent.php";

// SQL command for the selct option

$Sql = "SELECT DISTINCT subjectClassName FROM subjects";
$Query = mysqli_query($Connection, $Sql);
$Select = mysqli_fetch_all($Query, MYSQLI_ASSOC);
// SQL end ...


if(isset($_GET['id']) ){
    $ID2 = mysqli_real_escape_string($Connection, $_GET['id']);

    $SQL2 = "SELECT * FROM students WHERE id = '$ID2'";
    $QUERY2 = mysqli_query($Connection, $SQL2);
    $RES2 = mysqli_fetch_all($QUERY2, MYSQLI_ASSOC);
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
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
    <!-- <link rel="shortcut icon" href="../../assets/images/favicon.ico" /> -->
  </head>
  <body>


  
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-7 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-account-card-details"></i>
                </span> Student
              </h3>
            </div>
                  <!-- <img src="../../assets/images/logo.svg"> -->
                </div>

                <form class="pt-3" action="student.php" method ="post">
                  <?php foreach($RES2 as $Student1) {  ?>
                  <input type="hidden" name ="studentID" value = "<?php echo $Student1['id']; ?>">

                  <div class ="row">


                  <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-9">          
                         <label for="">First Name</label>      
                             <input type="text" name ="EditFName" class="form-control form-control-lg" id="exampleInputPassword1" value="<?php echo $Student1['fName']; ?>">  
                        </div>
                    </div>
            </div> 


                  <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-9">
                         <label for="">Last Name</label>
                          <input type="text" name ="EditLName" class="form-control form-control-lg" id="exampleInputPassword1" value="<?php echo $Student1['lName']; ?>">  
                    </div>
                </div>
            </div> 



            <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-9">          
                          <select class="form-control" name = "Editstudent_class_name">
                              <option value ="<?php echo $Student1['studentClass']; ?>"><?php echo $Student1['studentClass']; ?></option>
                                <?php foreach($Select as $Option) {  ?>
                                <option><?php echo $Option['subjectClassName']; ?></option>
                                <?php } ?>
                            </select>                    
                          </div>
                    </div>
            </div> 


                  <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-9">
                         <label for="">Date of birth</label>
                          <input type="date" name ="EditDateOfBirth" class="form-control form-control-lg" id="exampleInputPassword1" value="<?php echo $Student1['dateOfBirth']; ?>">  
                    </div>
                </div>
            </div> 


            <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-9">          
                         <label for="">Age</label>      
                             <input type="text" name ="EditAge" class="form-control form-control-lg" id="exampleInputPassword1" value="<?php echo $Student1['age']; ?>">  
                        </div>
                    </div>
            </div> 


                  <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-9">
                         <label for="">Gender</label>
                          <input type="text" name ="EditGender" class="form-control form-control-lg" id="exampleInputPassword1" value="<?php echo $Student1['gender']; ?>">  
                    </div>
                </div>
            </div> 

            <?php } ?>

                  <div class="mt-3">
                    <button type ="submit" name ="studentUpdate" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Update</button>
                  </div>
            
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
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
  </body>
</html>