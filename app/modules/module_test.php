<?php
	
	//print_r($fs->fileInfo('helloFile.txt'));
	
	mysql_q("UPDATE language SET code='sr'");
	
	$_f=$_FILES;
	$fs->saveFile($_f['upload_file']);
	display($main);
	//$_SESSION['test']='test13';
	debug($_s);
	
?>