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
	<script src="jquery.easing.js"></script>
	<script src="jquery.easing.compatability.js"></script>

	<script src="jqm-basic-carousel.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>

	<script src ="upload.js?<?php echo $time;?>"></script>


</head> 

	
<body> 

<!-- Start of first page: #one -->
<div data-role="page" id="index2">
	<div data-role="header">
		<a  id="locate" data-icon="custom" class = "top_bar_button" data-rel="popup" href="#popupBasic" data-position-to="window"></a>
		<h1 id = "header_title"><img src = "disgo_logo"></img></h1>
		<a href="add.php?<?php echo $time; ?>" id="add" data-icon="custom" class = "top_bar_button"></a>
	</div><!-- /header -->
	


	<div data-role="content">	
		<div class="carousel-wrapper">
			<div class="carousel">
					<?php
						include("config2.php");

						$sql = "SELECT * from locations";

						$result = mysql_query($sql);

						if (!$result) {
						    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
						  
						}

						if (mysql_num_rows($result) == 0) {
						    echo "There are no disgos.";
					
						}
						$count = 0; 
						// While a row of data exists, put that row in $row as an associative array
						// Note: If you're expecting just one row, no need to use a loop
						// Note: If you put extract($row); inside the following loop, you'll
						//       then create $userid, $fullname, and $userstatus
						while ($row = mysql_fetch_assoc($result)) {
							$filename = $row["filename"];
							$id = $row["id"];
							$title = $row["title"];
							echo "<div id='slide-{$count}' class='slide' style = 'background-image:url(uploads/{$filename});'><a href = location.php?id={$id}' class = 'link_pic'><div class = 'slide_container'><div class = 'description'>{$title}</div><div class = 'info'></div></div></a></div>";
						    $count = $count + 1; 
						}

						mysql_free_result($result);
					?>
				
			</div>
		</div>
		<nav class="carousel-position">
			<span class="position">
				<em class="on">•</em>
				<?php 
					while ($count > 1) {
						echo "<em>•</em>";
					    $count = $count - 1; 
					}

				?>
			</span>
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
			(function($){
				$(".carousel-wrappper").carousel();
			})(jQuery);	



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