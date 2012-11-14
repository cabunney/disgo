	<?php
		include("config2.php");
		
		$userId = $_POST["userId"];
		$locId = $_POST["locId"];
		
		$query2 = "SELECT * from favs where userId = '".$userId."' AND locId = '".$locId."'";
		$result2 = mysql_query($query2);
		
		if (mysql_num_rows($result2) != 0) {
						    echo "Already favorited!";
					
			} else {

		$query = "Insert into favs (locId, userId) values ('".$locId."', '".$userId."')";
		$result1 = mysql_query($query);
		  echo "<p class='favoriteSuccess'>Favorite</p>";
		
}
		// echo "<tr id = '{$id}'><td data-creator='{$creator}'>{$comment}</td></tr>";
		// <a href='#popupDelete' class='deleteMe btn btn-mini pull-right' data-rel='popup'  data-role='button' data-transition='pop'  data-icon='delete' data-iconpos='notext' data-inline='true' ></a>


	
	?>

