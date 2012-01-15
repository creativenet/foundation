<?php
	/*----------------------------------------------*/
	/* BACKUP																				*/
	/*----------------------------------------------*/
	function backup_save(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result)){
			$tables[] = $row[0];
		}
		foreach($tables as $table){
			$result = mysql_query('SELECT * FROM '.$table);
			$num_fields = mysql_num_fields($result);
			
			$return.= 'DROP TABLE '.$table.';';
			$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
			$return.= "\n\n".$row2[1].";\n\n";
			for ($i = 0; $i < $num_fields; $i++) {
				while($row = mysql_fetch_row($result)) {
					$return.= 'INSERT INTO '.$table.' VALUES(';
					for($j=0; $j<$num_fields; $j++) {
						$row[$j] = addslashes($row[$j]);
						$row[$j] = str_replace("\n","\\n",$row[$j]);
						if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
						if ($j<($num_fields-1)) { $return.= ','; }
					}
					$return.= ");\n";
				}
			}
			$return.= "\n";
		}
		$datetime = date("YmdHis");
		$file = 'backup/'.$datetime.'.db';
		file_put_contents($file, $return);
		// make zip file
		$zip = new ZipArchive;
		$res = $zip->open('backup/'.$datetime.'.zip', ZipArchive::CREATE);
		if ($res === TRUE) {
			$zip->addFromString($datetime.'.db', $return);
			$zip->close();
		}
	}
	/*----------------------------------------------*/
	/* BACKUP DOWNLOAD															*/
	/*----------------------------------------------*/
	function backup_download(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		$dir = "backup/";
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				$files = array();
				while (($file = readdir($dh)) !== false) {
					if(strpos($file, ".zip"))
						$files[] = $file;
				}
				closedir($dh);
				sort($files);
				end($files);
				$key = key($files);
				$backup_file = "backup/".$files[$key];
				header("Cache-Control: public");
				header("Content-Description: File Transfer");
				header("Content-Disposition: attachment; filename=".$files[$key]);
				header("Content-Type: application/zip");
				header("Content-Transfer-Encoding: binary");
				readfile($backup_file);
			}
		}

	}
	/*----------------------------------------------*/
	/* RESTORE BACKUP																*/
	/*----------------------------------------------*/
	function backup_restore(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		$dir = "backup/";
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				$files = array();
				while (($file = readdir($dh)) !== false) {
					if(strpos($file, ".db"))
						$files[] = $file;
				}
				closedir($dh);
				sort($files);
				end($files);
				$key = key($files);
				$sql = file_get_contents("backup/".$files[$key]);
				$queries = explode(";\n", $sql);
				while(list(,$v)=@each($queries)){
					if($v){
						mysql_query($v);
					}
				}
			}
		}
	}
	/*----------------------------------------------*/
	set_time_limit(600); 
	$module = "backup";
	$action = $_r['action'];
	$default_action = "save";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>