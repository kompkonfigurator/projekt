#!/bin/bash
NOWDATE=`date +%d%m%y`
touch UPDATE$NOWDATE.xml
./plyta.pl UPDATE$NOWDATE.xml &
