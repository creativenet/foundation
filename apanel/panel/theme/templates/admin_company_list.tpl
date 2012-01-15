<h1>Company</h1>

<table class="tableList">
	<tr>
		<th width="5%">&nbsp;</td>
		<th width="5%">&nbsp;</td>
		<th>Company</td>
		<th width="15%">Action</td>
	</tr>
{foreach from=$ad_list key=k item=al}
	<tr {if $k is odd}class="odd"{/if}>
		<td class="aCenter"><input type="checkbox" value="{$al.ad_id}" name="ad_id" /></td>
		<td class="aRight">{$al.num}</td>
		<td>{$al.content|truncate:60}</td>
		<td class="aCenter">
			<a href="ads-edit-{$al.ad_id}.htm" class="edit"></a>
			<a href="ads-delete-{$al.ad_id}.htm" class="delete"></a>
		</td>
	</tr>
{/foreach}
</table>

<a href="ads-edit.htm" class="button">Add Ad</a>