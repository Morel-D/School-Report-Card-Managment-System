<?php


include 'Classes/PHPExcel.php';
include_once 'Classes/PHPExcel/IOFactory.php';

include_once "Connection.php";
include_once "DBclasses.php";
include_once "DBstudent.php";
include_once "DBsubject.php";
include_once "DBrecords.php";

if($Connection == true){


    if(isset($_POST['upload']) && isset($_FILES['files'])) {

    

        $File_temp = $_FILES['files']['tmp_name'];
        $ExcelData = PHPExcel_IOFactory :: load($File_temp);
       
        foreach($ExcelData ->getWorksheetIterator() as $Worksheet) {
            $highest_Row = $Worksheet->getHighestRow();
       
            for ($row=0; $row < $highest_Row; $row++) { 
                // $No = $Worksheet->getCellByColumnAndRow(0, $row)->getValue();
                 $Names = $Worksheet->getCellByColumnAndRow(1, $row)->getValue();
                 $Sub1 = $Worksheet->getCellByColumnAndRow(2, $row)->getValue();
                 $Sub2 = $Worksheet->getCellByColumnAndRow(3, $row)->getValue();
                 $Sub3 = $Worksheet->getCellByColumnAndRow(4, $row)->getValue();
                 $Sub4 = $Worksheet->getCellByColumnAndRow(5, $row)->getValue();
                 $Sub5 = $Worksheet->getCellByColumnAndRow(6, $row)->getValue();
                 $Sub6 = $Worksheet->getCellByColumnAndRow(7, $row)->getValue();
                 $Sub7 = $Worksheet->getCellByColumnAndRow(8, $row)->getValue();
                 $Sub8 = $Worksheet->getCellByColumnAndRow(9, $row)->getValue();
                 $Sub9 = $Worksheet->getCellByColumnAndRow(10, $row)->getValue();
                 $Sub10 = $Worksheet->getCellByColumnAndRow(11, $row)->getValue();
                 $Sub11 = $Worksheet->getCellByColumnAndRow(12, $row)->getValue();
                 //$Total = $Worksheet->getCellByColumnAndRow(13, $row)->getValue();
                 //$Average = $Worksheet->getCellByColumnAndRow(13, $row)->getValue();

                 $New_Total = $Sub1 + $Sub2 + $Sub3 + $Sub4 + $Sub5 + $Sub6 + $Sub7 + $Sub8 + $Sub9 + $Sub10 + $Sub11;
                 $New_Avg = $New_Total/11;
       
                 $SqlExcel = "INSERT INTO import_marks( names, sub1, sub2, sub3, sub4, sub5, sub6, sub7, sub8, sub9, sub10, sub11, total, average) VALUES('$Names', '$Sub1', '$Sub2', '$Sub3', '$Sub4', '$Sub5', '$Sub6', '$Sub7', '$Sub8', '$Sub9', '$Sub10', '$Sub11', '$New_Total', '$New_Avg')";
                 $queryExcel = mysqli_query($Connection, $SqlExcel);
       
       
            }
        }

       // $exName = mysqli_real_escape_string($Connection, $_POST['ex_fname']);
       // $exDOB = mysqli_real_escape_string($Connection, $_POST['ex_date_of_birth']);
       // $exAge = mysqli_real_escape_string($Connection, $_POST['ex_age']);
       // $exGender = mysqli_real_escape_string($Connection, $_POST['ex_gender']);
       // $exStuClassName = mysqli_real_escape_string($Connection, $_POST['ex_student_class_name']);
       // $FileName = mysqli_real_escape_string($Connection, $_FILES['files']['name']);
//
       // $sqlInfo = "INSERT INTO import_info(name, class, dateOfBirth, age, gender, fileName) VALUES('$exName', '$exStuClassName', '$exDOB', '$exAge', '$exGender', '$FileName')";
       // mysqli_query($Connection, $sqlInfo);
    }




    if(isset($_POST['deleteSheet'])){

        $NameDelete = mysqli_real_escape_string($Connection, $_POST['id']);
    
        //$Sql_deleteExcel = "DELETE FROM import_info WHERE name = '$NameDelete'";
        $Sql_deleteExcel2 = "DELETE FROM import_marks WHERE names = '$NameDelete'";

        if( mysqli_query($Connection, $Sql_deleteExcel2)){
            header("location:../Excel/excel.php");
            //C:\xampp\htdocs\Student Report Card Managment System\HomePage\pages\Excel\excel.php
        }

    }





}else {
    echo "Connection failed";
}





?>