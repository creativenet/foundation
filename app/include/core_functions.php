<?php
	/* ************************* */
	/*	CHECK URL								 */
	/* ************************* */
	function chk_url ($url){
		global $config, $tpl;
		
		$db = mysql_q("SELECT url FROM redirect WHERE url='".add_slash($url)."'");
		$rx = preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
		if(!$db && $rx){
			return true;
		} else {
			return false;
		}
	}
	
	/* ************************* */
	/*	SET URL									 */
	/* ************************* */
	function set_url ($url, $id, $module){
		global $config, $tpl;
		
		$db = mysql_q("SELECT url FROM redirect WHERE url='".add_slash($url)."'");
	}
	
	/* ************************* */
	/*	DEBUG										 */
	/* ************************* */
	function debug ($debig_variable = ""){
		global $config, $tpl;
		$tpl->assign("debig_variable", $debig_variable);
		$request = var_export($_REQUEST, true);
		$tpl->assign("debug_request", $request);
		$session = var_export($_SESSION, true);
		$tpl->assign("debug_session", $session);
		$server = var_export($_SERVER, true);
		$tpl->assign("debug_server", $server);
		
		$tpl->display('core_debug.tpl');
	}

	/* ************************* */
	/*	DISPLAY									 */
	/* ************************* */
	function display ($main, $template = "core_main.tpl"){
		global $config, $tpl;
		$tpl->assign("main", $main);
		if($config['return_ajax']){
			$tpl->display('core_main_ajax.tpl');
		} else {
			$tpl->display($template);
		}
	}
	
	/* ************************* */
	/*	ADD SLASH							 */
	/* ************************* */
	function add_slash ($string){
		global $config;
		
		if($config['add_slash'])
			$string=addslashes($string);
		return $string;
	}
	
	/* ************************* */
	/*	MYSQL QUERY							 */
	/* ************************* */
	function mysql_q ($query, $type="data", $number=true){
		global $debug, $config;
		$out = '';
		// REPLACE FROM, INTO, UPDATE
		$new_query=str_replace(array("FROM ", "INTO ", "UPDATE ", "JOIN "), array("FROM ".$config["db_pref"], "INTO ".$config["db_pref"], "UPDATE ".$config["db_pref"], "JOIN ".$config["db_pref"]), $query);
		// ACTION
		$arr = explode(' ',trim($new_query));
		$action = $arr[0];
		// SELECT
		if($action == "SELECT" || $action == "SHOW"){
			$result = mysql_query($new_query);
			// clear query
			if($type=="query"){
				return $result;
			}
			if($result && @mysql_num_rows($result)){
				$num=1;
				while($l=mysql_fetch_assoc($result)){
					if($number==true && $type!="single")
						$l['num']=$num;
					if($type=="single")
						$out=$l;
					else
						$out[]=$l;
					$num++;
				}
				return $out;
			} else {
				return false;
			}
		} 
		// INSERT UPDATE
		if($action == "INSERT" || $action == "UPDATE" || $action == "REPLACE") {
			// check core exist
			$pattern = '/(INSERT INTO|UPDATE|REPLACE) (.*) SET .*/';
			preg_match($pattern, $new_query, $matches, PREG_OFFSET_CAPTURE);
			$table = $matches[2][0];
			$cc = mysql_query("SHOW COLUMNS FROM `".$table."` LIKE 'core_created'"); echo mysql_error();
			if(!mysql_num_rows($cc))
				mysql_query("ALTER TABLE `".$table."` ADD `core_created` INT NOT NULL ;");
			$cm = mysql_query("SHOW COLUMNS FROM `".$table."` LIKE 'core_modified'");
			if(!mysql_num_rows($cm))
				mysql_query("ALTER TABLE `".$table."` ADD `core_modified` INT NOT NULL ;");
			if($action == "INSERT" || $action == "REPLACE"){
				$set_ext = "`core_created`=UNIX_TIMESTAMP(), `core_modified`=UNIX_TIMESTAMP(), ";
			}
			if($action == "UPDATE"){
				$set_ext = "`core_modified`=UNIX_TIMESTAMP(), ";
			}
			$new_query = str_replace("SET", "SET ".$set_ext, $new_query);
			$result = mysql_query($new_query);
			if(mysql_error()){
				if($config['debug']['mysql_error_echo']){
					echo mysql_error();
				}
			} else {
				if($action == "INSERT")
					return mysql_insert_id();
				else 
					return mysql_affected_rows();
			}
		}
		if($action == "DELETE") {
			$result = mysql_query($new_query);
			return $result;
		}
	}
	/***************************/
	/* BROWSER INFO						 */
	/***************************/	
	function browser_info($agent=null) {
		$known = array('msie', 'firefox', 'safari', 'webkit', 'opera', 'netscape', 'konqueror', 'gecko');
		$agent = strtolower($agent ? $agent : $_SERVER['HTTP_USER_AGENT']);
		$pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9]+(?:\.[0-9]+)?)#';
		if (!preg_match_all($pattern, $agent, $matches)) return array();
		$i = count($matches['browser'])-1;
		return array("browser"=>$matches['browser'][$i],
								"version" => $matches['version'][$i]);
	}
	
	/***************************/
	/* MYSQL THUMBNAILS				*/
	/***************************/
	function make_thumbnails($image, $sizes=array("150x150"), $force="", $transparency=true) {
		if (is_file($image)) {
			$name = basename($image);
			$dir = dirname($image);
			$arr = split("\.",$name);
			$ext = strtolower($arr[count($arr)-1]);

			$itmp = @getimagesize($image);
			
			if (function_exists(imagecreatefromjpeg) && $itmp[2] == 2)
				$img = imagecreatefromjpeg($image);
			else if (function_exists(imagecreatefromgif) && $itmp[2] == 1) {
				$img = imagecreatefromgif($image);
				imagealphablending($img,FALSE);
				imagesavealpha($img,FALSE);
				$trans_color = imagecolortransparent($img);
				$gif = 1;
			} else if (function_exists(imagecreatefrompng) && $itmp[2] == 3){
				$img = imagecreatefrompng($image);
			}else
				return;
			
			if (!is_dir("${dir}/thumbnails")){
				mkdir("${dir}/thumbnails",0777);
				chmod("${dir}/thumbnails",0777);
			}
			for ($i=0;$i<count($sizes);$i++) {
				if (!is_dir("${dir}/thumbnails/$sizes[$i]")){
					mkdir("${dir}/thumbnails/$sizes[$i]",0777);
					chmod("${dir}/thumbnails/$sizes[$i]",0777);
				}
				$thumbnail = "${dir}/thumbnails/${sizes[$i]}/$name";
				
				list($nx,$ny) = split("x",$sizes[$i]);
				$sx = $nx / imagesx($img);
				$sy = $ny / imagesy($img);
				
				if($force=="x") $s = $sx;
				else if($force=="y") $s = $sy;
				else $s = min($sx,$sy);
				
				$nx = (int)($s*imagesx($img));
				$ny = (int)($s*imagesy($img));
				
				if (function_exists("imagecreatetruecolor"))
					$nimg = imagecreatetruecolor($nx,$ny);
				else
					$nimg = imagecreate($nx,$ny);
				
				if($transparency) {
					if ($ext=="gif") {
						$trnprt_indx = imagecolortransparent($img);
						if ($trnprt_indx >= 0) {
							//its transparent
							$trnprt_color = imagecolorsforindex($img, $trnprt_indx);
							$trnprt_indx = imagecolorallocate($nimg, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
							imagefill($nimg, 0, 0, $trnprt_indx);
							imagecolortransparent($nimg, $trnprt_indx);
						}
					} elseif ($ext=="png") {
						// Turn off transparency blending (temporarily)
						imagealphablending($nimg, false);
						// Create a new transparent color for image
						$color = imagecolorallocatealpha($nimg, 255, 255, 255, 127);
						// Completely fill the background of the new image with allocated color.
						imagefill($nimg, 0, 0, $color);
						// Restore transparency blending
						imagesavealpha($nimg, true);
					}
				} else {
					Imagefill($nimg, 0, 0, imagecolorallocate($new_img, 255, 255, 255));
				}
				
				if (function_exists('imagecopyresampled'))
					imagecopyresampled($nimg,$img,0,0,0,0,$nx,$ny,imagesx($img),imagesy($img));
				else
					imagecopyresized($nimg,$img,0,0,0,0,$nx,$ny,imagesx($img),imagesy($img));
				if($ext=="jpeg" || $ext=="jpg"){
					imagejpeg($nimg,$thumbnail,95);
					$return = true;
				} elseif($ext=="png"){
					imagepng($nimg,$thumbnail);
					$return = true;
				} elseif($ext=="gif") {
						imagegif($nimg,$thumbnail,85);
						$return = true;
				}		
				imagedestroy($nimg);
			}
		}
	}
	
	/***************************/
	/* MYSQL THUMBNAILS				*/
	/***************************/
	function redirect($url, $param1) {
		if($param1=="404"){
			header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
		}
		header('Location: '.$url);
	}
	/***************************/
	/* CHECK EMAIL				*/
	/***************************/
	function check_email($email) {
		return eregi("^[a-z0-9\_=\.\-]+\@([a-z0-9\_\-]+\.)+[a-z0-9\_]+$",$email);
	}

	
?>