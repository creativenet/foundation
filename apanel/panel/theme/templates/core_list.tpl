<h1>{$module.title}</h1>

<table class="tableList">
	<tr>
		<th width="5%">&nbsp;</td>
		<th width="5%">&nbsp;</td>
{foreach from=$list.fields item=lf}
	{foreach from=$module.field item=f}
		<th>{$f.name}</td>
	{/foreach}
{/foreach}
		<th width="15%">Action</td>
	</tr>
{foreach from=${$list}_list key=k item=pl}
	<tr {if $k is odd}class="odd"{/if}>
		<td class="aCenter"><input type="checkbox" value="{$list[$module.module_id]}" name="data[{$module.module_id}][]" /></td>
		<td class="aRight">{$list.num}</td>
	{foreach from=$module.field item=f}
		<th>{$f.value}</td>
	{/foreach}
		<td class="aCenter">
			<a href="{$module.module}-edit-{$list[$module.module_id]}.htm" class="edit"></a>
			<a href="{$module.module}-delete-{$list[$module.module_id]}.htm" class="delete"></a>
		</td>
	</tr>
{/foreach}
</table>

<a href="{$module.module}-edit.htm" class="button">Add {$module.module}</a>