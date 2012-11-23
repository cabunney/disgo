<div class="commentarea">
<?php
	include("config.php");
	$place = $_POST["place"];

	$query = "UPDATE comments SET upvotes = upvotes - 1 WHERE id = '".$place."'";
	$result1 = mysql_query($query);
?>
</div>

	


