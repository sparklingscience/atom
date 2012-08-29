<?php
include("connect_db.php");

$sql = "SELECT * FROM users";
$query = $conn->query($sql);
print_r($query);
?>

<br />
<br />


<?php

$result = $query->fetch_object();
print_r($result);
?>
<br />
<br />
<?php

while($result){
echo "userid is {$result->First_Name}<br />";
$result = $query->fetch_object();

}

$conn->close();
?>