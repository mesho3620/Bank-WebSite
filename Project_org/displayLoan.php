<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<?php
include "TopBar.php";
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?php

include ("database.php");

$sql="SELECT * FROM request_loan";
$result=mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
	
	
	echo "<table class='table table-bordered table-hover'>";
	echo "<th>Full Name</th>"."<th>Email</th>"."<th>NationalID</th>"."<th>NationalID Photo</th>".
	"<th>HR letter</th>"."<th>Amount</th>"."<th>Salary</th>"."<th>Loan ID</th>"."<th>Loan Status</th>";
    while($row = mysqli_fetch_array($result)) {
			
    echo "<tr>".
	"<td>". $row["FullName"]."</td>".
	"<td>".$row["Email"]."</td>".
	"<td>".$row["National_ID"]."</td>".
	"<td><img class='img-rounded' src='NationalIDs/".$row["National_ID_Photo"]."'width=25%; heigth=25%;>"."</td>".
	"<td>".$row["HR_letter"]."</td>".
	"<td>". $row["Amount"]."</td>".
	"<td>". $row["Salary"]."</td>".
	"<td>".$row["Request_Number"]."</td>".
	"<td>".$row["Loan_Status"]."</td>";	
    }
	echo "</table>";
	} 
	else {
		
    echo "0 results";
	
	}
	if(isset($_POST['Update']))
	{
		$Acc=$_POST['Accept_tx'];
		$Rej=$_POST['Reject_tx'];
		$Wait=$_POST['Waiting_tx'];
		
		$_POST['Accept_tx']=filter_var($_POST['Accept_tx'], FILTER_SANITIZE_NUMBER_INT);
		$_POST['Reject_tx']=filter_var($_POST['Reject_tx'], FILTER_SANITIZE_NUMBER_INT);
		$_POST['Waiting_tx']=filter_var($_POST['Waiting_tx'], FILTER_SANITIZE_NUMBER_INT);

		
		try
		{
			if(empty($Acc)&&empty($Rej)&&empty($Wait))
			{
				throw new Exception("No Status was filled");
			}
			if($Acc<0||$Rej<0||$Wait<0)
			{
				throw new Exception("IDs cant be negative numbers");

			}
			
			$sql2="UPDATE request_loan set Loan_Status='Accept' where Request_Number= ".$_POST['Accept_tx'];
			$result=mysqli_query($conn,$sql2);
		
			$sql3="UPDATE request_loan set Loan_Status='Reject' where Request_Number= ".$_POST['Reject_tx'];
			$result=mysqli_query($conn,$sql3);

			$sql4="UPDATE request_loan set Loan_Status='Waiting' where Request_Number= ".$_POST['Waiting_tx'];
			$result=mysqli_query($conn,$sql4);
		
			header("Location:displayLoan.php");
			
		}
		catch (Exception $e)
		{
		echo "<script>alert('".$e->getMessage()."')</script>";
		}
			
		
	}
	
?>


<style>
th{
	text-align:center;
}
td{
	text-align:center;
}
.form
{
	margin:2%;
	margin-top:3%;
}

.form-group
{
		width:80%;
}
</style>
<body>
<div class="form">
<h1>Application Form</h1>
<br>
<form method='post'>

<div class="form-group">
	<b>Accept</b>
	<input type='Number' name='Accept_tx' class="form-control">
</div>
<div class="form-group">	
	<b>Reject</b>
	<input type='Number' name='Reject_tx'class="form-control">
</div>
<div class="form-group">		
	<b>Waiting</b>
	<input type='Number' name='Waiting_tx'class="form-control">	
</div>	
	<input type='Submit' value='Submit' Name='Update' class="btn btn-default">
	</div>
	
</form>

</body>
<?php 
include("BottomBar2.php");