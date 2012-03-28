<h2>Create a New User</h2>
<? if ($message) : ?>
	<h3 class="message">
		<?= $message; ?>
	</h3>
<? endif; ?>

<?= Form::open('user/create'); ?>

<?= Form::label('username', 'Username'); ?>
<?= Form::input('username', HTML::chars(Arr::get($_POST, 'username'))); ?>
<div class="error">
	<?= Arr::get($errors, 'username'); ?>
</div>

<?= Form::label('email', 'Email Address'); ?>
<?= Form::input('email', HTML::chars(Arr::get($_POST, 'email'))); ?>
<div class="error">
	<?= Arr::get($errors, 'email'); ?>
</div>

<?= Form::label('password', 'Password'); ?>
<?= Form::password('password'); ?>
<div class="error">
	<?= Arr::path($errors, '_external.password'); ?>
</div>

<?= Form::label('password_confirm', 'Confirm Password'); ?>
<?= Form::password('password_confirm'); ?>
<div class="error">
	<?= Arr::path($errors, '_external.password_confirm'); ?>
</div>

<?= Form::submit('create', 'Create User'); ?>
<?= Form::close(); ?>

<p>Or <?= HTML::anchor('user/login', 'login'); ?> if you have an account already.</p>