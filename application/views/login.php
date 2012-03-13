<h1><?php echo $title?></h1>
<?php
echo  Form::open('/auth/login').
    '<fieldset>'.
        '<legend>'.__('Fill the fields').'</legend>'.
        $error.
        Form::label('nick', __('Nick').':').
        Form::input('nick', $data['nick']).'<br />'.
 
        Form::label('pass', __('Password').':').
        Form::password('pass', $data['pass']).'<br />'.
    '</fieldset>'.
    Form::submit('submit', __('Login')).
Form::close();?>