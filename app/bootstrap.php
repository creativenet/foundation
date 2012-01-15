<?php
	error_reporting(E_ALL ^ E_NOTICE);
	include_once('app/config/config_debug.php');
	include_once('app/config/config.php');
	include_once('app/config/db_config.php');
	include_once('app/config/config_meta.php');
	include_once('app/config/config_redirect.php');
	include_once('app/include/core_session.php');
	include_once('app/include/build_config.php');
	include_once('app/include/build_db_connect.php');
	include_once('app/include/core_functions.php');
	
	include_once('app/include/build_fs.php');
	
	include_once('app/include/smarty/libs/Smarty.class.php');
	
	$tpl = new Smarty();
	$tpl -> setTemplateDir(array("template" => "theme/".$config['theme']."/templates"));
	$tpl -> setCompileDir("theme/".$config['theme']."/templates_c");
	$tpl -> assign("config", $config);
	
	
	$fs = new fs();
	
	include_once('app/include/core_theme.php');
	include_once('app/include/core_language.php');
	
	$_r = $_REQUEST;
	$_s = $_SESSION;
	$_u = $_SESSION['user'];
	
	include_once('app/modules/module_startup.php');
	
	if(isset($_r['url'])){
		include_once("app/include/core_redirect.php");
		die();
	}
	if(isset($_r['module'])){
		if(is_file("modules/module_".$_r['module'].".php")){
			include_once("app/modules/module_".$_r['module'].".php");
			die();
		}
	}
	if(isset($_r['file'])){
		$fs -> getFile($_r['file']);
		die();
	}
	
?>