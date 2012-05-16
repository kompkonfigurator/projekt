<div class="pudelko"><center><div class="naglowek"><?php echo __('Log in')?></div>
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

<div class="rejestracja"><?= Form::label('username', __('Username')); ?></div><br/>
<?= Form::input('username', HTML::chars(Arr::get($_POST, 'username'))); ?>
<br/>
<br/>
<br/>

<div class="rejestracja"><?= Form::label('password', __('Password')); ?></div><br/>
<?= Form::password('password'); ?>
<br/>
<br/>
<br/>

<div class="rejestracja"><?= Form::label('remember', __('Remember me')); ?></div><br/>
	<?= Form::checkbox('remember'); ?>
	<br/><br/>

<p style="text-align:center;color:#05cb24;font-weight:bold;font-size:13px;"><?php echo __('Remember Me keeps you logged in for 2 weeks')?></p>
<br/>
<br/>

<p><?= Form::submit('login', __('Log in')); ?></p>
<?= Form::close(); ?>
</center>
<br/>
<br/>
<p style="text-align:center;color:white;font-weight:bold"><?php echo __('or')?> <?= HTML::anchor('user/create', __('create new account')); ?></p>
</div>
