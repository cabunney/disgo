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
	<link rel="stylesheet" href="jqm-icon-pack-2.1.2-fa.css">

	<link rel="stylesheet" href="style.css?<?php echo $time; ?>" />
	<link rel="stylesheet" href="bootstrap.css?<?php echo $time;?>" />

	<link rel="apple-touch-icon" href="images/appicon.png" />
	<link rel="apple-touch-startup-image" href="images/startup.png">
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
</head> 
<body> 
	<!-- Start of first page: #one -->
	<div data-role="page" id="location1">
		<div data-role="header" class = "header_height">
			<h4 class = "header_title"><span class = "title_location"><?php echo $title?></span></h4>	
		</div>
		<!-- photo container --> 
		<div data-role="content">	
			<div class="crop"><img src="uploads/<?php echo $filename; ?>"/>
			</div>
	 
		 	 <form action="favorite.php" id="fav1" method="post" />
					<input type = "hidden" name = "userId" id = "userId" value = 0 />
					<input type = "hidden" name = "locId" id = "locId" value = <?php echo $place; ?> />
					<button type = "submit" data-role="button" data-icon="fastar" data-iconpos="notext" data-mini="false" data-inline="true" data-theme="b" href="#" id="fav" class = "favBut"></button>
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
<<<<<<< HEAD
			<div align="center" class="contribute"><a href="#popupLogin" data-rel="popup" data-icon="comments" data-iconpos="right" data-role="button" data-transition="pop" class = "btn btn-mini" id = "contribute_btn">Share What You Know</a></div>
			<div id="result">

				<?php
				include("config.php");
				$query1 = "SELECT * from comments WHERE location = {$place} ORDER by upvotes DESC";
				$result1 = mysql_query($query1);
				if (!$result1) {
				    echo "Could not successfully run query ($sql) from DB: " . mysql_error(); 
				}
				if (mysql_num_rows($result1) == 0) {
				    echo "<div id = 'nodisgo' class='placeholder'>There are no comments for this Disgo yet.</div>";
				} 

					echo "
					<table class = 'table location_table' id='{$id}'>
						<tbody>
							 <tr class=''>
      							<td colspan = '3' id = 'button_cell'><div align='center' class='contribute'><a href='#popupLogin' data-rel='popup' data-icon='faplus' data-iconpos='right' data-role='button' data-transition='pop'  type = 'button' id = 'contribute_btn'>Share What You Know</a></div>
								</td>
    						</tr>
    					
    					";
				
				$count = 0;
				// While a row of data exists, put that row in $row as an associative array
				// Note: If you're expecting just one row, no need to use a loop
				// Note: If you put extract($row); inside the following loop, you'll
				//       then create $userid, $fullname, and $userstatus
				while ($row = mysql_fetch_assoc($result1)) {
					$comment = $row["comment"];
					$id = $row["id"];
					$counter = $row["id"];
					$creator = $row["creator"];
					$upvotes = $row["upvotes"];
					echo 
					"
						<tr id = '{$id}'>
							
							<td data-creator='$creator'>
								<span class = 'pull-left'><a  href='#popupVote' class='vote btn btn-mini pull-left {$creator}' data-rel='popup'  data-role='button' data-transition='pop' data-icon='resize-vertical' data-iconpos='right' data-inline='true' name = '{$id}'><span class = 'counter' id = 'counter{$id}'>{$upvotes}</span></a></span>
								
							<td class='alignment'>
								<div class = 'comment_text'>{$comment}</div>
							</td>
							<td>
								<a style = 'display:none;' href='#popupDelete' class='deleteMe btn btn-mini pull-right {$creator}' data-rel='popup'  data-role='button' data-transition='pop'  data-icon='delete' data-iconpos='notext' data-inline='true' name = '{$id}'></a>
			    			</td>
				    	</tr>
				    	";
				    $count = $count + 1;
				}
			
					echo 
					"</tbody>
					</table";
				
				mysql_free_result($result1);
				?>
			</div>
			<!-- confirmation of delete comment popup -->
			<div style="display: block;" id = "popupVote" class="deleteComment" data-role="popup" data-icon="resize-vertical" data-iconpos="notext" data-theme="a" data-overlay-theme="c">
				<p style="text-align: center; font-size: 16px;">Downvote or upvote this comment?</p>
				<fieldset class="ui-grid-a">
					<div class="ui-block-a">
						<form action="downvote.php" method="post" id="downvote">
							<button data-theme="c" href = "#"  class = "downvote" style="font-size: 12px;">
								Downvote
								<input type="hidden" name="place" id="place" class="place1"/>
							</button>
						</form>
					</div>
					<div class="ui-block-b">
						<form action="upvote.php" method="post" id="upvote">
							<button type = "submit" data-theme="b" href = "#" class = "upvote" style="font-size: 12px;">
								Upvote
								<input type="hidden" name="place" id="place" class="place1"/>
							</button>
						</form>
					</div>	 	
				</fieldset>
			</div>
			<!-- confirmation of delete comment popup -->
			<div style="display: block;" id = "popupDelete" class="deleteComment" data-role="popup" data-icon="delete" data-iconpos="notext" data-theme="a" data-overlay-theme="c">
				<p style="text-align: center; font-size: 16px;">Are you sure you want to delete this comment?</p>
				<fieldset class="ui-grid-a">
					<div class="ui-block-a"><button data-theme="c" href = "#"  class = "cancel" style="font-size: 12px;">Cancel</button></div>
					<div class="ui-block-b">
						<form action="delete_comment.php" method="post">
							<button type = "submit" data-theme="b" href = "#" class = "confirm" style="font-size: 12px;">
								Delete
								<input type="hidden" name="place" id="place" class="place1"/>
							</button>
						</form>
					</div>	 	
				</fieldset>
			</div>
			
			<script type = "text/javascript">
/* 			<!-- adds voting to comment --> */
				$(".vote").click(function() {
					var tempId = $(this).attr("name");
					$(".upvote").attr("name", tempId);
					$(".downvote").attr("name", tempId);
				});
				$(".downvote").click(function(event){
					event.preventDefault();
					$(".place1").val($(this));
					var tempId2 = $(this).attr("name");
					var counterID = "#counter" + tempId2;
					$.post("downvote.php", {place:tempId2}, function(data) {
						$( "#popupVote" ).popup( "close" );
    					$( counterID ).html(function(i, val) { return +val-1 });
					});
				});
				$(".upvote").click(function(event){	
					event.preventDefault();
					$(".place1").val($(this));
					var tempId2 = $(this).attr("name");
					var counterID = "#counter" + tempId2;
					$.post("upvote.php", {place:tempId2}, function(data) {
						$( "#popupVote" ).popup( "close" );
    					$( counterID ).html(function(i, val) { return +val+1 });
					});
				});
/* 			<!-- adds deleting to comment --> */
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
/* handles cancel & comment options for contribute button */
				$(document).on("vclick", "#contribute_btn", function(){
					$("#commentform")[0].reset();
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
						$('.deleteMe').eq(0).button();
						$('.upvoteMe').eq(0).button();
						$( "#popupLogin" ).popup( "close" );
						location.reload();
					});
				});
				/* handles favorites */
				$("#fav").click(function(){	
					event.preventDefault();
					$.post("favorite.php", $("#fav1").serialize(), function(data) {
						$(".favBut").parent().hide();
						$("#fav1").append(data);			
					});
				});
				/* local storage (userid stored here */
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