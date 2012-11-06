

<div class="commentarea">
	<?php
		include("config.php");
		
		$comment = $_POST["comment"];
		$place = $_POST["place"];

		$query = "DELETE FROM comments (comment, location)";
		$result1 = mysql_query($query);
		
		echo "<p>comment deleted</p>";
	
	?>
</div>



	