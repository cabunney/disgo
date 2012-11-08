<?php
session_start();
?>
<!DOCTYPE html> 
<html>

<head>
	<title>Disgo | profile</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="white_theme.css" />

	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png" />
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>	
	
	<script type="text/javascript">
		$(function(){
			x = localStorage.getItem('userID');
			alert(x);		
			if (x != "") {
				$("#login_form").hide();
			}else{
				$("#profile").hide();
			}
		});
	</script>	
			
</head>
			
<body>

	<!-- start of page one -->			
		<div data-role="page" href="login" id="login_form">
			
				<div data-role="header">
					<h1>Login</h1>
			
					<a href="#signup" data-role="button" color="white" data-inline="true" class = "btn btn-mini pull-right">Sign up!</a>
				</div><!-- /header -->
			
				<div data-role="content">
				<form action="submit_login.php" method="post" id="login" data-ajax = "false">
				<h2 align="center" ><span>Enter Disgo!</span></h2>
				<input type="text" id="username" name="username" placeholder="Username" />
				<input type="password" id="password" name="password" placeholder="Password" />
									<p></p>		
				<input type="submit" value="Login" />
				</form>	
				<p></p>
				
				<script type="text/javascript">
		$("#login").unbind('pageinit');
		$("#login").bind('pageinit');
		</script>

			</div>  
			
				<?php
		$local_state = "";
		$global_state = "";
		$profile_state = "ui-btn-active";
		include 'footer.php';
	?>
		</div>
			<!-- /page one -->
			
			
			<!-- Start of second page -->
			<div data-role="page" href="signup" id="signup">
			
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
							<?php
		$local_state = "";
		$global_state = "";
		$profile_state = "ui-btn-active";
		include 'footer.php';
	?>
			</div><!-- /page two -->


<!-- start of page three -->

			<!-- display profile page with favorites, etc. -->
			
			<div data-role="page" href= "profile" id="profile">

				<div data-role="header">
					<h1>profile</h1>
				</div><!-- /header -->
					
				<div data-role="content">	
					
				</div><!-- /content -->

			</div>
	<!-- /page three -->

	<?php
		$local_state = "";
		$global_state = "";
		$profile_state = "ui-btn-active";
		include 'footer.php';
	?>

</body>
</html>