<?php
$lan = array(
  'File is either to large or does not exist.' => 'Vagy túl nagy a fájl, vagy nem létezik.',
  'No file was specified.' => 'Nem adta meg a fájlt.',
  'Some characters that are not valid have been found. These might be delimiters. Please check the file and select the right delimiter. Character found:' => 'Néhány nem érvényes karakter található. Ezek elválasztók lehetnek. Ellenőrizze a fájlt, s válassza ki a megfelelő elválasztót. Talált karakter:',
  'Name cannot be empty' => 'A név nem lehet üres',
  'Name is not unique enough' => 'A név nem eléggé egyedi',
  'Cannot find the email in the header' => 'Nem található az e-mail cím a fejlécben',
  'Cannot find the password in the header' => 'Nem található a jelszó a fejlécben',
  'Cannot find the loginname in the header' => 'Nem található a bejelentkezési név a fejlécben',
  'Record has no email' => 'Nincs e-mail címe a rekordnak',
  'Invalid Email' => 'Hibás e-mail cím',
  'Record has more values than header indicated, this may cause trouble' => 'A rekordnak a fejléc által jelzettnél több értéke van, ez problémát okozhat',
  'password' => 'jelszó',
  'loginname' => 'bejelentkezési név',
  'Empty loginname, using email:' => 'A bejelentkezési név üres, a következő e-mail használata:',
  'Value' => 'Érték',
  'added to attribute' => 'hozzáadva tulajdonsághoz',
  'new email was' => 'új e-mail volt',
  'new emails were' => 'új e-mailek voltak',
  'email was' => 'e-mail volt',
  'emails were' => 'e-mailek voltak',
  'All the emails already exist in the database' => 'Az összes e-mail már az adatbázisban van',
  'succesfully imported to the database and added to the system.' => 'importálása az adatbázisba és hozzáadása a rendszerhez sikerült.',
  'Import some more emails' => 'Még néhány e-mail cím importálása',
  'No default permissions have been defined, please create default permissions first, by creating one dummy admin and assigning the default permissions to this admin' => 'Nem kerültek meghatározásra az alapértelmezett engedélyek, előbb készítse el az alapértelmezett engedélyeket, egy áladminisztrátor létrehozásával, s az alapértelmezett engedélyek ehhez az adminisztrátorhoz történő hozzárendelésével',
  
  # do not translate email, loginname and password
  'importadmininfo' => '
  Az Ön által feltöltésre kerülő fájlnak tartalmaznia kell 
az Ön által a rendszerhez hozzáadni kívánt adminisztrátorokat. Az oszlopoknak a következő fejléceik legyenek: <b>email</b>, <b>loginname</b>, <b>password</b>. Bármilyen más oszlop admin attribútumokként kerül hozzáadásra.
 <b>Figyelmeztetés</b>: A fájlnak egyszerű szövegnek kell lennie. Ne töltsön fel bináris fájlokat, mint például a Word-dokumentum.
  ',
  'File containing emails' => 'E-mail címeket tartalmazó fájl',
  'Field Delimiter' => 'Mezőhatároló',
  'Record Delimiter' => 'Rekordelválasztó',
  'importadmintestinfo' => 'Ha bejelöli a "Kimenet tesztelése" beállítást, akkor az elemzett e-mail címek meg fognak jelenni a képernyőn, s nem fogja megtölteni az adatbázist az adatokkal. Ez a fájl megfelelő formátumának megállapításakor hasznos. Csak az első 50 rekord lesz látható.',
  # this should be the same as the term between quotes in the previous one
  'Test output' => 'Kimenet tesztelése',
  'Check this box to create a list for each administrator, named after their loginname' => 'Jelölje be ezt a jelölőnégyzetet, ha minden adminisztrátornak a bejelentkezési nevük után elnevezett listát akar készíteni',
  'Do Import' => 'Importáld',
  'default is TAB' => 'alapértelmezés: TAB',
  'default is line break' => 'alapértelmezés: sortörés',
  'testoutputinfo' => 'Kimenet tesztelése:<br/>Soronként csak EGY e-mail cím legyen.<br/>Ha jónak tűnik a kimenet, menjen <a href="javascript:history.go(-1)">vissza</a> az igaziból történő beküldéshez.<br/><br/>',  
  'List for' => 'Lista a következőhöz',
'login' => 'bejelentkezés',
  
  
);
?>