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
global $link;
$link=mysql_connect ("$servername","$dbuser","$dbpassword");
if(!$link){die("Could not connect to MySQL");}
mysql_select_db("$dbname",$link) or die ("could not open db".mysql_error());
}
echo mysql_error(); 

?>


