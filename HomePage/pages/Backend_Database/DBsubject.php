<?php

include_once "Connection.php";
include_once "DBclasses.php";
include_once "DBrecords.php";
include_once "DBstudent.php";

if($Connection == true){

    if(isset($_POST['create1'])){

        $Sub_CName = mysqli_real_escape_string($Connection, $_POST['subject_class_name']);
        $Subject_Name = mysqli_real_escape_string($Connection, $_POST['subject_name']);

        $Sql1 = "INSERT INTO subjects(subjectName, subjectClassName) VALUES('$Subject_Name', '$Sub_CName')";
        mysqli_query($Connection, $Sql1);
        

    }

    if(isset($_POST['subjectUpdate'])){

        $IDSubject = mysqli_real_escape_string($Connection, $_POST['idSubject']);
        $SubjectEdit = mysqli_real_escape_string($Connection, $_POST['EditSubject']);
        $Subject_ClassName_Edit = mysqli_real_escape_string($Connection, $_POST['Edit_subjectClassName']);

        $Sql1 = "UPDATE subjects SET subjectName = '$SubjectEdit', subjectClassName = '$Subject_ClassName_Edit'  WHERE id = '$IDSubject'";
        $query_edit = mysqli_query($Connection, $Sql1); 

        if ($query_edit) {
            header("location:../Subject/subject.php");
        } 
        

    }



    if(isset($_POST['deleteSubject'])){

        $ID3 = mysqli_real_escape_string($Connection, $_POST['id_delete']);

        $Sql_deleteSubject = "DELETE FROM subjects WHERE id = '$ID3'";
        $query_deleteSubject = mysqli_query($Connection, $Sql_deleteSubject);
       if ($query_deleteSubject) {
           header("location:../Subject/subject.php");
       }
    }


}





?>