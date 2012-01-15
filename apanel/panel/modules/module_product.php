<?php
	/*----------------------------------------------*/
	/* product																			*/
	/*----------------------------------------------*/
	function product_list(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$product_list = mysql_q("SELECT p.*, c.title AS category_title
			FROM product AS p
			LEFT JOIN product_category AS c ON p.category_id = c.category_id
			ORDER BY p.title");
		$tpl->assign("product_list", $product_list);
		
		$main['content'] = $tpl->fetch("admin_product_list.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	/* EDIT																			*/
	/*----------------------------------------------*/
	function product_edit(){
		global $tpl, $config, $meta, $_r, $_l, $_u, $fs;
		
		$data = $_r['data'];
		$data['id'] = $_r['id'];
		$_f=$_FILES;
		
		if($data['save'] || $data['apply']){
			if(!$data['title']) $error['title'] = true;
			if(!$data['price']) $error['price'] = true;
			if(count($error)==0){
				// UPLOAD IMAGE
				$main_image = $fs->saveFile($_f['main_image']);
				$fs->makeThumbnails($main_image['name'], array('170x170'));
				$fs->makeThumbnails($main_image['name'], array('85x85'));
				$bg_image = $fs->saveFile($_f['bg_image']);
				
				if(!$data['homepage']) $data['homepage'] = 'no';

				$set = array();
				$set[] = "title = '".add_slash($data['title'])."'";
				$set[] = "language_id = '1'";
				$set[] = "info = '".add_slash($data['info'])."'";
				$set[] = "fact = '".add_slash($data['fact'])."'";
				$set[] = "direction = '".add_slash($data['direction'])."'";
				$set[] = "price = '".add_slash($data['price'])."'";
				$set[] = "category_id = '".add_slash($data['category_id'])."'";
				if($main_image)
					$set[] = "photo = '".add_slash($main_image['name'])."'";
				if($bg_image)
					$set[] = "bg_photo = '".add_slash($bg_image['name'])."'";
				$set[] = "homepage = '".add_slash($data['homepage'])."'";
				$set[] = "package = '".add_slash($data['package'])."'";
				
				$set = implode(', ', $set);
				if($data['id']){
					mysql_q("UPDATE product SET $set WHERE id = '".add_slash($data['id'])."'");
				} else {
					$data['id'] = mysql_q("INSERT INTO product SET $set");
				}
				
				if($data['save']){
					redirect("product.htm", "");
				} else{
					redirect("product-edit-".$data['id'].".htm", "");
				}
				die();
			}
		} else if($data['cancel']) {
			redirect("product.htm", "");
		}

		$fields = "
		[hidden name='id']
		[input name='title' label='Product Title' error='Please Enter Product Title']
		[textarea name='info' label='Info']
		[textarea name='fact' label='Supplement Facts']
		[textarea name='direction' label='Directions']
		[input name='price' label='Price' class='short int' error='Price is Required Filed']
		[select name='package' label='Package' option='packageVal']
		[select name='category_id' label='Category' option='optionVal']
		[file name='main_image' label='Main Image' class='aUploader']
		[file name='bg_image' label='Background Image' class='aUploader']
		[checkbox name='homepage' value='yes' label='Show on Index Page']
		[sac class='']
		";
		
		if(!$data['save'] && $data['id']){
			$data = mysql_q("SELECT * FROM product WHERE id='".add_slash($data['id'])."'", "single");
		}

		$optionVal = mysql_q("SELECT category_id AS value, title AS title FROM product_category ORDER BY title");
		$data['optionVal']=$optionVal;

		$packageVal = array(
			array("value" => "bottle", "title" => "per bottle"),
			array("value" => "package", "title" => "per package"),
			array("value" => "jar", "title" => "per jar"),
		);
		$data['packageVal']=$packageVal;
//print_r($packageVal);die();
		$tpl->assign("data", $data);
		$tpl->assign("error", $error);
		
		$form = new form();
		$form->add($fields);
		$tpl->assign("form1", $form->build());
		
		$main['content'] = $tpl->fetch("admin_product_edit.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	/* DELETE																				*/
	/*----------------------------------------------*/
	function product_delete(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		mysql_q("DELETE FROM product WHERE id='".add_slash($_r['id'])."'");

		redirect("product.htm", "");
	}
	/*----------------------------------------------*/
	$module = "product";
	$default_action = "list";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>