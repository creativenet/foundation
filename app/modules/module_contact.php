<?php
	/*----------------------------------------------*/
	/* BUILD PAGE																		*/
	/*----------------------------------------------*/
	function contact_list(){
		global $tpl, $config, $meta, $_r, $_l, $_u;
		
		$data = $_r['data'];
		
		include_once('app/include/phpmailer/class.phpmailer.php');
		
		if($data){
			$mail = new PHPMailer();  
			$mail->From			= $data['email'];
			$mail->FromName	= $data['first_name']." ".$data['last_name'];  

			$mail->Body			= " ".$data['comment'];
			$mail->Subject	= 'Devils Tech Contact';
			$mail->CharSet = 'utf-8'; 
			$mail->AddAddress("vladan.jocic@gmail.com");

			if(!$mail->Send()){
				echo "There has been a mail error";
			} else {
				unset($data);
				redirect("message-sent-successfully.htm", '');
			}
		}
		
		$main['content'] = $tpl->fetch("user_contact.tpl");
		display($main);
	}
	/*----------------------------------------------*/
	$module = "contact";
	$action = $_r['action'];
	$default_action = "list";
	if (!function_exists($module."_".$action)) $action = $default_action;
	eval($module."_".$action."();");
	
?>