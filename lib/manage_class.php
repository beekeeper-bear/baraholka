<?php
require_once 'config_class.php';
require_once 'format_class.php';
require_once 'product_class.php';
require_once 'order_class.php';
require_once 'systemmessage_class.php';
require_once 'mail_class.php';

  class Manage {
	  
	  private $config;
	  private $format;
	  private $product;
	  private $order;
	
	  
	  public function __construct(){
		  
		  session_start ();
		  $this->config = new Config();
		  $this->format = new Format();
		  $this->product = new Product();
		  $this->sm = new SystemMessage();
		  $this->mail = new Mail();
		  $this->order = new Order();
		  $this->data = $this->format->xss($_REQUEST); 
	      $this->saveData();
	  }
	 
	  
	  private function saveData(){
		 
	
		 
		  foreach ($this->data as $key => $value) {
			  $_SESSION[$key] = $value;
			
		  }
	  }
	  
	  public function addCart() {
		  //print_r ($_REQUEST);
		 
		
		  //$this->data=$_REQUEST;
		 // print_r ($this->data);
		 
		  $id = $this->data['id'];
		  //echo '---'.$id.'/-----';
		  
		  if (!$this->product->existsID($id)) return false;
		  
		 // echo $_SESSION['cart'];
		  
		  if (isset($_SESSION['cart'])) {
		  $_SESSION['cart'] .=",$id";
		  }
		 else $_SESSION['cart']=$id;
	  }
	  
	  public function deleteCart() {
		
		 /* $id = $this->data['id'];
          $ids=explode(',',$_SESSION['cart']);  
          unset ($_SESSION['cart']);
		  $q=false;
		  
          for ($i=0;$i<count($ids);$i++){
			
		  if (($ids[$i]==$id)&&($q==false))
		  
		      {unset($ids[$i]); $q=true;}
		     

			 else {$this->addCart($ids[$i]);}
		
		}

	    }*/



		 $id = $this->data['id'];
		   
		   $ids=explode(',',$_SESSION['cart']);  
		   
		   unset ($_SESSION['cart']);
		 //  echo 'Udalil';
		   
		  for ($i=0;$i<count($ids);$i++){
			
		  if ($ids[$i]==$id){unset($ids[$i]); break;}
		
		}
		
		  $_SESSION['cart'] = implode (',',$ids);
	
	  }
	  
	  
	  public function ubdeteCart() {
		  
		//  print_r ($this->data);
	
	  }
	  
	  public function addOrder(){
		  
		  
		  
		//  echo 'hello';
		  
		    $temp_data=array();
			$temp_data['delivery']=$this->data['delivery'];
			$temp_data['products_ids']=$_SESSION ['cart'];
			$temp_data['price']=$this->data['price'];
		    $temp_data['names']=$this->data['names'];
		    $temp_data['surname']=$this->data['surname'];
		    $temp_data['patronymic']=$this->data['patronymic'];
		    $temp_data['phone']=$this->data['phone'];
		    $temp_data['email']=$this->data['email'];
		    $temp_data['address']=$this->data['address'];
		    $temp_data['notice']=$this->data['notice'];
		    $temp_data['date_order']=$this->format->ts();
		    $temp_data['date_send']=0;
		    $temp_data['date_pay']=0;
			
		   
			
			if ($this->order->add($temp_data)) {
				
				$send_data=array();
				$send_data['products'] = $this->getProducts();
				$send_data['name'] = $this->data['surname'].' '.$temp_data['names'].' '.$this->data['patronymic'];
				$send_data['phone'] = $temp_data['phone'];
				$send_data['email'] = $temp_data['email'];
				$send_data['address'] = $temp_data['address'];
				$send_data['notice'] = $temp_data['notice'];
				$send_data['price'] = $temp_data['price'];
				$to=$temp_data['email'];
				$this->mail->send($to,$send_data,'ORDER');
				
				
				
				
				
				return $this->sm->pageMessage('ADD_ORDER');
			}
	        return false;
	  }
	  
	  private function getProducts(){
		 
       // print_r ($_SESSION['cart']);
       // echo '<br/>';		
		  
		$ids = explode(',',$_SESSION['cart']);
		
		$ids=array_count_values($ids) ;
		
		// print_r ($ids);
       // echo '<br/>';	
		//exit;
		
		
		$products=$this->product->getAllOnIDS($ids); 
		$result=array();
		for ($i=0; $i< count($products); $i++) {
		$result[$products[$i]['id']] = $products[$i]['title'].' x '.$ids[$products[$i]['id']];
		}
		
		
		$str=false;
		foreach ($result as $value) {
			
			$str .=$value .' , ' ;
		}
		$str = substr ($str,0,-2);
		return $str;
		
		
		
		
		
		
		
		
		
		//$product = array();
		//print_r ($products);
		//echo '<br/>';
		//print_r ($result);
		//echo $str;
		//exit;
		
		
		
		
		
		  
	  }
	  
	  
	  
	  
	  
	  
	  



}



?>