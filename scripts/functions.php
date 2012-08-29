<?php
//we need to use mysqli_real_escape_string

function clean($str){
	$servername='localhost';
	$dbuser='abhinit';
	$dbpassword='abhinit';
	$dbname="hackathon";
	
	$conn= new mysqli("$servername","$dbuser","$dbpassword","$dbname");
	return mysqli_real_escape_string($conn,$str);
}
?>