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
	<?php
		include("config2.php");
		$place = $_GET['id'];
		$query2 = "SELECT * from locations where id = '".$place."'";
		$result2 = mysql_query($query2);
		$row2 = mysql_fetch_assoc($result2);
		$title = $row2["title"];
		$filename = $row2["filename"];
	?>

	<title>Disgo | <?php echo $title; ?></title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="blue">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="white_theme.css" />
	

	<link rel="stylesheet" href="style.css?<?php echo $time; ?>" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
	
</head> 


<body> 

<!-- Start of first page: #one -->
<div data-role="page" id="location1">
	<div data-role="header">
		<a href="index.php" id="back" data-icon="custom" class = "top_bar_button" data-ajax = "false" ></a>
		<h1><?php echo $title?></h1>
		<a href="#" id="fav" data-icon="custom" class = "top_bar_button"></a>
	</div>
	
	<div data-role="content">	
	
		<!-- photo container --> 
		<div class="disgoProfilePhoto">
		<img src="uploads/<?php echo $filename; ?>"/>
			<p class="disgoProfilePhotoText">10 comments | 200 photos <br>0.6 miles away</p>
		</div>
		
		<!-- add a comment popup --> 

		<a href="#popupLogin" data-rel="popup" id="form" data-role="button" data-transition="pop" data-inline="true">Contribute</a>
		<div id = "popupLogin" data-role="popup" data-theme="a" data-overlay-theme="c">
		
		<!-- this is where the form goes -->
				
		
<form action="submit_comment.php" id="commentform" method="post" />

			<textarea cols="40" rows="8" maxlength="140" name="comment" placeholder="140 characters or less"></textarea>
				<fieldset class="ui-grid-a">
				
				<div class="ui-block-a"><button data-theme="c" href = "#"  class = "cancel">Cancel</button></div>
				<div class="ui-block-b"><input type = "submit" data-theme="b" href = "#" value = "Comment" class = "comment" /></div>	 	

			    </fieldset>
			    </form>

		
	</div>
				


		
		
		<!-- move to photoswipe gallery !-->
<script type = "text/javascript">
		$(".cancel").click(function(){
			event.preventDefault();
			$( "#popupLogin" ).popup( "close" )
		});
		$(".comment").click(function(event){
			
			event.preventDefault();
				

			$.post("submit_comment.php", $("#commentform").serialize(), function(data) {
							
				$("#result").append(data);
						$( "#popupLogin" ).popup( "close" )
			});
		});

</script>

		<!-- add a div container for new comments -->
		<!-- add a div container for new comments -->
<div id="result"></div>
	</div><!-- /content -->
	
	<?php
		$local_state = "ui-btn-active ui-state-persist";
		$global_state = "";
		$profile_state = "";
		include 'footer.php'; 
	?>
	

</div><!-- /page one -->




</body>
</html>