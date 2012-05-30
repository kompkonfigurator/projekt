#!/usr/bin/perl -w
use XML::XPath;
use XML::XPath::XMLParser;
use DBI;
$username = '';$password = '';$database = '';$hostname = '';
$dbh = DBI->connect("dbi:mysql:database=$database;" .
	 "host=$hostname;port=3306", $username, $password);
$filename = $ARGV[0];
$SQL="update produkty set found = '0'";
$SetFound = $dbh->do($SQL);
#my $file = 'files/camelids.xml';
my $xp = XML::XPath->new(filename => $filename);
foreach my $item ($xp->find('//item')->get_nodelist){
	 $id_produkt= $item->find('id')->string_value;
	 $name=$item->find('name')->string_value;
	 $shop_count=$item->find('shop_count')->string_value;
	 $offer_count=$item->find('offer_count')->string_value;
	 $price_min=$item->find('price_min')->string_value;
	 $price_max=$item->find('price_max')->string_value;
	 $price_avg=$item->find('price_avg')->string_value;
	 $url=$item->find('url')->string_value;
	 $opis=$item->find('opis')->string_value;
	 $socket=$item->find('socket')->string_value;
	 $typ_pamieci=$item->find('typ_pamieci')->string_value;
	 $co=$item->find('co')->string_value;
	 $image_mini=$item->find('image_mini')->string_value;
	 $image_medium=$item->find('image_medium')->string_value;
         $image_large=$item->find('image_large')->string_value;
	 $rate=$item->find('rate')->string_value;
         $thumbnail=$item->find('thumbnail')->string_value;
	 $image=$item->find('image')->string_value;	 
	 $SQL= "select count(*) from produkty where name='$name'";
	 $Select = $dbh->prepare($SQL);
	 $Select->execute();
	  $SQL= "select count(*) from produkty where id_nokaut='$id_produkt'";
	   $Select2 = $dbh->prepare($SQL);
	    $Select2->execute();
	     $SQL= "select count(*) from produkty where name='$name' and id_nokaut='$id_produkt'";
	      $Select3 = $dbh->prepare($SQL);
	       $Select3->execute();

	 if($Select3->rows==0)
	 {
		 $SQL="insert into produkty (id_nokaut, name, shop_count, offer_count, price_min, price_max, price_avg, url, opis, socket, typ_pamieci, co,  image_mini, image_medium, image_large, rate, thumbnail, image, found)".
		 "values('$id_produkt', '$name', '$shop_count', '$offer_count', '$price_min', '$price_max', '$price_avg', '$url', '$opis', '$socket', '$typ_pamieci', '$co', '$image_mini', '$image_medium', '$image_large', '$rate',".
		 "'$thumbnail', '$image', '1')";
	 $InsertRecord = $dbh->do($SQL);
 }
 elsif( $Select3->rows==1 || $Select->rows==1){
 $SQL= "update produkty set  id_nokaut = '$id_produkt', shop_count = '$shop_count', offer_count = '$offer_count', price_min = '$price_min', price_max = '$price_max', price_avg = '$price_avg', url = '$url', opis = '$opis', ".
" socket = '$socket', typ_pamieci = '$typ_pamieci', image_mini = '$image_mini', image_medium = '$image_medium', image_large = '$image_large', rate = '$rate', thumbnail = '$thumbnail', image = '$image', found = '1' where  name = '$name'";
 $UpdateRecord = $dbh->do($SQL);
 }
foreach my $sklep ($xp->find('////sklep')->get_nodelist){
	$id_sklep=$sklep->find('id')->string_value;
	$shop_name=$sklep->find('shop_name')->string_value;
	$shop_logo=$sklep->find('shop_logo')->string_value;
	$shop_id=$sklep->find('shop_id')->string_value;
	$shop_url=$sklep->find('shop_url')->string_value;
	$price=$sklep->find('price')->string_value;
	$product_id=$sklep->find('product_id')->string_value;
	$availability=$sklep->find('availability')->string_value;
	$price_delivery=$sklep->find('price_delivery')->string_value;
	$direct_click_url=$sklep->find('direct_click_url')->string_value;
	$image=$sklep->find('image')->string_value;
         $SQL= "select count(*) from sklepy where shop_name='$shop_name'";
	  $Select = $dbh->prepare($SQL);
	  $Select->execute();
	  $SQL= "select count(*) from sklepy where id_nokaut='$id_sklep'";
	  $Select2 = $dbh->prepare($SQL);
	  $Select2->execute();
	  $SQL= "select count(*) from sklepy where shop_name='$shop_name' and id_nokaut='$id_sklep'";
	  $Select3 = $dbh->prepare($SQL);
 	 $Select3->execute();

		 if($Select3->rows==0)
		 {
	$SQL="insert into sklepy (id_nokaut, shop_name, shop_logo, shop_id, shop_url,  found) values ('$id_sklep', '$shop_name', '$shop_logo', '$shop_id', '$shop_url', '1')";
	$InsertRecord = $dbh->do($SQL);
	 }
	  elsif( $Select3->rows==1 || $Select->rows==1){

$SQL="update sklepy set id_nokaut = '$id_sklep', shop_logo = '$shop_logo', shop_id = '$shop_id', shop_url = '$shop_url', found = '1' where shop_name = '$shop_name'";
$UpdateRecord = $dbh->do($SQL);
	  }}
$id_produkt=$name=$shop_count=$offer_count=$price_min=$price_max=$price_avg=$url=$opis=$socket=$typ_pamieci=$co=$image_mini=$image_medium=$image_large=$rate=$thumbnail=$image=undef;
}
$SQL= "delete from produkty where found=0";
$DeleteRecord = $dbh->do($SQL);
