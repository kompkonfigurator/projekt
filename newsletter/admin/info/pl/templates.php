<p>Tutaj mo¿esz zdefiniowaæ szablony, których bêdzie mo¿na u¿yæ podczas wysy³ania wiadomo¶ci do list wysy³kowych. Szablon jest 
stron± HTML z umieszczonym <i>Symbolem</i> <b>[CONTENT]</b>. To bêdzie miejsce gdzie
zostanie wstawiona tre¶æ wiadomo¶ci. </P>
<p>Dodatkowo oprócz [CONTENT], mo¿esz dodaæ [FOOTER] oraz [SIGNATURE] aby wstawiæ stopkê oraz podpis wiadomo¶ci, ale nie jest to konieczne.</p>
<p>Obrazy z szblonów zostan± umieszczone w wiadomo¶ci. Je¶li dodasz obrazy w tre¶ci wiadomo¶ci (podczas redagowania), bêd± one musia³y zawieraæ kopletny URL i nie bêd± do³±czone do wiadomo¶ci.</p>
<p><b>¦ledzenie u¿ytkowników</b></p>
<p>Aby u³atwiæ ¶ledzenie u¿ytkowników, mo¿esz dodaæ [USERID] do szablonu, co zostanie zast±pione identyfikatorem u¿ytkownika. To zadzia³a tylo przy wysy³aniu wiadomo¶ci email w formacie HTML. Musisz skonfigurowaæ adres URL, do otrzymywania ID. Ewentualnie mo¿esz uzyæ wbudowanego w <?php echo NAME?> ¶ledzenia u¿ytkowników. Aby to zrobiæ, dodaj [USERTRACK] do szablonu co spowoduje dodanie niewidocznego linku do wiadomo¶ci w celu ¶ledzenia wy¶wietleñ wiadomo¶ci.</p>
<p><b>Obrazy</b></p>
<p>Ka¿de odniesienie do obrazu, które nie zaczyna sie od "http://" mo¿e (i powinno) zostaæ do³±czone do wiadomo¶ci. Zaleca siê korzystaæ z kilku bardzo ma³ych obrazów. Je¶li prze¶lesz szablon, bêdziesz móg³ dodaæ zdjêcia. Odniesienia do pbrazów, które maj± byæ do³±czone powinny byæ z tego samego katalogu, tj. &lt;img&nbsp;src=&quot;image.jpg&quot;&nbsp;......&nbsp;&gt; a nie &lt;img&nbsp;src=&quot;/lokalizacja/jakiego¶/katalogu/obraz.jpg&quot;&nbsp;..........&nbsp;&gt;</p>
