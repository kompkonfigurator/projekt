#!/usr/bin/perl -w
open (FILE, "<$ARGV[0]");
open (MYFILE2, ">$ARGV[1]");
print MYFILE2 "\<?xml version=\"1.0\" encoding=\"UTF-8\"?\>\n\<success\>\n\<items\>\n";
while (<FILE>) {
    if (/\<item\>/) {
	push @elo, $_;
        while (<FILE>) {
	push @elo, $_;
            last if /\<\/item\>/;
        }
    }
if(!grep /\<slot\>AGP\<\/slot\>/, @elo){
print MYFILE2 @elo;
}
undef @elo;
}
print MYFILE2 "\<\/items>\n\<\/success\>";

