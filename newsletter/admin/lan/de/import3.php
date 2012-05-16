<?php
$lan = array(
  "Import emails from IMAP folders"
  	=> "Bei dieser Importmethode werden Mails in IMAP-Konten nach E-Mail-Adressen durchsucht
	und die gefundenen Adressdaten in die PHPlist-Datenbank importiert.
	Nebst der E-Mail-Adresse wird nur der Name der Person als Attribut gespeichert.",
  "No lists available" => "Keine Listen verf&uuml;gbar",
  "Add a list" => "Neue Liste",
  "personal" => "personal",
  "email" => "E-Mail-Adresse",
  "folder" => "Verzeichnis",
  "date" => "Datum",
  "can't connect" => "Verbindung fehlgeschlagen",
  "Processing" => "Verarbeitung",
  "messages" => "Mitteilungen",
  "done" => "Erledigt",
  "imap_getmailboxes failed" => "imap_getmailboxes fehlgeschlagen",
  "Please enter details of the IMAP account" => "<b>Angaben zum IMAP-Konto</b>",
  "Select the headers fields to search" => "<br /><b>Felder im Mail-Header, die durchsucht werden sollen</b>",
  "Select the lists to add the emails to" => "<br /><b>Listen, zu denen die E-Mail-Adressen hinzugef&uuml;gt werden sollen</b>",
  "Adding users to list" => "Benutzer werden zur Liste hinzugef&uuml;gt",
  "Mark new users as HTML" => "Neue Benutzer als HTML markieren",
/* read lines below as sentences: if you check 'overwrite' information about a user... etc. */
  "If you check" => "W&auml;hlen Sie",
  "Overwrite Existing" => "Bestehende &uuml;berschreiben",
  "information about a user in the database will be replaced by the imported information. Users are matched by email." =>
  	"um die Daten eines Abonnenten, der in der Datenbank bereits existiert, mit den importierten Daten zu &uuml;berschreiben.
  	Abonnenten werden &uuml;ber ihre E-Mail-Adresse identifiziert.",
  "Only use complete addresses" => "Nur vollst&auml;ndige Adressen verwenden",
  "addresses that do not have a real name will be ignored. Otherwise all emails will be imported." =>
  	"um Datens&auml;tze, die keinen Namen enthalten, zu ignorieren. Andernfalls werden alle E-Mail-Adressen importiert.",
  "If you choose" => "W&auml;hlen Sie",
  "send notification email" => "Best&auml;tigungsanfrage senden",
  "the users you are adding will be sent the request for confirmation of subscription to which they will have to reply. This is recommended, because it will identify invalid emails." =>
  	"um neu hinzugef&uuml;gten Benutzern eine Mail zu schicken, die sie beantworten m&uuml;ssen, um das Abonnement zu best&auml;tigen. Dies wird empfohlen, denn so k&ouml;nnen ung&uuml;ltige E-Mail-Adressen identifiziert werden.",
  "Send&nbsp;Notification&nbsp;email&nbsp;" => "Best&auml;tigungsanfrage senden",
  "Make confirmed immediately" => "Sofort auf 'best&auml;tigt' setzen",
  "import3info" => "Es gibt zwei M&ouml;glichkeiten, um die Namen der Abonnenten zum importieren:
	Entweder wird der gesamte Name als ein einziges Attribut gespeichert, oder Vorname und Nachname werden als zwei separate Attribute abgelegt.
	Wenn Sie '2 Attribute' w&auml;hlen, wird der Name beim ersten Leerzeichen aufgetrennt.",
  "Use one attribute for name" => "1 Attribut (Name)",
  "Use two attributes for the name" => "2 Attribute (Vorname, Nachname)",
  "Attribute one" => "Attribut 1",
  "Create Attribute" => "[ Neues Attribut ]",
  "Attribute two" => "Attribut 2",
  "Cannot continue" => "Ausf&uuml;hrung nicht m&ouml;glich",
  "ok" => "OK",
  "failed" => "Fehlgeschlagen",
  "Processed" => "Ausgef&uuml;hrt",
  "folders and" => "Verzeichnisse und",
  "unique emails found" => "eindeutige E-Mail-Adressen gefunden",
  "list" => "Liste",
  "lists" => "Listen",
  "new email was" => "neue E-Mail-Adresse",
  "new emails were" => "neue E-Mail-Adressen",
  "email was" => "E-Mail-Adresse",
  "emails were" => "neue E-Mail-Adressen",
  "All the emails already exist in the database and are members of the" =>
  	"Alle E-Mail-Adressen existieren bereits in der Datenbank und geh&ouml;ren zur",
  "succesfully imported to the database and added to" =>
  	"erfolgreich in die Datenbank importiert und hinzuge&uuml;gt zu",
  "subscribed to the" => "abonniert auf",
  "emails already existed in the database" => "E-Mail-Adressen existierten bereits in der Datenbank",
  "Invalid Emails found." => "Ung&uuml;ltige E-Mail-Adressen gefunden.",
  "These records were added, but the email has been made up. You can find them by doing a search on" =>
  	"Diese Datens&auml;tze wurden hinzugef&uuml;gt, aber die E-Mail-Adresse wurde generiert. Sie finden diese Datens&auml;tze, indem Sie eine Suche ausf&uuml;hren nach",
  "These records were deleted. Check your source and reimport the data. Duplicates will be identified." =>
  	"Diese Datens&auml;tze wurden gel&ouml;scht. &Uuml;berpr&uuml;fen Sie die Quelle und importieren Sie die Daten erneut. Duplikate werden erkannt.",
  "No emails found" => "Es wurden keine E-Mail-Adressen gefunden.",
  "Import some more emails" => "Weitere E-Mail-Adressen importieren",
  'Server' => 'Server',
  'User' => 'Benutzername',
  'Password' => 'Passwort',
  'Continue' => 'Weiter',
  'Process Selected Folders' => 'Gew&auml;hlte Verzeichnisse verarbeiten',
);
?>