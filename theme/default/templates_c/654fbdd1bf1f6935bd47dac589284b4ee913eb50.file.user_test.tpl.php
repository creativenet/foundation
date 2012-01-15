<?php /* Smarty version Smarty 3.1.4, created on 2011-11-15 11:45:19
         compiled from "theme/default/templates\user_test.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47814ec242bff39a15-50091801%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '654fbdd1bf1f6935bd47dac589284b4ee913eb50' => 
    array (
      0 => 'theme/default/templates\\user_test.tpl',
      1 => 1321275789,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47814ec242bff39a15-50091801',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4ec242c016163',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ec242c016163')) {function content_4ec242c016163($_smarty_tpl) {?><form method="post" enctype="multipart/form-data">
	<input type="file" name="upload_file" />
	<input type="submit" value="send" />
</form><?php }} ?>