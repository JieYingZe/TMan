<?php

include 'include/db.php';
$tbl_name = "user"; // Table name 

// Connect to server and select databse.
$con = mysqli_connect("$host", "$MySQL_username", "$MySQL_password", "$db_name")or die("cannot connect"); 

// username and password sent from form 
$username = $_POST['username'];
$password = $_POST['password'];
// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);
$sql = "SELECT `userid` FROM $tbl_name WHERE username='$username' and password='$password'";
$result = mysqli_query($con, $sql);

// Mysql_num_row is counting table row
$count = mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count == 1)
{
	$row = mysqli_fetch_array($result);
	$userid = $row['userid'];
	session_start();
	$_SESSION['userid'] = $userid;
	header("location:".$_POST['redirect_to']);
}
else
{
	echo "Wrong Username or Password";
}
?>
