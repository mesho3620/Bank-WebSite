<html>

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<?php
include 'topBar.php';
require 'database.php';
?>

<?php

$sql="SELECT * FROM messageclient where UserID= '".$_SESSION['ID']."'";
$result=mysqli_query($conn,$sql);

echo "<br>";

echo "<table border=1 width=100%; class='table table-bordered table-hover'>
<th style='text-align:center;'>Message</th>";


if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>".
		"<td> <span class='glyphicon glyphicon-envelope'></span> ". $row["MessageCl"]."</td></tr>";
    }
}

echo "</table>"

?>


<body>





</body>

</html>
