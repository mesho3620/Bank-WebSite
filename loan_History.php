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

ini_set('display_errors',0);
ini_set('track_errors',1);
ini_set('display_startup_errors',1);
ini_set('log_errors',1);
ini_set('error_log',dirname(__FILE__).'/log.txt');	
error_reporting(-1);
error_reporting(E_ALL | E_STRICT);

include "TopBar.php";
?>
<?php 
include ("database.php");

if(isset($_POST['Save']))
{ 


	
	try
	{
		if(empty($_POST['Id_tx'])||(empty($_POST['Salary_tx'])&&empty($_POST['Amount_tx'])))
		{
			throw new Exception(("Please fill the required data"));
		}
		else
		{
		$oldValuesSql="select * from request_loan WHERE Request_Number='".$_POST['Id_tx']."'" ;
		$result1=mysqli_query($conn,$oldValuesSql);
	
			if($result1)	
			{
				$row=mysqli_fetch_array($result1);			
				$oldAmount=$row['Amount'];
				$oldSalary=$row['Salary'];
				if($row['Loan_Status']!=='Waiting')
				{
					throw new Exception ("Request can only be modified while in waiting state.");
				}
			}
			else
			{
				throw new Exception ("data is not correct ");
			}	
		}

		if(empty($_POST['Salary_tx']))
		{
			$_POST['Salary_tx']=$oldSalary;
		}
		else if(empty($_POST['Amount_tx']))
		{
			$_POST['Amount_tx']=$oldAmount;
		}
		
		if($_POST['Amount_tx']>500000||$_POST['Amount_tx']<20000)
		{
			throw new AmountException($_POST['Amount_tx']);
		}
		if($_POST['Salary_tx']<0)
		{
			throw new AmountException($_POST['Salary_tx']);

		}
		
		$sql2="UPDATE request_loan SET Amount='".$_POST['Amount_tx']."' ,Loan_Status='".'Waiting'."', Salary='".$_POST['Salary_tx']."'WHERE Request_Number='".$_POST['Id_tx']."'AND Loan_Status = '".'Waiting'."'"; 
		
		$result=mysqli_query($conn,$sql2);
		
		if($result)	
		{
			$_SESSION['Amount']=$_POST['Amount_tx'];
			$_SESSION['Salary']=$_POST['Salary_tx'];		
			header("Location:loan_History.php");
		}
		else
		{
			echo "Edit Failed";
		}
	
	}
	catch (AmountException $e)
	{
		echo "<script>alert('".$e->errorMessage()."')</script>";
	}
	catch(Exception $e)
	{
		echo "<script>alert('".$e->getMessage()."')</script>";
	}
}

?>

<?php
class AmountException extends Exception {
  public function errorMessage() 
  {
    $errorMsg = $this->getMessage().' is not a valid Amount of money.';
    return $errorMsg;
  }
}
?>
<script>
$(document).ready(function (){
	$("#Edit").on('click',function(){
		$("#form").toggle();
	});
});
</script>



<style>
.in{
  border: none;
  padding: 2% 5%;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 85%;
}
#label{
	color:black;
	font-family:sans serif;
	font-size:120%;
}
</style>

<?php
include ("database.php");
$sql="SELECT * FROM request_loan where Email='".$_SESSION['Email']."'";
	$result = mysqli_query($conn,$sql);		
	if (mysqli_num_rows($result) > 0) {
	echo "<table class='table table-striped table-bordered' >";
	echo "<th>Loan ID</th>"."<th>Full Name</th>"."<th>Email</th>"."<th>NationalID</th>"."<th>HR letter</th>"."<th>Amount</th>"."<th>Salary</th>"."<th>Loan Status</th>";
	   
	   while($row = mysqli_fetch_array($result)) {
	   echo "<tr><td>".$row['Request_Number']."</td>".
	   "<td>".$row['FullName']."</td>".
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
    echo "ERROR";
	}
?>
<body>
<button class="btn btn-default" id = "Edit" style = "color: white;background-color: #212121 ; font-size: 20px; width:15%; margin:0.2%;" >Edit</button>


<form id="form" action = "loan_History.php" style = "display:none; margin:0.5%;" method="post">

<b id="label">Loan ID</b>
<br>
<input type="text" id="Id_tx" Name="Id_tx" style="display:block;  margin:0.3%;">
<br>



<b id="label">Amount</b>
<br>

<input  type="text" id="Amount_tx" Name="Amount_tx" style="display:block; margin:0.3%;">
<br>
<b id="label">Salary</b>
<br>

<input  type="text" id="Salary_tx" Name="Salary_tx" style="display:block; margin:0.3%;">
<br>
<input class="btn btn-default" type="Submit" style = "color: white;background-color: #212121 ; font-size: 20px; width:15%; margin:0.2%;" Value="Save" id="Save" Name="Save">

</form>
</body>
<?php
include "BottomBar2.php";
?>