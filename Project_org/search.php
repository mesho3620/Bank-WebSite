<?php
include("TopBar.php");
?>
<head>
<title>First National Bank - FNB</title>
<link rel="icon" type="image/png" href="Pictures&Videos\Untitled-1.png"/>
<link rel=stylesheet href="https://s3-us-west-2.amazonaws.com/colors-css/2.2.0/colors.min.css">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="jquery-3.4.1.js"></script> 
<style>


/*Search css*/

.Search-Back{
	top : 15%;
	padding:50x;
	border:5px black;
	margin: 10px auto 0px auto;
	width : 80%;
	height: auto;
    overflow:auto ;
	
	  }
</style>

<script>
   
    function getRes()
    {
        jQuery.ajax(
        {
            url:"backend-search.php",
            data:"term="+$("#term").val(),
            type:"POST",
            success:function(data2)
            {
                $("#result").html(data2)
            }
        });
    }
    </script>
<body>
<div class="form-group">
<div style = "background-color: lightgrey">
	<div class = "Search-Back">

       <h1>Search for Clients/Employees info :</h1>
	   <br>

    <input type="search" name="term" id="term" onkeyup="getRes()" class="form-control" style="width:30%;">

    <div id="result"></div>
</div>
</div>
</div>
</body>
<?php include("BottomBar2.php");?>