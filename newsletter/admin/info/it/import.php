
<p>

<h3>Importa le email nelle liste esistenti</h3>

Ci sono quattro modi per importare i dati:

<ul>
<li><?php echo PageLink2("import2","Importa le email con differenti valori per gli attributi");?>. Nell'elenco di email sono ammessi attributi non ancora definiti. Questi saranno creati automaticamente come attributi di testo. Dovresti usare questa opzione se stai importando un elenco da un foglio di calcolo/file CSV che ha attributi per gli utenti nelle colonne e un utente per riga. <br/><br/>
<li><?php echo PageLink2("import1","Importa le email con gli stessi valori per gli attributi");?>. La lista delle email deve soddisfare la struttura precedentemente definita in <?=NAME?>. Dovresti usare questa opzione se stai importando una semplice lista di email. In seguito puoi specificare i valori degli attributi per ogni record. Questi valori saranno uguali per tutti i record che stai importando.<br/><br/>
<li><?php echo PageLink2("import3","Importa le email da un account IMAP");?>. Con questa opzione le email verranno cercate nell'account IMAP. In questo modo si associa solo l'attributo riguardante il nome della persona.<br/><br/>
<li><?php echo PageLink2("import4","Importa le email da un altro database");?>.
</ul>

</p>
