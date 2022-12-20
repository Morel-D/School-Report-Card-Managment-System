<?php

//require_once "../Backend_Database/DBdetails.php";
include_once "../Backend_Database/DBexcel.php";

session_start();

if(isset($_GET['id'])){


  $URLID = mysqli_real_escape_string($Connection, $_GET['id']);
//
   $SqlInfo = "SELECT * FROM  import_marks WHERE id = '$URLID'";
   $QueryInfo = mysqli_query($Connection, $SqlInfo);
   $ResultsInfo = mysqli_fetch_all($QueryInfo, MYSQLI_ASSOC);



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
    <?php   foreach($ResultsInfo as $Info){  ?>                   
                      <h4><?php echo $Info['names']; ?></h4>
                      <?php } ?>                     
                         
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
              <?php foreach($ResultsInfo as $Marks){  ?> 
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Total</h6>
                    <span class="text-secondary"><?php echo $Marks['total']; ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Average</h6>
                    <span class="text-secondary"><?php echo $Marks['average']; ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Comment</h6>
                    <?php if($Marks['average'] < 12) {   ?>
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

                <table class="table">
                  <thead>
                    <tr>
                      <th>Subject</th>
                      <th>Marks</th>
                    </tr>
                  </thead>
                  <tbody>
               <?php foreach((array) $ResultsInfo as $Info){  ?>
                     <tr>
                      <td>Mathematics</td> 
                      <td><?php echo $Info['sub1']; ?></td>
                      </tr>
                      <tr>
                      <td>English</td> 
                      <td><?php echo $Info['sub2']; ?></td>
                      </tr>
                      <tr>
                      <td>French</td> 
                      <td><?php echo $Info['sub3']; ?></td>
                      </tr>
                      <tr>
                      <td>Physics</td> 
                      <td><?php echo $Info['sub4']; ?></td>
                      </tr>
                      <tr>
                      <td>Chemistry</td> 
                      <td><?php echo $Info['sub5']; ?></td>
                      </tr>
                      <tr>
                      <td>Biology</td> 
                      <td><?php echo $Info['sub6']; ?></td>
                      </tr>
                      <tr>
                      <td>Geography</td> 
                      <td><?php echo $Info['sub7']; ?></td>
                      </tr>
                      <tr>
                      <td>Logic</td> 
                      <td><?php echo $Info['sub8']; ?></td>
                      </tr>
                      <tr>
                      <td>Citizenship</td> 
                      <td><?php echo $Info['sub9']; ?></td>
                      </tr>
                      <tr>
                      <td>Economics</td> 
                      <td><?php echo $Info['sub10']; ?></td>
                      </tr>
                      <tr>
                      <td>Commerce</td> 
                      <td><?php echo $Info['sub11']; ?></td>
                      </tr>
               <?php } ?>       
                   </tbody>
                </table>
               
                  <div class="row">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-danger" onclick="window.print()">Print</button>
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