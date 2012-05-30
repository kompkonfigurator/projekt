#!/usr/bin/perl -w
use HTML::Entities;
open (FILE, "<$ARGV[0]");
open (MYFILE2, ">$ARGV[1]");
print MYFILE2 "\<?xml version=\"1.0\" encoding=\"UTF-8\"?\>\n\<success\>\n\<items\>\n";
while (<FILE>) {
    if (/\<item\>/) {
        push @elo, $_;
        while (<FILE>) {
                $_=~ s/\'//g;
if(/\<opis\>/)
{
        $_= ~m/\<opis\>(.*)\<\/opis\>/;
$a=$1;
        encode_entities($a, "\",',\,,\&,\<,\>");
push @elo, "<opis>";
push @elo, $a;
push @elo, "</opis>\n";
}
else
{
push @elo, $_;
}
            last if /\<\/item\>/;
    }       }

#if(!grep /\<shop_count\>[0,1,2,3]\<\/shop_count\>/, @elo){
print MYFILE2 @elo;
#}
undef @elo;
undef $a;
}
print MYFILE2 "\<\/items>\n\<\/success\>";
