<?php
  require_once 'modules_class.php';

 class Content extends Modules {
	protected $title ='Велозапчасти';
	protected $meta_desc ='Продажа велозапчастей';
	protected $meta_key ='велозапчасти,запчасти к веллосипеду';
	protected $dir_Velo5='';
	
		
		/*public function __construct() {
		
		
		 parent::__construct('Velo5/css/style.css');
	
	}
	*/
		
	
	protected function getContent(){
		//$this->template->set('table_products_title','???????');
		
		$this->template->set('section',$this->section->getAllData());
		//$this->template->set('metca',$this->section->getAllData_metca());
		
		
		return 'index';
	}
	

}


?>