<html>

<?php
include 'topBar.php';
require 'database.php';
?>

<head></head>

<?php
//Eb2a 7otaha f topbar 
 $_SESSION['Announcement']="No announcement here";
?>

<?php
if(isset($_POST['Submit'])){
    if($_POST['Announcement']!=null){
    
        $myfile=fopen("Announcement.txt","w")or die("Unable msg");
        $txt=$_POST['Announcement'];
        fwrite($myfile,$txt);
        fclose($myfile);
    

    }
    else{
        echo "<script>alert('Empty announcement, Please fill it!!!')</script>";
    }
}
?>

<style>

.back {
	
	background:url(Pictures&Videos/announcement.jpg); 
	background-size: 100% 100%;
}

.div {
	
	border-style:solid; 
	background-color: white; 
	margin-top: 0.5%;  
	width: 45%; 
	height: 40%;
}

.form {
	
	
	width: 90%;
	height: 45%;
	margin-top: -1%;
	
}

</style>

<body class="back">


<div class="div">
<p>
<?php
$myfile=fopen("Announcement.txt","r");
echo fread($myfile,filesize("Announcement.txt"));
fclose($myfile);
?>
</p>

<br>
</div>

<br>

<form class="form" method='post'>
<textarea rows="25" cols="50" style="width:50%;" placeholder="Write the new announcement." name='Announcement'></textarea>
<br>
<input type='submit' name='Submit'>

</form>

<br><br>
<br><br>

</body>

</html>