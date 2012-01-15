<h1>Products</h1>

<table class="tableList">
	<tr>
		<th width="5%">&nbsp;</td>
		<th width="5%">&nbsp;</td>
		<th>Title</td>
		<th>Category</td>
		<th width="15%">Action</td>
	</tr>
{foreach from=$product_list key=k item=pl}
	<tr {if $k is odd}class="odd"{/if}>
		<td class="aCenter"><input type="checkbox" value="{$pl.id}" name="product_id" /></td>
		<td class="aRight">{$pl.num}</td>
		<td>{$pl.title}</td>
		<td>{$pl.category_title}</td>
		<td class="aCenter">
			<a href="product-edit-{$pl.id}.htm" class="edit"></a>
			<a href="product-delete-{$pl.id}.htm" class="delete"></a>
		</td>
	</tr>
{/foreach}
</table>

<a href="product-edit.htm" class="button">Add Product</a>