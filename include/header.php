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
			<div id="login">
				<form class="login-form" method="post" action="login.php">
					<fieldset id="username_fieldset" class="control-group">
						<label for="username" class="control-label">用户名</label>
						<div class="controls">
							<p id="username_notification" class="notification"></p>
							<input id="username" maxlength="15" name="username" type="text" value="jieyingze">
						</div>
					</fieldset>
					<fieldset id="password_fieldset" class="control-group">
						<label for="user_email" class="control-label">密码</label>
						<div class="controls">
							<p id="email_notification" class="notification"></p>
							<input id="password" class="password-input" name="password" type="text" value="123456">
						</div>
					</fieldset>
					<button type="submit">登陆</button>
				</form>
			</div>
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
