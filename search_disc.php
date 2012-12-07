<?php
	include("config2.php");
	
	$query = $_POST["query"];
	
	$query1 = "SELECT * FROM locations WHERE title LIKE '%".$query."%'";
	$result1 = mysql_query($query1);
	if (mysql_num_rows($result1) == 0) {
		echo "<tr><td><a href = 'location.php?id=3'><span class = 's_result_title'>No results</span></td></tr>";
	} 
	else {
		while($row = mysql_fetch_assoc($result1)) {
		$title = $row["title"];
		$id = $row["id"];

		echo "<tr><td><a href = 'location.php?id={$id}'><span class = 's_result_title'>{$title}</span></td></tr>";
		}
	}


?>