<?php
class Template {
	private $dir_tmpl;
	private $data=array();
	
	public function __construct ($dir_tmpl) {
		
		$this->dir_tmpl = $dir_tmpl;
	
	}
	
	public function set ($name,$value) {
		//print_r ($this->data);
	
		$this->data[$name]=$value;
	}
	
	public function __get ($name) {
		
		if (isset($this->data[$name])) return $this->data[$name];
		return '';
	}
	
	public function display ($template) {
		
	//	print_r ($this->data);
	
		//echo $this->data[0][1]['id'];
		//$r=	array('первый' => 5,'второй' =>5,'третий' => 5);
		

	//$arrey= $this->data['section'];
	
//---------------------------------------------------------------------------------------------------------------------------	
	/*$r=false;
	$arrey= $this->data;
	$arrey_key = (array_keys($arrey));
	
	 for ($i=0;$i<count($arrey_key);$i++){
		 
		 if (is_array($arrey[$arrey_key[$i]])){
			echo '----------------------------------------';
	        echo '<p style="color:white"> Масив | '.$arrey_key[$i].' |<p/>';
	        echo '----------------------------------------';
			
			 
			 for ($j=0;$j<count($arrey[$arrey_key[$i]]);$j++){
	
	         foreach ($arrey[$arrey_key[$i]][$j] as $key => $value ){
		     $r.=$key.'=>'.$value.'<br/>'; 
					}
					
			echo '----------------------------------------';
	        echo '<p style="color:white">'.$r.'<p/>';
	        echo '----------------------------------------';	
            $r=false;			
					} 
	
		            }
					
	  else {
		    echo '----------------------------------------';
	        echo '<p style="color:white"> Метка   '.$arrey_key[$i].'| => '.$arrey[$arrey_key[$i]].'<p/>';
	       // echo '<br/>';
	        echo '----------------------------------------';	}				
					
		 
		 
	 }*/
	 
	 //--------------------------------------------------------------------------------------------------------------------
	 
	 /*echo '<br/>';
	 
	echo $this->data['product'][2]['img'];
	 
	 echo '<br/>';*/
	
	
	
	
	
	
	/*print_r (array_keys($arrey));
	echo '<br/>';
	print_r (array_keys($r));
	
	echo '----------------------------------------';
	echo '<p style="color:white">'.$r.'<p/>';
	echo '<br/>';
	echo '----------------------------------------';
	echo '<br/>';
	echo $this->data['content'];*/
		
		
		
		
		
		
	  //  print_r ($this->data['section']);
	  //  print_r ($this->produkt);
	  

	   // echo $this->data['section'][0]['title'];
		$template = $this->dir_tmpl.$template.'.tpl';
		//echo '</br>'.$this->dir_tmpl.'</br>';
		//echo '</br>'.$template.'</br>';
		ob_start();
		include ($template);
		echo ob_get_clean();
		
	}
}





?>