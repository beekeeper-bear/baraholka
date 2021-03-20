<?php
require_once 'config_class.php';
require_once 'url_class.php';
require_once 'format_class.php';
require_once 'template_class.php';
require_once 'section_class.php';
require_once 'product_class.php';
require_once 'message_class.php';

abstract class Modules { 
	
	protected $config;
	protected $data;
	protected $url;
	protected $format;
	protected $section;
	protected $product;
	protected $message;

	
	public function __construct() {
		
		session_start();
		$this->config = new Config();
	
		$this->url = new URL();
		$this->format = new Format();
		$this->data = $this->format->xss($_REQUEST);
		$this->template = new Template('tmpl/');
		$this->section = new Section();
		$this->product = new Product();
		$this->message = new Message();
		
		
		$this->setInfoCart();
		$this->template->set('content',$this->getContent());
		$this->template->set('section',$this->section->getAllData());
		$this->template->set('action',$this->url->action());
		$this->template->set('Velo5','');
		$this->template->set('title',$this->title);
		$this->template->set('meta_desc',$this->meta_desc);
		$this->template->set('meta_key',$this->meta_key);
		//$this->template->set('meta_key',$this->url->index());
		$this->template->set('link_delivery',$this->url->delivery());
		//$this->template->set('link_contacts',$this->url->contacts());
		//$this->template->set('items',$this->section->getAllData());
		$this->template->set('link_search',$this->url->search());
	
		
	
		
		$this->template->display('main');
		
	}
	
	private function setInfoCart() {
		$summa = 0;
		
		//print_r ($_SESSION);
		//exit;
		//echo $_SESSION['cart'].'-------cart------';
		
		//echo $_SESSION ['quotes'];
		
	//	echo $_SESSION ['message'];
		
		//echo $_SESSION ['query3'];
		
		//foreach ($_SESSION as $key => $value) echo $key.' => '.$value.'</br>';
		//foreach ($_REQUEST as $key => $value) echo $key.' => '.$value.'</br>';
		
		
		//echo $_SESSION['cart'];
		//exit;
		  
		if (isset($_SESSION['cart'])&&(!$_SESSION['cart']=='')) {
			
			
			
		$ids = explode(",",$_SESSION['cart']);
		
		$count_v=array_count_values($ids) ;
		
		$result = $this->product->getPriceOnIDs ($count_v);
		//print_r ($count_v);
		$count_v = count($count_v);
		
		for($i=0;$i<count($result);$i++) {
			
			$summa += $result[$i]['count']*$result[$i]['price'];
			
		}
		
		}
		
		else {$count_v=0;$summa=0;$result=0;unset($_SESSION['cart']);
		
		}//echo '$count_v='.$count_v.'  $summa='.$summa.'  $result='.$result;
		
		
		
		//echo count($count_v); 
		//print_r($count_v); 
		//print_r($result); 
		$this->template->set('cart_count',$count_v);
		$this->template->set('cart_summa',$summa);
		$this->template->set('cart_result',$result);
		
		
		
		//print_r ($ids);
		//print_r ($count_v);
		
		
		
	}
	
	abstract protected function getContent();
	
	
	protected function notFound() {
		
		$this->redirect($this->url->notFound());
	
	}
	
	protected function message() {
		if (!isset($_SESSION['message'])) return '';
		$text = $this->message->get($_SESSION['message']);
		unset($_SESSION['message']);
		return $text;
	}
	
	protected function redirect ($link) {
		
		header ("Location:$link");
		exit;
	}
	
}



?>