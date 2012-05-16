<?php
switch ($page) {
  case 'home': $page_title = 'G³ówna strona Administratora';break;
  case 'setup': $page_title = 'Opcje konfiguracji';break;
  case 'about': $page_title = 'o '.NAME;break;
  case 'attributes': $page_title = 'Konfiguracja atrybutów';break;
  case 'stresstest': $page_title = 'Próba wydajno¶ci';break;
  case 'list': $page_title = 'wykaz list';break;
  case 'editattributes': $page_title = 'Konfiguracja atrybutów';break;
  case 'editlist': $page_title = 'Edycja listy';break;
  case 'checki18n': $page_title = 'Sprawd¼ czy istniej± t³umaczenia';break;
  case 'import4': $page_title = 'Importowanie adresów email ze zdalnej bazy danych';break;
  case 'import3': $page_title = 'Importowanie adresów email z IMAP';break;
  case 'import2':
  case 'import1':
  case 'import': $page_title = 'Importowanie adresów email';break;
  case 'export': $page_title = 'Eksportowanie u¿ytkowników';break;
  case 'initialise': $page_title = 'Pierwsze uruchomienie bazy danych';break;
  case 'send': $page_title = 'Wysyanie wiadomo¶ci';break;
  case 'preparesend': $page_title = 'Przygotowanie wiadomo¶ci do wys³ania';break;
  case 'sendprepared': $page_title = 'Wysy³anie przygotowanej wiadomo¶ci';break;
  case 'members': $page_title = 'Lista cz³onków';break;
  case 'users': $page_title = 'Lista wszystkich u¿ytkowników';break;
  case 'reconcileusers': $page_title = 'Uzgadnianie u¿ytkowników';break;
  case 'user': $page_title = 'Szczegó³y u¿ytkowników';break;
  case 'userhistory': $page_title = 'historia u¿ytkownika';break;
  case 'messages': $page_title = 'lista wiadomo¶ci';break;
  case 'message': $page_title = 'Podgl±d wiadomo¶ci';break;
  case 'processqueue': $page_title = 'Klejka wiadomo¶ci';break;
  case 'defaults': $page_title = 'U¿yteczne atrybuty';break;
  case 'upgrade': $page_title = 'Aktualizacja '.NAME;break;
  case 'templates': $page_title = 'Szablony w systemie';break;
  case 'template': $page_title = 'Dodawanie i edycja szablonów';break;
  case 'viewtemplate': $page_title = 'Podgl±d szablonu';break;
  case 'configure': $page_title = 'Konfiguracja '.NAME;break;
  case 'admin': $page_title = 'Edycja Administratora';break;
  case 'admins': $page_title = 'Lista administratorów';break;
  case 'adminattributes': $page_title = 'Konfiguracja atrybutów administratora';break;
  case 'processbounces': $page_title = 'Pobieranie zwrotów z serwera';break;
  case 'bounces': $page_title = 'Lista zwrotów';break;
  case 'bounce': $page_title = 'Podgl±d zwrotu';break;
  case 'spageedit': $page_title = 'Edycja strony rejestrowania';break;
  case 'spage': $page_title = 'Strony rejestrowania';break;
  case 'eventlog': $page_title = 'Dziennik zdarzeñ';break;
  case 'getrss': $page_title = 'Pobieranie nag³ówków RSS';break;
  case 'viewrss': $page_title = 'Wy¶wietlanie nag³ówków RSS';break;
  case 'community': $page_title = 'Witamy w spo³eczno¶ci PHPlist';break;
  case 'vote': $page_title = 'G³osuj na PHPlist';break;
  case 'login': $page_title = 'Zaloguj siê';break;
  case 'logout': $page_title = 'Wylogowanie';break;
  case 'mclicks': $page_title = 'Statystyka klikniêæ wiadomo¶ci'; break;
  case 'uclicks': $page_title = 'Statystyka klikniêæ adresu URL'; break;
  case 'massunconfirm': $page_title = 'Zbiorcze anulowanie potwierdzenia wiadomo¶ci';break;
}
?>
