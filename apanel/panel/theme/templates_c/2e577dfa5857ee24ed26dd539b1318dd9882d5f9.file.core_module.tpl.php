<?php /* Smarty version Smarty 3.1.4, created on 2012-01-09 10:31:08
         compiled from "panel/theme/templates\core_module.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213954f0ab3dc9f47b5-21363083%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e577dfa5857ee24ed26dd539b1318dd9882d5f9' => 
    array (
      0 => 'panel/theme/templates\\core_module.tpl',
      1 => 1325935442,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213954f0ab3dc9f47b5-21363083',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'meta' => 0,
    'theme' => 0,
    'module_list' => 0,
    'ml' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f0ab3dcb4928',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f0ab3dcb4928')) {function content_4f0ab3dcb4928($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<title><?php echo $_smarty_tpl->tpl_vars['meta']->value['title'];?>
</title>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
images/favicon.png" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
css/blitzer/jquery-ui-1.8.16.custom.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
css/screen.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
css/jquery.ezmark.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
css/jquery.selectbox.css">
	
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
libs/module.js"></script>
</head>
<body>
	<form method="post" enctype="multipart/form-data">
		<fieldset class="modulesHolder">
			<?php  $_smarty_tpl->tpl_vars['ml'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ml']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['module_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ml']->key => $_smarty_tpl->tpl_vars['ml']->value){
$_smarty_tpl->tpl_vars['ml']->_loop = true;
?>
				<div>
					<input type="checkbox" name="data[module][]" value="<?php echo $_smarty_tpl->tpl_vars['ml']->value['module'];?>
" <?php if ($_smarty_tpl->tpl_vars['ml']->value['active']=='yes'){?>checked="checked"<?php }?> /> <?php echo $_smarty_tpl->tpl_vars['ml']->value['module'];?>

				</div>
			<?php } ?>
			<input type="submit" name="data[save]" value="Save" class="fLeft" />
		</fieldset>
	</form>
</body>
</html> <?php }} ?>