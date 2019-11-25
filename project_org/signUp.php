<?php
include "TopBar.php";
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loanproject";

$conn = new mysqli($servername, $username, $password, $dbname);


$emailError="";

if(isset($_POST['Submit'])){ //check if form was submitted
	if(empty($_POST['Email']))
	{
		$emailError="Email is required";
	}

	else
	{
		$sql="INSERT INTO requests (FirstName,LastName,Email,Mobile_Phone,Home,National_ID, Address, Job,Username,Password) 
		values ('".$_POST['FirstName']."','".$_POST['LastName']."','".$_POST['Email']."','".$_POST['MobilePhone']."','".$_POST['Home']."','".$_POST['NationalID']."','".$_POST['Address']."','".$_POST['Job']."','".$_POST['Username']."','".$_POST['Password']."')";
		echo $sql;
		
		$result=mysqli_query($conn,$sql);
		if($result)	
		{
			header("Location:SignUp.php");
		}
		else
		{
			echo $sql;
		}
	}
}

?>

<html>

	<style>

		body 
		{
			font-family: 'Nunito', sans-serif;
			color: #384047;
		}

		form 
		{
			max-width: 300px;
			margin: 10px auto;
			padding: 10px 20px;
			background: #f4f7f8;
			border-radius: 8px;
		}

		h1
		{
			margin: 0 0 30px 0;
			text-align: center;
		}

		input[type="text"],
		input[type="password"],
		input[type="email"],
		input[type="number"],
		input[type="tel"],
		input[type="NID"],
		input[type="job"]
		{
			background: rgba(255,255,255,0.1);
			border: none;
			font-size: 16px;
			height: auto;
			margin: 0;
			outline: 0;
			padding: 15px;
			width: 100%;
			background-color: #e8eeef;
			color: #8a97a0;
			margin-bottom: 30px;
		}

		button 
		{
			padding: 19px 39px 18px 39px;
			color: #FFF;
			background-color: #4bc970;
			font-size: 18px;
			text-align: center;
			border-radius: 5px;
			width: 100%;
			border: 1px solid #3ac162;
			border-width: 1px 1px 3px;
			margin-bottom: 10px;
		}


		legend 
		{
			font-size: 1.4em;
			margin-bottom: 10px;
		}

		label 
		{
			display: block;
			margin-bottom: 8px;
		}

		label.light 
		{
			font-weight: 300;
			display: inline;
		}

		.number 
		{
			background-color: #5fcf80;
			color: #fff;
			height: 30px;
			width: 30px;
			display: inline-block;
			font-size: 0.8em;
			margin-right: 4px;
			line-height: 30px;
			text-align: center;
			border-radius: 100%;
		}

		form 
		{
			max-width: 480px;
		}
		
	</style>

	<body style="background-color:#03fca1">




        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>


      <form action="" method="post">
      
        <h1>Sign Up</h1>
        
        
          <legend><span class="number">1</span>Your basic info</legend>
		  
          <label class="name">Name:</label>
          <input type="text" id="name" name="user_name">
          
          <label class="mail">Email:</label>
          <input type="email" id="mail" name="user_email">
          
          <label class="password">Password:</label>
          <input type="password" id="password" name="user_password">
		  
          <label class="password">Confirm Password:</label>
		  <input type="password" name="confirmpassword" >

        
        
       
          <legend><span class="number">2</span>Your profile</legend>
		  
				<label class="mobile">Mobile Number:</label>
  				<input type="tel" name="MobilePhone" class="inputData" > 	     
				
				<label class="NID">National ID:</label>
				<input type="NID" name="NationalID"class="inputData" >
       
				<label class="job">Job Role:</label>
				<input type="job" name="job">
        

      
        <button type="submit">Sign Up</button>
      </form>


	</body>
</html>

<?php
include "BottomBar.php";
?>