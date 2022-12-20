<?php

include_once "Connection.php";
include_once "DBclasses.php";
include_once "DBstudent.php";
include_once "DBsubject.php";




if(isset($_POST['submit3'])){

    $row =  $_POST['num_row'];

    $FullName = mysqli_real_escape_string($Connection, $_POST['fname']);


    for($i = 0; $i < $row; $i++){
        $Subject = mysqli_real_escape_string($Connection, $_POST[$i.'subject']);
        $Note = mysqli_real_escape_string($Connection, $_POST[$i.'notes']);

        $Sql_records = "INSERT INTO records(fullName, subject,	mark) VALUES ('$FullName', '$Subject', '$Note')";
        mysqli_query($Connection, $Sql_records);
    }

}


if(isset($_POST['deleteRecord'])){

    $NameDelete = mysqli_real_escape_string($Connection, $_POST['deleteName']);

    $Sql_deleteRecords = "DELETE FROM records WHERE fullName = '$NameDelete'";
    $query_deleteRecords = mysqli_query($Connection, $Sql_deleteRecords);
   if ($query_deleteRecords) {
    //C:\xampp\htdocs\Student Report Card Managment System\pages\Records\records.php
       header("location:../Records/records.php");
   }
}


?>