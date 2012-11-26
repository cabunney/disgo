<?php
//Set no caching
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
$time = time(); 
session_start();
?>

		<?php 
	$userID =  $_GET["userID"]; 
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

	<link rel="stylesheet" href="styleB.css?<?php echo $time;?>" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">


	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.easing.js"></script>
	<!--<script src="jquery.easing.compatability.js"></script>-->

	<script src="jqm-basic-carousel.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>

	<script src ="upload.js?<?php echo $time;?>"></script>

	
	

</head> 

<body> 

<!-- Start of first page: #one -->
<div data-role="page" id="index2">
			<script src="//cdn.optimizely.com/js/140191330.js"></script>
<script type="text/javascript">
var CE_SNAPSHOT_NAME = "Optimizely Disgo page: Old slider - no buttons";
</script>

<script type="text/javascript">
setTimeout(function(){var a=document.createElement("script");
var b=document.getElementsByTagName("script")[0];
a.src=document.location.protocol+"//dnn506yrbagrg.cloudfront.net/pages/scripts/0013/5826.js?"+Math.floor(new Date().getTime()/3600000);
a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>
	<div data-role="header">
		<!-- <a  id="locate" data-icon="custom" class = "top_bar_button" data-rel="popup" href="#popupBasic" data-position-to="window"></a>	 -->
		<a href ="#"><span ><span id = "latbox" class = "smallspan"></span>° N  <span id = "longbox" class = "smallspan"></span>° W</span></a>
		<h1 id = "header_title"><img src = "disgo_logo"></img></h1>
		<a href="add.php?<?php echo $time; ?>" id="add" data-icon="custom" class = "top_bar_button"></a>
	</div><!-- /header -->
	


	<div data-role="content">	
		

		<script type="text/javascript">
				$("#index2").unbind('pageinit');
				$("#index2").bind( 'pageinit',function(event){ 
					
					$("#index2").find("#profile").attr("href", "profile.php?userID="+localStorage.getItem('userID'));


				});
		</script>
		<!-- <div onclick = "distance(300,300,1)">Click here</div> -->
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
							$lat = $row["lat"];
							$long = $row["lng"];

							echo "<div id='slide-{$count}' name = {$lat} title = {$long} class='slide' style = 'background-image:url(uploads/{$filename});'><a href = 'location.php?id={$id}&user=&{$time}'  class = 'link_pic' data-ajax = 'false'><div class = 'slide_container'><div class = 'description'>{$title}</div><div class = 'info'></div></div></a></div>";
						    $count = $count + 1; 
						}

						mysql_free_result($result);
					?>
			</div>
		</div>
		<nav class="carousel-position">
			<span class="position" id = "dots">
				<!-- <em class="on">•</em> -->
<!-- 
				<?php 
					while ($count > 1) {
						echo "<em>•</em>";
					    $count = $count - 1; 
					}

				?>
				 -->
			</span>
		</nav>
		
		
		
<div data-role="popup" id="popup-message" data-theme="a" data-overlay-theme="a" class="ui-content">
    <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="remove" data-iconpos="notext" class="ui-btn-right">Close</a>
    
    <a  id="locate" data-icon="custom" data-ajax = "false" class = "top_bar_button" data-rel="popup" href="#popupBasic" data-position-to="window"></a>
    
    </div>
		
		
		
		
	<div data-role="popup" id="popupBasic">
		<p>location..</p>
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
				$(".carousel-wrapper").carousel();
			})(jQuery);	
$('.link_pic').live("mousedown", function() {
     window.optimizely.push(['trackEvent', 'click_link']);
});
				$('#add').click(function(){
		var link = $(this).attr('href');
	  		$.mobile.changePage(
	    		link,
	    	 {
	      allowSamePageTransition : true,
	      transition              : 'none',
	      showLoadMsg             : false,
	      reloadPage              : true
	    }
	  );
	});

			$("a[data-ajax='false']").bind("click",

    		function() {
		        if (this.href) {
		            location.href = this.href;
		            return false;
        	}
			});

	$(function () {
		$("#locate").click(function () {
			     	getLocation();
			     });
	 });

	function getLocation() {
		if (navigator.geolocation) {
	        navigator.geolocation.getCurrentPosition(showPosition);
		 } else {
			alert("Geolocation is not supported by this browser.").alert();
	     }
	 }

	function showPosition(position) {
		$("#popupBasic").append(position.coords.latitude + "<font-weight = bold>  latitude, " + position.coords.longitude + " longitude");
			 	//<div id = currLocation>position.coords.latitude + " latitude, " + position.coords.longitude + " longitude"</div>
			     //alert(position.coords.latitude + " latitude," + position.coords.longitude + " longitude");
			   //<div id=currLocation></div>
	}	

	$(document).ready(function() { 
		if (navigator.geolocation) {
	        navigator.geolocation.getCurrentPosition(getPosition);
		 } else {
			alert("Geolocation is not supported by this browser.").alert();
	     }

	     				$(".carousel-wrapper").carousel();

  		

	 })

	function getPosition(position) {
		// $("#popupBasic").append(position.coords.latitude + "<font-weight = bold>  latitude, " + position.coords.longitude + " longitude");
			 	//<div id = currLocation>position.coords.latitude + " latitude, " + position.coords.longitude + " longitude"</div>
			     //alert(position.coords.latitude + " latitude," + position.coords.longitude + " longitude");
			   //<div id=currLocation></div>
		$("#latbox").html(Math.round( position.coords.latitude));
				$("#longbox").html(Math.round( position.coords.longitude));


		$(".slide").each(function() {
  			var lat1 = parseFloat($(this).attr("name"));
  			var lon1 = parseFloat($(this).attr("title"));

			// var lat2 = $("#latbox").text();
			// var lon2 = $("#longbox").text();
			lat2 = position.coords.latitude;
			lon2 = position.coords.longitude;
		
			var R = 6371; 
			var dLat = toRad(lat2-lat1);
			var dLon = toRad(lon2-lon1);
			var lat1 = toRad(lat1);
			var lat2 = toRad(lat2);

			var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
			        Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2); 
			var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
			var dist = R * c;

				// $(this).html(dist);


			if (dist > 5) {
				$(this).remove();
			} else {
				$("#dots").append("<em>•</em>");
			}
		})

		function toRad(Value) {
		    /** Converts numeric degrees to radians */
		    return Value * Math.PI / 180;
		}

	}	



	
</script>

</body>
</html>