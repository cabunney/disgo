<?php
include("config.php");
		$username = $_GET['username'];
		$query = "SELECT * from users where username = '".$username."'";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);

		while($row = mysql_fetch_assoc($result)); {
			if ($result != 'guest') {
				$_SESSION['id'] = $row['username'];
			}
		}

	?>
?>

<?php
						include("config.php");
						
						//$query1 = "SELECT * from comments WHERE location = ".$place."";
						
						$query1 = "SELECT * from comments WHERE location = {$place} ORDER by id DESC";

						$result1 = mysql_query($query1);
						
					
						if (!$result1) {
						    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
						  
						}

						if (mysql_num_rows($result1) == 0) {
						    echo "<tr id = 'nodisgo'><td>There are no comments for this Disgo.</td></tr>";
					
						}
						$count = 0; 
						// While a row of data exists, put that row in $row as an associative array
						// Note: If you're expecting just one row, no need to use a loop
						// Note: If you put extract($row); inside the following loop, you'll
						//       then create $userid, $fullname, and $userstatus
						while ($row = mysql_fetch_assoc($result1)) {
							$comment = $row["comment"];
//							$id = $row["id"];
							$creator = $row["creator"];

							echo "<tr><td>{$comment}</td></tr>";
						    $count = $count + 1; 
						}

						mysql_free_result($result1);
					?>