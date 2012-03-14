<h1><?php echo "Logowanie : "?></h1>
<br/>
<br/>
<?php
echo  Form::open('/auth/login').
    '<fieldset>'.
        '<legend>'.__('Pole logowania').'</legend>'.
        $error.
        Form::label('nick', __('Login').':').'<br/>'.
        Form::input('nick', $data['nick']).'<br />'.
 
        Form::label('pass', __('Hasło').':').'<br/>'.
        Form::password('pass', $data['pass']).'<br />'.
    '</fieldset>'.'<br/>'.'<br/>'.
    Form::submit('submit', __('Zaloguj')).
Form::close();?>
