  
  <div class="magazin">
  <div class="right_cart">
        
        <div id="cart">
            <h3>Корзина</h3>
            
            <table class="cart">
                
             <tr>
                <td colspan="2">Товар</td> 
                <td>Цена за 1 шт.</td>
                <td>Количество.</td>
                <td >Стоимость.</td>
                <td></td>
             </tr>  
             <tr>
               <td colspan="6"><hr/></td>    
             </tr> 
			   
			   
<!--     <tr>  строка---------------------------------------------------------------------------------->			   
			   
			   
			   <?php for ($i=0; $i<count($this->cart_result);$i++) { ?>
			   
		<tr>
              <td class="img">
                      <img src="image/section/<?=$this->cart_result[$i]['img']?>" alt="велозапчасти"> 
              </td>
                     
              <td class="tatl">
                       <?=$this->cart_result[$i]['title']?>
              </td>       
                      <td class="bold"><?=$this->cart_result[$i]['price']?></td>       
               <td>  <input type="text" name="count" value="<?=$this->cart_result[$i]['count']?>"> шт.</td> 
               
                 <td><?=$this->cart_result[$i]['summa']?> </td>  
                <td>
                    
                  <a href="<?=$this->cart_result[$i]['link_delete']?>" class="cart_delete">х.удалить</a>  
                </td> 
               
         </tr>  
			  
			  
			  
             <?php if ($i+1 != count($this->cart_result)) { ?>
			 
         <tr>
               <td colspan="6" class="cart_hr"><hr/></td>    
        </tr> 
		
			
			 <?php }?>
		<?php }?>
		
	 </table>
	 
<!--     <tr>  строка---------------------------------------------------------------------------------->			
			
           <div class="forma_cart">
            <p id="vsego">Всего:<span><?=$this->cart_summa?></span></p>
             
           <!--  <form name="cart" class="vsego" action="<?=$this->action?>" method="post">
			 
			 
             <input type="hidden" name="func" value="cart"/> 
             <input type="submit" name="discount" class="knopf" value="Заказать"/>  
                 
                 
             </form> -->
   
           <a href="<?=$this->link_order?>" <img scr="image/cart_order.png"  class="knopf" >Заказать</a> 
   
   
           </div> 
  
        </div>
       </div>
       </div>
	  