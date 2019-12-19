<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<title>First National Bank - Loan Status</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="Pictures&Videos\Untitled-1.png"/>
</head>
<?php
include "TopBar.php";
?>
<?php
include ("database.php");

$sql="SELECT * FROM request_loan where Email='".$_SESSION['Email']."'";
	$result = mysqli_query($conn,$sql);		
	if (mysqli_num_rows($result) > 0) {
	echo "<table class='table table-hover'>";
	echo "<th>Full Name</th>"."<th>Email</th>"."<th>NationalID</th>"."<th>HR letter</th>"."<th>Amount</th>"."<th>Salary</th>"."<th>Loan Status</th>";
	   
	   while($row = mysqli_fetch_array($result)) {
	   echo "<tr><td>".$row['FullName']."</td>".
	   "<td>".$row['Email']."</td>".
	   "<td>".$row['National_ID']."</td>".
	   "<td>".$row['HR_letter']."</td>".
	   "<td>".$row['Amount']."</td>".
	   "<td>".$row['Salary']."</td>".
	   "<td>".$row['Loan_Status']."</td></tr>";
		
	   }
	   
	   echo "</table>";
	}
	else {
    echo "0 results";
	}
?>
<?php
include "BottomBar.php";
?>



