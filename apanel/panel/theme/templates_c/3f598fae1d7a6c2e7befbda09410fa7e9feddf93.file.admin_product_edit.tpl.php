<?php /* Smarty version Smarty 3.1.4, created on 2012-01-09 11:55:10
         compiled from "panel/theme/templates\admin_product_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:55134efb0069cb3303-14629229%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f598fae1d7a6c2e7befbda09410fa7e9feddf93' => 
    array (
      0 => 'panel/theme/templates\\admin_product_edit.tpl',
      1 => 1325120884,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55134efb0069cb3303-14629229',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4efb0069d00a5',
  'variables' => 
  array (
    'product' => 0,
    'form1' => 0,
    'config' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4efb0069d00a5')) {function content_4efb0069d00a5($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['product']->value['product_id']){?>
<h1>Edit Product <?php echo $_smarty_tpl->tpl_vars['product']->value['title'];?>
</h1>
<?php }else{ ?>
<h1>Add Product</h1>
<?php }?>
<form method="post" enctype="multipart/form-data">
	<?php echo $_smarty_tpl->tpl_vars['form1']->value;?>

</form>
<img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['webroot'];?>
/upload/<?php echo $_smarty_tpl->tpl_vars['data']->value['photo'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value['photo'];?>
" /><?php }} ?>