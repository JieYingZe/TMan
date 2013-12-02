<?php
include 'include/db.php';
$tbl_name = "answer";
$con = mysqli_connect("$host", "$MySQL_username", "$MySQL_password", "$db_name")or die("cannot connect");

$answer = $_POST['content'];
	
$sql = "INSERT INTO `$tbl_name` (`title`, `content`, `reward`, `user_userid`) VALUES ('$question_title', '$question_content', '0', '1')";
$result = mysqli_query($con, $sql);
if($result)
{
	echo "成功发表";
	$sql = "SELECT * FROM $tbl_name";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	echo $row['title'];
	echo $row['content'];
}
?>
