<?php
  require_once 'modules_class.php';

 class SectionContent extends Modules {
	protected $section_info;
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
		
		
		
		$this->section_info=$this->section->get($this->url->getid()[1]);
		
		if(!$this->section_info) return $this->notFound();
		//print_r ($this->section_info);
	//	echo $this->section_info['title'];
		
		$this->title='запчасти к велосипеду '.$this->section_info['title'];
		$this->meta_desc='список запчастей из раздела '.$this->section_info['title'];
		$this->meta_key=mb_strtolower('список запчастей из раздела '.$this->section_info['title']);
		
		
		$this->product=$this->product->getAlldata($this->url->getid()[1]); 
	
	/*//--------------Вывод массива ---------------------------------------
		foreach ($this->product as $key => $value){
	
			if (is_array ($value)) {
			foreach ($value as $key => $value1){
				echo $key.' => '.$value1.'<br/>';
			}	
			}
			echo $key.'<br/>';
		}
		
	//--------------------------------------------------------------------	*/
		
		//print_r ($this->product);
		if (!$this->product[0]) return $this->notFound();
		
	
	
		$this->template->set('product',$this->product);
		//$this->template->set('section',$this->section->getAllData());
		
				
		//echo $this->data['section'][0]['title'];
		//$this->template->set('metca',$this->section->getAllData_metca());
		  /*$this->view = $this->url->getid();
          echo '<br/>';
		 // print_r ($this->view );
          echo '|   '.$this->view[1] .'  |'.'<br/>';*/
		
		
		
		return 'section';
	}
	

}


?>