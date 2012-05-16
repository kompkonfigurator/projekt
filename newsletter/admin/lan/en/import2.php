<?php

$lan = array(

'The temporary directory for uploading (%s) is not writable, so import will fail' => 'The temporary directory for uploading (%s) is not writable, so import will fail',
'Invalid Email' => 'Invalid Email',
'Import cleared' => 'Import cleared',
'Continue' => 'Continue',
'Reset Import session' => 'Reset Import session',
'File is either too large or does not exist.' => 'File is either too large or does not exist.',
'No file was specified. Maybe the file is too big? ' => 'No file was specified. Maybe the file is too big? ',
'File too big, please split it up into smaller ones' => 'File too big, please split it up into smaller ones',
'Use of wrong characters in filename: ' => 'Use of wrong characters in filename: ',
'Please choose whether to sign up immediately or to send a notification' => 'Please choose whether to sign up immediately or to send a notification',
'Cannot read %s. file is not readable !' => 'Cannot read %s. file is not readable !',
'Something went wrong while uploading the file. Empty file received. Maybe the file is too big, or you have no permissions to read it.' => 'Something went wrong while uploading the file. Empty file received. Maybe the file is too big, or you have no permissions to read it.',
'Reading emails from file ... ' => 'Reading emails from file ... ',
'Error was around here &quot;%s&quot;' => 'Error was around here &quot;%s&quot;',
'Illegal character was %s' => 'Illegal character was %s',
'A character has been found in the import which is not the delimiter indicated, but is likely to be confused for one. Please clean up your import file and try again' => 'A character has been found in the import which is not the delimiter indicated, but is likely to be confused for one. Please clean up your import file and try again',
'ok, %d lines' => 'ok, %d lines',
'Cannot find column with email, please make sure the column is called &quot;email&quot; and not eg e-mail' => 'Cannot find column with email, please make sure the column is called &quot;email&quot; and not eg e-mail',
'Create new one' => 'Create new one',
'Skip Column' => 'Skip Column',
'Import Attributes' => 'Import Attributes',
'Continue' => 'Continue',
'Please identify the target of the following unknown columns' => 'Please identify the target of the following unknown columns',
'Summary' => 'Summary',
'maps to' => 'maps to',
'Create new Attribute' => 'Create new Attribute',
'maps to' => 'maps to',
'Skip Column' => 'Skip Column',
'maps to' => 'maps to',
'%d lines will be imported' => '%d lines will be imported',
'Confirm Import' => 'Confirm Import',
'Test Output' => 'Test Output',
'Record has no email' => 'Record has no email',
'Invalid Email' => 'Invalid Email',
'clear value' => 'clear value',
'New Attribute' => 'New Attribute',
'Skip value' => 'Skip value',
'duplicate' => 'duplicate',
'Duplicate Email' => 'Duplicate Email',
' user imported as ' => ' user imported as ',
'duplicate' => 'duplicate',
'duplicate' => 'duplicate',
'Duplicate Email' => 'Duplicate Email',
'All the emails already exist in the database and are member of the lists' => 'All the emails already exist in the database and are member of the lists',
'%s emails succesfully imported to the database and added to %d lists.' => '%s emails succesfully imported to the database and added to %d lists.',
'%d emails subscribed to the lists' => '%d emails subscribed to the lists',
'%s emails already existed in the database' => '%s emails already existed in the database',
'%d Invalid Emails found.' => '%d Invalid Emails found.',
'These records were added, but the email has been made up from ' => 'These records were added, but the email has been made up from ',
'These records were deleted. Check your source and reimport the data. Duplicates will be identified.' => 'These records were deleted. Check your source and reimport the data. Duplicates will be identified.',
'User data was updated for %d users' => 'User data was updated for %d users',
'%d users were matched by foreign key, %d by email' => '%d users were matched by foreign key, %d by email',
'phplist Import Results' => 'phplist Import Results',
'Test output<br/>If the output looks ok, click %s to submit for real' => 'Test output<br/>If the output looks ok, click %s to submit for real',
'Confirm Import' => 'Confirm Import',
'Import some more emails' => 'Import some more emails',
'Adding users to list' => 'Adding users to list',
'Select the lists to add the emails to' => 'Select the lists to add the emails to',
'No lists available' => 'No lists available',
'Add a list' => 'Add a list',
'Select the groups to add the users to' => 'Select the groups to add the users to',
'automatically added' => 'automatically added',
 'importintro' => '<p class="information">The file you upload will need to have the attributes of the records on    the first line.
    Make sure that the email column is called "email" and not something like "e-mail" or
    "Email Address".
    Case is not important.
    </p>
    If you have a column called "Foreign Key", this will be used for synchronisation between an
    external database and the PHPlist database. The foreignkey will take precedence when matching
    an existing user. This will slow down the import process. If you use this, it is allowed to have
    records without email, but an "Invalid Email" will be created instead. You can then do
    a search on "invalid email" to find those records. Maximum size of a foreign key is 100.
    <br/><br/>
    <b>Warning</b>: the file needs to be plain text. Do not upload binary files like a Word Document.
    <br/>',
'uploadlimits' => 'The following limits are set by your server:<br/>
Maximum size of a total data sent to server: <b>%s</b><br/>
Maximum size of each individual file: <b>%s</b>',
'testoutput_blurb' => 'If you check "Test Output", you will get the list of parsed emails on screen, and the database will not be filled with the information. This is useful to find out whether the format of your file is correct. It will only show the first 50 records.',
'warnings_blurb' => 'If you check "Show Warnings", you will get warnings for invalid records. Warnings will only be shown if you check "Test Output". They will be ignored when actually importing. ',
'omitinvalid_blurb' => 'If you check "Omit Invalid", invalid records will not be added. Invalid records are records without an email. Any other attributes will be added automatically, ie if the country of a record is not found, it will be added to the list of countries.',
'assigninvalid_blurb' => 'Assign Invalid will be used to create an email for users with an invalid email address.
You can use values between [ and ] to make up a value for the email. For example if your import file contains a column "First Name" and one called "Last Name", you can use
"[first name] [last name]" to construct a new value for the email for this user containing their first name and last name.
The value [number] can be used to insert the sequence number for importing.',
'overwriteexisting_blurb' => 'If you check "Overwrite Existing", information about a user in the database will be replaced by the imported information. Users are matched by email or foreign key.',
'retainold_blurb' => 'If you check "Retain Old User Email", a conflict of two emails being the same will keep the old one and add "duplicate" to the new one. If you don\'t check it, the old one will get "duplicate" and the new one will take precedence.',
'sendnotification_blurb' => 'If you choose "send notification email" the users you are adding will be sent the request for confirmation of subscription to which they will have to reply. This is recommended, because it will identify invalid emails.',
'phplist Import  Results' => 'phplist Import  Results',
'File containing emails' => 'File containing emails',
'Field Delimiter' => 'Field Delimiter',
'(default is TAB)' => '(default is TAB)',
'Record Delimiter' => 'Record Delimiter',
'(default is line break)' => '(default is line break)',
'Test output' => 'Test output',
'Show Warnings' => 'Show Warnings',
'Omit Invalid' => 'Omit Invalid',
'Assign Invalid' => 'Assign Invalid',
'Overwrite Existing' => 'Overwrite Existing',
'Retain Old User Email' => 'Retain Old User Email',
'Send&nbsp;Notification&nbsp;email' => 'Send&nbsp;Notification&nbsp;email',
'Make confirmed immediately' => 'Make confirmed immediately',
'Import' => 'Import',

## added 2008-05-12
'phplistuploadlimit' => '<br/>PHPlist will not process files larger than %dMB',
'Cannot find column with email, please make sure the column is called &quot;email&quot; and not eg e-mail, and that your column delimiter is correct' => 'Cannot find column with email, please make sure the column is called &quot;email&quot; and not eg e-mail, and that your column delimiter is correct',

);
?>