<html>
<head>
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="white_theme.css" />

	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png" />
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>	
<script type = "text/javascript" >
	$(document).ready(function() {
			
	
			localStorage.setItem('userID', '<?=$_GET["userID"];?>');
			location.href = "profile.php?userID=" + localStorage.getItem('userID');
			// window.location.href = "profile.php";
			// $("#try").html(localStorage.getItem('userID'));
		});
		
		
</script>
</head>
<body onload = "updateLogin()">
<h1>Logging in...</h1>

<span id = "try"></span>


</body>
</html>