<?php /* Smarty version Smarty 3.1.4, created on 2012-01-09 11:58:27
         compiled from "panel/theme/templates\admin_product_category_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:174794f0ac853200f60-52353756%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa497d99ca725d2bd24fbe093cbab6d654e5737c' => 
    array (
      0 => 'panel/theme/templates\\admin_product_category_edit.tpl',
      1 => 1326106403,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174794f0ac853200f60-52353756',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'form1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f0ac853288bf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f0ac853288bf')) {function content_4f0ac853288bf($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['category']->value['category_id']){?>
<h1>Edit Category <?php echo $_smarty_tpl->tpl_vars['category']->value['title'];?>
</h1>
<?php }else{ ?>
<h1>Add Category</h1>
<?php }?>
<form method="post" enctype="multipart/form-data">
	<?php echo $_smarty_tpl->tpl_vars['form1']->value;?>

</form><?php }} ?>