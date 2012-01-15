<?php /* Smarty version Smarty 3.1.4, created on 2012-01-10 07:41:01
         compiled from "panel/theme/templates/admin_ads_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12892503734f0833f73a76a6-53976408%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0912c755dfef23b7a7269f5cf99827f7cc42f130' => 
    array (
      0 => 'panel/theme/templates/admin_ads_list.tpl',
      1 => 1326177660,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12892503734f0833f73a76a6-53976408',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f0833f741bb6',
  'variables' => 
  array (
    'ad_list' => 0,
    'k' => 0,
    'al' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f0833f741bb6')) {function content_4f0833f741bb6($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Library/WebServer/Documents/foundation/app/include/smarty/libs/plugins/modifier.truncate.php';
?><h1>Ads</h1>

<table class="tableList">
	<thead>
		<tr>
			<th width="5%">&nbsp;</td>
			<th width="5%">&nbsp;</td>
			<th>Content</td>
			<th width="15%">Action</td>
		</tr>
	</thead>
	<tbody>
	<?php  $_smarty_tpl->tpl_vars['al'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['al']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ad_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['al']->key => $_smarty_tpl->tpl_vars['al']->value){
$_smarty_tpl->tpl_vars['al']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['al']->key;
?>
		<tr <?php if ((1 & $_smarty_tpl->tpl_vars['k']->value)){?>class="odd"<?php }?>>
			<td class="aCenter"><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['al']->value['ad_id'];?>
" name="category_id" /></td>
			<td class="aRight"><?php echo $_smarty_tpl->tpl_vars['al']->value['num'];?>
</td>
			<td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['al']->value['content'],60);?>
</td>
			<td class="aCenter">
				<a href="ads-edit-<?php echo $_smarty_tpl->tpl_vars['al']->value['ad_id'];?>
.htm" class="edit"></a>
				<a href="ads-delete-<?php echo $_smarty_tpl->tpl_vars['al']->value['ad_id'];?>
.htm" class="delete"></a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>

<a href="ads-edit.htm" class="button">Add Ad</a>

<script>
$(document).ready(function() {
    oTable = $('.tableList').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers"
    });
} );
</script><?php }} ?>