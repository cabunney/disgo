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
	<title>Disgo</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="blue">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css?<?php echo $time;?>" />
	<link rel="stylesheet" href="white_theme.css?<?php echo $time;?>" />

	<link rel="stylesheet" href="style.css?<?php echo $time;?>" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">

	
	<script src="jquery-1.8.2.min.js"></script>
	<!-- <script src="jquery.easing.js"></script>
	<script src="jqm-basic-carousel.js"></script> -->
	<script src="jquery.mobile-1.2.0.js"></script>

	<script src ="upload.js?<?php echo $time;?>"></script>


</head> 

	
<body> 

<!-- Start of first page: #one -->
<div data-role="page" id="index2">
	<div data-role="header">
		<a  id="locate" data-icon="custom" class = "top_bar_button" data-rel="popup" href="#popupBasic" data-position-to="window"></a>
		<h1 id = "header_title"><img src = "disgo_logo"></img></h1>
		<a href="add.php" id="add" data-icon="custom" class = "top_bar_button"></a>
	</div><!-- /header -->
	
	<div data-role="content">	
		<div class="carousel-wrapper">
			<div class="carousel">
				<div id="slide-0" class="slide" style = "background-image:url('memchu.jpeg');"><a href = "location.php?place=Memorial+Church" class = "link_pic"><div class = "slide_container"><div class = "description">Memorial Church</div><div class = "info">12 comments | 8 photos | 0.7 miles away</div></div></a></div>
				<div id="slide-1" class="slide" style = "background-image:url('hoover.jpeg');"><a href = "location.php?place=Hoover+Tower" class = "link_pic"><div class = "slide_container"><div class = "description">Hoover Tower</div><div class = "info">10 comments | 200 photos | 0.6 miles away</div></div></a></div>
			</div>
		</div>
		<nav class="carousel-position">
			<span class="position"><em class="on">•</em><em>•</em></span>
		</nav>
	<div data-role="popup" id="popupBasic">
		<p>Your location is ...<p>
	</div>
	</div><!-- /content -->
	<?php
		$local_state = "ui-btn-active ui-state-persist";
					$global_state = "";
					$profile_state = "";
		include 'footer.php'; 
	?>
</div><!-- /page one -->

<script type = "text/javascript">
			// (function($){
			// 	$(".carousel-wrappper").carousel();
			// })(jQuery);	



			// 	$(function () {
			//     $("#locate").click(function () {
			//          alert("Geolocation is not supported by this browser.");
			//     });
			// });

			// function getLocation() {
			//     if (navigator.geolocation) {
			//        navigator.geolocation.getCurrentPosition(showPosition);
			//     } else {
			//         alert("Geolocation is not supported by this browser.");
			//     }
			// }

			// function showPosition(position) {
			//     alert(position.coords.latitude + "latitude" + position.coords.longitude + "longitude");
			   
			// }
</script>



</body>
</html>