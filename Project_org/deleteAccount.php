<?php
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