<?php
	session_cache_expire($config['session_expire']);
	session_name($config['session_name']);
	session_start();
	if(!$_SESSION['uniqid']) $_SESSION['uniqid']=uniqid();
?>