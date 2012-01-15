<?php
	/*----------------------------------------------*/
	/*	BUILD FS (database file system)
	/*----------------------------------------------*/
	class form {
		private $formArray = array();
		public function add($fields) {
			preg_match_all("/\[(.*?) (.*)\]/", $fields, $out, PREG_PATTERN_ORDER);
			while(list($k, $v)=@each($out[2])) {
				preg_match_all("/((\w*?)='(.*?)')/", $v, $out2, PREG_PATTERN_ORDER);
				$tmp = array();
				while(list($k1, $v1)=@each($out2[2])){
					$tmp[$v1] = $out2[3][$k1];
				}
				$set[] = array(	'type'		=>$out[1][$k],
												'field'	=> $tmp
				);
			}
			$this->formArray = array_merge($this->formArray, $set);
		}
		public function build() {
			global $tpl;
			$set = $this->formArray;
			//print_r($set);
			$tpl->assign("form", $set);
			return $tpl->fetch("core_form.tpl");
		}
		
	} 
?>