<?php
	/*----------------------------------------------*/
	/* admin																			*/
	/*----------------------------------------------*/
	function admin_list(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$admin_list = mysql_q("SELECT *
			FROM admin AS a
			ORDER BY a.admin_id");
		$tpl->assign("admin_list", $admin_list);
		
		$main['content'] = $tpl->fetch("admin_admin_list.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	/* EDIT																			*/
	/*----------------------------------------------*/
	function admin_edit(){
		global $tpl, $config, $meta, $_r, $_l, $_u, $fs;
		
		$data = $_r['data'];
		if(!$data['admin_id'])
			$data['admin_id'] = $_r['id'];
		$_f=$_FILES;
		
		if($data['save'] || $data['apply']){
			if(!$data['first_name']) $error['first_name'] = true;
			if(!$data['last_name']) $error['last_name'] = true;
			if(!$data['username']) $error['username'] = true;
			if(count($error)==0){
				// UPLOAD IMAGE
				$avatar = $fs->saveFile($_f['avatar']);
				$fs->makeThumbnails($main_image['name'], array('80x80'));
				
				$set = array();
				$set[] = "first_name = '".add_slash($data['first_name'])."'";
				$set[] = "last_name = '".add_slash($data['last_name'])."'";
				$set[] = "username = '".add_slash($data['username'])."'";
				$set[] = "password = MD5('".add_slash($data['password'])."')";
				$set[] = "level = '".add_slash($data['level'])."'";
				$set[] = "notes = '".add_slash($data['notes'])."'";
				$set = implode(', ', $set);
				if($data['admin_id']){
					mysql_q("UPDATE admin SET $set WHERE admin_id = '".add_slash($data['admin_id'])."'");
				} else {
					$data['admin_id'] = mysql_q("INSERT INTO admin SET $set");
				}
				
				mysql_q("REPLACE INTO resource SET name='".$avatar['name']."', type='avatar', module='admin', foreign_id='".$data['admin_id']."' WHERE type='avatar' AND module='admin' AND foreign_id='".$data['admin_id']."'");
				
				if($data['save']){
					redirect("admin.htm", "");
				} else{
					redirect("admin-edit-".$data['id'].".htm", "");
				}
			}
		} else if($data['cancel']) {
			redirect("admin.htm", "");
		}

		$fields = "
		[hidden name='admin_id']
		[input name='first_name' label='First Name' error='Please Enter First Name']
		[input name='last_name' label='Last Name' error='Please Enter Last Name']
		[input name='username' label='Username' error='Please Enter Username']
		[checkbox name='change_pass' label='Change Password' id='changePassword']
		[password name='password' label='Password' error='Please Enter Password']
		[password name='confirm_password' label='Confirm Password' error='Confirm Enter Password']
		[select name='level' label='Level' option='levelVal']
		[file name='avatar' label='Avatar' class='aUploader']
		[textarea name='notes' label='Notes']
		[sac label='']
		";
		
		if(!$data['save'] && $data['admin_id']){
			$data = mysql_q("SELECT * FROM admin WHERE admin_id='".add_slash($data['admin_id'])."'", "single");
			unset ($data['password']);
		}
		
		$levelVal = array(
			array("value"=>"0", "title"=>"Master Administrator"),
			array("value"=>"1", "title"=>"Administrator"),
		);
		$data['levelVal']=$levelVal;
		
		$tpl->assign("data", $data);
		$tpl->assign("error", $error);
		
		$form = new form();
		$form->add($fields);
		$tpl->assign("form1", $form->build());
		
		$main['content'] = $tpl->fetch("admin_admin_edit.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	/* DELETE																				*/
	/*----------------------------------------------*/
	function admin_delete(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		mysql_q("DELETE FROM admin WHERE id='".add_slash($_r['id'])."'");

		redirect("admin.htm", "");
	}
	/*----------------------------------------------*/
	$module = "admin";
	$default_action = "list";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>