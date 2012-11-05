	<?php
		include("config.php");
		
		
		$email = $_POST["email"];
		$username = $_POST["username"];
		$password = md5(mysql_real_escape_string($_POST["password"]));

		if (!isset($username) || !isset($password) || !isset($email) ) {
	
		printf("<script>window.location.href='login.php#signup'</script>");

elseif (empty($username) || empty($password) || empty(#email)) {
		printf("<script>window.location.href='login.php#signup'</script>");
			} else {
	
	$result = mysql_query("select * from users where username ='$username' AND password='$password'");
	$rowCheck = mysql_num_rows($result);
	
	if ($rowCheck > 0) {
		while ($row = mysql_fetch_array($result)) {
		$_SESSION['id'] = $row['username'];
		
		}
	$query = "Insert into users (email, username, password) values ('".$email."', '".$username."', '".$password."',)";
	printf("<script>window.location.href='index.php'</script>");

	} else {
	printf("<script>window.location.href='login.php#signup'</script>");
		}
	}
	
	?>