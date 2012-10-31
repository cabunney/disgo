

<div class="commentarea">
	<?php
		include("config.php");
		
		$comment = $_POST["comment"];
		$time = time();
		
		

		
		$query = "insert into comments (comment, time) values ('$comment', '$time')";
		
		echo "<p>comment: ".$comment."</p>";
	
	?>
</div>



	