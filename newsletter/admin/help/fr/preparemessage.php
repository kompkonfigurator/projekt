<p>Ici, vous pouvez pr&eacute;parer un message qui peut &ecirc;tre envoy&eacute; &agrave; une date ult&eacute;rieure.
Vous pouvez sp&eacute;cifier toute l&rsquo;information requise pour ce message, sauf les listes auxquelles il faudra envoyer le message.  Puis, au moment d&rsquo;envoyer le message (pr&eacute;par&eacute;) vous pouvez s&eacute;lectionner la/les liste(s) et le message pr&eacute;par&eacute; sera envoy&eacute;.</p>
<p>
Votre message pr&eacute;par&eacute; est stationnaire, ce qui fait qu&rsquo;il ne dispara&icirc;tra pas une fois qu&rsquo;il aura &eacute;t&eacute; envoy&eacute;, mais il peut &ecirc;tre r&eacute;utilis&eacute; plusieurs fois.  Attention avec cela, car du coup vous risquez d&rsquo;envoyer le m&ecirc;me message &agrave; vos utilisateurs plusieurs fois.
</p>
<p>
Cette fonctionnalit&eacute; est particuli&egrave;rement utile lorsque vous tirez parti de la fonctionnalit&eacute; "administrateurs multiples".
Si un administrateur central pr&eacute;pare les messages, les sous-administrateurs peuvent les envoyer sur leurs propres listes.  Dans ce cas, vous pouvez ajouter des codes-raccourcis dans le corps de votre message: les attributs des administrateurs.
</p>
<p>Par exemple, si vous avez un attribut <b>Nom</b> pour les administrateurs, vous pouvez ajouter [LISTOWNER.NOM] (listowner = propri&eacute;taire de liste) comme code-raccourci, qui sera remplac&eacute; par le <b>Nom</b> du propri&eacute;taire de la liste qui va recevoir le message.  Ceci, quelque soit la personne qui envoie le message.  Alors si l&rsquo;administrateur central envoie le message &agrave; une liste qui appartient &agrave; quelqu&rsquo;un d&rsquo;autre, les codes-raccourcis [LISTOWNER] seront remplac&eacute;s par les valeurs pour le Propri&eacute;taire de la liste, pas les valeurs de l&rsquo;administrateur central.
</P>
<p>Rappel:
<br/>
Le format des codes-raccourcis [LISTOWNER] est le suivant:  <b>[LISTOWNER.ATTRIBUT]</b><br/>
<p>Vous avez d&eacute;fini les attributs pour administrateurs suivants:
<table border=1><tr><td><b>Attribut</b></td><td><b>Code-raccourci</b></td></tr>
<?php
$req = Sql_query("select name from {$tables["adminattribute"]} order by listorder");
if (!Sql_Affected_Rows())
  print '<tr><td colspan=2>Aucun</td></tr>';

while ($row = Sql_Fetch_Row($req))
  if (strlen($row[0]) < 20)
    printf ('<tr><td>%s</td><td>[LISTOWNER.%s]</td></tr>',$row[0],strtoupper($row[0]));

?>
