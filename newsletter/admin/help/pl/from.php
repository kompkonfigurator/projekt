Mo¿na u¿yæ trzech róznych metod aby ustawiæ liniê "Od":
<ul>
<li>Jeden wyraz: zostanie przekszta³cony w &lt;wyraz&gt;@<?php echo $domain?>
<br>Na przyk³ad: <b>biuro</b> bêdzie wy¶wietlony jako <b>biuro@<?php echo $domain?></b>
<br>W wiêkszo¶ci programów pocztowych zostanie to wy¶wietlone jako <b>biuro@<?php echo $domain?></b>
<li>Dwa lub wiêcej wyrazów: zostanie przekszta³cone w <i>wyrazy ktore wpiszesz</i> &lt;biuro@<?php echo $domain?>&gt;
<br>Na przyk³ad: <b>wykaz informacji</b> bêdzie wy¶wietlony jako <b>wykaz informacji &lt;biuro@<?php echo $domain?>&gt; </b>
<br>W wiekszo¶ci programów pocztowych zostanie to wy¶wietlone jako <b>wykaz informacji</b>
<li>Zero lub wiêcej wyrazów oraz adres email: zostanie przekszta³cone w <i>Wyrazy</i> &lt;adresemail&gt;
<br>Na przyk³ad: <b>Moje Nazwisko moj@email.pl</b> bêdzie wy¶wietlony jako <b>Moje Nazwisko &lt;moj@email.pl&gt;</b>
<br>W wiekszo¶ci programów pocztowych zostanie to wy¶wietlone jako <b>Moje Nazwisko</b>
