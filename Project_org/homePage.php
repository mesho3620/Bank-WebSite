<?php
ini_set('display_errors',0);
ini_set('track_errors',1);
ini_set('display_startup_errors',1);
ini_set('log_errors',1);
ini_set('error_log',dirname(__FILE__).'/log.txt');	
error_reporting(-1);
error_reporting(E_ALL | E_STRICT);



include "TopBar.php";

?>
<head>

<script>
.mySlideShow{
display:none;

}
</script>

</head>

<img src="Slideshow/z.jpg" class="mySlideShow" style="width:100%; heigth:50%;">
<img src="Slideshow/w.jpg" class="mySlideShow" style="width:100%; heigth:50%;">
<img src="Slideshow/x.jpg" class="mySlideShow" style="width:100%; heigth:50%;">
<img src="Slideshow/y.jpg" class="mySlideShow" style="width:100%; heigth:50%;">




<script type ='text/javascript'>

var myIndex=0;
image();

function image()
{
		var i;
		var x=document.getElementsByClassName('mySlideShow');
		for(i=0;i<x.length;i++){
			x[i].style.display='none';
		}
		myIndex++;
		if(myIndex > x.length){
			myIndex=1;
		}
		x[myIndex-1].style.display='block';
		setTimeout(image,5000);
}
</script>

<?php
include "BottomBar.php";
?>