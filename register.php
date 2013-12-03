<?php
/*
// username and password sent from form 
$username = $_POST['username'];
$password = $_POST['password'];

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);
$sql = "SELECT * FROM $tbl_name WHERE username='$username' and password='$password'";
$result = mysqli_query($con, $sql);

// Mysql_num_row is counting table row
$count = mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count == 1){

// Register $myusername, $mypassword and redirect to file "login_success.php
session_start();
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
header("location:".$_POST['redirect_to']);
}
else {
echo "Wrong Username or Password";
}
*/
?>
<?php


include 'include/db.php';
$tbl_name = "user"; // Table name 

// Connect to server and select databse.
$con = mysqli_connect("$host", "$MySQL_username", "$MySQL_password", "$db_name")or die("cannot connect"); 
// define variables and set to empty values
$usernameErr = $passwordErr = $emailErr = $genderErr = $websiteErr = "";
$username = $password = $email = $gender = $profile = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (empty($_POST["username"]))
	{
		$usernameErr = "用户名不能为空";
	}
	else
	{
		$username = test_input($_POST["username"]);
		// check if username only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z0-9]*$/",$username))
		{
			$usernameErr = "用户名只能由字母和数字组成";
		}
		else
		{
			$sql = "SELECT * FROM $tbl_name WHERE username='$username'";
			$result = mysqli_query($con, $sql);
			$count = mysqli_num_rows($result);
			if($count != 0)
			{
				$usernameErr = "用户名已存在，请注册其他用户名";
			}
		}
	}

	if (empty($_POST["password"]))
	{
		$passwordErr = "密码不能为空";
	}
	else
	{
		$password = test_input($_POST["password"]);
		// check if password only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z0-9]*$/",$password))
		{
			$passwordErr = "密码只能由字母和数字组成";
		}
	}

	if (empty($_POST["email"]))
	{
		$emailErr = "E-mail不能为空";
	}
	else
	{
		$email = test_input($_POST["email"]);
		// check if e-mail address syntax is valid
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
		{
			$emailErr = "邮箱格式错误";
		}
		else
		{
			$sql = "SELECT * FROM $tbl_name WHERE email='$email'";
			$result = mysqli_query($con, $sql);
			$count = mysqli_num_rows($result);
			if($count != 0)
			{
				$emailErr = "邮箱已注册，请直接登录";
			}
		}
	}

	if (empty($_POST["gender"]))
	{
		$genderErr = "必须选择性别";
	}
	else
	{
		$gender = test_input($_POST["gender"]);
	}

	if (empty($_POST["website"]))
	{
		$website = "";
	}
	else
	{
		$website = test_input($_POST["website"]);
		// check if URL address syntax is valid (this regular expression also allows dashes in the URL)
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website))
		{
			$websiteErr = "网址格式错误";
		}
	}

	if (empty($_POST["profile"]))
	{
		$profile = "";
	}
	else
	{
		$profile = test_input($_POST["profile"]);
	}



	if(!($usernameErr || $passwordErr || $emailErr || $genderErr || $websiteErr))
	{

		$sql = "INSERT INTO `$tbl_name` (`username`, `password`, `email`, `gender`, `website`, `profile`) VALUES ('$username', '$password', '$email', '$gender', '$website', '$profile')";
		$result = mysqli_query($con, $sql);
		if($result)
		{
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;

			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = 'index.php';
			header("Location: http://$host$uri/$extra");
		}
	}
}

function test_input($data)
{
	// To protect MySQL injection
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>

<?php
include 'include/header.php';
?>

<p><span class="error">* 必须填写的内容.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   用户名: <input type="text" name="username" value="<?php echo $username;?>">
   <span class="error">* <?php echo $usernameErr;?></span>
   <br><br>
   密码: <input type="password" name="password" value="<?php echo $password;?>">
   <span class="error">* <?php echo $passwordErr;?></span>
   <br><br>
   E-mail: <input type="text" name="email" value="<?php echo $email;?>">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
   性别:
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>  value="female">女
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="male">男
   <span class="error">* <?php echo $genderErr;?></span>
   <br><br>
   个人网站: <input type="text" name="website" value="<?php echo $website;?>">
   <span class="error"><?php echo $websiteErr;?></span>
   <br><br>
   个人简介: <textarea name="profile" rows="5" cols="40"><?php echo $profile;?></textarea>
   <br><br>
   <button type="submit" name="submit" class="register-button btn" value="Submit">注册新用户</button>
</form>

<?php
include 'include/footer.php';
?>
