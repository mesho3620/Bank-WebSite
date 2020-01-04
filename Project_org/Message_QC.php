<html>

<?php
include 'topBar.php';
require 'database.php';
?>

<?php

if(isset($_POST['Send'])){
    $sql="INSERT INTO  messageclient(UserID,Sender,MessageCl) VALUES('".$_POST['ID_tx']."','".$_SESSION['Status']."','".$_POST['Message']."')";

    $result=mysqli_query($conn,$sql);

}


?>

<head></head>

<body style="background:url(Pictures&Videos/message.jpg); background-size:cover;">
<h1 style="text-align:left;">Message</h1>

<form method='post'>
Enter the user's ID: <input type='text' name="ID_tx" style='width:7.5%;'> 
<br><br>
<textarea rows="5" cols="50" style="width:50%;" placeholder="Write your message." name='Message'></textarea>
<br><br>
<input type='Submit' name='Send'>
</form>


</body>

</html>
