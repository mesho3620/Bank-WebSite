<?php
session_start();
ob_start();
include ("database.php");

if(isset($_POST['Login'])){ //check if form was submitted
	$sql="SELECT * FROM users where Email='".$_POST['Email']."' AND Password='".$_POST['Password']."'";
	$result = mysqli_query($conn,$sql);		
	if($row=mysqli_fetch_array($result))	
	{
		$_SESSION["ID"]=$row["User_ID"];
		$_SESSION["FullName"]=$row["FirstName"]." ".$row["LastName"];
		
/*Just Added*/
/*-----------------------------------------------------------------------*/
		$_SESSION["FullName"]=$row["FirstName"]." ".$row["LastName"];
		$_SESSION["FirstName"]=$row["FirstName"];
		$_SESSION["LastName"]=$row["LastName"];
		$_SESSION["Email"]=$row["Email"];
		$_SESSION["Password"]=$row["Password"];
		$_SESSION["MobilePhone"]=$row["Mobile_Phone"];
		$_SESSION["NationalID"]=$row["National_ID"];
		$_SESSION["Address"]=$row["Address"];
		$_SESSION["Job"]=$row["Job"];
		$_SESSION["Status"]=$row["Status"];	
/*-----------------------------------------------------------------------*/
		header("Location:homePage.php");


	}
	else	
	{
		echo '<script>alert("Invalid Email or Password")</script>';
	}
}
			
?>
<head>
<title>First National Bank - FNB</title>
<link rel="icon" type="image/png" href="Pictures&Videos\Untitled-1.png"/>

</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function (){
	
$(".button").on('click',function(){
$(".popup").toggle();
});
});
$(document).ready(function(){
$("#close").on('click',function(){
$(".popup").hide();
});
$("#Login_Button").on('click',function(){
$(".popup").toggle();
});

});
</script>
<style>
h1{
	margin-top:1%;
	margin-left:
}
.topnav{
	background-color:black;
	color:white;
	padding: 1%;
}

.topnav a{
text-decoration:none;	
float:right;
color:white;
font-size: 125%;
margin-right:2%;
margin-top:1%;
}

.topnav a:hover{
	color:orange;
}
.topnav a:active{
	color:lightblue;
}

.topnav2{
	background-color:008b8b;
	padding: 0.1% 0.1%;
	color:white;
}

.topnav2 a{
color:white;
text-decoration:none;	
font-size:100%;
margin-left:1%;
float:right;
}

#header
{
	font-size:200%;
	color:white;
	margin-left:1%;
}
.container
{
	position:absolute;
	top:14%;
	right:6%;
}
	
.button
{
	background-color:black;
	padding:5% 15%;
	font-weight:bolder;
	text-transform:uppercase;
	text-decoration:none;
	font-size:18%;
	border-radius:6%;
	transition:0.4s;
	cursor:pointer;
}
.button:hover
{
	background:white;
	color:black;
}
.popup
{
	background:rgba(0 , 0 , 0 , 0.6);
	position:absolute;
	width:100%;
	height:100%;
	top:13.5%;
	display:none;
	justify-content:center;
	align-items:center;
	text-align:center;
}
.popup-content
{
	left:32%;
	top:35%;
	height:36%;
	width:33%;
	background:black;
	padding:3%;
	border-radius:5%;
	position:fixed;
}
#log
{
	margin:5% auto;
	display:block;
	width:50%;
	padding:2%;
	border:3px solid black;
	box-shadow:0 0 8px orange;
}
#close
{
	position:absolute;
	top:-1%;
	right:-1%;
	background:black;
	height:6%;
	width:4%;
	border-radius:50%;
	cursor:pointer;
}

</style>



<div class="topnav">
<img src="Pictures&Videos/Untitled-1.png" width=4% height=7%> 
<?php

if(!empty($_SESSION['FullName']) && $_SESSION["Status"]=="Client")
{

	echo "<b  id='header'>First National Bank</b>";
	echo"<a href='../project_org/Q&A.php'>Q&A</a>";	
	echo"<a href='../project_org/findUs.php'>Find us</a>";																															
	echo"<a href='../project_org/contactUs.php'>Contact us</a>";
	echo"<a href='../project_org/aboutUs.php'>About us</a>";
	echo"<a href='../project_org/RequestLoan.php'>Request Loan</a>";
	echo"<a href='../project_org/loan_History.php'>Loan History</a>";
	echo"<a href='../project_org/Profile.php'>Profile</a>";
	echo"<a href='../project_org/homePage.php'>Home</a>";
}

else if (!empty($_SESSION['FullName']) && $_SESSION["Status"]=="Manager"){
	echo "<b  id='header'>First National Bank</b>";
	echo "<a href='../project_org/search.php'>Search</a>";
	echo"<a href='../project_org/displayLoan.php'>Loans</a>";
	echo"<a href='../project_org/Profile.php'>Profile</a>";
	echo"<a href='../project_org/homePage.php'>Home</a>";
}

else{
	
	
	
	echo "<b  id='header'>First National Bank</b>";
	echo"<a href='../project_org/Q&A.php'>Q&A</a>";	
	echo"<a href='../project_org/findUs.php'>Find us</a>";																															
	echo"<a href='../project_org/contactUs.php'>Contact us</a>";
	echo"<a href='../project_org/aboutUs.php'>About us</a>";
	echo"<a href='../project_org/homePage.php'>Home</a>";
	
}
?>

</div>

<div class="topnav2">

<?php
if(!empty($_SESSION['FullName'])){
	echo "Welcome ".$_SESSION['FullName'];
	echo"<a href='../project_org/deleteAccount.php'>Delete Account</a>";
	echo"<a href='../project_org/signOut.php'>Sign out</a>";	
}
else{
	echo "Welcome Guest";
	echo"<a href='../project_org/signUp.php'>Sign up</a>";	
	echo"<input type='button' value='Login' style='background-color:008b8b; cursor:pointer; border:none; color:white; float:right;' id='Login_Button' >";	
}
?>


<div class="popup">
		<div class="popup-content">
		<form method="post" name="LoginFrom">
			<img src="Pictures&Videos/images.png" id="close" width="30px">
			<img src="Pictures&Videos/Untitled-1.png" width="50px">
			<input type="text" placeholder="Email Address" id="log" name="Email">
			<input type="password" placeholder="Password" id="log" name="Password">

			<input type='Submit' class="button" value="Login" style="font-size:150%; color:orange" name="Login">
		</form>	
	</div>
</div>

</div>

