<?php

include_once '../configs/config.ini';
include_once '../include/session_variables.php';

// Set the content-type
header('Content-Type: image/png');

// Create the image
$im = imagecreatetruecolor(250, 30);

// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 249, 29, $white);

$font = 'font/aescrawl.ttf';

if($_SESSION['captcha']){
	$text=$_SESSION['captcha'];
} else {
	$text="Error!";
}

imagettftext($im, 22, 0, 5, 28, $black, $font, $text);

imagepng($im);
imagedestroy($im);

?>