<!DOCTYPE html> 
<html>

<head>

	<?php
		include("config2.php");
		$place = $_GET['id'];
		$query2 = "SELECT * from locations where id = '".$place."'";
		$result2 = mysql_query($query2);
		$row2 = mysql_fetch_assoc($result2);
		$title = $row2["title"];
		$filename = $row2["filename"];
	?>


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
</head> 
<body> 

<div data-role="page" id="filter">

	<div data-role="header">
<!-- 	echo the user's username here instead of profile -->
		<h1>profile</h1>
	</div><!-- /header -->

	<div data-role="content">	
		
	<div class="ui-grid-c">
	
		<div class="ui-block-a">
<!-- 		put the user's image here -->
		</div>
		<div class="ui-block-b" "ui-block-c">
<!-- 		let the user set a tagline here, 140 characters or less -->
		</div>
		<div class="ui-block-d">
<!-- 		display the number of favorited places the user has -->
	</div>
	
	
		
	</div><!-- /content -->

	<?php
		$local_state = "";
		$global_state = "";
		$profile_state = "ui-btn-active";
		include '/Users/danielcochran/Documents/Learning/disgo/disgo/footer.php';
	?>
	

</div><!-- /page -->
<script type = "text/javascript">
	
</script>

</body>
</html>