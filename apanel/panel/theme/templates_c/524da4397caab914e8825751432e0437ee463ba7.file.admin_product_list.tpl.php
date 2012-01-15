<?php /* Smarty version Smarty 3.1.4, created on 2012-01-09 10:34:54
         compiled from "panel/theme/templates\admin_product_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:36204efb004cecd4f1-26176069%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '524da4397caab914e8825751432e0437ee463ba7' => 
    array (
      0 => 'panel/theme/templates\\admin_product_list.tpl',
      1 => 1325534892,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36204efb004cecd4f1-26176069',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4efb004cf39b1',
  'variables' => 
  array (
    'product_list' => 0,
    'k' => 0,
    'pl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4efb004cf39b1')) {function content_4efb004cf39b1($_smarty_tpl) {?><h1>Products</h1>

<table class="tableList">
	<tr>
		<th width="5%">&nbsp;</td>
		<th width="5%">&nbsp;</td>
		<th>Title</td>
		<th>Category</td>
		<th width="15%">Action</td>
	</tr>
<?php  $_smarty_tpl->tpl_vars['pl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pl']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pl']->key => $_smarty_tpl->tpl_vars['pl']->value){
$_smarty_tpl->tpl_vars['pl']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['pl']->key;
?>
	<tr <?php if ((1 & $_smarty_tpl->tpl_vars['k']->value)){?>class="odd"<?php }?>>
		<td class="aCenter"><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['pl']->value['id'];?>
" name="product_id" /></td>
		<td class="aRight"><?php echo $_smarty_tpl->tpl_vars['pl']->value['num'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['pl']->value['title'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['pl']->value['category_title'];?>
</td>
		<td class="aCenter">
			<a href="product-edit-<?php echo $_smarty_tpl->tpl_vars['pl']->value['id'];?>
.htm" class="edit"></a>
			<a href="product-delete-<?php echo $_smarty_tpl->tpl_vars['pl']->value['id'];?>
.htm" class="delete"></a>
		</td>
	</tr>
<?php } ?>
</table>

<a href="product-edit.htm" class="button">Add Product</a><?php }} ?>