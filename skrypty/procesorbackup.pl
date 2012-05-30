#!/usr/bin/perl -w
use LWP::Simple;
use Encode;
use charnames ':full';
use HTML::Tree;
use LWP::Simple;
use encoding "utf-8";

my $web_source = get( 'http://api.nokaut.pl/?format=rest&key=aa34033cb376ddfaeece2fdb5a18fd5f&method=nokaut.Product.getByCategory&category=151' );
 open (MYFILE, '>Procki');
binmode MYFILE, ":utf8";
 print MYFILE $web_source;
close(MYFILE);
open(Procesory, '>>Procesory');
binmode Procesory, ":utf8";
open (MYFILE, 'Procki');
binmode MYFILE, ":utf8";
while (<MYFILE>) {
print Procesory $_;
        if($_=~ m/^\s*<url>/)
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
}elsif($x=~ m/AM2 /)
{print Procesory "<socket>Socket AM2</socket>";
}elsif($x=~ m/AM2+/)
{print Procesory "<socket>Socket AM2+</socket>";
}elsif($x=~ m/AM3 /)
{print Procesory "<socket>Socket AM3</socket>";
}elsif($x=~ m/AM3+/)
{print Procesory "<socket>Socket AM3+</socket>";
}elsif($x=~ m/FM1/)
{print Procesory "<socket>Socket FM1</socket>";
}else
{print Procesory "<socket>Brak informacji o sockecie</socket>";
}
print Procesory "\n";
}
 }
 close (MYFILE);
close(Procesory);


