<?php
  require_once 'modules_class.php';

 class ProductContent extends Modules {
	protected  $section_info;
	protected $title ='Велозапчасти';
	protected $meta_desc ='Продажа велозапчастей';
	protected $meta_key ='велозапчасти,запчасти к веллосипеду';
	protected $dir_Velo5='';
	//protected $view='';
	
		
		/*public function __construct() {
		
		
		 parent::__construct('Velo5/css/style.css');
	
	}
	*/
		
	
	protected function getContent(){
		
		//echo 'ssss'.$this->url->getid()[1].'ssss';
		
		$this->product_info=$this->product->get($this->url->getid()[1]);
		
		if(!$this->product_info) return $this->notFound();
		//print_r ($this->product_info);
		//exit;
	//	echo $this->section_info['title'];
		
		$this->title='запчасти к велосипеду '.$this->product_info['title'];
		$this->meta_desc='список запчастей из раздела '.$this->product_info['title'];
		$this->meta_key=mb_strtolower('список запчастей из раздела '.$this->product_info['title']);
		
	
		$this->product_info['link_cart']=$this->url->addCart($this->product_info['id']);
		
		$this->template->set('product',$this->product_info);
		
		//$this->template->set('section',$this->section->getAllData());
		
				
		//echo $this->data['section'][0]['title'];
		//$this->template->set('metca',$this->section->getAllData_metca());
		  /*$this->view = $this->url->getid();
          echo '<br/>';
		 // print_r ($this->view );
          echo '|   '.$this->view[1] .'  |'.'<br/>';*/
		
		
		
		return 'product';
	}
	

}


?>