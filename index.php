<?php
//Set no caching
// header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
// header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
// header("Cache-Control: no-store, no-cache, must-revalidate"); 
// header("Cache-Control: post-check=0, pre-check=0", false);
// header("Pragma: no-cache");
$time = time(); 
// session_start();
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
	<link rel="stylesheet" href="bootstrap.css?<?php echo $time;?>" />

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css?<?php echo $time;?>" />
	<link rel="stylesheet" href="white_theme.css?<?php echo $time;?>" />
	<link rel="stylesheet" href="jqm-icon-pack-2.1.2-fa.css">

	<link rel="stylesheet" href="style.css?<?php echo $time;?>" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">



	<script src="jquery-1.8.2.min.js"></script>
			
	<!--<script src="jquery.easing.js"></script>-->

	<!--<script src="jquery.easing.compatability.js"></script>-->

	<!--<script src="jqm-basic-carousel.js"></script>-->
	<script src="jquery.mobile-1.2.0.js"></script>

	<script src ="upload.js?<?php echo $time;?>"></script>


	
	

</head> 

<body> 

<!-- Start of first page: #one -->
<div data-role="page" id="index2">
		<script src="//cdn.optimizely.com/js/140191330.js"></script>
<script type="text/javascript">
var CE_SNAPSHOT_NAME = "Optimizely Disgo page: New slider - with buttons, and black bar with link";
</script>

<script src="bootstrap.js"></script>

<script type="text/javascript">
setTimeout(function(){var a=document.createElement("script");
var b=document.getElementsByTagName("script")[0];
a.src=document.location.protocol+"//dnn506yrbagrg.cloudfront.net/pages/scripts/0013/5826.js?"+Math.floor(new Date().getTime()/3600000);
a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>

	<div data-role="header">
		<!-- <a  id="locate" data-icon="custom" class = "top_bar_button" data-rel="popup" href="#popupBasic" data-position-to="window"></a>	 -->
		<!-- <a href ="#" class = "no-border"><span><span class = "pull-left">Current location: </span><span id = "latbox" class = "smallspan"></span><span class = "pull-left">° N  </span><span id = "longbox" class = "smallspan"></span><span class = "pull-left">° W</span></a> -->
		
		<a href="index.php" data-role="button" data-mini = "true" data-icon="refresh" data-ajax = 'false' data-iconpos=""><span class = "left_header_button">Refresh</span></a>
		<h1 id = "header_title"><img src = "disgo_logo"></img></h1>
		<a href="add.php" data-icon="plus" data-iconpos="right" data-ajax = "false" id = "add_new_header">Add new</a>
		<!-- <a href="add.php?<?php echo $time; ?>" data-icon="gear" data-theme="b" class="ui-btn-right top_bar_button top_bar_button2">Add new</a> -->
	</div><!-- /header -->
	


	<div data-role="content">	
		

		<script type="text/javascript">
				$("#index2").unbind('pageinit');
				$("#index2").bind( 'pageinit',function(event){ 
					
					$("#index2").find("#profile").attr("href", "profile.php?userID="+localStorage.getItem('userID'));


				});
		</script>
		<!-- <div onclick = "distance(300,300,1)">Click here</div> -->
		<div id = "current_coords" class = "alert alert-info"></div>
		<div id="myCarousel" class="carousel slide" style = "display:none;">
		  <!-- Carousel items -->
		  <div class="carousel-inner">
		   <!--  <div class="active item">
		    	<img src = "uploads/1352420340hoover.jpeg">
		    	<div class = "carousel-caption"><h4>Comment1</h4><p>Content</p></div>
		    </div>

		    <div class="item">Two</div>
		    <div class="item">End</div> -->

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
						// $locations =  
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

							echo "<div class = 'item' name = {$lat} title = {$long}><div class = 'bounding-box' style = 'background-image:url(uploads/{$filename});'></div><div class ='carousel-caption'><h4><a href = 'location.php?id={$id}&user=&{$time}'  class = 'link_pic' data-ajax = 'false'><span class = 'place_title'>{$title}</span><span class ='pull-right right_arrow_link'>&rsaquo;</span><span class = 'distance_away pull-right'></span></a></h4></div></div>";
						    $count = $count + 1; 
						}

						mysql_free_result($result);
					?>
		  </div>
		  <!-- Carousel nav -->
		  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
		</div>
		
		
		
		
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
			// (function($){
			// 	$(".carousel-wrapper").carousel();
			// })(jQuery);	


window.optimizely = window.optimizely || [];
$('.carousel-control').click( function() {
     window.optimizely.push(['trackEvent', 'swipe']);
    
});
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

$(document).bind('pageshow', function(event){
		setup();
  		

	 })

	function setup(callback) {
		// $('.item').first().addClass('active');
		var h = $( window ).height();
		h = h-71-10;

		$('.bounding-box').each(function() {
			$(this).css('height',h);
		})

		if (navigator.geolocation) {
	        navigator.geolocation.getCurrentPosition(getPosition);
		 } else {
			alert("Geolocation is not supported by this browser.").alert();
	     }

	     // $(".carousel-wrapper").carousel();
	    
	     // $('.carousel').carousel({
	     // 	interval: false
	     // });
	     
	     // callback();

		     $("#myCarousel").show("slow",function(){
	    			 // $('.item').addClass('active');
	    			 $('.carousel').carousel({
				     	interval: false
				     })
			 		
 		 });
		     
	}

	setup(function() {
		
		// var name = $(".active .carousel-caption h4").text();
		// alert(name);
		
	});

	function getPosition(position) {
		// $("#popupBasic").append(position.coords.latitude + "<font-weight = bold>  latitude, " + position.coords.longitude + " longitude");
			 	//<div id = currLocation>position.coords.latitude + " latitude, " + position.coords.longitude + " longitude"</div>
			     //alert(position.coords.latitude + " latitude," + position.coords.longitude + " longitude");
			   //<div id=currLocation></div>
		$("#current_coords").html("Your current location: <strong>" + Math.round( position.coords.latitude) + "° N&nbsp" + Math.round( position.coords.longitude) + "° W </strong>");
		$("#longbox").html(Math.round( position.coords.longitude));

		var test = 0; 
		$(".item").each(function() {
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
				if ($(".item").length == 1) {
					$(this).remove(); 
					$('<div class = "alert alert-error alert-block"><h4>Oh snap!</h4> There are no Disgos within 5km of your current location.</div><a href="add.php" type="button" data-role="button" data-icon="plus" data-inline="true" data-iconpos="right" data-ajax = "false" class = "no_disgo_add">Add a Disgo for your current location</a>').insertAfter('#myCarousel');
					$("#myCarousel").remove();
					$("#add_new_header").remove();


				} else {
					$(this).remove();
				}
				

			} else if (test == 0) {
				$(this).addClass('active');
				test = 1;
				$(this).find(".distance_away").text(Math.round(dist * 100)/100+ " km away");
			} else {
				$(this).find(".distance_away").text(Math.round(dist * 100)/100 + " km away");
			}

			if ($(".item").length == 1) {
				$('.carousel-control').remove();
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