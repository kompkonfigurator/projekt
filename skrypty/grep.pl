#!/usr/bin/perl -w
$licznik = qx { grep -wc "<item>" $ARGV[0] };
echo $licznik;
