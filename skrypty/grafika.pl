#!/usr/bin/perl -w
use LWP::Simple;
use Encode;
use charnames ':full';
use HTML::Tree;
use LWP::Simple;
use encoding "utf-8";
use locale;
my $licznik=0;
my $pom=0;
while(1)
{
$licznik=0;
my $web_source = get( 'http://api.nokaut.pl/?format=xml&key=aa34033cb376ddfaeece2fdb5a18fd5f&method=nokaut.Product.getByCategory&category=142&limit=500&offset='.$pom.'&sort_direction=title_asc' );
 open (MYFILE, '>Grafika');
binmode MYFILE, ":utf8";
 print MYFILE $web_source; 
close(MYFILE);
$licznik = qx { grep -wc "<item>" Grafika };
open(Grafiki, '>>Grafiki');
binmode Grafiki, ":utf8";
open (FILE, 'Grafika');
open (MYFILE2, ">Grafika2");
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
close(MYFILE2);
close(FILE);
open (MYFILE, '<Grafika2');
binmode MYFILE, ":utf8";
while (<MYFILE>) {
#$licznik++;
print Grafiki $_;
if($_=~ m/^\s*<id>/)
{
        $_=~ m#<id>(.*?)</id>#s;
        my $produkt=$1;
        my $sklepy = get('http://api.nokaut.pl/?format=xml&key=aa34033cb376ddfaeece2fdb5a18fd5f&method=nokaut.Price.getByProductId&product_id='.$produkt.'&sort_direction=price_asc');
        open (SKLEP,'>SklepyGrafika');
        binmode SKLEP, ":utf8";
        print SKLEP $sklepy;
        close(SKLEP);
         open (SKLEP,'SklepyGrafika');
         binmode SKLEP, ":utf8";
         print Grafiki "\t<sklepy>\n";
        while(my $line=<SKLEP>)
        {
                if($line=~ m/^\s*<item>/)
                {
                        print Grafiki "\t<sklep>\n"
                }
                        if(!($line=~ m/^\s*<item>/) && !($line=~ m/^\s*<items>/) && !($line =~ m/^\s*<success>/) && !($line=~ m/^\s*<\/item>/) && !($line=~ m/^\s*<\/items>/) && !($line =~ m/^\s*<\/success>/) && !($line=~ m/^\s*<\?xml/))
                {
                        print Grafiki $line;
                }
                if($line=~m/^\s*<\/item>/)
                { print Grafiki "\t</sklep>\n";
                }

}
print Grafiki "\t</sklepy>\n";
close(SKLEP);
}
elsif($_=~ m/^\s*<name>/)
{
if($_=~ m/PCI-E/ || $_=~ m/PCI-e/ || $_=~ m/pci-e/ || $_=~ m/PCI-Express/ || $_=~ m/PCI-EXPRESS/ || $_=~ m/pci-express/ || $_=~ m/pci-E/ ){
print Grafiki "<slot>PCI-E</slot>";
}elsif($_=~ m/AGP/ || $_=~ m/agp/ || $_=~ m/Agp/)
{print Grafiki "<slot>AGP</slot>";
}elsif($_=~ m/Pci/ || $_=~ m/pci/  || $_=~ m/PCI/)
{print Grafiki "<slot>PCI</slot>";
}
print Grafiki "\n"; 
}
	elsif($_=~ m/^\s*<url>/)
{
$_=~ m#<url>(.*?)</url>#s;
my $tekst=$1;
my $link = get($tekst);
open (FILE, '>testGrafika');
binmode FILE, ":utf8";
print FILE $link;
close (FILE);
my $x = qx { grep "FullDescription" testGrafika };
my $tree = HTML::Tree->new();
$tree->parse(decode_utf8 $x);
print Grafiki "<opis>";
print Grafiki  $tree->as_text;
print Grafiki "</opis>\n";
if($x=~ m/PCI-E/ || $x=~ m/PCI-e/ || $x=~ m/pci-e/ || $x=~ m/PCI-Express/ || $x=~ m/PCI-EXPRESS/ || $x=~ m/pci-express/ || $x=~ m/pci-E/ ){
print Grafiki "<slot>PCI-E</slot>";
}elsif($x=~ m/AGP/ || $x=~ m/agp/ || $x=~ m/Agp/)
{print Grafiki "<slot>AGP</slot>";
}elsif($x=~ m/Pci/ || $x=~ m/pci/  || $x=~ m/PCI/)
{print Grafiki "<slot>PCI</slot>";
}
print Grafiki "\n";

print Grafiki "<co>karta_graf</co>\n";
} }
if($licznik<490)
{
last;
}
$pom=$pom+500;
}
 close (MYFILE); 
close(Grafiki);

system("perl -pne '{ \$_ =~ s/ « zwiń opis//g }' Grafiki >> Grafiki2.xml");
system("./przejedz.pl Grafiki2.xml Grafiki.xml");
system("./agp.pl Grafiki3.xml Grafiki.xml");

