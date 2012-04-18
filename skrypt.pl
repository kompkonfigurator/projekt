#!/usr/bin/perl -w
use XML::XPath;
use XML::XPath::XMLParser;
use DBI;
use strict;
use warnings;
use Data::Dumper;
use DBD::mysql;
#print "ROFL";
my $username = 'kohana';my $password = 'kohana';my $database = 'kohana';my $hostname = 'localhost';
my $dbh = DBI->connect("dbi:mysql:database=$database; host=$hostname;port=3306", $username, $password);
my $filename = $ARGV[0];
#print "a";
my $SQL="update produkty set found = '0'";
my $SetFound = $dbh->do($SQL);
$SQL="update sklepy set found = '0'";
$SetFound = $dbh->do($SQL);
$SQL="update produkty_sklepy set found = '0'";
$SetFound = $dbh->do($SQL);
#print "b";
my $xp = XML::XPath->new(filename => $filename);
foreach my $item ($xp->find('//item')->get_nodelist) {
    my $id_produkt= $item->find('id')->string_value;
    my $name=$item->find('name')->string_value;
    my $shop_count=$item->find('shop_count')->string_value;
    my $offer_count=$item->find('offer_count')->string_value;
    my  $price_min=$item->find('price_min')->string_value;
    my  $price_max=$item->find('price_max')->string_value;
    my   $price_avg=$item->find('price_avg')->string_value;
    my   $url=$item->find('url')->string_value;
    my  $opis=$item->find('opis')->string_value;
    my  $socket=$item->find('socket')->string_value;
    my $typ_pamieci=$item->find('typ_pamieci')->string_value;
    my  $co=$item->find('co')->string_value;
    my   $image_mini=$item->find('image_mini')->string_value;
    my   $image_medium=$item->find('image_medium')->string_value;
    my   $image_large=$item->find('image_large')->string_value;
    my   $rate=$item->find('rate')->string_value;
    my   $thumbnail=$item->find('thumbnail')->string_value;
    my   $image=$item->find('image')->string_value;
#  my $sklepy=$item->find('/sklepy/sklep')->get_nodelist;
#print $sklepy;
#print $item;
#print Dumper $item;
    $SQL= "select * from produkty where name='$name'";
    my   $Select = $dbh->prepare($SQL);
    $Select->execute() or die("chuj kurwa");
    $SQL= "select * from produkty where name='$name' and found = '0'";
    my   $Select2 = $dbh->prepare($SQL);
    $Select2->execute();
    $SQL= "select * from produkty where name='$name' and id_nokaut='$id_produkt' and found ='0'";
    my   $Select3 = $dbh->prepare($SQL);
    $Select3->execute() or die("chuj kurwa");
#print "$id_produkt \n";
#print "dupa";
    if ($Select3->rows==0)
    {
        $SQL="insert into produkty (
             id_nokaut,
             name,
             shop_count,
             offer_count,
             price_min,
             price_max,
             price_avg,
             url,
             opis,
             socket,
             typ_pamieci,
             co,
             image_mini,
             image_medium,
             image_large,
             rate,
             thumbnail,
             image,
             found)
             values(
             '$id_produkt',
             '$name',
             '$shop_count',
             '$offer_count',
             '$price_min',
             '$price_max',
             '$price_avg',
             '$url',
             '$opis',
             '$socket',
             '$typ_pamieci',
             '$co',
             '$image_mini',
             '$image_medium',
             '$image_large',
             '$rate',
             '$thumbnail',
             '$image',
             '1')";
        my    $InsertRecord = $dbh->do($SQL)  or die("chuj kurwa");
	print "Inserted $InsertRecord rows\n";
    }
    elsif( $Select3->rows!=0 || $Select2->rows!=0) {
        $SQL= "update produkty set  id_nokaut = '$id_produkt', shop_count = '$shop_count', offer_count = '$offer_count', price_min = '$price_min', price_max = '$price_max', price_avg = '$price_avg', url = '$url', opis = '$opis', ".
              " socket = '$socket', typ_pamieci = '$typ_pamieci', co = '$co', image_mini = '$image_mini', image_medium = '$image_medium', image_large = '$image_large', rate = '$rate', thumbnail = '$thumbnail', image = '$image', found = '1' where  name = '$name'";
        my  $UpdateRecord = $dbh->do($SQL) or die("chuj kurwa");
print "Updated $UpdateRecord rows\n";
    }
    $id_produkt=$name=$shop_count=$offer_count=$price_min=$price_max=$price_avg=$url=$opis=$socket=$typ_pamieci=$co=$image_mini=$image_medium=$image_large=$rate=$thumbnail=$image=undef;
}
foreach my $sklep ($xp->find('//sklep')->get_nodelist) {
    my   $id_sklep=$sklep->find('id')->string_value;
    my   $shop_name=$sklep->find('shop_name')->string_value;
    my   $shop_logo=$sklep->find('shop_logo')->string_value;
    my   $shop_id=$sklep->find('shop_id')->string_value;
    my   $shop_url=$sklep->find('shop_url')->string_value;
    my   $price=$sklep->find('price')->string_value;
    my   $product_id=$sklep->find('product_id')->string_value;
    my   $availability=$sklep->find('availability')->string_value;
    my   $price_delivery=$sklep->find('price_delivery')->string_value;
    my   $direct_click_url=$sklep->find('direct_click_url')->string_value;
    my   $image=$sklep->find('image')->string_value;
#print "$id_sklep\n";
    $SQL= "select * from sklepy where shop_name='$shop_name'";
    my        $Select = $dbh->prepare($SQL);
    $Select->execute();
    $SQL= "select * from sklepy where shop_name='$shop_name' and found='0'";
    my        $Select2 = $dbh->prepare($SQL);
    $Select2->execute();
    $SQL= "select * from sklepy where shop_name='$shop_name' and shop_id='$shop_id' and found = '0'";
    my      $Select3 = $dbh->prepare($SQL);
    $Select3->execute();
#print "$id_sklep\n";
    if ($Select->rows==0)
    {
        print "$id_sklep\n";
        $SQL="insert into sklepy (id_nokaut, shop_name, shop_logo, shop_id, shop_url,  found) values ('$id_sklep', '$shop_name', '$shop_logo', '$shop_id', '$shop_url', '1')";
        my   $InsertRecord = $dbh->do($SQL);
    }
    elsif( $Select3->rows!=0 || $Select2->rows!=0) {

        $SQL="update sklepy set id_nokaut = '$id_sklep', shop_logo = '$shop_logo', shop_id = '$shop_id', shop_url = '$shop_url', found = '1' where shop_name = '$shop_name'";
        my     $UpdateRecord = $dbh->do($SQL);
    }
    $SQL= "select * from produkty_sklepy where id_sklep='$shop_id' and id_produkt='$product_id'";
    my   $Select4 = $dbh->prepare($SQL);
    $Select4->execute();
    if ($Select4->rows==0)
    {
        $SQL="insert into produkty_sklepy (id_sklep, id_produkt, price, availability, price_delivery, direct_click_url, image, found) values ('$shop_id', '$product_id', '$price', '$availability', '$price_delivery',".
             " '$direct_click_url', '$image',  '1')";
        print "$product_id \n";
        my   $InsertRecord = $dbh->do($SQL);

    }
    else
    {
        $SQL="update produkty_sklepy set id_sklep = '$shop_id', id_produkt = '$product_id', price = '$price', availability = '$availability', price_delivery = '$price_delivery', direct_click_url = '$direct_click_url', ".
             " image= '$image', found = '1' where id_sklep = '$shop_id' and id_produkt = '$product_id'";
        my  $UpdateRecord = $dbh->do($SQL);
    }
    $id_sklep=$shop_name=$shop_logo=$shop_id=$shop_url=$price=$product_id=$availability=$price_delivery=$direct_click_url=$image=undef;
}
#   $id_produkt=$name=$shop_count=$offer_count=$price_min=$price_max=$price_avg=$url=$opis=$socket=$typ_pamieci=$co=$image_mini=$image_medium=$image_large=$rate=$thumbnail=$image=undef;
#$id_sklep=$shop_name=$shop_logo=$shop_id=$shop_url=$price=$product_id=$availability=$price_delivery=$direct_click_url=$image=undef;
#$dbh->commit();
#}
$SQL= "delete from produkty where found=0";
my $DeleteRecord = $dbh->do($SQL) or die("chuj kurwa");
$SQL= "delete from sklepy where found=0";
$DeleteRecord = $dbh->do($SQL) or die("chuj kurwa");
$SQL= "delete from produkty_sklepy where found=0";
$DeleteRecord = $dbh->do($SQL) or die("chuj kurwa");
$SQL= "select * from produkty";

#my $Select = $dbh->prepare($SQL);
#$Select->execute();
#
#while(my $Row =$Select->fetchrow_hashref)
#{
#  print "$Row->{id_nokaut}<br/>$Row->{name}";
#}
$dbh->disconnect;

