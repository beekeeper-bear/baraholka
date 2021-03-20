
	 <table id="produkts">
	 
	 <?php if ($this->q=="") { ?>

<h2 class="search_result"> Вы задали пустой поисковый запрос! <h2>

<?php } else { ?>


 <caption align="top"><h2 class="search_result"> Результат поиска: <?=$this->q?></h2> </caption>

 <?php if (!$this->product[0]) { ?>
    <tr><td style="width:500px"><p style="color:white; text-align:center"> Ничего не найдено </p></td></tr>
 <?php } else { ?>
 
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

 <?php } ?>
<?php } ?>
             
 </table>