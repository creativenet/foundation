<?php
	/*----------------------------------------------*/
	/* BUILD PAGE																		*/
	/*----------------------------------------------*/
	function index_index(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$product_list = mysql_q("SELECT * FROM product ORDER BY RAND() LIMIT 6");
		
		$tpl->assign("product_list", $product_list);
		$main['content'] = $tpl->fetch("user_index.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	$module = "index";
	$action = $_r['action'];
	$default_action = "index";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>