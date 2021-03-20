<?php
require_once 'database_class.php';
require_once 'config_class.php';
require_once 'check_class.php';
require_once 'url_class.php';
require_once 'systemmessage_class.php';

abstract class GlobalClass {
	
	protected $db;
	protected $table_name;
	protected $format;
	protected $config;
	protected $check;
	protected $url;
	


public function __construct ($table_name) {
	
	$this->db = DataBase::getDB();
	$this->format = new Format();
	$this->config = new Config();
	$this->check = new Check();
	$this->url = new URL();
	$this->table_name= $this->config->db_prefix.$table_name;
}



  protected function getAll_metca($table_n, $order='id', $up=true, $count=false, $offset=false){
	  
	
	  //echo $table_n;
	   $ol = $this->getOL($order,$up,$count,$offset);
	   $query = 'SELECT * FROM `'.$this->config->db_prefix.$table_n.'` '.$ol;
	 
	// print_r ($this->db->select($query));
       return $this->db->select($query);

  } 
  

  public function get($id){
	 // print_r ($this->getOnFiled("id",$id));
	 //echo $id;
	 
	 if (!$this->check->id($id)) return false;
	  return $this->getOnFiled("id",$id);
	  
  }
  protected function getOnFiled($field,$value){
	  //echo $this->table_name;
	  
	  $query='SELECT * FROM `'.$this->table_name."` WHERE `$field` = ".$this->config->sum_query;
	//  print_r ($this->db->selectRow ($query,array($value)));
	  //$rt = print_r ($this->db->selectRow ($query,array($value)));
	  //echo $rt.'<br/>';
	  return $this->db->selectRow ($query,array($value));
  }
  
  public function add($data){
	  
	  if (!$this->check($data)) return false;
	  
	  $query = "INSERT INTO `".$this->table_name."` (";

	  foreach ($data as $filed=>$value) $query .="`$filed`,";
	 
	  $query = substr($query,0,-1);

	  $query .=') VALUES (';
	  foreach ($data as $value) $query .=$this->config->sum_query.',';
	  $query = substr($query,0,-1);
	  $query .=')';
	  
	  //$_SESSION ['query']=$query;
	  return $this->db->query($query, array_values($data));
  }
  
  private function check($data){
	  $result = $this->checkData($data);
	 // $_SESSION ['result']=$result;
	  
	  if ($result===true){return true ;} 
	  $sm = new SystemMessage();
	  return $sm->message($result,false);
	  
	  return false; 
  }
  
  protected function checkData($data) {
	  return false;
  }
  
  
  
  public function existsID($id) {
	  
	  if (!$this->check->id($id)) return false;
	  return $this->isExitsFV ('id',$id);
	 
  }
  
  
  
  protected function isExitsFV($filed,$value){
	  
	  $result = $this->getAllOnFiled ($filed, $value);
	  return count ($result) !=0; 
	  
	  
  } 

  protected function getAll($order=false, $up=true,$count=false, $offset=false){
	 // echo $this->table_name.'<br / >';
	   $ol = $this->getOL($order,$up,$count,$offset);
	   $query = 'SELECT * FROM `'.$this->table_name.'` '.$ol;
	  // echo $query;
	 // print_r ($this->db->select($query));
       return $this->db->select($query);	   
   }
   
   protected function transform($element){
	   if (isset($element[0])){
		   for ($i=0;$i<count($element);$i++) $element[$i] = $this->transformElement ($element[$i]);
		   return $element;
	   }
	   else return $this->transformElement($element);
	   
   }
   
   
   
   
  /* public function getAll_section($section_id){
	   //echo $section_id[1]; //id section 
	 // print_r ($this->getOnFiled("id",$id));
	  return $this->getAllOnFiled('section_id',$section_id[1]);
	  
  }*/
   
   
   
   
   
   protected function getAllOnFiled ($filed,$value,$order=false,$up=true,$count=false,$offset=false){
	   $ol = $this->getOL($order,$up,$count,$offset);
	   $query = 'SELECT * FROM `'.$this->table_name.'` WHERE `'.$filed.'`= '.$this->config->sum_query.' '.$ol;
	  // echo $query;
	   return $this->db->select($query, array($value));
	   
	   
	   
	   
   }
   
   

   protected function getOL ($order,$up,$count,$offset) {
	   if ($order) {
		   $order ='ORDER BY `'.$order.'`';
		   if (!$up) $order .=' DESC';
		}
		$limit = $this->getL($count,$offset);
		return $order.' '.$limit;
		
		
   }

   protected function getL ($count,$offset) {
	   
	   $limit = '';
	   if ($count) {
		   
		   if (!$this->check->count($count)) return false;
		   if ($offset) {
			   if (!$this->check->offset($offset)) return false;
			   $limit = 'LIMIT '.$offset.$count;
		   }
		   else $limit = 'LIMIT '.$count;
	   }
	   return $limit;
   }
			   
		

           public function search_trans($q,$fields){
			   
			   if (count($fields)==0) return false;
			   $q = trim($q);
			   if ($q === '') return false;
			   $q = preg_replace ("/\s+/",' ',$q);
			   $q=mb_strtolower($q);
			   $array_words = explode(' ',$q);
			   $logic = " AND ";
			   $params = array();
			   $where='';
			   foreach ($array_words as $key =>$value) {
				   
				   if (isset($array_words[$key-1])) $where .=$logic;
				   for ($i = 0; $i<count($fields); $i++) {
					   $where .='`'.$fields[$i].'` LIKE '.$this->config->sum_query;
					   $params[] = "%$value%";
					   if(($i+1) !=count($fields)) $where .=' OR ';
				   }
				
			   }
			   $query = 'SELECT * FROM `'.$this->table_name.'` WHERE '.$where;
			   /*echo $query.'<br/>';
			   print_r ($params);
			   exit;*/
			 // print_r ($this->db->select($query,$params));
			  //exit;
			  
			  	//--------------????? ??????? ---------------------------------------
		/*foreach ($this->db->select($query,$params) as $key => $value){
	
			if (is_array ($value)) {
			foreach ($value as $key => $value1){
				echo $key.' => '.$value1.'<br/>';
			}	
			}
			echo $key.'<br/>';
		}
		exit;
	//--------------------------------------------------------------------	*/
			   return $this->db->select($query,$params);
			   
		   }

		
			   
			   
		   }
		   
		   
		   
	 
	   
	   
   


?>