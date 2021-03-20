 
 <div class="magazin">
 <table class="produkt">
               <tr>
                <td>
                    
                    <img style="width:200px" src="image/product/<?=$this->product['img']?>" alt="<?=$this->product['title']?> ">
                    
                </td>
                <td>
                  
                   <p></p>
                    <p><?=$this->product['title']?> <span></span></p>
                    <p><?=$this->product['price']?> гр.<span></span></p>
                  
                    <p><span><a class="link_cart1" href="<?=$this->product['link_cart']?>"></a></span></p>
                    <p><a href="#">Условия оплаты и доставки</a><span></span></p>
                 
                     
                </td>
                 
                  </tr>
        
           </table>
	 <p id="opisanie">Описание:<span></span></p>  
            
         
     <p> <?=$this->product['description']?>  </p>
	 
	   </div> 
                      	   