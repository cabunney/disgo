<div class="commentarea">
	<?php
		include("config.php");
		$place = $_POST["place"];

		$query = "DELETE FROM comments where id='".$place."'";
		$result1 = mysql_query($query);
			
	?>
</div>



	