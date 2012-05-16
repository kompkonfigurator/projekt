
<script language="Javascript" src="js/jslib.js" type="text/javascript"></script>
<hr />

<?php
require_once dirname(__FILE__).'/accesscheck.php';

$id = sprintf('%d',$_GET["id"]);
if (!$id) {
  print $GLOBALS['I18N']->get('Please select a message to display') . "\n";
  exit;
}

$access = accessLevel('message');
#print "Access: $access";
switch ($access) {
  case 'owner':
    $subselect = ' where owner = ' . $_SESSION["logindetails"]["id"];
    $owner_select_and = ' and owner = ' . $_SESSION["logindetails"]["id"];
    break;
  case 'all':
    $subselect = '';
    $owner_select_and = '';
    break;
  case 'none':
  default:
    $subselect = ' where id = 0';
    $owner_select_and = ' and owner = 0';
    break;
}

if ($_POST['resend'] && is_array($_POST['list'])) {
  if ($_POST['list']['all']) {
    $res = Sql_query("select * from $tables[list]");
    while($list = Sql_fetch_array($res))
      if ($list["active"])
        $result = Sql_query("insert into $tables[listmessage] (messageid,listid,entered) values($id,$list[id],now())");
  } else {
    foreach($_POST['list'] as $key => $val) {
      if ($val == 'signup') {
        $result = Sql_query("insert into $tables[listmessage] (messageid,listid,entered) values($id,$key,now())");
      }
    }
  }
  Sql_Query("update $tables[message] set status = \"submitted\" where id = $id");
}


require $coderoot . 'structure.php';

print '<p>'.PageLink2('send&amp;id='.$id,$GLOBALS['I18N']->get('Edit this message')).'</p>';

$result = Sql_query("SELECT * FROM {$tables['message']} where id = $id $owner_select_and");
if (!Sql_Affected_Rows()) {
  print $GLOBALS['I18N']->get('No such message');
  return;
}
echo "<table border=\"1\">";

while ($msg = Sql_fetch_array($result)) {
  foreach($DBstruct["message"] as $field => $val) {
    # Correct for bug 0009687
    # Skip 'astextandhtml' and add this count to 'ashtml'
    # change the name of sendformat
    if ($field != 'ashtml') {
      if ($field == 'astextandhtml') {
        $field = 'ashtml';
        $msg[$field] += $msg['astextandhtml'];
      };
      if ($field == 'sendformat' and $msg[$field] = 'text and HTML')
        $msg[$field] = 'HTML';
      printf('<tr><td valign="top">%s</td><td valign="top">%s</td></tr>',$GLOBALS['I18N']->get($field),$msg["htmlformatted"]?stripslashes($msg[$field]):nl2br(stripslashes($msg[$field])));
    }  
  }
}

if (ALLOW_ATTACHMENTS) {
  print '<tr><td colspan=2><h3>' . $GLOBALS['I18N']->get('Attachments for this message') . '</h3></td></tr>';
  $req = Sql_Query("select * from {$tables["message_attachment"]},{$tables["attachment"]}
    where {$tables["message_attachment"]}.attachmentid = {$tables["attachment"]}.id and
    {$tables["message_attachment"]}.messageid = $id");
  if (!Sql_Affected_Rows())
    print '<tr><td colspan=2>' . $GLOBALS['I18N']->get('No attachments') . '</td></tr>';
  while ($att = Sql_Fetch_array($req)) {
    printf ('<tr><td>%s:</td><td>%s</td></tr>', $GLOBALS['I18N']->get('Filename') ,$att["remotefile"]);
    printf ('<tr><td>%s:</td><td>%s</td></tr>', $GLOBALS['I18N']->get('Size'), formatBytes($att["size"]));
    printf ('<tr><td>%s:</td><td>%s</td></tr>', $GLOBALS['I18N']->get('Mime Type'),$att["mimetype"]);
    printf ('<tr><td>%s:</td><td>%s</td></tr>', $GLOBALS['I18N']->get('Description'), $att["description"]);
  }
 # print '</table>';
}

print '<tr><td colspan="2"<h3>' . $GLOBALS['I18N']->get('Lists this message has been sent to') . ':</h3></td></tr>';

$lists_done = array();
$result = Sql_Query("select $tables[list].name,$tables[list].id from $tables[listmessage],$tables[list] where $tables[listmessage].messageid = $id and $tables[listmessage].listid = $tables[list].id");
if (!Sql_Affected_Rows())
  print '<tr><td colspan="2">' . $GLOBALS['I18N']->get('None yet') . '</td></tr>';
while ($lst = Sql_fetch_array($result)) {
  array_push($lists_done,$lst[id]);
  printf ('<tr><td>%d</td><td>%s</td></tr>',$lst['id'],$lst['name']);
}

?>
</table>

<a name="resend"></a><p><?php echo $GLOBALS['I18N']->get('Send this (same) message to (a) new list(s)'); ?>:</p>
<?php echo formStart()?>
<input type=hidden name="id" value="<?php echo $id?>">
<ul>
<?php

$result = Sql_query("SELECT * FROM $tables[list] $subselect");
while ($row = Sql_fetch_array($result)) {
  if (!in_array($row[id],$lists_done)) {
    print '<li><input type="checkbox" name="list[' . $row["id"] . ']" value="signup" ';
    if ($list[$row["id"]] == 'signup')
      print 'checked';
    print ">".$row['name'];
    if ($row["active"])
      print ' (<font color="red">' . $GLOBALS['I18N']->get('List is Active') . '</font>)';
    else
      print ' (<font color="red">' . $GLOBALS['I18N']->get('List is not Active') . '</font>)';
    $some = 1;
  }
}

if (!$some)
  print $GLOBALS['I18N']->get('<b>Note:</b> this message has already been sent to all lists. To resend it to new users use the "Requeue" function.');
else
  print '<br /><input type="submit" name="resend" value="'.$GLOBALS['I18N']->get('Resend').'"></form>';

?>
