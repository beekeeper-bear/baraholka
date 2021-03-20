<?php
require_once 'content_class.php';

class SearchContent extends Modules {
	
	protected $dir_Velo5='';
	
	protected function getContent(){
		$q = $this->data['q'];
		$this->meta_desc = 'Поииск:'.$q;
		$this->title = 'Поииск: '.$q;
		$this->meta_key = preg_replace("/\s+/i", ", ", mb_strtolower($q));
		
		
		$this->template->set('q',$q);
		$this->template->set('table_products_title','Поиск');
		
		
				  	//--------------????? ??????? ---------------------------------------
		/*foreach ($this->product->search($q) as $key => $value){
	
			if (is_array ($value)) {
			foreach ($value as $key => $value1){
				echo $key.' => '.$value1.'<br/>';
			}	
			}
			echo $key.'<br/>';
		}
		exit;
	//--------------------------------------------------------------------	*/
		
		
		$this->template->set('product', $this->product->search($q));
		
	
		return 'search';
	}
	
	
	
}


















?>