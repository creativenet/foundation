<?php /* Smarty version Smarty 3.1.4, created on 2012-01-09 12:02:23
         compiled from "panel/theme/templates\admin_product_category_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:291654f0ac696641063-18962650%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a05b91fcde07b5ed62473751b372c2e2faf3ed60' => 
    array (
      0 => 'panel/theme/templates\\admin_product_category_list.tpl',
      1 => 1326106919,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '291654f0ac696641063-18962650',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f0ac696e2544',
  'variables' => 
  array (
    'product_category_list' => 0,
    'k' => 0,
    'pl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f0ac696e2544')) {function content_4f0ac696e2544($_smarty_tpl) {?><h1>Product Categories</h1>

<table class="tableList">
	<tr>
		<th width="5%">&nbsp;</td>
		<th width="5%">&nbsp;</td>
		<th>Title</td>
		<th width="15%">Action</td>
	</tr>
<?php  $_smarty_tpl->tpl_vars['pl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pl']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product_category_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pl']->key => $_smarty_tpl->tpl_vars['pl']->value){
$_smarty_tpl->tpl_vars['pl']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['pl']->key;
?>
	<tr <?php if ((1 & $_smarty_tpl->tpl_vars['k']->value)){?>class="odd"<?php }?>>
		<td class="aCenter"><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['pl']->value['id'];?>
" name="category_id" /></td>
		<td class="aRight"><?php echo $_smarty_tpl->tpl_vars['pl']->value['num'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['pl']->value['title'];?>
</td>
		<td class="aCenter">
			<a href="product_category-edit-<?php echo $_smarty_tpl->tpl_vars['pl']->value['id'];?>
.htm" class="edit"></a>
			<a href="product_category-delete-<?php echo $_smarty_tpl->tpl_vars['pl']->value['id'];?>
.htm" class="delete"></a>
		</td>
	</tr>
<?php } ?>
</table>

<a href="product_category-edit.htm" class="button">Add Product Category</a><?php }} ?>