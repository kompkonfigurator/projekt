<head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
</head>

<div id="templatemo_boxarea">
   <?php for($i=0; $i<sizeof($konf); $i++) : ?>
        <div class="box1">
          <div class="box1top">


          </div>
                
                <div class="body"><div class="readmore_bl"><?php echo HTML::anchor('/form/update/'. $konf[$i]['id'], 'Edytuj'); ?></div><div class="readmore_b">  <?php echo HTML::anchor('/form/delete/'. $konf[$i]['id'], 'Usuń'); ?></div><div class="readmore_blc">	<?php echo HTML::anchor('/form/show/'. $konf[$i]['id'], 'Pokaż'); ?></div>

<br/>
		<?php echo __('Lowest prices proposed')?> :<br/> <br/>
			 	<span class="price"> PLN</span> <?php echo __('for the following set')?>: <br/> <br/>
                   
                        <ul>
						<?php foreach($konf[$i] as $key => $val) :
							if($val!=NULL && $key!='id') :
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
