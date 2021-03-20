 <div class="magazin_order">
   
        <div class="right_order">
    
	     <?php include 'message.tpl';?>
	
         <form action="<?=$this->action?>" class="forms">
                          
                            <span id="p"> Оформление заказа</span>
                            
                             <label><span>Имя:</span>
                             <input type="text" name="names"  required autocomplete="on"  value="<?=$this->names?>"></label>
                             
                             <label><span>Фамилия:</span>
                             <input type="text" name="surname"  required autocomplete="on" value="<?=$this->surname?>"></label>
                             
                             <label><span>Отчество:</span>
                             <input type="text" name="patronymic"  required autocomplete="on" value="<?=$this->patronymic?>"></label>
                             
                              <label><span>Ведите ваш телефон:</span>
                             <input type="tel" name="phone" autocomplete="on" pattern = [0-9]{ 10} required placeholder = "0XX-XXXXXXX" value="<?=$this->phone?>"></label>
                             
							 <label ><span>Ведите ваш: e-mail:</span>
							 <input type="email" name="email" autocomplete="on" onfocus="if(this.value == 'Введите ваш e-mail:') this.value=''" onblur="if(this.value == '') this.value='Введите ваш e-mail:'" 
							 value="<?=$this->email?>">
                  
                             </label>
                            
                             <label><span>Доставка:</span>
                           
                             <select name="delivery" onchange = "changeDelivery(this)" >
                 
                                   <option value=0 <?php if($this->delivery == 0) { ?> selected="selected" <?php } ?>>Новая Почта</option>    
                                   <option value=1 <?php if($this->delivery == 1) { ?> selected="selected" <?php } ?>>Укрпочта </option>
                                   <option value=2 <?php if($this->delivery == 2) { ?> selected="selected" <?php } ?>>Самовывоз</option>
                    
                              </select> 
                             
                             </label>
                 
				
				 
                                 <label id="address2" ><span>Введите адресс доставки:</span>
                                 <textarea id="address" name = "address" wrap="hard" autocomplete="on"  cols="80" onfocus="if(this.value == 'Введите адресс доставки:') this.value=''" onblur="if(this.value == '') this.value='Введите адресс доставки:'" value="<?=$this->address?>"></textarea>
                                 
                                 
                             </label>
                                 
					 
								 
                                 <label><span>Примечания к заказу:</span>
                                 <textarea wrap="hard"  name = "notice" cols="80"   onfocus="if(this.value == 'Примечания к заказу:') this.value=''" onblur="if(this.value == '') this.value='Примечания к заказу:'" value="<?=$this->notes?>"></textarea></label>
                           
						         <input type="hidden" name="price" value="<?=$this->cart_summa?>" />
						         <input type="hidden" name="func" value="order" />
                                 <input class="knopf" type="submit" name="knop" value="Оформить заказ" >
                         
                             </form>  
 
        </div>
        </div>    