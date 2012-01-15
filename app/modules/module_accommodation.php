<?php
	/*----------------------------------------------*/
	/* BUILD PAGE																		*/
	/*----------------------------------------------*/
	function accommodation_all(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$data = $_r['data'];
		
		$main['content'] = $tpl->fetch("user_accommodation.tpl");
		display($main);
	}
	function accommodation_list(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$data = $_r['data'];
		
		$main['content'] = $tpl->fetch("user_accommodation_list.tpl");
		display($main);
	}
	function accommodation_detail(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$data = $_r['data'];
		
		$main['content'] = $tpl->fetch("user_accommodation_detail.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	$module = "accommodation";
	$action = $_r['action'];
	$default_action = "list";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>