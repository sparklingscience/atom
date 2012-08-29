<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sparkling Science</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<style>
.container:nth-of-type(2){
	margin-top:80px!important;
}
</style>
</head>

<body>
<?php include("scripts/navigation.php");
?>
<div class="container" style="margin-bottom:100px;">
	<div class="well">
		<h3>Hello! Create your make-a-thon!</h3>
    <br />
		<form class="form-horizontal">
  			<div class="control-group">
    			<label class="control-label" for="inputName">Makerspace name</label>
    			<div class="controls">
      				<input type="text" id="inputName" placeholder="Makerspace name">
    			</div>
  			</div>
  			<div class="control-group">
    			<label class="control-label" for="inputDescription">Description</label>
    			<div class="controls">
      				<input type="text" id="inputDescription" placeholder="Description">
    			</div>
  			</div>
  			<div class="control-group">
    			<label class="control-label" for="inputFee">Fee</label>
    			<div class="controls">
      				<input type="text" id="inputDescription" placeholder="e.g. 200 or 0">
    			</div>
  			</div>
  			<div class="control-group">
  				<label class="control-label" for="inputParticipants">Participants</label>
    			<div class="controls">
      				
       				<input type="checkbox" id="inputIndividuals"> Individuals
       				<input type="text" id="inputLimitIndividuals" placeholder="Maximum no of individuals">
       				<br /><br />
       				<input type="checkbox" id="inputTeams"> Teams 
       				<input type="text" id="inputLimitTeams" placeholder="Maximum no of teams">
       				<br />
              <br />
      				<button type="submit" class="btn btn-primary">Create</button>
    			</div>
  			</div>
		</form>
	</div>
</div>

<?php include("scripts/footer.php");?>

<script src="js/jquery.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
<script src="js/bootstrap-modal.js"></script>
</body>
</html>