<?php

include_once "Connection.php";
include_once "DBrecords.php";
include_once "DBstudent.php";
include_once "DBsubject.php";


if($Connection == true){

    if(isset($_POST['create'])){
       
        $Class = mysqli_real_escape_string($Connection, $_POST['class_name']);

        $Sql = "INSERT INTO classes(className) VALUES('$Class')";
        mysqli_query($Connection, $Sql); 
    }


    if(isset($_POST['classUpdate'])){
        
        $IDs = mysqli_real_escape_string($Connection, $_POST['ids']);
        $ClassEdit = mysqli_real_escape_string($Connection, $_POST['EditClass']);

        $Sql1 = "UPDATE classes SET className = '$ClassEdit' WHERE id = '$IDs'";
        $query_edit = mysqli_query($Connection, $Sql1); 

        if ($query_edit) {
            header("location:../Classes/classes.php");
        } 
        
        
    }


    if(isset($_POST['deleteClass'])){

        $ID2 = mysqli_real_escape_string($Connection, $_POST['id_delete']);

        $Sql_delete = "DELETE FROM classes WHERE id = '$ID2'";
        $query_delete = mysqli_query($Connection, $Sql_delete);
       if ($query_delete) {
           header("location:../Classes/classes.php");
       }
    }



}



?>