<?php
if ((!isset($_GET['id']) || empty($_GET['id'])) && (!isset($_GET['idcena']) || !isset($_GET['idshop']))) die();
mysql_connect("localhost", "kohana", "kohana") or die(mysql_error());
mysql_select_db("kohana") or die(mysql_error());
if (isset($_GET['id'])) {
    $q = 'SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = '.$_GET['id'].');';
    $result = mysql_query($q);
	$i = 0;
    ?> <div id="sklepy"> <?
    while ($row = mysql_fetch_array($result)) {
		if($i++ == 0) $price = $row['price'];
        echo '<option value=\''.$row['id_sklep'].'\'>'.$row['shop_name'].'</option>';
        //print_r($row);
    }
    ?> </div><div id="cena"> <?
		echo $price;
    ?> </div> <?
}
elseif (isset($_GET['idcena']) && isset($_GET['idshop'])) {
	echo '<div id="cena">';
	$q = 'SELECT price FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE (ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = \''.$_GET['idcena'].'\')) AND (id_sklep = \''.$_GET['idshop'].'\');';
	$result = mysql_query($q) or die(mysql_error());
	$arr = mysql_fetch_assoc($result);
	echo $arr['price'];

	echo '</div>';
}
mysql_close();

?>