<p>Qu&igrave; puoi definire i template che possono essere usati nelle email da inviare alle liste. 
Un template &egrave; una pagina HTML che contiene dei <i>segnaposto</i> (placeholders) <b>[CONTENT]</b>. Da posizionare dove andr&agrave; inserito il testo per l'email. </P>
<p>In pi&ugrave; a [CONTENT] puoi aggiungere [FOOTER] e [SIGNATURE] per inserire informazioni a pi&egrave; di 
pagina e la firma del messaggio, ma &egrave; opzionale.</p>
<p>Le immagini del tuo template saranno inserite nelle email. Se aggiungi un'immagine al contenuto dei tuoi 
messaggi, &egrave; necessario che che riporti l'URL completo del'immagine.</p>
<p><b>User Tracking - Tracciamento Utenti</b></p>
<p>Per facilitare il tracciamento degli utenti, aggiungi [USERID] al tuo template, e sar&agrave; sostituito 
dall'identificatore dell'utente. Funziona solamente quando invii le email in HTML. Dovrai impostare alcune 
URL per la ricezione dell'ID. In alternativa puoi usare il tracciamento incorporato utenti di <?php echo NAME?>. 
Per usarlo aggiungi [USERTRACK] al tuo template e alla 
tua email verr&agrave; aggiunto un collegamento invisibile per tracciare la sua visualizzazione.</p>
<p><b>Immagini</b></p>
<p>Ogni riferimento alle immagini che non inizi con "http://" dovrebbe essere caricato e incluso nell'email. &Egrave; consigliato usare solo poche immagini e di piccole dimensioni. Se carichi il 
tuo template dovresti riuscire ad aggiungere anche le tu immagini. I riferimenti alle immagini che andranno 
incluse devono essere nella stessa cartella , esempio &lt;img&nbsp;src=&quot;image.jpg&quot;&nbsp;......&nbsp;&gt; 
e non  &lt;img&nbsp;src=&quot;/some/directory/location/image.jpg&quot;&nbsp;..........&nbsp;&gt;</p>
