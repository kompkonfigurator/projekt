#!/usr/bin/perl -w
use LWP::Simple;
use Encode;
use charnames ':full';
use HTML::Tree;
use LWP::Simple;
use encoding "utf-8";


my $licznik=0;
my $pom=0;
my $pomoc=0;
while(1)
{
$licznik=0;
my $web_source2 = get( 
'http://api.nokaut.pl/?format=rest&key=aa34033cb376ddfaeece2fdb5a18fd5f&method=nokaut.Product.getByCategory&category='.$ARGV[0].'&limit=500&offset='.$pom.'&sort_direction=title_asc');
 open (MYFILE2, ">$ARGV[1]");
binmode MYFILE2, ":utf8";
 print MYFILE2 $web_source2;
close(MYFILE2);
$licznik = qx { grep -wc "<item>" $ARGV[1] };
open(MYFILE, ">>$ARGV[2]");
binmode MYFILE, ":utf8";
open (FILE, "$ARGV[1]");
open (MYFILE2, ">$ARGV[1]2");
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
open (MYFILE2, "$ARGV[1]2");
binmode MYFILE2, ":utf8";
while (<MYFILE2>) {
#$licznik++;
print MYFILE $_;
if($_=~ m/^\s*<id>/)
{
        $_=~ m#<id>(.*?)</id>#s;
        my $produkt=$1;
        my $sklepy = get('http://api.nokaut.pl/?format=xml&key=aa34033cb376ddfaeece2fdb5a18fd5f&method=nokaut.Price.getByProductId&product_id='.$produkt.'&sort_direction=price_asc');
        open (SKLEP,">Sklepy$ARGV[1]");
        binmode SKLEP, ":utf8";
        print SKLEP $sklepy;
        close(SKLEP);
         open (SKLEP,"Sklepy$ARGV[1]");
         binmode SKLEP, ":utf8";
         print MYFILE "\t<sklepy>\n";
        while(my $line=<SKLEP>)
        {
                if($line=~ m/^\s*<item>/)
                {
                        print MYFILE "\t<sklep>\n"
                }
                        if(!($line=~ m/^\s*<item>/) && !($line=~ m/^\s*<items>/) && !($line =~ m/^\s*<success>/) && !($line=~ m/^\s*<\/item>/) && !($line=~ m/^\s*<\/items>/) && !($line =~ m/^\s*<\/success>/) && !($line=~ 
m/^\s*<\?xml/))
                {
                        print MYFILE $line;
                }
                if($line=~m/^\s*<\/item>/)
                { print MYFILE "\t</sklep>\n";
                }

}
print MYFILE "\t</sklepy>\n";
close(SKLEP);
}
        elsif($_=~ m/^\s*<url>/)
{
$_=~ m#<url>(.*?)</url>#s;
my $tekst2=$1;
my $link2 = get($tekst2);
open (FILE2, ">test$ARGV[1]");
binmode FILE2, ":utf8";
print FILE2 $link2;
close (FILE2);
my $x2 = qx { grep "FullDescription" test$ARGV[1] };
my $tree2 = HTML::Tree->new();
$tree2->parse(decode_utf8 $x2);
print MYFILE "<opis>";
print MYFILE  $tree2->as_text;
print MYFILE "</opis>\n";
if($ARGV[0]=="166")
{
	print MYFILE "<co>klawiatura</co>\n";
 }
 elsif($ARGV[0]=="8831")
 {
	         print MYFILE "<co>mysz</co>\n";
		  }
 elsif($ARGV[0]=="8365")
  {
	                   print MYFILE "<co>dysk</co>\n";
			                     }
 elsif($ARGV[0]=="9697")
  {
	                   print MYFILE "<co>naped</co>\n";
			                     }
 elsif($ARGV[0]=="148")
  {
	                   print MYFILE "<co>obudowa</co>\n";
			                     }
 elsif($ARGV[0]=="157")
  {
	                   print MYFILE "<co>zasilacz</co>\n";
			                     }
 elsif($ARGV[0]=="143")
  {
	                   print MYFILE "<co>karta_muz</co>\n";
			                     }
				     					     
				     }}
if($licznik<490)
{
last;
}
$pom=$pom+500;
}
 close (MYFILE2);
close(MYFILE);
if($ARGV[0]=="166")
{
        system("perl -pne '{ \$_ =~ s/ « zwiń opis//g }' Klawiatury >> Klawiatury2.xml");
system("./przejedz.pl Klawiatury2.xml Klawiatury.xml");
 }
 elsif($ARGV[0]=="8831")
 {
                 system("perl -pne '{ \$_ =~ s/ « zwiń opis//g }' Myszki >> Myszki2.xml");
system("./przejedz.pl Myszki2.xml Myszki.xml");
                  }
 elsif($ARGV[0]=="8365")
  {
                          system("perl -pne '{ \$_ =~ s/ « zwiń opis//g }' Dyski >> Dyski2.xml");
system("./przejedz.pl Dyski2.xml Dyski.xml");
                      