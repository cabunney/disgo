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
			
				$result = mysql_query("select * from users where username ='$username' AND password='$password'");
				$row = mysql_fetch_array($result);
				$_SESSION['id'] = $row['id'];
		
				header("Location: profile.php?id={$_SESSION['id']}");

		}	
	
	?>

