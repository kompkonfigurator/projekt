<?php
$lan = array(
  'File is either to large or does not exist.' => 'Il file &egrave; troppo grande o non esiste.',
  'No file was specified.' => 'Non &egrave; stato specificato alcun file.',
  'Some characters that are not valid have been found. These might be delimiters. Please check the file and select the right delimiter. Character found:' => 'Sono stati trovati alcuni caratteri non validi. Potrebbero essere delimitatori. Per favore controlla il file e seleziona il delimitatore corretto. Carattere trovato:',
  'Name cannot be empty' => 'Il nome non pu&ograve; essere eliminato',
  'Name is not unique enough' => 'Il nome non &egrave; abbastanza univoco',
  'Cannot find the email in the header' => 'Impossibile trovare l\'email nell\'intestazione',
  'Cannot find the password in the header' => 'Impossibile trovare la password nell\'intestazione',
  'Cannot find the loginname in the header' => 'Impossibile trovare il nome di login nell\'intestazione',
  'Record has no email' => 'Il record non contiene l\'email',
  'Invalid Email' => 'Email non valida',
  'Record has more values than header indicated, this may cause trouble' => 'Il record ha pi&ugrave; valori di quelli indicati dall\'header, questo potrebbe causare problemi',
  'password' => 'password',
  'loginname' => 'nome di login',
  'Empty loginname, using email:' => 'Svuotando nome di login, utilizzando l\'email:',
  'Value' => 'Valore',
  'added to attribute' => 'aggiunto all\'attributo',
  'new email was' => 'la nuova email era',
  'new emails were' => 'le nuove email erano',
  'email was' => 'l\'email era',
  'emails were' => 'le email erano',
  'All the emails already exist in the database' => 'Tutte le email sono gi&agrave; presenti nel database',
  'succesfully imported to the database and added to the system.' => 'importato con successo nel database e aggiunto al sistema.',
  'Import some more emails' => 'Importa pi&ugrave; email',
  'No default permissions have been defined, please create default permissions first, by creating one dummy admin and assigning the default permissions to this admin' => 'Non &egrave; stato impostato nessun permesso predefinito, per favore crea prima premessi predefiniti, generando un amministratore fittizio e assegnando a esso i permessi predefiniti',
  
  # do not translate email, loginname and password
  'importadmininfo' => '
  Il file che sta importando deve contenere gli amministratori che vuoi aggiungere al sistema. Le colonne devono avere le seguenti intestazioni: <b>email</b>, <b>nome di login</b>, <b>password</b>. Tutte le altre colonne saranno aggiunte come info degli amministratori.
 <b>Attenzione</b>: il file deve essere in formato testo semplice. Non importare files binary come documenti Word.
  ',
  'File containing emails' => 'File contenenti email',
  'Field Delimiter' => 'Delimitatore campo',
  'Record Delimiter' => 'Delimitatore record',
  'importadmintestinfo' => 'Se imposti "Test Output", visualizzerai sullo schermo la lista delle email analizzate, e il database non sar&agrave; riempito con queste informazioni. ci&ograve; &egrave; utile per scoprire se il formato del tuo file &egrave; corretto. Saranno mostrati solo i primi 50 record.',
  # this should be the same as the term between quotes in the previous one
  'Test output' => 'Test output',
  'Check this box to create a list for each administrator, named after their loginname' => 'Spunta questo box per creare una lista per ogni amministratore, nominata dopo il suo nome di login',
  'Do Import' => 'Importa',
  'default is TAB' => 'il predefinito &egrave; TAB',
  'default is line break' => 'il predefinito &egrave; l\' a capo (line break)',
  'testoutputinfo' => 'Test output:<br/>Deve esserci soltanto UNA email per riga.<br/>Se l\'output &egrave; corretto, procedi <a href="javascript:history.go(-1)">Back</a> da reimportare<br/><br/>',  
  'List for' => 'Lista per',
'login' => 'login',
  
  
);
?>
