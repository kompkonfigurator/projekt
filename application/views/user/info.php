<h2><?php echo __('Info for  user ')?>"<?= $user->username; ?>"</h2>

<ul>
	<li>Email: <?= $user->email; ?></li>
	<li><?php echo __('Number of logins')?>: <?= $user->logins; ?></li>
	<li><?php echo __('Last Login')?>: <?= Date::fuzzy_span($user->last_login); ?></li>
</ul>

<?= HTML::anchor('user/logout', __('Logout')); ?>