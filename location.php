<!DOCTYPE html> 
<html>

<head>
	<?php
		$place = $_GET['place'];
	?>
	<title>Disgo | <?php echo $place; ?></title> 
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
<div data-role="page" id="location">
	<div data-role="header">
		<a href="index.php" id="back" data-icon="custom" class = "top_bar_button"></a>
		<h1><?php echo $place; ?></h1>
		<a href="#" id="fav" data-icon="custom" class = "top_bar_button"></a>


	</div><!-- /header -->
	
	<div data-role="content">	
	
		

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