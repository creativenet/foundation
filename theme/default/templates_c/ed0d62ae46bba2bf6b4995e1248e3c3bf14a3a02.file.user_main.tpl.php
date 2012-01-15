<?php /* Smarty version Smarty 3.1.4, created on 2011-12-01 21:32:48
         compiled from "theme/default/templates/user_main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10941090344ec2e4780287d7-84154211%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed0d62ae46bba2bf6b4995e1248e3c3bf14a3a02' => 
    array (
      0 => 'theme/default/templates/user_main.tpl',
      1 => 1322771094,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10941090344ec2e4780287d7-84154211',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4ec2e478182dd',
  'variables' => 
  array (
    'meta' => 0,
    'theme' => 0,
    'main' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ec2e478182dd')) {function content_4ec2e478182dd($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<title><?php echo $_smarty_tpl->tpl_vars['meta']->value['title'];?>
</title>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
css/screen.css">
</head>
<body>
	<div class="wrapper">
		<header>
			<div id="headerTop">
				<a href=""><img src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
images/logo.png" alt="" id="logo" /></a>
			</div>
		</header>
		<div id="contentHolder">
			<?php echo $_smarty_tpl->tpl_vars['main']->value['content'];?>

		</div>
	</div>
	<footer>
		<div class="wrapper">
			<a href=""><img src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
images/footer-logo.png" alt="" id="footerLogo" /></a>
		</div>
	</footer>
</body>
</html> <?php }} ?>