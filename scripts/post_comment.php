<?php
include("connect_db.php");
mysql_select_db($database);
$comment_on=$_POST[comment_on];
$comment_by=$_POST[comment_by];
$comment=$_POST[comment];
$query=mysql_query("INSERT INTO comments (comment_by,comment_on,comment)
VALUES ('$comment_by','$comment_on','$comment')");
if($query) {
$ref=$_SERVER['HTTP_REFERER'];
echo "Comment Inserted";
header("location: $ref");
}
else {
echo "Error while inserting comment, Contact the <a href=\"http://shrikrishna.tk\">programmer</a> for any help.";
}
mysql_close();
?>