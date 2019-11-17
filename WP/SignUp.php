<!DOCTYPE html>
<?php include ("TopMenu.php");?>
<html>
<head>
<title>Signup-FNB</title>
<link rel="icon" type="image/png" href="Untitled-1.png"/>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
	$("#conf").keyup(function(){
		if($("#psw").val() !=$("#conf").val()){
		$("#msg").html("Password don't match").css("color","red");
	}
	
	else  if(!$("#psw").val().match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/)) /*To check a password between 6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter*/
	{
	
			$("#msg").html("weak password").css("color","red");

	
	}
	
	else{
		$("#msg").html("Password Matched").css("color","green");
	}
});
});
</script>



<script>												/*displays the uploaded image*/
  var loadFile = function(event) {	
    var output = document.getElementById('previewImage');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>

<script>
function check()
{
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

	
	var a=document.getElementById("fn").value;
	var b=document.getElementById("ln").value;
	var c=document.getElementById("eml").value;
	var d=document.getElementById("psw").value;
	var e=document.getElementById("conf").value;
	var f=document.getElementById("mon").value;
	var g=document.getElementById("birth").value;
	var h=document.getElementById("idimg").value;
	



	
	if(a.length<3)								/*first name validation*/
	{
		alert("First Name cant be less than 3 letters");
		return false;

	}
	
	 if(b.length<3)								/*last name validation*/
	{
		alert("Last Name cant be less than 3 letters");
		return false;
	
	}

	if(c.match(mailformat))					/*email validation*/
	{

		document.form1.eml.focus();
	
	}
	else
	{
		alert("You have entered an invalid email address!");
		document.form1.eml.focus();
		return false;
	}	

	if(!d.match(passw))							/*password validation*/
	{
	  
		alert('Weak Password!')
		return false;
	
	}	

	else if(e!=d)								/*checks if password and confirmed password are identical*/
	{
		alert("password not identical");
		return false;

	}
	
	else if(f=="")
	{
		alert("Enter your Salary per month");
		return false;
	}
	
	else if(g=="")
	{
		alert("Set your Birthday date");
		return false;

	}
	
	else if(h=="")
	{
		alert("Choose image for an ID identification");
		return false;

	}
	
	alert("done");
		
}
</script>
<style>
h1
{
position:absolute;
	top:5%;
	left:20%;
	transform:translate(-50%,-50%);
	font-size:50px;
	color:whitesmoke;
}
#fn
{

	width:200px;
	//border:3px solid lightgray;
	padding:15px 30px;
	border-radius:30px;
	outline:none;
	border:2px solid darkorange;
	box-shadow:0 0 8px darkorange;
}
#ln
{

	width:200px;
	//border:3px solid lightgray;
	padding:15px 30px;
	border-radius:30px;
	outline:none;
	border:2px solid darkorange;
	box-shadow:0 0 8px darkorange;
}
#eml
{

	width:490px;
	//border:3px solid lightgray;
	padding:15px 30px;
	border-radius:30px;
	outline:none;
	border:2px solid darkorange;
	box-shadow:0 0 8px darkorange;
}
#psw
{

	width:490px;
	//border:3px solid lightgray;
	padding:15px 30px;
	border-radius:30px;
	outline:none;
	border:2px solid darkorange;
	box-shadow:0 0 8px darkorange;
}
#conf
{

	width:490px;
	//border:3px solid lightgray;
	padding:15px 30px;
	border-radius:30px;
	outline:none;
	border:2px solid darkorange;
	box-shadow:0 0 8px darkorange;
}
#mon
{

	width:490px;
	//border:3px solid lightgray;
	padding:15px 30px;
	border-radius:30px;
	outline:none;
	border:2px solid darkorange;
	box-shadow:0 0 8px darkorange;
}
::-webkit-input-placeholder
{
	
	font-family:"inherit";
	font-size:20px;
	color:darkcyan;
}
#msg
{
	
	font-size:20px;
}
#birth
{

	width:490px;
	//border:3px solid lightgray;
	padding:15px 30px;
	border-radius:30px;
	outline:none;
	border:2px solid darkorange;
	box-shadow:0 0 8px darkorange;
}
#idimg
{

}

#previewImage
{


	width:150px;
	height: 100px;

}



#brth
{

	font-size:25px;
	color:darkcyan;
}
#upd
{

	font-size:25px;
	color:darkcyan;
}
#btn
{

	font-size:20px;
	outline:none;
	width:170px;
	

	height:40px;
	margin-top:4%;
	background-color:darkorange;
	color:white;
	font-weight:bold;
	border-radius:30px;
	font-size:20px;
	outline:none;
	border:2px solid white;
	cursor: pointer;
}
</style>
<body>
<div id="msg"></div>
<img src="simple.jpg" width="100%" height="100%">
<h1>Create a new Account</h1>
<form name="form1" action="#">
<input type="text" id="fn" placeholder="First Name">
<input type="text" id="ln" placeholder="Surname"> <br><br>
<input type="email" id="eml" placeholder="Email Address"><br><br>
<input type="password" id="psw" placeholder="New Password"><br><br>
<input type="password" id="conf" placeholder="Confirm Password"><br><br>
<input type="number" id="mon" placeholder="Payment per month"><br><br>
<input type="date" id="birth" placeholder="Birthday">
<br><br>	
<input type="file" accept="image/*" onchange="loadFile(event)" id="idimg" placeholder="Upload ID image">

<img id="previewImage" alt="not uploaded yet"/> <br>
<input type="submit" id="btn" onclick="check()" >
<p id="brth">Birthday:</p><br>
<p id="upd">Upload ID image:</p> 

<br>
</form>
</body>
</html>