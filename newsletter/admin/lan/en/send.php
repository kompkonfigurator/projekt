<?php

## notes to translators:
# do not translate anything in square brackets: eg [RSS]

$lan = array (
  'noaccess' => 'No such message, or you do not have access to it',
  'htmlusedwarning' => 'Warning: You indicated the content was not HTML, but there were  some HTML  tags in it. This  may  cause  errors',
  'adding' => 'Adding',
  'longmimetype' => 'Mime Type is longer than 255 characters, this is trouble',
  'addingattachment' => 'Added attachment ',
  'uploadfailed' => 'Uploaded file not properly received, empty file',
  'saved' => 'Message saved',
  'added' => 'Message added',
  'queued' => 'Message queued for send',
  'processqueue' => 'Process the Message Queue',
  'errorsubject' => 'Sorry, you used invalid characters in the Subject field.',
  'errorfrom' => 'Sorry, you used invalid characters in the From field.',
  'enterfrom' => 'Please enter a from line.',
  'entermessage' => 'Please enter a message',
  'entersubject' => 'Please enter a subject',
  'duplicateattribute' => 'Error: you can use an attribute in one rule only',
  'selectlist' => 'Please select the list(s) to send the message to',
  'notargetemail' => 'No target email addresses listed for testing.',
  'emailnotfound' => 'Email address not found to send test message.',
  'sentemailto' => 'Sent test mail to',
  'removedattachment' => 'Removed Attachment ',
  'existingcriteria' => 'Existing criteria',
  'remove' => 'Remove',
  'calculating' => 'Calculating',
  'calculate' => 'Calculate',
  'content' => 'Content',
  'format' => 'Format',
  'attach' => 'Attach',
  'scheduling' => 'Scheduling',
  'criteria' => 'Criteria',
  'lists' => 'Lists',
  'unsavedchanges' => 'Warning, You have unsaved changes\nClick OK to continue or Cancel to stay on this page\nso you can save the changes.',
  'whatisprepare' => 'What is prepare a message',
  'subject' => 'Subject',
  'fromline' => 'From Line',
  'embargoeduntil' => 'Embargoed Until',
  'repeatevery' => 'Repeat message every',
  'norepetition' => 'no repetition',
  'hour' => 'Hour',
  'day' => 'Day',
  'week' => 'Week',
  'repeatuntil' => 'Repeat Until',
  'format' => 'Format',
  'autodetect' => 'Auto Detect',
  'sendas' => 'Send As',
  'html' => 'HTML',
  'text' => 'text',
  'pdf' => 'PDF',
//  'textandhtml' => 'Text and HTML', //obsolete by bug 0009687
  'textandpdf' => 'Text and PDF',
  'usetemplate' => 'Use Template',
  'selectone' => 'select one',
  'rssintro' => 'If you want to use this message as the template for sending RSS feeds
    select the frequency it should be used for and use [RSS] in your message to indicate where the list of items needs to go.',
  'none' => 'none',
  'message' => 'Message',
  'expand' => 'expand',
  'plaintextversion' => 'Plain text version of message',
  'messagefooter' => 'Message Footer',
  'messagefooterexplanation1' => 'Use <b>[UNSUBSCRIBE]</b> to insert the personal unsubscribe URL for each user.',
  'messagefooterexplanation2' => 'Use <b>[PREFERENCES]</b> to insert the personal URL for a user to update their details.',
  'messagefooterexplanation3' => 'Use <b>[FORWARD]</b> to add a personalised URL to forward the message to someone else.',
  'messagefooterexplanation' => 'Use <b>[UNSUBSCRIBE]</b> to insert the personal unsubscribe URL for each user.
  <br/>Use <b>[PREFERENCES]</b> to insert the personal URL for a user to update their details.',
  'addattachments' => 'Add attachments to your message',
  'uploadlimits' => 'The upload has the following limits set by the server',
  'maxtotaldata' => 'Maximum size of total data being sent to the server',
  'maxfileupload' => 'Maximum size of each individual file',
  'currentattachments' => 'Current Attachments',
  'filename' => 'filename',
  'desc' => 'desc',# short for description
  'size' => 'size',
  'file' => 'file',
  'del' => 'del', # short for delete
  'newattachment' => 'New Attachment',
  'addandsave' => 'Add (and save)',
  'pathtofile' => 'Path to file on server',
  'attachmentdescription' => 'Description of attachment',
  'delchecked' => 'Delete Checked',
  'sendtestmessage' => 'Send Test Message',
  'toemailaddresses' => ' to email address(es)',
  'sendtestexplain' => '(comma separated addresses - all must be users)',
  'criteriaexplanation' => '
        <p class="information"><b>Select the criteria for this message:</b></p>
        <ol>
        <li>to use a criteria, check the box next to it</li>
        <li>then check the radio button next to the attribute you want to use</li>
        <li>then choose the values of the attributes you want to send the message to
        <i>Note:</i> Messages will be sent to people who fit to <i>Criteria 1</i> <b>AND</b> <i>Criteria 2</i> etc </li>
        </ol>
        ',
  'criterion' => 'Criterion',
  'usethisone' => 'Use this one',
  'or' => 'or', # "alternative" ie this or this
  'is' => 'is',
  'isnot' => 'is not',
  'isbefore' => 'is before', # date and time wise
  'isafter' => 'is after', # date and time wise
  'nocriteria' => 'There are currently no attributes available to use for sending a message. The message will go to any user on the lists selected',
  'checked' => 'Checked', # as for checkbox
  'unchecked' => 'Unchecked', # as for checkbox
  'buggywithie' => 'Warning, this functionality is buggy and unreliable with IE.\nIt will be better to use Mozilla, Firefox or Opera\nAlternatively switch off STACKED_ATTRIBUTE_SELECTION in your config file', # Don't translate STACKED_ATTRIBUTE_SELECTION
  'matchallrules' => 'Match all of these rules',
  'matchanyrules' => 'Match any of these rules',
  'addcriterion' => 'Add Criterion',
  'saveasdraft' => 'Save Message as Draft',
  'savechanges' => 'Save Changes',
  'selectattribute' => 'select attribute',
  'dd-mm-yyyy' => 'dd-mm-yyyy', # it's essential that the format is the same (ie dd-mm-yyyy)

  # above is all from send_core

  'selectlists' => 'Please select the lists you want to send it to',
  'alllists' => 'All Lists',
  'listactive' => 'List is Active',
  'listnotactive' => 'List is not Active',
  'selectexcludelist' => 'Select the lists to be excluded.',
  'excludelistexplain' => 'The message will go to users who are a member of the lists above,
    unless they are a member of one of the lists you select here.',
  'nolistsavailable' => 'Sorry, there are currently no lists available',
  'sendmessage' => 'Send Message to the Selected Mailinglists',
  'warnnopearhttprequest' => 'You are trying to send a remote URL, but PEAR::HTTP/Request is not available, so this will fail',
  #


  ### new in 2.9.5
  'Misc' => 'Misc',
  'email to alert when sending of this message starts' => 'email to alert when sending of this message starts',
  'email to alert when sending of this message has finished' => 'email to alert when sending of this message has finished',
  'separate multiple with a comma' => 'separate multiple with a comma',
  'operator' => 'operator',
  'values' => 'values',
  '%d users apply' => '%d users apply',

  # new in 2.10.1
  'reload' => 'reload',

  ## new in 2.11.2
  'use [FORWARD] to add a personalised URL to forward the message to someone else.' => 'use <b>[FORWARD]</b> to add a personalised URL to forward the message to someone else.',
  'PGP' => 'PGP',
  'Sign message' => 'Sign message',
  'Select email to sign with' => 'Select email to sign with',
  'Enter pass phrase' => 'Enter pass phrase',
  'Encrypt message' => 'Encrypt message',
  'When a message cannot be encrypted because the public key cannot be found' => 'When a message cannot be encrypted because the public key cannot be found',
  'Send it anyway, but unencrypted' => 'Send it anyway, but unencrypted',
  'Do not send it' => 'Do not send it',
  'All Active Lists' => 'All Active Lists',
  
  ## 2.11.5
  'No RSS' => 'No RSS', 
  'Daily' => 'Daily', 
  'Weekly' => 'Weekly',
  'Monthly' => 'Monthly',
  'start a new message' => 'start a new message',
  'Choose an existing draft message to work on' => 'Choose an existing draft message to work on',
  

  ## forgotten 
  'All Active Lists' => 'All Active Lists',

);

?>
