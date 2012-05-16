<h2><?php echo __('Create a New User')?></h2>
<? if ($message) : ?>
	<h3 class="message">
		<?= $message; ?>
	</h3>
<? endif; ?>

<?= Form::open('user/create'); ?>

<?= Form::label('username', __('Username')); ?>
<?= Form::input('username', HTML::chars(Arr::get($_POST, 'username'))); ?>
<div class="error">
	<?= Arr::get($errors, 'username'); ?>
</div>

<?php echo __('Email Address')?>

<?= Form::input('email', HTML::chars(Arr::get($_POST, 'email'))); ?>
<div class="error">
	<?= Arr::get($errors, 'email'); ?>
</div>

<?= Form::label('password', __('Password')); ?>
<?= Form::password('password'); ?>
<div class="error">
	<?= Arr::path($errors, '_external.password'); ?>
</div>

<?= Form::label('password_confirm', __('Confirm Password')); ?>
<?= Form::password('password_confirm'); ?>
<div class="error">
	<?= Arr::path($errors, '_external.password_confirm'); ?>
</div>

<?= Form::submit('create', __('Create User')); ?>
<?= Form::close(); ?>

<p><?= HTML::anchor('user/login', __('login')); echo __(' if you have an account already.')?></p>