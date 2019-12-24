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
}

</style>
<body>

<?php
include "TopBar.php";
?>


<?php

include "database.php";

if(isset($_POST['Send'])){ 


$sql1="INSERT INTO messsage_us (FullName,Email,Message_Tx) 
values ('".$_POST['FullName']."','".$_POST['Email']."','".$_POST['Message_tx']."')";
	

	$result=mysqli_query($conn,$sql1);
	if($result){
		header("Location:homePage.php");
		}

	else{
			echo $sql1;
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
<h2 style="text-decoration:underline;">Message Us</h2>

<form id="MessageForm" method="post">
Name <br>
<input type='text' placeholder="FullName" name="FullName">

<br>
<br>

Email <br>
<input type='Email' placeholder="Enter your email address" name="Email">

<br>
<br>

Message <br>
<textarea rows="4" cols="50" name="Message_tx"></textarea>

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