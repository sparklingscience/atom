<?php
include("connect_db.php");
include("functions.php");

$formData=$_POST['data'];
$data = json_decode($formData);
$name= clean($data->name); //won't work because we need to use mysqli_real_escape_string
echo $name;
$sparkUrl =$data->sparkUrl;
$existingUrl= $data->existingUrl;
$description= $data->description;
$address= $data->address.$data->city;
$country= $data->countries;
$fee= $data->fee;

//$query = "INSERT INTO `hackathon`.`makerspace` (`id`, `name`, `sparkUrl`, `existingUrl`, `description`, `address`, `country`, `fee`, `admins`, `members`) VALUES (NULL, \'hvjh\', \'mnbnm\', \'nbmn\', \'mnbmn\', \'nbn\', \'nv\', \'656\', \'hgfg\', \'hgfgh\');";
$sql="INSERT INTO makerspace (name,sparkUrl,existingUrl,description,address,country,fee) VALUES ('$name','$sparkUrl','$existingUrl','$description','$address','$country','$fee')";


$query = $conn->query($sql);
$response= $conn->affected_rows;

if($response){
	echo "success";
};
$conn->close();
?>