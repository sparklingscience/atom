<?php
/*
$servername='mydb24.surf-town.net';
$dbusername='tedxvas_abhinit';
$dbpassword='abhinit2211';
$dbname="tedxvas_scoopitwiz";
*/

$servername='localhost';
$dbusername='abhinit';
$dbpassword='abhinit';
$dbname="hackathon";

connecttodb($servername,$dbname,$dbusername,$dbpassword);

function connecttodb($servername,$dbname,$dbuser,$dbpassword)
{
	global $conn;
	$conn= new mysqli("$servername","$dbuser","$dbpassword","$dbname");
	
	//The following checks if there has been any error while connecting to the db, if so, we display the error.
	if (mysqli_connect_errno()) {
	  exit('Connect failed: '. mysqli_connect_error());
	}
}
?>