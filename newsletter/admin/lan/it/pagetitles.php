<?php
switch ($page) {
  case 'home': $page_title = 'Pagina Principale Amministrazione';break;
  case 'setup': $page_title = 'Opzioni di Configurazione';break;
  case 'about': $page_title = 'Riguardo a'.NAME;break;
  case 'attributes': $page_title = 'Configura Attributi';break;
  case 'stresstest': $page_title = 'Stress Test';break;
  case 'list': $page_title = 'Elenco delle liste';break;
  case 'editattributes': $page_title = 'Configura Attributi';break;
  case 'editlist': $page_title = 'Modifica una lista';break;
  case 'checki18n': $page_title = 'Controlla che la traduzione esista';break;
  case 'import4': $page_title = 'Importa email da un database remoto';break;
  case 'import3': $page_title = 'Importa email da IMAP';break;
  case 'import2':
  case 'import1':
  case 'import': $page_title = 'Importa email';break;
  case 'export': $page_title = 'Esporta utenti';break;
  case 'initialise': $page_title = 'Inizializza il database';break;
  case 'send': $page_title = 'Manda un Messaggio';break;
  case 'preparesend': $page_title = 'Prepara messaggio da spedire';break;
  case 'sendprepared': $page_title = 'Spedisci messaggio preparato';break;
  case 'members': $page_title = 'lista Membri';break;
  case 'users': $page_title = 'lista di tutti gli utenti';break;
  case 'reconcileusers': $page_title = 'Riconcilia utenti';break;
  case 'user': $page_title = 'Dettagli utente';break;
  case 'userhistory': $page_title = 'Storico utente';break;
  case 'messages': $page_title = 'lista messaggi';break;
  case 'message': $page_title = 'Visualizza messaggi';break;
  case 'processqueue': $page_title = 'Spedisci messaggio in coda';break;
  case 'defaults': $page_title = 'Alcuni utili attributi di default';break;
  case 'upgrade': $page_title = 'Upgrade '.NAME;break;
  case 'templates': $page_title = 'Templates nel sistema';break;
  case 'template': $page_title = 'Aggiungi o Modifica un template';break;
  case 'viewtemplate': $page_title = 'Anteprima Template';break;
  case 'configure': $page_title = 'Configura '.NAME;break;
  case 'admin': $page_title = 'Modifica un Amministratore';break;
  case 'admins': $page_title = 'lista Amministratori';break;
  case 'adminattributes': $page_title = 'Configura attributi Amministratore';break;
  case 'processbounces': $page_title = 'Recupera rimbalzi dal server';break;
  case 'bounces': $page_title = 'lista rimbalzi';break;
  case 'bounce': $page_title = 'Visualizza un rimbalzo';break;
  case 'spageedit': $page_title = 'Modifica pagina di iscrizione';break;
  case 'spage': $page_title = 'Pagine di iscrizione';break;
  case 'eventlog': $page_title = 'Log degli eventi';break;
  case 'getrss': $page_title = 'Recupera feed RSS';break;
  case 'viewrss': $page_title = 'Visualizza elementi RSS';break;
  case 'community': $page_title = 'Benvenuto nella comunità PHPlist!';break;
  case 'vote': $page_title = 'Vota per PHPlist';break;
  case 'login': $page_title = 'Login';break;
  case 'logout': $page_title = 'Log Out';break;
  case 'mclicks': $page_title = 'Statistiche dei click sui messaggi'; break;
  case 'uclicks': $page_title = 'Statistiche dei click sulle URL'; break;
  case 'massunconfirm': $page_title = 'Revoca conferma di tutte le email';break;
}
?>
