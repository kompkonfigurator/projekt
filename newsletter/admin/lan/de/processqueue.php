<?php

// don't HTML encode special characters

$lan = array(
'Running in testmode, no emails will be sent. Check your config file.' =>
	'Test-Modus. Es werden keine E-Mails versendet. �berpr�fen Sie die Konfigurationsdatei.',
'The following restrictions have been set by your ISP:' =>
	'Der Betreiber Ihres Servers hat folgende Beschr�nkungen gesetzt:',
'Script stage' => 'Skript-Stufe',
'Finished, Nothing to do' => 'Keine anstehenden Aufgaben gefunden',
'messages sent in' => 'Nachrichten versandt in',
'seconds' => 'Sekunden',
'invalid emails' => 'ung�ltige E-Mails',
'emails failed (will retry later)' => 'E-Mails, die nicht versendet werden konnten (Versuch wird sp�ter wiederholt)',
'emails unconfirmed (not sent)' => 'nicht best�tigte E-Mails (nicht versendet)',
'Warning: script never reached stage 5' => 'Warnung: Das Skript hat die Stufe 5 nicht erreicht',
'This may be caused by a too slow or too busy server' => 'Der Grund k�nnte ein zu langsamer oder �berlasteter Server sein.',


'In safe mode, batches are set to a maximum of 100' => 'Im Sicherheits-Modus werden Batch-Aufgaben auf maximal 100 gesetzt.',
'Running in safe mode' => 'Sicherheits-Modus',
'msgs/hr' => 'Nachrichten/Std.',
'Reload required' => 'Reload erforderlich',
'Finished, All done' => 'Verarbeitung abgeschlossen',
'Script finished, but not all messages have been sent yet.' =>
	'Das Skript wurde abgeschlossen, es wurden aber noch nicht alle Mails versendet.',
'Finished this run' => 'Ausf�hrung beendet',
'(test)' => '(Test)',
'Would have sent' => 'H�tte versendet',
'(test)' => '(Test)',
'Would have sent' => 'H�tte versendet',
'Started' => 'Verarbeitung gestartet',
'Processing has been suspended by your ISP, please try again later' =>
	'Der Betreiber Ihres Servers hat die Verarbeitung unterbrochen. Bitte versuchen Sie es sp�ter nochmals.',
'Sending in batches of' => 'Versand in Batches von',
'emails' => 'E-Mails',
'This batch will be' => 'Dieser Batch enth�lt',
'emails, because in the last' => 'E-Mails, weil im vorangehenden',
'emails were sent' => 'E-Mails versendet wurden.',
'Sending in batches of' => 'Versand in Batches von',
'emails' => 'E-Mails',
'In the last' => 'W�hrend der letzten',
'seconds more emails were sent' => 'Sekunden wurden mehre E-Mails versendet',
'than is currently allowed per batch' => 'als derzeit pro Batch erlaubt sind.',
'Sent in last run' => 'Im letzten Durchgang versendet',
'Skipped in last run' => 'Im letzten Durchgang �bersprungen',
'Processing has started,' => 'Anzahl pendente Nachrichten:',
'message(s) to process.' => '',
'It is safe to click your stop button now, report will be sent by email to' =>
	'Sie k�nnen nun problemlos den Stop-Button anklicken. Der Bericht wird per E-Mail an folgende Adresse verschickt:',
'Your webserver is running in safe_mode. Please keep this window open.
	It may reload several times to make sure all messages are sent.' =>
	'Ihr Web-Server wird im "safe_mode" betrieben. Bitte schliessen Sie dieses Fenster nicht.
	Es wird m�glicherweise mehrere Male neu geladen, um sicherzustellen, dass alle Nachrichten versendet wurden.',
'Reports will be sent by email to' => 'Berichte werden per E-Mail an folgende Adresse verschickt:',
'Processing message' => 'Verarbeite Nachricht',
'Message' => 'Nachricht',
'is an RSS feed for' => 'ist ein RSS-Feed f&uuml;r',
'Looking for users' => 'Suche Empf�nger',
'users apply for attributes, now checking lists' => 'users apply for attributes, now checking lists',
'No users apply for attributes' => 'No users apply for attributes',
'looking for users who can be excluded from this mailing' => '�berpr�fe auf Empf�nger die von der Verarbeitung ausgeschlossen werden k�nnen',
'Process Killed by other process' => 'Prozess wurde durch einen anderen Prozess abgebrochen',
'Found them' => 'Gefunden',
'to process' => 'Empf�nger',
'No users to process for this batch' => 'Keine Empf�nger f�r diesen Batch',
'batch limit reached' => 'Batch-Limit wurde erreicht',
'Process Killed by other process' => 'Prozess wurde durch einen anderen Prozess abgebrochen',
'Message I was working on has disappeared' => 'Die zu verarbeitende Nachricht ist verschwunden',
'Sending' => 'Sende',
'It took' => 'Es dauerte',
'seconds to send' => 'Sekunden um zu senden',
'Failed sending to' => 'Versand fehlgeschlagen an',
'Unconfirmed user' => 'Unbest�tigter Empf�nger',
'Not sending to' => 'Kein Versand an',
'already sent' => 'bereits versendet',
'Processed' => 'Verarbeitet:',
'out of' => 'von',
'Hmmm, No users found to send to' => 'Keine Empf�nger gefunden',
'It took' => 'Versand dauerte',
'to send this message' => '',
'waiting for' => 'warte auf',
'to make sure we don\'t exceed our limit of' => 'um sicherzustellen, dass die folgende Limite nicht �berschritten wird:',
'messages in' => 'Nachrichten in',

### new in 2.9.5
'Message Sending has started' => 'Versand gestartet',
'phplist has started sending the message with subject %s' => 'Versand der Nachricht mit Betreff %s gestartet',
'to view the progress of this message, go to %s' => 'Um den Stand des Versands zu sehen gehen Sie zu %s',
'There have been more than 10 attempts to send to %s that have been blocked for domain throttling.' =>
	'Mehr als 10 Sendeversuche an %s wurden blockiert wegen Domain-Beschr�nkung (Domain Throttling)',
'Introducing extra delay to decrease throttle failures' =>
	'Benutze zus�tzliche Verz�gerung um Fehlschl�ge wegen Domain-Beschr�nkung (Domain Throttling) zu reduzieren.',
'%s is currently over throttle limit of %d per %d seconds' =>
	'%s ist derzeit �ber dem Throttle-Limit von %d pro %d Sekunden',
'not sending to ' => 'kein Versand an ',
'Message Sending has finished' => 'Versand abgeschlossen',
'phplist has finished sending the message with subject %s' => 'Versand der Nachricht mit Betreff %s abgeschlossen',

'Sending of this message has been suspended' => 'Versand dieser Nachricht wurde aufgeschoben',

);

?>