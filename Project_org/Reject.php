<?php
include "database.php";


$sql="UPDATE request_loan set Loan_Status='Reject'";
$result=mysqli_query($conn,$sql);
header("Location:displayLoan.php");


?>