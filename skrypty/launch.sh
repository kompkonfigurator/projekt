#!/bin/bash
skrypt_plyta="plyta.pl";
skrypt_procesor="procesor.pl";
skrypt_pamieci="pamieci.pl";
skrypt_inne="inne.pl";
skrypt_grafika="grafika.pl";
NOWDATE=`date +%d%m%y`
touch UPDATE$NOWDATE.xml
./plyta.pl &
./procesor.pl &
./pamieci.pl &
./inne.pl 166 Klawiatura Klawiatury &
./inne.pl 8831 Myszka Myszki &
./inne.pl 8365 Dysk Dyski &
./inne.pl 9697 Naped Napedy &
./inne.pl 148 Obudowa Obudowy &
./inne.pl 157 Zasilacz Zasilacze &
./inne.pl 143 Muzyczna Muzyczne &
./grafika.pl &
while [ 1 ]
do
sprawdz=$(ps aux | grep -c $skrypt_inne)
if [ $sprawdz = '0' ]
then
break
fi
done
while [ 1 ]
do
sprawdz=$(ps aux | grep -c $skrypt_plyta)
if [ $sprawdz = '0' ]
then
break
fi
done
while [ 1 ]
do
sprawdz=$(ps aux | grep -c $skrypt_procesor)
if [ $sprawdz = '0' ]
then
break
fi
done
while [ 1 ]
do
sprawdz=$(ps aux | grep -c $skrypt_pamieci)
if [ $sprawdz = '0' ]
then
break
fi
done
while [ 1 ]
do
sprawdz=$(ps aux | grep -c $skrypt_grafika)
if [ $sprawdz = '0' ]
then
break
fi
done
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Plyty >> Plyty2.xml
./przejedz.pl Plyty2.xml Plyty.xml
cat Plyty.xml >> UPDATE$NOWDATE.xml
sleep 1
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Procesory >> Procesory2.xml
./przejedz.pl Procesory2.xml Procesory.xml
cat Procesory.xml >> UPDATE$NOWDATE.xml
sleep 1
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Pamieci >> Pamieci2.xml
./przejedz.pl Pamieci2.xml Pamieci.xml
cat Pamieci.xml >> UPDATE$NOWDATE.xml
sleep 1
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Klawiatury >> Klawiatury2.xml
./przejedz.pl Klawiatury2.xml Klawiatury.xml
cat Klawiatury.xml >> UPDATE$NOWDATE.xml
sleep 1
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Myszki >> Myszki2.xml
./przejedz.pl Myszki2.xml Myszki.xml
cat Myszki.xml >> UPDATE$NOWDATE.xml
sleep 1
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Dyski >> Dyski2.xml
./przejedz.pl Dyski2.xml Dyski.xml
cat Dyski.xml >> UPDATE$NOWDATE.xml
sleep 1
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Napedy >> Napedy2.xml
./przejedz.pl Napedy2.xml Napedy.xml
cat Napedy.xml >> UPDATE$NOWDATE.xml
sleep 1
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Obudowy >> Obudowy2.xml
./przejedz.pl Obudowy2.xml Obudowy.xml
cat Obudowy.xml >> UPDATE$NOWDATE.xml
sleep 1
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Zasilacze >> Zasilacze2.xml
./przejedz.pl Zasilacze2.xml Zasilacze.xml
cat Zasilacze.xml >> UPDATE$NOWDATE.xml
sleep 1
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Muzyczne >> Muzyczne2.xml
./przejedz.pl Muzyczne2.xml Muzyczna.xml
cat Muzyczna.xml >> UPDATE$NOWDATE.xml
sleep 1
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Grafiki >> Grafiki2.xml
./przejedz.pl Grafiki2.xml Grafiki3.xml
./agp.pl Grafiki3.xml Grafiki.xml
cat Grafiki.xml >> UPDATE$NOWDATE.xml
sleep 1
./scal.pl UPDATE$NOWDATE.xml DBUPDATE$NOWDATE.xml
#./wyczysc.pl UPDATE$NOWDATE.xml &>/dev/null
exit

