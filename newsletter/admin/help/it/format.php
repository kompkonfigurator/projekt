<h3>Formato del messaggio</h3>
Se usi "auto detect" il messaggio verr&agrave; classificato come HTML quando viene trovato nel testo un tag HTML (&lt; ... &gt;).
</p><p><b>&Egrave; pi&ugrave; sicuro lasciare impostato "Auto detect"</b></p><p>
Se non sei sicuro che "auto detect" funzioni e il messaggio che stai usando &egrave; in formato in HTML, scegli "HTML".
I riferimenti ad elementi esterni (es. immagini) devono avere l'URL completa, compreso http:// (a differenza delle immagini usate per i template).
Per tutto il resto sei completamente responsabile per la formattazione del testo.
<p>Se vuoi che un messaggio sia in formato testo semplice, seleziona "Testo".
</p><p>
Questa informazione &egrave; usata per creare una versione in testo semplice del testo formattato in HTML o viceversa (testo HTML di un messaggio in testo semplice). 
La formattazione funziona in questo modo:<br/>
Testo originale in HTML -&gt; testo<br/>
<ul>
<li>Il testo in <b>grassetto</b> risulter&agrave; all'interno di due <b>*-caratteri</b>, il testo in <b>corsivo</b> tra due <b>/-caratteri</b></li>
<li>I link presenti nel testo saranno sostituiti con il testo, seguito dall'URL tra virgolette</li>
<li>I grossi blocchi di testo saranno mandati a capo ogni 70 caratteri</li>
</ul>
Testo originale in formato testuale -&gt; HTML<br/>
<ul>
<li>Due a capo saranno sostituiti da un &lt;p&gt; (paragrafo)</li>
<li>Un singolo a capo sar&agrave; sostituito da un &lt;br /&gt; (a capo)</li>
<li>Gli indirizzi email saranno saranno resi cliccabili</li>
<li>Le URL saranno rese cliccabili. Le URL sono riconosciute come tali se in una di queste forme:<br/>
<ul><li>http://some.website.url/some/path/somefile.html
<li>www.websiteurl.com
</ul>
I link creati avranno la classe classe "url" e target "_blank" nei fogli di stile.
</ul>
<b>Attenzione</b>: se indichi che il tuo messaggio &egrave; di testo semplice e incolli del testo in HTML, questo verr&agrave; inviato come tale anche agli utenti che hanno indicato di voler ricevere messaggi in formato testo semplice.
