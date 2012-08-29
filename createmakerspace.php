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
<div class="container">
	<div class="well">
		<h3 style="margin-left:30px;">Hello! Create your Makerspace!</h3>
		<br />
		<form class="form-horizontal" id="createmakerspace" action="/" method="post">
  			<div class="control-group">
    			<label class="control-label" for="inputName">Makerspace name</label>
    			<div class="controls">
      				<input type="text" id="inputName" placeholder="Makerspace Name" name="name">
      				<span style="color:#AAA;">Cannot be edited after registration</span>
    			</div>
  			</div>
  			<div class="control-group">
    			<label class="control-label" for="inputSparkUrl">Choose url for makerspace page</label>
    			
    			<div class="controls">
    				<div class="input-prepend">
  					<span class="add-on" style="color:#AAA;">http://www.sparklingscience.com/</span><input id="inputSparkUrl" type="text" placeholder="makerspacename" name="sparkUrl">
  					<span style="color:#AAA;">Cannot be edited after registration</span>
					</div>
    			</div>
  			</div>
  			<div class="control-group">
    			<label class="control-label" for="inputExistingUrl">Existing url</label>
    			<div class="controls">
      				<input type="text" id="inputExistingUrl" placeholder="www.yourmakerspace.com" name="existingUrl">
      				<span style="color:#AAA;">If you have any. Otherwise your new url will suffice.</span>
    			</div>
  			</div>
  			<div class="control-group">
    			<label class="control-label" for="inputDescription">Description</label>
    			<div class="controls">
      				<textarea rows=3 class="span5" type="text" id="inputDescription" placeholder="What is the theme of your makerspace?" name="description"></textarea>
    			</div>
  			</div>
  			<div class="control-group">
    			<label class="control-label" for="inputLocation">Location</label>
    			<div class="controls">
      				<input type="text" id="inputLocation" placeholder="Address" name="address"><br />
      				<input type="text" id="inputLocation" placeholder="City" name="city" style="margin-top:5px"><br />
      				<select id="countries" name="countries" style="margin-top:5px">
      				<?php include("scripts/selectCountry.php");?>
      				</select>
    			</div>
  			</div>
  			<div class="control-group">
    			<label class="control-label" for="inputFee">Annual fee</label>
    			<div class="controls">
      				<input type="text" id="inputDescription" placeholder="e.g. 200&#36; or 50SEK or simply 0" name="fee">
    			</div>
  			</div>
  			<div class="form-actions">
      			<button id="submitButton" class="btn btn-primary">Create</button>
      		</div>
		</form>
		

	</div>
</div>
<?php include("scripts/footer.php");?>

<script src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$.fn.serializeObject = function()
		{
		    var o = {};
		    var a = this.serializeArray();
		    $.each(a, function() {
		        if (o[this.name] !== undefined) {
		            if (!o[this.name].push) {
		                o[this.name] = [o[this.name]];
		            }
		            o[this.name].push(this.value || '');
		        } else {
		            o[this.name] = this.value || '';
		        }
		    });
		    return o;
		};

		$("#inputName").keyup(function(){
			var str =  $(this).val().toLowerCase().replace(/[^a-z0-9\s]/gi, '').split(' ').join(''); //jQuery
			$('#inputSparkUrl').val(str);
		});

		    $('#createmakerspace').submit(function() {
		    	/* stop form from submitting normally */
		    	event.preventDefault();
		        var content = JSON.stringify($('#createmakerspace').serializeObject());
		        //alert(content);
		        $.post("scripts/createmakerspacescript.php",{data:content},
		        	function(data){
						if(data!="error"){
							document.location = "makerspace.php?sparkUrl="+data;
						}
		        		//alert(data);
		        	}) ;
		        
		    });
});
</script>
<script src="js/bootstrap-tooltip.js"></script>
<script src="js/bootstrap-modal.js"></script>
</body>
</html>