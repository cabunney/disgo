<?php
	include("config.php");
	
	$comment = $_POST["comment"];
	$place = $_POST["place"];
	$creator = $_POST["creatorComment"];
	$query = "Insert into comments (comment, location, creator) values ('".$comment."', '".$place."', '".$creator."')";
	$result1 = mysql_query($query);
	$query2 = "SELECT * from comments where comment = '".$comment."'";
	$result2 = mysql_query($query2);
	$row2 = mysql_fetch_assoc($result2);
	$id = $row2["id"];

	echo "<tr id='{$id}'><td data-creator='{$creator}'>{$comment}<a href='#popupDelete' class='deleteMe btn btn-mini pull-right {$creator}' data-rel='popup' data-role='button' data-transition='pop'  data-icon='delete' data-iconpos='notext' data-inline='true'></a></td></tr>";

?>

