<?php

//define('DB_NAME', 'localhost');
//define('DB_SERVER', 'root');
//define('DB_PASSWORD', '');
//define('DB_DBNAME', 'report_card');
//
//$connection = mysqli_connect(DB_NAME, DB_SERVER, DB_PASSWORD, DB_DBNAME);

//C:\xampp\htdocs\Student Report Card Managment System\HomePage\pages\Backend_Database\Connection.php


include_once "HomePage/pages/Backend_Database/Connection.php";

session_start();

// Register ..........................
if (isset($_POST['register'])) {
	
	$Name = mysqli_real_escape_string($Connection, $_POST['user_name']);
	$Email = mysqli_real_escape_string($Connection, $_POST['user_email']);
	$Random_Num = rand(1000, 9999);


	
		$sql = "INSERT INTO login(name, email, code) VALUES('$Name', '$Email', '$Random_Num')"; 
		$query = mysqli_query($Connection, $sql);

		if($query){
			echo '<script>alert("Registration Successful")</script>';
		}else {
			echo '<script>alert("Registration Failed")</script>';
		}
        
            
    //    }


	}

// .................................



// Send code request ......................................

use PHPMailer\PHPMailer\PHPMailer;

    function sendmail(){

		$Connection = mysqli_connect('localhost', 'root', '', 'report_card');


		$ReEmail = mysqli_real_escape_string($Connection, $_POST['re_email']);

		$SqlCode = "SELECT * FROM login WHERE email = '$ReEmail'";
		$QueryCode = mysqli_query($Connection, $SqlCode);
		$ResultCode = mysqli_fetch_all($QueryCode, MYSQLI_ASSOC);

		foreach($ResultCode as $Code){

			$Code_email = $Code['email'];

		if($ReEmail == $Code_email){

        $name = "SCHOOL MANAGMENT SYSTEM";  // Name of your website or yours
        $to = $Code['email'];  // mail of reciever
        $subject = "Access Code for ".$Code['name']." ";
        $body = "Thank you for using our web app. The access code is <b>".$Code['code']."</b>";
        $from = "tchaptche.morel@ictuniversity.org";  // you mail
        $password = "Screaming467.9";  // your mail password

        // Ignore from here

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
        $mail = new PHPMailer();

        // To Here

        //SMTP Settings
        $mail->isSMTP();
        // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging                          
        $mail->Host = "smtp.gmail.com"; // smtp address of your email
        $mail->SMTPAuth = true;
        $mail->Username = $from;
        $mail->Password = $password;
        $mail->Port = 587;  // port
        //$mail->SMTPSecure = "tls";  // tls or ssl
        $mail->smtpConnect([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
        ]);

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($from, $name);
        $mail->addAddress($to); // enter email address whom you want to send
        $mail->Subject = ("$subject");
        $mail->Body = $body;
        if ($mail->send()) {
            echo '<script>alert("Request Send !!")</script>';
        } else {
            echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
		}	

		else {
			echo '<script>alert("Email not recognised by the system")</script>';
		}

     
    }

}

if(isset($_POST['send'])){

	sendmail();

}




// .........................................................







// Login .................



if (isset($_POST['login'])) {

	$Email = mysqli_real_escape_string($Connection, $_POST['email']);
	$Code = mysqli_real_escape_string($Connection, $_POST['code']);

	$sql_auth = "SELECT * FROM login WHERE code = '$Code'";
	$query_auth  = mysqli_query($Connection, $sql_auth);
	$result_auth = mysqli_fetch_all($query_auth, MYSQLI_ASSOC);

	foreach($result_auth as $Auth){

		$Auth_Email = $Auth['email'];
		$Auth_Code = $Auth['code'];


     
	     if ($Email == $Auth_Email && $Code == $Auth_Code) {
	     	$_SESSION['name'] = $Auth['name'];
	     	header("location: HomePage/index.php");
	     }else {
			echo "No !!";
		 }
	}

	}





// .......................





// Delete user 

if(isset($_POST['deleteUser'])){
	$IDUser = mysqli_real_escape_string($Connection, $_POST['id_deleteStudent']);

	$Delete_sql = "DELETE FROM login WHERE id = '$IDUser'";
	$Delete_query = mysqli_query($Connection, $Delete_sql);
}



?>