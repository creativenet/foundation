<?php
	$dont_show = array("login", "logout", "setting", "module");
	$tmp_nav = mysql_q("SELECT * FROM admin_module WHERE active='yes'");
	while(list($k,$v)=@each($tmp_nav)){
		$title = str_replace(array("module_", ".php", "_"), array("", "", " "), $v['name']);
		$url = str_replace(array("module_", ".php"), array("", ""), $v['name']);
		if(!in_array($title, $dont_show)){
			if($module == $title) {
				$active = true;
			} else {
				$active = false;
			}
			$main_nav[$k] = array("title" => $title,
														"active" => $active,
														"url" => $url
													);
		}
	}
	$tpl->assign("main_nav", $main_nav);
	
?>