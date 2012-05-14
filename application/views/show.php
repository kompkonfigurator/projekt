<div id="templatemo_features">
			<h1>Gotowy zestaw : </h1>
			<br/>
			
<h4>Wszystkie części : </h4>
			<?php foreach($konf as $key => $val) : ?>
            <div class="subrow_odd">
                <div class="name_column"><?php echo $model[$key] . ':'; ?> </div>
                <div class="plan_column"><?php echo $val; ?></div>
     
			</div>
            <?php endforeach; ?>
		</div>





