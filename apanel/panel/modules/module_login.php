<?php
	/*----------------------------------------------*/
	/* LOGIN																		*/
	/*----------------------------------------------*/
	function login_login(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$data = $_r['data'];
		$submit = $_r['submit'];
		
		if($submit['login']){
			if(!$data['username']) $error['username'] = true;
			if(!$data['password']) $error['password'] = true;
			$admin = mysql_q("SELECT a.*
				FROM admin AS a
				WHERE a.username='".add_slash($data['username'])."' AND a.password='".add_slash(MD5($data['password']))."'
			", "single"); echo mysql_error();
			if($admin){
				$_SESSION['admin']=$admin;
				@redirect('dashboard.htm');
			} else {
				$error['login'] = true;
			}
		}
		
		$error['count'] = count($error);
		$tpl->assign("data", $data);
		$tpl->assign("error", $error);
		
		$tpl->display("core_login.tpl");
	}
	/*----------------------------------------------*/
	$module = "login";
	$default_action = "login";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>