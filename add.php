<!DOCTYPE html> 
<html>

<head>
	<title>Disgo | Add New</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="blue">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="white_theme.css" />

	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">

	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
	
	

</head> 

	
<body> 

<!-- Start of first page: #one -->
<div data-role="" id="add1">
	<div data-role="header">
		<a href="index.php" id="ex" data-icon="custom" class = "top_bar_button"></a>
		<h1>Add New</h1>

	</div><!-- /header -->
	
	<div data-role="content">	
	
		<div>Title: <input type = "text" /></div>
		<div>Photo: <input type = "file" /></div>
		<div><a href = "location.php?place=New+Location"><button type = "button">Finish</button></a></div>
		

	</div><!-- /content -->
	<?php
		$local_state = "ui-btn-active ui-state-persist";
		$global_state = "";
		$profile_state = "";
		include 'footer.php'; 
	?>
</div><!-- /page one -->

<script type = "text/javascript">
</script>



</body>
</html>