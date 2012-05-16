<?php

$lan = array(

'The temporary directory for uploading (%s) is not writable, so import will fail' => 'Tymczasowy katalog do przesy³ania plików (%s) jest niezapisywalny, wiêc import zakoñczy siê niepowodzeniem',
'Invalid Email' => 'Nieprawid³owy email',
'Import cleared' => 'Import wyczyszczony',
'Continue' => 'Kontynuuj',
'Reset Import session' => 'Resetuj sesjê importu',
'File is either too large or does not exist.' => 'Plik jest za du¿y lub nie istnieje.',
'No file was specified. Maybe the file is too big? ' => 'Nie podano pliku. Byæ mo¿e plik jest zbyt du¿y? ',
'File too big, please split it up into smaller ones' => 'Plik jest zbyt du¿y. Podziel go na mniejsze czê¶ci',
'Use of wrong characters in filename: ' => 'U¿yto niew³a¶ciwych znaków w nazwie pliku: ',
'Please choose whether to sign up immediately or to send a notification' => 'Wybierz: czy potwierdziæ u¿ytkowników od razu, czy rozes³aæ pro¶bê o potwierdzenie',
'Cannot read %s. file is not readable !' => 'Nie mozna odczytaæ %s. Plik jest nieodczytywalny !',
'Something went wrong while uploading the file. Empty file received. Maybe the file is too big, or you have no permissions to read it.' => 'Co¶ posz³o nie tak podczas przesy³ania pliku. Otrzymano pusty plik. Mo¿e plik jest zbyt du¿y, albo nie masz prawa do odczytu pliku.',
'Reading emails from file ... ' => 'Odczytujê adresy z pliku ... ',
'Error was around here &quot;%s&quot;' => 'Tu jest b³±d &quot;%s&quot;',
'Illegal character was %s' => 'Znaleziono nieprawid³owy znak %s',
'A character has been found in the import which is not the delimiter indicated, but is likely to be confused for one. Please clean up your import file and try again' => 'W imporcie znaleziono znak, który nie jest wskazanym separatorem, prawdopodobnie zosta³ pomylony. Wyczy¶æ plik importu i spróbuj ponownie',
'ok, %d lines' => 'ok, %d wierszy',
'Cannot find column with email, please make sure the column is called &quot;email&quot; and not eg e-mail' => 'Nie znaleziono komlumny z adresami email, upewnij siê, ¿e istnieje kolumna &quot;email&quot; a nie na przyk³ad e-mail',
'Create new one' => 'Utwórz nowy',
'Skip Column' => 'Pomiñ kolumnê',
'Import Attributes' => 'importuj atrybuty',
'Continue' => 'Kontynuuj',
'Please identify the target of the following unknown columns' => 'Wska¿ cel nastêpuj±cych nieznanych kolumn',
'Summary' => 'Podsumowanie',
'maps to' => 'zamapowane do',
'Create new Attribute' => 'Utwórz nowy atrybut',
'maps to' => 'zamapowane do',
'Skip Column' => 'Pomiñ kolumnê',
'maps to' => 'zamapowane do',
'%d lines will be imported' => '%d wierszy zostanie zaimportowanych',
'Confirm Import' => 'Potwierd¼ import',
'Test Output' => 'Wyj¶cie na ekran',
'Record has no email' => 'Rekord nie zawiera adresu email',
'Invalid Email' => 'Nieprawid³owy email',
'clear value' => 'wyczy¶c warto¶æ',
'New Attribute' => 'nowy atrybut',
'Skip value' => 'Pomiñ warto¶æ',
'duplicate' => 'duplikat',
'Duplicate Email' => 'Powielony email',
' user imported as ' => ' u¿ytkownik zaimportowany jako ',
'duplicate' => 'duplikat',
'duplicate' => 'duplikat',
'Duplicate Email' => 'Powielony email',
'All the emails already exist in the database and are member of the lists' => 'Wszystkie adresy ju¿ istniej± w bazie i s± cz³onkami list',
'%s emails succesfully imported to the database and added to %d lists.' => '%s adresów zamiportowanych z sukcesem do bazy i dodanych do %d list.',
'%d emails subscribed to the lists' => '%d adresów dodanych do list',
'%s emails already existed in the database' => '%s adresów ju¿ istnieje w bazie',
'%d Invalid Emails found.' => '%d b³ednych adresów.',
'These records were added, but the email has been made up from ' => 'Rekordy zosta³y dodane ale adresy email zosta³y wygenerowane z ',
'These records were deleted. Check your source and reimport the data. Duplicates will be identified.' => 'Rekordy zosta³y usuniête. Sprawd¼ ¼ród³o i zaimportuj dane ponownie. Duplikaty zostan± wykryte.',
'User data was updated for %d users' => 'Dane u¿ytkownika zosta³y zaktualizowane dla %d u¿ytkowników',
'%d users were matched by foreign key, %d by email' => '%d u¿ytkowników dopasowano po kluczu obcym, %d po adresie email',
'phplist Import Results' => 'Wyniki importu phplist',
'Test output<br/>If the output looks ok, click %s to submit for real' => 'Wyj¶cie na ekran<br/>Je¶li wyniki s± ok, kliknij %s aby zaimportowaæ na prawdê',
'Confirm Import' => 'Potwierd¼ import',
'Import some more emails' => 'Zaimportuj wiêcej adresów email',
'Adding users to list' => 'Dodajê u¿ytkowników do listy',
'Select the lists to add the emails to' => 'Wybierz listy, do których dodaæ adresy email',
'No lists available' => 'Brak dostêpnych list',
'Add a list' => 'Dodaj listê',
'Select the groups to add the users to' => 'Wybierz grupy, do których dodaæ u¿ytkowników',
'automatically added' => 'dodano automatycznie',
 'importintro' => '<p>Plik, który przesy³asz bêdzie musia³ mieæ atrybuty rekordów w pierwszym wierszu.
    Upewnij siê, ¿e kolumna z adresami email jest nazwana "email" a nie na przyk³ad "e-mail" albo
    "Email Address".
    Wielko¶æ liter nie ma znaczenia.
    </p>
    Je¶li w pliku jest kolumna klucza obcego o nazwie "Foreign Key", zostanie ona u¿yta do synchronizacji miêdzy
    zewnêtrzn± baz± danych i baz± danych PHPlist. Klucz obcy jest priorytetem podczas dopasowywania
    do istniej±cego u¿ytkownika. To spowolni proces importu. Przy u¿yciu tej opcji dopuszczalne s±
    rekordy bez adresu email, ale zamiast tego zostanie utworzony wpis "Invalid Email" (Nieprawid³owy email). Pó¼niej
    mo¿esz poszukaæ "invalid email" aby znale¼æ te rekordy. Maksymalna wielko¶c klucza obcego to 100.
    <br/><br/>
    <b>Uwaga</b>: plik musi byæ zwyk³ym tekstem. Nie przekazuj plików binarnych jak dokumenty Worda.
    <br/>',
'uploadlimits' => 'Nastêpuj±ce limity zosta³y ustawione na Twoim serwerze:<br/>
Maksymalna ilo¶æ ³±cznie wys³anych danych na serwer: <b>%s</b><br/>
Maksymalna wielko¶c pojedynczego pliku: <b>%s</b>
<br/>PHPlist nie przetworzy plików wiêkszych ni¿ %dMb',
'testoutput_blurb' => 'Je¶li zaznaczysz "Wyj¶cie na ekran", odczytane adresy email wy¶wietl± siê na ekranie ale nie zostan± wpisane do bazy danych. Jest to przydatne aby dowiedzieæ siê czy format pliku jest poprawny. Wy¶wietlone zostanie tylko pierwsze 50 rekordów.',
'warnings_blurb' => 'Je¶li zaznaczysz "Poka¿ ostrze¿enia", wy¶wietlone zostan± ostrze¿enia dla pojedynczych rekordów. Ostrze¿enia zostan± wy¶wietlone tylko wówczas, gdy zaznaczysz opcjê "Wyj¶cie na ekran". Opcja "Poka¿ ostrze¿enia" bêdzie zignorowana podczas w³a¶ciwego importu. ',
'omitinvalid_blurb' => 'Je¶li zaznaczysz "Pomiñ nieprawid³owe", nieprawid³owe rekordy nie zostan± dodane. Nieprawid³owe rekordy to rekordy bez adresów email. Wszelkie inne atrybuty zostan± dodane automatycznie, tzn. je¿eli rekord kraju nie zostanie odnaleziony, zostanie on dodany do listy krajów.',
'assigninvalid_blurb' => 'Opcja "Przypisz nieprawid³owe" zostanie u¿yta aby utworzyæ ares email dla u¿ytkowników z nieprawid³owym adresem. 
Mo¿esz u¿yæ warto¶ci pomiêdzy [ oraz ] w celu uzupe³nienia warto¶ci email. Na przyk³ad je¶li Twój plik importu zawiera kolumnê "First Name" oraz "Last Name", mo¿esz u¿yæ 
"[first name] [last name]" aby zbudowaæ now± warto¶æ dla adresu email tego u¿ytkownika zawieraj±c± jego imiê i nazwisko. 
Warto¶æ [number] mo¿e zostaæ u¿yta aby wstawiaæ kolejny numer importu.',
'overwriteexisting_blurb' => 'Je¶li zaznaczysz "Nadpisz istniej±ce", informacje na temat u¿ytkownika w bazie danych zostan± zamienione na te importowane. U¿ytkownicy s± dopasowywani po adresie email lub po kluczu obcym.',
'retainold_blurb' => 'Je¶li zaznaczysz "Zachowaj stary email", podczas wyst±pienia konfliktu zostanie zachowany stary adres email oraz dodany wpis "duplikat" do nowego. Je¶li tego nie zaznaczysz, stary otrzyma wpis "duplikat" a nowy bêdzie mia³ pierszeñstwo.',
'sendnotification_blurb' => 'Je¶li wybierzesz "Wy¶lij potwierdzenie" u¿ytkownicy, których dodajesz otrzymaj± pro¶bê o potwierdzenie rejestracji, na które bêd± musieli odpowiedzieæ. Jest to zalecane, bo dziêki temu bêdzie mo¿na zidentyfikowaæ nieprawid³owe adresy email.',
'phplist Import  Results' => 'Wyniki importu phplist',
'File containing emails' => 'Plik z adresami email',
'Field Delimiter' => 'Separator pól',
'(default is TAB)' => '(domyslnie TAB)',
'Record Delimiter' => 'Separator rekordów',
'(default is line break)' => '(domy¶lnie prze³amanie linii)',
'Test output' => 'Wyj¶cie na ekran',
'Show Warnings' => 'Poka¿ ostrze¿enia',
'Omit Invalid' => 'Pomiñ nieprawid³owe',
'Assign Invalid' => 'Przypisz do nieprawid³owych',
'Overwrite Existing' => 'Nadpisz istniej±ce',
'Retain Old User Email' => 'Zachowaj stary email',
'Send&nbsp;Notification&nbsp;email' => 'Wy¶lij potwierdzenie',
'Make confirmed immediately' => 'Oznacz u¿ytkowników jako potwierdzonych',
'Import' => 'Importuj',


);
?>