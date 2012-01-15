<?php /* Smarty version Smarty 3.1.4, created on 2012-01-09 15:43:53
         compiled from "panel/theme/templates/admin_content_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11822341124efd523f0053e1-20669298%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63fced2c462ec964551d1e195c9d7be38a40b81d' => 
    array (
      0 => 'panel/theme/templates/admin_content_list.tpl',
      1 => 1325534570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11822341124efd523f0053e1-20669298',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4efd523f1b7e8',
  'variables' => 
  array (
    'content_list' => 0,
    'k' => 0,
    'cl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4efd523f1b7e8')) {function content_4efd523f1b7e8($_smarty_tpl) {?><h1>Pages</h1>

<table class="tableList">
	<tr>
		<th width="5%"><input type="checkbox" class="allCheckBox" /></td>
		<th width="5%">&nbsp;</td>
		<th>Title</td>
		<th width="15%">Action</td>
	</tr>
<?php  $_smarty_tpl->tpl_vars['cl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cl']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['content_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cl']->key => $_smarty_tpl->tpl_vars['cl']->value){
$_smarty_tpl->tpl_vars['cl']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['cl']->key;
?>
	<tr <?php if ((1 & $_smarty_tpl->tpl_vars['k']->value)){?>class="odd"<?php }?>>
		<td class="aCenter"><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['cl']->value['content_id'];?>
" name="content_id" /></td>
		<td class="aRight"><?php echo $_smarty_tpl->tpl_vars['cl']->value['num'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['cl']->value['title'];?>
</td>
		<td class="aCenter">
			<a href="content-edit-<?php echo $_smarty_tpl->tpl_vars['cl']->value['content_id'];?>
.htm" class="edit"></a>
			<a href="content-delete-<?php echo $_smarty_tpl->tpl_vars['cl']->value['content_id'];?>
.htm" class="delete"></a>
		</td>
	</tr>
<?php } ?>
</table>

<a href="content-edit.htm" class="button">Add Page</a><?php }} ?>