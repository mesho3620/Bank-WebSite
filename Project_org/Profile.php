<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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


<?php
include "TopBar.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loanproject";

$conn = new mysqli($servername, $username, $password, $dbname);


	$sql="SELECT * FROM requests where User_ID=".$_SESSION['ID'];

	$result = mysqli_query($conn,$sql);		
	if($row=mysqli_fetch_array($result))	
	{
		$_SESSION["FullName"]=$row["FirstName"]." ".$row["LastName"];
		$_SESSION["Email"]=$row["Email"];
		$_SESSION["Password"]=$row["Password"];
		$_SESSION["MobilePhone"]=$row["Mobile_Phone"];
		$_SESSION["NationalID"]=$row["National_ID"];
		$_SESSION["Address"]=$row["Address"];
		$_SESSION["Job"]=$row["Job"];
		$_SESSION["Status"]=$row["Status"];	
	}
	else{
		echo $sql;
	}

?>
<style>
.ProfileDesign{
	background-color:f4f7f8;
	width:50%;
	margin-left:25%;
	margin-bottom:1%;
	text-align:center;
}

#label{
	color:red;
}

</style>


<body style="background-color:008b8b">
<div class="ProfileDesign">
<h1 style="text-align:left;">Profile</h1>
<b id="label">Full Name</b>

<br><br>

<?php
 echo $_SESSION["FullName"];
?>

<br><br>

<input type=button Value="Edit" id="FullName_button" >

<br><br>

<input type=text id="FirstName_tx" style="display:none;" placeholder="First Name">
<br><br>
<input type=text id="LastName_tx" style="display:none;" placeholder="Last Name"> 

<br><br>

<b id="label">Email</b>
<br><br>
<?php
 echo $_SESSION["Email"];
?>

<br><br>

<input type=button id="Email_button"  Value="Edit">

<br><br>

<input type=email id="Email_tx" style="display:none;" placeholder="Enter your new Email">

<br><br>

<b id="label">Password</b>

<br><br>

<?php
 echo $_SESSION["Password"];
?>

<br><br>

<input type=button id="Password_button" Value="Edit" >

<br><br>

<input type=password id="Password_tx" style="display:none;" placeholder="Enter your new password">

<br><br>

<b id="label">Mobile</b>
<br><br>
<?php
 echo $_SESSION["MobilePhone"];
?>

<br><br>

<input type=button id="MobilePhone_button" Value="Edit">

<br><br>

<input type=number id="MobilePhone_tx" style="display:none;" placeholder="Phone Number">
<br><br>

<b id="label">Address</b>

<br><br>

<?php
 echo $_SESSION["Address"];
?>

<br><br>

<input type=button  id="Address_button" Value="Edit">

<br><br>
<input type=text id="Address_tx" style="display:none;" placeholder="Address">

<br><br>

<b id="label">Job</b>
<br><br>
<?php
 echo $_SESSION["Job"];
?>
<br><br>

<input type=button  id="Job_button" Value="Edit">

<br><br>

<input type=text  id="Job_tx" style="display:none;" placeholder="Job">

<br><br>

<b id="label">National ID</b>
<br><br>
<?php
 echo $_SESSION["NationalID"];
?>

<br><br>

<input type=button  id="NationalID_button" Value="Edit">
<br><br>
<input type=number  id="NationalID_tx" style="display:none;" placeholder="National ID">

<br><br>

<b id="label">Status</b>
<br><br>
<?php
 echo $_SESSION["Status"];
?>

<br><br>

<input type=button Value="Save" id="Save">
<input type=button Value="Reset" id="Reset">


<br><br>
</div>
</body>

<?php
include "BottomBar.php"
?>
