<?php

require_once "../Backend_Database/DBdetails.php";

if(isset($_POST['view'])){

    $New_Name = mysqli_real_escape_string($Connection, $_POST['new_name']);


    $Sql_Name_View = "SELECT DISTINCT fullName FROM records WHERE fullName = '$New_Name'";
    $Query_Name_view = mysqli_query($Connection, $Sql_Name_View);
    $Results_Name_view = mysqli_fetch_all($Query_Name_view, MYSQLI_ASSOC);

    $Sql_view = "SELECT * FROM students WHERE CONCAT(fname, ' ', lName) = '$New_Name'";
    $Query_view = mysqli_query($Connection, $Sql_view);
    $Results_view = mysqli_fetch_all($Query_view, MYSQLI_ASSOC);



    $Sql_Name_View2 = "SELECT * FROM records WHERE fullName = '$New_Name'";
    $Query_Name_view2 = mysqli_query($Connection, $Sql_Name_View2);
    $Results_Name_view2 = mysqli_fetch_all($Query_Name_view2, MYSQLI_ASSOC);




$Sql_display1 = "SELECT  SUM(mark), AVG(mark) FROM records WHERE fullName = '$New_Name'";
$Query_display1 = mysqli_query($Connection, $Sql_display1);
$Result_display1 = mysqli_fetch_all($Query_display1, MYSQLI_ASSOC);


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Student Detail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <div class="main-body">
    

    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="../../assets/images/faces/user.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                        <?php foreach($Results_Name_view as $View_Name){  ?>
                      <h4><?php echo  $View_Name['fullName']; ?></h4>
                         <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <?php foreach($Result_display1 as $Display){  ?>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Total</h6>
                    <span class="text-secondary"><?php echo $Display['SUM(mark)'] ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Average</h6>
                    <span class="text-secondary"><?php echo $Display['AVG(mark)']; ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Comment</h6>
                    <?php if($Display['AVG(mark)'] < 12) {   ?>
                    <span class="text-secondary"><b class="text-danger">Failed</b></span>
                    <?php } else {  ?>
                        <span class="text-secondary"><b class="text-success">Passed</b></span>
                    <?php } ?>    
                  </li>
                </ul>
                <?php } ?>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
          <?php foreach( $Results_Name_view as $View_Name){  ?>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo  $View_Name['fullName']; ?>
                    </div>
                  </div>
          <?php } ?>        
                  <hr>
                  <?php foreach( (array) $Results_view as $View){  ?>  
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Class</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo  $View['studentClass']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date of Birth</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo  $View['dateOfBirth']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Age</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo  $View['age']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo  $View['gender']; ?>
                    </div>
                  </div>
                  <hr>
              <?php } ?>    
                  <div class="row">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-danger" onclick="window.print()">Print</button>
                    </div>
                  </div>
                </div>
              </div>

                <div class="col-sm-12">
                  <div class="card h-100">
                    <div class="card-body">
                     <table class="table table-hover">
                       <thead>
                           <th>Subjects</th>
                           <th>Marks</th>
                       </thead>
                       <tbody>
                        <?php foreach($Results_Name_view2 as $Marks_View){  ?>
                            <tr>
                              <td><?php echo $Marks_View['subject']; ?></td>
                              <td><?php echo $Marks_View['mark']; ?></td>
                            </tr>
                        <?php } ?>
                       </tbody>
                     </table>
                    </div>
                  </div>
                </div>
              </div>



            </div>
          </div>

        </div>
    </div>

<style type="text/css">
body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #f2edf3;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

</style>

<script type="text/javascript">

</script>
</body>
</html>