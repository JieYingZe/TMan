<?php include 'include/header.php'; ?>
		<div class="content">
			<form class="account-form">
				<fieldset id="username_fieldset" class="control-group">
					<label for="user_screen_name" class="control-label">用户名</label>
					<div class="controls">
						<p id="username_notification" class="notification"></p>
						<input id="user_screen_name" maxlength="15" name="user[screen_name]" type="text" value="jieyingze">
						<p class="notification">用户名长度3-15个字节</span></p>
					</div>
				</fieldset>
				<fieldset id="email_fieldset" class="control-group">
					<label for="user_email" class="control-label">邮箱地址</label>
					<div class="controls">
						<p id="email_notification" class="notification"></p>
						<input id="user_email" class="email-input" name="user[email]" type="text" value="jyz11@software.nju.edu.cn">
						<p>邮箱地址不会公开显示。</p>
					</div>
				</fieldset>
			</form>
		</div>
<?php include 'include/footer.php'; ?>
