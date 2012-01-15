<!DOCTYPE html>
<html>
<head>
	<title>{$meta.title}</title>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="{$theme}images/favicon.png" />
	<link rel="stylesheet" type="text/css" media="screen" href="{$theme}css/smoothness/jquery-ui-1.8.16.custom.css">
	<link rel="stylesheet" type="text/css" media="screen" href="{$theme}css/screen.css">
	<link rel="stylesheet" type="text/css" media="screen" href="{$theme}css/jquery.ezmark.css">
	<link rel="stylesheet" type="text/css" media="screen" href="{$theme}css/jquery.selectbox.css">
	<link rel="stylesheet" type="text/css" media="screen" href="{$theme}css/demo_table_jui.css">
	
	<script src="{$theme}libs/jquery-1.6.2.min.js"></script>
	<script src="{$theme}libs/jquery-ui-1.8.16.custom.min.js"></script>
	<script src="{$theme}libs/jquery.mousewheel.js"></script>
	<script src="{$theme}libs/jquery.selectbox-0.1.3.min.js"></script>
	<script src="{$theme}libs/jquery.ezmark.min.js"></script>
	<script src="{$theme}libs/tinymce/tiny_mce.js"></script>
	<script src="{$theme}libs/jquery.meio.mask.min.js"></script>
	<script src="{$theme}libs/jquery.dataTables.min.js"></script>
	<script src="{$theme}libs/core.js"></script>
</head>
<body>
	<header>
		<div class="wrapper">
			<div id="logoHolder"><img src="{$theme}images/foundation-logo.png" alt="" /></div>
			<div id="rightNav">
				<a class="settings" href="setting.htm">Settings</a>
				<a class="signout" href="logout.htm">Sign Out</a>
			</div>
			<nav>
				<div id="mainNav">
					<ul>
						{foreach from=$main_nav item=n}
						<li {if $n.active}class="on"{/if}><a href="{$n.url}.htm" class="{$n.url}">{$n.title|capitalize}</a></li>
						{/foreach}
					</ul>
					<form id="searchForm">
						<input type="text" value="Search..." class="search">
						<input type="submit" class="go">
					</form>
				</div>
			</nav>
		</div>
	</header>
	<div id="loadingNotification">Loading...</div>
	<div id="contentHolder">
		<div class="wrapper">
			<div id="aside">
				<div id="sidebarTop">
					<div class="userinfo">
						<div class="info">
							<div class="avatar">
								<img width="80" height="80" alt="" src="{$theme}images//avatar.png">
							</div>
							<a href="#">3 Messages</a>
						</div>
						<ul class="links">
							<li><strong><a href="#">Administrator</a></strong></li>
							<li><a href="#">Settings</a></li>
							<li><a href="#">Logout</a></li>
						</ul>
						<div class="clear"></div>
					</div>
				</div>
				<div id="sidebarContent">
					
				</div>
			</div>
			<div id="mainContent">
				{$main.content}
			</div>
		</div>
	</div>
	<footer>
		<div class="wrapper">
			{$server.SERVER_NAME} : {$server.SERVER_ADDR} ({$server.DOCUMENT_ROOT})
		</div>
	</footer>
</body>
</html> 