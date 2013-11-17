<!DOCTYPE HTML>
<html>
	<head>
	<title><?php $title?></title>
	<meta charset="UTF-8" />
	<meta name="keywords" content="天问, ask, website" />
	<meta name="description" content="自古天意高难问，天问问答网站" />
	<meta name="author" content="揭英泽" />
	<link rel="stylesheet" type="text/css" href="all.css" />
	</head>
		<div id="header">
			<a id="logo" href="index.php" title="天问"></a>
<?php
session_start();
if(!isset($_SESSION['username']))
{
?>
			<div class="login">
				<form class="login-form" method="post" action="login.php">
					<div id="login-input">
						<fieldset id="username-fieldset" class="control-group">
							<label for="username" class="control-label">用户名</label>
							<div class="controls">
								<p id="username-notification" class="notification"></p>
								<input id="username" maxlength="15" name="username" type="text" value="jieyingze">
							</div>
						</fieldset>
						<fieldset id="password-fieldset" class="control-group">
							<label for="user-email" class="control-label">密码</label>
							<div class="controls">
								<p id="password-notification" class="notification"></p>
								<input id="password" class="password-input" name="password" type="text" value="123456">
							</div>
						</fieldset>
					</div>
					<div id="submit-button">
						<input type="hidden" name="redirect_to" value=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>>
						<a class="register-button btn" href="register.php">注册</a>
						<button class="login-button btn" type="submit">登录</button>
					</div>
				</form>
			</div>
<?php
}
else
{
?>
			<div>
				这是个人信息
			</div>
<?php
}
?>
		</div>
	<body class="page">
		<div id="nav">
			<ul>
				<li><a href="index.php" title="Home">我的主页</a></li>
				<li><a href="questions.php" title="Questions">热点问题</a></li>
				<li><a href="tags.php" title="Tags">主题标签</a></li>
				<li><a href="person.php" title="Person">个人页面</a></li>
				<li><a href="account.php" title="Account">账号管理</a></li>
			</ul>
		</div>
