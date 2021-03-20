<?php
  require_once 'modules_class.php';

 class DeliveryContent extends Modules {
	protected $title ='Оплата и доставка';
	protected $meta_desc ='Оплата и доставка.';
	protected $meta_key ='оплата,доставка,оплата и доставка';
	protected $dir_Velo5='';
	
		
		/*public function __construct() {
		
		
		 parent::__construct('Velo5/css/style.css');
	
	}
	*/
		
	
	protected function getContent(){
		//$this->template->set('table_products_title','???????');
		
		$this->template->set('section',$this->section->getAllData());
		//$this->template->set('metca',$this->section->getAllData_metca());
		
		
		return 'delivery';
	}
	

}


?>