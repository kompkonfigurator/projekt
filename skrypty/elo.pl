#!/usr/bin/perl -w
open (MYFILE2, ">$ARGV[0]");
print MYFILE2 "\<?xml version=\"1.0\" encoding=\"UTF-8\"?\>\n\<success\>\n\<items\>\n";
print MYFILE2 "\<\/items>\n\<\/success\>";
