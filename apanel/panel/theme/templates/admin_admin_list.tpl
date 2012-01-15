<h1>Administrators</h1>

<table class="tableList">
	<tr>
		<th width="5%">&nbsp;</td>
		<th width="5%">&nbsp;</td>
		<th>Title</td>
		<th>Username</td>
		<th width="15%">Action</td>
	</tr>
{foreach from=$admin_list key=k item=al}
	<tr {if $k is odd}class="odd"{/if}>
		<td class="aCenter"><input type="checkbox" value="{$al.admin_id}" name="admin_id" /></td>
		<td class="aRight">{$al.num}</td>
		<td>{$al.first_name} {$al.last_name}</td>
		<td>{$al.username}</td>
		<td class="aCenter">
			<a href="admin-edit-{$al.admin_id}.htm" class="edit"></a>
			<a href="admin-delete-{$al.admin_id}.htm" class="delete"></a>
		</td>
	</tr>
{/foreach}
</table>

<a href="admin-edit.htm" class="button">Add Administrator</a>