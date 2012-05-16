<p>In deze pagina kan je een bericht voorbereiden om later te verzenden.
 Je kan alle info die je voor het bericht nodig hebt vastleggen, uitgezonderd de lijst(en) 
 waar het naartoe moet worden verzonden. Wanneer je het bericht gaat verzenden (het voorbereide bericht) kan je
 de lijst(en) aanduiden en zal het voorbereide bericht worden verzonden.</p>
<p>
 Je voorbereide bericht is stationair, dus het zal niet verdwijnen als het verzonden is, 
 het kan verschillende malen worden gebruikt. Pas hier mee op, omdat 
 het kan gebeuren dat je zo het zelfde bericht verschillende malen naar je gebruikers verzend.
</p>
<p>
Deze functionaliteit is ontworpen met de "leerdere administators" functionaliteit in het vooruitzicht.
Als een hoofd administrator een bericht voorbereid dan kunnen sub-admins het beriht naar hun eigen lijsten sturen. In dit geval kan je 
bijkomende placeholders op je bericht plaatsen: de attributen van administrators.
</p>
<p>Bijvoorbeeld als je een attribuut <b>Naam</b> hebt, administrators kunnen dan [LISTOWNER.NAME] toevoegen als placeholder,
wat zal worden vervangen de <b>Naam</b> van de eigenaar van de lijst waarnaar het bericht werd verzonden. Dit heeft
niets te maken met wie het bericht heeft verzonden. Dus als de hoofd administrator het bericht verzend naar een lijst die in het bezit is van iemand
anders, dan zullen de [LISTOWNER] placeholders worden vervangen met de waarden van de eigenaar van de lijst, niet de waarden van de hoofd administrator.
</P>
<p>Enkel voor verwijzing:
<br/>
Het formaat van de [LISTOWNER] placeholders is <b>[LISTOWNER.ATTRIBUTE]</b><br/>
<p>Momenteel heb je de volgende admin attributen ingesteld:
<table border=1><tr><td><b>Attribuut</b></td><td><b>Placeholder</b></td></tr>
<?php
$req = Sql_query("select name from {$tables["adminattribute"]} order by listorder");
if (!Sql_Affected_Rows())
  print '<tr><td colspan=2>None</td></tr>';

while ($row = Sql_Fetch_Row($req))
  if (strlen($row[0]) < 20)
    printf ('<tr><td>%s</td><td>[LISTOWNER.%s]</td></tr>',$row[0],strtoupper($row[0]));

?>
