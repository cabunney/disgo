<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" >
			<ul>
				

				<li><a href="global.php" id="global"   data-icon="custom" class = "nav_button <?php echo $global_state; ?>">discover</a></li>
				<li><a href="index.php" id="local"   data-icon="custom" class = "nav_button <?php echo $local_state; ?> ">disgo</a></li>
				<li><a href="profile.php" id="profile" data-icon="custom"  class = "nav_button <?php echo $profile_state; ?>">profile</a></li>
			
			</ul>
		</div>
	</div>
	<script type = 'text/javascript'>
	$('a').click(function(){
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


</script>
</div>

	


