<div id="templatemo_boxarea">
   <?php for($i=0; $i<sizeof($konf); $i++) : ?>
        <div class="box1">
          <div class="box1top">


          </div>
                
                <div class="body"><div class="readmore_bl"></div><div class="readmore_b"></div><div class="readmore_blc"></div>

<br/>
		Najniższa proponowana cena :<br/> <br/>
			 	<span class="price"> PLN</span> za poniższy zestaw: <br/> <br/>
                   
                        <ul>
						<?php foreach($konf[$i] as $key => $val) :
							if($val!=NULL) :
							echo '<li>'. $model[$key] . ' : '. $val. '</li>';
							endif;
                             endforeach; ?>
                    

 
                        </ul>

                         
               
				</div>
                <div class="boxbottom">
                	
                </div>
        </div>
		 <?php endfor; ?>
            
        </div>
