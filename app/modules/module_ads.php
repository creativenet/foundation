<?php
	/*----------------------------------------------*/
	/* BUILD PAGE																		*/
	/*----------------------------------------------*/
	function ad_list(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$ad_list_category = mysql_q("SELECT a.*
			FROM ad_category AS ac 
			ORDER BY title
		");
		$tpl->assign("ad_list_category", $ad_list_category);
		
		$order = "ORDER BY a.start DESC";
		
		// PAGINGATOR
		$result=mysql_q("SELECT COUNT(*) AS total
										FROM ad AS a
										LEFT JOIN ad_category AS c ON a.category_id=c.category_id
										$where
			", "single");
		if($result){
			$per_page=10;
			$t['total']=$result['total'];
			$page=array();
			$page['total']=ceil($t['total']/$per_page);
			$page['current']=$_r['data']['page'];
			if(!$page['current'])$page['current']=1;
			$show_page_from=$page['current']-7;
			if($page['current']<7)
				$to_fix=7-$page['current'];
			else
				$to_fix=0;
			$show_page_to=$page['current']+7+$to_fix;
			if($show_page_to > $page['total']) $show_page_to = $page['total'];
			if(($show_page_to-$show_page_from)<12){
				$show_page_from=$show_page_to-12;
			}
			if($show_page_from <= 0) $show_page_from = 1;
			for($i=$show_page_from; $i<=$show_page_to; $i++){
				$page['page'][]=$i;
			}
			$limit_from = ($page['current']-1)*$per_page;
			$limit="LIMIT $limit_from, $per_page";
		}
		$tpl->assign("page", $page);
		
		$ad_list = mysql_q("SELECT a.*, DATE_FORMAT(a.start, '".$config['date_format']."') AS fcreated, c.title AS category_name
			FROM ad AS a 
			LEFT JOIN ad_category AS c ON a.category_id=c.category_id
			$where
			$order
			$limit
		");
		$tpl->assign("ad_list", $ad_list);
		
		$tpl->assign("data", $data);
		$main['content'] = $tpl->fetch("user_ads_list.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	$module = "ad";
	$action = $_r['action'];
	$default_action = "list";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>