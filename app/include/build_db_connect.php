<?php
	$link = mysql_connect($config["db_host"],$config["db_user"],$config["db_password"]);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db = mysql_select_db($config["db_name"]);
	if (!$db) {
		die ('Can\'t use: ' . mysql_error());
	}
	mysql_query("SET character_set_client = 'utf8'");
	mysql_query("SET character_set_connection = 'utf8'");
	mysql_query("SET character_set_results = 'utf8'");
	mysql_query("SET character_set_server = 'utf8'");
	mysql_query("SET GLOBAL max_allowed_packet=16*1024*1024");
?>