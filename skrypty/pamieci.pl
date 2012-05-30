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
my $web_source2 = get( 'http://api.nokaut.pl/?format=rest&key=aa34033cb376ddfaeece2fdb5a18fd5f&method=nokaut.Product.getByCategory&category=149&limit=500&offset='.$pom.'&sort_direction=title_asc' );
 open (MYFILE, '>KosciPamieci');
binmode MYFILE, ":utf8";
 print MYFILE $web_source2;
close(MYFILE);
$licznik = qx { grep -wc "<item>" KosciPamieci };
open(Pamieci, '>>Pamieci');
binmode Pamieci, ":utf8";
open (FILE, "KosciPamieci");
open (MYFILE2, ">KosciPamieci2");
print MYFILE2 "\<?xml version=\"1.0\" encoding=\"UTF-8\"?\>\n\<success\>\n\<items\>\n";
while (<FILE>) {
            if (/\<item\>/) {
            push @elo, $_;
           while (<FILE>) {

           push @elo, $_;

      last if /\<\/item\>/;
   }       }

  if(!grep /\<shop_count\>[0,1,2,3]\<\/shop_count\>/, @elo){
  print MYFILE2 @elo;
  }
   undef @elo;
#  undef $a;
 }
print MYFILE2 "\<\/items>\n\<\/success\>";
#close(MYFILE2);
close(FILE);
open (MYFILE, 'KosciPamieci2');
binmode MYFILE, ":utf8";
while (<MYFILE>) {
#$licznik++;
#$licznik = qx { grep -wc "<item>" KosciPamieci };
print Pamieci $_;
if($_=~ m/^\s*<id>/)
{
        $_=~ m#<id>(.*?)</id>#s;
        my $produkt=$1;
        my $sklepy = get('http://api.nokaut.pl/?format=xml&key=aa34033cb376ddfaeece2fdb5a18fd5f&method=nokaut.Price.getByProductId&product_id='.$produkt.'&sort_direction=price_asc');
        open (SKLEP,'>SklepyPamieci');
        binmode SKLEP, ":utf8";
        print SKLEP $sklepy;
        close(SKLEP);
         open (SKLEP,'SklepyPamieci');
         binmode SKLEP, ":utf8";
         print Pamieci "\t<sklepy>\n";
        while(my $line=<SKLEP>)
        {
                if($line=~ m/^\s*<item>/)
                {
                        print Pamieci "\t<sklep>\n"
                }
                        if(!($line=~ m/^\s*<item>/) && !($line=~ m/^\s*<items>/) && !($line =~ m/^\s*<success>/) && !($line=~ m/^\s*<\/item>/) && !($line=~ m/^\s*<\/items>/) && !($line =~ m/^\s*<\/success>/) && !($line=~ 
m/^\s*<\?xml/))
                {
                        print Pamieci $line;
                }
                if($line=~m/^\s*<\/item>/)
                { print Pamieci "\t</sklep>\n";
                }

}
print Pamieci "\t</sklepy>\n";
close(SKLEP);
}
        elsif($_=~ m/^\s*<url>/)
{
$_=~ m#<url>(.*?)</url>#s;
my $tekst=$1;
my $link = get($tekst);
open (FILE, '>testPamieci');
binmode FILE, ":utf8";
print FILE $link;
close (FILE);
my $x = qx { grep "FullDescription" testPamieci };
my $tree = HTML::Tree->new();
$tree->parse(decode_utf8 $x);
print Pamieci "<opis>";
print Pamieci  $tree->as_text;
print Pamieci "</opis>\n";
if($x=~ m/DDR3/ || $x=~ m/DDR 3/ || $x=~ m/DDRIII/ || $x=~ m/DDR III/ || $x=~ m/PC3/ || $x=~ m/PC 3/ ){
print Pamieci "<typ_pamieci>DDR3</typ_pamieci>";
}elsif($x=~ m/DDR2/ || $x=~ m/DDR 2/ || $x=~ m/DDRII/ || $x=~ m/DDR II/ || $x=~ m/PC2/ || $x=~ m/PC 2/ )
{print Pamieci "<typ_pamieci>DDR2</typ_pamieci>";
}elsif($x=~ m/DDR/ || $x=~ m/PC1/)
{print Pamieci "<typ_pamieci>DDR</typ_pamieci>";
}elsif($x=~ m/SDRAM/)
{print Pamieci "<typ_pamieci>SDRAM</typ_pamieci>";
}else
{print Pamieci "<typ_pamieci>false</typ_pamieci>";
}
print Pamieci "\n";
print Pamieci "<co>pamiec</co>\n";
 }}
if($licznik<490)
{
last;
}
$pom=$pom+500;
}
 close (MYFILE);
close(Pamieci);
system("perl -pne '{ \$_ =~ s/ « zwiń opis//g }' Pamieci >> Pamieci2.xml");
system("./przejedz.pl Pamieci2.xml Pamieci.xml");


