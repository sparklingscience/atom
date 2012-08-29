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
	include("scripts/functions.php");
	include ('scripts/connect_db.php'); 
	$sparkUrl = $_GET['sparkUrl'];
	$result = mysql_query("SELECT * FROM makerspace WHERE sparkUrl='$sparkUrl'"); //selects the row(s) from the table and stores it in a resource. The id of the resource is stored in the variabl "result"
	$row=mysql_fetch_array($result); //fetces the row which is stored in the resource
	$id= $row['id'];
	$name= unclean($row['name']);
	$sparkUrl =$row['sparkUrl'];
	$existingUrl= $row['existingUrl'];
	$description= unclean($row['description']);
	$address= unclean($row['adress']);
	$country= $row['country'];
	$fee= unclean($row['fee']);
	$admins= $row['admins'];
	$members= $row['members'];
	$profileUrl= "\"".$row['id']."jpg\"";
	?>
	<div class="container">
		<div class="row-fluid">
			<div class="span12 hero-unit">
				<div class="row-fluid">
					<div class="span12 head">
						<h1 style="">Welcome to 
							<?php
							echo $name;
							?>
						</h1>
					</div>
					<div class="row-fluid mat">
						<div class="span4 matinfo">
							<a class="btn btn-info btn-large" href="#" >Attend this make-a-thon!</a>
							<div class="clearfix"></div><br><br>
							<span class="span4" style="font-size:54px;">
								<?php 
								$members = $row['members'];
								//echo $members.length;
								?>
							</span>
							<p style="margin: -20px auto auto 20px;" class="span6">people attending</p>
							<div class="clearfix"></div><br>
							<img src="./img/marker.png" style="height:30px; width:auto;" class="span4"/>
							<p class="span8">
								<?php echo $row['address'].', '.$row['country'];
								?>
							</p>
						</div>
						<span class="span8 matlogo" style="background:black;">
							<img src=
							<?php
							echo  $profileUrl;
							?>
							/>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="row-fluid well bigbox">
			<div class="span4 leftbox">
				<div>
					<div class="well">
						<h3>Organizers</h3>
					</div>
					<div class="well">
						<h3>Partners</h3>
					</div>
					<div class="well">
						<h3>Attendees</h3>
					</div>
				</div>
			</div>
			<div class="span8 well rightbox">
				<?php
				$no_of_comments="10";
				mysql_select_db($database);
				$pagename=md5($_SERVER['PHP_SELF']);
				$query=mysql_query("SELECT * FROM comments WHERE comment_on='$pagename' ORDER BY id DESC LIMIT 0, $no_of_comments");
				echo "<br />";
 
				echo "<h3>Comments</h3>";

				while($fetch=mysql_fetch_array($query)) {
					echo "<div class=\"comment\"><p><b>".$fetch['comment_by']."</b><br/>".$fetch['comment']."<p></div>";
				}
				mysql_close();
				?>
				<form action="post_comment.php" method="post">
					<table>
						<tr><td>Leave a comment below</td><td><input type="hidden" name="comment_on" size=40 readonly="readonly" value="<?php print md5($_SERVER['PHP_SELF']); ?>" /></td></tr>
 
						<tr><td>Comment: </td><td><textarea name="comment" cols=30></textarea></td></tr>
 
						<tr><td>Your name: </td><td><input type="text" size=40 name="comment_by" /></td></tr>
 
						<tr><td></td><td><input type="submit" value="Submit" /></td></tr>
					</table>
				</form>
				
			</div>
		</div>
	</div>
    
<?php include("scripts/footer.php");?>

</body>
</html>
