<h1>Product Categories</h1>

<table class="tableList">
	<tr>
		<th width="5%">&nbsp;</td>
		<th width="5%">&nbsp;</td>
		<th>Title</td>
		<th width="15%">Action</td>
	</tr>
{foreach from=$product_category_list key=k item=pl}
	<tr {if $k is odd}class="odd"{/if}>
		<td class="aCenter"><input type="checkbox" value="{$pl.id}" name="category_id" /></td>
		<td class="aRight">{$pl.num}</td>
		<td>{$pl.title}</td>
		<td class="aCenter">
			<a href="product_category-edit-{$pl.id}.htm" class="edit"></a>
			<a href="product_category-delete-{$pl.id}.htm" class="delete"></a>
		</td>
	</tr>
{/foreach}
</table>

<a href="product_category-edit.htm" class="button">Add Product Category</a>