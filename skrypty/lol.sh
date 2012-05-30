#!/usr/bin/perl -w
system("perl -pne '{ \$_ =~ s/ « zwiń opis//g }' Plyty >> Plyty2.xml");
system("./przejedz.pl Plyty2.xml Plyty.xml");
system("cat Plyty.xml >> $ARGV[0]");
