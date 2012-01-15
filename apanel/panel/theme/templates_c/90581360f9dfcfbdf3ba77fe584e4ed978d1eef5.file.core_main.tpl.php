<?php /* Smarty version Smarty 3.1.4, created on 2012-01-10 07:28:11
         compiled from "panel/theme/templates/core_main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13526388514efb7f083bdc21-87627934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90581360f9dfcfbdf3ba77fe584e4ed978d1eef5' => 
    array (
      0 => 'panel/theme/templates/core_main.tpl',
      1 => 1326176887,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13526388514efb7f083bdc21-87627934',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4efb7f084357c',
  'variables' => 
  array (
    'meta' => 0,
    'theme' => 0,
    'main_nav' => 0,
    'n' => 0,
    'main' => 0,
    'server' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4efb7f084357c')) {function content_4efb7f084357c($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include '/Library/WebServer/Documents/foundation/app/include/smarty/libs/plugins/modifier.capitalize.php';
?><!DOCTYPE html>
<html>
<head>
	<title><?php echo $_smarty_tpl->tpl_vars['meta']->value['title'];?>
</title>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
images/favicon.png" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
css/smoothness/jquery-ui-1.8.16.custom.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
css/screen.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
css/jquery.ezmark.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
css/jquery.selectbox.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
css/demo_table_jui.css">
	
	<script src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
libs/jquery-1.6.2.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
libs/jquery-ui-1.8.16.custom.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
libs/jquery.mousewheel.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
libs/jquery.selectbox-0.1.3.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
libs/jquery.ezmark.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
libs/tinymce/tiny_mce.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
libs/jquery.meio.mask.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
libs/jquery.dataTables.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
libs/core.js"></script>
</head>
<body>
	<header>
		<div class="wrapper">
			<div id="logoHolder"><img src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
images/foundation-logo.png" alt="" /></div>
			<div id="rightNav">
				<a class="settings" href="setting.htm">Settings</a>
				<a class="signout" href="logout.htm">Sign Out</a>
			</div>
			<nav>
				<div id="mainNav">
					<ul>
						<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['main_nav']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
$_smarty_tpl->tpl_vars['n']->_loop = true;
?>
						<li <?php if ($_smarty_tpl->tpl_vars['n']->value['active']){?>class="on"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['n']->value['url'];?>
.htm" class="<?php echo $_smarty_tpl->tpl_vars['n']->value['url'];?>
"><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['n']->value['title']);?>
</a></li>
						<?php } ?>
					</ul>
					<form id="searchForm">
						<input type="text" value="Search..." class="search">
						<input type="submit" class="go">
					</form>
				</div>
			</nav>
		</div>
	</header>
	<div id="loadingNotification">Loading...</div>
	<div id="contentHolder">
		<div class="wrapper">
			<div id="aside">
				<div id="sidebarTop">
					<div class="userinfo">
						<div class="info">
							<div class="avatar">
								<img width="80" height="80" alt="" src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
images//avatar.png">
							</div>
							<a href="#">3 Messages</a>
						</div>
						<ul class="links">
							<li><strong><a href="#">Administrator</a></strong></li>
							<li><a href="#">Settings</a></li>
							<li><a href="#">Logout</a></li>
						</ul>
						<div class="clear"></div>
					</div>
				</div>
				<div id="sidebarContent">
					
				</div>
			</div>
			<div id="mainContent">
				<?php echo $_smarty_tpl->tpl_vars['main']->value['content'];?>

			</div>
		</div>
	</div>
	<footer>
		<div class="wrapper">
			<?php echo $_smarty_tpl->tpl_vars['server']->value['SERVER_NAME'];?>
 : <?php echo $_smarty_tpl->tpl_vars['server']->value['SERVER_ADDR'];?>
 (<?php echo $_smarty_tpl->tpl_vars['server']->value['DOCUMENT_ROOT'];?>
)
		</div>
	</footer>
</body>
</html> <?php }} ?>