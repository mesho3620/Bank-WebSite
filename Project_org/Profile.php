
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?php
include "TopBar.php";
?>

<?php

include ("database.php");

if(isset($_POST['Save'])){ 

	$_POST['FirstName_tx']=filter_var($_POST['FirstName_tx'], FILTER_SANITIZE_STRING);
	$_POST['LastName_tx']=filter_var($_POST['LastName_tx'], FILTER_SANITIZE_STRING);
	$_POST['Email_tx']=filter_var($_POST['Email_tx'], FILTER_SANITIZE_EMAIL);
	$_POST['Address_tx']=filter_var($_POST['Address_tx'], FILTER_SANITIZE_STRING);
	$_POST['Job_tx']=filter_var($_POST['Job_tx'], FILTER_SANITIZE_STRING);
	
	try
	{
		$email=$_POST['Email_tx'];
		if(empty($_POST['FirstName_tx'])||empty($_POST['LastName_tx'])||empty($_POST['Email_tx'])||empty($_POST['MobilePhone_tx'])||empty($_POST['NationalID_tx'])||empty($_POST['Address_tx'])||empty($_POST['Job_tx']))
		{
			throw new Exception("Data cant be left empty");
		}
		
		if(strlen($_POST['FirstName_tx'])<3||strlen($_POST['FirstName_tx'])>15)
		{
		
			throw new NameException($_POST['FirstName_tx']);
		}
		if(strlen($_POST['LastName_tx'])<3||strlen($_POST['LastName_tx'])>15)
		{
			
			throw new NameException($_POST['LastName_tx']);
			
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 									//***********************************
		{
			throw new EmailException(email);
		}
		if(!preg_match("/^\d{11}$/",$_POST['MobilePhone_tx']))									//***********************************
		{
			
			throw new Exception("wrong mobile number ");
			
		}
		if(!preg_match("/^\d{14}$/",$_POST['NationalID_tx']))		//validate a number of 10 digits with no comma, no spaces, no punctuation and there will be no + sign in front the number.
		{
			
			throw new Exception ("wrong National ID format");
			
		}
		
		$exists=FALSE;
		$sqlErr=FALSE;
		
		$MobileSql="SELECT * FROM users where Mobile_Phone ='".$_POST['MobilePhone_tx']."';";
		$NationalIdSql="SELECT * FROM users where National_ID ='".$_POST['NationalID_tx']."';";

		

		if($result = mysqli_query($conn,$MobileSql))
		{
		
			if(mysqli_num_rows($result)>0)
			{

				$exists=TRUE;
				throw new Exception("Mobile number already exists");

			}
		}					
		else
		{
		
			$sqlErr=TRUE;
			throw new SqlException($MobileSql);
		}
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
			throw new SqlException($NationalIdSql);
		}
		
		$sql="UPDATE users set FirstName='".$_POST['FirstName_tx']."' , LastName='".$_POST['LastName_tx']."' , Email='".$_POST['Email_tx']."' , Mobile_Phone='".$_POST['MobilePhone_tx']."' , National_ID='".$_POST['NationalID_tx']."' , Job='".$_POST['Job_tx']."' , Address='".$_POST['Address_tx']."'where User_ID=".$_SESSION['ID']; 
		
		$result=mysqli_query($conn,$sql);
		
		if($result)	
		{
			$_SESSION["FullName"]=$_POST['FirstName_tx']." ".$_POST['LastName_tx'];
			$_SESSION['FirstName']=$_POST['FirstName_tx'];
			$_SESSION['LastName']=$_POST['LastName_tx'];
			$_SESSION['Email']=$_POST['Email_tx'];
			$_SESSION['MobilePhone']=$_POST['MobilePhone_tx'];
			$_SESSION['NationalID']=$_POST['NationalID_tx'];
			$_SESSION['Job']=$_POST['Job_tx'];
			$_SESSION['Address']=$_POST['Address_tx'];
			
			header("Location:Profile.php");
		}
		else
		{
			throw new Exception("could not Update Data");
		}
	
	}
	catch(SqlException $e)
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

class SqlException extends Exception {
  public function errorMessage() 
  {
	$errorMsg="ERROR: Could not be able to exectute." .$this->getMessage(). mysqli_error($conn);
    return $errorMsg;
  }
}

?>




<script>
$(document).ready(function (){
$("#FullName_button").on('click',function(){
$("#FirstName_tx").toggle();
$("#LastName_tx").toggle();
});
$("#Email_button").on('click',function(){
$("#Email_tx").toggle();
});
$("#Password_button").on('click',function(){
$("#Password_tx").toggle();
});
$("#MobilePhone_button").on('click',function(){
$("#MobilePhone_tx").toggle();
});
$("#Address_button").on('click',function(){
$("#Address_tx").toggle();
});
$("#Job_button").on('click',function(){
$("#Job_tx").toggle();
});
$("#NationalID_button").on('click',function(){
$("#NationalID_tx").toggle();
});
$("#Reset").on('click',function(){
$("#FirstName_tx").hide();
$("#LastName_tx").hide();
$("#Email_tx").hide();
$("#Password_tx").hide();
$("#MobilePhone_tx").hide();
$("#Address_tx").hide();
$("#Job_tx").hide();
$("#NationalID_tx").hide();
});
});
</script>



<style>
.ProfileDesign{
	background-color:f4f7f8;
	width:30%;
	margin-left:1%;
	text-align:center;
}
#label{
	color:darkorange;
	font-family:sans serif;
	font-size:120%;
}
.profileback{
	
    background:url(Pictures&Videos/curtain-glass-building-1422408.jpg) no-repeat center fixed;	
	background-size:cover;
	
}
.bt{
  background-color: darkcyan;
  border: none;
  color: white;
  padding: 1% 5%;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 80%;
  border-radius:10%;
  cursor:pointer;
}

.in{
  
  border: none;
  padding: 2% 5%;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 85%;
}
</style>


<body class="profileback">

<div class="ProfileDesign">

<form method="post">

<h1 style="text-align:left; font-family:Verdana; padding:3%;">Profile</h1>
<b id="label">Full Name</b>

<br><br>

<?php
 echo $_SESSION["FullName"];
?>

<br><br>

<input class="bt" type="button" Value="Edit" id="FullName_button" >

<br><br>

<input class="in" type="text" id="FirstName_tx" Name="FirstName_tx" style="display:none;" value=<?php echo $_SESSION["FirstName"]?>>
<br><br>
<input class="in" type="text" id="LastName_tx" Name="LastName_tx" style="display:none;"  value=<?php echo $_SESSION["LastName"]?>> 

<br><br>

<b id="label">Email</b>
<br><br>
<?php
 echo $_SESSION["Email"];
?>

<br><br>

<input class="bt" type="button" id="Email_button"  Value="Edit">

<br><br>

<input class="in" type="email" id="Email_tx" Name="Email_tx" style="display:none;"  value=<?php echo $_SESSION["Email"]?>>

<br><br>


<b id="label">Mobile</b>
<br><br>
<?php
 echo $_SESSION["MobilePhone"];
?>

<br><br>

<input class="bt" type="button" id="MobilePhone_button" Value="Edit">

<br><br>

<input class="in" type="number" id="MobilePhone_tx" Name="MobilePhone_tx" style="display:none;"  value=<?php echo $_SESSION["MobilePhone"]?>>
<br><br>

<b id="label">Address</b>

<br><br>

<?php
 echo $_SESSION["Address"];
?>

<br><br>

<input class="bt" type="button"  id="Address_button" Value="Edit">

<br><br>
<input class="in" type="text" id="Address_tx" Name="Address_tx" style="display:none;"  value=<?php echo $_SESSION["Address"]?>>

<br><br>

<b id="label">Job</b>
<br><br>
<?php
 echo $_SESSION["Job"];
?>
<br><br>

<input class="bt" type="button"  id="Job_button" Value="Edit">

<br><br>

<input class="in" type="text"  id="Job_tx" Name="Job_tx" style="display:none;"  value=<?php echo $_SESSION["Job"]?>>

<br><br>

<b id="label">National ID</b>
<br><br>
<?php
 echo $_SESSION["NationalID"];
?>

<br><br>

<input class="bt" type="button"  id="NationalID_button" Value="Edit">
<br><br>
<input class="in" type="number"  id="NationalID_tx" Name="NationalID_tx" Name="NationalID_tx" style="display:none;"  value=<?php echo $_SESSION["NationalID"]?>>

<br><br>

<b id="label">Status</b>
<br><br>
<?php
 echo $_SESSION["Status"];
?>

<br><br>

<input class="bt" type="Submit" Value="Save" id="Save" Name="Save">
<input class="bt" type="button" Value="Reset" id="Reset">


<br><br>
</form>

</div>
</body>

<?php
include "BottomBar.php"
?>

