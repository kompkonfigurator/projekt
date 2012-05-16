<?php foreach($konf as $key => $val) : ?>
<li>
<?php echo '<ul>' . $model[$key] . ': '. $val .' </ul>'; endforeach; ?>
</li>