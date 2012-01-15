<?php
	/*----------------------------------------------*/
	/* BUILD PAGE																		*/
	/*----------------------------------------------*/
	function product_detail(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$product_id = $_r['product_id'];
		
		$product = mysql_q("SELECT p.*
			FROM product AS p 
			WHERE id='".add_slash($product_id)."'
			", "single");
		$tpl->assign("product", $product);
		
		$product_list = mysql_q("SELECT * FROM product WHERE category_id='".$product['category_id']."' AND id<>'".$product['id']."' ORDER BY title LIMIT 2");
		$tpl->assign("product_list", $product_list);
		
		$main['content'] = $tpl->fetch("user_devil_product.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	$module = "product";
	$action = $_r['action'];
	$default_action = "detail";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>