#!/usr/bin/perl -w
use LWP::Simple;
use Encode;
use charnames ':full';
use HTML::Tree;
use LWP::Simple;
use encoding "utf-8";

my $licznik=0;
my $pom=0;
while(1)
{
$licznik=0;
my $web_source = get( 'http://api.nokaut.pl/?format=rest&key=aa34033cb376ddfaeece2fdb5a18fd5f&method=nokaut.Product.getByCategory&category=150&limit=500&offset='.$pom.'&sort_direction=title_asc' );
 open (MYFILE, '>PlytyGlowne');
binmode MYFILE, ":utf8";
 print MYFILE $web_source; 
close(MYFILE);
open(Plyty, '>>Plyty');
binmode Plyty, ":utf8";
open (MYFILE, 'PlytyGlowne');
binmode MYFILE, ":utf8";
while (<MYFILE>) {
$licznik++;
print Plyty $_;
if($_=~ m/^\s*<id>/)
{
	$_=~ m#<id>(.*?)</id>#s;
	my $produkt=$1;
	my $sklepy = get('http://api.nokaut.pl/?format=xml&key=aa34033cb376ddfaeece2fdb5a18fd5f&method=nokaut.Price.getByProductId&product_id='.$produkt.'&sort_direction=price_asc');
	open (SKLEP,'>Sklepy');
	binmode SKLEP, ":utf8";
	print SKLEP $sklepy;
	close(SKLEP);
	 open (SKLEP,'Sklepy');
	 binmode SKLEP, ":utf8";
	 print Plyty "\t<sklepy>\n";
	while(my $line=<SKLEP>)
	{
		if($line=~ m/^\s*<item>/)
		{
			print Plyty "\t<sklep>\n"
		}
			if(!($line=~ m/^\s*<item>/) && !($line=~ m/^\s*<items>/) && !($line =~ m/^\s*<success>/) && !($line=~ m/^\s*<\/item>/) && !($line=~ m/^\s*<\/items>/) && !($line =~ m/^\s*<\/success>/) && !($line=~ m/^\s*<\?xml/))
		{
			print Plyty $line;
		}
		if($line=~m/^\s*<\/item>/)
		{ print Plyty "\t</sklep>\n";
		}
	
}
print Plyty "\t</sklepy>\n";	
close(SKLEP);
}
	elsif($_=~ m/^\s*<url>/)
{
$_=~ m#<url>(.*?)</url>#s;
my $tekst=$1;
my $link = get($tekst);
open (FILE, '>test');
binmode FILE, ":utf8";
print FILE $link;
close (FILE);
my $x = qx { grep "FullDescription" test };
my $tree = HTML::Tree->new();
$tree->parse(decode_utf8 $x);
print Plyty "<opis>";
print Plyty  $tree->as_text;
print Plyty "</opis>\n";
if($x=~ m/2011/){
print Plyty "<socket>Socket LGA 2011</socket>";
}elsif($x=~ m/462/)
{print Plyty "<socket>Socket 462</socket>";
}elsif($x=~ m/478/)
{print Plyty "<socket>Socket 478</socket>";
}elsif($x=~ m/754/)
{print Plyty "<socket>Socket 754</socket>";
}elsif($x=~ m/775/)
{print Plyty "<socket>Socket 775</socket>";
}elsif($x=~ m/939/)
{print Plyty "<socket>Socket 939</socket>";
}elsif($x=~ m/1155/)
{print Plyty "<socket>Socket 1155</socket>";
}elsif($x=~ m/1156/)
{print Plyty "<socket>Socket 1156</socket>";
}elsif($x=~ m/1366/)
{print Plyty "<socket>Socket 1366</socket>";
}elsif($x=~ m/AM2/ || $x=~ m/AM2./ || $x=~ m/AM2,/ || $x=~ m/AM2\)/ || $x=~ m/AM2]/)
{print Plyty "<socket>Socket AM2</socket>";
}elsif($x=~ m/AM2+/)
{print Plyty "<socket>Socket AM2+</socket>";
}elsif($x=~ m/AM3/ || $x=~ m/AM3./ || $x=~ m/AM3,/ || $x=~ m/AM3\)/ || $x=~ m/AM3]/)
{print Plyty "<socket>Socket AM3</socket>";
}elsif($x=~ m/AM3+/)
{print Plyty "<socket>Socket AM3+</socket>";
}elsif($x=~ m/FM1/)
{print Plyty "<socket>Socket FM1</socket>";
}else
{print Plyty "<socket>false</socket>";
}
print Plyty "\n";
if($x=~ m/DDR3/ || $x=~ m/DDR 3/ || $x=~ m/DDRIII/ || $x=~ m/DDR III/ || $x=~ m/PC3/ || $x=~ m/PC 3/ ){
print Plyty "<typ_pamieci>DDR3</typ_pamieci>";
}elsif($x=~ m/DDR2/ || $x=~ m/DDR 2/ || $x=~ m/DDRII/ || $x=~ m/DDR II/ || $x=~ m/PC2/ || $x=~ m/PC 2/ )
{print Plyty "<typ_pamieci>DDR2</typ_pamieci>";
}elsif($x=~ m/DDR/ || $x=~ m/PC1/)
{print Plyty "<typ_pamieci>DDR</typ_pamieci>";
}elsif($x=~ m/SDRAM/)
{print Plyty "<typ_pamieci>SDRAM</typ_pamieci>";
}else
{print Plyty "<typ_pamieci>false</typ_pamieci>";
}
print Plyty "\n";
print Plyty "<co>plyta</co>\n";
}
 }
 print $licznik;
if($licznik<500)
{
last;
}
$pom=$pom+500;
}
 close (MYFILE); 
close(Plyty);


