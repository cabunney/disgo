<?php
//Set no caching
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
	
		
		
		<?php
			include("config2.php");

			function bytesToSize1024($bytes, $precision = 2) {
			    $unit = array('B','KB','MB');
			    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision);
			}
			// $sTitle = null;
			$sTitle = $_POST["title"];
			$sLat = $_POST["lat"];

			$sLong = $_POST["long"];
			$sFileName = $_FILES['image_file']['name'];
			$sFileType = $_FILES['image_file']['type'];
			$sFileSize = bytesToSize1024($_FILES['image_file']['size'], 1);
			$timeN = time(); 

			$filename = $timeN.$sFileName; 

			if (move_uploaded_file($_FILES['image_file']['tmp_name'], "uploads/".$filename)) {


			}
			$query = "INSERT INTO locations (title, filename, lng, lat) VALUES ('$sTitle', '$filename', '$sLong', '$sLat')";
			$result = mysql_query($query);
			if ($result) {
				// What do the following lines do? Answer -> #1
				$query2 = "SELECT * from locations where filename = '".$filename."'";
				$result2 = mysql_query($query2);
				$row2 = mysql_fetch_assoc($result2);
				echo $row2["id"];
				// echo $sLat;
					
			}
			
			// echo 
			// "
			// <p>Successfully Created {$sTitle}!</p>
			// "
			// unset($_POST);
			
		?>
		
	