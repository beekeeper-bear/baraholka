<?php
    require_once 'start.php';
	
	//echo $_SERVER["REQUEST_URI"];
	
	require_once 'lib/'.'manage_class.php';
	require_once 'lib/'.'url_class.php';
	
	
	
	$manage = new Manage();
	$url = new URL();
	
	//echo $_REQUEST['func'];
	
	$func=$_REQUEST['func'];
	//echo $func;
	
	
	//echo '-------^^^^^^^^^^^^';
	if ($func == 'add_cart') {
		$manage->addCart();
		
	
		//print_r($_SESSION['cart']);
		
	}
	
	elseif ($func == 'delete_cart') {
		$manage->deleteCart();
		
	
		//print_r($_SESSION['cart']);
		
	}
	
	elseif ($func == 'cart') {
		$manage->ubdeteCart();
		
	
		//print_r($_SESSION['cart']);
		
	}
	
	
	elseif ($func == 'order') {
		
		$success = $manage->addOrder();
		
	
		//print_r($_SESSION['cart']);
		
	}
	
	/*elseif ($func == 'search') {
		
		$success = $manage->addOrder();
		
	
		//print_r($_SESSION['cart']);
		
	}*/
	
	else exit;
	
	if ($success) {
		$link = $url->message();
	}
	
	else {$link = $link = ($_SERVER['HTTP_REFERER'] !='')? $_SERVER['HTTP_REFERER']: 'http://localhost/'; }
	
	


	header ("Location: $link");
	exit;







?>