

<div class="favstar">
	<?php
		include("config.php");
		
		$userID = $_POST["comment"];
		$placeID = $_POST["place"];

INSERT INTO favs (col) VALUES 


		$query = "Insert into comments (comment, location) values ('".$comment."', '".$place."')";
		$result1 = mysql_query($query);
		
		echo "<p>".$comment."</p>";
	
	?>
</div>