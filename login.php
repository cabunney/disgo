<?php
//Set no caching
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
$time = time(); 

?>

<!DOCTYPE html> 
<html> 
	<head> 
	<title>Disgo | Login</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="white_theme.css" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.min.css" />
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
</head> 
<body> 

<!-- Start of first page -->
<div data-role="page" id="login">

	<div data-role="header">
		<h1>Login</h1>
		<a href="#signup" data-role="button" data-inline="true" class = "btn btn-mini pull-right">Sign up!</a>
	</div><!-- /header -->

	<div data-role="content">	
		
	<form action="submit_login.php" method="post" id="login" data-ajax = "false">
						
	<h2 align="center" ><span>Enter the Disgo!</span></h2>
							
	<input type="text" id="username" name="username" placeholder="Username" />
								
	<input type="password" id="password" name="password" placeholder="Password" />
						<p></p>		
							
	<input type="submit" value="Login" />
	
	</form>	

	<p></p>
							
</div> <!-- /content -->
</div>  <!-- /page -->


<!-- Start of second page -->
<div data-role="page" id="signup">

	<div data-role="header">
		<h1>Signup</h1>
	</div><!-- /header -->

	<div data-role="content">	
			<form action="submit_signup.php" method="post" id="signup" data-ajax = "false">
						
	<h2 align="center" ><span>Get Started with Disgo</span></h2>
	
	<input type="text" id="email" name="email" placeholder="Your Email Address" />
							
	<input type="text" id="username" name="username" placeholder="Desired Username" />
								
	<input type="password" id="password" name="password" placeholder="Password" />
						<p></p>		
							
	<input type="submit" value="Get Started with Disgo!" />
	
	</form>	
	<p></p>	
		<p align="center"><a href="#login">Back to login.</a></p>	
	</div><!-- /content -->

</div><!-- /page -->
</body>

</html>