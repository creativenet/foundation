<?php
	
	// SET LANGUAGE
	if($config['multi_language']){
		if($_REQUEST['language']){
			$_SESSION['language']=mysql_q("SELECT * FROM language WHERE code='".$_REQUEST['language']."'", "single");
		}
		if(!$_SESSION['language']) {
			$_SESSION['language']['code'] = $config['default_language_code'];
			$_SESSION['language']['name'] = $config['default_language_name'];
			$_SESSION['language']['language_id'] = $config['default_language_id'];
		}
	} else {
		$_SESSION['language']['code'] = $config['default_language_code'];
		$_SESSION['language']['name'] = $config['default_language_name'];
		$_SESSION['language']['language_id'] = $config['default_language_id'];
	}
	$_l = $_SESSION['language'];
	
?>