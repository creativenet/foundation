<h1>Ads</h1>

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
	{foreach from=$ad_list key=k item=al}
		<tr {if $k is odd}class="odd"{/if}>
			<td class="aCenter"><input type="checkbox" value="{$al.ad_id}" name="category_id" /></td>
			<td class="aRight">{$al.num}</td>
			<td>{$al.content|truncate:60}</td>
			<td class="aCenter">
				<a href="ads-edit-{$al.ad_id}.htm" class="edit"></a>
				<a href="ads-delete-{$al.ad_id}.htm" class="delete"></a>
			</td>
		</tr>
	{/foreach}
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
</script>