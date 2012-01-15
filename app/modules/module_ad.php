<?php
	/*----------------------------------------------*/
	/* BUILD PAGE																		*/
	/*----------------------------------------------*/
	function ad_list(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$ad_list = mysql_q("SELECT a.*
			FROM ad AS a 
			LEFT JOIN ad_category AS c ON a.category_id=c.category_id
			");
		
		$tpl->assign("ad_list", $ad_list);
		$main['content'] = $tpl->fetch("user_ad_list.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	$module = "ad";
	$action = $_r['action'];
	$default_action = "list";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>