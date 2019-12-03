<?php
include "TopBar.php"
?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loanproject";

$conn = new mysqli($servername, $username, $password, $dbname);


if(isset($_POST['Confirm_request'])){ //check if form was submitted

	if(empty($_POST['Guarantee_tx']))
	{
		echo "Fill the Guarantee";
	}
	
	else if($_POST['Amount_tx']>500000)
	{
		echo "Amount is bigger than 500.000";
	}
	
	else if($_POST['Amount_tx']<20000)
	{
		echo "Amount is lower than 20.000";
	}
	
	else
	{
		$sql="INSERT INTO request_loan (FullName,Email,Mobile_Phone,National_ID, Address,Job,Status,Amount,Salary,Guarantee) 
		values 
		(
		'".$_SESSION['FullName']."',
		'".$_SESSION['Email']."',
		'".$_SESSION['MobilePhone']."',	
		'".$_SESSION['NationalID']."',
		'".$_SESSION['Address']."',
		'".$_SESSION['Job']."',
		'".$_SESSION['Status']."',
		'".$_POST['Amount_tx']."',		
		'".$_POST['Salary_tx']."',
		'".$_POST['Guarantee_tx']."'
		)";
		
		
		
		$result=mysqli_query($conn,$sql);
		if($result)	
		{
            echo $sql;
			header("Location:homePage.php");
		}
		else
		{
			echo $sql;
		}
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


<div style="">

<form id="myForm" name="myForm" method="post">

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

<h3>Amount: </h3> <input type="number" name="Amount_tx" placeholder="Min:20.000 ~ Max:500.000$" style="width:45%;">

<br><br>

<h3>Salary: </h3> <input type="number" name="Salary_tx" placeholder="Enter your Salary per month" style="width:45%;">

<br><br>

<h3>Guarantee:</h3> <br>
<textarea rows="25" cols="50" Name="Guarantee_tx"></textarea>


<br><br>

<input type="Submit" value="Confirm request" name="Confirm_request">

<br><br>

</form>

</div>

</body>
	
<?php
include "BottomBar.php"
?>