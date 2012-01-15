<?php
	/*----------------------------------------------*/
	/*	build configutarion array from
	/*	configuration table
	/*----------------------------------------------*/
	$config_array = Array();
	$config_array[] = "config/config.php";
	$config_array[] = "config/config_meta.php";
	$config_array[] = "config/db_config.php";
	$config_array[] = "config/config_redirect.php";
	foreach ($config_array as &$config_file) {
		if(is_file($config_file)){
			include_once($config_file);
		}
	}
?>