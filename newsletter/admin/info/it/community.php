
<h3>La comunit&agrave; PHPlist</h3>
<p><b>Ultima Versione</b><br/>
Accertati di usare l'ultima versione prima di inviare il rapporto su un bug.<br/>
<?php
ini_set("user_agent",NAME. " (PHPlist versione ".VERSION.")");
ini_set("default_socket_timeout",5);
if ($fp = @fopen ("http://www.phplist.com/files/LATESTVERSION","r")) {
  $latestversion = fgets ($fp);
  $thisversion = VERSION;
  $thisversion = str_replace("-dev","",$thisversion);
  if (versionCompare($thisversion,$latestversion)) {
    print '<span class="highlight">Congratulazioni, stai usando l\'ultima versione disponibile!</span>';
  } else {
    print '<span class="highlight">Non stai usando l\'ultima versione</span>';
    print "<br/>La tua versione: <b>".$thisversion."</b>";
    print "<br/>Ultima versione disponibile: <b>".$latestversion."</b>  ";
    print '<a href="http://www.phplist.com/files/changelog">Visualizza cosa c\'&egrave; di nuovo</a>&nbsp;&nbsp;';
    print '<a href="http://www.phplist.com/files/phplist-'.$latestversion.'.tgz">Download</a>';
  }
} else {
  print "<br/>Controlla se stai usando l\'ultima versione: <a href=http://www.phplist.com/files>Qui</a>";
}
?>
<p>PHPlist &egrave; iniziato prima dell'anno 2000 come una piccola applicazione per il 
<a href="http://www.nationaltheatre.org.uk" target="_blank">Royal National Theatre di Londra</a>. Con il tempo si &egrave;
sviluppato diventando un sistema completo per l'invio di newsletter e il 
numero di utilizzatori &egrave; cresciuto rapidamente. Nonostante il codice originario sia
mantenuto essenzialmente da un'unica persona sta divenendo molto complesso, e per assicurarne la
qualit&agrave; richieder&agrave; sempre pi&ugrave; partecipazione.</p>
<p>Per evitare di intasare le caselle mail degli sviluppatori, sei gentilmente
pregato di non spedire domande direttamente a <a href="http://tincan.co.uk" target="_blank">Tincan</a>, ma
di utilizzare le altre vie di comunicazione disponibili. Questo non permette soltanto di lasciare
pi&ugrave; tempo allo sviluppo, ma anche di creare uno storico delle domande che possono essere quindi 
usate da un nuovo utente per essere informato sul sistema</a>.</p>
<p>Per facilitare la comunit&agrave; PHPlist, sono disponibili pi&ugrave; opzioni:
<ul>
<li>La <a href="http://docs.phplist.com" target="_blank">Documentazione Wiki</a>. Il sito della documentazione &egrave; il riferimento principale, ma non si occupa di rispondere alle domande degli utenti.<br/><br/></li>
<li>I <a href="http://www.phplist.com/forums/" target="_blank">Forum</a>. I forum sono i luoghi deputati all'invio di domande e alle risposte degli utenti.<br/><br/></li>
<li><a href="#bugtrack">Mantis</a>. Mantis &egrave; un indicatore di traccia. &Egrave; una risorsa utile ad inviare le richieste riguardanti nuove funzioni e per segnalare i bugs. Non deve essere usato per le domande dell'helpdesk.<br/><br/></li>
</ul>
</p><hr/>
<h3>Cosa puoi fare per aiutarci</h3>
<p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="donate@phplist.com">
<input type="hidden" name="item_name" value="phplist version <?php echo VERSION?> for <?php echo $_SERVER['HTTP_HOST']?>">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="GBP">
<input type="hidden" name="tax" value="0">
<input type="hidden" name="bn" value="PP-DonationsBF">
<input type="image" src="images/paypal.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form></p>
<p>Se sei un <b>utente regolare di PHPlist</b> e pensi di conoscerlo bene
puoi aiutare <a href="http://www.phplist.com/forums/" target="_blank">rispondendo alle domande di altri utenti</a>. o scrivendo pagine nel <a href="#docscontrib">sito della documentazione</a>.</p>
<p>Se sei <b>nuovo in PHPlist</b> e hai un problema su come configurarlo ed eseguirlo sul 
tuo sito, pu&ograve; esserti di aiuto provare a ricercare una 
soluzione nel primo sito riportato in alto. Spesso i problemi che puoi avere sono relativi all'ambiente 
in cui la tua installazione di PHPlist sta funzionando. Avere un unico sviluppatore presenta 
lo svantaggio di non poter testare il sistema su ogni piattaforma e con ogni versione di PHP.</p>
<h3>Altre cose che puoi fare per aiutarci</h3>
<ul>
<li><p>Se pensi che PHPlist sia di grande aiuto per te, aiutaci mettendo a conoscenza altre persone
della sua esistenza. Probabilmente hai fatto un grosso sforzo per trovarlo e
confrontarlo con altre applicazioni simili. La tua esperienza pu&ograve; quindi essere di beneficio ad altre persone.</p>

<p>Per fare questo, puoi <?php echo PageLink2("vote","votare")?> per PHPlist, o scrivere una recensione nei siti
di applicazioni. Puoi anche parlarne alle persone che conosci.
</li>
<li><p>Puoi <b>tradurre</b> PHPlist nella tua lingua e inviarci la traduzione.
Per aiutarci controlla le <a href="http://docs.phplist.com/PhplistTranslation">Pagine di traduzione</a> nel Wiki.
</p>
</li>
<li>
<p>Puoi <b>provare</b> tutte le caratteristiche di PHPlist e controllare che funzionino al meglio.
Invia i tuoi risultati nei <a href="http://www.phplist.com/forums/" target="_blank">forum</a>.</p></li>
<li>
<p>Puoi usare PHPlist a pagamento per i tuoi clienti (Se appartieni a un'agenzia-web, per esempio) e convincerli 
che questo &egrave; uno strumento adatto alle loro necessit&agrave;. Se desiderano alcuni cambiamenti puoi 
<b>commissionare nuove caratteristiche</b> che saranno pagate dai tuoi clienti. Se desideri sapere quanto 
costerebbe aggiungere le caratteristiche a PHPlist, <a href="mailto:phplist2@tincan.co.uk?subject=request for quote to change PHPlist">chiedilo con un click</a>.
Molte delle nuove caratteristiche di PHPlist sono state aggiunte su richiesta di clienti paganti. Questo sar&agrave; di beneficio
alla comunit&agrave;, che otterr&agrave; nuove
caratteristiche, e agli sviluppatori  che saranno pagati per il lavoro su PHPlist :-)</p></li>

<li><p>Se usi PHPlist regolarmente e hai un <b>numero discretamente grande di iscritti</b> (1000+), siamo
interessati alle specifiche del tuo sistema, e desideriamo riceverne le statistiche. Di default PHPlist non trasmetter&agrave;
statistiche a <a href="mailto:phplist-stats@tincan.co.uk">phplist-stats@tincan.co.uk</a>, ma non viene spedito
alcun dettaglio del sistema. Se desideri aiutarci facendo s&igrave; che funzioni meglio, saresti di grande aiuto se 
ci comunicassi le specifiche del tuo sistema, e impostassi di default l'invio della statistica al suddetto indirizzo.
L'indirizzo non &egrave; letto da persone, ma viene analizzato per calcolare quali sono le performance
di PHPlist.</p></li>
</ul>

</p>
<p><b><a name="bugtrack"></a>Mantis</b><br/>
<a href="http://mantis.tincan.co.uk/" target="_blank">Mantis</a> &egrave; il sito dove puoi trovare lo storico dei problemi di phplist. Puoi utilizzare Mantis per inviare i tuoi problemi con phplist, commenti e sugerimenti su come migliorarlo o il resoconto di un bug. Se inserisci il resoconto di un bug, assicurati di includere ogni informazione possibile per facilitare gli sviluppatori nel risolvere il problema.</p>
<p>Le informazioni minime per riportare un bug sono i dettagli del tuo sistema:</p>

<?php if (!stristr($_SERVER['HTTP_USER_AGENT'],'firefox')) { ?>
<p>Se si sono verificati problemi, prova a usare Firefox per vedere se il problema &egrave; risolto.
<a href="http://www.spreadfirefox.com/?q=affiliates&amp;id=131358&amp;t=81"><img border="0" alt="Get Firefox!" title="Get Firefox!" src="images/getff.gif"/></a>
<?php } ?>

</p>
<p>I dettagli del tuo sistema sono:</p>

<ul>
<li>Versione di PHPlist: <?php echo VERSION?></li>
<li>Versione di PHP: <?php echo phpversion()?></li>
<li>Browser: <?php echo $_SERVER['HTTP_USER_AGENT']?></li>
<li>Webserver: <?php echo $_SERVER['SERVER_SOFTWARE']?></li>
<li>Sito web: <a href="http://<?php echo getConfig("website")."$pageroot"?>"><?=getConfig("website")."$pageroot"?></a></li>
<li>Informazioni su Mysql: <?php echo mysql_get_server_info();?></li>
<li>Moduli PHP:<br/><ul>
<?php
$le = get_loaded_extensions();
foreach($le as $module) {
    print "<LI>$module\n";
}
?>
</ul></li>
</ul>
<p>Fai attenzione, le email o i forum che non utilizzano queste impostazioni saranno ignorati.</p>

<p><b><a name="docscontrib"></a>Contribuisci alla documentazione</b><br/>
Se vuoi essere d'aiuto partecipando alla stesura della documentazione, iscriviti a <a href="http://tincan.co.uk/?lid=878">Mailinglist Sviluppatori</a>. In questo momento documentatori e sviluppatori condividono la mailinglist, perch&egrave; i loro interessi coincidono ed &egrave; utile ripartire le informazioni. <br/>
Prima di fare qualsiasi cosa, discuti il problema nella mailinglist e quando l'idea &egrave; consolidata potrai realizzarla.

