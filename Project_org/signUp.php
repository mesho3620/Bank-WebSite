<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
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
	if(empty($_POST['Email']))
	{
		$emailError="Email is required";
	}

	else
	{
		$sql="INSERT INTO requests (FirstName,LastName,Email,Mobile_Phone,National_ID, Address, Job,Password,Status) 
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

input[type=password] {
  background-color: e8eeef;
  border:hidden;
  height:5%;
}

#elements{
	   font-style: oblique;
}

</style>

<body style="background-color:black;">
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
<input type="Password" name="Password" placeholder="Password" style="width:100%">

<br><br>

<b id="elements">Confirm Password:</b>
<br>
<br>
<input type="Password" name="ConfirmPassword" placeholder="Confirm Password" style="width:100%">

<br><br>
<h3>Your personal info</h3>	

<b id="elements">Mobile Phone:</b>
<br>
<br>
<input type="text" name="MobilePhone" placeholder="Mobile" style="width:100%">

<br><br>

<b id="elements">National ID:</b>
<br>
<br>
<input type="text" name="NationalID" placeholder="National ID" style="width:100%">

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

<input type="Reset" style="background-color:orange; border:none;">

<br><br>

<input type="Submit" name="Submit" style="background-color:orange; border:none;width:100%; height:5%;" Value="Sign Up">

<br><br>
<?php echo $emailError; ?>


</form>

</body>

<?php
include "BottomBar.php";
?>