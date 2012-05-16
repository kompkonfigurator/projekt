<p>Na tej stronie mo¿esz przygotowaæ wiadomo¶æ, która bêdzie wys³ana z pó¼niejsz± dat±.
 M¿esz okre¶liæ wszystkie informacje wymagane w wiadomo¶ci oprócz
list, do których ma zostaæ wys³ana. Nastêpnie, w momencie wysy³ania (przygotowanej wiadomo¶ci) mo¿esz
okre¶liæ listy i przygotowana wiadomo¶æ zoastanie wys³ana.</p>
<p>
 Przygotowana wiadomo¶æ jest trwa³a, wiêc nie zniknie gdy zostanie
wys³ana, lecz mo¿e byæ wybrana wiele razy. Uwa¿aj poniewa¿ przez to
mo¿esz wys³aæ t± sam± wiadomo¶æ so u¿ytkowników kilka razy.
</p>
<p>
Ta funkcjonalno¶æ jest zaprojektowana szczególnie dla wielu administratorów.
Jesli g³ówny administrator przygoruje wiadomo¶ci, inny administrator mo¿e wys³aæ je do w³asnych list. W tym przypadku 
mo¿esz dodaæ symbole do wiadomo¶ci: adtybuty administratorów.
</p>
<p>Na przyk³ad je¶li masz atrybud <b>Imie</b> dla administratorów, mo¿esz dodaæ symbol [LISTOWNER.IMIE],
który zostanie zamieniony z <b>Imie</b> w³a¶ciciela listy, do której wiadomo¶æ jest wysy³anathe message is sent to.
Jest to niezale¿ne od tego kto wy¶le wiadomo¶æ. Wiêc je¶li g³ówny administratod wysy³a wiadomo¶æ do listy, której
w³a¶cicielem jest kto¶ inny, symbole [LISTOWNER] zostana zamienione z warto¶ciami w³a¶ciciela listy a nie z warto¶ci±
g³ównego administratora.
</P>
<p>Tylko dla zapamiêtania:
<br/>
Format symboli [LISTOWNER] to <b>[LISTOWNER.ATRYBUT]</b><br/>
<p>Aktualnie zdefiniowano nastêpuj±ce atrybuty administratora:
<table border=1><tr><td><b>Atrybut</b></td><td><b>Symbol</b></td></tr>
<?php
$req = Sql_query("select name from {$tables["adminattribute"]} order by listorder");
if (!Sql_Affected_Rows())
  print '<tr><td colspan=2>None</td></tr>';

while ($row = Sql_Fetch_Row($req))
  if (strlen($row[0]) < 20)
    printf ('<tr><td>%s</td><td>[LISTOWNER.%s]</td></tr>',$row[0],strtoupper($row[0]));

?>
