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
</head>

<body>

    <?php 
    include("scripts/navigation.php"); 
    include ('scripts/connect_db.php');
    
    $query = $conn->query("SELECT * FROM makerspace"); //selects the row(s) from the table and stores it in a resource. The id of the resource is stored in the variabl "result"
    
    ?> 


<div class="container"><br />
<br />
<br />
	<h2 style="text-align:center; margin:20px 0px; font-size:34px;">Be a part of the maker culture!</h2><br />
<div class="row-fluid">
    	<div class="span12">

            <div class="row-fluid">
            	<div class="span8">
                    <div class="row-fluid">
                	    <div class="span12">
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <h2>Makerspaces</h2>
                            <?php
							$row = $query->fetch_object();
                            while($row){
							  echo "<div class=\"well\">
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
                            <h2>Make-a-thons</h2>
                        </div>
                    </div>
                </div>
            	<div class="span4">
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

<script src="js/jquery.js"></script>
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