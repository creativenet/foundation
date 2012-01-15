<?php
	/*----------------------------------------------*/
	/* distributor																			*/
	/*----------------------------------------------*/
	function distributor_list(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$distributor_list = mysql_q("SELECT d.*
			FROM distributor AS d
			ORDER BY d.title");
		$tpl->assign("distributor_list", $distributor_list);
		
		$main['content'] = $tpl->fetch("admin_distributor_list.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	/* EDIT																			*/
	/*----------------------------------------------*/
	function distributor_edit(){
		global $tpl, $config, $meta, $_r, $_l, $_u, $fs;
		
		$data = $_r['data'];
		$data['distributor_id'] = $_r['id'];
		$_f=$_FILES;
		
		if($data['save'] || $data['apply']){
			if(!$data['title']) $error['title'] = true;
			if(count($error)==0){
				$set = array();
				$set[] = "title = '".add_slash($data['title'])."'";
				$set[] = "address = '".add_slash($data['address'])."'";
				$set = implode(', ', $set);
				if($data['distributor_id']){
					mysql_q("UPDATE distributor SET $set WHERE distributor_id = '".add_slash($data['distributor_id'])."'");
				} else {
					$data['distributor_id'] = mysql_q("INSERT INTO distributor SET $set");
				}
				
				if($data['save']){
					redirect("distributor.htm", "");
				} else{
					redirect("distributor-edit-".$data['id'].".htm", "");
				}
			}
		} else if($data['cancel']) {
			redirect("distributor.htm", "");
		}

		$fields = "
		[hidden name='distributor_id']
		[input name='title' label='Distributor Title' error='Please Enter distributor Title']
		[textarea name='address' class='mceEditor' label='Address']
		[sac label='']]
		";
		
		if(!$data['save'] && $data['distributor_id']){
			$data = mysql_q("SELECT * FROM distributor WHERE distributor_id='".add_slash($data['distributor_id'])."'", "single");
		}

		$optionVal = mysql_q("SELECT category_id AS value, title AS title FROM distributor_category ORDER BY title");

		$data['optionVal']=$optionVal;
		$tpl->assign("data", $data);
		
		$form = new form();
		$form->add($fields);
		$tpl->assign("form1", $form->build());
		
		$main['content'] = $tpl->fetch("admin_distributor_edit.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	/* DELETE																				*/
	/*----------------------------------------------*/
	function distributor_delete(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		mysql_q("DELETE FROM distributor WHERE distributor_id='".add_slash($_r['id'])."'");

		redirect("distributor.htm", "");
	}
	/*----------------------------------------------*/
	$module = "distributor";
	$default_action = "list";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>