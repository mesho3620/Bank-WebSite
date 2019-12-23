<?php
ini_set('display_errors',0);
ini_set('track_errors',1);
ini_set('display_startup_errors',1);
ini_set('log_errors',1);
ini_set('error_log',dirname(__FILE__).'/log.txt');	
error_reporting(-1);
error_reporting(E_ALL | E_STRICT);


include "database.php";


$sql="UPDATE request_loan set Loan_Status='Reject'";
$result=mysqli_query($conn,$sql);
header("Location:displayLoan.php");


?>