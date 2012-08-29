<?php
include("connect_db.php");

$comment_on=$_POST[comment_on];
$comment_by=$_POST[comment_by];
$comment=$_POST[comment];
$query= $conn->query("INSERT INTO comments (comment_by,comment_on,comment)
VALUES ('$comment_by','$comment_on','$comment')");
$response= $conn->affected_rows;

if($response) {
$ref=$_SERVER['HTTP_REFERER'];
echo "Comment Inserted";
header("location: $ref");
}
else {
echo "Error while inserting comment.";
}
$conn->close();
?>