<?php
ini_set('display_errors',0);
ini_set('track_errors',1);
ini_set('display_startup_errors',1);
ini_set('log_errors',1);
ini_set('error_log',dirname(__FILE__).'/log.txt');	
error_reporting(-1);
error_reporting(E_ALL | E_STRICT);


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loanproject";
session_start();

try
{
	$conn = new mysqli($servername,$username,$password,$dbname);

	$sql="delete from users where User_ID =".$_SESSION['ID'];
	$result=mysqli_query($conn,$sql);
	if($result)
	{
		session_destroy();
		header("Location:homePage.php");
	}
	else
	{
		throw new Exception("couldnt delete Account $sql");
	}
		
	}
catch (Exception $e)
{
	echo $e->getMessage();
}

		
?>