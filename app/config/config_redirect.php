<?php
	/*----------------------------------------------*/
	/* INDEX																				*/
	/*----------------------------------------------*/
	$config['redirect']['index.htm']								= array("module"=>"modules/module_index.php");
	$config['redirect']['']													= array("module"=>"modules/module_index.php");
	
	$config['redirect']['news.htm']									= array("module"=>"modules/module_news.php");
	$config['redirect']['contact.htm']							= array("module"=>"modules/module_contact.php");
	$config['redirect']['gallery.htm']							= array("module"=>"modules/module_gallery.php");
	
	/*----------------------------------------------*/
	/* AJAX																					*/
	/*----------------------------------------------*/
	$config['redirect']['ajax.htm']										= array("module"=>"modules/module_ajax.php");
	$config['redirect']['autocomplete-company.htm']		= array("module"=>"modules/module_company.php", "action"=>"autocomplete");
	
	/*----------------------------------------------*/
	/* BACKUP																			*/
	/*----------------------------------------------*/
	$config['redirect']['backup-db.htm']							= array("module"=>"modules/module_backup.php");
	$config['redirect']['restore-db.htm']							= array("module"=>"modules/module_backup.php", "action"=>"restore");
	$config['redirect']['download-db.htm']						= array("module"=>"modules/module_backup.php", "action"=>"download");
	
	/* USER																					*/
	/*----------------------------------------------*/
	$config['redirect']['login.htm']									= array("module"=>"modules/module_user.php", "action"=>"login");
	$config['redirect']['logout.htm']									= array("module"=>"modules/module_user.php", "action"=>"logout");
	$config['redirect']['welcome.htm']								= array("module"=>"modules/module_user.php", "action"=>"welcome");
	$config['redirect']['register.htm']								= array("module"=>"modules/module_user.php", "action"=>"register");
	
	/*----------------------------------------------*/
	/* AD																						*/
	/*----------------------------------------------*/
	$config['redirect']['oglasi.htm']									= array("module"=>"modules/module_ad.php");
	$config['redirect']['ad.htm']											= array("module"=>"modules/module_ad.php");
	
	/* PRODUCTS																			*/
	/*----------------------------------------------*/
	$config['redirect']['products.htm']								= array("module"=>"modules/module_product.php");
	
	/* SHOP																					*/
	/*----------------------------------------------*/
	$config['redirect']['cart.htm']										= array("module"=>"modules/module_shop.php", "action"=>"cart");
	$config['redirect']['add-to-cart.htm']						= array("module"=>"modules/module_shop.php", "action"=>"add_2_cart");
	$config['redirect']['update-cart.htm']						= array("module"=>"modules/module_shop.php", "action"=>"update_cart");
	
	/*----------------------------------------------*/
	/* TEST																					*/
	/*----------------------------------------------*/
	$config['redirect']['test.htm']									= array("module"=>"modules/module_test.php");

// DEVILS TECH
	/* PRODUCTS																			*/
	/*----------------------------------------------*/
	$config['redirect']['devil-products.htm']				= array("module"=>"modules/module_devil_product.php");
	
	/* PRODUCTS																			*/
	/*----------------------------------------------*/
	$config['redirect']['distributors.htm']				= array("module"=>"modules/module_devil_distributors.php");

?>