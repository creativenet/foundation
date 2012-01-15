<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {trim} function plugin
 *
 * Type:     function<br>
 * Name:     SEO URL<br>
 * Date:     August 5, 2011<br>
 * Purpose:  create valid links<br>
 * Input:
 *         - text = link text
 *
 * Examples:<br>
 *				{seo_url url='lorem ipsum'}
 * @link 
 * 				(Smarty online manual)
 * @author Vladan Jocic <vladan.jocic at gmail dot com>
 * @version  0.1
 * @param array
 *				url string
 * @param string
 * @return string
 */
function smarty_function_seo_url($params, &$smarty)
{
	$url=$params['url'];
	$url=rawurldecode($url);
	//$url=htmlspecialchars($url, ENT_QUOTES);
	
	$s=array(":", "?", "\/", "\"", "'", " ");
	$r=array("", "", "", "", "", "-");
	$out=str_replace($s, $r,$url);
	$out=str_replace("----", "-", $out);
	$out=str_replace("---", "-", $out);
	$out=str_replace("--", "-", $out);
	$out=preg_replace("/\-$/","",$out);

	return $out;

}

/* vim: set expandtab: */

?>
