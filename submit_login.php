<?php
include("config.php");

$username = mysql_real_escape_string($_POST['username']);
$password = md5(mysql_real_escape_string($_POST['password']));

if (!isset($username) || !isset($password)) {

	header("Location: profile.php?userID=wrong");
}
elseif (empty($username) || empty($password)) {
	header("Location: profile.php?userID=wrong");
			} else {

	$result = mysql_query("select * from users where username ='$username' AND password='$password'");
	$rowCheck = mysql_num_rows($result);

	if ($rowCheck > 0) {
		while ($row = mysql_fetch_array($result)) {
		$_SESSION['id'] = $row['id'];
		
		}
		header("Location: setLocal.php?userID={$_SESSION['id']}");

	} else {
	header("Location: profile.php?userID=wrong");
		}
	}
?>

