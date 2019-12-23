<?php
ini_set('display_errors',0);
ini_set('track_errors',1);
ini_set('display_startup_errors',1);
ini_set('log_errors',1);
ini_set('error_log',dirname(__FILE__).'/log.txt');	
error_reporting(-1);
error_reporting(E_ALL | E_STRICT);


$connection = mysqli_connect("localhost","root","","loanproject");
$term = $_POST['term'];
$sql = "SELECT User_ID, FirstName , LastName , Email, Mobile_Phone, National_ID, Address, Job, Status
        FROM users ";
if(!empty($term))
{
    $sql = $sql . " WHERE (FirstName LIKE '%$term%'
    OR LastName LIKE '%$term%')
    AND Status = 'Client'";

   
echo "
      <table style = 'color: white; background-color: black' border=2 width=100%>
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