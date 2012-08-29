<?php
//we need to use mysqli_real_escape_string
function clean($str){
	return htmlspecialchars($str);
}

function unclean($str){
	return htmlspecialchars_decode($str);
}
?>