<?php
require_once 'global_class.php';

class Product extends GlobalClass {
	
	public function __construct() {
		
		parent::__construct ('products');
	
	}
	
	public function getAllData($section_id) {
		
		 return $this->transform($this->getAllOnFiled('section_id',$section_id));
		 
		}
		
	public function getAllonIds ($ids){
		$query_ids = '';
		$params = array();
		foreach ($ids as $key => $value){
			$query_ids .=$this->config->sum_query.',';
			$params[] = $key;
		}
		
		$query_ids = substr ($query_ids,0,-1);
		$query = "SELECT * FROM `".$this->table_name."` WHERE `id` IN ($query_ids)";
		//echo $query;
		return $this->transform ($this->db->select ($query,$params));
		
	}	
	
	public function getPriceOnIDs($ids){
		
		
		$product = $this->getAllOnIDs($ids);
		//print_r ($product);
		$result = array();
		$j=0;
	
		foreach ($ids as $key => $value){
	
			for ($i=0;$i<count($product);$i++){
			if ($key==$product[$i]['id']){  
			$result [$j]['id']=    $key;
			$result [$j]['count']= $value;
			$result [$j]['price']= $product [$i]['price'];
			$result [$j]['img']=   $product [$i]['img'];
			$result [$j]['title']= $product [$i]['title'];
			$result [$j]['summa']= $product [$i]['price']*$value;
			$result [$j]['link_delete']= $this->url->delete_cart($key);
			
			$j++; 
	
		}	
		}
		}
		//print_r ($ids);
		//print_r ($result); 
		
		
		return $result;
		
		
	}
		
	
	
	protected function transformElement ($product){
		//print_r ($product);
		//exit;
		//echo $product['id'];
		$product ['link'] = $this->url->product($product['id']);
		$product ['link_cart'] = $this->url->addCart($product['id']);
		
		//print_r ($product);
		
		return $product;
	
	}
	
	public function search($q) {
		
		//print_r (parent::search_trans($q,array('title','description')));
		//exit;
		
		
		return $this->transform(parent::search_trans($q,array('title','description')));
	}
	
	
	
	
}


?>