<div class="pudelko"><center><div class="naglowek">Użytkownik :  "<?= $user->username; ?>"</div>
<br/>
<br/>
<ul>
	<div class="rejestracja"><li>Email : <?= $user->email; ?></li></div><br/><br/>
	<div class="rejestracja"><li>Liczba logowań: <?= $user->logins; ?></li></div><br/><br/>
	<div class="rejestracja"><li>Ostatnie logowanie: <?= Date::fuzzy_span($user->last_login); ?></li></div><br/><br/>
</ul>
</center>

<p style="text-align:center;"><?= HTML::anchor('user/logout', 'Wyloguj'); ?></p>
</div>
