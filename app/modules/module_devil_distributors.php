<?php
	/*----------------------------------------------*/
	/* BUILD PAGE																		*/
	/*----------------------------------------------*/
	function distributor_detail(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$distributor_list = mysql_q("SELECT * FROM distributor ORDER BY title");
		$tpl->assign("distributor_list", $distributor_list);
		
		$main['content'] = $tpl->fetch("user_devil_distributor.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	$module = "distributor";
	$action = $_r['action'];
	$default_action = "detail";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>