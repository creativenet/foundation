<?php /* Smarty version Smarty 3.1.4, created on 2012-01-10 07:59:39
         compiled from "panel/theme/templates/admin_content_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6071741074efd581624a275-59380380%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0085f4f54a6088775131d402dc176c2c29b699ef' => 
    array (
      0 => 'panel/theme/templates/admin_content_edit.tpl',
      1 => 1326120290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6071741074efd581624a275-59380380',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4efd58163c922',
  'variables' => 
  array (
    'data' => 0,
    'form1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4efd58163c922')) {function content_4efd58163c922($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['data']->value['content_id']){?>
<h1>Edit Page <?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
</h1>
<?php }else{ ?>
<h1>Add Page</h1>
<?php }?>
<form method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="head"><span class="collapse"></span><h5 class="iList">Content</h5></div>
		<?php echo $_smarty_tpl->tpl_vars['form1']->value;?>

		<div class="clear"></div>
	</div>
</form>
<?php }} ?>