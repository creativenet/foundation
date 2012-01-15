<?php /* Smarty version Smarty 3.1.4, created on 2012-01-05 14:11:27
         compiled from "panel/theme/templates\core_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:87344f05a17f152ed3-21235599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82513eff6fbb0413c47db3cf778ce4e51c9b03a1' => 
    array (
      0 => 'panel/theme/templates\\core_login.tpl',
      1 => 1325633908,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87344f05a17f152ed3-21235599',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'meta' => 0,
    'theme' => 0,
    'config' => 0,
    'error' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f05a17f2b84c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f05a17f2b84c')) {function content_4f05a17f2b84c($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<title><?php echo $_smarty_tpl->tpl_vars['meta']->value['title'];?>
</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
css/login.css">
	<script src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
libs/jquery-1.6.2.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
libs/login.js"></script>
</head>
<body>
	<div id="top">
		<h1>@.PANEL</h1>
		<h2><?php echo $_smarty_tpl->tpl_vars['config']->value['project_name'];?>
</h2>
		<div id="loginBg"></div>
		<div class="loginWrapper">
			<div class="box">
				<div class="header grey">
					<img src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
images/lock.png" alt="" width="16" height="16" />
					<h3>Login</h3>
				</div>
				<form method="post">
					<div class="content">
						<?php if ($_smarty_tpl->tpl_vars['error']->value['count']>0){?>
						<div class="alert">
							<span class="warning"></span>You have <?php echo $_smarty_tpl->tpl_vars['error']->value['count'];?>
 error(s). They have been highlighted.
						</div>
						<?php }?>
						<div class="section">
							<label> Username </label>
							<div>
								<input class="required<?php if ($_smarty_tpl->tpl_vars['error']->value['username']){?> error<?php }?>" name="data[username]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['username'];?>
">
								<?php if ($_smarty_tpl->tpl_vars['error']->value['username']){?>
								<label class="error">This field is required.</label>
								<?php }?>
							</div>
						</div>
						<div class="section">
							<label> Password </label>
							<div>
								<input type="password" class="required <?php if ($_smarty_tpl->tpl_vars['error']->value['password']||$_smarty_tpl->tpl_vars['error']->value['login']){?> error<?php }?>" name="data[password]">
								<?php if ($_smarty_tpl->tpl_vars['error']->value['password']){?>
								<label class="error">This field is required.</label>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['error']->value['login']&&!$_smarty_tpl->tpl_vars['error']->value['password']){?>
								<label class="error">Wrong username or password.</label>
								<?php }?>
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
</html> <?php }} ?>