<!DOCTYPE html>
  <html lang="ru">
    
	<head>
         <meta http-equiv="content-type" content="text/html; charset=utf-8">
         <title><?=$this->title?> </title>
       
          <link rel="stylesheet" href="/css/style.css" type="text/css">
          <link href="image/bicycle32.ico" rel="shortcut icon" type="image/x-icon" >
          <meta name="description" content="<?=$this->meta_desc?>">
          <meta name="keywords" content="<?=$this->meta_key?>"> 
         <script type="text/javascript" src="js/functions.js"> </script>
                     
     </head>
     
     
     
     
<body>  
 <div class="container">
     
   <header>
       <div class="header">
           <div class="blok2"></div>
           <div class="blok1"><p class="tel"> тел. 097-741-63-30 066-70-70-775 </p> </div>
           
           
           <div id="search">
             <form name="search" action="<?=$this->link_search?>" > 
              
               <input type="text" name="q" value="поиск" onfocus="if(this.value == 'поиск') this.value=''" onblur="if(this.value == '') this.value='поиск'"/>
               
              </form>  
           </div>
           
          <div class="cart"> <p class="blue"> Текущий заказ </p>
           <p>В корзине <span><?=$this->cart_count?></span> товара <br/> на сумму <span><?=$this->cart_summa?></span> гр.</p>
           <a href="http://localhost/cart">Перейти в корзину</a>
           </div>
           
           
       </div> 
       
       <div class="header2">
            <div class="emblema"></div>  
         
         <div class="menuH">
            <?php include_once 'content_menu.tpl';?>
                     
     </div>
       
         <div class="clear"></div>
        
     
         
       </div>           
     
   </header>

          <div class="clear"></div>
           
      <div class="sidebarleft">
          <p></p>
      </div>      
    
        <div class="right">
		
		<?php include_once 'content_'.$this->content.'.tpl';?>
		
          </div> 
          
           <div class="sidebarright">
           <p></p>
          
      </div>    
          
          
   <div class="clear"></div>                           
    
    
    
    </div>   
    
     
            
         <footer>
          
           <div class="counter">
             
             <img src="/image/fon/schetchik2.png" alt="счетчик"/>
         </div>
          
         <div class="copy">   <p>Copyright &copy; Site.ua. Все права защищены.</p>                </div>
         
          
       </footer> 
       
       
       
     
   </body>
   
   
    </html>