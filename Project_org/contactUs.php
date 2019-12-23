<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>First National Bank - Contact us</title>
<link rel="icon" type="image/png" href="Pictures&Videos/Untitled-1.png"/>
</head>
<?php
ini_set('display_errors',0);
ini_set('track_errors',1);
ini_set('display_startup_errors',1);
ini_set('log_errors',1);
ini_set('error_log',dirname(__FILE__).'/log.txt');	
error_reporting(-1);
error_reporting(E_ALL | E_STRICT);



include'TopBar.php';
?>
<style>
p{
  font-family: "Times New Roman", Times, serif;
  font-weight: bold;
  
}

.imgContact
{ 
	background-color: lightgray;
	width: 1000px;
	height: 300px;
  border: 15px solid black;
  padding: 50px;
  margin: 20px;
}


.list
{
	background-color:lightgray;
	width:101%;
}


#paragraphMain 
{
  color:white;
  padding:0.5%;
  background:url(Pictures&Videos/contact.jpg) no-repeat center fixed;
	background-size:cover;
}

#heading 
{
 color:black;
}


</style>
<html>
<body>
<div id="Contact" class="tabcontent">

<div  id="backContact">
	
		<div id="backgrey" ><br>
		
  <div class="list">

  <h1 id="heading"><b>Contact us :<b></h1>
  
  <p>Our Customer Service Officer will be happy to assist you in answering all your questions on benefits and features of our products and services.</p> 
  
  <ul>
	<li><img src="Pictures&Videos/telephone.png" width=1.5% height=3% class = "aligning"></li>
 <p id = "paragraphMain"><b>+20 0101 240 0061 </b> </p>
 
	<li>	<img src="Pictures&Videos/mail.png" width=1.5% height=3% class = "aligning"></li>
				  <p id = "paragraphMain"><b>contactus_FNB@hotmail.com</b></p>
				  
				  </ul>
				  
	
<hr>
	</div>
		
	<div class="imgContact">
	
	<h3 id="heading"><b>Marketing and Sales<b></h3>
	
	<ul>
	<li><p id = "paragraphMain">For Product Inquiries: 920000891  </p></li>	
	<li><p id = "paragraphMain">For Product Sales: 8002441005  </p></li>	

	</ul>
	<br>	
	<h3 id="heading"><b>General Inquiries & Customer Support<b></h3>
	
	<ul>
	<li><p id = "paragraphMain">Inside The Country : 8001160131  </p></li>
	<li><p id = "paragraphMain">Outside the Kingdom: + 966 9 2000 1000  </p></li>
	</ul>
	<br><br>
  </div>	
  </div>		
  </div>
  </div>
  </body>
  </html>
  <?php
include'BottomBar.php';
?>