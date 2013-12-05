<?php
include 'include/db.php';
$tbl_name = "answer";
$con = mysqli_connect("$host", "$MySQL_username", "$MySQL_password", "$db_name")or die("cannot connect");

$answer_content = $_POST['content'];
$questionid = $_POST['questionid'];
session_start();
if(isset($_SESSION['userid']))
{
	$userid = $_SESSION['userid'];
	$sql = "INSERT INTO `$tbl_name` (`content`, `question_questionid`, `user_userid`) VALUES ('$answer_content', '$questionid', '$userid')";
	$result = mysqli_query($con, $sql);
	header("Location: question.php?questionid=$questionid");
}
else
{
	header("Location: pleaselogin.php?redirect_to=question.php?questionid=$questionid");
}
?>
