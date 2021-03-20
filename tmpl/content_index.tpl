 <table class="produkts">
 
 <?php
 
  for ($i=0;$i<count($this->section);$i++) {

  if ($i%4==0){ ?>
  <tr>
  <?php }?>
 
<!--     <tr>  строка---------------------------------------------------------------------------------->
  	 
			 
              <td>
           
              <div class="produkt">
               <p class="img"> 
                   <a href="<?=$this->section [$i]['link']?>" ><img src="<?=$this->section [$i]['img']?>" alt="<?=$this->section [$i]['title']?> "/> </a>
               </p>  
                 
               <p >
                    <a href="<?=$this->section [$i]['link']?>" class="title"> <p> <?=$this->section [$i]['title']?> </p> </a>
               </p>  
               
              </div>
              </td>
     
		  
 <!-- </tr>  строка---------------------------------------------------------------------------------->      
 
  <?php if (($i+1)%4==0){ ?>
  </tr>
  <?php }?>
 
 
<?php } ?> 
             
 </table>