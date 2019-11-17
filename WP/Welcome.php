<!DOCTYPE html> 
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' type='text/css' href='settings.css'>
	
	
</head>

<?php 
include ("TopMenu.php");
echo "<img class = 'mySlides' src = '1.jpg ' style = 'width :100%'>";
echo "<img class = 'mySlides' src = '2.jpg ' style = 'width :100%'>";
echo "<img class = 'mySlides' src = '3.jpg ' style = 'width :100%'>";
echo "<img class = 'mySlides' src = '4.jpg ' style = 'width :100%'>";
echo "<img class = 'mySlides' src = '5.jpg ' style = 'width :100%'>";
include ("BottomMenu.php");

?>

<body onload="startTime()">

	<div  id="back" >

	<div>

</div>
	
		

		
		
		
	</div>
	
<script>

var myIndex =0;
slide();
function slide (){
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
	setTimeout(carousel, 9000);
	
	
}
</script>
</body>
</html>