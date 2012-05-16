<?php

$lan = array(

'The temporary directory for uploading (%s) is not writable, so import will fail' => 'Den midlertidige folder til uploads (%s) er ikke skrivbar, s&aring; import vil fejle',
'Invalid Email' => 'Ugyldig email',
'Import cleared' => 'Import ryddet',
'Continue' => 'Forts&aelig;t',
'Reset Import session' => 'Forny import session',
'File is either too large or does not exist.' => 'Filen er enten for stor eller findes ikke.',
'No file was specified. Maybe the file is too big? ' => 'Ingen fil specificeret. M&aring;ske er filen for stor? ',
'File too big, please split it up into smaller ones' => 'Fil for stor, venligst del den i mindre dele',
'Use of wrong characters in filename: ' => 'Brug af forkerte tegn i filnavn: ',
'Please choose whether to sign up immediately or to send a notification' => 'V&aelig;lg venligst om du vil tilmelde dig straks eller f&aring; sendt en besked',
'Cannot read %s. file is not readable !' => 'Kan ikke l&aelig;se %s. Filen er ikke l&aelig;sbar !',
'Something went wrong while uploading the file. Empty file received. Maybe the file is too big, or you have no permissions to read it.' => 'Noget gik galt under upload af filen. Tom fil modtaget. M&aring;ske er filen for stor, eller du har ikke tilladelse til at se den.',
'Reading emails from file ... ' => 'Indl&aelig;ser emails fra fil ... ',
'Error was around here &quot;%s&quot;' => 'Fejl opstod cirka her &quot;%s&quot;',
'Illegal character was %s' => 'Ugyldigt tegn var %s',
'A character has been found in the import which is not the delimiter indicated, but is likely to be confused for one. Please clean up your import file and try again' => 'Et tegn er blevet fundet i importen, som ikke er det angivne skilletegn, men det tolkes muligvis som et. Venligst korriger din import fil og fors&oslash;g s&aring; igen',
'ok, %d lines' => 'OK, %d linjer',
'Cannot find column with email, please make sure the column is called &quot;email&quot; and not eg e-mail' => 'Kan ikke finde kolonne med email, unders&oslash;g om kollonnen hedder &quot;email&quot; og ikke fx e-mail',
'Create new one' => 'Opret ny',
'Skip Column' => 'Hop kollonne over',
'Import Attributes' => 'Import attributter',
'Continue' => 'Forts&aelig;t',
'Please identify the target of the following unknown columns' => 'Venligst identificer m&aring;let for de efterf&oslash;lgende kollonner',
'Summary' => 'Opsummering',
'maps to' => 'mapper til',
'Create new Attribute' => 'Opret ny attribut',
'maps to' => 'mapper til',
'Skip Column' => 'Hop kollonne over',
'maps to' => 'mapper til',
'%d lines will be imported' => '%d linjer vil blive importeret',
'Confirm Import' => 'Bekr&aelig;ft import',
'Test Output' => 'Test visning',
'Record has no email' => 'Record har ingen email',
'Invalid Email' => 'Ugyldig email',
'clear value' => 'ryd v&aelig;rdi',
'New Attribute' => 'Ny attribut',
'Skip value' => 'Hop over v&aelig;rdi',
'duplicate' => 'dobbelt forekomst',
'Duplicate Email' => 'Dobbelt forekommende email',
' user imported as ' => ' bruger importeret som ',
'duplicate' => 'dobbelt forekomst',
'duplicate' => 'dobbelt forekomst',
'Duplicate Email' => 'Dobbelt forekommende email',
'All the emails already exist in the database and are member of the lists' => 'Alle emails findes allerede i databasen og er medlem af listerne',
'%s emails succesfully imported to the database and added to %d lists.' => '%s emails er blevet importeret i databasen og er blevet f&oslash;jet til %d listerne.',
'%d emails subscribed to the lists' => '%d emails tilmeldt til listerne',
'%s emails already existed in the database' => '%s emails findes allerede i databasen',
'%d Invalid Emails found.' => '%d Ugyldige emails fundet.',
'These records were added, but the email has been made up from ' => 'Disse records blev tilf&oslash;jet, men emailen kommer fra ',
'These records were deleted. Check your source and reimport the data. Duplicates will be identified.' => 'Disse records blev slettet. Tjek din kilde og importer data igen. Dobbelt forekomster vil blive identificeret.',
'User data was updated for %d users' => 'Bruger data blev opdateret for %d brugere',
'%d users were matched by foreign key, %d by email' => '%d brugere matchede fremmedn&oslash;glen, %d efter email',
'phplist Import Results' => 'phplist import resultat',
'Test output<br/>If the output looks ok, click %s to submit for real' => 'Test visning<br/>Hvis alt ser fint ud, s&aring; klik %s for at k&oslash;re for alvor',
'Confirm Import' => 'Bekr&aelig;ft import',
'Import some more emails' => 'Importer flere emails',
'Adding users to list' => 'Tilf&oslash;jer brugere til listen',
'Select the lists to add the emails to' => 'V&aelig;lg listerne hvor der skal tilf&oslash;jes emails',
'No lists available' => 'Ingen lister tilg&aelig;ngelige',
'Add a list' => 'Tilf&oslash;j liste',
'Select the groups to add the users to' => 'V&aelig;lg grupper som brugerne skal tilf&oslash;jes',
'automatically added' => 'automatisk tilf&oslash;jet',
 'importintro' => '<p class="information">Filen du uploader skal have records attributterne p&aring; den f&oslash;rste linje.
    Tjek at email kollonnen hedder "email" og ikke noget som "e-mail" eller
    "Email Address".
    Store eller sm&aring; bogstaver er underordnet.
    </p>
    Hvis du har en kollonne der hedder "Foreign Key" (fremmedn&oslash;gle), vil den blive anvendt til at synkronisere mellem en
    ekstern database og PHPlist databasen. Fremmedn&oslash;glen vil v&aelig;re overordnet n&aring;r der matches
    en eksisterende bruger. Det vil sl&oslash;ve import processen. Hvis du anvender dette, er det tilladt at have
    records uden email, men en "Ugyldig email" vil blive oprettet i stedet for. Du kan herefter s&oslash;ge
    efter "ugyldig email" for at finde disse records. Maksimum st&oslash;rrelse p&aring; en fremmedn&oslash;gle er 100.
    <br/><br/>
    <b>Advarsel</b>: filen skal v&aelig;re en ren tekstfil. Upload ikke bin&aelig;re filer, som fx et Word dokument.
    <br/>',
'uploadlimits' => 'F&oslash;lgende begr&aelig;nsninger er sat af din server:<br/>
Maksimum st&oslash;rrelse af total data sendt til server: <b>%s</b><br/>
Maksimum st&oslash;rrelse af hver enkelt fil: <b>%s</b>
<br/>PHPlist vil ikke behandle filer st&oslash;rre end 1Mb',
'testoutput_blurb' => 'Hvis du har valgt "Test visning", vil du se den parsede liste med emails p&aring; sk&aelig;rmen, og databasen vil ikke modtage informationerne. Det er brugbart til at finde ud af om filens format er korrekt eller ej. Der vil kun blive vist de f&oslash;rste 50 records.',
'warnings_blurb' => 'Hvis du v&aelig;lger "Vis advarsler", vil du f&aring; advarsler om ugyldige records. Advarsler vil kun blive vist hvis du v&aelig;lger "Test visning". De vil blive ignoreret under den rigtige import. ',
'omitinvalid_blurb' => 'Hvis du v&aelig;lger "Afvis ugyldig", vil ugyldige records ikke blive tilf&oslash;jet. Ugyldige records er records uden en email. Alle andre attributter vil blive tilf&oslash;jet automatisk, som fx hvis en records land ikke bliver fundet, s&aring; vil det blive tilf&oslash;jet til landelisten.',
'assigninvalid_blurb' => '"Tilf&oslash;j ugyldig" vil oprette en email til brugere med en ugyldig email adresse.
Du kan benytte v&aelig;rdier mellem [ og ] for at oprette en v&aelig;rdi til emailen. Fx hvis din import fil indeholder en kollonne "Fornavn" og en kaldet "Efternavn", s&aring; kan du bruge
"[fornavn] [efternavn]" til at konstruere en ny v&aelig;rdi til emailen til denne bruger indeholdende deres fornavn og efternavn.
V&aelig;rdien [nummer] kan benyttes til at inds&aelig;tte sequence nummeret for import.',
'overwriteexisting_blurb' => 'Hvis du v&aelig;lger "Overskriv eksisterende", vil information om en bruger i databasen blive erstattet med den importerede information. Brugere matches efter email eller fremmedn&oslash;gle.',
'retainold_blurb' => 'Hvis du v&aelig;lger "Bevar gammel bruger email", vil en konflikt over at de to emails er identiske bevare den gamle og tilf&oslash;je "dobbelt forekomst" til den nye. Hvis du ikke v&aelig;lger, vil den gamle f&aring; "dobbelt forekomst" og den nye vil have f&oslash;rsteret.',
'sendnotification_blurb' => 'Hvis du v&aelig;lger "send besked email" vil brugerne du tilf&oslash;jer f&aring; tilsendt en bekr&aelig;ftelse p&aring; tilmeldingen, som de skal besvare. Det kan anbefales, idet det vil afsl&oslash;re ugyldige emails.',
'phplist Import  Results' => 'phplist import resultater',
'File containing emails' => 'Fil indeholdende emails',
'Field Delimiter' => 'Felt skilletegn',
'(default is TAB)' => '(standard er TAB)',
'Record Delimiter' => 'Record skilletegn',
'(default is line break)' => '(standard er line linje)',
'Test output' => 'Test visning',
'Show Warnings' => 'Vis advarsler',
'Omit Invalid' => 'Afvis ugyldig',
'Assign Invalid' => 'Tilf&oslash;j ugyldig',
'Overwrite Existing' => 'Overskriv eksisterende',
'Retain Old User Email' => 'Bevar gammel bruger email',
'Send&nbsp;Notification&nbsp;email' => 'Send&nbsp;besked&nbsp;email',
'Make confirmed immediately' => 'G&oslash;r bekr&aelig;ftet straks',
'Import' => 'Importer',


);
?>