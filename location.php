<?php
//Set no caching
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
$time = time(); 
?>
<!DOCTYPE html> 
<html>

<head>
	<?php
		include("config2.php");

		$place = $_GET['id'];
		$query2 = "SELECT * from locations where id = '".$place."'";
		$result2 = mysql_query($query2);
		$row2 = mysql_fetch_assoc($result2);
		$title = $row2["title"];
		$filename = $row2["filename"];
	?>

	<title>Disgo | <?php echo $title; ?></title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="blue">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="white_theme.css" />

	
	

	<link rel="stylesheet" href="style.css?<?php echo $time; ?>" />
	<link rel="stylesheet" href="bootstrap.css?<?php echo $time;?>" />

	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
	
	
</head> 


<body> 

<!-- Start of first page: #one -->
<div data-role="page" id="location1">
	<div data-role="header">
		<a href="index.php?<?php echo $time; ?>" id="back" data-icon="custom" class = "top_bar_button" data-ajax = "false" ></a>
		<h1><?php echo $title?></h1>
		
	</div>

	
	<div data-role="content">	
	
		<!-- photo container --> 
		<div class="disgoProfilePhoto">
		<img src="uploads/<?php echo $filename; ?>"/>
<!-- 			<p class="disgoProfilePhotoText">10 comments | 200 photos <br>0.6 miles away</p>
 -->		
 

</div>
<form action="favorite.php" id="fav1" method="post" />
			<input type = "hidden" name = "userId" id = "userId" value = 0 />
			<input type = "hidden" name = "locId" id = "locId" value = <?php echo $place; ?> />
			<button type = "submit" data-theme="b" href="#" id="fav" class = "favBut">Favorite</button>
		</form>

		<!-- add a comment popup / comment form --> 

		<div id = "popupContribute" data-role="popup" data-theme="a" data-overlay-theme="c">
			<div id = "popupLogin" data-role="popup" data-theme="a" data-overlay-theme="c">		
				<form action="submit_comment.php" id="commentform" method="post" />
					<textarea cols="40" rows="8" maxlength="140" name="comment" placeholder="140 characters or less" id = "textarea"></textarea>
					<fieldset class="ui-grid-a">
					<input type = "hidden" id = "creatorComment" name = "creatorComment" />
					<div class="ui-block-a"><button data-theme="c" href = "#"  class = "cancel">Cancel</button></div>
					<div class="ui-block-b">
					<button type = "submit" data-theme="b"  id = "comment" href = "#" class = "comment">Comment</button></div>	 	
					<input type="hidden" name="place" id="place"/>
				    </fieldset>
				</form>
			</div>
		</div>




		<!-- add a div container for new comments -->

<div id="result">
<table class = "table">
<thead>
	<tr><th><span id = "comments_label">Comments</span> <a href="#popupLogin" data-rel="popup"  data-role="button" data-transition="pop" data-inline="true" class = "btn btn-mini pull-right" id = "contribute_btn">Contribute</a></th></tr>
	</thead>
 <tbody>
<?php
						include("config.php");
						
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
							$id = $row["id"];
							$creator = $row["creator"];
							echo "<tr id='".$id."'><td data-creator='$creator'>{$comment}<a style = 'display:none;' href='#popupDelete' class='deleteMe btn btn-mini pull-right {$creator}' data-rel='popup'  data-role='button' data-transition='pop'  data-icon='delete' data-iconpos='notext' data-inline='true' ></a>
						    </td></tr>";
						    $count = $count + 1;
						}
						mysql_free_result($result1);
					?>
					</tbody> 
					</table>
</div>

<!-- confirmation of delete comment popup -->
<div style="display: block;" id = "popupDelete" class="deleteComment" data-role="popup" data-icon="delete" data-iconpos="notext" data-theme="a" data-overlay-theme="c">
	<h4>Are you sure you want to delete this comment?</h4>
	<fieldset class="ui-grid-a">
		<div class="ui-block-a"><button data-theme="c" href = "#"  class = "cancel">Cancel</button></div>
		<div class="ui-block-b">
		<form action="delete_comment.php" method="post" id="confirmform">
		<button type = "submit" data-theme="b"  id = "confirm" href = "#" class = "confirm">
		Delete Comment
		<input type="hidden" name="place" id="place" class="place1"/>
		</button></form></div>	 	
	</fieldset>
</div>

<!-- deletes comment from DOM / backend -->
<script type = "text/javascript">
		$(".cancel").click(function(){
			event.preventDefault();
			$( "#popupDelete" ).popup( "close" )
		});

		$(".deleteMe").click(function() {
			var tempId = $(this).parent().parent().attr("id");
			$(".confirm").attr("name", tempId);
		});

		$(".confirm").click(function(event){
			
			event.preventDefault();
			$(".place1").val($(this));
			var tempId2 = $(this).attr("name");
			$.post("delete_comment.php", {place:tempId2}, function(data) {
				
				$("#"+tempId2).remove();
				$( "#popupDelete" ).popup( "close" );
			
			});
		});

		$("a[data-ajax='false']").bind("click",
		    function() {
		        if (this.href) {
		            location.href = this.href;
		            return false;
		        }
		});

		$(".cancel").click(function(){
			event.preventDefault();
			$( "#popupLogin" ).popup( "close" )
		});

		$(".comment").click(function(event){
			
			event.preventDefault();
			$("#place").val(<?php echo $place; ?>);

			$.post("submit_comment.php", $("#commentform").serialize(), function(data) {
				$("#nodisgo").remove();			
				$("#result tbody").prepend(data);
				$( "#popupLogin" ).popup( "close" );
			
			});
		});

		$('#back').click(function(){
			var link = $(this).attr('href');
		  $.mobile.changePage(
		    link,
		    {
		      allowSamePageTransition : true,
		      transition              : 'none',
		      showLoadMsg             : false,
		      reloadPage              : true
		    }
		  );
		});


	// 	$('#fav').click(function(){
	// 		var link = $(this).attr('href');
	// 		var x = localStorage.getItem('userID');
	// // 			if (x == ""){
	// // 		<div class="hover">  
	// // <a href="#" id="fav" class="btn btn-success" rel="popover" data-content="You are not logged in.  Click on the profile tab to enable favoriting!"></a>  
	// // 		</div>
		
	// 	});


		$("#fav").click(function(event){
			
			event.preventDefault();
			

			$.post("favorite.php", $("#fav1").serialize(), function(data) {
				$(".favBut").parent().hide();
				$("#fav1").append(data);			
			
			
			});
		});

		$(document).ready(function() {
			$("#creatorComment").val(localStorage.getItem('userID'));
			$("." + localStorage.getItem('userID')).show();
			$("#userId").val(localStorage.getItem('userID'));
		});
</script>

	</div><!-- /content -->
	
	
	<?php
		$local_state = "ui-btn-active ui-state-persist";
		$global_state = "";
		$profile_state = "";
		include 'footer.php'; 
	?>
	

</div><!-- /page one -->




</body>
</html>