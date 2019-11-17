<!DOCTYPE html> 
<html>
<head>
	<title>First National Bank</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="icon" type="image/png" href="Untitled-1.png"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' type='text/css' href='settings - copy.css'>
	
	
</head>
<body onload="startTime()">


<a href="url" style = "position:absolute;top:29.5%;right:10.0%">Login</a>
<h1 style ="position:absolute;top:24.8%;right:8.8%" >/</h1>
<a href="url" style = "position:absolute;top:29.5%;right:4.5%">Register</a>
	<div class="img" >
	
		<img src="logo.png" width=12.5% height=12.5% onclick="openTab( event,'Home')" id="defaultOpen" >
		
		<div class="title-small" onclick="openTab( event,'Home')" id="defaultOpen" >
				<h1>FNB</h1>
			</div>
		
		<div class="title-big" onclick="openTab( event,'Home')" id="defaultOpen" >
				<h1>First National Bank</h1>
			</div>
		
		<input type="search" id="search_tx" placeholder="Type to Search...">
		<div id="txt" class="Time"></div>
		<a href="#" class="search_properties_icon"><i class="search2" style="color:black"></i></a>
	</div>
	
		<a href="#" class="search_properties_icon"><i class="fa fa-search-plus" style="color:black"></i></a>

	<div class="list">
	
		<table >
		
		<th><a href = "welcome.php" id="defaultOpen"> Home </a></th>
		<th><a href = "AboutUs.php"> About Us </a></th>
		<th><a href = "ContactUs.php">Contact Us </a></th>
		<th><a href = "FindUs.php"> Find Us </a></th>
		<th> <a href = "services.php"> Services >></a></th>
		<th> <a href = "support.php"> Support >></a></th>
		
		</table>

	</div>
	
	
	
	
  <div  class="Lower-tab" >


		
		
				<div class = "Main-Branch-Box" style = " left: 50px;top : 0px;">
					<h1 style =" color: blue">SubLinks : </h1>

</div>

<a href = "welcome.php" style = "position : absolute; left:60px; top:100px ;color: white">Home</a>
<a href = "register.php" style = "position : absolute; left:60px; top:180px ;color: white">Register</a>
<a href = "about us.php" style = "position : absolute; left:200px; top:100px ;color: white">About us</a>
<a href = "contact us.php" style = "position : absolute; left:200px; top:180px ;color: white">Contact us</a>
<a href = "services.php" style = "position : absolute; left:350px; top:100px ;color: white">Services</a>
<a href = "support.php" style = "position : absolute; left:350px; top:180px ;color: white">Support</a>

		
		
		<img src="FB.png" width=5.5% height=18.5% onClick="window.open('https://www.facebook.com/', '_blank')" style = "left : 800px; top: 70px;">
		<img src="twitter.png" width=5.5% height=18.5% onClick="window.open('https://www.twitter.com/', '_blank')" style = " left :708px; top: 170px;" >
		<img src="instagram.png" width=5.5% height=18.5% onClick="window.open('https://www.instagram.com/', '_blank')" style = "left : 800px; top: 70px;">
		<img src="reddit.png" width=5.5% height=18.5% onClick="window.open('https://www.reddit.com/', '_blank')" style = "left : 708px; top: 170px;">

	<div class = "Main-Branch-Box" style = " left: 500px;top:20px;">
				<h3 style ="color: blue	 ">Main Branch: </h3>
				<hr>
				<p style ="color: white	 ">3, First Place, Kerk &, Simmonds St, Bank City, Johannesburg, 2000, South Africa</p>
								<hr>

				<h3 style ="color: red">HotLine : 19988</h3>
				
				</div>
				
				
				
	<div class="mapouter" style="position:absolute;left: 1150px; top: 30px;">
	<div class="gmap_canvas">
	<iframe  width="350" height="250"  id="gmap_canvas"
	src="https://maps.google.com/maps?q=3%2C%20First%20Place%2C%20Kerk%20%26%2C%20Simmonds%20St%2C%20Bank%20City%2C%20Johannesburg%2C%202000%2C%20South%20Africa&t=&z=13&ie=UTF8&iwloc=&output=embed"
	frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
	<style>
	.mapouter{position:relative;text-align:right;height:250px;width:350px;}.gmap_canvas {overflow:hidden;background:none!important;height:250px;width:350px;}
	</style>
	</div>
	</div>
				<div class ="Divider" style = "top: 55px;left:20px"></div>
			
			<div class ="Divider" style = "top: 55px;left:480px"></div>

			<div class ="Divider" style = "top: 55px;left:750px"></div>
			
			<div class ="Divider" style = "top: 55px;left:1100px"></div>

			
</div>



<script>

var myIndex =0;
carousel();
function carousel (){
	var i ;
	var x = document.getElementsByClassName("mySlides");
	for(i =0 ;i< x.length; i++){
		x[i].style.display = "none";
		
	}
	
	myIndex ++;
	if (myIndex>x.length ){
		myIndex =1;
		
	}
	x[myIndex -1 ].style.display= "block";
	setTimeout(carousel, 6000);
	
	
}

function check()
{
var x=document.getElementById('inputem').value;
if(x=="")
{
alert('Enter your Email');
}
var y=document.getElementById('inputpw').value;
if(y=="")
{
alert('Fill your Password');
}

}


function startTime() {
  var today = new Date();
  var hours = today.getHours();
  var minutes = today.getMinutes();
  
  minutes = checkTime(minutes);
  
  document.getElementById('txt').innerHTML =
  "Time: "+hours + ":" + minutes 
  var t = setTimeout(startTime, 1000);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}

function openTab(evt,tabName) 
{
	var i,tablinks;
	reset();
  
	tablinks = document.getElementsByClassName("tablinks");
	
	 for (i = 0; i < tablinks.length; i++) 
	 {
		
		tablinks[i].className = tablinks[i].className.replace("active","");
	 
	 }
  
	document.getElementById(tabName).style.display = "block";
	  evt.currentTarget.className += " active";
}

function reset()
{

	var tabcontent;
	tabcontent = document.getElementsByClassName("tabcontent");
	
	for (i = 0; i < tabcontent.length; i++) 
	{
	
		tabcontent[i].style.display = "none";
	
	}
}
document.getElementById("defaultOpen").click();


</script>
</body>
</html>