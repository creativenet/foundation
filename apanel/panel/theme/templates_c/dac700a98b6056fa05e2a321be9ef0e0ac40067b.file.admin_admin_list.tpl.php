<?php /* Smarty version Smarty 3.1.4, created on 2012-01-07 16:36:48
         compiled from "panel/theme/templates/admin_admin_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5537240234f085b92034987-20764097%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dac700a98b6056fa05e2a321be9ef0e0ac40067b' => 
    array (
      0 => 'panel/theme/templates/admin_admin_list.tpl',
      1 => 1325947920,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5537240234f085b92034987-20764097',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f085b920a3a7',
  'variables' => 
  array (
    'admin_list' => 0,
    'k' => 0,
    'al' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f085b920a3a7')) {function content_4f085b920a3a7($_smarty_tpl) {?><h1>Administrators</h1>

<table class="tableList">
	<tr>
		<th width="5%">&nbsp;</td>
		<th width="5%">&nbsp;</td>
		<th>Title</td>
		<th>Username</td>
		<th width="15%">Action</td>
	</tr>
<?php  $_smarty_tpl->tpl_vars['al'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['al']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['admin_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['al']->key => $_smarty_tpl->tpl_vars['al']->value){
$_smarty_tpl->tpl_vars['al']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['al']->key;
?>
	<tr <?php if ((1 & $_smarty_tpl->tpl_vars['k']->value)){?>class="odd"<?php }?>>
		<td class="aCenter"><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['al']->value['admin_id'];?>
" name="admin_id" /></td>
		<td class="aRight"><?php echo $_smarty_tpl->tpl_vars['al']->value['num'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['al']->value['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['al']->value['last_name'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['al']->value['username'];?>
</td>
		<td class="aCenter">
			<a href="admin-edit-<?php echo $_smarty_tpl->tpl_vars['al']->value['admin_id'];?>
.htm" class="edit"></a>
			<a href="admin-delete-<?php echo $_smarty_tpl->tpl_vars['al']->value['admin_id'];?>
.htm" class="delete"></a>
		</td>
	</tr>
<?php } ?>
</table>

<a href="admin-edit.htm" class="button">Add Administrator</a><?php }} ?>