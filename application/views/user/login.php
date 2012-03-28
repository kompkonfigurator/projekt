<h2>Login</h2>
<? if ($message) : ?>
	<h3 class="message">
		<?= $message; ?>
	</h3>
<? endif; ?>

<?= Form::open('user/login'); ?>

<?= Form::label('username', 'Username'); ?>
<?= Form::input('username', HTML::chars(Arr::get($_POST, 'username'))); ?>

<?= Form::label('password', 'Password'); ?>
<?= Form::password('password'); ?>

<?= Form::label('remember', 'Remember Me'); ?>
<?= Form::checkbox('remember'); ?>

<p>(Remember Me keeps you logged in for 2 weeks)</p>

<?= Form::submit('login', 'Login'); ?>
<?= Form::close(); ?>

<p>Or <?= HTML::anchor('user/create', 'create a new account'); ?></p>