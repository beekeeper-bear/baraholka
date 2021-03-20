 
 <nav class="dws-menu">
                <ul>
                    <li><a href="http://localhost/"><i class="fa fa-">главная</i></a></li>
                    <li><a href="<?=$this->index?>"><i class="fa fa-">каталог</i></a> <ul>
					
					<?php for ($i=0;$i<count($this->section);$i++) { ?>

		               
                            <li><a href="<?=$this->section [$i]['link']?>"><?=$this->section [$i]['title']?></a>
							<ul>
							
							</ul>
							</li>
                            
                     <?php }?>	 
	
					    </ul>
                       </li>
                        
                    <li><a href="<?=$this->link_delivery?>"><i class="fa fa-">Доставка и оплата</i></a></li>
                 
                </ul>
                     
                      </nav>  
 
 
 
 
