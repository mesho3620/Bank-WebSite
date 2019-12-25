<?php 
include("TopBar2.php");
?>
<!DOCTYPE html>
<html>
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
include("database.php");

if(isset($_POST['Submit'])) //check if form was submitted
{
	if(empty($_POST['chpw'])||empty($_POST['nationalid'])){
				echo"<script> alert('Fill the required ')</script>";
	}
	else if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/",$_POST['chpw']))
	{
			
		echo"<script> alert(' Password must be between 6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter');</script>";

	}
	else if(!preg_match("/^\d{14}$/",$_POST['nationalid']))		//validate a number of 10 digits with no comma, no spaces, no punctuation and there will be no + sign in front the number.
	{
		
		echo"<script> alert('Wrong National ID Format ')</script>";
		
	}
	else
	{
		$exists=false;
		$NationalIdSql="SELECT * FROM users where National_ID ='".$_POST['nationalid']."';";
		$Passwordsql="UPDATE users set Password='".$_POST['chpw']."'where National_ID=".$_POST['nationalid'];
		$result2=mysqli_query($conn,$Passwordsql);
		if(result2)
		{
			$_SESSION['Password']=$_POST['chpw'];
			header("Location:homePage.php");
		}
		if($result = mysqli_query($conn,$NationalIdSql))
		{
		
			if(mysqli_num_rows($result)>0)
			{
				$exists=TRUE;
				header("Location:homePage.php");
			}
			else
			{
						echo"<script> alert('National ID doesnt exist in our Website ')</script>";

			}
		}
	}
}
?>
<style>
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
<h1>Change Password</h1>
<br>
<form method="post">
<div class="form-group">
<input type="number" name="nationalid" style="margin:0.4%;" class="form-control" placeholder="National ID">
</div>
<div class="form-group">
<input type="password" name="chpw" style="margin:0.4%;" class="form-control" placeholder="New Password">
</div>
</div>
<input type="Submit" name="Submit" class="btn btn-default" style="margin-left:3%; margin:1%;">
</form>
</body>
</html>
<?php
include("BottomBar2.php");
?>