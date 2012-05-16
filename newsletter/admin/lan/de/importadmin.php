<?php
$lan = array(
  'File is either to large or does not exist.' => 'Die Datei ist entweder zu gross oder sie existiert nicht.',
  'No file was specified.' => 'Es wurde keine Datei ausgew&auml;hlt.',
  'Some characters that are not valid have been found. These might be delimiters.
  	Please check the file and select the right delimiter. Character found:' =>
  	'Es wurden ung&uuml;ltige Zeichen gefunden.
	M&ouml;glicherweise sind es Feld- oder Datensatz-Trennzeichen.
	Bitte &uuml;berpr&uuml;fen Sie die Datei und w&auml;hlen Sie das korrekte Zeichen.
	Das gefundene Zeichen ist:',
  'Name cannot be empty' => 'Der Name darf nicht leer sein.',
  'Name is not unique enough' => 'Der Name ist nicht eindeutig genug.',
  'Cannot find the email in the header' => 'Im Header wurde keine E-Mail-Adresse gefunden.',
  'Cannot find the password in the header' => 'Im Header wurde kein Passwort gefunden.',
  'Cannot find the loginname in the header' => 'Im Header wurde kein Login-Name gefunden.',
  'Record has no email' => 'Der Datensatz enth&auml;lt keine E-Mail-Adresse.',
  'Invalid Email' => 'Ung&uuml;ltige E-Mail-Adresse',
  'Record has more values than header indicated, this may cause trouble' =>
  	'Der Datensatz enth&auml;lt mehr Werte als in der Kopfzeile angegeben. Dies kann Probleme verursachen.',
  'password' => 'Passwort',
  'loginname' => 'Login-Name',
  'Empty loginname, using email:' => 'Der Login-Name ist leer. Benutze E-Mail-Adresse',
  'Value' => 'Wert',
  'added to attribute' => 'Hinzugef&uuml;gt zu Attribut',
  'new email was' => 'Die neue E-Mail-Adresse war',
  'new emails were' => 'Die neuen E-Mail-Adressen waren',
  'email was' => 'Die E-Mail-Adresse war',
  'emails were' => 'Die E-Mail-Adressen waren',
  'All the emails already exist in the database' => 'Alle E-Mail-Adressen existieren bereits in der Datenbank.',
  'succesfully imported to the database and added to the system.' =>
  	'erfolgreich in die Datenbank importiert und zum System hinzugef&uuml;gt.',
  'Import some more emails' => 'Weitere E-Mail-Adressen importieren',
  'No default permissions have been defined, please create default permissions first, by creating one dummy admin and assigning the default permissions to this admin' =>
  	'Es wurden keine Standard-Zugriffsrechte definiert.
	Bitte legen Sie zuerst die Standard-Zugriffsrechte fest, indem Sie einen Dummy-Administrator anlegen und ihm die Standard-Zugriffsrechte zuweisen.',
  
  # do not translate email, loginname and password
  'importadmininfo' =>
  	'Die zu importierende Datei muss die Administratoren enthalten, die Sie zum System hinzuf&uuml;gen wollen.
	Die Spalten m&uuml;ssen wie folgt benannt sein: <b>email</b>, <b>loginname</b>, <b>password</b>.
	Alle weiteren Spalten werden als Administratoren-Attribute hinzugef&uuml;gt.
	<br /><br />
	<b>Achtung</b>: Die Datei muss eine reine Textdatei sein.
	Importieren Sie keine bin&auml;ren Dateien wie beispielsweise Word-Dokumente.',
  'File containing emails' => 'Textdatei mit Administratoren',
  'Field Delimiter' => 'Feld-Trennzeichen',
  'Record Delimiter' => 'Datensatz-Trennzeichen',
  'importadmintestinfo' =>
  	'Wenn Sie einen Test-Durchlauf durchf&uuml;hren, werden die E-Mail-Adressen nur auf dem Bildschirm ausgegeben
	und nicht in die Datenbank geschrieben.
	Dies ist hilfreich um zu pr&uuml;fen, ob das Format der importierten Datei korrekt ist.
	Es werden allerdings nur die ersten 50 Datens&auml;tze angezeigt.',
  # this should be the same as the term between quotes in the previous one
  'Test output' => 'Test-Durchlauf',
  'Check this box to create a list for each administrator, named after their loginname' =>
  	'Selektieren Sie diese Checkbox, um eine Liste f&uuml;r jeden Administrator anzulegen.
	Die Liste wird nach dem Login-Namen benannt.',
  'Do Import' => 'Importieren',
  'default is TAB' => 'Standard: TAB',
  'default is line break' => 'Standard: Zeilenschaltung',
  'testoutputinfo' => 'Test-Durchlauf<br/>Es sollte nur 1 E-Mail-Adresse pro Zeile zu sehen sein.<br/>
  Wenn die Ausgabe korrekt ist, dann klicken Sie <a href="javascript:history.go(-1)">zur&uuml;ck</a> f&uuml;r einen echten Import.<br /><br />',  
  'List for' => 'Liste f&uuml;r',
  'login' => 'Login',
);
?>