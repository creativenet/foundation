<?php
	/*----------------------------------------------*/
	/* DASHBOARD																		*/
	/*----------------------------------------------*/
	function dashboard_show(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$data = $_r['data'];
		$submit = $_r['submit'];
		
		if($submit['login']){
			$user = mysql_q("SELECT u.*
				FROM user AS u 
				WHERE u.username='".add_slash($data['username'])."' AND u.password='".add_slash(MD5($data['password']))."'
			", "single");
			
			if($user){
				$_SESSION['user']=$user;
				redirect('welcome.htm');
			} else {
				$error['login'] = true;
			}
		}
		
		$tpl->assign("data", $data);
		$tpl->assign("error", $error);
		
		$main['content'] = $tpl->fetch("admin_dashboard.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	$module = "dashboard";
	$default_action = "show";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>