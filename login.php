<body class='background'>
	<p id="userID"></p>
		<!-- changed form action from submit_login.php to index.php -->
	<div id = "logindiv">
		<form action="submit_login.php" method="post" id="login" data-ajax = "false">	
			<span>
				<img class="logo" src = "disgo_logo"></img>
				<h4 align="center" style="font-style:italic;">Share What You Know</h4>
			</span>
								
			<input style="margin-bottom:-8px; padding-bottom:5px;"type="text" id="username" name="username" placeholder="username" autocapitalize="off" class="no-bottom-left-corner no-bottom-right-corner"/>
									
			<input style ="padding-bottom:5px;" type="password" id="password" name="password" placeholder="password" autocapitalize="off" class="no-top-left-corner no-top-right-corner"/>
							<p></p>		
								
			<input type="submit" value="Login" />
		</form>	

		
		<!-- added stuff -->
		
		
	<!-- SUPER IMPORTANT FOR LOCAL STORAGE! -->	
		
			<p class = "switchFields"><a href="#" id="skip" data-ajax = "false">Don't have a login?</a></p>
	</div>
		
		<!-- /added stuff -->
		
	<div id ="signupdiv" style = "display:none;">	
		<form action="submit_signup.php" method="post" id="signup" data-ajax = "false">	
				<span>
					<img class="logo" src = "disgo_logo"></img>
					<h4 align="center" style="font-style:italic;">Share What You Know</h4>
				</span>
						
			<input style = "margin-bottom:-8px; padding-bottom:5px;" type="text" id="email" name="email" placeholder="email address" autocapitalize="off" class="no-bottom-left-corner no-bottom-right-corner"  />
									
			<input style = "margin-bottom:-8px; padding-bottom:5px;" type="text" id="username" name="username" placeholder="username" autocapitalize="off" class="no-bottom-left-corner no-bottom-right-corner no-top-left-corner no-top-right-corner"  />
										
			<input style="padding-bottom:5px;" type="password" id="password" name="password" placeholder="password" autocapitalize="off" class="no-top-left-corner no-top-right-corner" />
								<p></p>		
									
			<input type="submit" value="Get Started with Disgo!" />
			
		</form>	
		<p></p>
	
		<p class = "switchFields"><a href="#login" id = "backtologin">Already have a login?</a></p>	
	
	</div>
<script type = "text/javascript">
	$("#login").unbind('pageinit');
	$("#login").bind('pageinit');

	$('#skip').click(function(){
		$("#signupdiv").show();
		$(".placeholder").hide();
		$("#logindiv").hide();
	});

	$('#backtologin').click(function(){
		$("#signupdiv").hide();
		$("#logindiv").show();
	});
</script>
</body>