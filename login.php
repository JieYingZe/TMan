<?php
$host="localhost"; // Host name 
$MySQL_username="Jerry"; // Mysql username 
$MySQL_password="password"; // Mysql password 
$db_name="test"; // Database name 
$tbl_name="member"; // Table name 

// Connect to server and select databse.
$con = mysqli_connect("$host", "$MySQL_username", "$MySQL_password", "$db_name")or die("cannot connect"); 

// username and password sent from form 
$username=$_POST['username']; 
$password=$_POST['password']; 

// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);
$sql="SELECT * FROM $tbl_name WHERE username='$username' and password='$password'";
$result=mysqli_query($con, $sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php
$_SESSION['username'];
$_SESSION['password']; 
header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
}
?>
