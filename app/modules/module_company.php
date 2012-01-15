<?php
	/*----------------------------------------------*/
	/* CATEGORY LIST																*/
	/*----------------------------------------------*/
	function company_category_list(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$company_list_category = mysql_q("SELECT *
			FROM company_category AS c 
			WHERE parent=0
			ORDER BY title
		");
		while(list($k, $v)=@each($company_list_category)){
			$t = mysql_q("SELECT cc.*, COUNT(c.company_id) AS companyCount
			FROM company_category AS cc 
			LEFT JOIN company AS c ON c.category_id = cc.category_id
			WHERE parent=".$v['category_id']."
			GROUP BY cc.category_id
			ORDER BY cc.title
			");
			
			$company_list_category[$k]['sub'] = $t;
		}
		$tpl->assign("company_list_category", $company_list_category);
		
		$tpl->assign("company_list", $company_list);

		$main['content'] = $tpl->fetch("user_company_category_list.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	/* LIST																					*/
	/*----------------------------------------------*/
	function company_list(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$category_id = $_r['category_id'];
		
		$company_list = mysql_q("SELECT c.*, cc.title AS category_name
			FROM company AS c 
			LEFT JOIN company_category AS cc ON c.category_id = cc.category_id
			WHERE c.category_id='".add_slash($category_id)."'
			ORDER BY c.title
		");
		$tpl->assign("company_list", $company_list);
		
		$main['content'] = $tpl->fetch("user_company_list.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	/* DETAIL																				*/
	/*----------------------------------------------*/
	function company_detail(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$company_id = $_r['company_id'];
		
		$company = mysql_q("SELECT c.*, cc.title AS category_name
			FROM company AS c 
			LEFT JOIN company_category AS cc ON c.category_id = cc.category_id
			WHERE c.company_id='".add_slash($company_id)."'
		", "single");
		$tpl->assign("company", $company);
		
		$main['content'] = $tpl->fetch("user_company_detail.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	/* AUTOCOMPLETE 																*/
	/*----------------------------------------------*/
	function company_autocomplete(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		$s = $_r['data'];
		$company = mysql_q("SELECT c.title AS name, c.company_id AS id FROM company AS c WHERE title like '".add_slash($s)."%'");
		$tmp = array("company"=>$company);
		echo json_encode($tmp);
		die();
	}
	/*----------------------------------------------*/
	$module = "company";
	$action = $_r['action'];
	$default_action = "category_list";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>