<?php
	/*----------------------------------------------*/
	/* module																		*/
	/*----------------------------------------------*/
	function module_module(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$data = $_r['data'];
		
		if($data['save']){
			mysql_q("UPDATE admin_module SET active='no'");
			while(list($k,$v)=@each($data['module'])){
				$db_module = mysql_q("SELECT * FROM admin_module WHERE name='".$v."'");
				if($db_module){
					mysql_q("UPDATE admin_module SET active='yes' WHERE name='".$v."'");
				} else {
					mysql_q("INSERT INTO admin_module SET active='yes', name='".$v."'");
				}
			}
		}
		
		$dir = "panel/modules/";
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (($file = readdir($dh)) !== false) {
					if(is_file('panel/modules/'.$file)){
						$t = mysql_q("SELECT active FROM admin_module WHERE name='".$file."'", "single");
						$module_list[]=array("module"=>$file, "active"=>$t['active']);
					}
				}
				closedir($dh);
			}
		}
		
		$error['count'] = count($error);
		$tpl->assign("module_list", $module_list);
		$tpl->assign("data", $data);
		$tpl->assign("error", $error);
		
		$tpl->display("core_module.tpl");
	}
	/*----------------------------------------------*/
	$module = "module";
	$default_action = "module";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>