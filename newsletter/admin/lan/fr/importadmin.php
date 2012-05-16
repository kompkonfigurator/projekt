<?php
$lan = array(
  'File is either to large or does not exist.' => 'Le fichier est trop gros ou n&rsquo;existe pas.',
  'No file was specified.' => 'Aucun fichier n&rsquo;a &eacute;t&eacute; sp&eacute;cifi&eacute;.',
  'Some characters that are not valid have been found. These might be delimiters. Please check the file and select the right delimiter. Character found:' => 'Certains caract&egrave;res invalides ont &eacute;t&eacute; trouv&eacute;s.  Il s&rsquo;agit peut-&ecirc;tre de s&eacute;parateurs de champ.  V&eacute;rifiez votre fichier et s&eacute;lectionnez le s&eacute;parateur de champ appropri&eacute;.  Caract&egrave;re trouv&eacute;:',
  'Name cannot be empty' => 'Il faut choisir un nom',
  'Name is not unique enough' => 'Le nom est d&eacute;j&agrave; pris',
  'Cannot find the email in the header' => 'L&rsquo;email n&rsquo;a pas pu &ecirc;tre trouv&eacute; dans l&rsquo;ent&ecirc;te',
  'Cannot find the password in the header' => 'Le mot de passe n&rsquo;a pas &eacute;t&eacute; trouv&eacute; dans l&rsquo;ent&ecirc;te',
  'Cannot find the loginname in the header' => 'L&rsquo;identifiant de connexion n&rsquo;a pas &eacute;t&eacute; trouv&eacute; dans l&rsquo;ent&ecirc;te',
  'Record has no email' => 'L&rsquo;entr&eacute;e n&rsquo;a pas d&rsquo;email',
  'Invalid Email' => 'Email Invalide',
  'Record has more values than header indicated, this may cause trouble' => 'L&rsquo;entr&eacute;e a plus de valeurs que ce qui est indiqu&eacute; dans l&rsquo;ent&ecirc;te, ce qui risque de provoquer des erreurs',
  'password' => 'mot de passe',
  'loginname' => 'identifiant de connexion',
  'Empty loginname, using email:' => 'Identifiant de connexion vide, l&rsquo;email est utilis&eacute;:',
  'Value' => 'Valeur',
  'added to attribute' => 'ajout&eacute;e &agrave; l&rsquo;attribut',
  'new email was' => 'le nouvel email &eacute;tait',
  'new emails were' => 'les nouveaux emails &eacute;taient',
  'email was' => 'email &eacute;tait',
  'emails were' => 'emails &eacute;taient',
  'All the emails already exist in the database' => 'Tous les emails existent d&eacute;j&agrave; dans la base de donn&eacute;es',
  'succesfully imported to the database and added to the system.' => 'import&eacute;s avec succ&egrave;s dans la base de donn&eacute;es et ajout&eacute;s au syst&egrave;me.',
  'Import some more emails' => 'Importer d&rsquo;autres emails',
  'No default permissions have been defined, please create default permissions first, by creating one dummy admin and assigning the default permissions to this admin' => 'Aucun droit n&rsquo;a &eacute;t&eacute; d&eacute;fini par d&eacute;faut; cr&eacute;ez des droits par d&eacute;faut en cr&eacute;ant un admin temporaire et en lui assignant les droits par d&eacute;faut',
  
  # do not translate email, loginname and password
  'importadmininfo' => '
  Le fichier que vous allez t&eacute;l&eacute;charger devra contenir les administrateurs que vous souhaitez ajouter au syst&egrave;me. Les colonnes doit avoir les ent&ecirc;tes suivantes (en anglais): <b>email</b>, <b>loginname</b> (identifiant de connexion), <b>password</b> (mot de passe). Toute autre colonne sera ajout&eacute;e aux attributs des administrateurs.
 <b>Attention</b>: le fichier doit &ecirc;tre au format texte.  Ne t&eacute;l&eacute;chargez pas de fichier binaire comme un Document Word.
  ',
  'File containing emails' => 'Fichier contenant les emails',
  'Field Delimiter' => 'S&eacute;parateur de Champ',
  'Record Delimiter' => 'S&eacute;parateur des Entr&eacute;es',
  'importadmintestinfo' => 'Si vous cochez "R&eacute;sultat test", la liste des emails identifi&eacute;s sera affich&eacute;e, mais la base de donn&eacute;es ne sera pas remplie avec ces donn&eacute;es.  C&rsquo;est utile pour vous permettre de v&eacute;rifier que le format de votre fichier est appropri&eacute;.  Ne seront affich&eacute;es que les 50 premi&egrave;res lignes de donn&eacute;es.',
  # this should be the same as the term between quotes in the previous one
  'Test output' => 'R&eacute;sultat test',
  'Check this box to create a list for each administrator, named after their loginname' => 'Cochez cette case pour cr&eacute;er une liste pour chaque administrateur, dont le nom sera celui de son identifiant de connexion',
  'Do Import' => 'Importer',
  'default is TAB' => 'TABULATION par d&eacute;faut',
  'default is line break' => 'retour &agrave; la ligne par d&eacute;faut',
  'testoutputinfo' => 'R&eacute;sultat test:<br/>Il ne devrait y avoir qu&rsquo;UN seul email par ligne.<br/>Si le r&eacute;sultat vous semble probant, retournez <a href="javascript:history.go(-1)">en arri&egrave;re</a> et ex&eacute;cutez votre requ&ecirc;te pour de bon<br/><br/>',  
  'List for' => 'Liste pour',
'login' => 'connexion',
  
  
);
?>