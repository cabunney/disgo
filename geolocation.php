//<script type="text/javascript">
//		$(function () {
//    $("#button").click(function () {
//    	$(".box").hide();
//    	$(".box").fadeIn();
//    	$(".box").html("Put new text here");
//    });
//});
//        getLocation();
//    });
//});
//
//function getLocation() {
//    if (navigator.geolocation) {
//       navigator.geolocation.getCurrentPosition(showPosition);
//    } else {
//        alert("Geolocation is not supported by this browser.");
//    }
//}
//
//function showPosition(position) {
//    $(".box1").html(position.coords.latitude);
//    $(".box2").html(position.coords.longitude);
//} 
//
//getLocation();
//	</script>	
	
<!-- google stuff -->

<section id="wrapper">
 
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <article>
      <p><span id="status">Please wait whilst we try to locate you...</span></p>
    </article>
<script>
function success(position) {
  var s = document.querySelector('#status');
 
  if (s.className == 'success') {
    return;
  }
 
  s.innerHTML = "found you!";
  s.className = 'success';
 
  var mapcanvas = document.createElement('div');
  mapcanvas.id = 'mapcanvas';
  mapcanvas.style.height = '400px';
  mapcanvas.style.width = '560px';
 
  document.querySelector('article').appendChild(mapcanvas);
 
  var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  var myOptions = {
    zoom: 15,
    center: latlng,
    mapTypeControl: false,
    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  
	echo "".$latlng."</p>";
  
  var map = new google.maps.Map(document.getElementById("mapcanvas"), myOptions);
 
  var marker = new google.maps.Marker({
      position: latlng,
      map: map,
      title:"You are here!"
  });
}
 
function error(msg) {
  var s = document.querySelector('#status');
  s.innerHTML = typeof msg == 'string' ? msg : "failed";
  s.className = 'fail';
 
  // console.log(arguments);
}
 
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(success, error);
} else {
  error('not supported');
}
 
</script>
</section>
