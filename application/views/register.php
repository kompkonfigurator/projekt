<h2><?php echo $title?></h2>
<?php echo  Form::open('/register', array('class'=>'form'))?>
<fieldset>
<legend><?php echo __('Fill the fields')?></legend>

    <?php echo Form::label('email', __('E-mail').': ').Form::input('email',Arr::get($data, 'email'))?> <span class="red"><?php echo Arr::get($errors, 'email');?></span><br />
    <?php echo Form::label('username', __('Nick').': ').Form::input('username', Arr::get($data, 'username'))?> <span class="red"><?php echo Arr::get($errors, 'username');?></span><br />

    <?php echo Form::label('password', __('Password').': ').Form::password('password', Arr::get($data, 'password'))?> <span class="red"><?php echo Arr::get($errors, 'password');?></span><br />
    <?php echo Form::label('password_confirm', __('Confirm password').': ').Form::password('password_confirm', Arr::get($data, 'password_confirm'))?> <span class="red"><?php echo Arr::get($errors, 'password_confirm');?></span><br />
</fieldset>
<?php echo Form::submit('submit', __('Register')).Form::close();?><br />

