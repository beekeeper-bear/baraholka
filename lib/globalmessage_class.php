<?php
require_once'config_class.php';

class GlobalMessage {
	
	protected $data;

	
	public function __construct($file){
		if ($file=='emails'){$this->data = parse_ini_file('lib/text/'.$file.'.ini');}
		else{
		$config = new Config();
		$this->data = parse_ini_file($config->dir_text.$file.'.ini');
		    }
	}
	
	public function get ($name) {
		
		return $this->data[$name];

	}	

}	
?>