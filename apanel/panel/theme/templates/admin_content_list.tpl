<h1>Pages</h1>

<table class="tableList">
	<tr>
		<th width="5%"><input type="checkbox" class="allCheckBox" /></td>
		<th width="5%">&nbsp;</td>
		<th>Title</td>
		<th width="15%">Action</td>
	</tr>
{foreach from=$content_list key=k item=cl}
	<tr {if $k is odd}class="odd"{/if}>
		<td class="aCenter"><input type="checkbox" value="{$cl.content_id}" name="content_id" /></td>
		<td class="aRight">{$cl.num}</td>
		<td>{$cl.title}</td>
		<td class="aCenter">
			<a href="content-edit-{$cl.content_id}.htm" class="edit"></a>
			<a href="content-delete-{$cl.content_id}.htm" class="delete"></a>
		</td>
	</tr>
{/foreach}
</table>

<a href="content-edit.htm" class="button">Add Page</a>