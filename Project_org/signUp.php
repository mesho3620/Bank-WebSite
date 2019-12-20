<!DOCTYPE>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script></head>
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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loanproject";

$conn = new mysqli($servername, $username, $password, $dbname);


$emailError="";

if(isset($_POST['Submit'])){ //check if form was submitted
	$_POST['FirstName']=filter_var($_POST['FirstName'], FILTER_SANITIZE_STRING);
	$_POST['LastName']=filter_var($_POST['LastName'], FILTER_SANITIZE_STRING);
	$_POST['Email']=filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
	$_POST['Address']=filter_var($_POST['Address'], FILTER_SANITIZE_STRING);
	$_POST['Job']=filter_var($_POST['Job'], FILTER_SANITIZE_STRING);

	try
	{
		$email=$_POST['Email'];
		if(empty($_POST['FirstName'])||empty($_POST['LastName'])||empty($_POST['Email'])||empty($_POST['Password'])||empty($_POST['ConfirmPassword'])||empty($_POST['MobilePhone'])||empty($_POST['NationalID'])||empty($_POST['Address'])||empty($_POST['Job']))
		{
			throw new Exception("Please fill the required data");
		}
		
		if(strlen($_POST['FirstName'])<3||strlen($_POST['FirstName'])>15)
		{
		
			throw new NameException($_POST['FirstName']);
		}
		if(strlen($_POST['LastName'])<3||strlen($_POST['LastName'])>15)
		{
			
			throw new NameException($_POST['LastName']);
			
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			throw new EmailException(email);
		}
		if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/",$_POST['Password']))
		{
				
			throw new Exception(" Password must be between 6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter");

		}
		if($_POST['Password']!=$_POST['ConfirmPassword'])
		{
				
			throw new Exception ("Password do not match ");
				
		}
		if(!preg_match("/^\d{11}$/",$_POST['MobilePhone']))
		{
			
			throw new Exception("wrong mobile number ");
			
		}
		if(!preg_match("/^\d{14}$/",$_POST['NationalID']))		//validate a number of 10 digits with no comma, no spaces, no punctuation and there will be no + sign in front the number.
		{
			
			throw new Exception ("wrong National ID format");
			
		}
		
		$exists=FALSE;
		$sqlErr=FALSE;
		
		$MobileSql="SELECT * FROM users where Mobile_Phone ='".$_POST['MobilePhone']."';";
		$NationalIdSql="SELECT * FROM users where National_ID ='".$_POST['NationalID']."';";

		

		if($result = mysqli_query($conn,$MobileSql))
		{
		
			if(mysqli_num_rows($result)>0)
			{

				$exists=TRUE;
				throw new Exception("Mobile number already exists");

			}
			else
			{
				
				if($result = mysqli_query($conn,$NationalIdSql))
				{
		
					if(mysqli_num_rows($result)>0)
					{
				
						$exists=TRUE;
						throw new Exception("National ID already exists");

					}
					
				}
				else
				{
					$sqlErr=TRUE;
					echo"<h1 style='background-color:white'> alert('ERROR: Could not be able to exectute $NationalIdSql." . mysqli_error($conn)."');</h1>";
				}
				
				
			}

		}
		else
		{
		
			$sqlErr=TRUE;
			echo"<h1 style='background-color:white'> alert('ERROR: Could not be able to exectute $MobileSql." . mysqli_error($conn)."');</h1>";
		
		}

		if(!$sqlErr&&!$exists)
		{
		
			$sql="INSERT INTO users (FirstName,LastName,Email,Mobile_Phone,National_ID, Address, Job,Password,Status) 
			values ('".$_POST['FirstName']."','".$_POST['LastName']."','".$_POST['Email']."','".$_POST['MobilePhone']."','".$_POST['NationalID']."','".$_POST['Address']."','".$_POST['Job']."','".$_POST['Password']."','Client')";
			echo $sql;
		
			$result=mysqli_query($conn,$sql);
			if($result)	
			{
				header("Location:homePage.php");
			}
			else
			{
				echo $sql;
			}
		}
	
		
	}
	catch (EmailException $e)
	{
		echo $e->errorMessage();
	}
	catch(NameException $e)
	{
		echo $e->errorMessage();
	}
	catch(Exception $e)
	{
		echo $e->getMessage();
	}
	
	
	
	
}

?>

<?php

class NameException extends Exception {
  public function errorMessage() 
  {
    $errorMsg = $this->getMessage().'\'s Name length is invalid.';
    return $errorMsg;
  }
}


class EmailException extends Exception {
  public function errorMessage() 
  {
    $errorMsg = $this->getMessage().' is not a valid E-Mail address.';
    return $errorMsg;
  }
}

?>

<style>
#myform{
	
	color:white;
	width:25%;
	heigth:25%;
	margin-left:35%;
	border-style:solid;
	border-color:black;
	border-width:thin;
	padding:1%;
	background-color:f4f7f8;
	color:black;
}

input[type=text] {
  background-color: e8eeef;
  border:hidden;
  height:5%;
}
input[type=number] {
  background-color: e8eeef;
  border:hidden;
  height:5%;
}

input[type=password] {
  background-color: e8eeef;
  border:hidden;
  height:5%;
}

#elements{
	   font-style: oblique;
}
.bground
{
	background:url(Pictures&Videos/black-and-white-laptop-2740956.jpg) no-repeat center fixed;
	background-size:cover;
}

</style>

	<script>
	
		$(document).ready(function()
		{
		
			$("#ConfirmPassword").keyup(function()
			{
			
				if($("#Password").val() != $("#ConfirmPassword").val())	
				{
				
					$("#msg").html("Password do not match").css("color","red");
				
				}
			
				else
				{
				
					$("#msg").html("Password Match").css("color","green");
				
				}
			
			});
			
		});
	
	</script>

<body class="bground">
<form method="post" id="myform" name="myform">
<h1 style="text-align:center">Sign Up</h1>

<h3>Your basic info</h3>

<b id="elements">Name:</b>
<br>
<br>
<input type="text" name="FirstName" placeholder="First Name" style="width:100%;"> 
<br><br>
<input type="text" name="LastName" placeholder="Last Name"style="width:100%;">

<br><br>

<b id="elements">Email:</b>
<br>
<br>
<input type="text" name="Email" placeholder="Email" style="width:100%" id="textField">

<br><br>

<b id="elements">Password:</b>
<br>
<br>
<input type="Password" name="Password" id="Password" placeholder="Password" style="width:100%">

<br><br>

<b id="elements">Confirm Password:</b>
<br>
<br>
<input type="Password" name="ConfirmPassword" id="ConfirmPassword" placeholder="Confirm Password" style="width:100%">
<div id="msg"></div>
<br><br>
<h3>Your personal info</h3>	

<b id="elements">Mobile Phone:</b>
<br>
<br>
<input type="number" name="MobilePhone" placeholder="Mobile" style="width:100%">

<br><br>

<b id="elements">National ID:</b>
<br>
<br>
<input type="number" name="NationalID" placeholder="National ID" style="width:100%">

<br><br>

<b id="elements">Address:</b>
<br>
<br>
<input type="text" name="Address" placeholder="Address" style="width:100%">

<br><br>

<b id="elements">Job:</b>
<br>
<br>
<input type="text" name="Job" placeholder="Job" style="width:100%">

<br><br>

<input type="Reset" style="background-color:orange; border:none; cursor:pointer;">

<br><br>

<input type="Submit" name="Submit" style="background-color:orange; border:none;width:100%; height:5%; cursor:pointer;" Value="Sign Up">

<br><br>
<?php echo $emailError; ?>


</form>

</body>

<?php
include "BottomBar.php";
?>
</html>