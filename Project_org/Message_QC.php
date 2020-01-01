<html>

<?php
include 'topBar.php';
require 'database.php';
?>

<?php

if(isset($_POST['Send'])){
    $sql="INSERT INTO  messageclient(UserID,MessageCl) VALUES('".$_POST['ID_tx']."','".$_POST['Message']."')";

    $result=mysqli_query($conn,$sql);

}


?>



<style>

.message {
	text-align:left;
	color: white;
}

.back {
	
	background:url(Pictures&Videos/QualityControl.jpg); 
	background-size:cover;
}


</style>
<body class="back">
<h1 class="message" > Message</h1>

<form method='post'>
<b style="color: white;"> Enter the user's ID: </b> <input type='text' name="ID_tx" style='width:7.5%;'> 
<br><br>
<textarea rows="5" cols="50" style="width:50%;" placeholder="Write your message." name='Message'></textarea>
<br><br>
<input type='Submit' name='Send'>
</form>


</body>

</html>
