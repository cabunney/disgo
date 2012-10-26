<!DOCTYPE html> 
<html>

<head>
	<title>Disgo</title> 
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
	<script src="jquery.easing.js"></script>
	<script src="jqm-basic-carousel.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
	

</head> 

	
<body> 

<!-- Start of first page: #one -->
<div data-role="page" id="one">
	<div data-role="header">
		<a href="index.php" id="locate" data-icon="custom" class = "top_bar_button"></a>
		<h1 id = "header_title"><img src = "disgo_logo" /></h1>
		<a href="index.php" id="add" data-icon="custom" class = "top_bar_button"></a>

	</div><!-- /header -->
	<div data-role="content">	
		<div class="carousel-wrapper">
			<div class="carousel">
				<?php
					$image_1 = "memchu.jpeg";
					$image_2 = "hoover.jpeg";
				?>
				<div id="slide-0" class="slide" style = "background-image:url('<?php echo $image_1; ?>');"><a href = "profile.php" class = "link_pic"><div class = "slide_container"><div class = "description">Memorial Church</div><div class = "info">12 comments | 8 photos | 0.7 miles away</div></div></a></div>
				<div id="slide-1" class="slide" style = "background-image:url('<?php echo $image_2; ?>');"><a href = "profile.php" class = "link_pic"><div class = "slide_container"><div class = "description">Hoover Tower</div><div class = "info">10 comments | 200 photos | 0.6 miles away</div></div></a></div>
			</div>
		</div>
		<nav class="carousel-position">
			<span class="position"><em class="on">•</em><em>•</em></span>
		</nav>
		<script type = "text/javascript">
			(function($){
				$(".carousel-wrappper").carousel();
			})(jQuery);	
		</script>

	</div><!-- /content -->
	<?php
		$local_state = "";
		$local_state = "ui-btn-active";
		$global_state = "";
		$profile_state = "";
		include 'footer.php'; 
	?>
</div><!-- /page one -->





</body>
</html>