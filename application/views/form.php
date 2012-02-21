<?php print form::open(); ?>
<table border="1" cellpadding="0" cellspacing="0">
<tr><td><select id="sel_sock" name="sel_sock" onchange="select_sock(this.value);">
<option value="nie"></option>
<option value="Socket 775">Socket 775</option>
<option value="Socket AM2">Socket AM2</option>
<option value="Socket AM3">Socket AM3</option>
<option value="Socket 1155">Socket 1155</option>
<option value="Socket 1156">Socket 1156</option>
<option value="Socket 1366">Socket 1366</option>
</select>
</td><td>Płyta Główna:</td><td><?php print form::select('komp_plyta', NULL, NULL, array('style' => 'width:300px', 'class' => 'sock_depend', 'onchange' => 'zmiana(selectedIndex, "procesor_cena", "procesor");')); ?></td><td class="sock_dep_price" id="plyta_cena" class="cena"></td><td id="plyta_link"></td><td id="plyta_opis"></td><td id="plyta_sklep"><?php print form::select('komp_plyta_sklep', NULL, NULL, array('style' => 'width:200px', 'class' => 'sock_depend', 'onchange' => 'zmiana_shop(selectedIndex, \'plyta_cena\', \'plyta\', komp_plyta.selectedIndex);'),NULL,'standard'); ?></td></tr>

<tr><td></td><td>Procesor:</td><td> f.select(:procesor, {:" --- WYBIERZ SOCKET ! ---" => 'lol'} , {}, {:size => "0",:style => "width:300px",:class => "sock_depend", :onchange => "zmiana(selectedIndex, 'procesor_cena', 'procesor');"}) </td><td class="sock_dep_price" id="procesor_cena" class="cena"></td><td id="procesor_link"></td><td id="procesor_opis"></td><td id="procesor_sklep"> f.select :procesor_sklep, {}, {}, {:size => "0",:style => "width:200px",:onchange => "zmiana_shop(selectedIndex, 'procesor_cena', 'procesor', komp_procesor.selectedIndex);"} </td></tr>

<tr><td></td><td>Pamięć:</td><td> f.select(:pamiec, {:" --- WYBIERZ SOCKET ! ---" => 'lol'} , {}, {:size => "0",:style => "width:300px",:class => "sock_depend", :onchange => "zmiana(selectedIndex, 'pamiec_cena', 'pamiec');"}) </td><td class="sock_dep_price" id="pamiec_cena" class="cena"></td><td id="pamiec_link"></td><td id="pamiec_opis"></td><td id="pamiec_sklep"> f.select :pamiec_sklep, {}, {}, {:size => "0",:style => "width:200px",:onchange => "zmiana_shop(selectedIndex, 'pamiec_cena', 'pamiec', komp_pamiec.selectedIndex);"} </td></tr>

<!--<tr><td></td><td>Pamięć2:</td><td> f.select(:pamiec2, {:" --- WYBIERZ SOCKET ! ---" => 'lol'} , {}, {:size => "0",:style => "width:300px",:class => "sock_depend", :onchange => "zmiana(selectedIndex, 'pamiec2_cena', 'pamiec2');"}) </td><td class="sock_dep_price" id="pamiec2_cena" class="cena"></td><td id="pamiec2_link"></td><td id="pamiec2_opis"></td><td id="pamiec2_sklep"> f.select :pamiec2_sklep, {}, {}, {:size => "0",:style => "width:200px",:onchange => "zmiana_shop(selectedIndex, 'pamiec2_cena', 'pamiec2', komp_pamiec2.selectedIndex);"} </td></tr>-->

<tr><td></td><td>Karta graficzna:</td><td> f.select(:karta_graf, {}, {}, {:size => "0",:style => "width:300px",:onchange => "zmiana(selectedIndex, 'karta_graf_cena', 'karta_graf');"}) </td><td id="karta_graf_cena" class="cena"></td><td id="karta_graf_link"></td><td id="karta_graf_opis"></td><td id="karta_graf_sklep"> f.select :karta_graf_sklep, {}, {}, {:size => "0",:style => "width:200px",:onchange => "zmiana_shop(selectedIndex, 'karta_graf_cena', 'karta_graf', komp_karta_graf.selectedIndex);"} </td></tr>

<tr><td></td><td>Dysk:</td><td> f.select(:dysk, {}, {}, {:size => "0",:style => "width:300px",:onchange => "zmiana(selectedIndex, 'dysk_cena', 'dysk');"}) </td><td id="dysk_cena" class="cena"></td><td id="dysk_link"></td><td id="dysk_opis"></td><td id="dysk_sklep"> f.select :dysk_sklep, {}, {}, {:size => "0",:style => "width:200px",:onchange => "zmiana_shop(selectedIndex, 'dysk_cena', 'dysk', komp_dysk.selectedIndex);"} </td></tr>

<!--<tr><td></td><td>Dysk2:</td><td> f.select(:dysk2, {}, {}, {:size => "0",:style => "width:300px",:onchange => "zmiana(selectedIndex, 'dysk2_cena', 'dysk2');"}) </td><td id="dysk2_cena" class="cena"></td><td id="dysk2_link"></td><td id="dysk2_opis"></td><td id="dysk2_sklep"> f.select :dysk2_sklep, {}, {}, {:size => "0",:style => "width:200px",:onchange => "zmiana_shop(selectedIndex, 'dysk2_cena', 'dysk2', komp_dysk2.selectedIndex);"} </td></tr>

<tr><td></td><td>Dysk3:</td><td> f.select(:dysk3, {}, {}, {:size => "0",:style => "width:300px",:onchange => "zmiana(selectedIndex, 'dysk3_cena', 'dysk3');"}) </td><td id="dysk3_cena" class="cena"></td><td id="dysk3_link"></td><td id="dysk3_opis"></td><td id="dysk3_sklep"> f.select :dysk3_sklep, {}, {}, {:size => "0",:style => "width:200px",:onchange => "zmiana_shop(selectedIndex, 'dysk3_cena', 'dysk3', komp_dysk3.selectedIndex);"} </td></tr>-->

<tr><td></td><td>Obudowa:</td><td> f.select(:obudowa, {}, {}, {:size => "0",:style => "width:300px",:onchange => "zmiana(selectedIndex, 'obudowa_cena', 'obudowa');"}) </td><td id="obudowa_cena" class="cena"></td><td id="obudowa_link"></td><td id="obudowa_opis"></td><td id="obudowa_sklep"> f.select :obudowa_sklep, {}, {}, {:size => "0",:style => "width:200px",:onchange => "zmiana_shop(selectedIndex, 'obudowa_cena', 'obudowa', komp_obudowa.selectedIndex);"} </td></tr>

<tr><td></td><td>Zasilacz:</td><td> f.select(:zasilacz, {}, {}, {:size => "0",:style => "width:300px",:onchange => "zmiana(selectedIndex, 'zasilacz_cena', 'zasilacz');"}) </select></td><td id="zasilacz_cena" class="cena"></td><td id="zasilacz_link"></td><td id="zasilacz_opis"></td><td id="zasilacz_sklep"> f.select :zasilacz_sklep, {}, {}, {:size => "0",:style => "width:200px",:onchange => "zmiana_shop(selectedIndex, 'zasilacz_cena', 'zasilacz', komp_zasilacz.selectedIndex);"} </td></tr>

<tr><td></td><td>Napęd:</td><td> f.select(:naped, {}, {}, {:size => "0",:style => "width:300px",:onchange => "zmiana(selectedIndex, 'naped_cena', 'naped');"}) </td><td id="naped_cena" class="cena"></td><td id="naped_link"></td><td id="naped_opis"></td><td id="naped_sklep"> f.select :naped_sklep, {}, {}, {:size => "0",:style => "width:200px",:onchange => "zmiana_shop(selectedIndex, 'naped_cena', 'naped', komp_naped.selectedIndex);"} </td></tr>

<tr><td></td><td>Karta muzyczna:</td><td> f.select(:karta_muz, {}, {}, {:size => "0",:style => "width:300px",:onchange => "zmiana(selectedIndex, 'karta_muz_cena', 'karta_muz');"}) </td><td id="karta_muz_cena" class="cena"></td><td id="karta_muz_link"></td><td id="karta_muz_opis"></td><td id="karta_muz_sklep"> f.select :karta_muz_sklep, {}, {}, {:size => "0",:style => "width:200px",:onchange => "zmiana_shop(selectedIndex, 'karta_muz_cena', 'karta_muz', komp_karta_muz.selectedIndex);"} </td></tr>

<tr><td></td><td>Mysz:</td><td> f.select(:mysz, {}, {}, {:size => "0",:style => "width:300px",:onchange => "zmiana(selectedIndex, 'mysz_cena', 'mysz');"}) </td><td id="mysz_cena" class="cena"></td><td id="mysz_link"></td><td id="mysz_opis"></td><td id="mysz_sklep"> f.select :mysz_sklep, {}, {}, {:size => "0",:style => "width:200px",:onchange => "zmiana_shop(selectedIndex, 'mysz_cena', 'mysz', komp_mysz.selectedIndex);"} </td></tr>

<tr><td></td><td>Klawiatura:</td><td> f.select(:klawiatura, {}, {}, {:size => "0",:style => "width:300px",:onchange => "zmiana(selectedIndex, 'klawiatura_cena', 'klawiatura');"}) </td><td id="klawiatura_cena" class="cena"></td><td id="klawiatura_link"></td><td id="klawiatura_opis"></td><td id="klawiatura_sklep"> f.select :klawiatura_sklep, {}, {}, {:size => "0",:style => "width:200px",:onchange => "zmiana_shop(selectedIndex, 'klawiatura_cena', 'klawiatura', komp_klawiatura.selectedIndex);"} </td></tr>

<tr><td colspan="3" align="right">Suma</td><td id="suma" colspan="3" align="left"></td></tr></table>