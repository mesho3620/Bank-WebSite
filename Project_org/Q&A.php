<head>
<title>First National Bank - Ask us</title>
<link rel="icon" type="image/png" href="Pictures&Videos/Untitled-1.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?php
include ("database.php");
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

<?php 


if(isset($_POST['Send'])){ 

	try 
	{
			$_POST['Email_msg']=filter_var($_POST['Email_msg'], FILTER_SANITIZE_EMAIL);
			$_POST['question']=filter_var($_POST['question'], FILTER_SANITIZE_STRING);

		if(empty($_POST['Email_msg']))
		{
			throw new Exception("Email address cant be left empty");
		}
		if(filter_var($_POST['Email_msg'], FILTER_VALIDATE_EMAIL) === FALSE)
		{
			throw new EmailException($_POST['Email_msg']);
		}
			
		
		$sql1="INSERT INTO qanda (Email,Question) 
		values ('".$_POST['Email_msg']."','".$_POST['question']."')";
		
		$result=mysqli_query($conn,$sql1);
		if($result)	
		{
			header("Location:homePage.php");
		}
		else
		{
			echo $sql1;
		}
	}
	catch(EmailException $e)
	{
		echo "<script>alert('".$e->errorMessage()."')</script>";
	}
	catch(Exception $e)
	{
		echo "<script>alert('".$e->getMessage()."')</script>";

	}	
}

?>



<script>
$(document).ready(function(){
		$("#show1").click(function(){
		$("#Answer1").toggle();
		});
		
		$("#show2").click(function(){
		$("#Answer2").toggle();
	    });
		
		$("#show3").click(function(){
		$("#Answer3").toggle();
	    });
		
		$("#show4").click(function(){
		$("#Answer4").toggle();
	    });
		 
		$("#show5").click(function(){
		$("#Answer5").toggle();
     	});
		
    	$("#show6").click(function(){
		$("#Answer6").toggle();
	     }); 
		 
	    $("#show7").click(function(){
		$("#Answer7").toggle();
	    });
		
		 $("#show8").click(function(){
		$("#Answer8").toggle();
	    }); 
		 
	    $("#show9").click(function(){
		$("#Answer9").toggle();
	    });
		
		$("#show10").click(function(){
		$("#Answer10").toggle();
	    });   

});
</script>

<style>
#QuestionForm{
  border-style: solid ;
  border-width: 1%;
  padding-left:1%; 
  background-color: #404040;
  margin-bottom: 0%;
 
}
#Questions{
	padding:1%;
	background:url(Pictures&Videos/questionmark.jpg) no-repeat center fixed;
	background-size:cover;
}
h1{
	color:white;
}
b{
	color:white;
}
p{
	color:white;
}
</style>
<?php
include "TopBar.php";
?>

<div id="Questions">
<h1 style="text-decoration:underline; color:white;">Q&A </h1>
<b style='color:white;'>How to create an account?</b> 
<br>
<br>
<input type="button" value="Show/Hide answer" id="show1" style="border-radius: 10%; background-color:white; border:none;">
<p id="Answer1" style="display:none; color:Darkorange;">Go to the top of the page and press (sign up button > fill the form > Press 'Submit').</p>
<br>
<br>

<b>How to login?</b> 
<br>
<br>
<input type="button" value="Show/Hide answer" id="show2"  style="border-radius: 10%; background-color:white; border:none;">
<p id="Answer2" style="display:none; color:Darkorange;">Go to the top of the page and press login button.</p>
<br>
<br>

<b>What to do if you forget your password?</b> 
<br>
<br>
<input type="button" value="Show/Hide answer" id="show3" style="border-radius: 10%; background-color:white; border:none;">
<p id="Answer3" style="display:none; color:Darkorange;">Go to the top of the page and press login > forget password   </p>
<br>
<br>

<b>How to sign out?</b> 
<br>
<br>
<input type="button" value="Show/Hide answer" id="show4" style="border-radius: 10%; background-color:white; border:none;">
<p id="Answer4" style="display:none; color:Darkorange;">Go to the top of the page and press sign out button.</p>
<br>
<br>

<b>How to request a loan?</b>
<br>
<br>
<input type="button" value="Show/Hide answer" id="show5" style="border-radius: 10%; background-color:white; border:none;">
<p id="Answer5" style="display:none; color:Darkorange;">Go to the top of the page and (press request loan button > read the announcemenet > fill the form).</p>
<br>
<br>

<b>How to update/see your profile?</b> 
<br>
<br>
<input type="button" value="Show/Hide answer" id="show6" style="border-radius: 10%; background-color:white; border:none;">
<p id="Answer6" style="display:none; color:Darkorange;">Go to the top of the page and press profile button,</p>
<br>
<br>

<b>How to check your loan's request?</b>
<br>
<br>
<input type="button" value="Show/Hide answer" id="show7" style="border-radius: 10%; background-color:white; border:none;">
<p id="Answer7" style="display:none; color:Darkorange;">Go to the top of the page and press loan history button,</p>
<br>
<br>

<b>What is the functionality of the inbox page?</b> 
<br>
<br>
<input type="button" value="Show/Hide answer" id="show8" style="border-radius: 10%; background-color:white; border:none;">
<p id="Answer8" style="display:none; color:Darkorange;">The functionality of the inbox page is that the quality control send to the client a message.</p>
<br>
<br>

<b>What is the functionality of the announcement page?</b> 
<br>
<br>
<input type="button" value="Show/Hide answer" id="show9" style="border-radius: 10%; background-color:white; border:none;">
<p id="Answer9" style="display:none; color:Darkorange;">The functionality of the announcement page is that the quality control announces to the clients a post.</p>
<br>
<br>

<b>How to delete your account?</b> 
<br>
<br>
<input type="button" value="Show/Hide answer" id="show10" style="border-radius: 10%; background-color:white; border:none;">
<p id="Answer10" style="display:none; color:Darkorange;">Go to the top of the page and press delete account.</p>
<br>
<br>
</div>

<form id="QuestionForm" method="post" name="QuestionForm">
<h2 style="text-decoration:underline; color:white;">Any questions?</h2>

<input type="Email" placeholder="Enter your Email" name="Email_msg">

<br><br>

<textarea rows="4" cols="50"  placeholder="What is your question?" name="question"></textarea>

<br><br>

<input type="Submit" value="Send" name="Send">
<br><br>

</form>
<?php
include "BottomBar.php";
?>