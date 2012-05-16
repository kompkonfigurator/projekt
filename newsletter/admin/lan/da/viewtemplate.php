<?php 
$lan = array(
  "BackEditTemp" => "Tilbage til rediger skabelon",
  "TempSample" => '

1. Introduktion
 
PHP-Fusion er et letv&aelig;gts content management system (CMS) distribueret som Open Source og skrevet i PHP. PHP-Fusion bruger en MySQL-database til at gemme alt sideindholdet og inkluderer et enkelt men omfattende administrationssystem. PHP-Fusion rummer de fleste af de almindelige funktioner, som man kan forvente af en CMS-l&oslash;sning. 

PHP-Fusion distribueres if&oslash;lge de regler og p&aring; de betingelser, som er angivet i version 2 af den s&aring;kaldte GNU General Public License. For yderligere information om disse regler, bes&oslash;g www.gnu.org eller l&aelig;s den gpl.txt fil, som er vedlagt installationspakken. Du har lov til at &aelig;ndre koden p&aring; alle de m&aring;der, du har lyst til og l&aelig;gge den &aelig;ndrede kode ud til videredistribution enten som den er eller sammen med dine egne &aelig;ndringer. 

Vi s&aelig;tter pris p&aring;, at du beholder teksten og linket "Powered by PHP-Fusion" i bunden af siderne. Efter vores opfattelse er det et rimeligt krav at stille, n&aring;r man tager i betragtning, hvor mange hundrede timer, der er g&aring;et med til at udvikle denne l&oslash;sning. 

Hvis du imidlertid fjerner copyright teksten, s&aring; kunne du jo overveje at give et bidrag til projektet via Paypal.  
2. Installation
 
1.       Upload indholdet af folderen php-files til din server. 

2.       Omd&oslash;b filen blank_config.php til config.php. 

3.       CHMOD f&oslash;lgende filer og mapper til 777: 

·         administration/db_backups/ 

·         images/ 

·         images/imagelist.js 

·         images/articles/ 

·         images/avatars/ 

·         images/news/ 

·         images/news_cats/ 

·         images/photoalbum/ 

·         images/photoalbum/submissions/ 

·         forum/attachments/ 

·         config.php 

4.       Luk din side op i browseren og k&oslash;r scriptet setup.php. http://www.ditdom&aelig;nenavn.dk/setup.php. 

5.       F&oslash;lg instruktionerne p&aring; sk&aelig;rmen, til installationen er f&aelig;rdig.  

6.       CHMOD config.php tilbage til 644 OG slet filen setup.php fra din server. 
 
3. Opgrader fra version v6.00.1xx, v6.00.2xx eller v6.00.3xx
 
F&oslash;r du opgraderer anbefaler vi meget kraftigt, at du laver en sikkerhedskopi af din side og af databasen. Under opgraderingen vil navnene p&aring; tabellerne fra det gamle fotoalbum blive &aelig;ndret. Du kan importere de gamle billeder og de gamle albums ved at bruge den konverter, som er tilg&aelig;ngelig p&aring; supportsiderne. Bem&aelig;rk at denne version indeholder en lang r&aelig;kke strukturelle &aelig;ndringer og at visse dele af l&oslash;sningen ikke vil virke korrekt, f&oslash;r du har opdateret dine filer. 

 

1.       Upload filen upgrade.php svarende til din aktuelle version til folderen administration p&aring; din server. 

2.       Log p&aring; som superadministrator og klik p&aring; Opgradering.  

3.       F&oslash;lg instruktionerne p&aring; sk&aelig;rmen til du ser meddelelsen "Database upgrade complete". 

4.       Upload indholdet i folderen php-files til din server. 

5.       S&oslash;rg for at f&oslash;lgende foldere og filer er CHMOD’et til 777: 

·         images/photoalbum/submissions/ 

·         images/news_cats/ (kun v6.00.1x) 

·         images/imagelist.js (kun v6.00.1x) 
 
4. Sikkerhedstips
 
Her har du nogle gode ideer til, hvordan du bedst kan beskytte din side: 

S&oslash;rg for at filen config.php ikke kan &aelig;ndres (den skal CHMOD’es til 644). 
Lad aldrig filen setup.php blive liggende p&aring; din server efter installationen. 
S&oslash;rg for at kodeord til FTP og MySQL er forskellige. 
Tillad aldrig tilf&oslash;jelsestyperne php, html og exe eller nogen som helst form for tekst-format. 
 
5. Support sider
 
Hvis du har sp&oslash;rgsm&aring;l til eller problemer med anvendelsen af PHP-Fusion, s&aring; kan du altid bes&oslash;ge hovedsiden p&aring; adressen: http://www.php-fusion.co.uk/ og l&aelig;gge en besked i debatten. Alternativt kan du bes&oslash;ge vores chat support p&aring; irc.outerweb.org/phpfusion.

Du kan tilf&oslash;je funktionalitet til PHP-Fusion ved at installere s&aring;kaldte Infusioner. Infusioner er tilf&oslash;jelser til l&oslash;sningen, som er meget lette at installere. Du kan finde en lang r&aelig;kke brugbare infusioner p&aring; siden http://www.phpfusion-mods.com/.

Hvis du ikke er tilfreds med de temaer, som f&oslash;lger med installationspakken, kan du overveje at bes&oslash;ge den officielle temaside p&aring; adressen: http://www.phpfusion-themes.com/ hvor du kan finde en lang r&aelig;kke andre temaer i h&oslash;j kvalitet. 

PHP-Fusion har ogs&aring; et stort antal nationale st&oslash;ttesider p&aring; forskellige sprog – dem kan du finde her:

Arabisk, Belgisk, Bulgarsk, Bosnisk, Kroatisk, Dansk, Fransk, Tysk, Ungarsk, Iransk, Italiensk, Litauisk, Hollandsk, Polsk, Russisk, Svensk, Taiwan-kinesisk og Tyrkisk
 
6. Tak til …
 
Tak til f&oslash;lgende for deres bidrag:

Shedrock – Supplerende temaer og administrationsikoner
Janmol – Markedsunders&oslash;gelser og bidrag til design
KEFF – En masse fjollede ideer, der viste sig ikke at v&aelig;re s&aring; fjollede!
Rayxen – Supplerende kode og systemtilpasninger
Sheldon – Teknisk support og hosting

Generelt: Tak til det store og aktive PHP-Fusion-f&aelig;llesskab for ideer, bidrag, kritik og l&oslash;sninger, der har medvirket til og ogs&aring; fremtidigt medvirker til at g&oslash;re PHP-Fusion til en af de bedste bud p&aring; en nem, effektiv og sikker CMS-l&oslash;sning.

3-parts scripts eller l&oslash;sninger:
TinyMCE v2.0.6.1 – En HTML WYSIWYG editor lavet af Moxiecode.
PHPMailer - En sendmail klasse med support for SMTP support af Brent R. Matzelle.
HTTPDownload – En download h&aring;ndterings klasse af Nguyen Quoc Bao.
 
',
);
?>