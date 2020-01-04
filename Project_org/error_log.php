<?php
include("TopBar2.php");
?>
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
	
<body>

<div style = "background-color: lightgray">
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
<?php include("BottomBar2.php");