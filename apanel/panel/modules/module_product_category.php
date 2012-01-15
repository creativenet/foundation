<?php
	/*----------------------------------------------*/
	/* product																			*/
	/*----------------------------------------------*/
	function product_category_list(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$product_category_list = mysql_q("SELECT *
			FROM product_category
			ORDER BY id");
		$tpl->assign("product_category_list", $product_category_list);
		
		$main['content'] = $tpl->fetch("admin_product_category_list.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	/* EDIT																			*/
	/*----------------------------------------------*/
	function product_category_edit(){
		global $tpl, $config, $meta, $_r, $_l, $_u, $fs;
		
		$data = $_r['data'];
		$data['id'] = $_r['id'];
		
		if($data['save'] || $data['apply']){
			if(!$data['title']) $error['title'] = true;
			if(count($error)==0){
				$set = array();
				$set[] = "title = '".add_slash($data['title'])."'";
				$set[] = "language_id = '1'";
				$set[] = "category_id = '0'";
				
				$set = implode(', ', $set);
				if($data['id']){
					mysql_q("UPDATE product_category SET $set WHERE id = '".add_slash($data['id'])."'");
				} else {
					$data['id'] = mysql_q("INSERT INTO product_category SET $set");
				}
				
				if($data['save']){
					redirect("product_category.htm", "");
				} else{
					redirect("product_category-edit-".$data['id'].".htm", "");
				}
			}
		} else if($data['cancel']) {
			redirect("product_category.htm", "");
		}

		$fields = "
		[hidden name='id']
		[input name='title' label='Category Title' error='Please Enter Category Title']
		[sac class='']
		";
		
		if(!$data['save'] && $data['id']){
			$data = mysql_q("SELECT * FROM product_category WHERE id='".add_slash($data['id'])."'", "single");
		}

		$tpl->assign("data", $data);
		
		$form = new form();
		$form->add($fields);
		$tpl->assign("form1", $form->build());
		
		$main['content'] = $tpl->fetch("admin_product_category_edit.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	/* DELETE																				*/
	/*----------------------------------------------*/
	function product_category_delete(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		mysql_q("DELETE FROM product_category WHERE id='".add_slash($_r['id'])."'");

		redirect("product_category.htm", "");
	}
	/*----------------------------------------------*/
	$module = "product_category";
	$default_action = "list";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>