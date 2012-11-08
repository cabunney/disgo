<div class="commentarea">
	<?php
		include("config.php");
		
		$comment = $_POST["comment"];
		$place = $_POST["place"];

		$query = "Insert into comments (comment, location) values ('".$comment."', '".$place."')";
		$result1 = mysql_query($query);
		
		echo "<p>".$comment."</p>";
	
	?>
</div>



	