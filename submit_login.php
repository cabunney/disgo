<?php
include("config.php");

$username = mysql_real_escape_string($_POST['username']);
$password = md5(mysql_real_escape_string($_POST['password']));

if (!isset($username) || !isset($password)) {

	header("Location: login.php");
}
elseif (empty($username) || empty($password)) {
	header("Location: login.php");
			} else {

	$result = mysql_query("select * from users where username ='$username' AND password='$password'");
	$rowCheck = mysql_num_rows($result);

	if ($rowCheck > 0) {
		while ($row = mysql_fetch_array($result)) {
		$_SESSION['id'] = $row['id'];
		
		}
		header("Location: index.php?userID={$_SESSION['id']}");

	} else {
	header("Location: login.php");
		}
	}
?>

