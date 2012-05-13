<div class="pudelko"><center><div class="naglowek">Zaloguj się</div>
<br/>
<br/>
<br/>
<? if ($message) : ?>
	<h3 class="message">
		<?= $message; ?>
	</h3>
<? endif; ?>
<br/>
<br/>
<?= Form::open('user/login'); ?>

<div class="rejestracja"><?= Form::label('username', 'Podaj nazwę użytkownika : '); ?></div><br/>
<?= Form::input('username', HTML::chars(Arr::get($_POST, 'username'))); ?>
<br/>
<br/>
<br/>

<div class="rejestracja"><?= Form::label('password', 'Podaj hasło : '); ?></div><br/>
<?= Form::password('password'); ?>
<br/>
<br/>
<br/>

<div class="rejestracja"><?= Form::label('remember', 'Zapamietaj mnie : '); ?></div><br/>
	<?= Form::checkbox('remember'); ?>
	<br/><br/>

<p style="text-align:center;color:#05cb24;font-weight:bold;font-size:13px;">Opcja przetrzymuje twoje zalogowanie przez 2 tygodnie!</p>
<br/>
<br/>

<p><?= Form::submit('login', 'Zaloguj'); ?></p>
<?= Form::close(); ?>
</center>
<br/>
<br/>
<p style="text-align:center;color:white;font-weight:bold">Lub <?= HTML::anchor('user/create', 'stwórz nowe konto : '); ?></p>
</div>
