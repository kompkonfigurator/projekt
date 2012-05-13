<div class="pudelko"><center><h3>Rejestracja</h3>
<? if ($message) : ?>
	<h3 class="message">
		<?= $message; ?>
	</h3>
<? endif; ?>
<br/>
<br/>
<?= Form::open('user/create'); ?>

<div class="rejestracja"><?= Form::label('username', 'Podaj nazwę użytkownika : '); ?></div> <br/>
<div class="inputy"><?= Form::input('username', HTML::chars(Arr::get($_POST, 'username'))); ?></div>
<div class="error">
	<?= Arr::get($errors, 'username'); ?>
</div>
<br/>
<br/>
<div class="rejestracja"><?= Form::label('email', 'Podaj adress email : '); ?></div> <br/>
<?= Form::input('email', HTML::chars(Arr::get($_POST, 'email'))); ?>
<div class="error">
	<?= Arr::get($errors, 'email'); ?>
</div>
<br/>
<br/>

<div class="rejestracja"><?= Form::label('password', 'Podaj hasło : '); ?></div> <br/>
<?= Form::password('password'); ?>
<div class="error">
	<?= Arr::path($errors, '_external.password'); ?>
</div>
<br/>
<br/>

<div class="rejestracja"><?= Form::label('password_confirm', 'Powtórz hasło : '); ?></div> <br/>
<?= Form::password('password_confirm'); ?>
<div class="error">
	<?= Arr::path($errors, '_external.password_confirm'); ?>
</div>
<br/>
<br/>
<br/>
<br/>

<?= Form::submit('create', 'Zarejestruj'); ?>
<?= Form::close(); ?>
</center>
<p style="text-align:center">Or <?= HTML::anchor('user/login', 'login'); ?> if you have an account already.</p>
</div>
