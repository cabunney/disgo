<!DOCTYPE html> 
<html>

<head>
	<title>Disgo | discover</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="white_theme.css" />

	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png" />
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>

<style>

table {
	width: 100%;
	}
</style>

</head> 

<body> 

<div data-role="page" id="filter">

	<div data-role="header">
		<a href="global.php" id="refresh" data-icon="custom" class = "top_bar_button"></a>
		<h1>discover</h1>

	</div><!-- /header -->

	<div data-role="content"> <!-- content -->		
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

	<div class="ui-block-a">
		<p class="discoverProfilePhotoText"><?php echo $titles[0] ?><p>
		<a href="location?id=<?php echo $ids[0] ?>"><img class="discoverPhoto" src="uploads/<?php echo $filenames[0]; ?>" /></a></div>
	<div class="ui-block-b">
		<p class="discoverProfilePhotoText"><?php echo $titles[1] ?><p>
		<a href="location?id=<?php echo $ids[1] ?>"><img class="discoverPhoto" src="uploads/<?php echo $filenames[1]; ?>" /></a></div>
	
	<div class="ui-block-a bottomPhotos">
		<p class="discoverProfilePhotoText"><?php echo $titles[2] ?><p>
		<a href="location?id=<?php echo $ids[2] ?>"><img class="discoverPhoto" src="uploads/<?php echo $filenames[2]; ?>" /></a></div>
	<div class="ui-block-b bottomPhotos">
		<p class="discoverProfilePhotoText"><?php echo $titles[3] ?><p>
		<a href="location?id=<?php echo $ids[3] ?>"><img class="discoverPhoto" src="uploads/<?php echo $filenames[3]; ?>" /></a></div>
	
	<div class="ui-block-a bottomPhotos">
		<p class="discoverProfilePhotoText"><?php echo $titles[4] ?><p>
		<a href="location?id=<?php echo $ids[4] ?>"><img class="discoverPhoto" src="uploads/<?php echo $filenames[4]; ?>" /></a></div>
	<div class="ui-block-b bottomPhotos">
		<p class="discoverProfilePhotoText"><?php echo $titles[5] ?><p>
		<a href="location?id=<?php echo $ids[5] ?>"><img class="discoverPhoto" src="uploads/<?php echo $filenames[5]; ?>" /></a></div>


</div>

</div> <!-- content -->	
		
		
	<?php
		$local_state = "";
		$global_state = "ui-btn-active";
		$profile_state = "";
		include 'footer.php';
	?>

</div><!-- /page -->

<script type = "text/javascript">

</script>


</body>
</html>