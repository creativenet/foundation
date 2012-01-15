<?php
	
	// AJAX
	$url = $_r['url'];
	$url = str_replace(" ", "-", $url);
	if(substr(basename($url), 0, 4) == "ajax"){
		$url = str_replace("ajax-", "", $url);
		$config['return_ajax'] = true;
	}
	
	// REGEXP
	while(list($pattern,$value)=@each($config['regexp'])){
		if(preg_match("/".$pattern."/", $url, $matches, PREG_OFFSET_CAPTURE)) {
			if($value['action']) {
				$_r['action'] = $value['action'];
			}
			while(list($k,$v)=@each($value['params'])){
				eval ("\$_r['".$v."'] = ".$matches[$k+1][0].";");
			}
			include_once("app/".$value['module']);
			die();
		}
	}
	
	// REDIRECT
	if($config['redirect'][$url] && is_file("app/".$config['redirect'][$url]['module'])){
		if($config['redirect'][$url]['action']) {
			$_r['action'] = $config['redirect'][$url]['action'];
		}
		include_once("app/".$config['redirect'][$url]['module']);
		die();
	} else {
		$t = mysql_q("SELECT * FROM redirect WHERE url='".$url."'", "single");
		if($t){
			include_once("app/modules/module_content.php");
		} else {
			if($url=="404.htm"){
				$main['content'] = file_get_contents('theme/'.$config['theme'].'/core/404.htm');
				display($main);
				die();
			}
			redirect('404.htm', '404');
		}
	}
?>