{if $data.admin_id}
<h1>Edit admin {$data.username}</h1>
{else}
<h1>Add admin</h1>
{/if}
<form method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="head"><span class="collapse"></span><h5 class="iList">Content</h5></div>
		{$form1}
		<div class="clear"></div>
	</div>
</form>
