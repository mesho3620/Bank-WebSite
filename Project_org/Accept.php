<?php
include "database.php";

session_start();

$sql="UPDATE request_loan set Loan_Status='Accept' where Request_Number= ".$_SESSION['Accept_value'];
$result=mysqli_query($conn,$sql);
header("Location:displayLoan.php");


?>