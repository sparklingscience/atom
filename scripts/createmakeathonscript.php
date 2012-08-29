<?php
include("functions.php");
include("connect_db.php");
mysql_select_db($database);
$formData=$_POST['data'];
//print_r($formData);
$data = json_decode($formData);
//print_r($data);
$name= clean($data->name); //won't work because we need to use mysqli_real_escape_string
$sparkUrl =$data->sparkUrl;
$existingUrl= $data->existingUrl;
$description= $data->description;
$address= $data->address.$data->city;
$country= $data->country;
$fee= $data->fee;
$individuals=$data->individuals;
$maxIndividuals= $data->maxIndividuals;
$teams= $data->teams;
$maxTeams= $data->maxTeams;

//$query = "INSERT INTO `hackathon`.`makerspace` (`id`, `name`, `sparkUrl`, `existingUrl`, `description`, `address`, `country`, `fee`, `admins`, `members`) VALUES (NULL, \'hvjh\', \'mnbnm\', \'nbmn\', \'mnbmn\', \'nbn\', \'nv\', \'656\', \'hgfg\', \'hgfgh\');";
$query="INSERT INTO makeathon (name,sparkUrl,existingUrl,description,address,country,fee,individuals,maxIndividuals,teams,maxTeams) VALUES ('$name','$sparkUrl','$existingUrl','$description','$address','$country',$fee,'$individuals','$maxIndividuals','$teams','$maxTeams');";

$response=mysql_query($query) or die(mysql_error());
if($response){
	echo "success";
};
mysql_close();
?>