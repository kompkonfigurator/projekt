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
my $web_source = get( 'http://api.nokaut.pl/?format=rest&key=aa34033cb376ddfaeece2fdb5a18fd5f&method=nokaut.Product.getByCategory&category=151&limit=500&offset='.$pom.'&sort_direction=title_asc' );
 open (MYFILE, '>Procki');
binmode MYFILE, ":utf8";
 print MYFILE $web_source;
close(MYFILE);
$licznik = qx { grep -wc "<item>" Procki };
open(Procesory, '>>Procesory');
binmode Procesory, ":utf8";
open (FILE, "Procki");
open (MYFILE2, ">Procki2");
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
#close(MYFILE);
close(FILE);
open (MYFILE, 'Procki2');
binmode MYFILE, ":utf8";
while (<MYFILE>) {
#$licznik++;
print Procesory $_;
if($_=~ m/^\s*<id>/)
{
        $_=~ m#<id>(.*?)</id>#s;
        my $produkt=$1;
        my $sklepy = get('http://api.nokaut.pl/?format=xml&key=aa34033cb376ddfaeece2fdb5a18fd5f&method=nokaut.Price.getByProductId&product_id='.$produkt.'&sort_direction=price_asc');
        open (SKLEP,'>SklepyProcesor');
        binmode SKLEP, ":utf8";
        print SKLEP $sklepy;
        close(SKLEP);
         open (SKLEP,'SklepyProcesor');
         binmode SKLEP, ":utf8";
         print Procesory "\t<sklepy>\n";
        while(my $line=<SKLEP>)
        {
                if($line=~ m/^\s*<item>/)
                {
                        print Procesory "\t<sklep>\n"
                }
                        if(!($line=~ m/^\s*<item>/) && !($line=~ m/^\s*<items>/) && !($line =~ m/^\s*<success>/) && !($line=~ m/^\s*<\/item>/) && !($line=~ m/^\s*<\/items>/) && !($line =~ m/^\s*<\/success>/) && !($line=~ 
m/^\s*<\?xml/))
                {
                        print Procesory $line;
                }
                if($line=~m/^\s*<\/item>/)
                { print Procesory "\t</sklep>\n";
                }

}
print Procesory "\t</sklepy>\n";
close(SKLEP);
}
        elsif($_=~ m/^\s*<url>/)
{
$_=~ m#<url>(.*?)</url>#s;
my $tekst=$1;
my $link = get($tekst);
open (FILE, '>testProcesor');
binmode FILE, ":utf8";
print FILE $link;
close (FILE);
my $x = qx { grep "FullDescription" testProcesor };
my $tree = HTML::Tree->new();
$tree->parse(decode_utf8 $x);
print Procesory "<opis>";
print Procesory  $tree->as_text;
print Procesory "</opis>\n";
if($x=~ m/2011/){
print Procesory "<socket>Socket LGA 2011</socket>";
}elsif($x=~ m/462/)
{print Procesory "<socket>Socket 462</socket>";
}elsif($x=~ m/478/)
{print Procesory "<socket>Socket 478</socket>";
}elsif($x=~ m/754/)
{print Procesory "<socket>Socket 754</socket>";
}elsif($x=~ m/775/)
{print Procesory "<socket>Socket 775</socket>";
}elsif($x=~ m/939/)
{print Procesory "<socket>Socket 939</socket>";
}elsif($x=~ m/1155/)
{print Procesory "<socket>Socket 1155</socket>";
}elsif($x=~ m/1156/)
{print Procesory "<socket>Socket 1156</socket>";
}elsif($x=~ m/1366/)
{print Procesory "<socket>Socket 1366</socket>";
}elsif($x=~ m/AM2/ || $x=~ m/AM2./ || $x=~ m/AM2,/ || $x=~ m/AM2\)/ || $x=~ m/AM2]/)
{print Procesory "<socket>Socket AM2</socket>";
}elsif($x=~ m/AM2+/)
{print Procesory "<socket>Socket AM2+</socket>";
}elsif($x=~ m/AM3/ || $x=~ m/AM3./ || $x=~ m/AM3,/ || $x=~ m/AM3\)/ || $x=~ m/AM3]/)
{print Procesory "<socket>Socket AM3</socket>";
}elsif($x=~ m/AM3+/)
{print Procesory "<socket>Socket AM3+</socket>";
}elsif($x=~ m/FM1/)
{print Procesory "<socket>Socket FM1</socket>";
}else
{print Procesory "<socket>false</socket>";
}
print Procesory "\n";
}
print Procesory "<co>procesor</co>\n";
 }
if($licznik<490)
{
last;
}
$pom=$pom+500;
} 
close (MYFILE);
close(Procesory);
system("perl -pne '{ \$_ =~ s/ « zwiń opis//g }' Procesory >> Procesory2.xml");
system("./przejedz.pl Procesory2.xml Proceosry.xml");


