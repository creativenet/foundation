<?php
	/*----------------------------------------------*/
	/* adS																					*/
	/*----------------------------------------------*/
	function ads_list(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$ad_list = mysql_q("SELECT * FROM ad ORDER BY created DESC");
		$tpl->assign("ad_list", $ad_list);
		
		$main['content'] = $tpl->fetch("admin_ads_list.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	/* EDIT																			*/
	/*----------------------------------------------*/
	function ads_edit(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$data = $_r['data'];
		$data['ad_id'] = $_r['id'];
		$_f=$_FILES;
		
		if($data['save'] || $data['apply']){
			if(!$data['content']) $error['content'] = true;
			if(count($error)==0){
				$set = array();
				$set[] = "content = '".add_slash($data['content'])."'";
				$set[] = "start = '".add_slash($data['start'])."'";
				$set[] = "author_extended = '".add_slash($data['author_extended'])."'";
				$set[] = "author_contact = '".add_slash($data['author_contact'])."'";
				
				$set = implode(', ', $set);
				if($data['ad_id']){
					mysql_q("UPDATE ad SET $set WHERE ad_id = '".add_slash($data['ad_id'])."'");
				} else {
					$data['ad_id'] = mysql_q("INSERT INTO ad SET $set");
				}
				
				if($data['save']){
					redirect("ads.htm", "");
				} else{
					redirect("ads-edit-".$data['ad_id'].".htm", "");
				}
			}
		} else if($data['cancel']) {
			redirect("ads.htm", "");
		}

		$fields = "
		[hidden name='ad_id']
		[textarea name='content' label='Content' error='Please Enter Ad Content']
		[input name='start' class='date short' label='Content']
		[textarea name='author_extended' label='Author']
		[textarea name='author_contact' label='Contact']
		[sac label='']]
		";
		
		if(!$data['save'] && $data['ad_id']){
			$data = mysql_q("SELECT *, DATE_FORMAT(start, '%Y-%m-%d') AS start FROM ad WHERE ad_id='".add_slash($data['ad_id'])."'", "single");
		}

		$tpl->assign("data", $data);
		
		$form = new form();
		$form->add($fields);
		$tpl->assign("form1", $form->build());
		
		$main['content'] = $tpl->fetch("admin_ads_edit.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	$module = "ads";
	$default_action = "list";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>