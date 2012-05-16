<?php

$lan = array(

'The temporary directory for uploading (%s) is not writable, so import will fail' => 'La directory temporanea per gli upload (%s) non &egrave; scrivibile, quindi l\'importazione fallir&agrave;',
'Invalid Email' => 'Email non valida',
'Import cleared' => 'Importazione approvata',
'Continue' => 'Continua',
'Reset Import session' => 'Resetta la sessione di importazione',
'File is either too large or does not exist.' => 'Il file &egrave; troppo grande o non esiste.',
'No file was specified. Maybe the file is too big? ' => 'Nessun file &egrave; stato specificato, &egrave; possibile che sia troppo grande?',
'File too big, please split it up into smaller ones' => 'File troppo grande, dividilo in parti pi&ugrave; piccole',
'Use of wrong characters in filename: ' => 'Uso di caratteri errati nel nome del file: ',
'Please choose whether to sign up immediately or to send a notification' => 'Si prega di scegliere la conferma immediata o l\'invio di una notifica',
'Cannot read %s. file is not readable !' => 'Impossibile leggere %s. il file non &egrave; leggibile!',
'Something went wrong while uploading the file. Empty file received. Maybe the file is too big, or you have no permissions to read it.' => 'Qualcosa &egrave; andato storto durante il caricamento del file. Ricevuto un file vuoto. Pu&ograve; essere che l\'archivio sia troppo grande, o non hai il permesso di lettura.',
'Reading emails from file ... ' => 'Lettura di email da file... ',
'Error was around here &quot;%s&quot;' => 'Errore trovato qui &quot;%s&quot;',
'Illegal character was %s' => 'Il carattere non valido &egrave; %s',
'A character has been found in the import which is not the delimiter indicated, but is likely to be confused for one. Please clean up your import file and try again' => '&Egrave; stato trovato un carattere nell\'importazione che non &egrave; il delimitatore, ma pu&ograve; essere confuso con uno di questi. Si prega di ripulire il file di importazione e riprovare',
'ok, %d lines' => 'ok, %d righe',
'Cannot find column with email, please make sure the column is called &quot;email&quot; and not eg e-mail' => 'non trovata una colonna con l\'email, si prega di controllare che la colonna sia intitolata &quot;email&quot; e non per esempio e-mail',
'Create new one' => 'Crea un nuovo',
'Skip Column' => 'Salta colonna',
'Import Attributes' => 'Importa Attributi',
'Continue' => 'Continua',
'Please identify the target of the following unknown columns' => 'Si prega di identificare l\'obbiettivo per le seguenti colonne sconosciute',
'Summary' => 'Sommario',
'maps to' => 'Pianifica',
'Create new Attribute' => 'Crea un nuovo Attributo',
'maps to' => 'Pianifica',
'Skip Column' => 'Salta colonna',
'maps to' => 'Pianifica',
'%d lines will be imported' => '%d righe saranno importate',
'Confirm Import' => 'Conferma importazione',
'Test Output' => 'Test Output',
'Record has no email' => 'Il record non ha email',
'Invalid Email' => 'Email non valida',
'clear value' => 'azzera valore',
'New Attribute' => 'Nuovo Attributo',
'Skip value' => 'Salta valore',
'duplicate' => 'duplica',
'Duplicate Email' => 'Duplica Email',
' user imported as ' => 'utente importato come',
'duplicate' => 'duplica',
'duplicate' => 'duplica',
'Duplicate Email' => 'Duplica Email',
'All the emails already exist in the database and are member of the lists' => 'Tutte le email esistono gi&agrave; nel database e appartengono a delle liste',
'%s emails succesfully imported to the database and added to %d lists.' => '%s email importate con successo nel database e aggiunte a %d liste.',
'%d emails subscribed to the lists' => '%d email iscritte alle liste',
'%s emails already existed in the database' => '%s email esistono gi&agrave; nel database',
'%d Invalid Emails found.' => 'trovate %d email non valide.',
'These records were added, but the email has been made up from ' => 'Questi records sono stati aggiunti, ma le email sono state create da',
'These records were deleted. Check your source and reimport the data. Duplicates will be identified.' => 'Questi records sono stati eliminati. Controlla la tua sorgente e importa nuovamente i dati. I duplicati saranno identificati.',
'User data was updated for %d users' => 'I dati utente sono stati aggiornati per %d utenti',
'%d users were matched by foreign key, %d by email' => '%d utenti sono stati assegnati per chiave esterna, %d per email',
'phplist Import Results' => 'phplist risultati dell\'importazione',
'Test output<br/>If the output looks ok, click %s to submit for real' => 'Test output<br/>se l\'output sembra a posto, clicca "invia"',
'Confirm Import' => 'Conferma Importazione',
'Import some more emails' => 'Importa altre email',
'Adding users to list' => 'Aggiungo utenti alla lista',
'Select the lists to add the emails to' => 'Seleziona le liste a cui aggiungere le email',
'No lists available' => 'Nessuna lista disponibile',
'Add a list' => 'Aggiungi una lista',
'Select the groups to add the users to' => 'Seleziona i gruppi a cui aggiungere gli utenti',
'automatically added' => 'aggiunto automaticamente',
 'importintro' => '<p class="information">Il file caricato dovr&agrave; avere gli attributo dei records nella  prima riga.
    Assicurati che la colonna email sia chiamata "email" e non in altri modi come "e-mail" 
    "Indirizzi Email".
    La presenza di maiuscole non &egrave; importante.
    </p>
    Se hai una colonna chiamata "Chiave Esterna", questa verr&agrave; probabilmente  usata per la sincronizzazione tra un database esterno e il database di PHPlist. La Chiave Esterna avr&agrave; la precendenza nell\'associazione con un utente esistente. Questo rallenter&agrave; il processo di importazione Se userai questa impostazione sarano concessi records senza email, ma verr&agrave; creato un record "Email non valida". A questo punto sar&agrave; possibile trovare questi record cercando "email non valida". La dimensione massima per una Chiave Esterna &egrave; 100.
    <br/><br/>
    <b>Attenzione</b>:il file deve essere di solo testo. Non caricate file binary come un documento Word.
    <br/>',
'uploadlimits' => 'I seguenti limiti sono posti dal tuo server:<br/>
dati totali inviabili al server: <b>%s</b><br/>
dimensione massima di ogni singolo file: <b>%s</b>
<br/>PHPlist non processer&agrave; file pi&ugrave; grandi di %dMb',
'testoutput_blurb' => 'Se scegli "Test Output", otterai una lista a video delle email analizzate e il database non sar&agrave; riempito con nessuna informazione. Questo &egrave; utile per scopire se il formato del vostro archivio &egrave; corretto. Saranno visualizzati solo i primi 50 records.',
'warnings_blurb' => 'Se scegli "Visualizza avvisi", verrai avvisato se i records non sono validi. Le avvertenze verranno visualizzate solo se avrete scelto anche "Test output". Verranno ignorate quando si esegue l\'importazione.',
'omitinvalid_blurb' => 'se scegli "Ometti non validi", i records non validi non saranno aggiunti. I records non validi sono record senza un\'email. Ogni altro attributo sar&agrave; aggiunto automaticamente.',
'assigninvalid_blurb' => 'Assegna Non Valido sar&agrave; usato per creare un\'email per utenti con un indirizzo email non valido.
Puoi usare valori inserite tra parentesi [ e ] per creare un valore per l\'email. Ad esempio se il file importato contiene una colonna "Nome" e una chiamata "Cognome", potrai usare "[nome] [cognome] per creare un nuovo valore per le email di questo utente contenenti quel nome e cognome.
Il valore [numero] pu&ograve; essere usato per inserire sequenze di numeri per l\'importazione.',
'overwriteexisting_blurb' => 'Se scegli "Sovrascrivi Esistenti" l\'informazione sull\'utente nel database sar&agrave; sostituita da quella importata. Gli utenti sono assegnati via Chiave Esterna o email',
'retainold_blurb' => 'Se scegli "Mantieni la vecchia mail dell\'utente", nel caso di conflitto tra due mail uguali quella vecchia verr&agrave; segnalata come "duplicato" e quella nuova guadagner&agrave; la precedenza',
'sendnotification_blurb' => 'Se scegli "Invia email di notifica" agli utenti che stai aggiungendo verr&agrave; inviata una richiesta di conferma dell\'iscrizione a cui dovranno rispondere. Questa opzione &egrave; consigliata, in quanto permette di identificare le email non valide.',
'phplist Import  Results' => 'phplist Importa Risultati',
'File containing emails' => 'File contenente email',
'Field Delimiter' => 'Delimitatore di campo',
'(default is TAB)' => '(predefinito &egrave; TAB)',
'Record Delimiter' => 'delimitatore del record',
'(default is line break)' => '(default &egrave; line break)',
'Test output' => 'Test output',
'Show Warnings' => 'Mostra Avvisi',
'Omit Invalid' => 'Ometti non validi',
'Assign Invalid' => 'Assigna non validi',
'Overwrite Existing' => 'Sovrascrivi esistenti',
'Retain Old User Email' => 'Conserva le vechie email degli utenti',
'Send&nbsp;Notification&nbsp;email' => 'Invia&nbsp;Notifiche&nbsp;via email',
'Make confirmed immediately' => 'Conferma immediatamente',
'Import' => 'Importa',


);
?>
