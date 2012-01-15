<?php
	// DEVILS TECH
	$category_list = mysql_q("SELECT * FROM product_category ORDER BY category_id");
	while(list($k, $v)=@each($category_list)){
		$product_list = mysql_q("SELECT * FROM product WHERE category_id='".add_slash($v['category_id'])."' ORDER BY id");
		if($product_list){
			$category_list[$k]['product_list'] = $product_list;
		}
	}
	$tpl->assign("category_list", $category_list);
	
?>