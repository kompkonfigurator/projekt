<?php
$lan = array(
  'File is either to large or does not exist.' => 'Bestand is ofwel te groot ofwel bestaat het niet.',
  'No file was specified.' => 'Geen bestand gespecifieerd.',
  'Some characters that are not valid have been found. These might be delimiters. Please check the file and select the right delimiter. Character found:' => 'Er zijn tekens gevonden die niet geldig zijn. Dit zouden afbakeningen kunnen zijn. Gelieve het bestand te controleren en de juiste afbakening te selecteren:',
  'Name cannot be empty' => 'Naam kan niet leeg zijn',
  'Name is not unique enough' => 'Naam is niet uniek',
  'Cannot find the email in the header' => 'Kan de email niet vinden in de header',
  'Cannot find the password in the header' => 'Kan het wachtwoord niet vinden in de header',
  'Cannot find the loginname in the header' => 'Kan de gebruikersnaam niet vinden in de header',
  'Record has no email' => 'Record heeft geen email',
  'Invalid Email' => 'Ongeldige Email',
  'Record has more values than header indicated, this may cause trouble' => 'Record heeft meer waarden dan de header aantoonde, dit kan problemen veroorzaken',
  'password' => 'wachtwoord',
  'loginname' => 'gebruikersnaam',
  'Empty loginname, using email:' => 'Lege gebruikersnaam, email gebruiken:',
  'Value' => 'Waarde',
  'added to attribute' => 'toegevoegd aan attribuut',
  'new email was' => 'nieuwe email was',
  'new emails were' => 'nieuwe emails waren',
  'email was' => 'email was',
  'emails were' => 'emails waren',
  'All the emails already exist in the database' => 'Alle emails bestaan al in de database',
  'succesfully imported to the database and added to the system.' => 'succesvol geimporteerd in de database en toegevoegd aan het systeem.',
  'Import some more emails' => 'Importeer nog enkele emails',
  'No default permissions have been defined, please create default permissions first, by creating one dummy admin and assigning the default permissions to this admin' => 'Geen standaard toegankelijkheden zijn toegewezen, maak deze aub eerst aan door een dummy admin aan te maken en standaard toegankelijkheden toe te wijzen aan deze admin',

  # do not translate email, loginname and password
  'importadmininfo' => '
  Het bestand dat je upload moet de administrators bevatten
die je aan het systeem wilt toevoegen. De kolommen moeten de volgende headers hebben: <b>email</b>, <b>loginname</b>, <b>password</b>. Alle andere kolommen zullen worden toegevoegd als admin attributen.
 <b>Opgelet</b>: het bestand mag ENKEL TEKST bevatten. Upload geen binaire bestanden zoals een Word Document.
  ',
  'File containing emails' => 'Bestand dat emails bevat',
  'Field Delimiter' => 'Veld Afbakening',
  'Record Delimiter' => 'Record Afbakening',
  'importadmintestinfo' => 'Als u "Test Uitvoer" aanvinkt, dan krijgt u een lijst met geparste emails op uw scherm, en de database zal niet worden gevuld met de data. Dit is nuttig om uit te zoeken of het formaat van je bestand correct is. Het zal enkel de eerste 50 records tonen.',
  # this should be the same as the term between quotes in the previous one
  'Test output' => 'Test uitvoer',
  'Check this box to create a list for each administrator, named after their loginname' => 'Vink deze box aan om een lijst te creeren voor elke administrator, genaamd naar hun gebruikersnaam',
  'Do Import' => 'Importeer nu',
  'default is TAB' => 'standaard is TAB',
  'default is line break' => 'standaard is "line break"',
  'testoutputinfo' => 'Test uitvoer:<br>Er zou 1 email per lijn moeten zijn.<br>Als de uitvoer er goed uit ziet, ga dan verder <a href="javascript:history.go(-1)">Terug</a> om voor echt voor te leggen<br><br>',
  'List for' => 'Lijst voor',
'login' => 'meld aan',


);
?>