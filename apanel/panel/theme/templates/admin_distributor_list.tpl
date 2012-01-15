<h1>Distributors</h1>

<table class="tableList">
	<tr>
		<th width="5%">&nbsp;</td>
		<th width="5%">&nbsp;</td>
		<th>Distributor</td>
		<th width="15%">Action</td>
	</tr>
{foreach from=$distributor_list key=k item=dl}
	<tr {if $k is odd}class="odd"{/if}>
		<td class="aCenter"><input type="checkbox" value="{$dl.distributor_id}" name="distributor_id" /></td>
		<td class="aRight">{$dl.num}</td>
		<td>{$dl.title}</td>
		<td class="aCenter">
			<a href="distributor-edit-{$dl.distributor_id}.htm" class="edit"></a>
			<a href="distributor-delete-{$dl.distributor_id}.htm" class="delete"></a>
		</td>
	</tr>
{/foreach}
</table>

<a href="distributor-edit.htm" class="button">Add Distrubutor</a>