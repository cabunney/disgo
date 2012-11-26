


<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" >
			<ul>

				<li><a href="global.php" id="global" data-icon="custom" class = "nav_button <?php echo $global_state; ?>" data-ajax = "false">discover</a></li>
				<li><a href="index.php" id="local" data-icon="custom" class = "nav_button <?php echo $local_state; ?> " data-ajax = "false">nearby</a></li>
				<li><a href="profile.php" id="profile" data-icon="custom"  class = "nav_button <?php echo $profile_state; ?>" data-ajax = "false">favorites</a></li>
			
			</ul>
		</div>
	</div>
</div>
<script type = "text/javascript">
$("a[data-ajax='false']").bind("click",
    function() {
        if (this.href) {
            location.href = this.href;
            return false;
        }
});


$(document).ready(function() {
	$("#profile").attr("href", "profile.php?userID="+localStorage.getItem('userID'));
});

</script>

