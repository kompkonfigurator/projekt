#!/usr/bin/perl -w
use LWP::Simple;
use Encode;
use charnames ':full';
use HTML::Tree;
use LWP::Simple;

my $web_source2 = get( 'http://api.nokaut.pl/?format=rest&key=aa34033cb376ddfaeece2fdb5a18fd5f&method=nokaut.Product.getByCategory&category=149' );
 open (MYFILE2, '>KosciPamieci');
binmode MYFILE2, ":utf8";
 print MYFILE2 $web_source2;
close(MYFILE2);
open(Pamieci, '>>Pamieci');
binmode Pamieci, ":utf8";
open (MYFILE2, 'KosciPamieci');
binmode MYFILE2, ":utf8";
while (<MYFILE2>) {
print Pamieci $_;
        if($_=~ m/^\s*<url>/)
{
$_=~ m#<url>(.*?)</url>#s;
my $tekst2=$1;
my $link2 = get($tekst2);
open (FILE2, '>test2');
binmode FILE2, ":utf8";
print FILE2 $link2;
close (FILE2);
my $x2 = qx { grep "FullDescription" test2 };
my $tree2 = HTML::Tree->new();
$tree2->parse(decode_utf8 $x2);
print Pamieci "<opis>";
print Pamieci  $tree2->as_text;
print Pamieci "</opis>\n";
if($x2=~ m/DDR3/ || $x2=~ m/DDR 3/ || $x2=~ m/DDRIII/ || $x2=~ m/DDR III/ || $x2=~ m/PC3/ || $x2=~ m/PC 3/ ){
print Pamieci "<typ_pamieci>DDR3</typ_pamieci>";
}elsif($x2=~ m/DDR2/ || $x2=~ m/DDR 2/ || $x2=~ m/DDRII/ || $x2=~ m/DDR II/ || $x2=~ m/PC2/ || $x2=~ m/PC 2/ )
{print Pamieci "<typ_pamieci>DDR2</typ_pamieci>";
}elsif($x2=~ m/DDR/ || $x2=~ m/PC1/)
{print Pamieci "<typ_pamieci>DDR</typ_pamieci>";
}elsif($x2=~ m/SDRAM/)
{print Pamieci "<typ_pamieci>SDRAM</typ_pamieci>";
}else
{print Pamieci "<typ_pamieci>Brak informacji o sockecie</typ_pamieci>";
}
print Pamieci "\n";
}
 }
 close (MYFILE2);
close(Pamieci);


