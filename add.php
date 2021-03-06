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
	<title>Disgo | Add New</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="blue">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 


	<link rel="stylesheet" href="jquery.mobile-1.2.0.css?<?php echo $time;?>" />
	<link rel="stylesheet" href="white_theme.css?<?php echo $time;?>" />
	<link rel="stylesheet" href="jqm-icon-pack-2.1.2-fa.css">


	<link rel="stylesheet" href="style.css?<?php echo $time;?>" />
		<link rel="stylesheet" href="bootstrap.css?<?php echo $time;?>" />

	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">

	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>

	<script src ="upload.js?<?php echo $time;?>"></script>
	
	

</head> 

	
<body> 
	
	

<!-- Start of first page: #one -->
<div data-role="page" id="add1">
	<div data-role="header">
		<!-- <a href="index.php" id="ex" data-icon="custom" class = "top_bar_button ex_button" data-ajax = "false"></a> -->
		<a href="index.php" data-icon="delete" data-iconpos="right" data-ajax = "false">Cancel</a>
		<h4  class = "header_title">Add New</h4>

	</div><!-- /header -->
	
<div data-role="content">	


  <div class="upload_form_cont">

		 <form id="upload_form" enctype="multipart/form-data" method="post" action="upload.php" class = "add_form">
			<input type="hidden" name="long" id="long" >
			<input type="hidden" name="lat" id="lat" >
			<div id = "current_coords" class = "alert alert-info"></div>

		
		 	<table class = "form_table table"> 
		 	<thead>
		 		<!-- <tr><th class = "large_grey"><div class = "single_space push_right">Longitude: <span id = "long1">0</span>° N <br />Latitude: <span id = "lat1">0</span>° W</div></th></tr> -->
		 	</thead>
			<tbody>
				<!-- <tr class = "row_label">
					<td><label for="title">Name of current place:</label></td>
				</tr> -->
				<!-- <tr>
					<td><label for="long">Longitude: </label><input type="text" name="long" id="long" value = "10" /></td>
				</tr>
				<tr>
					<td><label for="lat">Latitude: </label><input type="text" name="long" id="lat" /></td>
				</tr> -->

				<tr>
					<td><div class="well well-small">
  						<h4><span class="badge badge-info label_table">1</span>Name this Disgo:</h2>
							<p><input type="text" name="title" id="title" placeholder="Name of current place..." class = "title"/></p></div>

						</td>
				</tr>
				<tr class = "row_label">
					<td><div class="well well-small push_up">
  						<h4><span class="badge badge-info label_table">2</span>Snap an image:</h4>
							<p> <div><input type="file" name="image_file" id="image_file" onchange="fileSelected();" /></div></p></div>
							 <div id="fileinfo">
                        <div id="filename"></div>
                        <div id="filesize"></div>
                        <div id="filetype"></div>
                        <div id="filedim"></div>
                    </div>
                    <div id="error">You should select valid image files only!</div>
                    <div id="error2">An error occurred while uploading the file</div>
                    <div id="abort">The upload has been canceled by the user or the browser dropped the connection</div>
                    <div id="warnsize">Your file is very big. We can't accept it. Please select more small file</div>

                    <div id="progress_info">
                        <div id="progress"></div>
                        <div id="progress_percent">&nbsp;</div>
                        <div class="clear_both"></div>
                        <div>
                            <div id="speed">&nbsp;</div>
                            <div id="remaining">&nbsp;</div>
                            <div id="b_transfered">&nbsp;</div>
                            <div class="clear_both"></div>
                        </div>
                        <div id="upload_response"></div>
                    </div>
						</td>

					
				</tr>
				
			
		    	
		    </tbody>
		    </table>
			</div>
		    <div id = "submit_div" class = "push_up_ex">
		    	<input type="button" id = "push_button" class = "btn btn-large" value="Create Disgo!" onclick="startUploading()" />
			</div>
                    
           </form>
		<script type = 'text/javascript'>
	

			$(function () {
			     $(document).ready(function () {
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
			 	
			 	//<div id = currLocation>position.coords.latitude + " latitude, " + position.coords.longitude + " longitude"</div>
			 		// $("#long1").html(position.coords.longitude);
			 		// $("#lat1").html(position.coords.latitude);
			 		$("#current_coords").html("Your current location: <strong><span id = 'lat1'>" + Math.round( position.coords.latitude) + "</span>° N&nbsp<span id = 'long1'>" + Math.round( position.coords.longitude) + "</span>° W </strong>");
					$("#longbox").html(Math.round( position.coords.longitude));
			 		$("#lat").val(position.coords.latitude);
			 		$("#long").val(position.coords.longitude);


 				// $("#long1").replaceWith(position.coords.longitude);	
 				// $("#lat1").replaceWith(position.coords.latitude);
 			}		 	



</script>
		
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
</script>
</body>
</html>


</body>
</html>