<?php

$lan = array(

'The temporary directory for uploading (%s) is not writable, so import will fail' => 'Az ideiglenes feltöltési könyvtár (%s) nem írható, ezért nem fog sikerülni az importálás',
'Invalid Email' => 'Hibás e-mail cím',
'Import cleared' => 'Az importálás törlése megtörtént',
'Continue' => 'Folytatás',
'Reset Import session' => 'Importálási munkafolyamat alaphelyzetbe állítása',
'File is either too large or does not exist.' => 'Vagy túl nagy a fájl, vagy nem létezik.',
'No file was specified. Maybe the file is too big? ' => 'Nem adta meg a fájlt. Lehet, hogy túl nagy a fájl? ',
'File too big, please split it up into smaller ones' => 'Túl nagy a fájl, darabolja fel kisebbekre',
'Use of wrong characters in filename: ' => 'Rossz karakterek vannak a fájlnévben: ',
'Please choose whether to sign up immediately or to send a notification' => 'Válasszon az azonnali jelentkezés és az értesítés küldése közül',
'Cannot read %s. file is not readable !' => '%s nem olvasható be. a fájl nem olvasható !',
'Something went wrong while uploading the file. Empty file received. Maybe the file is too big, or you have no permissions to read it.' => 'Valami meghibásodott a fájl feltöltése közben. Üres fájl érkezett. Lehet, hogy túl nagy a fájl, vagy az olvasása nem engedélyezett az Ön számára.',
'Reading emails from file ... ' => 'E-mail címek beolvasása fájlból ... ',
'Error was around here &quot;%s&quot;' => 'Hiba volt kb. ennél a résznél &quot;%s&quot;',
'Illegal character was %s' => 'Érvénytelen karakter volt %s',
'A character has been found in the import which is not the delimiter indicated, but is likely to be confused for one. Please clean up your import file and try again' => 'Olyan karakter található az importálásban, mely nem a jelzett elválasztó, viszont valószínű, hogy zavaró. Tisztítsa meg az importfájlt, s próbálja újra.',
'ok, %d lines' => 'ok, %d sor',
'Cannot find column with email, please make sure the column is called &quot;email&quot; and not eg e-mail' => 'Nem található az e-mail címek oszlopa. Ellenőrizze, hogy &quot;email&quot;-e az oszlop neve, s nem pl. e-mail',
'Create new one' => 'Új létrehozása',
'Skip Column' => 'Oszlop kihagyása',
'Import Attributes' => 'Tulajdonságok importálása',
'Continue' => 'Folytatás',
'Please identify the target of the following unknown columns' => 'Azonosítsa be a következő ismeretlen oszlopok célját',
'Summary' => 'Összegzés',
'maps to' => 'megfelel a következőnek',
'Create new Attribute' => 'Új tulajdonság létrehozása',
'maps to' => 'megfelel a következőnek',
'Skip Column' => 'Oszlop kihagyása',
'maps to' => 'megfelel a következőnek',
'%d lines will be imported' => '%d sor került importálásra',
'Confirm Import' => 'Importálás megerősítése',
'Test Output' => 'Kimenet tesztelése',
'Record has no email' => 'Nincs e-mail cím a rekordban',
'Invalid Email' => 'Hibás e-mail cím',
'clear value' => 'érték törlése',
'New Attribute' => 'Új tulajdonság',
'Skip value' => 'Érték kihagyása',
'duplicate' => 'duplum',
'Duplicate Email' => 'Dupla e-mail cím',
' user imported as ' => ' felhasználó importálva mint ',
'duplicate' => 'duplum',
'duplicate' => 'duplum',
'Duplicate Email' => 'Dupla e-mail cím',
'All the emails already exist in the database and are member of the lists' => 'Az összes e-mail cím az adatbázisban van már, és a listák tagjai',
'%s emails succesfully imported to the database and added to %d lists.' => '%s e-mail cím importálása sikerült az adatbázisba, és %d listához került hozzáadásra.',
'%d emails subscribed to the lists' => '%d e-mail címről iratkoztak  fel a listákra',
'%s emails already existed in the database' => '%s e-mail cím már az adatbázisban van',
'%d Invalid Emails found.' => '%d hibás e-mail cím található.',
'These records were added, but the email has been made up from ' => 'Ezek a rekordok kerültek hozzáadásra, az e-mail viszont innen lett kiegészítve: ',
'These records were deleted. Check your source and reimport the data. Duplicates will be identified.' => 'Ezek a rekordok kerültek törlésre. Ellenőrizze a forrást, s importálja újra az adatokat. A duplumok beazonosításra kerülnek.',
'User data was updated for %d users' => '%d felhasználó felhasználói adatai kerültek frissítésre',
'%d users were matched by foreign key, %d by email' => '%d felhasználó került egyeztetésre idegenkulcs alapján, %d by e-mail alapján',
'phplist Import Results' => 'phplist importálási eredmény',
'Test output<br/>If the output looks ok, click %s to submit for real' => 'Kimenet tesztelése<br/>Ha a kimenet jónak néz ki, akkor kattintson a(z) %s gombra az igazi beküldéshez',
'Confirm Import' => 'Importálás megerősítése',
'Import some more emails' => 'Még néhány e-mail cím importálása',
'Adding users to list' => 'Felhasználók felvétele a következő listára:',
'Select the lists to add the emails to' => 'Jelölje be azokat a listákat, melyekhez hozzá akarja adni az e-mail címeket',
'No lists available' => 'Nincsenek elérhető listák',
'Add a list' => 'Lista hozzáadása',
'Select the groups to add the users to' => 'Válassza ki a csoportokat, melyekhez hozzá akarja adni a felhasználókat',
'automatically added' => 'automatikusan hozzáadva',
 'importintro' => '<p class="information">Az Ön által feltöltendő fájl első sorában kell lennie a rekordok tulajdonságainak.
    Győződjön meg róla, hogy az e-mail cím oszlopnak "email"-e a neve, s nem olyasmi-e, hogy "e-mail" vagy
    "Email cím".
    Az írásmód nem fontos.
    </p>
    Ha van "Foreign Key" nevű oszlop, ez kerül felhasználásra egy külső adatbázis
    és a PHPlist adatbázis szinkronizálására. Az idegenkulcsnak elsőbbsége van 
    a felhasználók egyeztetésekor. Ez le fogja lassítani az importálási folyamatot. Használata esetén engedélyezettek
    az e-mail cím nélküli rekordok, azonban egy "Érvénytelen e-mail" kerül létrehozásra helyette. Ezután az
    "Érvénytelen e-mail" keresésével találhatja meg ezeket a rekordokat. Az idegen kulcs legnagyobb mérete 100.
    <br/><br/>
    <b>Figyelmeztetés</b>: A fájlnak egyszerű szövegnek kell lennie. Ne töltsön fel bináris fájlokat, például Word-dokumentumot.
    <br/>',
'uploadlimits' => 'A kiszolgáló a következő korlátozásokat állította be:<br/>
A kiszolgálónak elküldött összes adat legnagyobb mérete: <b>%s</b><br/>
Minden egyes fájl legnagyobb mérete: <b>%s</b>
<br/>A PHPlist nem dolgozza fel a(z) %d Mb-nál nagyobb fájlokat',
'testoutput_blurb' => 'Ha bejelöli a "Kimenet tesztelése" beállítást, akkor az elemzett e-mail címek meg fognak jelenni a képernyőn, s nem fogja megtölteni az adatbázist az adatokkal. Ez a fájl megfelelő formátumának megállapításakor hasznos. Csak az első 50 rekord lesz látható.',
'warnings_blurb' => 'Ha bejelöli a "Láthatók a figyelmeztetések" beállítást, akkor meg fognak jelenni az érvénytelen rekordok figyelmeztetései. A figyelmeztetések csak akkor lesnek láthatók, ha bejelöli a "Kimenet tesztelése" beállítást. A tényleges importáláskor figyelmen kívül fogja őket hagyni. ',
'omitinvalid_blurb' => 'Az "Érvénytelenek kihagyása" beállítás bejelölésekor nem adja hozzá az érvénytelen rekordokat. Az érvénytelen rekordok e-mail cím nélküli rekordok. Bármilyen más tulajdonság automatikusan hozzáadásra kerül, ha például nem található egy rekord országa, akkor fel fogja venni az országlistára.',
'assigninvalid_blurb' => 'Az "Érvénytelenek hozzárendelése" beállítás az érvénytelen e-mail címmel rendelkező felhasználók számára küldendő e-mail készítéséhez kerül felhasználásra.
Az e-mail cím értékének kiegészítéséhez az [ and ] közti értékeket használhatja. Ha például az importfájlban van "First Name" és "Last Name" nevű oszlop, akkor
a "[first name] [last name]" használatával megszerkesztheti ezen felhasználó e-mailjének vezeték- és utónevüket tartalmazó, új értékét.
A [number] értéke a sorszám beszúrásához használható fel az importálás során.',
'overwriteexisting_blurb' => 'A "Meglévők felülírása" beállítás bejelölésekor a felhasználónak az adatbázisban tárolt adatait ki fogja cserélni az importált információkkal. A felhasználók egyeztetése e-mail cím vagy idegen kulcs alapján történik.',
'retainold_blurb' => '"A felhasználó régi e-mail címének megőrzése" beállítás bejelölésekor, ha a két e-mail cím azonos, akkor a régit tartja meg, s az újhoz hozzáfűzi a "duplum" jelzést. Ha nem jelöli be ezt a beállítást, akkor a régi kapja a "duplum" megjelölést, s az újat részesíti előnyben.',
'sendnotification_blurb' => 'Az "Értesítő e-mail küldése" beállítás választásakor az Ön által hozzáadott felhasználóknak elküldi a feliratkozás visszaigazolásának kérését, melyre válaszolniuk kell. Ez ajánlott, mert beazonosítja az érvénytelen e-mail címeket.',
'phplist Import  Results' => 'phplist importálási eredmény',
'File containing emails' => 'Az e-mail címeket tartalmazó fájl',
'Field Delimiter' => 'Mezőhatároló',
'(default is TAB)' => '(alapértelmezés: TAB)',
'Record Delimiter' => 'Rekordelválasztó',
'(default is line break)' => '(alapértelmezés: sortörés)',
'Test output' => 'Kimenet tesztelése',
'Show Warnings' => 'Láthatók a figyelmeztetések',
'Omit Invalid' => 'Érvénytelenek kihagyása',
'Assign Invalid' => 'Érvénytelenek hozzárendelése',
'Overwrite Existing' => 'Meglévők felülírása',
'Retain Old User Email' => 'A felhasználó régi e-mail címének megőrzése',
'Send&nbsp;Notification&nbsp;email' => 'Értesítő&nbsp;e-mail&nbsp;küldése',
'Make confirmed immediately' => 'Azonnal visszaigazolttá tétel',
'Import' => 'Importálás',


);
?>