W polu wiadomo¶ci mo¿na u¿ywaæ "zmiennych", które zostan± zast±pione przez warto¶æ odpowiedni± dla u¿ytkownika:
<br />Zmienne musz± byæ w formacie <b>[NAZWA]</b> gdzie NAZWA mo¿e byæ zast±piona przez nzawê jednego z atrybutów.
<br />Na przyk³ad gdy masz atrybut "Imie uzytkownika" wpisz [IMIE UZYTKOWNIKA] gdzie¶ w wiadomo¶ci aby oznaczyæ miejsce, w którym ma zostaæ wstawiona warto¶æ "Imie uzytkownika".
</p><p>Aktualnie zdefiniowa³es nastêpuj±ce atrybuty:
<table border=1><tr><td><b>Atrybut</b></td><td><b>Symbol</b></td></tr>
<?php
$req = Sql_query("select name from {$tables["attribute"]} order by listorder");
while ($row = Sql_Fetch_Row($req))
  if (strlen($row[0]) < 20)
    printf ('<tr><td>%s</td><td>[%s]</td></tr>',$row[0],strtoupper($row[0]));
print '</table>';
if (ENABLE_RSS) {
?>
  <p>Mo¿esz ustawiæ szablony wiadomo¶ci, które bed± wysy³ane z elementami RSS. Aby to zrobiæ klliknij zak³adkê Harmonogram i wka¿
  czêstotliwo¶ wysy³ania wiadomo¶ci. Wtedy wiadomo¶c zostanie u¿yta aby wys³æ listê elementów do u¿ytkowników
  na listach, którzy maj± ustawion± czêstotliwo¶æ. Musisz u¿yæ symbolu [RSS] w wiadomo¶ci
  w celu okreslenia gdzie lista ma zostaæ rozes³ana.</p>
<?php }
?>

<p>Aby wys³aæ zawarto¶æ strony internetowej, nale¿y dodaæ nastêpuj±c± tre¶æ w wiadomo¶ci:<br/>
<b>[URL:</b>http://www.przyklad.pl/sciezka/do/pliku.html<b>]</b></p>
<p>W tym adresie mo¿esz do³±czyæ podstawowe informacje o u¿ytkowniku, nie atrybut informacja:</br>
<b>[URL:</b>http://www.przyklad.pl/userprofile.php?email=<b>[</b>email<b>]]</b><br/>
</p>