	<p id="userID"></p>
		<!-- changed form action from submit_login.php to index.php -->
	<div id = "logindiv">
		<form action="submit_login.php" method="post" id="login" data-ajax = "false">
							
			<span>
				<img style="line-height:50%; margin-left: 110px; margin-bottom:-20px;" src = "disgo_logo"></img>
				<h4 align="center" style="font-style:italic;">Share What You Know</h4>
			</span>
								
			<input type="text" id="username" name="username" placeholder="Username" autocapitalize="off"/>
									
			<input type="password" id="password" name="password" placeholder="Password" autocapitalize="off"/>
							<p></p>		
								
			<input type="submit" value="Login" />
		</form>	

		
		<!-- added stuff -->
		
		
	<!-- SUPER IMPORTANT FOR LOCAL STORAGE! -->	
		
			<p align="center"><a href="#" id="skip" data-ajax = "false">Don't have a login?</a></p>
	</div>
		
		<!-- /added stuff -->
		

<div id ="signupdiv" style = "display:none;">	
	<form action="submit_signup.php" method="post" id="signup" data-ajax = "false">
						
			<span>
				<img style="line-height:50%; margin-left: 110px; margin-bottom:-20px;" src = "disgo_logo"></img>
				<h4 align="center" style="font-style:italic;">Share What You Know</h4>
			</span>
					
		<input type="text" id="email" name="email" placeholder="Your Email Address" />
								
		<input type="text" id="username" name="username" placeholder="Desired Username" />
									
		<input type="password" id="password" name="password" placeholder="Password" />
							<p></p>		
								
		<input type="submit" value="Get Started with Disgo!" />
		
	</form>	
	<p></p>
	

	<p align = "center"><a href="#login" id = "backtologin">Already have a login?</a></p>	


</div><!-- /content -->

<script type = "text/javascript">
	$("#login").unbind('pageinit');
	$("#login").bind('pageinit');

	$('#skip').click(function(){
		$("#signupdiv").show();
		$("#logindiv").hide();
	});

	$('#backtologin').click(function(){
		$("#signupdiv").hide();
		$("#logindiv").show();
	});
</script>



