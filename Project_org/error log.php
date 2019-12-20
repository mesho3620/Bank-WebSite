<html>
<body>
<?php

ini_set('display_errors',0);
ini_set('track_errors',1);
ini_set('display_startup_errors',1);
ini_set('log_errors',1);
ini_set('error_log',dirname(__FILE__).'/log.txt');	
error_reporting(-1);
error_reporting(E_ALL | E_STRICT);



session_start();
ob_start();

include ("database.php");

			
?>
<head>
<title>First National Bank - FNB</title>
<link rel="icon" type="image/png"  href="Pictures&Videos\Untitled-1.png"/>
<link rel=stylesheet href="https://s3-us-west-2.amazonaws.com/colors-css/2.2.0/colors.min.css">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="jquery-3.4.1.js"></script> 


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

/*Search css*/

.Search-Back{
	top : 15%;
	padding:50x;
	border:5px black;
	margin: 10px auto 0px auto;
	width : 80%;
	height: auto;
    overflow:auto ;
	
	  }

</style>

<body>

<div class="topnav">
<img onerror="this.style.display = 'none'" src="Pictures&Videos/d-1.png" width=4% height=7%> 
<?php
	echo "<b  id='header'>First National Bank</b>";
		echo"<a href='../project_org/error log.php'>Error Log</a>";
	echo"<a href='../project_org/search.php'>Search</a>";
	echo"<a href='../project_org/displayLoan.php'>Loans</a>";
	echo"<a href='../project_org/Profile.php'>Profile</a>";
	echo"<a href='../project_org/homePage.php'>Home</a>";

?>

</div>

<div class="topnav2">

<?php
	echo "Welcome ".$_SESSION['FullName'];
	echo"<a href='../project_org/deleteAccount.php'>Delete Account</a>";
	echo"<a href='../project_org/signOut.php'>Sign out</a>";	

?>
<div style = "background-color: red">
<?php

$myfile = fopen("log.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);
?>
</div>
</body>
</html>
