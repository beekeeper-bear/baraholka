<?php
  require_once 'modules_class.php';
  require_once 'pagemessage_class.php';

 class MessageContent extends Modules {
	 protected $dir_Velo5='';
	
	protected function getContent(){
		
		
		unset($_SESSION['cart']);
		
		$this->template->set('cart_count',0);
		$this->template->set('cart_summa',0);
		$this->template->set('cart_result',0);
		
		$pm= new PageMessage();
		$message_title=$pm->getTitle($_SESSION['page_message']);
		$message_text=$pm->getText($_SESSION['page_message']);
		$this->title = $message_title;
		$this->meta_desc = $message_title;
		$this->meta_key = preg_replace("/\s+/i", ", ", mb_strtolower($message_text));
		
        $this->template->set('message_title',$message_title);
        $this->template->set('message_text',$message_text);
	
		return 'message';
	}
	

}


?>