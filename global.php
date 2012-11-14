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

<!DOCTYPE html> 
<html>

<head>
	<title>Disgo | discover</title> 
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




</head> 

<body> 

<div data-role="page" id="filter">

	<div data-role="header">
		<a href="global.php" id="refresh" data-icon="custom" class = "top_bar_button" data-ajax = "false"></a>
		<h1>discover</h1>

	</div><!-- /header -->

	<div data-role="content"> <!-- content -->	
	<?php
	include("config2.php");

	$sql = "SELECT * from locations ORDER BY RAND()";

	$result = mysql_query($sql);

	if (!$result) {
	    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
	  
	}

	if (mysql_num_rows($result) == 0) {
	    echo "There are no disgos.";

	}
	// While a row of data exists, put that row in $row as an associative array
	// Note: If you're expecting just one row, no need to use a loop
	// Note: If you put extract($row); inside the following loop, you'll
	//       then create $userid, $fullname, and $userstatus
	
	$ids = array();
	$filenames = array();
	$titles = array(); 
	
	while ($row = mysql_fetch_assoc($result)) {
		$filename = $row["filename"];
		$id = $row["id"];
		$title = $row["title"];
		  array_push($ids, $id); 
		  array_push($filenames, $filename); 
		  array_push($titles, $title); 		
	}

	mysql_free_result($result);
?>	

<div class="ui-grid-a">

	<div class="ui-block-a frameTop">
		<p class="discoverProfilePhotoText"><?php echo $titles[0] ?><p>
		<a href="location?id=<?php echo $ids[0] ?>" data-ajax = "false"><img class="discoverPhoto" src="uploads/<?php echo $filenames[0]; ?>" /></a></div>
	<div class="ui-block-b frameTop">
		<p class="discoverProfilePhotoText"><?php echo $titles[1] ?><p>
		<a href="location?id=<?php echo $ids[1] ?>" data-ajax = "false"><img class="discoverPhoto" src="uploads/<?php echo $filenames[1]; ?>" /></a></div>
	
	<div class="ui-block-a frameBottom">
		<p class="discoverProfilePhotoText"><?php echo $titles[2] ?><p>
		<a href="location?id=<?php echo $ids[2] ?>" data-ajax = "false"><img class="discoverPhoto" src="uploads/<?php echo $filenames[2]; ?>" /></a></div>
	<div class="ui-block-b frameBottom">
		<p class="discoverProfilePhotoText"><?php echo $titles[3] ?><p>
		<a href="location?id=<?php echo $ids[3] ?>" data-ajax = "false"><img class="discoverPhoto" src="uploads/<?php echo $filenames[3]; ?>" /></a></div>
	
	<div class="ui-block-a frameBottom">
		<p class="discoverProfilePhotoText"><?php echo $titles[4] ?><p>
		<a href="location?id=<?php echo $ids[4] ?>" data-ajax = "false"><img class="discoverPhoto" src="uploads/<?php echo $filenames[4]; ?>" /></a></div>
	<div class="ui-block-b frameBottom">
		<p class="discoverProfilePhotoText"><?php echo $titles[5] ?><p>
		<a href="location?id=<?php echo $ids[5] ?>" data-ajax = "false"><img class="discoverPhoto" src="uploads/<?php echo $filenames[5]; ?>" /></a></div>



</div>

<script type = "text/javascript">
$("a[data-ajax='false']").bind("click",
    function() {
        if (this.href) {
            location.href = this.href;
            return false;
        }
});
</script>

</div> <!-- content -->	
		

<script type = "text/javascript">
$("a[data-ajax='false']").bind("click",
    function() {
        if (this.href) {
            location.href = this.href;
            return false;
        }
});

$("#filter").unbind('pageinit');
				$("#filter").bind( 'pageinit',function(event){ 
					
					$("#filter").find("#profile").attr("href", "profile.php?userID="+localStorage.getItem('userID'));

				});
</script>


	<?php
		$local_state = "";
		$global_state = "ui-btn-active";
		$profile_state = "";
		include 'footer.php';
	?>

</div><!-- /page -->


</body>
</html>