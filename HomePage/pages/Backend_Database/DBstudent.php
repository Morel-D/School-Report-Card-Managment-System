<?php

include_once "Connection.php";
include_once "DBclasses.php";
include_once "DBrecords.php";
include_once "DBsubject.php";

if($Connection == true ){

    if(isset($_POST['create2'])){

        $FirstName = mysqli_real_escape_string($Connection, $_POST['first_name']);
        $LastName = mysqli_real_escape_string($Connection, $_POST['last_name']);
        $DateOfBirth = mysqli_real_escape_string($Connection, $_POST['date_of_birth']);
        $Age = mysqli_real_escape_string($Connection, $_POST['age']);
        $Gender = mysqli_real_escape_string($Connection, $_POST['gender']);
        $Student_CName = mysqli_real_escape_string($Connection, $_POST['student_class_name']);

        $Sql = "INSERT INTO students(fName, lName, studentClass, dateOfBirth, age, gender) VALUES('$FirstName', '$LastName', '$Student_CName', '$DateOfBirth', '$Age', '$Gender')";
        mysqli_query($Connection, $Sql);


    }


    if(isset($_POST['studentUpdate'])){

        $IDStudent = mysqli_real_escape_string($Connection, $_POST['studentID']);
        $New_FName = mysqli_real_escape_string($Connection, $_POST['EditFName']);
        $New_LName = mysqli_real_escape_string($Connection, $_POST['EditLName']);
        $New_DateOfBirth = mysqli_real_escape_string($Connection, $_POST['EditDateOfBirth']);
        $New_Age = mysqli_real_escape_string($Connection, $_POST['EditAge']);
        $New_Gender = mysqli_real_escape_string($Connection, $_POST['EditGender']);
        $New_Student_CName = mysqli_real_escape_string($Connection, $_POST['Editstudent_class_name']);


        $Sql2 = "UPDATE students SET fName = '$New_FName', lName = '$New_LName', studentClass = '$New_Student_CName', dateOfBirth = '$New_DateOfBirth',  age = '$New_Age', gender = '$New_Gender' WHERE id = '$IDStudent'";
        $query_edit1 = mysqli_query($Connection, $Sql2); 

        if ($query_edit1) {
            //C:\xampp\htdocs\Student Report Card Managment System\pages\Student\student.php
            header("location:../Student/student.php");
        } 
        

    }


    
    if(isset($_POST['deleteStudent'])){

        $ID4 = mysqli_real_escape_string($Connection, $_POST['id_deleteStudent']);

        $Sql_deleteStudent = "DELETE FROM students WHERE id = '$ID4'";
        $query_deleteStudent = mysqli_query($Connection, $Sql_deleteStudent);
       if ($query_deleteStudent) {
           header("location:../Student/student.php");
       }
    }




}

?>