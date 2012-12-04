<div class="deleteFavorite">
	<?php
		include("config2.php");
		$place = $_POST["place"];

		$query = "DELETE FROM favs where locId='".$place."'";
		$result1 = mysql_query($query);
			
	?>
</div>



	