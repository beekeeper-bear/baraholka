<?php
  require_once 'modules_class.php';

 class NotFoundContent extends Modules {
	protected $title ='Страница не найдена - 404';
	protected $meta_desc ='Запрошенная страница не существует';
	protected $meta_key ='страница не найдена, страница не существует, 404';
	protected $dir_Velo5 ='';
	
	/*public function __construct() {
		
		 parent::__construct('css/style.css');
	
	}*/
	
		
	
	
	protected function getContent(){
		
		header ('HTTP/1.0 404 Not Found');
		
		$this->template->set('section',$this->section->getAllData());
		//$this->template->set('metca',$this->section->getAllData_metca());
		
		return 'notfound';
	}
	

}


?>