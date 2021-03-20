<?php

require_once 'global_class.php';

class Order extends GlobalClass {
	
	public function __construct() {
		parent::__construct('orders');
	}
	
	protected function checkData($data) {
		if (!$this->check->oneOrZero($data['delivery'])) return 'ERROR_DELIVERY';
		if (!$this->check->ids($data['products_ids'])) return 'UNKNOWN_ERROR1';
		if (!$this->check->amount($data['price'])) return 'UNKNOWN_ERROR2';
		if (!$this->check->names($data['names'])) return 'ERROR_NAME';
		if (!$this->check->names($data['surname'])) return 'ERROR_SURNAME';
		if (!$this->check->names($data['patronymic'])) return 'ERROR_PATRONYMIC';
		if (!$this->check->title($data['phone'])) return 'ERROR_PHONE';
		if (!$this->check->email($data['email'])) return 'ERROR_EMAIL';
		if ($data['delivery'] == 2) $empty = true; 
		else $empty = false;
		if (!$this->check->text($data['address'],$empty)) return 'ERROR_ADDRESS';
		if (!$this->check->text($data['notice'],true)) return 'ERROR_NOTICE';
		if (!$this->check->ts($data['date_order'])) return 'UNKNOWN_ERROR3';
		if (!$this->check->ts($data['date_send'])) return 'UNKNOWN_ERROR4';
		//if (!$this->check->ts($data['date_pay'])) return 'UNKNOWN_ERROR';
		
		//$_SESSION ['result']='trueee';
		
		return true;
		
		
		
	}
}

