<?php
	/*----------------------------------------------*/
	/* CONTENT																			*/
	/*----------------------------------------------*/
	function content_list(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$content_list = mysql_q("SELECT c.*
			FROM content AS c
			ORDER BY c.title");
		$tpl->assign("content_list", $content_list);
		
		$main['content'] = $tpl->fetch("admin_content_list.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	/* EDIT																			*/
	/*----------------------------------------------*/
	function content_edit(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$data = $_r['data'];
		$data['content_id'] = $_r['id'];
		$_f=$_FILES;
		
		if(($data['save'] || $data['apply']) && !is_error($data)){
			save_data();
		}
		
		$fields1 = "
		[hidden name='content_id']
		[input type='text' name='title' class='completeUrl' label='Page Title' error='Title id required']
		[input type='text' name='url' class='url' label='Page URL' error='URL is required']
		[textarea name='content' class='mceEditor' label='Page Content']
		";
		
		$fields2 = "
		[file name='bg_image' label='Background Image' class='aUploader']
		";
		
		$fields3 = "
		[sac label='']
		";
		
		if(!$data['save'] && $data['content_id']){
			$data = mysql_q("SELECT r.url, c.*
				FROM content AS c
				LEFT JOIN redirect AS r ON r.foreign_id = c.content_id AND module = 'content'
				WHERE c.content_id='".add_slash($data['content_id'])."'
			", "single");
		}
		
		$form = new form();
		$form->add($fields1);
		$form->add($fields2); // BACKGROUND IMAGE
		$form->add($fields3);
		
		$tpl->assign("data", $data);
		$tpl->assign("form1", $form->build());
		
		
		$main['content'] = $tpl->fetch("admin_content_edit.tpl");
		display($main);
	}
	function is_error(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$data = $_r['data'];
		
		if(!$data['title']) $error['title'] = true;
		if(!$data['url']) $error['url'] = true;
		if(count($error)>0){
			$tpl->assign("error", $error);
			return true;
		} else {
			return false;
		}
	}
	function save_data(){
		global $tpl, $config, $meta, $_r, $_l, $_u, $fs;
		
		$data = $_r['data'];
		$_f=$_FILES;
		
		$bg_image = $fs->saveFile($_f['bg_image']);
		// table content
		$set = array();
		$set[] = "title = '".add_slash($data['title'])."'";
		$set[] = "language_id = '1'";
		$set[] = "content = '".add_slash($data['content'])."'";
		$set[] = "modified = NOW()";
		$set = implode(', ', $set);
		if($data['content_id']){
			mysql_q("UPDATE content SET $set WHERE content_id = '".add_slash($data['content_id'])."'");
		} else {
			$data['content_id'] = mysql_q("INSERT INTO content SET $set, CREATED = NOW()");
		}
		// table redirect
		$set = array();
		$set[] = "url = '".add_slash($data['url'])."'";
		$set[] = "module = 'content'";
		$set[] = "foreign_id = '".$data['content_id']."'";
		$set = implode(', ', $set);
		$is_exist = mysql_q("SELECT redirect_id FROM redirect WHERE foreign_id = '".add_slash($data['content_id'])."' AND module = 'content'", "single");
		if($is_exist){
			mysql_q("UPDATE redirect SET $set WHERE foreign_id = '".add_slash($data['content_id'])."' AND module = 'content'");
		} else {
			$redirect_id = mysql_q("INSERT INTO redirect SET $set");
		}
		// table resource
		if($bg_image){
			mysql_q("DELETE FROM resource WHERE foreign_id='".$data['content_id']."' AND module='content' AND type='bgimage'");
			mysql_q("INSERT INTO resource SET name='".$bg_image['name']."', foreign_id='".$data['content_id']."', module='content', type='bgimage'");
		}
		if($data['save']){
			redirect("content.htm", "");
		} else{
			redirect("content-edit-".$data['content_id'].".htm", "");
		}
	}
	function content_save(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		save_data();
		$error = chk_error();
		
	}
	/*----------------------------------------------*/
	/* DELETE																				*/
	/*----------------------------------------------*/
	function content_delete(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		mysql_q("DELETE FROM content WHERE content_id='".add_slash($_r['id'])."'");
		mysql_q("DELETE FROM redirect WHERE foreign_id='".add_slash($_r['id'])."' AND module = 'content'");
		redirect("content.htm", "");
	}
	/*----------------------------------------------*/
	$module = "content";
	$default_action = "list";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>