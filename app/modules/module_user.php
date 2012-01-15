<?php
	/*----------------------------------------------*/
	/* LOGIN																				*/
	/*----------------------------------------------*/
	function user_login(){
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
		
		$main['content'] = $tpl->fetch("user_user_login.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	/* REGISTER																			*/
	/*----------------------------------------------*/
	function user_register(){
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
		
		$main['content'] = $tpl->fetch("user_user_register.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	/* LOGOUT																				*/
	/*----------------------------------------------*/
	function user_logout(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		unset($_SESSION['user']);
		unset($_u);
		
		redirect('login.htm');
	}
	/*----------------------------------------------*/
	/* WELCOME																			*/
	/*----------------------------------------------*/
	function user_welcome(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		if(!$_u['user_id']) redirect('login.htm');
		
		$main['content'] = $tpl->fetch("user_user_welcome.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	$module = "user";
	$action = $_r['action'];
	$default_action = "login";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>