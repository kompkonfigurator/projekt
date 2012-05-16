Dans le champ r&eacute;serv&eacute; au texte de votre message, vous pouvez utiliser des "variables" qui seront remplac&eacute;es par les valeurs correspondant &agrave; chaque utilisateur:
<br />Les variables doivent appara&icirc;tre sous la forme suivante: <b>[NOM]</b> o&ugrave; NOM peut &ecirc;tre remplac&eacute; par le nom de l&rsquo;un de vos attributs.
<br />Par exemple, si vous avez un attribut "Mon Prenom" mettez [MON PRENOM] dans le message quelque part, l&agrave; o&ugrave; vous voulez que la valeur pour "Mon Prenom" soit ins&eacute;r&eacute;e.
</p><p>Vous avez d&eacute;fini les attributs suivants:
<table border=1><tr><td><b>Attribut</b></td><td><b>Code-raccourci</b></td></tr>
<?php
$req = Sql_query("select name from {$tables["attribute"]} order by listorder");
while ($row = Sql_Fetch_Row($req))
  if (strlen($row[0]) < 20)
    printf ('<tr><td>%s</td><td>[%s]</td></tr>',$row[0],strtoupper($row[0]));
print '</table>';
if (phplistPlugin::isEnabled('rssmanager')) {
?>

  <p>Vous pouvez mettre en place des mod&egrave;les de messages pour des articles RSS.  Pour ce faire, cliquez sur l&rsquo;onglet "Envoi programm&eacute;" et s&eacute;lectionnez la fr&eacute;quence d&rsquo;envoi du message.  Le message sera ensuite utilis&eacute; pour envoyer la liste des articles aux utilisateurs sur les listes qui ont choisi cette fr&eacute;quence d&rsquo;envoi.  Il faut utiliser le code-raccourci [RSS] dans le corps de votre message pour indiquer l&rsquo;endroit o&ugrave; la liste doit appara&icirc;tre.</p>

<?php }
?>

<p>Pour envoyer les contenus d&rsquo;une page web, ajoutez la ligne suivante dans le corps du message:<br/>
<b>[URL:</b>http://www.exemple.org/chemin/vers/lefichier.html<b>]</b></p>
<p>Vous pouvez inclure des informations de base de l&rsquo;utilisateur dans cet URL, mais pas d&rsquo;information des attributs:</br>
<b>[URL:</b>http://www.exemple.org/profilutilisateur.php?email=<b>[</b>email<b>]]</b><br/>
</p>