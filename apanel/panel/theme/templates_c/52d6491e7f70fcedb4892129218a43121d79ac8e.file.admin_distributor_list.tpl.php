<?php /* Smarty version Smarty 3.1.4, created on 2012-01-03 15:57:16
         compiled from "panel/theme/templates/admin_distributor_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17331201654f03138a0dfc34-38845688%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52d6491e7f70fcedb4892129218a43121d79ac8e' => 
    array (
      0 => 'panel/theme/templates/admin_distributor_list.tpl',
      1 => 1325602627,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17331201654f03138a0dfc34-38845688',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f03138a1fe89',
  'variables' => 
  array (
    'distributor_list' => 0,
    'k' => 0,
    'dl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f03138a1fe89')) {function content_4f03138a1fe89($_smarty_tpl) {?><h1>Distributors</h1>

<table class="tableList">
	<tr>
		<th width="5%">&nbsp;</td>
		<th width="5%">&nbsp;</td>
		<th>Distributor</td>
		<th width="15%">Action</td>
	</tr>
<?php  $_smarty_tpl->tpl_vars['dl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dl']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['distributor_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dl']->key => $_smarty_tpl->tpl_vars['dl']->value){
$_smarty_tpl->tpl_vars['dl']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['dl']->key;
?>
	<tr <?php if ((1 & $_smarty_tpl->tpl_vars['k']->value)){?>class="odd"<?php }?>>
		<td class="aCenter"><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['dl']->value['distributor_id'];?>
" name="distributor_id" /></td>
		<td class="aRight"><?php echo $_smarty_tpl->tpl_vars['dl']->value['num'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['dl']->value['title'];?>
</td>
		<td class="aCenter">
			<a href="distributor-edit-<?php echo $_smarty_tpl->tpl_vars['dl']->value['distributor_id'];?>
.htm" class="edit"></a>
			<a href="distributor-delete-<?php echo $_smarty_tpl->tpl_vars['dl']->value['distributor_id'];?>
.htm" class="delete"></a>
		</td>
	</tr>
<?php } ?>
</table>

<a href="distributor-edit.htm" class="button">Add Distrubutor</a><?php }} ?>