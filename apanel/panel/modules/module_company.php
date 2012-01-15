<?php
	/*----------------------------------------------*/
	/* COMPANY																			*/
	/*----------------------------------------------*/
	function company_list(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$module['title'] = "Company";
		$module['module'] = "company";
		$module['module_id'] = "company_id";
		$module['field'] = array("name"=>"Company Title", value="title");
		
		$list = mysql_q("SELECT * FROM company ORDER BY title");
		
		$tpl->assign("list", $list);
		
		
		$main['content'] = $tpl->fetch("core_list.tpl");
		display($main);
	}

	$module = "company";
	$default_action = "list";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>