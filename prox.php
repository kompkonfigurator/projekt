<?php
if(!isset($_GET['id']) || empty($_GET['id'])) die();
mysql_connect("localhost", "kohana", "kohana") or die(mysql_error());
mysql_select_db("kohana") or die(mysql_error());
$q = 'SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = '.$_GET['id'].');';
//echo $q;
$result = mysql_query($q);
while($row = mysql_fetch_array($result)){
	echo '<option value=\''.$row['id_sklep'].'\'>'.$row['shop_name'].'</option>';
	//print_r($row);
}
mysql_close();
?>