<?php

define('DB_NAME', 'localhost');
define('DB_SERVER', 'root');
define('DB_PASSWORD', '');
define('DB_DBNAME', 'report_card');

$Connection = mysqli_connect(DB_NAME, DB_SERVER, DB_PASSWORD, DB_DBNAME);

// if($Connection == true){
//     echo "Connection success";
// }else {
//     echo "Connection failed";
// }




?>