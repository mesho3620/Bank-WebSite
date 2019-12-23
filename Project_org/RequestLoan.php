<head>
<title>First National Bank - Request Loan</title>
<link rel="icon" type="image/png" href="Pictures&Videos/Untitled-1.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
ini_set('display_errors',0);
ini_set('track_errors',1);
ini_set('display_startup_errors',1);
ini_set('log_errors',1);
ini_set('error_log',dirname(__FILE__).'/log.txt');	
error_reporting(-1);
error_reporting(E_ALL | E_STRICT);


include "TopBar.php"
?>

<?php

include ("database.php");

if(isset($_POST['Confirm_request'])){ 

	try
	{
		$_POST['HR_letter_tx']=filter_var($_POST['HR_letter_tx'], FILTER_SANITIZE_STRING);
	
		if(empty($_POST['HR_letter_tx']))
		{
			throw new Exception("HR letter cant bet left empty");
		}
		if(empty($_POST['Amount_tx']))
		{
			throw new Exception("Amount cant bet left empty");
		}	
		if($_POST['Amount_tx']>500000||$_POST['Amount_tx']<20000)
		{
			throw new AmountException($_POST['Amount_tx']);
		}
		if(empty($_POST['Salary_tx']))
		{
			throw new Exception("Salary cant be left empty");
		}
		if($_POST['Salary_tx']<0)
		{
			throw new AmountException($_POST['Amount_tx']);

		}
		
		$img=$_FILES['image']['name'];
		$sql="INSERT INTO request_loan (FullName,Email,Mobile_Phone,National_ID,Address,Job,Loan_Status,Amount,Salary,HR_letter,National_ID_Photo) 
		values 
		(
		'".$_SESSION['FullName']."',
		'".$_SESSION['Email']."',
		'".$_SESSION['MobilePhone']."',	
		'".$_SESSION['NationalID']."',
		'".$_SESSION['Address']."',
		'".$_SESSION['Job']."',
		'Waiting',
		'".$_POST['Amount_tx']."',		
		'".$_POST['Salary_tx']."',
		'".$_POST['HR_letter_tx']."',
		'".$_FILES['image']['name']."'
		)";
		
		$result=mysqli_query($conn,$sql);
		if($result)
		{
			move_uploaded_file($_FILES['image']['tmp_name'],"NationalIDs/$img");
			echo"<script>alert('Image has been uploaded to folder')</script>";
			header("Location:homePage.php");
		}
		else
		{
			echo $sql;

		}

	}
	catch (AmountException $e)
	{
		echo "<script>alert('".$e->errorMessage()."')</script>";
	}
	catch(Exception $e)
	{
		echo "<script>alert('".$e->getMessage()."')</script>";
	}

}


?>

<?php
class AmountException extends Exception {
  public function errorMessage() 
  {
    $errorMsg = $this->getMessage().' is not a valid Amount of money.';
    return $errorMsg;
  }
}
?>

<style>

#myForm{
	width:25%;
	heigth:25%;
	border-style:solid;
	text-align:center;
	margin-left:35%;
}

#announcement{
	font-size:125%;
	border-style:solid;
	height:50%;
	width:100%;
	overflow:scroll;
	background-color:FFC35B;
}
h3{
	color:darkorange;
}
.cs
{
	width:45%;
	border: none;
  padding: 2% 5%;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 85%;
}

</style>


<body>
<div id="announcement">
<h1 style="text-decoration:underline">Announcement:</h1>

<ol>
<li>
Years in Operation: 3 years of business operations. We focus on financing for agricultural businesses, cooperatives and related enterprises. We do not lend directly to individual farms.
</li>

<br>

<li>
Maximum Annual Revenue: $500,000
</li>

<br>

<li>
Maximum Annual Revenue: $20.000
</li>

<br>

<li>
Location: Must be legally established in one of Root Capital’s lending countries within Africa, Latin America, or Southeast Asia (see sidebar).
</li>

<br>

<li>
Documentation: Must present audited or management-prepared financial statements from the past three years.
</li>

<br>

<li>
Products & Services: Must be active in one or more of our focus industries: coffee, cocoa, honey, tree nuts, vanilla, grains, oilseeds, and other staple crops.
</li>

</ol>


<p>
Commercial Relationships: Must have strong relationships with established buyers and at least two professional references.
<br>
Once you have submitted this form, a member of our team will contact you within one week to inform you if your business is eligible to apply for Root Capital financing, or to inquire further about your work.
We look forward to learning more about your business and credit needs.
</p>

<br>

</div>

<br>


<div style="background:url(Pictures&Videos/atmosphere-background-bright-clouds-19670.jpg) no-repeat center fixed; color:black; font-size:110%;">
<form id="myForm" name="myForm" method="post" enctype="multipart/form-data">

<h3>Full Name: </h3> <?php echo $_SESSION["FullName"] ?>

<br><br>

<h3>Email: </h3> <?php echo $_SESSION["Email"] ?>

<br><br>

<h3>Mobile Phone: </h3> <?php echo $_SESSION["MobilePhone"] ?>

<br><br>

<h3>NationalID: </h3> <?php echo $_SESSION["NationalID"] ?>

<br><br>

<h3>Address: </h3> <?php echo $_SESSION["Address"] ?>

<br><br>

<h3>Job: </h3> <?php echo $_SESSION["Job"] ?>

<br><br>

<h3>Status: </h3> <?php echo $_SESSION["Status"] ?>

<br><br>

<h3>Amount: </h3> <input type="number" name="Amount_tx" placeholder="Min: 20.000 ~ Max: 500.000$" class="cs"">

<br><br>

<h3>Salary: </h3> <input type="number" name="Salary_tx" placeholder="Salary per Month" class="cs"">

<br><br>

<h3>HR letter:</h3> <br>
<textarea rows="25" cols="50" Name="HR_letter_tx"></textarea>

<br><br>

<h3>Upload a copy of your National ID </h3>
<input type="File" name="image">

<br><br>

<input type="Submit" value="Confirm request" name="Confirm_request">

<br><br>

</form>

</div>

</body>
	
<?php
include "BottomBar.php"
?>