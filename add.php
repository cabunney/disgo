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

	<link rel="stylesheet" href="style.css?<?php echo $time;?>" />
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
		<a href="index.php" id="ex" data-icon="custom" class = "top_bar_button ex_button" data-ajax = "false"></a>
		<h1>Add New</h1>

	</div><!-- /header -->
	
<div data-role="content">	


  <div class="upload_form_cont">
		 <form id="upload_form" enctype="multipart/form-data" method="post" action="upload.php" class = "add_form">
		 	<table class = "form_table"> 
			<tbody>
				<!-- <tr class = "row_label">
					<td><label for="title">Name of current place:</label></td>
				</tr> -->
				<tr>
					<td><input type="text" name="title" id="title" placeholder="Name of current place..." class = "title"/></td>
				</tr>
				<tr class = "row_label">
					<td><div><label for="image_file">Select an image for this location.</label></div></td>
				</tr>
				<tr>
					<td>
						<div>
                        
                        <div><input type="file" name="image_file" id="image_file" onchange="fileSelected();" /></div>
                    </div>
                    
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
		    <div id = "submit_div">
		    	<input type="button" value="Create Disgo!" onclick="startUploading()" />
			</div>
                    
           </form>
		<script type = 'text/javascript'>
	// $('.ex_button').click(function(){
	// 	var link = $(this).attr('href');
	//   $.mobile.changePage(
	//     link,
	//     {
	//       allowSamePageTransition : true,
	//       transition              : 'none',
	//       showLoadMsg             : false,
	//       reloadPage              : true
	//     }
	//   );
	// });


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