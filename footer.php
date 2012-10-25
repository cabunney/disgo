<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="b">
			<ul>
				<li><a href="global.php" id="global" data-icon="custom" class = "nav_button">discover</a></li>
				<li><a href="index.php" id="local" data-icon="custom" class = "nav_button">disgo</a></li>
				<li><a href="profile.php" id="profile" data-icon="custom" class = "nav_button">profile</a></li>
			
			</ul>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(".nav_button").click(function(){
		$(".nav_button").removeClass("ui-btn-active");
		$(this).addClass("ui-btn-active");
	});
</script>

