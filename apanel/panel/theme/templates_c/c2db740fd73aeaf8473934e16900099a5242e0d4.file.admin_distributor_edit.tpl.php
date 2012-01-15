<?php /* Smarty version Smarty 3.1.4, created on 2012-01-03 15:50:57
         compiled from "panel/theme/templates/admin_distributor_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13426023634f0315d1417c68-44768611%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2db740fd73aeaf8473934e16900099a5242e0d4' => 
    array (
      0 => 'panel/theme/templates/admin_distributor_edit.tpl',
      1 => 1325602255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13426023634f0315d1417c68-44768611',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'form1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f0315d151e08',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f0315d151e08')) {function content_4f0315d151e08($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['data']->value['distributor_id']){?>
<h1>Edit Distributor <?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
</h1>
<?php }else{ ?>
<h1>Add Distributor</h1>
<?php }?>
<form method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="head"><span class="collapse"></span><h5 class="iList">Distributor Data</h5></div>
		<?php echo $_smarty_tpl->tpl_vars['form1']->value;?>

		<div class="clear"></div>
	</div>
</form><?php }} ?>