<?php
	/*----------------------------------------------*/
	/* logout																		*/
	/*----------------------------------------------*/
	function logout_logout(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		unset($_SESSION['admin']);
		
		redirect('login.htm', '');
	}
	/*----------------------------------------------*/
	$module = "logout";
	$default_action = "logout";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>