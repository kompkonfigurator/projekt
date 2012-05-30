#!/usr/bin/perl -w
 open (MYFILE2, ">$ARGV[1]");
 binmode MYFILE2, ":utf8";
while (<MYFILE2>)
{
	        if (/\<item\>/) {
		push @elo, $_;
            while (<MYFILE2>) {

	      push @elo, $_;

	      last if /\<\/item\>/;
		      } 
%produkt = ();
%sklepy = ();

   while(@elo)
{
	if($_=~ m/^\s*<name>/)
	{
		$_=~m#<name>(.*?)</name>#s;
		$produkt["name"]=$1;
	}
	elsif(($_=~ m/^\s*<product_id>/)
	       {
	    $_=~m#<product_id>(.*?)</product_id>#s;
	 $produkt["id_nokaut"]=$1;
		}
	 elsif($_=~ m/^\s*<shop_count>/)
 {
 $_=~m#<shop_count>(.*?)</shop_count>#s;
 $produkt["shop_count"]=$1;
 }
 elsif($_=~ m/^\s*<offer_count>/)
  {
	   $_=~m#<offer_count>(.*?)</offer_count>#s;
	    $produkt["offer_count"]=$1;
	     }
 elsif($_=~ m/^\s*<price_min>/)
  {
	   $_=~m#<price_min>(.*?)</price_min>#s;
	    $produkt["price_min"]=$1;
	     }
 elsif($_=~ m/^\s*<price_max>/)
  {
	   $_=~m#<price_max>(.*?)</price_max>#s;
	    $produkt["price_max"]=$1;
	     }
 elsif($_=~ m/^\s*<price_avg>/)
  {
	   $_=~m#<price_avg>(.*?)</price_avg>#s;
	    $produkt["price_avg"]=$1;
	     }
 elsif($_=~ m/^\s*<url>/)
  {
	   $_=~m#<url>(.*?)</url>#s;
	    $produkt["url"]=$1;
	     }
 elsif($_=~ m/^\s*<opis>/)
  {
	   $_=~m#<opis>(.*?)</opis>#s;
	    $produkt["opis"]=$1;
	     }



