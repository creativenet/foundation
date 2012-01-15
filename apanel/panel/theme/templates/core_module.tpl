<!DOCTYPE html>
<html>
<head>
	<title>{$meta.title}</title>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="{$theme}images/favicon.png" />
	<link rel="stylesheet" type="text/css" media="screen" href="{$theme}css/blitzer/jquery-ui-1.8.16.custom.css">
	<link rel="stylesheet" type="text/css" media="screen" href="{$theme}css/screen.css">
	<link rel="stylesheet" type="text/css" media="screen" href="{$theme}css/jquery.ezmark.css">
	<link rel="stylesheet" type="text/css" media="screen" href="{$theme}css/jquery.selectbox.css">
	
	<script src="{$theme}libs/jquery-1.6.2.min.js"></script>
	<script src="{$theme}libs/jquery-ui-1.8.16.custom.min.js"></script>
	<script src="{$theme}libs/jquery.mousewheel.js"></script>
	<script src="{$theme}libs/jquery.selectbox-0.1.3.min.js"></script>
	<script src="{$theme}libs/jquery.ezmark.min.js"></script>
	<script src="{$theme}libs/tinymce/tiny_mce.js"></script>
	<script src="{$theme}libs/module.js"></script>
</head>
<body>
	<form method="post" enctype="multipart/form-data">
		<fieldset class="modulesHolder">
			{foreach from=$module_list item=ml}
				<div>
					<input type="checkbox" name="data[module][]" value="{$ml.module}" {if $ml.active=='yes'}checked="checked"{/if} /> {$ml.module}
				</div>
			{/foreach}
			<input type="submit" name="data[save]" value="Save" class="fLeft" />
		</fieldset>
	</form>
</body>
</html> 