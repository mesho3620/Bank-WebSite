<!DOCTYPE html> 
<html>
<head>
	<title>First National Bank</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="icon" type="image/png" href="Untitled-1.png"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' type='text/css' href='settings.css'>
	
	
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function (){
$("#login").on('click',function(){
$(".popup").toggle();
});
});
$(document).ready(function(){
$("#close").on('click',function(){
$(".popup").hide();
});
});
</script>
<style>
.container
			{
				position:absolute;
				top:20%;
				left:85%;
				transform: translate(-50%,-50%);
				text-align:center;
			}
.button
			{
				background:white;
				padding:10px 15px;
				color:gray;
				font-weight:bolder;
				text-transform:uppercase;
				text-decoration:none;
				font-size:18px;
				border-radius:5px;
				box-shadow:6px 6px 29px -4px rgba(0,0,0,0.75);
				transition:0.4s;
			}
			.button:hover
			{
				background:gray;
				color:white;
			}
			.popup
			{
				background:rgba(0 , 0 , 0 , 0.6);
				position:absolute;

				width:100%;
				height:100%;
				top:0;
				display:none;
				justify-content:center;
				align-items:center;
				text-align:center;
			}
			.popup-content
			{
				
				
				
				left:32%;
				top:35%;
				height:250px;
				width:500px;
				background:white;
				padding:20px;
				border-radius:5px;
				position:fixed;
			}
			input
			{
				margin:20px auto;
				display:block;
				width:50%;
				padding:8px;
				border:1px solid gray;
			}
			#close
			{
				position:absolute;
				top:-15px;
				right:-15px;
				background:white;
				height:20px;
				width:20px;
				border-radius:50%;
				box-shadow:6px 6px 29px -4px rgba(0,0,0,0.75);
				cursor:pointer;
			}
</style>
<body>

	<div class="img" >
	
		<img src="logo.png" width=12.5% height=12.5% onclick="openTab( event,'Home')" id="defaultOpen" >
		
		<div class="title-small" onclick="openTab( event,'Home')" id="defaultOpen" >
				<h1>First National Bank</h1>
			</div>
		
		<div class="title-big" onclick="openTab( event,'Home')" id="defaultOpen" >
				<h1>FNB</h1>
			</div>
		
		<input type="search" id="search_tx" placeholder="Type to Search...">
		<div id="txt" class="Time"></div>
		<a href="#" class="search_properties_icon"><i class="search2" style="color:black"></i></a>		
	    <button onclick="window.location.href='SignUp.php'" id="signup">Sign up</button>
		<button id="login">Login</button>

	</div>


	
		<a href="#" class="search_properties_icon"><i class="fa fa-search-plus" style="color:black"></i></a>

	<div class="list">
	
		<a href = "Welcome.php" id="defaultOpen"> Home </a>
		<a href = "AboutUs.php"> About Us </a>
		<a href = "ContactUs.php">Contact Us </a>
		<a href = "FindUs.php"> Find Us </a>
		<a href = "Services.php"> Services >></a>
		<a href = "Support.php"> Support >></a>

	</div>
	
		<div class="popup" id="popup"> 
			<div class="popup-content">
				<img src="images.jpg" id="close" width="30px">
				<img src="Untitled-1.png" width="50px">
				<input type="text" placeholder="Email Address">
				<input type="password" placeholder="Password">
				<a href="#" class="button">Login</a>
			</div> 
		</div>
	
	
</script>
</body>
</html>
