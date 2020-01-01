<html>

<?php
include 'topBar.php';
require 'database.php';
?>

<head></head>

<style>

.back {
	
	background:url(Pictures&Videos/announcement.jpg); 
	background-size: 100% 100%;
}

.div {
	
	border-style:solid; 
	background-color: white; 
	margin-top: 1%;  
	width: 45%; 
	height: 80%;
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

</body>

</html>
