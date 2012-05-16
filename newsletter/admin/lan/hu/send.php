<?php

## notes to translators:
# do not translate anything in square brackets: eg [RSS]

$lan = array (
  'noaccess' => 'Nincs ilyen üzenet, vagy Ön nem férhet hozzá',
  'htmlusedwarning' => 'Figyelmeztetés: Ön jelezte, hogy a tartalom nem HTML volt, azonban volt benne  néhány HTML  címke. Ez hibákat okozhat.',
  'adding' => 'Hozzáadás',
  'longmimetype' => 'A Mime-típus ne legyen hosszabb 255 karakternél, ez zavart idézhet elé',
  'addingattachment' => 'Hozzáadva melléklet ',
  'uploadfailed' => 'A feltöltött fájl fogadása nem megfelelő volt, a fájl üres',
  'saved' => 'Az üzenet mentése megtörtént',
  'added' => 'Az üzenet hozzáadása megtörtént',
  'queued' => 'Az üzenet várólistára vétele küldés céljából megtörtént',
  'processqueue' => 'Az üzenet-várólista feldolgozása',
  'errorsubject' => 'Sajnos érvénytelen karaktereket használt a Tárgy mezőben.',
  'errorfrom' => 'Sajnos érvénytelen karaktereket használt a Feladó mezőben.',
  'enterfrom' => 'Töltse ki a Feladó mezőt.',
  'entermessage' => 'Írja be az üzenetet',
  'entersubject' => 'Írja be az üzenet tárgyát',
  'duplicateattribute' => 'Hiba: Egy tulajdonságot csak egy szabályban használhat föl',
  'selectlist' => 'Válassza ki a listá(ka)t, mely(ek)re küldi az üzenetet',
  'notargetemail' => 'Nincsenek cél e-mail címek listázva a teszteléshez.',
  'emailnotfound' => 'Nem található e-mail cím a teszt üzenet elküldéséhez.',
  'sentemailto' => 'A tesztlevelet elküldtük a következő címre:',
  'removedattachment' => 'A következő mellékletet eltávolítottuk: ',
  'existingcriteria' => 'Létező feltételek',
  'remove' => 'Eltávolítás',
  'calculating' => 'Számolás',
  'calculate' => 'Számolás',
  'content' => 'Tartalom',
  'format' => 'Formátum',
  'attach' => 'Csatolás',
  'scheduling' => 'Ütemterv',
  'criteria' => 'Feltételek',
  'lists' => 'Listák',
  'unsavedchanges' => 'Figyelmeztetés: Önnek nem mentett változtatásai vannak.\nKattintson az OK gombra a folytatáshoz, vagy a Mégse gombra az ezen az oldalon maradáshoz,\nhogy tudja menteni a változtatásokat.',
  'whatisprepare' => 'Mit jelent az üzenet előkészítése',
  'subject' => 'Tárgy',
  'fromline' => 'Feladó mező',
  'embargoeduntil' => 'Zárolva a következő időpontig:',
  'repeatevery' => 'Az üzenet megismétlése minden',
  'norepetition' => 'nincs ismétlés',
  'hour' => 'Óra',
  'day' => 'Nap',
  'week' => 'Hét',
  'repeatuntil' => 'Ismétlés eddig:',
  'format' => 'Formátum',
  'autodetect' => 'Automatikus felismerés',
  'sendas' => 'A küldemény formátuma',
  'html' => 'HTML',
  'text' => 'szöveg',
  'pdf' => 'PDF',
//  'textandhtml' => 'Szöveg és HTML', //obsolete by bug 0009687
  'textandpdf' => 'Szöveg és PDF',
  'usetemplate' => 'Sablon használata',
  'selectone' => 'válasszon',
  'rssintro' => 'Ha ezt az üzenetet RSS-csatornák küldésének sablonjaként kívánja használni,
    akkor válassza ki a használatának gyakoriságát és használatát [RSS] az üzenetében annak jelzéséhez, hogy az elemek listájának hova kell mennie.',
  'none' => 'nincs',
  'message' => 'Üzenet',
  'expand' => 'kinyitás',
  'plaintextversion' => 'Az üzenet egyszerű szöveges változata',
  'messagefooter' => 'Az üzenet lábléce',
  'messagefooterexplanation1' => 'Az <b>[UNSUBSCRIBE]</b> beszúrásával adhatja meg minden felhasználó személyes lemondási URL-címét.',
  'messagefooterexplanation2' => 'A <b>[PREFERENCES]</b> beszúrásával adhatja meg a felhasználók adatmódosításának személyes URL-címét.',
  'messagefooterexplanation3' => 'Use <b>[FORWARD]</b> to add a personalised URL to forward the message to someone else.',
  'addattachments' => 'Csatoljon mellékleteket az üzenetéhez',
  'uploadlimits' => 'A feltöltésnek a kiszolgáló által beállított következő korlátozásai vannak',
  'maxtotaldata' => 'A kiszolgálónak küldés alatt lévő összes adat legnagyobb mérete',
  'maxfileupload' => 'Minden egyedi fájl legnagyobb mérete',
  'currentattachments' => 'Jelenlegi mellékletek',
  'filename' => 'fájlnév',
  'desc' => 'leírás',# short for description
  'size' => 'méret',
  'file' => 'fájl',
  'del' => 'törlés', # short for delete
  'newattachment' => 'Új melléklet',
  'addandsave' => 'Hozzáadás (és mentés)',
  'pathtofile' => 'A fájl elérési útja a kiszolgálón',
  'attachmentdescription' => 'A melléklet leírása',
  'delchecked' => 'Kijelöltek törlése',
  'sendtestmessage' => 'Tesztüzenet küldése',
  'toemailaddresses' => ' e-mail cím(ek)re',
  'sendtestexplain' => '(vesszővel tagolt címek - az összesnek felhasználónak kell lennie)',
  'criteriaexplanation' => '
        <p><b>Válassza ki ennek az üzenetnek a feltételeit:</b>
        <ol>
        <li>jelölje be a használni kívánt feltétel jelölőnégyzetét
        <li>majd válassza ki a használni kívánt tulajdonság melletti választógombot
        <li>ezután válassza ki azoknak a tulajdonságoknak az értékeit, melyekre küldeni akarja az üzenetet
        <i>Megjegyzés:</i> Az üzenetek azoknak a személyeknek kerülnek elküldésre, akik megfelelnek az <i>1. feltételnek</i> <b>ÉS</b> a <i>2. feltételnek</i> stb
        </ol>
        ',
  'criterion' => 'Feltétel',
  'usethisone' => 'Ezen feltétel használata',
  'or' => 'vagy', # "alternative" ie this or this
  'is' => 'van',
  'isnot' => 'nem',
  'isbefore' => 'előtte', # date and time wise
  'isafter' => 'utána', # date and time wise
  'nocriteria' => 'Jelenleg nincs egy felhasználandó tulajdonság sem az üzenet küldéséhez. Az üzenet a kiválasztott lista valamennyi tegjának fog menni.',
  'checked' => 'Bejelölt', # as for checkbox
  'unchecked' => 'Bejelöletlen', # as for checkbox
  'buggywithie' => 'Figyelmeztetés: Ez a funkció hibás, Internet Explorer esetén nem megbízható.\nJobban teszi, ha Mozilla, Firefox vagy Opera böngészőt használ.\nVálaszthatja a STACKED_ATTRIBUTE_SELECTION paraméter kikapcsolását is a konfigurációs fájlban', # Don't translate STACKED_ATTRIBUTE_SELECTION
  'matchallrules' => 'Az összes szabállyal megegyezik',
  'matchanyrules' => 'Bármelyik szabállyal megegyezik',
  'addcriterion' => 'Feltétel hozzáadása',
  'saveasdraft' => 'Az üzenet mentése piszkozatként',
  'savechanges' => 'Módosítások mentése',
  'selectattribute' => 'tulajdonság kiválasztása',
  'dd-mm-yyyy' => 'nn-hh-éééé', # it's essential that the format is the same (ie dd-mm-yyyy)

  # above is all from send_core

  'selectlists' => 'Válassza ki azokat a listákat, melyekre az üzenetet küldeni akarja',
  'alllists' => 'Minden lista',
  'listactive' => 'A lista aktív',
  'listnotactive' => 'A lista nem aktív',
  'selectexcludelist' => 'Válassza ki a kizárandó listákat.',
  'excludelistexplain' => 'Az üzenet azoknak a felhasználóknak fog menni, akik tagjai a fenti listáknak,
    hacsak nem tagjai az Ön által itt kiválasztott egyik listának.',
  'nolistsavailable' => 'Sajnos jelenleg nincsenek listák',
  'sendmessage' => 'Üzenet küldése a kiválasztott levelező listákra',
  'warnnopearhttprequest' => 'Ön egy távoli URL-cím küldésével próbálkozik, a PEAR::HTTP/Request azonban nem elérhető, úgyhogy ez nem fog sikerülni',
  #


  ### new in 2.9.5
  'Misc' => 'Egyebek',
  'email to alert when sending of this message starts' => 'értesítés e-mailben az üzenet küldésének megkezdésekor',
  'email to alert when sending of this message has finished' => 'értesítés e-mailben az üzenet küldésének befejezésekor',
  'separate multiple with a comma' => 'több elválasztása vesszővel',
  'operator' => 'műveleti jel',
  'values' => 'értékek',
  '%d users apply' => '%d felhasználóra érvényes',

  # new in 2.10.1
  'reload' => 'újratöltés',

  ## forgotten 
  'All Active Lists' => 'Az összes aktív lista',

);

?>
