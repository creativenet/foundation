<?php
	error_reporting(E_ALL ^ E_NOTICE);
	include_once('../app/config/config_debug.php');
	include_once('../app/config/config.php');
	include_once('../config/config.php');
	include_once('../config/db_config.php');
	include_once('../app/include/core_session.php');
	include_once('../app/include/build_db_connect.php');
	include_once('../app/include/core_functions.php');
	
	include_once('../app/include/build_fs.php');
	include_once('panel/include/build_form.php');
	
	include_once('../app/include/smarty/libs/Smarty.class.php');
	
	$tpl = new Smarty();
	$tpl -> setTemplateDir(array("template" => "panel/theme/templates"));
	$tpl -> setCompileDir("panel/theme/templates_c");
	$tpl -> assign("config", $config);
	$tpl -> assign("theme", "panel/theme/");
	
	$fs = new fs();
	
	$_r = $_REQUEST;
	$_s = $_SESSION;
	$_a = $_SESSION['admin'];
	$_server = $_SERVER;
	$tpl->assign("server", $_server);
	$url = $_r['url'];
	$url = explode('-', $url);
	
	$module = $url[0]; $_r['module'] = $url[0];
	$action = $url[1]; $_r['action'] = $url[1];
	$id = $url[2]; $_r['id'] = $url[2];
	
	include_once('panel/include/core_navigation.php');
	
	if($module == 'ajax'){
		$module = $url[1]; $_r['module'] = $url[1];
		$action = $url[2]; $_r['action'] = $url[2];
		$id = $url[2]; $_r['id'] = $url[3];
	}
	
	if(!$_a){
		if($module=='login'){
			include_once("panel/modules/module_login.php");
		} elseif($module=='module'){
			include_once("panel/modules/module_module.php");
		} else {
			redirect('login.htm', '');
		}
		die();
	}
	if(isset($module) && is_file("panel/modules/module_".$module.".php")){
		include_once("panel/modules/module_".$module.".php");
		die();
	} else {
		include_once("panel/modules/module_dashboard.php");
		die();
	}
?>