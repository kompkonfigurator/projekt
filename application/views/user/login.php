<h2>Login</h2>
<? if ($message) : ?>
	<h3 class="message">
		<?= $message; ?>
	</h3>
<? endif; ?>

<?= Form::open('user/login'); ?>

<?= Form::label('username', __('Username')); ?>
<?= Form::input('username', HTML::chars(Arr::get($_POST, 'username'))); ?>

<?= Form::label('password', __('Password')); ?>
<?= Form::password('password'); ?>

<?= Form::label('remember', __('Remember Me')); ?>
<?= Form::checkbox('remember'); ?>

<p><?php echo __('Remember Me keeps you logged in for 2 weeks') ?></p>

<?= Form::submit('login', __('Login')); ?>
<?= Form::close(); ?>

<p><?php echo __('or')?> <?= HTML::anchor('user/create', __('create a new account')); ?></p>