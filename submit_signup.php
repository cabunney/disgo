<?php
		include("config.php");

$username = mysql_real_escape_string($_POST['username']);
$password = md5(mysql_real_escape_string($_POST['password']));
$email = mysql_real_escape_string($_POST['email']);

		if (!isset($username) || !isset($password) || !isset($email) ) {
	
			header("Location: login.php#signup");
}

		elseif (empty($username) || empty($password) || empty($email)) {
					header("Location: login.php#signup");

			} 
		else {
	
	
			$query = "Insert into users (email, username, password) values ('".$email."', '".$username."', '".$password."')";
			mysql_query($query);

					header("Location: index.php");

		}	
	
	?>




