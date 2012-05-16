<?php

$lan = array(

'The temporary directory for uploading (%s) is not writable, so import will fail' => 'De tijdelijke map voor het uploaden (%s) is niet beschrijfbaar, dus importeren zal niet lukken',
'Invalid Email' => 'Ongeldige Email',
'Import cleared' => 'Importatie gewist',
'Continue' => 'Ga verder',
'Reset Import session' => 'Reset Importatie sessie',
'File is either too large or does not exist.' => 'Het bestand is ofwel te groot ofwel bestaat het niet.',
'No file was specified. Maybe the file is too big? ' => 'Geen bestand werd gespecifieerd. Misschien is het bestand te groot? ',
'File too big, please split it up into smaller ones' => 'Bestand is te groot, Splits dit aub op in verschillende bestanden',
'Use of wrong characters in filename: ' => 'Gebruik van verkeerde tekens in bestandsnaam: ',
'Please choose whether to sign up immediately or to send a notification' => 'Kies aub om onmiddellijk in te schrijven of om een bevestiging te versturen',
'Cannot read %s. file is not readable !' => 'Kan het bestand %s niet lezen. Het is niet leesbaar !',
'Something went wrong while uploading the file. Empty file received. Maybe the file is too big, or you have no permissions to read it.' => 'Er liep iets fout bij het uploaden van het bestand. Leeg bestand ontvangen. Misschien is het bestand te groot, of je hebt geen rechten om het bestand te lezen.',
'Reading emails from file ... ' => 'Emails van bestand lezen... ',
'Error was around here &quot;%s&quot;' => 'De fout zat ongeveer hier &quot;%s&quot;',
'Illegal character was %s' => 'Verkeerde teken was %s',
'A character has been found in the import which is not the delimiter indicated, but is likely to be confused for one. Please clean up your import file and try again' => 'Er zijn tekens gevonden die niet geldig zijn. Dit zouden afbakeningen kunnen zijn. Gelieve het bestand te controleren en de juiste afbakening te selecteren.',
'ok, %d lines' => 'ok, %d lines',
'Cannot find column with email, please make sure the column is called &quot;email&quot; and not eg e-mail' => 'Kan de kolom met email niet vinden, zorg er aub voor dat deze kolom de volgende naam heeft &quot;email&quot; en niet b.v. e-mail',
'Create new one' => 'Maak een nieuwe aan',
'Skip Column' => 'Sla kolom over',
'Import Attributes' => 'Importeer Attributen',
'Continue' => 'Ga verder',
'Please identify the target of the following unknown columns' => 'Identificeer aub het doel van de volgende onbekende kolommen',
'Summary' => 'Samenvatting',
'maps to' => 'mapt naar',
'Create new Attribute' => 'Maak nieuw Attribuut',
'maps to' => 'mapt naar',
'Skip Column' => 'Sla kolom over',
'maps to' => 'mapt naar',
'%d lines will be imported' => '%d lijnen zullen worden geimporteerd',
'Confirm Import' => 'Bevestig Importatie',
'Test Output' => 'Test Uitvoer',
'Record has no email' => 'Record heeft geen email',
'Invalid Email' => 'Ongeldige Email',
'clear value' => 'wis waarde',
'New Attribute' => 'Nieuw Attribuut',
'Skip value' => 'Sla waarde over',
'duplicate' => 'Duplicaat',
'Duplicate Email' => 'Duplicaat Email',
' user imported as ' => ' gebruiker geimporteerd als ',
'duplicate' => 'Duplicaat',
'duplicate' => 'Duplicaat',
'Duplicate Email' => 'Duplicaat Email',
'All the emails already exist in the database and are member of the lists' => 'Alle emails bestonden reeds in de database en waren lid van de lijsten.',
'%s emails succesfully imported to the database and added to %d lists.' => '%s emails succesvol geimporteerd in de database en toegevoegd aan %d lijst.',
'%d emails subscribed to the lists' => '%d emails ingeschreven bij de lijst',
'%s emails already existed in the database' => '%s emails bestonden reeds in de database',
'%d Invalid Emails found.' => '%d Ongeldige Emails Gevonden.',
'These records were added, but the email has been made up from ' => 'Deze rapporten zijn toegevoegd, maar de email is opgemaakt van ',
'These records were deleted. Check your source and reimport the data. Duplicates will be identified.' => 'Deze rapporten zijn verwijdert. Controleer de bron en importeer de data opnieuw. Duplicaten worden gemeld.',
'User data was updated for %d users' => 'Gebruikers data is geupdate voor %d gebruikers',
'%d users were matched by foreign key, %d by email' => '%d de gebruikers werden aangepast door Foreign Key, %d door email',
'phplist Import Results' => 'phplist Importeer Resultaten',
'Test output<br/>If the output looks ok, click %s to submit for real' => 'Test uitvoer<br/>Als de uitvoer er goed uitziet, klik %s om voor echt voor te leggen',
'Confirm Import' => 'Bevestig Importatie',
'Import some more emails' => 'Importeer nog meer emails',
'Adding users to list' => 'Gebruikers toevoegen aan lijst',
'Select the lists to add the emails to' => 'Selecteer de lijsten waar de emails in moeten komen',
'No lists available' => 'Geen lijsten beschikbaar',
'Add a list' => 'Voeg een nieuwe lijst toe',
'Select the groups to add the users to' => 'Selecteer de groepen waarin de gebruikers moeten komen',
'automatically added' => 'automatisch toegevoegd',
 'importintro' => '<p>De eerste lijn van het bestand moet bestaan uit de namen van de attributen.
    Zorg er ook voor dat de email kolom exact de naam "email" heeft (dus niet "e-mail" of "Email Address").
    </p>
    Als je een kolom hebt genaamd "Foreign Key", dit zal worden gebruikt voor de synchronisatie tussen
    een externe database en de PHPlist database. De Foreign Key is belangrijk bij overeenkomende gebruikers.
    Dit zal het importatieprocess vertragen. Als je dit gebruikt, dan is het toegelaten om records zonder email te gebruiken,
    maar een "Ongeldige Email" zal in de plaats worden aangemaakt. Daarna kan u zoeken op "ongeldige email"
    om deze velden te vinden. Maximum lengte van een Foreign Key is 100.
    <br/><br/>
    <b>Opgelet</b>: Het bestand mag ENKEL TEKST bevatten. Upload geen binaire bestanden zoals een Word Document.
    <br/>',
'uploadlimits' => 'De volgende limieten zijn ingesteld door jou server:<br/>
Maximum grootte van totale data verzonden naar de server: <b>%s</b><br/>
Maximum grootte van elk individueel bestand: <b>%s</b>
<br/>PHPlist zal geen bestanden groter dan 1Mb verwerken',
'testoutput_blurb' => 'Als u "Test Uitvoer" aanvinkt, dan krijgt u een lijst met geparste emails op uw scherm, en de database zal niet worden gevuld met de data. Dit is nuttig om uit te zoeken of het formaat van je bestand correct is. Het zal enkel de eerste 50 records tonen.',
'warnings_blurb' => 'Als u "Toon Waarschuwingen" aanvinkt, dan krijgt u waarschuwingen voor ongeldige records. Waarschuwingen zullen enkel worden getoond als "Test Output" is aangevinkt. Ze zullen worden genegeerd als je echt aan het importeren bent. ',
'omitinvalid_blurb' => 'Als u "Laat Ongeldig Weg" aanvinkt, dan zullen ongeldige records niet worden toegevoegd. Ongeldige records zijn records zonder email. Alle andere attribute zullen automatisch worden toegevoegd, bv als het land van een record niet is gevonden, dan zal het worden toegevoegd aan de lijst met landen.',
'assigninvalid_blurb' => 'Wijs Ongeldig Toe zal worden gebruikt om een email te creeren voor gebruikers met een ongeldig email adres.
Je kan waarden gebruiken tussen [ en ] om een waarde op te maken voor de email. Bijvoorbeeld als je een bestand importeerd dat een kolom bevat "Voornaam" en een die "Achternaam" bevat, dan kan je gebruik maken van
"[voornaam] [achternaam]" om een nieuwe waarde voor een email op te bouwen voor deze gebruiker die dan zijn voor- en achternaam bevat.
De waarde [number] kan worden gebruikt om can be used om het opeenvolgingsaantal op te nemen voor het importeren.',
'overwriteexisting_blurb' => 'Als je "Overschrijf Bestaand" aanvinkt, dan zal info over een gebruiker in de database worden vervangen door de geimporteerde info. Gebruikers komen overeen door email of foreign key.',
'retainold_blurb' => 'Als je "Behoud Oude Gebruiker Email" aanvinkt, dan zal een conflict tussen twee emails die hetzelfde zijn de oude worden bewaard en "duplicaat" toevoegen aan de nieuwe. Als je dit niet aanvinkt, dan zal de oude "duplicaat" krijgen en de nieuwe zal voorrang krijgen.',
'sendnotification_blurb' => 'Als je "verzend notificatie email" dan zullen de gebruikers die je toevoegd een verzoek ter bevestiging ontvangen waarop ze zullen moeten antwoorden. Dit is aangeraden omdat het ongeldige emails identificeerd.',
'phplist Import  Results' => 'phplist Importatie  Resultaten',
'File containing emails' => 'Bestand dat emails bevat',
'Field Delimiter' => 'Veld Afbakening',
'(default is TAB)' => '(standaard is TAB)',
'Record Delimiter' => 'Record Afbakening',
'(default is line break)' => '(standaard is "line break")',
'Test output' => 'Test uitvoer',
'Show Warnings' => 'Toon Waarschuwingen',
'Omit Invalid' => 'Laat Ongeldig Weg',
'Assign Invalid' => 'Wijs Ongeldig Toe',
'Overwrite Existing' => 'Overschrijf Bestaand',
'Retain Old User Email' => 'Behoud Oude Gebruiker Email',
'Send&nbsp;Notification&nbsp;email' => 'Verzend&nbsp;Notificatie&nbsp;email',
'Make confirmed immediately' => 'Bevestig Onmiddellijk',
'Import' => 'Importeer',


);
?>
