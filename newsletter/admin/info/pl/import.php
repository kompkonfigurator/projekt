
<p>

<h1>Importowanie adresów email do istniej±cych list</h1>

Istniej± cztery sposoby aby zaimportowaæ istniej±ce informacje:

<ul>
<li><?php echo PageLink2("import2","Import adresów z ró¿nymi warto¶ciami dla atrybutów");?>. Lista adresów email mo¿e mieæ niezdefiniowane atrybuty. Zostan± one utworzone automatycznie jako "pole tekstowe". Powieniene¶ u¿yæ tego sposobu, je¶li importujesz plik arkusza kalkulacyjnego / CSV, który ma atrybuty dla u¿ytkowników w kolumnach oraz jednego u¿ytkownika na wiersz. <br/><br/>
<li><?php echo PageLink2("import1","Import adresów z tymi samymi warto¶ciami dla atrybutów");?>. Lista adresów email bêdzie musia³a odpowiadaæ strukturze, któr± ju¿ ustawi³e¶ w <?php echo NAME?>. Powieniene¶ u¿yæ tego sposobu, je¶li importujesz prost± listê adresów email. Mo¿esz potem spracyzowaæ warto¶ci atrybutów dla ka¿dego wpisu. Bêd± one takie same dla wszystkich importowanych adresów.<br/><br/>
<li><?php echo PageLink2("import3","Import adresów z konta IMAP");?>. Ten sposób umo¿liwia odszukanie adresów email w Twoich folderach IMAP i dodanie ich. Tylko Nazwa osoby mo¿e byæ podana jako atrybut.<br/><br/>
<li><?php echo PageLink2("import4","Import adresów z innej bazy danych");?>.
</ul>

</p>
