
	

		
		<?php
			include("config2.php");

			function bytesToSize1024($bytes, $precision = 2) {
			    $unit = array('B','KB','MB');
			    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision);
			}

			// function getExtension($str) {

	  //        $i = strrpos($str,".");
	  //        if (!$i) { return ""; } 
	  //        $l = strlen($str) - $i;
	  //        $ext = substr($str,$i+1,$l);
	  //        return $ext;
	 	// 	}
			$sTitle = null;
			$sTitle = $_POST["title"];
			$sLat = $_POST["lat"];

			$sLong = $_POST["long"];
			$sFileName = $_FILES['image_file']['name'];
			$sFileType = pathinfo($_FILES['image_file']['name'], PATHINFO_EXTENSION);
			$sFileSize = bytesToSize1024($_FILES['image_file']['size'], 1);
			$timeN = time(); 

			// $filename = $timeN.$sFileName; 
			// $filename = stripslashes($_FILES['file']['name']);
		
			
			$filename2 = $timeN.$sFileName; 
			// $extension = getExtension($filename);
			$uploadedfile = $_FILES['image_file']['tmp_name'];
			$src = imagecreatefromjpeg($uploadedfile);

			if($sFileType=="jpg" || $sFileType=="jpeg" )
			{
				$uploadedfile = $_FILES['image_file']['tmp_name'];
				$src = imagecreatefromjpeg($uploadedfile);
			}
			else if($sFileType=="png")
			{
				$uploadedfile = $_FILES['image_file']['tmp_name'];
				$src = imagecreatefrompng($uploadedfile);
			}
			else 
			{
				$src = imagecreatefromgif($uploadedfile);
			}
		 
			list($width,$height)=getimagesize($uploadedfile);
			$newwidth=400;
			$newheight=($height/$width)*$newwidth;
			$tmp=imagecreatetruecolor($newwidth,$newheight);
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
			$rotatetmp = imagerotate($tmp, 270, 0);
			// imagejpeg($tmp,"uploads/".$filename,100);
			// $tmp = imagecreatetruecolor(120, 20);
			// $text_color = imagecolorallocate($tmp, 233, 14, 91);
			// imagestring($tmp, 1, 5, 5,  $width.$height , $text_color);

			imagejpeg($rotatetmp, "uploads/".$filename2, 100);
			// imagejpeg($_FILES['image_file']['tmp_name'],"uploads/test.jpeg",100);

			// if (move_uploaded_file($now, "uploads/".$filename2)) {
			// }
			// imagedestroy($src);
			// imagedestroy($tmp);
			imagedestroy($tmp);
			imagedestroy($src);
			imagedestroy($rotatetmp);


			$query = "INSERT INTO locations (title, filename, lng, lat) VALUES ('$sTitle', '$filename2', '$sLong', '$sLat')";
			$result = mysql_query($query);
			if ($result) {
				// What do the following lines do? Answer -> #1
				$query2 = "SELECT * from locations where filename = '".$filename2."'";
				$result2 = mysql_query($query2);
				$row2 = mysql_fetch_assoc($result2);
				echo $row2["id"];
				// echo $sLat;
					
			}
			

		?>
		
