<!DOCTYPE html> 
<html>
<head>
	<title>First National Bank</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="icon" type="image/png" href="Untitled-1.png"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' type='text/css' href='settings.css'>
	
	
</head>
<body onload="startTime()">

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
		<button onclick="window.location.href='Login.php'" id="login">Login</button>
	</div>
	
		<a href="#" class="search_properties_icon"><i class="fa fa-search-plus" style="color:black"></i></a>

	<div class="list">
	
		<table >
		
		<th><a href = "Welcome.php" id="defaultOpen"> Home </a></th>
		<th><a href = "AboutUs.php"> About Us </a></th>
		<th><a href = "ContactUs.php">Contact Us </a></th>
		<th><a href = "FindUs.php"> Find Us </a></th>
		<th> <a href = "Services.php"> Services >></a></th>
		<th> <a href = "Support.php"> Support >></a></th>
		
		</table>

	</div>
	
	
</script>
</body>
</html>