
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
		<h1>Memorial Church</h1>
		<a href="#" id="fav" data-icon="custom" class = "top_bar_button"></a>


	</div>
	
	<div data-role="content">	
	
		<!-- photo container --> 
		<div class="disgoProfilePhoto">
		<img src="http://f.cl.ly/items/1g0H0B1y042l2K1m1d2Y/museosoumaya.png"/>
			<p class="disgoProfilePhotoText">10 comments | 200 photos <br>0.6 miles away</p>
		</div>
		
		<!-- add a comment popup --> 

		<a href="#popupLogin" data-rel="popup" id="form" data-role="button" data-transition="pop" data-inline="true">Contribute</a>
		<div id = "popupLogin" data-role="popup" data-theme="a" data-overlay-theme="c">
		<form action="#" method="get">
		<div data-role="fieldcontain" class="ui-hide-label"><textarea cols="40" rows="8" maxlength="140" name="textarea" placeholder="140 characters or less"></textarea></div>
				<fieldset class="ui-grid-a">
				<div class="ui-block-a"><button type="submit" data-theme="c">Cancel</button></div>
				<div class="ui-block-b"><button type="submit" data-theme="b">Submit</button></div>	   
			    </fieldset>
		</form>
		</div>
		<!-- move to photoswipe gallery !-->


		<! -- add a div container for new comments -->
		<! -- add a div container for new comments -->

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