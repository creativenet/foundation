<?php /* Smarty version Smarty 3.1.4, created on 2012-01-09 15:43:50
         compiled from "panel/theme/templates/core_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20477305064efb7f11f26ee9-99765770%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8641101fda5b5a16582cffde61685b6f81c1aeb8' => 
    array (
      0 => 'panel/theme/templates/core_form.tpl',
      1 => 1325976470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20477305064efb7f11f26ee9-99765770',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4efb7f12202fc',
  'variables' => 
  array (
    'form' => 0,
    'f' => 0,
    'data' => 0,
    'error' => 0,
    'sel_opt' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4efb7f12202fc')) {function content_4efb7f12202fc($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['form']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
$_smarty_tpl->tpl_vars['f']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['f']->key;
?>
	<?php if ($_smarty_tpl->tpl_vars['f']->value['type']!="hidden"){?>
	<div class="fRow">
		<?php if ($_smarty_tpl->tpl_vars['f']->value['field']['label']){?>
		<label><?php echo $_smarty_tpl->tpl_vars['f']->value['field']['label'];?>
</label>
		<?php }?>
		<div class="inputCell">
	<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['f']->value['type']=="input"){?>
			<input type="text" name="data[<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['name'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['f']->value['field']['name']];?>
" class="<?php if ($_smarty_tpl->tpl_vars['f']->value['field']['error']&&$_smarty_tpl->tpl_vars['error']->value[$_smarty_tpl->tpl_vars['f']->value['field']['name']]){?>error <?php }?><?php echo $_smarty_tpl->tpl_vars['f']->value['field']['class'];?>
" style="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['style'];?>
" />
				<?php if ($_smarty_tpl->tpl_vars['f']->value['field']['error']&&$_smarty_tpl->tpl_vars['error']->value[$_smarty_tpl->tpl_vars['f']->value['field']['name']]){?>
					<label class="error"><?php echo $_smarty_tpl->tpl_vars['f']->value['field']['error'];?>
</label>
				<?php }?>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['f']->value['type']=="password"){?>
			<input type="password" name="data[<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['name'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['f']->value['field']['name']];?>
" class="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['class'];?>
" style="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['style'];?>
" />
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['f']->value['type']=="hidden"){?>
			<input type="hidden" name="data[<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['name'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['f']->value['field']['name']];?>
" class="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['class'];?>
" style="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['style'];?>
" />
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['f']->value['type']=="file"){?>
			<div class="auHolder">
				<div class="auBtn">Browse</div>
				<input type="file" name="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['name'];?>
" class="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['class'];?>
" />
			</div>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['f']->value['type']=="checkbox"){?>
			<input type="checkbox" name="data[<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['name'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['value'];?>
" class="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['class'];?>
" style="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['style'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['f']->value['field']['name']]==$_smarty_tpl->tpl_vars['f']->value['field']['value']){?>checked="checked"<?php }?> />
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['f']->value['type']=="radio"){?>
			<input type="radio" name="data[<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['name'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['value'];?>
" class="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['class'];?>
" style="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['style'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['f']->value['field']['name']]==$_smarty_tpl->tpl_vars['f']->value['field']['value']){?>checked="checked"<?php }?> />
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['f']->value['type']=="textarea"){?>
			<textarea name="data[<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['name'];?>
]" class="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['class'];?>
" style="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['style'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['f']->value['field']['name']]==$_smarty_tpl->tpl_vars['f']->value['field']['value']){?>checked="checked"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['f']->value['field']['name']];?>
</textarea>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['f']->value['type']=="select"){?>
			<select name="data[<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['name'];?>
]" class="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['class'];?>
" style="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['style'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['f']->value['field']['name']]==$_smarty_tpl->tpl_vars['f']->value['field']['value']){?>checked="checked"<?php }?> >
				<?php  $_smarty_tpl->tpl_vars['sel_opt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sel_opt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['f']->value['field']['option']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sel_opt']->key => $_smarty_tpl->tpl_vars['sel_opt']->value){
$_smarty_tpl->tpl_vars['sel_opt']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['sel_opt']->value['value'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['f']->value['field']['name']]==$_smarty_tpl->tpl_vars['sel_opt']->value['value']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['sel_opt']->value['title'];?>
</option>
				<?php } ?>
			</select>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['f']->value['type']=="btn"){?>
			<input type="button" name="data[<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['name'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['name'];?>
" class="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['class'];?>
" style="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['style'];?>
" />
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['f']->value['type']=="submit"){?>
			<input type="submit" name="data[<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['name'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['name'];?>
" class="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['class'];?>
" style="<?php echo $_smarty_tpl->tpl_vars['f']->value['field']['style'];?>
" />
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['f']->value['type']=="sac"){?>
			<input type="submit" name="data[save]" value="Save" class="fLeft <?php echo $_smarty_tpl->tpl_vars['f']->value['field']['class'];?>
" style="margin-right: 10px; <?php echo $_smarty_tpl->tpl_vars['f']->value['field']['style'];?>
" />
			<input type="submit" name="data[apply]" value="Apply" class="fLeft <?php echo $_smarty_tpl->tpl_vars['f']->value['field']['class'];?>
" style="margin-right: 10px; <?php echo $_smarty_tpl->tpl_vars['f']->value['field']['style'];?>
" />
			<input type="submit" name="data[cancel]" value="Cancel" class="fLeft <?php echo $_smarty_tpl->tpl_vars['f']->value['field']['class'];?>
" style="margin-right: 10px; <?php echo $_smarty_tpl->tpl_vars['f']->value['field']['style'];?>
" />
			<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['f']->value['type']!="hidden"){?>
		</div>
	</div>
	<?php }?>
<?php } ?><?php }} ?>