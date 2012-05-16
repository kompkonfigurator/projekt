<?php
$lan = array(
  'File is either to large or does not exist.' => 'Filen er enten for stor eller findes ikke.',
  'No file was specified.' => 'Ingen fil blev specificeret.',
  'Some characters that are not valid have been found. These might be delimiters. Please check the file and select the right delimiter. Character found:' => 'Nogle ugyldige tegn blev fundet. Det kan v&aelig;re skilletegn. Tjek venligst filen og v&aelig;lg det rette skilletegn. Tegn fundet:',
  'Name cannot be empty' => 'Navn kan ikke v&aelig;re tomt',
  'Name is not unique enough' => 'Navn er ikke unikt nok',
  'Cannot find the email in the header' => 'Kan ikke finde email i header',
  'Cannot find the password in the header' => 'Kan ikke finde kodeord i header',
  'Cannot find the loginname in the header' => 'Kan ikke finde log ind navn i header',
  'Record has no email' => 'Record har ingen email',
  'Invalid Email' => 'Ugyldig email',
  'Record has more values than header indicated, this may cause trouble' => 'Record har flere v&aelig;rdier end headeren indikerer, det kan give problemer',
  'password' => 'kodeord',
  'loginname' => 'log ind navn',
  'Empty loginname, using email:' => 'Tomt log ind navn, benytter email:',
  'Value' => 'V&aelig;rdi',
  'added to attribute' => 'tilf&oslash;jet til attribut',
  'new email was' => 'ny email var',
  'new emails were' => 'nye emails var',
  'email was' => 'email var',
  'emails were' => 'emails var',
  'All the emails already exist in the database' => 'Alle emails findes allerede i databasen',
  'succesfully imported to the database and added to the system.' => 'blev importeret i databasen og tilf&oslash;jet til systemet.',
  'Import some more emails' => 'Importer flere emails',
  'No default permissions have been defined, please create default permissions first, by creating one dummy admin and assigning the default permissions to this admin' => 'Ingen standard tilladelser er blevet defineret, venligst opret standard tilladelser f&oslash;rst, ved at oprette en dummy admin og tilknyt standard tilladelserne til denne admin',
  
  # do not translate email, loginname and password
  'importadmininfo' => '
  Filen du uploader skal indeholde de administratorer
du vil tilf&oslash;je systemet. Kollonnerne skal have f&oslash;lgende headers: <b>email</b>, <b>loginname</b>, <b>password</b>. Alle andre kollonner vil blive tilf&oslash;jet som admin attributter.
 <b>Advarsel</b>: filen skal v&aelig;re en ren tekstfil. Upload ikke bin&aelig;re filer, som fx et Word dokument.
  ',
  'File containing emails' => 'Fil indeholdende emails',
  'Field Delimiter' => 'Felt skilletegn',
  'Record Delimiter' => 'Record skilletegn',
  'importadmintestinfo' => 'Hvis du v&aelig;lger "Test visning", vil listen med emails blive parset til sk&aelig;rmen, og databasen vil ikke modtage disse informationer. Det kan bruges til at finde ud af om filens format er korrekt eller ej. Der vises kun de f&oslash;rste 50 records.',
  # this should be the same as the term between quotes in the previous one
  'Test output' => 'Test visning',
  'Check this box to create a list for each administrator, named after their loginname' => 'V&aelig;lg denne boks for at oprette en liste til hver administrator, opkaldt efter deres log ind navn',
  'Do Import' => 'Udf&oslash;r import',
  'default is TAB' => 'standard er TAB',
  'default is line break' => 'standard er ny linje',
  'testoutputinfo' => 'Test visning:<br/>Der b&oslash;r kun v&aelig;re EN email per linje.<br/>Hvis det ser fint ud, s&aring; g&aring; <a href="javascript:history.go(-1)">Tilbage</a> for at sende for alvor<br/><br/>',  
  'List for' => 'Liste for',
'login' => 'log ind',
  
  
);
?>