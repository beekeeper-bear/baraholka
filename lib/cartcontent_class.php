<?php
  require_once 'modules_class.php';

 class CartContent extends Modules {
	protected $title ='Корзина';
	protected $meta_desc ='Содержимое корзины';
	protected $meta_key ='корзина, содержимое корзины';
	protected $dir_Velo5='';
	
	
	protected function getContent(){
		
		//$this->template->set('section',$this->section->getAllData());
		$this->template->set('action',$this->url->action());
		$this->template->set('link_order',$this->url->link_order());
		
		
		
		if (!isset($_SESSION['cart'])) {
		return 'cartn';
		
		}
	
		return 'cart';
	}
	

}


?>