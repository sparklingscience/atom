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
<style>
.container:nth-of-type(2){
	margin-top:80px!important;
}

footer{
	margin-top:0;
}
</style>
</head>

<body>
<?php include("scripts/navigation.php");?>
<div class="container" style="margin:80px auto auto auto;">

	<div class="well">
		<h3 style="margin-left:30px;">Hello! Sign-up as a maker!</h3>
		<br />
        
        
    	<form class="form-horizontal" id="createmaker" action="/" method="post">
  			<div class="control-group">
    			<label class="control-label" for="inputEmail">E-mail</label>
    			<div class="controls">
      				<input type="text" id="inputEmail" placeholder="Your e-mail address" name="email">
      				<span style="color:#AAA;">e.g. someblah@awesomeblah.com</span>
    			</div>
  			</div>
        
  			<div class="control-group">
    			<label class="control-label" for="inputPassword">Password</label>
    			<div class="controls">
    				<input id="inputPassword" type="password" placeholder="Enter Password" name="password">
  					<span style="color:#AAA;">Minimum 8 characters</span>
				</div>
    		</div>
            
            
			<div class="control-group">
    			<label class="control-label" for="inputPassword2">Repeat Password</label>
    			<div class="controls">
    				<input id="inputPassword2" type="password" placeholder="Repeat Password" name="password2">
  					<span style="color:#AAA;">Repeat your password</span>
				</div>
    		</div>
  			<div class="form-actions">
      			<button id="submitButton" class="btn btn-primary btn-large">Create</button>
      		</div>
		</form>
        <img src="img/email.png" style="float:right;"/>        

	</div>
</div>

<?php include("scripts/footer.php");?>
</body>
</html>