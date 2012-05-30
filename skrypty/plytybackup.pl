#!/usr/bin/perl -w
use LWP::Simple;
use Encode;
use charnames ':full';
use HTML::Tree;
use LWP::Simple;
my $web_source = get( 'http://api.nokaut.pl/?format=rest&key=aa34033cb376ddfaeece2fdb5a18fd5f&method=nokaut.Product.getByCategory&category=150' );
 open (MYFILE, '>PlytyGlowne');
 print MYFILE $web_source; 
close(MYFILE);
open(Plyty, '>>Plyty');
open (MYFILE, 'PlytyGlowne');
while (<MYFILE>) {
print Plyty $_; 
	if($_=~ m/^\s*<url>/)
{
$_=~ m#<url>(.*?)</url>#s;
my $tekst=$1;
my $link = get($tekst);
open (FILE, '>test');
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
}elsif($x=~ m/AM2 /)
{print Plyty "<socket>Socket AM2</socket>";
}elsif($x=~ m/AM2+/)
{print Plyty "<socket>Socket AM2+</socket>";
}elsif($x=~ m/AM3 /)
{print Plyty "<socket>Socket AM3</socket>";
}elsif($x=~ m/AM3+/)
{print Plyty "<socket>Socket AM3+</socket>";
}elsif($x=~ m/FM1/)
{print Plyty "<socket>Socket FM1</socket>";
}else
{print Plyty "<socket>Brak informacji o sockecie</socket>";
}
print Plyty "\n";
}
 }
 close (MYFILE); 
close(Plyty);
my $web_source2 = get( 'http://api.nokaut.pl/?format=rest&key=aa34033cb376ddfaeece2fdb5a18fd5f&method=nokaut.Product.getByCategory&category=150' );
 open (MYFILE2, '>KosciPamieci');
 print MYFILE2 $web_source2;
close(MYFILE2);
open(Pamieci, '>>Pamieci');
open (MYFILE2, 'KosciPamieci');
while (<MYFILE2>) {
print Pamieci $_;
        if($_=~ m/^\s*<url>/)
{
$_=~ m#<url>(.*?)</url>#s;
my $tekst2=$1;
my $link2 = get($tekst2);
open (FILE2, '>test2');
print FILE2 $link2;
close (FILE2);
my $x2 = qx { grep "FullDescription" test2 };
my $tree2 = HTML::Tree->new();
$tree2->parse(decode_utf8 $x2);
print Pamieci "<opis>";
print Pamieci  $tree2->as_text;
print Pamieci "</opis>\n";
if($x2=~ m/DDR3/){
print Pamieci "<typ_pamieci>DDR3</typ_pamieci>";
}elsif($x2=~ m/DDR2/)
{print Pamieci "<typ_pamieci>DDR2</typ_pamieci>";
}elsif($x2=~ m/DDR /)
{print Pamieci "<typ_pamieci>DDR</typ_pamieci>";
}elsif($x2=~ m/SDRAM/)
{print Pamieci "<typ_pamieci>SDRAM</typ_pamieci>";
}else
{print Pamieci "<socket>Brak informacji o sockecie</socket>";
}
print Pamieci "\n";
}
 }
 close (MYFILE2);
close(Pamieci);

