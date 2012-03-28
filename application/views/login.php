<h2><?php echo $title?></h2>
<?php
echo  Form::open('/auth/login', array('class'=>'form')).
'<fieldset>'.
    '<legend>'.__('Fill the fields').'</legend>'.
            //$error.
            Form::label('username', __('Nick').':').
            Form::input('username').'<br />'.
 
            Form::label('password', __('Password').':').
            Form::password('password').'<br />'.
 
'</fieldset>'.
Form::submit('submit', __('Login')).
Form::close();
?>

