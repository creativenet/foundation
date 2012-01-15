<?php
	/*----------------------------------------------*/
	/*	BUILD FS (database file system)
	/*----------------------------------------------*/
	class fs {
		function fileInfo($file) {
			$info = mysql_q("SELECT * FROM fs WHERE name='".add_slash($file)."'", "single");
			return $info;
		}
		function saveFile($file) {
			if($file && $file['error'] == 0) {
				$old_name = mysql_q("SELECT * FROM fs WHERE name='".add_slash($file['name'])."'", "single");
				if(!$old_name){
					$file_name = $file['name'];
				} else {
					$rand = rand(100, 999);
					$ext = end(explode('.', $filename));
					$file_name = str_replace(".".$ext, "_".$rand.".".$ext, $file['name']);
				}
				list($width, $height, $type, $attr) = getimagesize($file['tmp_name']);
				$set[] = "name = '".add_slash($file_name)."'";
				$set[] = "type = '".add_slash($file['type'])."'";
				$set[] = "width = '".$width."'";
				$set[] = "height = '".$height."'";
				$set[] = "source = 'source'";
				$ext = explode('.', add_slash($file['name']));
				$set[] = "extension = '".add_slash(end($ext))."'";
				$set[] = "file = '".add_slash(@file_get_contents($file['tmp_name']))."'";
				$set[] = "size = '".add_slash(intval($file['size']))."'";
				$set[] = "created = NOW()";
				$set[] = "modified = NOW()";
				$set = implode(', ', $set);
				mysql_q("INSERT INTO fs SET $set");
				$file_id = mysql_insert_id();
				return array("name"=>add_slash($file_name), "id"=>$file_id);
			} else {
				return false;
			}
		}
		function getFile($file_name) {
			if(isset($file_name)) {
				$file = mysql_q("SELECT file, name, size, type, extension FROM fs WHERE name='".$file_name."'", "single");
				// Determine Content Type
				switch ($file['extension']) {
					case "pdf": $ctype="application/pdf"; break;
					case "exe": $ctype="application/octet-stream"; break;
					case "zip": $ctype="application/zip"; break;
					case "doc": $ctype="application/msword"; break;
					case "xls": $ctype="application/vnd.ms-excel"; break;
					case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
					case "gif": $ctype="image/gif"; break;
					case "png": $ctype="image/png"; break;
					case "jpeg":
					case "jpg": $ctype="image/jpg"; break;
					default: $ctype="application/force-download";
				} 
				header("Pragma: public"); // required
				header("Expires: 0");
				header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
				header("Cache-Control: private",false); // required for certain browsers
				header("Content-Type: $ctype");
				//header("Content-Disposition: attachment; filename=\"".$file['name']."\";" );
				header("Content-Transfer-Encoding: binary");
				header("Content-Length: ".$file['size']); 
				echo $file['file'];
				die();
			}
		}
		function makeThumbnails($image, $sizes=array("150x150"), $force="", $transparency=true) {
			if(isset($image)) {
				$file = mysql_q("SELECT file, name, size, type, extension FROM fs WHERE name='".$image."'", "single");
				// Determine Content Type
				$name = $file['name'];
				$ext = $file['extension'];
				$image = $file['file'];
				$itmp = $file['size'];
				
				$img = imagecreatefromstring($image);
				
				for ($i=0;$i<count($sizes);$i++) {
					unset($thumbnail);
					list($nx,$ny) = explode("x",$sizes[$i]);
					list($ox,$oy) = explode("x",$sizes[$i]);
					$sx = $nx / imagesx($img);
					$sy = $ny / imagesy($img);
					
					if($force=="x") $s = $sx;
					else if($force=="y") $s = $sy;
					else $s = min($sx,$sy);
					
					$nx = (int)($s*imagesx($img));
					$ny = (int)($s*imagesy($img));
					unset($nimg);
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
					
					if (function_exists('imagecopyresampled')){
						imagecopyresampled($nimg,$img,0,0,0,0,$nx,$ny,imagesx($img),imagesy($img));
					} else {
						imagecopyresized($nimg,$img,0,0,0,0,$nx,$ny,imagesx($img),imagesy($img));
					}
					
					if($ext=="jpeg" || $ext=="jpg"){
						ob_start();
						imagejpeg($nimg);
						$thumbnail = ob_get_contents();
						ob_end_clean();
					} elseif($ext=="png"){
						ob_start();
						imagepng($nimg);
						$thumbnail = ob_get_contents();
						ob_end_clean();
					} elseif($ext=="gif") {
						ob_start();
						imagegif($nimg);
						$thumbnail = ob_get_contents();
						ob_end_clean();
					}
					imagedestroy($nimg);
					unset($nimg);
					if($name){
						$ext = explode('.', add_slash($name));
						$set = array();	
						$set[] = "name = '".$ox."x".$oy."_".add_slash($name)."'";
						$set[] = "type = '".add_slash(end($ext))."'";
						$set[] = "source = 'thumbnails'";
						$set[] = "width = '".$nx."'";
						$set[] = "height = '".$ny."'";
						$set[] = "extension = '".add_slash(end($ext))."'";
						$set[] = "file = '".add_slash($thumbnail)."'";
						$set[] = "size = '".strlen($thumbnail)."'";
						$set[] = "created = NOW()";
						$set[] = "modified = NOW()";
						$set = implode(', ', $set);
						mysql_q("INSERT INTO fs SET $set");
					}
				}
			}
		}

		function dummy(){
			
		}
	} 
?>