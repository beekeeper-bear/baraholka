<?php

   require_once 'start.php';
   
   require_once $dir_lib.'url_class.php';
   
   $url = new URL();
   $view = $url->getView();
  // echo '<br/>';
  // echo '5'.$view.'5'.'<br/>';
   $class = $view.'Content';
   

   
   
   //echo $class;
 //  echo $dir_lib;

  // echo $dir_lib.$class.'_class.php';
  // echo '<br/>'.file_exists($dir_lib.$class.'_class.php');

      // require_once 'lib/Content_class.php';
	 //   echo $dir_lib.$class.'_class.php';
	 
	 //  new Content();




if (file_exists($dir_lib.$class.'_class.php')){
	   
	   
	  // echo $dir_lib.$class.'_class.php';
	  
	  
	   require_once $dir_lib.$class.'_class.php';
	   
	 //  echo '<br/>';
	   //echo $class;
	   new $class();
	   
   }

    else {
		
		
		   //echo '&&&&&&&&&&&&&&&&&&&&&&&';
		require_once $dir_lib.'notfoundcontent_class.php';
		
		new NotFoundContent();
		//echo 'zdesy';
		
	}

?>