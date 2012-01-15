<?php
	/*----------------------------------------------*/
	/* BUILD PAGE																		*/
	/*----------------------------------------------*/
	function content_page(){
		global $tpl, $config, $meta, $_r, $_l, $_u;

		$content = mysql_q("SELECT c.content, c.content_id
			FROM content AS c 
			LEFT JOIN redirect AS r ON r.foreign_id=c.content_id
			WHERE r.url='".add_slash($_r['url'])."' AND c.language_id='".$_l['language_id']."'", "single");
		
		$content['resource'] = mysql_q("SELECT name FROM resource WHERE module = 'content' AND foreign_id='".$content['content_id']."'", "single");
		
		$tpl->assign("content", $content);
		$main['content'] = $tpl->fetch("user_content.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	$module = "content";
	$action = $_r['action'];
	$default_action = "page";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>