<?php
  require_once 'modules_class.php';

 class OrderContent extends Modules {
	protected $title ='оформление заказа';
	protected $meta_desc ='оформление заказа на покупку велозапчастей';
	protected $meta_key ='оформление заказа, оформление заказа велозапчасти';
	protected $dir_Velo5='';
	
	
	protected function getContent(){
		
		//$this->template->set('section',$this->section->getAllData());
		
		$this->template->set('message',$this->message());
		//$_SESSION['names']='Misha';
		
		if (isset($_SESSION['names'])) $this->template->set('names',$_SESSION['names']);
		
		if (isset($_SESSION['surname'])) $this->template->set('surname',$_SESSION['surname']);
		if (isset($_SESSION['patronymic'])) $this->template->set('patronymic',$_SESSION['patronymic']);
		if (isset($_SESSION['phone'])) $this->template->set('phone',$_SESSION['phone']);
		if (isset($_SESSION['email'])) $this->template->set('email',$_SESSION['email']);
		if (isset($_SESSION['delivery'])) $this->template->set('delivery',$_SESSION['delivery']);
		if (isset($_SESSION['address'])) $this->template->set('name',$_SESSION['address']);
		if (isset($_SESSION['notice'])) $this->template->set('notice',$_SESSION['notice']);
	
		return 'order';
	}
	

}


?>