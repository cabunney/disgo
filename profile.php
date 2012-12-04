<!DOCTYPE html> 
<html>
<head>
	<?php
		include("config.php");
		$userID = $_GET['userID'];
		if ($userID != "wrong") {
			$query2 = "SELECT * from users where id = '".$userID."'";
			$result2 = mysql_query($query2);
			$row2 = mysql_fetch_assoc($result2);
			$username = $row2["username"];	
		} else {
			$username = "profile";
		}
	?>
	<title>Disgo | profile</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	
	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="white_theme.css" />
		<link rel="stylesheet" href="jqm-icon-pack-2.1.2-fa.css">

	<link rel="stylesheet" href="style.css" />
		<!-- <link rel="stylesheet" href="bootstrap.css" /> -->

	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png" />
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
</head>
			
<body>
<div class="background" data-role="page" href="profile" id="profile2">

	<div data-role="header" class = "header_height">
		<a style = "display:none;"></a>
		<h4 class = "header_title"><span class = "title_location"><?php echo $username; ?></span></h4>	

		<a href = "profile.php" id ="logoutprof" style = "display:none;" data-ajax = "false">Logout</a>
	</div><!-- /header -->
	

	<div data-role="content" >	
	<?php
		if ($userID == "wrong") {
			echo "<div class = 'placeholder placeholder2'>Your login or password was incorrect.</div>";
		}
	?>
	<div id = "login_form" class="background">
		<?php
			include 'login.php';
		?>
	</div> 

	<div id = "prof">
	<div id="result">
	<p class="pageBanner">Your Favorites</p>
	<?php
		include("config2.php");
		$userID = $_GET['userID'];
		$query1 = "SELECT * from favs WHERE userId = {$userID}";

		$result1 = mysql_query($query1);
		
	
		if (!$result1) {
		    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
		  
		}

		if (mysql_num_rows($result1) == 0) {
		    echo "<div class = 'placeholder placeholder2'><b> Uh-oh!</b> You have no favorites.</div><div class = 'instructions'>In order to favorite, enter a Disgo and press the star icon in the top right hand corner.</div>";
	
		}
		$count = 0; 
		// While a row of data exists, put that row in $row as an associative array
		// Note: If you're expecting just one row, no need to use a loop
		// Note: If you put extract($row); inside the following loop, you'll
		//       then create $userid, $fullname, and $userstatus
		echo "<table> <tbody>";
		while ($row = mysql_fetch_assoc($result1)) {
			$loc = $row["locId"];
			$query2 = "SELECT * from locations WHERE id = {$loc} ORDER by id DESC";

			$result2 = mysql_query($query2);
			$row2 = mysql_fetch_assoc($result2);
			$locationName = $row2["title"];
			$filename = $row2["filename"];
/* <a style='text-align:right' href = 'location.php?id={$loc}' data-ajax='false'> */
		echo "
		<tr id= '{$loc}'>
		<td>
			<a href = 'location.php?id={$loc}' style='text-decoration:none; font-family: HelveticaNeue-Light;' data-ajax='false'><div class='cropProfile'><img src='uploads/{$filename}'/><p class='profilePhotoText'>{$locationName}</p></div></a></td>
		<td>
			<a href='#popupDelete' class='deleteMe deleteFavorite btn btn-mini pull-right' data-rel='popup'  data-role='button' data-transition='pop'  data-icon='delete' data-iconpos='notext' data-inline='true' name = '{$loc}'></a></td>
			</tr>
		";
		   
		}
		echo "</tbody>
			</table>";
		mysql_free_result($result1);
	?>
	</div>
	</div>
	
	<div style="display: block;" id = "popupDelete" class="deleteFavorite" data-role="popup" data-icon="delete" data-iconpos="notext" data-theme="a" data-overlay-theme="c">
		<p style="text-align: center; font-size: 16px;">Are you sure you want to delete this from your favorites?</p>
		<fieldset class="ui-grid-a">
			<div class="ui-block-a"><button data-theme="c" href = "#"  class = "cancel" style="font-size: 12px;">Cancel</button></div>
			<div class="ui-block-b">
				<form action="delete_favorite.php" method="post">
					<button type = "submit" data-theme="b" href = "#" class = "confirm" style="font-size: 12px;">
							Delete
						<input type="hidden" name="place" id="place" class="place1"/>
					</button>
				</form>
			</div>	 	
		</fieldset>
	</div>
		
	<script type="text/javascript">
		$(document).ready(function(){
			var x = localStorage.getItem('userID');
			// alert(x);		
			if (x == null || x == "") {
				$("#login_form").show();
				$("#prof").hide();
				$(".header_height").hide();
			} else {
				$("#login_form").hide();
				$("#logoutprof").show();

			}
			var len = $('.placeholder2').length;
			if ( len > 0) {
				$('.pageBanner').remove();
			}
		});
		
	/* 			<!-- adds deleting to favorites --> */
			$(".cancel").click(function(){
				event.preventDefault();
				$( "#popupDelete" ).popup( "close" )
			});
			$(".deleteMe").click(function() {
				var tempId = $(this).attr("name");
				$(".confirm").attr("name", tempId);
			});
			$(".confirm").click(function(event){	
				event.preventDefault();
				$(".place1").val($(this));
				var tempId2 = $(this).attr("name");
				$.post("delete_favorite.php", {place:tempId2}, function(data) {
					$("#"+tempId2).remove();
					$( "#popupDelete" ).popup( "close" );
				});
			});

		$("#logoutprof").click(function() {
			localStorage.removeItem('userID');
			<?php $_SESSION = ''; ?>

		});


			$("a[data-ajax='false']").bind("click",

    		function() {
		        if (this.href) {
		            location.href = this.href;
		            return false;
        	}
			});


				$("#profile2").unbind('pageinit');
				$("#profile2").bind( 'pageinit',function(event){ 
					
					$("#profile2").find("#profile").attr("href", "profile.php?userID="+localStorage.getItem('userID'));

				});

	</script>	
		
	</div><!-- /content -->

			
	<!-- /page three -->

	<?php
		$local_state = "";
		$global_state = "";
		$profile_state = "ui-btn-active ui-state-persist";
		include 'footer.php'; 
	?>
</div>

</body>
</html>