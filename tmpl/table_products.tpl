 <table id="produkts">
 
 <?php
 
  for ($i=0;$i<count($this->product);$i++) {

  if ($i%4==0){ ?>
  <tr>
  <?php }?>
 
<!--     <tr>  строка---------------------------------------------------------------------------------->
  	 
			 
              <td>
           
              <div class="section">
               <p class="img"> 
                   <a href="<?=$this->product [$i]['link']?>" ><img style="width:200px" src="image/section/<?=$this->product [$i]['img']?>" alt="<?=$this->product [$i]['title']?> "/> </a>
               </p>  
                 
               <p >
                    <a href="<?=$this->product [$i]['link']?>" class="title" style="color:white"> <p> <?=$this->product [$i]['title']?> </p> </a>
               </p>  
			      <p style="color:white;padding-left:70px;"><?=$this->product[$i]['price']?> гр.<span></span></p>
                <p><span><a class="link_cart2" href="<?=$this->product[$i]['link_cart']?>"></a></span></p>
              </div>
              </td>
     
		  
 <!-- </tr>  строка---------------------------------------------------------------------------------->      
 
  <?php if (($i+1)%4==0){ ?>
  </tr>
  <?php }?>
 
 
<?php } ?> 
             
 </table>