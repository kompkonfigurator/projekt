Puoi usare tre metodi per impostare la riga del mittente (Da):
<ul>
<li>Una parola: sar&agrave; riformattato come &lt;la parola&gt;@<?php echo $domain?>
<br>Per esempio: <b>informazioni</b> diventer&agrave; <b>informazioni@<?php echo $domain?></b>
<br>In molti programmi per email il messaggio verr&agrave; visualizzato come proveniente da <b>informazioni@<?php echo $domain?></b>
<li>Due o pi&ugrave; parole: sar&agrave; riformattato con <i>le parole che hai scritto</i> &lt;listmaster@<?php echo $domain?>&gt;
<br>Per esempio: <b>info news</b> diventer&agrave; <b>info news &lt;listmaster@<?php echo $domain?>&gt;</b>
<br>In molti programmi email il messaggio verr&agrave; visualizzato come proveniente da <b>info news</b>
<li>Nessuna o pi&ugrave; parole e un indirizzo email: sar&agrave; riformattato come <i>Parole</i> &lt;indirizzoemail&gt;
<br>Per esempio: <b>Mio nome mio@email.it</b> diventer&agrave; <b>Mio nome &lt;mio@email.it&gt;</b>
<br>In molti programmi email il messaggio verr&agrave; visualizzato come proveniente da <b>Mio nome</b>
