<p>In questa pagina puoi predefinire un messaggio da spedire in una data successiva.
 Puoi specificare tutte le informazioni necessarie al messaggio, ad eccezione dell'effettiva
lista di destinazione. Quindi, al momento dell'invio (di un messaggio predefinito) sar&agrave; possibile 
impostare la(e) lista(e) ed il messaggio predefinito sarà inviato.</p>
<p>
 Il vostro messaggio predefinito non sar&agrave; cancellato dopo l'invio, e pu&ograve; essere riutilizzato pi&ugrave; volte. $Egrave; necessario fare attenzione, poich&eacute; in questo modo quello stesso messaggio potrebbe essere inviato agli stessi utenti pi&ugrave; di una volta.
</p>
<p>
Questa opzione è progettata specialmente per la funzionalit&agrave; "amministratori multipli". 
Se un amministratore principale predefinisce i messaggi, gli amministratori secondari possono inviarli alle loro liste. 
In questo caso &egrave; possibile aggiungere al messaggio segnaposto addizionali: gli attributi dei amministratori.
</p>
<p>Per esempio se &egrave; presente un attributo <b>Nome</b> per gli amministratori &egrave; possibile aggiungere [LISTOWNER.NAME] come segnaposto, 
che sar&agrave; sostituito dal <b>Nome</b> del proprietario della lista a cui il messaggio &egrave; trasmesso. Questo 
indipendentemente da chi trasmette il messaggio. Cos&igrave; se l'amministratore principale trasmette il messaggio ad una lista 
che &egrave; di propriet&agrave; di qualcun'altro, i segnaposti [LISTOWNER] saranno sostituiti con i valori del proprietario 
della lista,  non con quellii dell'amministratore principale .
</P>
<p>Riferimenti:
<br/>
Il formato dei segnaposto [LISTOWNER] &egrave; <b>[LISTOWNER.ATTRIBUTE]</b><br/>
<p>Attualmente sono stati definiti i seguenti attributi di amministratore :
<table border=1><tr><td><b>Attributi</b></td><td><b>Segnaposto</b></td></tr>
<?php
$req = Sql_query("select name from {$tables["adminattribute"]} order by listorder");
if (!Sql_Affected_Rows())
  print '<tr><td colspan=2>None</td></tr>';

while ($row = Sql_Fetch_Row($req))
  if (strlen($row[0]) < 20)
    printf ('<tr><td>%s</td><td>[LISTOWNER.%s]</td></tr>',$row[0],strtoupper($row[0]));

?>
