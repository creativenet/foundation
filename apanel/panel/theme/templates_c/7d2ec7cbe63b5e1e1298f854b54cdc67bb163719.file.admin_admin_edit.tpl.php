<?php /* Smarty version Smarty 3.1.4, created on 2012-01-09 15:45:18
         compiled from "panel/theme/templates/admin_admin_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19075381284f086692ae1b11-56626672%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d2ec7cbe63b5e1e1298f854b54cdc67bb163719' => 
    array (
      0 => 'panel/theme/templates/admin_admin_edit.tpl',
      1 => 1326120312,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19075381284f086692ae1b11-56626672',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f086692b389f',
  'variables' => 
  array (
    'data' => 0,
    'form1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f086692b389f')) {function content_4f086692b389f($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['data']->value['admin_id']){?>
<h1>Edit admin <?php echo $_smarty_tpl->tpl_vars['data']->value['username'];?>
</h1>
<?php }else{ ?>
<h1>Add admin</h1>
<?php }?>
<form method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="head"><span class="collapse"></span><h5 class="iList">Content</h5></div>
		<?php echo $_smarty_tpl->tpl_vars['form1']->value;?>

		<div class="clear"></div>
	</div>
</form>
<?php }} ?>