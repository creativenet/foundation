<?php
	/*----------------------------------------------*/
	/* BUILD PAGE																		*/
	/*----------------------------------------------*/
	function shop_cart(){
		global $tpl, $config, $meta, $_r, $_l, $_u, $_s;
		
		//if(!$_u) @redirect("login.htm");
		
		if(!$_u['user_id']){
			while(list($k,$v) = @each($_SESSION['cart'])){
				$p = mysql_q("SELECT p.*, c.title AS category_name
											FROM product AS p
											LEFT JOIN product_category AS c ON p.category_id = c.category_id
											WHERE p.id='".add_slash($k)."'", "single");
				if($p){
					$cart_list[] = array( "product"=>$p,
																"quantity"=>$v,
																"total"=>$v*$p['price'],
					);
					$total += $v*$p['price'];
				}
			}
		} else {
		
		}

		
		$tpl->assign("cart_list", $cart_list);
		$tpl->assign("total", $total);
		$main['content'] = $tpl->fetch("user_shop_cart.tpl");
		display($main);
	}
	
	/*----------------------------------------------*/
	/* AJAX ADD TO CART															*/
	/*----------------------------------------------*/
	function shop_add_2_cart(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		if($_r['quantity']) {
			if(!$_u['user_id']){
				$_SESSION['cart'][$_r['product_id']] += $_r['quantity'];
				echo "Product is Added to Your Shopping Cart";
			}
		} else {
			echo "Plese Enter Product Quantity";
		}
	}
	/*----------------------------------------------*/
	/* AJAX UPDATE CART															*/
	/*----------------------------------------------*/
	function shop_update_cart(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		if(!$_u['user_id']){
			$_SESSION['cart'][$_r['product_id']] = $_r['quantity'];
		}
	}
	/*----------------------------------------------*/
	
	$module = "shop";
	$action = $_r['action'];
	$default_action = "cart";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>