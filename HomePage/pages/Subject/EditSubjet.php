<?php 

require_once "../Backend_Database/DBsubject.php";


// Select tag for class name SQL command.....
$Sql1 = "SELECT * FROM classes";
$Query1 = mysqli_query($Connection, $Sql1);
$Select1 = mysqli_fetch_all($Query1, MYSQLI_ASSOC);
// end ...


if(isset($_GET['id']) ){
    $ID = mysqli_real_escape_string($Connection, $_GET['id']);

    $SQL1 = "SELECT * FROM subjects WHERE id = '$ID'";
    $QUERY = mysqli_query($Connection, $SQL1);
    $RES1 = mysqli_fetch_all($QUERY, MYSQLI_ASSOC);
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
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                <div class="page-header">
                      <h3 class="page-title">
                      <span class="page-title-icon bg-gradient-primary text-white me-2">
                       <i class="mdi mdi-file-document"></i>
                       </span> Subject
                       </h3>
                </div>
                  <!-- <img src="../../assets/images/logo.svg"> -->
                </div>

                <form class="pt-3" action="subject.php" method ="post">
                    <?php foreach($RES1 as $Edit1 ){  ?>
                        <input type="hidden" name ="idSubject" value ="<?php echo $Edit1['id']; ?>">
                  <div class="form-group">
                    <label for=""> Subject Name</label><br><br>
                    <input type="text" name ="EditSubject" class="form-control form-control-lg" id="exampleInputPassword1" value="<?php echo $Edit1['subjectName'] ?>">
                  </div>

                  <div class="form-group">
                        <select class="form-control"  name = "Edit_subjectClassName">
                          <option value ="#" selected>Select Class Name</option>
                              <?php foreach($Select1 as $Option){  ?>
                                 <option value = "<?php echo $Option['className']; ?>"><?php echo $Option['className']; ?></option>
                              <?php } ?>
                        </select>
                  </div>

                  <div class="mt-3">
                    <button type ="submit" name ="subjectUpdate" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Update</button>
                  </div>
            
                  <?php } ?>

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