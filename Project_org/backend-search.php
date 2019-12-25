<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php

$connection = mysqli_connect("localhost","root","","loanproject");
$term = filter_var($_POST['term'], FILTER_SANITIZE_STRING);
$sql = "SELECT User_ID, FirstName , LastName , Email, Mobile_Phone, National_ID, Address, Job, Status
        FROM users ";
if(!empty($term))
{
    $sql = $sql . " WHERE (FirstName LIKE '%$term%'
    OR LastName LIKE '%$term%')
    AND Status = 'Client'";

   
echo "
      <table class='table table-bordered' style = 'color: white; background-color: black' border=2 width=100%>
      <tr>
	  <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Mobile_Phone</th>
      <th>National_ID</th>
      <th>Address</th>
      <th>Job</th>
      </tr>
    ";
 if($result =mysqli_query($connection,$sql))
 {
     if(mysqli_num_rows($result) > 0)
     {
         while( $row = mysqli_fetch_array($result) )
         {
            echo "     
			
            <tr><td>".$row["User_ID"]."</td>
			<td>".$row["FirstName"]."</td>
            <td>".$row["LastName"]."</td>
            <td>".$row["Email"]."</td>
            <td>".$row["Mobile_Phone"]."</td>
            <td>".$row["National_ID"]."</td>
            <td>".$row["Address"]."</td>
            <td>".$row["Job"]."</td></tr>
          ";
         }
     }
     else
     {
        echo "<tr><td colspan=8>No matches found !</td></tr>";
     }
 }
 else
 {
    echo "<tr><td colspan=8>ERROR : Could'nt Excute 
    $sql." .mysqli_error($connection). "</td></tr>";
 }
 echo "</table>";
}
 mysqli_close($connection);
?>