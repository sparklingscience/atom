<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sparkling Science</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Le styles -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="js/jquery.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCkGw8zsnbW-bfwHPgHFHOHxt_LlqmwEfw&sensor=false"></script>
<script type="text/javascript">
	
	
	var l1;
	var $map;
	var $latlng;
	var overlay;
	var markerData = {};
	var marker;
	var infowindow;
	var markerFlag = 0;
	
$(document).ready(function() {
		   
	$( "#map_canvas" ).droppable({ accept: "#problemList li",
			drop: function( event, ui ) {
				alert("Thanks! for adding this problem!");
			}
		});
	
	$(".draggable").draggable({cursorAt: {top: 58, left:0 }, helper: 'clone',
	stop: function(e) {
		var point=new google.maps.Point(e.pageX-$("#map_canvas").offset().left,e.pageY-$("#map_canvas").offset().top);
		console.log($("#map_canvas").offset().left+"..."+$("#map_canvas").offset().top);
		ll=overlay.getProjection().fromContainerPixelToLatLng(point);
		var info = '<h2 style="font-size:24px;" class="nh1">Add makerspace!</h2><form>'+
			'<label>E-mail</label><input id="hackMail" class="formInput" type="text" name="mail" /><br />'+
			'<a class="formButton" href=#><button class="btn btn-primary">Submit</button></a>'+
			'</form>';
		placeMarker(ll,info);	
		}
		});	
	
		$('#post').keydown(function (e){
		if(e.keyCode == 13){
			$('<li>'+document.getElementById('post').value+'</li>').hide().prependTo("#problemList").fadeIn("slow").slideDown("slow");
			document.getElementById('post').value = '';
			$("#problemList li").draggable({helper: 'clone'});
		}
		})

		$("#hackSubmit").live("click",function(){
		if((document.getElementById('hackName').value=='')||(document.getElementById('hackMail').value=='')){
			alert("Kindly fill all the fields!");
		}
		else{
		markerFlag = 1;
	    markerData.title = document.getElementById('hackName').value;
  	    markerData.mail = document.getElementById('hackMail').value;
					$.post("./scripts/save.php",
					  {markerData: markerData},
					  function(data){
						  	console.log(markerData);
							console.log(data);
							alert("Congratulations! you successfully added "+data);
							infowindow.close();
						});
		}
		});
		
											   
});

function initialize() {
	var $latlng = new google.maps.LatLng(59.5, 16.733333);
	var myOptions = {
		zoom: 6,
		center: $latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		mapTypeControlOptions: {
		style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
		position: google.maps.ControlPosition.TOP_LEFT },
		zoomControl: true,
		zoomControlOptions: {
		style: google.maps.ZoomControlStyle.LARGE,
		position: google.maps.ControlPosition.LEFT_TOP
		},
		scaleControl: true,
		scaleControlOptions: {
		position: google.maps.ControlPosition.TOP_LEFT
		},
		streetViewControl: false,
		panControl:false,
	};
	
	$map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
	
	    

	overlay = new google.maps.OverlayView();
	overlay.draw = function() {};
		overlay.setMap($map);
	} 
	
	function placeMarker(location,info) {

		var image = new google.maps.MarkerImage('img/marker.png',
        new google.maps.Size(38, 58),
        new google.maps.Point(0, 0),
        new google.maps.Point(19, 58)
       );
	   var shadow = new google.maps.MarkerImage("img/shadow.png",
        new google.maps.Size(68.0, 58.0),
        new google.maps.Point(0, 0),
        new google.maps.Point(19.0, 58.0)
       );
	   
	  //save marker in db...
	  markerData.lat = location.lat();
	  markerData.lng = location.lng();
	  markerData.info = info;

	  console.log(markerData);
	  
		marker = new google.maps.Marker({
		position: location, 
		map: $map,
		icon: image,
		shadow: shadow,
		animation: google.maps.Animation.DROP,
		draggable:true
		});        
		
		infowindow = new google.maps.InfoWindow({
		content: info,
		});			
		infowindow.open($map, marker);
		google.maps.event.addListener(infowindow,'closeclick',function(){
		   if(markerFlag==0){
				var r=confirm("Do you want to delete the hackathon?");
				if (r==true)
				{
				   	marker.setMap(null);
				}
				else
				{
					infowindow.open($map, marker);
				}		   
		   }
		});
	 // google.maps.event.addListener(marker, 'click', function(){infowindow.open($map, marker);});
	 }
	 

</script>
</head>

<body onLoad="initialize()">

    <?php 
    include("scripts/navigation.php"); 
    include ('scripts/connect_db.php');
    
    $query = $conn->query("SELECT * FROM makerspace"); //selects the row(s) from the table and stores it in a resource. The id of the resource is stored in the variabl "result"
	$numberOfMakerspaces = $query->num_rows;
    
    ?> 

<h2 style="font-size:40px; margin-top:70px; padding:10px; text-align:center;">Be a part of the maker culture! <a href="signup.php"><button style="display:inline-block; margin-top:-10px;" class="btn btn-large btn-primary">Sign up!</button></a><a href="definitions.php"><button style="display:inline-block; margin-top:-10px; margin-left:10px;" class="btn btn-large btn-success">Know more...</button></a></h2>
<hr />
    <div class="span12" style="margin:0; width:100%;">
        <div class="row" style="padding:20px; margin:0;">
            <div class="span10 well">
                <div id="map_canvas" style="height:300px;"></div>
            </div>
            <div class="span2 well">
                <div id="addHackathon">
                    <img src="img/markerGlow.png" class="draggable" style="display: block; margin:auto; cursor:move;"/><br />
                    <p style="text-align:center;">Drag me to create a Makerspace!<br />
                    <hr />
                    <h3 style="text-align:center;"><?php echo $numberOfMakerspaces; ?> makerspaces registered</h3>
					</p>
                </div>
            </div>
        </div>
    </div>
                    
<div class="container">
<div class="row-fluid">
    	<div class="span12">

            <div class="row-fluid">
            	<div class="span10">
                    
                    <div class="row-fluid" style="margin-top:30px;">
                        <div class="span6">
                            <h2 style="text-align:center;">Makerspaces</h2>
                            <hr />
                            <?php
							$row = $query->fetch_object();
                            while($row){
							  echo "<div>
							  <a href='./makerspace.php?sparkUrl=".$row->id."'>
							  <br />";
							  echo $row->id . " " . $row->name.
							  "<br />". 
							  $row->description;
							  //echo "<img src=\"".$userPic."\" width=\"30\" height=\"30\"/>";
							  //echo "<img src=\"./images/userPics/1.jpg\" />";
							  echo "</a></div>";
							  echo "<br />";
							  $row = $query->fetch_object();
							 }
							?>
                        </div>
                        <div class="span6">
                            <h2 style="text-align:center;">Make-a-thons</h2>
                            <hr />
                        </div>
                    </div>
                </div>
            	<div class="span2">
                	<div class="row-fluid">
                        <div class="span12">
                            <img src="img/signup.png" />
                                <div class="steps">
                                    <h2>Be a maker</h2>
                                    <p>This is the very first step you can go through!<br />
                                    Sign up to become a part of a large community often mistaken to have descended 
                                    from a parallel universe. Highly creative, free and talented.<hr />
                                    </p>
                                </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <img src="img/makerspace.png" />
                            <div class="steps">
                                <h2>Create a makerspace!</h2>
                                <p>Get things running! Contribute back to the community, make an impact by hosting a make-a-thon! Make like-minded people meet and have their ideas merge in a creative soup of boundless imagination.
                                    <hr />
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <img src="img/makeathon.png" />
                            <div class="steps">
                                <h2>Host a make-a-thon!</h2>
                                <p>Get things running!
                                Contribute back to the community, make an impact by hosting a make-a-thon!
                                Make like-minded people meet and have their ideas merge to emerge out of thin air.
                                This will surely take you to heaven ;)                        
                                <br /><br />
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("scripts/footer.php");?>

<!-- Placed at the bottom of the page to aid faster page loading!! -->
<script src="js/bootstrap-transition.js"></script>
<script src="js/bootstrap-alert.js"></script>
<script src="js/bootstrap-modal.js"></script>
<script src="js/bootstrap-dropdown.js"></script>
<script src="js/bootstrap-scrollspy.js"></script>
<script src="js/bootstrap-tab.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
<script src="js/bootstrap-popover.js"></script>
<script src="js/bootstrap-button.js"></script>
<script src="js/bootstrap-collapse.js"></script>
<script src="js/bootstrap-carousel.js"></script>
<script src="js/bootstrap-typeahead.js"></script>
<script src="js/SmoothScroll.js"></script>

</body>
</html>