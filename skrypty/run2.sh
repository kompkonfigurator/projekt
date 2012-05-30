#!/bin/bash
skrypt_plyta="plyta.pl";
skrypt_procesor="procesor.pl";
skrypt_pamieci="pamieci.pl";
skrypt_inne="inne.pl";
skrypt_grafika="grafika.pl";
./plyta.pl &
while [ 1 ]
do
sprawdz=$(ps aux | grep -c $skrypt_plyta)
if [ $sprawdz = '0' ]
then
break
fi
cat Plyty.xml >> 
done
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Plyty >> Plyty2.xml
./przejedz.pl Plyty2.xml Plyty.xml
./procesor.pl &
while [ 1 ]
do
sprawdz=$(ps aux | grep -c $skrypt_procesor)
if [ $sprawdz = '0' ]
then
break
fi
done
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Procesory >> Procesory2.xml
./przejedz.pl Procesory2.xml Procesory.xml
./pamieci.pl &
while [ 1 ]
do
sprawdz=$(ps aux | grep -c $skrypt_pamieci)
if [ $sprawdz = '0' ]
then
break
fi
done
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Pamieci >> Pamieci2.xml
./przejedz.pl Pamieci2.xml Pamieci.xml
./inne.pl 166 Klawiatura Klawiatury &
while [ 1 ]
do
sprawdz=$(ps aux | grep -c $skrypt_inne)
if [ $sprawdz = '0' ]
then
break
fi
done
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Klawiatury >> Klawiatury2.xml
./przejedz.pl Klawiatury2.xml Klawiatury.xml
./inne.pl 8831 Myszka Myszki &
while [ 1 ]
do
sprawdz=$(ps aux | grep -c $skrypt_inne)
if [ $sprawdz = '0' ]
then
break
fi
done
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Myszki >> Myszki2.xml
./przejedz.pl Myszki2.xml Myszki.xml
./inne.pl 8365 Dysk Dyski &
while [ 1 ]
do
sprawdz=$(ps aux | grep -c $skrypt_inne)
if [ $sprawdz = '0' ]
then
break
fi
done
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Dyski >> Dyski2.xml
./przejedz.pl Dyski2.xml Dyski.xml
./inne.pl 9697 Naped Napedy &
while [ 1 ]
do
sprawdz=$(ps aux | grep -c $skrypt_inne)
if [ $sprawdz = '0' ]
then
break
fi
done
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Napedy >> Napedy2.xml
./przejedz.pl Napedy2.xml Napedy.xml
./inne.pl 148 Obudowa Obudowy &
while [ 1 ]
do
sprawdz=$(ps aux | grep -c $skrypt_inne)
if [ $sprawdz = '0' ]
then
break
fi
done
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Obudowy >> Obudowy2.xml
./przejedz.pl Obudowy2.xml Obudowy.xml
./inne.pl 157 Zasilacz Zasilacze &
while [ 1 ]
do
sprawdz=$(ps aux | grep -c $skrypt_inne)
if [ $sprawdz = '0' ]
then
break
fi
done
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Zasilacze >> Zasilacze2.xml
./przejedz.pl Zasilacze2.xml Zasilacze.xml
./inne.pl 143 Muzyczna Muzyczne &
while [ 1 ]
do
sprawdz=$(ps aux | grep -c $skrypt_inne)
if [ $sprawdz = '0' ]
then
break
fi
done
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Muzyczne >> Muzyczne2.xml
./przejedz.pl Muzyczne2.xml Muzyczna.xml
./grafika.pl &
while [ 1 ]
do
sprawdz=$(ps aux | grep -c $skrypt_grafika)
if [ $sprawdz = '0' ]
then
break
fi
done
perl -pne '{ $_ =~ s/ « zwiń opis//g }' Grafiki >> Grafiki2.xml
./przejedz.pl Grafiki2.xml Grafiki3.xml
./agp.pl Grafiki3.xml Grafiki.xml 
rm Plyty
rm Plyty2.xml
rm Procesory
rm Procesory2.xml
rm Pamieci
rm Pamieci2.xml
rm Klawiatury
rm Klawiatury2.xml
rm Klawiatura
rm Myszka
rm Myszki
rm Myszki2.xml
rm Dysk
rm Dyski
rm Dyski2.xml
rm Naped
rm Napedy
rm Napedy2.xml
rm Obudowa
rm Obudowy
rm Obudowy2.xml
rm Zasilacz
rm Zasilacze
rm Zasilacze2.xml
rm Muzyczna
rm Muzyczne
rm Muzyczne2.xml
rm Grafiki
rm Grafiki2.xml
rm Grafika
rm PlytyGlowne
rm KosciPamieci
rm Procki
rm Grafiki3.xml
exit

