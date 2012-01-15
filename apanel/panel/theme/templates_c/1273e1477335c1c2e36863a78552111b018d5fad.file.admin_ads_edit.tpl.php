<?php /* Smarty version Smarty 3.1.4, created on 2012-01-10 06:30:12
         compiled from "panel/theme/templates/admin_ads_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18418676454f0bcc22a455b6-82150836%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1273e1477335c1c2e36863a78552111b018d5fad' => 
    array (
      0 => 'panel/theme/templates/admin_ads_edit.tpl',
      1 => 1326173410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18418676454f0bcc22a455b6-82150836',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f0bcc22cbb01',
  'variables' => 
  array (
    'ad' => 0,
    'form1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f0bcc22cbb01')) {function content_4f0bcc22cbb01($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['ad']->value['ad_id']){?>
<h1>Edit Ad</h1>
<?php }else{ ?>
<h1>Add New Ad</h1>
<?php }?>
<form method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="head"><span class="collapse"></span><h5 class="iList">Content</h5></div>
		<?php echo $_smarty_tpl->tpl_vars['form1']->value;?>

		<div class="clear"></div>
	</div>
</form>
<?php }} ?>