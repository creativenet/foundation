<?php /* Smarty version Smarty 3.1.4, created on 2012-01-09 16:41:36
         compiled from "panel/theme/templates/admin_product_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6105460564efb7f12209435-92922613%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49e49b8b1ad8fbf86b62eb60bd113e3160304dba' => 
    array (
      0 => 'panel/theme/templates/admin_product_edit.tpl',
      1 => 1326123643,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6105460564efb7f12209435-92922613',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4efb7f1221ef5',
  'variables' => 
  array (
    'product' => 0,
    'form1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4efb7f1221ef5')) {function content_4efb7f1221ef5($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['product']->value['product_id']){?>
<h1>Edit Product <?php echo $_smarty_tpl->tpl_vars['product']->value['title'];?>
</h1>
<?php }else{ ?>
<h1>Add Product</h1>
<?php }?>
<form method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="head"><span class="collapse"></span><h5 class="iList">Content</h5></div>
		<?php echo $_smarty_tpl->tpl_vars['form1']->value;?>

		<div class="clear"></div>
	</div>
</form>
<?php }} ?>