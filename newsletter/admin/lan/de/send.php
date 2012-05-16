<?php

## notes to translators:
# do not translate anything in square brackets: eg [RSS]

$lan = array (
  'noaccess' => 'Diese Nachricht existiert nicht, oder Sie haben keine Zugriffsberechtigung.',
  'htmlusedwarning' =>
    'Warnung: Sie haben angegeben, dass der Inhalt kein HTML ist, aber er enth&auml;lt einige HTML-Tags. Dies kann zu Problemen f&uuml;hren.',
  'adding' => 'F&uuml;ge hinzu',
  'longmimetype' => 'Der MIME-Type ist l&auml;nger als 255 Zeichen. Dies kann zu Problemen f&uuml;hren.',
  'addingattachment' => 'Hinzugef&uuml;gtes Attachment ',
  'uploadfailed' => 'Die Datei konnte nicht erfolgreich hochgeladen werden: Die Datei ist leer.',
  'saved' => 'Nachricht gespeichert',
  'added' => 'Nachricht hinzuge&uuml;fgt',
  'queued' => 'Nachricht in die Warteschlange f&uuml;r den Versand eingef&uuml;gt',
  'processqueue' => 'Nachrichten-Warteschlange bearbeiten',
  'errorsubject' => 'Der Betreff (Subject) enth&auml;lt ung&uuml;ltige Zeichen.',
  'errorfrom' => 'Der Absender (From) enth&auml;lt ung&uuml;ltige Zeichen.',
  'enterfrom' => 'Bitte geben Sie einen Absender (From) ein.',
  'entermessage' => 'Bitte geben Sie einen Nachrichtentext (Body) ein.',
  'entersubject' => 'Bitte geben Sie einen Betreff (Subject) ein.',
  'duplicateattribute' => 'Fehler: Ein Attribut kann nur in einer einzigen Regel benutzt werden.',
  'selectlist' => 'Bitte w&auml;hlen Sie die Liste(n), an welche die Nachricht gesendet werden soll.',
  'notargetemail' => 'Es existieren keine Empf&auml;nger-Adressen f&uuml;r den Test.',
  'emailnotfound' => 'Die Empf&auml;ngeradresse f&uuml;r die Test-Nachricht wurde nicht gefunden.',
  'sentemailto' => 'Test-Nachricht verschickt an',
  'removedattachment' => 'Entferntes Attachment ',
  'existingcriteria' => 'Bestehende Kriterien',
  'remove' => 'Entfernen',
  'calculating' => 'Berechne',
  'calculate' => 'Berechnen',
  'content' => 'Inhalt',
  'format' => 'Format',
  'attach' => 'Anh&auml;nge',
  'scheduling' => 'Termine',
  'criteria' => 'Kriterien',
  'lists' => 'Listen',
  'unsavedchanges' => 'Warnung: Sie haben nicht gespeicherte &Auml;nderungen. Best&auml;tigen Sie mit [OK],\n um trotzdem fortzufahren, oder w&auml;hlen Sie [Abbrechen], wenn Sie Ihre\n&Auml;nderungen zuerst speichern m&ouml;chten.',
  'whatisprepare' => 'Was ist eine Vorlage?',
  'subject' => 'Betreff',
  'fromline' => 'Absender',
  'embargoeduntil' => 'Sperrfrist bis (Datum/Zeit)',
  'repeatevery' => 'Nachricht wiederholen',
  'norepetition' => 'keine Wiederholung',
  'hour' => 'st&uuml;ndlich',
  'day' => 't&auml;glich',
  'week' => 'w&ouml;chentlich',
  'repeatuntil' => 'Wiederholen bis',
  'format' => 'Format',
  'autodetect' => 'Auto Detect',
  'sendas' => 'Senden als',
  'html' => 'HTML',
  'text' => 'Text',
  'pdf' => 'PDF',
//  'textandhtml' => 'Text plus HTML (Multipart)',  //obsolete by bug 0009687
  'textandpdf' => 'Text und PDF',
  'usetemplate' => 'Template benutzen',
  'selectone' => 'W&auml;hlen Sie',
  'rssintro' => 'Falls Sie diese Nachricht als Template f&uuml;r den Versand von Meldungen aus RSS-Feeds benutzen wollen,
    w&auml;hlen Sie die H&auml;ufigkeit des Versands und verwenden Sie den Platzhalter [RSS] in Ihrer Nachricht um anzuzeigen, wo die Meldungen eingef&uuml;gt werden sollen.',
  'none' => 'Keine',
  'message' => 'Nachrichtentext',
  'expand' => 'Erweitern',
  'plaintextversion' => 'Text-Version der Nachricht',
  'messagefooter' => 'Fusszeile',
  'messagefooterexplanation1' => 'Mit <b>[UNSUBSCRIBE]</b> f&uuml;gen Sie einen personalisierten Abmelde-Link f&uuml;r jeden Abonnenten ein.',
  'messagefooterexplanation2' => 'Mit <b>[PREFERENCES]</b> f&uuml;gen Sie einen Link auf das pers&ouml;nliche Profil f&uuml;r jeden Abonnenten ein',
  'messagefooterexplanation3' => 'Use <b>[FORWARD]</b> to add a personalised URL to forward the message to someone else.',
  'addattachments' => 'Anh&auml;nge zur Nachricht hinzuf&uuml;gen',
  'uploadlimits' => 'F&uuml;r Ihren Server gelten folgende Limiten',
  'maxtotaldata' => 'Maximale Datenmenge (total)',
  'maxfileupload' => 'Maximale Dateigr&ouml;sse (pro Datei)',
  'currentattachments' => 'Aktuelle Attachments',
  'filename' => 'Dateiname',
  'desc' => 'Beschreibung',# short for description
  'size' => 'Gr&ouml;sse',
  'file' => 'Datei',
  'del' => 'L&ouml;schen', # short for delete
  'newattachment' => 'Neuer Anhang',
  'addandsave' => 'Hinzuf&uuml;gen (und speichern)',
  'pathtofile' => 'Pfad zur Datei auf dem Server',
  'attachmentdescription' => 'Beschreibung des Anhangs',
  'delchecked' => 'Markierte l&ouml;schen',
  'sendtestmessage' => 'Test-Nachricht senden',
  'toemailaddresses' => 'an',
  'sendtestexplain' => '(mehrere E-Mail-Adressen durch Kommata trennen; alle Adressen m&uuml;ssen Abonnenten sein)',
  'criteriaexplanation' => '
        <p><b>So definieren Sie die Auswahlkriterien f&uuml;r diese Nachricht:</b>
        <ol>
        <li>Um ein Kriterium zu benutzen, aktivieren Sie die Checkbox.
        <li>W&auml;hlen Sie dann per Radio-Button das Attribut, das Sie benutzen wollen.
        <li>Bestimmen Sie schliesslich den Wert, den dieses Attribut haben muss, damit die Nachricht an diesen Abonnenten gesendet wird.
        </ol>
        Hinweis: Nachrichten werden nur an Abonnenten verschickt, welche <b>beide</b> Kriterien erf&uuml;llen (Kriterium 1 UND Kriterium 2).
        ',
  'criterion' => 'Kriterium',
  'usethisone' => 'Kriterium benutzen',
  'or' => 'oder', # "alternative" ie this or this
  'is' => 'ist',
  'isnot' => 'ist nicht',
  'isbefore' => 'liegt vor', # date and time wise
  'isafter' => 'liegt nach', # date and time wise
  'nocriteria' =>
    'Derzeit existieren keine Attribute, welche als Auswahlkriterien f&uuml;r den Nachrichtenversand benutzt werden k&ouml;nnten.
  Die Nachricht wird an s&auml;mtliche Abonnenten der gew&auml;hlten Liste(n) gesendet.',
  'checked' => 'Angew&auml;hlt', # as for checkbox
  'unchecked' => 'Nicht angew&auml;hlt', # as for checkbox
  'buggywithie' => 'Achtung: Diese Funktion funktioniert nicht einwandfrei im Microsoft Internet Explorer.\nEs wird empfohlen, Mozilla, Firefox oder Opera als Browser zu benutzen.\nAls Alternative deaktivieren Sie STACKED_ATTRIBUTE_SELECTION in Ihrer Konfigurationsdatei.', # Don't translate STACKED_ATTRIBUTE_SELECTION
  'matchallrules' => 'Alle Regeln erf&uuml;llen',
  'matchanyrules' => 'Eine dieser Regeln erf&uuml;llen',
  'addcriterion' => 'Kriterium hinzuf&uuml;gen',
  'saveasdraft' => 'Nachricht als Entwurf speichern',
  'savechanges' => 'Speichern',
  'selectattribute' => 'Attribut w&auml;hlen',
  'dd-mm-yyyy' => 'dd-mm-yyyy', # it's essential that the format is the same (ie dd-mm-yyyy)

  # above is all from send_core

  'selectlists' => 'Listen, an deren Abonnenten die Nachricht gesendet wird',
  'alllists' => '<b>alle</b> Listen',
  'listactive' => 'aktive Liste',
  'listnotactive' => 'inaktive Liste',
  'selectexcludelist' => 'W&auml;hlen Sie die Listen, die ausgeschlossen werden sollen.',
  'excludelistexplain' => 'Die Nachricht wird an alle Abonnenten der obigen Listen gesendet, ausser wenn sie Abonnenten einer der hier gew&auml;hlten Listen sind.',
  'nolistsavailable' => 'Keine Listen vorhanden',
  'sendmessage' => 'Nachricht senden',
  'warnnopearhttprequest' => 'You are trying to send a remote URL, but PEAR::HTTP/Request is not available, so this will fail',
  #


  ### new in 2.9.5
  'Misc' => 'Diverses',
  'email to alert when sending of this message starts' =>
    'Benachrichtigung beim Beginn des Versands an E-Mail-Adresse(n)',
  'email to alert when sending of this message has finished' =>
    'Benachrichtigung nach Beendigung des Versands an E-Mail-Adresse(n)',
  'separate multiple with a comma' => '(mehrere Adressen durch Kommata trennen)',
  'operator' => 'Operator',
  'values' => 'Werte',
  '%d users apply' => '%d Abonnenten ausgew&auml;hlt',

);

?>
