<?php
require_once 'email_class.php';

class Mail {
	
	private $config;
	private $email;
	
	public function __construct(){
		
		$this->config = new Config();
		$this->email= new Email();
	
	}
	
	public function send ($to,$data,$template,$from='') {
		
		$data ['sitename'] = $this->config->sitename;
		
		if($from=='') $from = $this->config->admemail;
		$subject = $this->email->getTitle($template);
		$message = $this->email->getText($template);
		$headers = "Frrom:$from\r\nReply-To: $from\r\nContent-type: text/html; charset=utf-8\r\n";
		foreach ($data as $key => $value) {
			$subject = str_replace ("%$key%",$value,$subject);
			$message = str_replace ("%$key%",$value,$message);
		}
		/*echo $subject.'<br/>';
		echo $message.'<br/>';
	    exit;*/
		
		$subject = '=?utf-8?B'.base64_encode($subject).'?=';
		return mail ($to,$subject,$message,$headers);

	}
	
	
	

}

?>