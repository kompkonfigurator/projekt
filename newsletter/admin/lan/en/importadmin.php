<?php
$lan = array(
  'File is either to large or does not exist.' => 'File is either to large or does not exist.',
  'No file was specified.' => 'No file was specified.',
  'Some characters that are not valid have been found. These might be delimiters. Please check the file and select the right delimiter. Character found:' => 'Some characters that are not valid have been found. These might be delimiters. Please check the file and select the right delimiter. Character found:',
  'Name cannot be empty' => 'Name cannot be empty',
  'Name is not unique enough' => 'Name is not unique enough',
  'Cannot find the email in the header' => 'Cannot find the email in the header',
  'Cannot find the password in the header' => 'Cannot find the password in the header',
  'Cannot find the loginname in the header' => 'Cannot find the loginname in the header',
  'Record has no email' => 'Record has no email',
  'Invalid Email' => 'Invalid Email',
  'Record has more values than header indicated, this may cause trouble' => 'Record has more values than header indicated, this may cause trouble',
  'password' => 'password',
  'loginname' => 'loginname',
  'Empty loginname, using email:' => 'Empty loginname, using email:',
  'Value' => 'Value',
  'added to attribute' => 'added to attribute',
  'new email was' => 'new email was',
  'new emails were' => 'new emails were',
  'email was' => 'email was',
  'emails were' => 'emails were',
  'All the emails already exist in the database' => 'All the emails already exist in the database',
  'succesfully imported to the database and added to the system.' => 'succesfully imported to the database and added to the system.',
  'Import some more emails' => 'Import some more emails',
  'No default permissions have been defined, please create default permissions first, by creating one dummy admin and assigning the default permissions to this admin' => 'No default permissions have been defined, please create default permissions first, by creating one dummy admin and assigning the default permissions to this admin',
  
  # do not translate email, loginname and password
  'importadmininfo' => '
  The file you upload will need to contain the administrators
you want to add to the system. The columns need to have the following headers: <b>email</b>, <b>loginname</b>, <b>password</b>. Any other columns will be added as admin attributes.
 <b>Warning</b>: the file needs to be plain text. Do not upload binary files like a Word Document.
  ',
  'File containing emails' => 'File containing emails',
  'Field Delimiter' => 'Field Delimiter',
  'Record Delimiter' => 'Record Delimiter',
  'importadmintestinfo' => 'If you check "Test Output", you will get the list of parsed emails on screen, and the database will not be filled with the information. This is useful to find out whether the format of your file is correct. It will only show the first 50 records.',
  # this should be the same as the term between quotes in the previous one
  'Test output' => 'Test output',
  'Check this box to create a list for each administrator, named after their loginname' => 'Check this box to create a list for each administrator, named after their loginname',
  'Do Import' => 'Do Import',
  'default is TAB' => 'default is TAB',
  'default is line break' => 'default is line break',
  'testoutputinfo' => 'Test output:<br/>There should only be ONE email per line.<br/>If the output looks ok, go <a href="javascript:history.go(-1)">Back</a> to resubmit for real<br/><br/>',  
  'List for' => 'List for',
'login' => 'login',
  
  
);
?>