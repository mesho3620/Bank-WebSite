<html>
<head>
<title>First National Bank - Find us</title>
<link rel="icon" type="image/png" href="Pictures&Videos/Untitled-1.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1"></head>

<style>

.findus{
	
	text-align:center;
	margin:auto;
	background-color:white;
	border-style:solid;
	background:url(Pictures&Videos/video.mp4) no-repeat center fixed;
	background-size:cover;
	background-color:white;

}

.Address{
	text-align:center;
	margin:auto;

}

.Phone{
	text-align:center;
	margin:auto;

}

.Email{
    text-align:center;
	margin:auto;
}

#myVideo{
 height:50%;
 width:50%;
}
#picmsg
{
	background:url(Pictures&Videos/aerial-view-of-expressway-1720029.jpg) no-repeat center ;
	border-style:solid;
	
}

</style>
<body>

<?php
include "TopBar.php";
?>


<?php

include "database.php";

if(isset($_POST['Send'])){ 

	try
	{
		
		$_POST['Email']=filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
		$_POST['FullName']=filter_var($_POST['FullName'], FILTER_SANITIZE_STRING);
		$_POST['Message_tx']=filter_var($_POST['Message_tx'], FILTER_SANITIZE_STRING);
		
		if(empty($_POST['Email'])||empty($_POST['FullName'])||empty($_POST['Message_tx']))
		{
			throw new Exception("Please Fill the Required Data to submit your message");
		}
		
		if(filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL) === FALSE)
		{
			throw new EmailException($_POST['Email']);
		}
		
		$emailSql="select * from users where Email='".$_POST['Email']."'";
		$result=mysqli_query($conn,$emailSql);
		if(!$result)
		{
			throw new EmailException($_POST['Email']);
		}

		$sql1="INSERT INTO messsage_us (FullName,Email,Message_Tx) 
		values ('".$_POST['FullName']."','".$_POST['Email']."','".$_POST['Message_tx']."')";
		

		$result=mysqli_query($conn,$sql1);
		if($result){
			header("Location:homePage.php");
			}

		else{
				throw new Exception("Could not execute sql statement $sql");
			}
		
	}
	catch (EmailException $e)
	{
		echo "<script>alert('".$e->errorMessage()."')</script>";
	}
	catch (Exception $e)
	{
		echo "<script>alert('".$e->getMessage()."')</script>";
	}


}

?>

<?php

class EmailException extends Exception {
  public function errorMessage() 
  {
    $errorMsg = $this->getMessage().' is not a valid E-Mail address.';
    return $errorMsg;
  }
}

?>


<div class="findus">



<h1>GET IN TOUCH</h1>

<video id="myVideo" autoplay loop muted>
<source src="Pictures&Videos/video.mp4"  type="video/mp4" >	
</video>

<div>
<div class="Address">
<h3>ADDRESS</h3>
<h5>Weifield Group Contracting</h5>
<p>146 Yuma Street</p>
<p>Denver CO 80223</p>
</div>

<div class="Phone">
<h3>PHONE</h3>
<h5>Weifield Group Contracting</h5>
<p>303.428.2011 phone</p>
<p>303.202.0466 fascimile</p>
</div>

<div class="Email">
<h3>EMAIL</h3>
<h5>Request for Proposal</h5>
<p>Info@weifieldgroup.com</p>
<h5>Electical Service Calls</h5>
<p>service@weifieldcontracting.com</p>
</div>

</div>
</div>

<div id="picmsg">
<h2 style="text-decoration:underline; margin-left: 1%;">Message Us</h2>

<form style=" margin-left: 1%;" method="post">
<b> Name</b> <br>
<input type='text' placeholder="FullName" name="FullName">

<br>
<br>

<b> Email</b> <br>
<input type='Email' placeholder="Enter your email address" name="Email">

<br>
<br>

<b> Message</b> <br>
<textarea rows="4" cols="50" placeholder="Write your message here" name="Message_tx"></textarea>

<br>
<br>

<input type='submit' value="Submit" name="Send">

</form>

</body>
</html>
</div>

<?php
include "bottomBar.php";
?>