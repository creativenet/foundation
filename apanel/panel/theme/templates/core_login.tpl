<!DOCTYPE html>
<html>
<head>
	<title>{$meta.title}</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" media="screen" href="{$theme}css/login.css">
	<script src="{$theme}libs/jquery-1.6.2.min.js"></script>
	<script src="{$theme}libs/login.js"></script>
</head>
<body>
	<div id="top">
		<h1>@.PANEL</h1>
		<h2>{$config.project_name}</h2>
		<div id="loginBg"></div>
		<div class="loginWrapper">
			<div class="box">
				<div class="header grey">
					<img src="{$theme}images/lock.png" alt="" width="16" height="16" />
					<h3>Login</h3>
				</div>
				<form method="post">
					<div class="content">
						{if $error.count>0}
						<div class="alert">
							<span class="warning"></span>You have {$error.count} error(s). They have been highlighted.
						</div>
						{/if}
						<div class="section">
							<label> Username </label>
							<div>
								<input class="required{if $error.username} error{/if}" name="data[username]" value="{$data.username}">
								{if $error.username}
								<label class="error">This field is required.</label>
								{/if}
							</div>
						</div>
						<div class="section">
							<label> Password </label>
							<div>
								<input type="password" class="required {if $error.password || $error.login} error{/if}" name="data[password]">
								{if $error.password}
								<label class="error">This field is required.</label>
								{/if}
								{if $error.login AND !$error.password}
								<label class="error">Wrong username or password.</label>
								{/if}
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="actions">
						<div style="margin-top: 8px;" class="actionsLeft">
						</div>
						<div class="actionsRight">
							<input type="submit" name="submit[login]" value="Login">
						</div>
						<div class="clear"></div>
					</div>
				</form>
			</div>
			<div class="shadow"></div>
		</div>
	</div>
</body>
</html> 