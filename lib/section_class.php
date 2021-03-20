<?php
require_once 'global_class.php';

class Section extends GlobalClass {
	
	public function __construct() {
		
		parent::__construct ('section');
		
		
	}
	
	
	/*public function getAllData_metca() {

		return $this->transform($this->getAll_metca('metca'));
		//print_r ($this->transform($this->getAll_metca('metca')));
		
	}*/
	
	
	
	public function getAllData() {

		return $this->transform($this->getAll('id'));
		//print_r ($this->getAll('id'));
		}
	
	protected function transformElement($section) {
		//print_r ($section);
		//echo $section['id'];
		$section ['link'] = $this->url->section($section['id']);
		
		//print_r ($section);
		
	    return $section;	
	}
	
	
	
	
	
}


?>