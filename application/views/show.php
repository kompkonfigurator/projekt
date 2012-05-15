<div id="templatemo_features">
			<h1>Gotowy zestaw : </h1>
			<br/>
			
<h4>Wszystkie części : </h4>
			<?php error_reporting(E_ALL ^ E_NOTICE);   foreach($konf as $key => $val) :  if($val!=NULL && $key!='id') : ?>
            <div class="subrow_odd">
                <div class="name_column"><?php echo $model[$key] . ':'; ?> </div>
                <div class="plan_column"><?php echo $val; ?></div>
     
			</div>
            <?php endif; endforeach; ?>
		</div>





