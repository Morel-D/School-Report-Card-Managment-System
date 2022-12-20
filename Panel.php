<?php

include_once("Connection.php");

$sql = "SELECT * FROM login";
$query  = mysqli_query($Connection, $sql);
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Records Details</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="HomePage/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="HomePage/assets/vendors/css/vendor.bundle.base.css">

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="HomePage/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="HomePage/assets/images/" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
       <!---   <a class="navbar-brand brand-logo" href="../../index.html"><img src="../../assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
       ---></div>
       




            

   


          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Record Details</h3>
                <a href="Admin.php" id="signup" class="form-submit">Add User</a>
                </p>
                <table id="table" class="table table-striped">
                  <thead>
                    <tr>
                      <th> User Name </th>
                      <th> Email </th>
                      <th> Access Code </th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php foreach($result as $View){  ?>
                      <form action="" method="post">
                      <tr>
                        <td class="py-1">
                          <img src="HomePage/assets/images/faces/user.png" alt="image" />
                          <?php echo $View['name']; ?>
                        </td>
                        <td> <?php echo $View['email']; ?> </td>
                        <td> <?php echo $View['code']; ?> </td>
                        <td>
                          <input type="hidden" name ="id_deleteStudent" value ="<?php echo $View['id']; ?>">
                            <button type="submit" name ="deleteUser" class="btn btn-danger btn-icon-text">
                              <i class="mdi mdi-delete btn-icon-prepend"></i> Delete </button>
                        </td>
                      </tr>
                      </form>
                   <?php } ?>

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