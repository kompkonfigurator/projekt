
<div align="center">
<table><tr><td>

<?php
require_once dirname(__FILE__).'/accesscheck.php';

$dbversion = getConfig("version");
if (!$dbversion)
  $dbversion = "Older than 1.4.1";
print '<p>Your database version: '.$dbversion.'</p>';
if ($dbversion == VERSION)
  print "Your database is already the correct version, there is no need to upgrade";
else 

if (isset($_GET["doit"]) && $_GET["doit"] == 'yes') {
  $success = 1;
  # once we are off, this should not be interrupted
  ignore_user_abort(1);
  # rename tables if we are using the prefix
  include $GLOBALS["coderoot"] . "structure.php";
  while (list($table,$value) = each ($DBstruct)) {
    set_time_limit(500);
    if (isset($table_prefix)) {
      if (Sql_Table_exists($table) && !Sql_Table_Exists($tables[$table])) {
        Sql_Verbose_Query("alter table $table rename $tables[$table]",1);
      }
    }
  }
  ob_end_flush();

  print '<script language="Javascript" src="js/progressbar.js" type="text/javascript"></script>';
  print '<script language="Javascript" type="text/javascript"> document.write(progressmeter); start();</script>';
  # upgrade depending on old version
#  $dbversion = ereg_replace("-dev","",$dbversion);

  # output some stuff to make sure it's not buffered in the browser
  for ($i=0;$i<10000; $i++) {
    print '  '."\n";
  }
  print '<p>'.$GLOBALS['I18N']->get('Please wait, upgrading your database, do not interrupt').'</p>';
  for ($i=0;$i<10000; $i++) {
    print '  '."\n";
  }

  flush();

  if (preg_match("/(.*?)-/",$dbversion,$regs)) {
    $dbversion = $regs[1];
  }
  switch ($dbversion) {
    case "1.4.1":
      # nothing changed,
    case "1.4.2":
      # nothing changed,
    case "dev":
    case "1.4.3":
      foreach (array("admin","adminattribute","admin_attribute","task","admin_task") as $table) {
        if (!Sql_Table_Exists($table)) {
          Sql_Create_Table($tables[$table],$DBstruct[$table]);
          if ($table == "admin") {
            # create a default admin
            Sql_Query(sprintf('insert into %s values(0,"%s","%s","%s",now(),now(),"%s","%s",now(),%d,0)',
              $tables["admin"],"admin","admin","",$adminname,"phplist",1));
          } elseif ($table == "task") {
            while (list($type,$pages) = each ($system_pages)) {
              foreach ($pages as $page)
                Sql_Query(sprintf('insert into %s (page,type) values("%s","%s")',
                  $tables["task"],$page,$type));
            }
          }
         }
      }
      Sql_Query("alter table {$tables["list"]} add column owner integer");
      Sql_Query("alter table {$tables["message"]} change column status status enum('submitted','inprocess','sent','cancelled','prepared')");
      Sql_Query("alter table {$tables["template"]} change column template template longblob");
      # previous versions did not cleanup properly, fix that here
      $req = Sql_Query("select userid from {$tables["user_attribute"]} left join {$tables["user"]} on {$tables["user_attribute"]}.userid = {$tables["user"]}.id where {$tables["user"]}.id IS NULL");
      while ($row = Sql_Fetch_Row($req))
        Sql_query("delete from ".$tables["user_attribute"]." where userid = ".$row[0]);
      $req = Sql_Query("select user from {$tables["user_message_bounce"]} left join {$tables["user"]} on {$tables["user_message_bounce"]}.user = {$tables["user"]}.id where {$tables["user"]}.id IS NULL");
      while ($row = Sql_Fetch_Row($req))
        Sql_query("delete from ".$tables["user_message_bounce"]." where user = ".$row[0]);
      $req = Sql_Query("select userid from {$tables["usermessage"]} left join {$tables["user"]} on {$tables["usermessage"]}.userid = {$tables["user"]}.id where {$tables["user"]}.id IS NULL");
      while ($row = Sql_Fetch_Row($req))
        Sql_query("delete from ".$tables["usermessage"]." where userid = ".$row[0]);

      $success = 1;
    case "1.5.0":
      # nothing changed
    case "1.5.1":
      # nothing changed
    case "1.6.0":
    case "1.6.1": # not released
      # nothing changed
    case "1.6.2":
      # something we should have done ages ago. make checkboxes save "on" value in user_attribute
      $req = Sql_Query("select * from {$tables["attribute"]} where type = \"checkbox\"");
      while ($row = Sql_Fetch_Array($req)) {
        $req2 = Sql_Query("select * from $table_prefix"."listattr_$row[tablename]");
        while ($row2 = Sql_Fetch_array($req2)) {
          if ($row2["name"] == "Checked")
            Sql_Query(sprintf('update %s set value = "on" where attributeid = %d and value = %d',
              $tables["user_attribute"],$row["id"],$row2["id"]));
        }
         Sql_Query(sprintf('update %s set value = "" where attributeid = %d and value != "on"',
           $tables["user_attribute"],$row["id"]));
        Sql_Query("drop table $table_prefix"."listattr_".$row["tablename"]);
      }
      Sql_Query("insert into {$tables["task"]} (page,type) values(\"export\",\"user\")");
    case "1.6.3":
    case "1.6.4":
      Sql_Query("alter table {$tables["user"]} add column bouncecount integer default 0");
      Sql_Query("alter table {$tables["message"]} add column bouncecount integer default 0");
      # we actually never used these tables, so we can just as well drop and recreate them
      Sql_Query("drop table if exists {$tables["bounce"]}");
      Sql_Query("drop table if exists {$tables["user_message_bounce"]}");
      Sql_Query(sprintf('create table %s (
        id integer not null primary key auto_increment,
        date datetime,
        header text,
        data blob,
        status varchar(255),
        comment text)',$tables["bounce"]));
     Sql_Query(sprintf('create table %s (
        id integer not null primary key auto_increment,
        user integer not null,
        message integer not null,
        bounce integer not null,
        time timestamp,
        index (user,message,bounce))',
        $tables["user_message_bounce"]));
      Sql_Query("insert into {$tables["task"]} (page,type) values(\"bounce\",\"system\")");
      Sql_Query("insert into {$tables["task"]} (page,type) values(\"bounces\",\"system\")");
      Sql_Query("insert into {$tables["task"]} (page,type) values(\"processbounces\",\"system\")");
    case "1.7.0":
    case "1.7.1":
    case "1.8.0":
      Sql_Query("insert into {$tables["task"]} (page,type) values(\"spage\",\"system\")");
      Sql_Query("insert into {$tables["task"]} (page,type) values(\"spageedit\",\"system\")");
      Sql_Query("alter table {$tables["user"]} add column subscribepage integer default 0");
      Sql_Create_Table($tables["subscribepage"],$DBstruct["subscribepage"]);
      Sql_Create_Table($tables["subscribepage_data"],$DBstruct["subscribepage_data"]);
    case "1.9.0":
    case "1.9.1":
    case "1.9.2":
      # no changes
    case "1.9.3":
      # add some indexes to speed things up
      Sql_Query("alter table {$tables["bounce"]} add index dateindex (date)");
      Sql_Create_Table($tables["eventlog"],$DBstruct["eventlog"]);
      Sql_Query("alter table {$tables["sendprocess"]} add column page varchar(100)");
      Sql_Query("alter table {$tables["message"]} add column sendstart datetime");
      # some cleaning up of data:
      $req = Sql_Query("select {$tables["usermessage"]}.userid
        from {$tables["usermessage"]} left join {$tables["user"]} on {$tables["usermessage"]}.userid = {$tables["user"]}.id
        where {$tables["user"]}.id IS NULL group by {$tables["usermessage"]}.userid");
      while ($row = Sql_Fetch_Row($req)) {
        Sql_Query("delete from {$tables["usermessage"]} where userid = $row[0]");
       }
       $req = Sql_Query("select {$tables["user_attribute"]}.userid
        from {$tables["user_attribute"]} left join {$tables["user"]} on {$tables["user_attribute"]}.userid = {$tables["user"]}.id
        where {$tables["user"]}.id IS NULL group by {$tables["user_attribute"]}.userid");
      while ($row = Sql_Fetch_Row($req)) {
        Sql_Query("delete from {$tables["user_attribute"]} where userid = $row[0]");
       }
       $req = Sql_Query("select {$tables["listuser"]}.userid
        from {$tables["listuser"]} left join {$tables["user"]} on {$tables["listuser"]}.userid = {$tables["user"]}.id
        where {$tables["user"]}.id IS NULL group by {$tables["listuser"]}.userid");
      while ($row = Sql_Fetch_Row($req)) {
        Sql_Query("delete from {$tables["listuser"]} where userid = $row[0]");
       }
       $req = Sql_Query("select {$tables["usermessage"]}.userid
        from {$tables["usermessage"]} left join {$tables["user"]} on {$tables["usermessage"]}.userid = {$tables["user"]}.id
        where {$tables["user"]}.id IS NULL group by {$tables["usermessage"]}.userid");
      while ($row = Sql_Fetch_Row($req)) {
        Sql_Query("delete from {$tables["usermessage"]} where userid = $row[0]");
       }
       $req = Sql_Query("select {$tables["user_message_bounce"]}.user
        from {$tables["user_message_bounce"]} left join {$tables["user"]} on {$tables["user_message_bounce"]}.user = {$tables["user"]}.id
        where {$tables["user"]}.id IS NULL group by {$tables["user_message_bounce"]}.user");
      while ($row = Sql_Fetch_Row($req)) {
        Sql_Query("delete from {$tables["user_message_bounce"]} where user = $row[0]");
       }
    case "2.1.0":
    case "2.1.1":
      # oops deleted tables columns that should not have been deleted:
      if (!Sql_Table_Column_Exists($tables["message"],"tofield")) {
        Sql_Query("alter table {$tables["message"]} add column tofield varchar(255)");
       }
      if (!Sql_Table_Column_Exists($tables["message"],"replyto")) {
        Sql_Query("alter table {$tables["message"]} add column replyto varchar(255)");
       }
    case "2.1.2":
    case "2.1.3":
    case "2.1.4":
      Sql_Query("alter table {$tables["message"]} change column asboth astextandhtml integer default 0");
      Sql_Query("alter table {$tables["message"]} add column aspdf integer default 0");
      Sql_Query("alter table {$tables["message"]} add column astextandpdf integer default 0");
       Sql_Query("alter table {$tables["message"]} add column rsstemplate varchar(100)");
       Sql_Query("alter table {$tables["list"]} add column rssfeed varchar(255)");
      Sql_Query("alter table {$tables["user"]} add column rssfrequency varchar(100)");
      Sql_Create_Table($tables["message_attachment"],$DBstruct["message_attachment"]);
      Sql_Create_Table($tables["attachment"],$DBstruct["attachment"]);
      Sql_Create_Table($tables["rssitem"],$DBstruct["rssitem"]);
      Sql_Create_Table($tables["rssitem_data"],$DBstruct["rssitem_data"]);
      Sql_Create_Table($tables["user_rss"],$DBstruct["user_rss"]);
      Sql_Create_Table($tables["rssitem_user"],$DBstruct["rssitem_user"]);
    case "2.2.0":
    case "2.2.1":
      Sql_Query("alter table {$tables["user"]} add column password varchar(255)");
      Sql_Query("alter table {$tables["user"]} add column passwordchanged datetime");
      Sql_Query("alter table {$tables["user"]} add column disabled tinyint default 0");
      Sql_Query("alter table {$tables["user"]} add column extradata text");
      Sql_Query("alter table {$tables["message"]} add column owner integer");
    case "2.3.0":
    case "2.3.1":
    case "2.3.2":case "2.3.3":
      Sql_Create_Table($tables["listrss"],$DBstruct["listrss"]);
    case "2.3.4":case "2.4.0":
      Sql_Query("insert into {$tables["task"]} (page,type) values(\"import3\",\"user\")");
      Sql_Query("insert into {$tables["task"]} (page,type) values(\"import4\",\"user\")");
    case "2.5.0":case "2.5.1":
    case "2.5.2":
      Sql_Query("alter table {$tables["subscribepage"]} add column owner integer");
      Sql_Query("alter ignore table {$tables["task"]} add unique (page)");
    case "2.5.3":case "2.5.4":
      Sql_Query("alter table {$tables["user"]} add column foreignkey varchar(100)");
      Sql_Query("alter table {$tables["user"]} add index fkey (foreignkey)");
    case "2.5.5": case "2.5.6": case "2.5.7": case "2.5.8":
      # some very odd value managed to sneak in
      $cbgroups = Sql_Query("select id from {$tables["attribute"]} where type = \"checkboxgroup\"");
      while ($row = Sql_Fetch_Row($cbgroups)) {
        Sql_Query("update {$tables["user_attribute"]} set value = \"\" where attributeid = $row[0] and value=\"Empty\"");
      }
    case "2.6.0":case "2.6.1":case "2.6.2":case "2.6.3":case "2.6.4":case "2.6.5":
      Sql_Verbose_Query("alter table {$tables["message"]} add column embargo datetime");
      Sql_Verbose_Query("alter table {$tables["message"]} add column repeat integer default 0");
      Sql_Verbose_Query("alter table {$tables["message"]} add column repeatuntil datetime");
      # make sure that current queued messages are sent
      Sql_Verbose_Query("update {$tables["message"]} set embargo = now() where status = \"submitted\"");
      Sql_Query("alter table {$tables["message"]} change column status status enum('submitted','inprocess','sent','cancelled','prepared','draft')");
    case "2.6.6":case "2.7.0": case "2.7.1": case "2.7.2":
      Sql_Create_Table($tables["user_history"],$DBstruct["user_history"]);
    case "2.8.0":
      Sql_Query("alter table {$tables["message"]} add column textmessage text");
    case "2.8.1": case "2.8.2": case "2.8.3":
    case "2.8.4": case "2.8.5": case "2.8.6":
      Sql_Query("alter table {$tables["user"]} add index index_uniqid (uniqid)");
    case "whatever versions we will get later":
      #Sql_Query("alter table table that altered");
      break;
    default:
      # an unknown version, so we do a generic upgrade, if the version is older than 1.4.1
      if ($dbversion > "1.4.1")
        break;
      Error("Sorry, your version is too old to safely upgrade");
      $success = 0;
      break;
  }

  # at 2.8.x we started to split into stable (2.8) and unstable (2.9)
  # so upgrading is now mixed between major.minor versions
  list($major,$minor,$sub) = explode(".",$dbversion);
  switch ($major) {
    case "2":
      if ($minor < 9 || ($minor == 9 && $sub == 0)) {
        Sql_Create_Table($tables["user_blacklist"],$DBstruct["user_blacklist"]);
        Sql_Create_Table($tables["user_blacklist_data"],$DBstruct["user_blacklist_data"]);
        Sql_Query("alter table {$tables["user"]} add column blacklisted tinyint default 0");
        Sql_Query("alter table {$tables["message"]} change column repeat repeatinterval integer default 0");
        set_time_limit(6000);
        # this one can take a long time
        Sql_Query("alter table {$tables["usermessage"]} change column entered entered datetime, add column status varchar(255)");
        Sql_Query("update {$tables["usermessage"]} set status =\"sent\"");
      }
      if ($minor < 9 || ($minor == 9 && $sub < 2)) {
        Sql_Create_Table($tables["messagedata"],$DBstruct["messagedata"]);
      }
      if ($minor < 9 || ($minor == 9 && $sub < 2)) {
        Sql_Query("alter table {$tables["user_attribute"]} add index userindex (userid)");
        Sql_Query("alter table {$tables["user_attribute"]} add index attindex (attributeid)");
      }
      if ($minor < 9 || ($minor == 9 && $sub < 3)) {
        # this can take quite a while if there are a lot of users and or messages
        set_time_limit(60000);
        Sql_Query("alter table {$tables["usermessage"]} add index userindex (userid)");
        Sql_Query("alter table {$tables["usermessage"]} add index messageindex (messageid)");
        Sql_Query("alter table {$tables["usermessage"]} add index enteredindex (entered)");
        Sql_Create_Table($tables["urlcache"],$DBstruct["urlcache"]);
      }
      if ($minor < 9 || ($minor == 9 && $sub <= 4)) {
        Sql_Create_Table($tables["linktrack"],$DBstruct["linktrack"]);
        Sql_Create_Table($tables["linktrack_userclick"],$DBstruct["linktrack_userclick"]);
        SaveConfig("xormask",md5(uniqid(rand(), true)),0);
      }
      if ($minor < 9 || ($minor == 9 && $sub < 5)) {
        Sql_Create_Table($tables["user_message_forward"],$DBstruct["user_message_forward"]);
        Sql_Query("alter table {$tables["user_attribute"]} add index userattid (attributeid,userid)");
        Sql_Query("alter table {$tables["user_attribute"]} add index attuserid (userid,attributeid)");
        Sql_Query("alter table {$tables["message"]} change column status status varchar(255)");
        Sql_Create_Table($tables["userstats"],$DBstruct["userstats"]);
        Sql_Create_Table($tables["bounceregex"],$DBstruct["bounceregex"]);
        Sql_Create_Table($tables["bounceregex_bounce"],$DBstruct["bounceregex_bounce"]);
      }
      if ($minor < 10 || ($minor == 10 && $sub < 13)) {
        Sql_Create_Table($tables["admintoken"],$DBstruct["admintoken"]);
      }
      break;
  }

  ## make sure the token table exists
  if (!Sql_Table_exists($tables["admintoken"],1)) {
    Sql_Create_Table($tables["admintoken"],$DBstruct["admintoken"]);
  }

  ## add index on bounces, but ignore the error
  Sql_Query("create index statusindex on {$tables["user_attribute"]} (status(10))",1);  
  Sql_Query("create index message_lookup using btree on {$tables["user_message_bounce"]} (message)",1);   
    
  ## mantis issue 9001, make sure that the "repeat" column in the messages table is renamed to repeatinterval
  # to avoid a name clash with Mysql 5.
  # problem is that this statement will fail if the DB is already running Mysql 5
  if (Sql_Table_Column_Exists($GLOBALS['tables']['message'],'repeat')) {
    Sql_Query(sprintf('alter ignore table %s change column repeat repeatinterval integer default 0',$GLOBALS['tables']['message']));
  }
  # check whether it worked and otherwise throw an error to say it needs to be done manually
  if (Sql_Table_Column_Exists($GLOBALS['tables']['message'],'repeat')) {
    print 'Error, unable to rename column "repeat" in the table '.$GLOBALS['tables']['message'].' to be "repeatinterval"<br/>
      Please do this manually, refer to http://mantis.phplist.com/view.php?id=9001 for more information';
  }

  # fix the new powered by image for the templates
  Sql_Query(sprintf('update %s set data = "%s",width=70,height=30 where filename = "powerphplist.png"',
    $tables["templateimage"],$newpoweredimage));

  print '<script language="Javascript" type="text/javascript"> finish(); </script>';
  # update the system pages
  include_once dirname(__FILE__).'/defaultconfig.inc';
  $reverse_accesscodes = array_flip($GLOBALS['access_levels']);
  foreach ($system_pages as $type => $pages) {
    foreach ($pages as $page => $default) {
      Sql_Query(sprintf('insert ignore into %s (page,type) values("%s","%s")',
        $tables["task"],$page,$type));
      $newtask = Sql_Insert_Id();
      if ($newtask) {
        # it's a new page, set the standard default
        Sql_Query(sprintf('insert into %s (adminid,taskid,level) values(0,%d,%d)',
          $GLOBALS['tables']['admin_task'],$newtask,$reverse_accesscodes[$default]));
      }
    }
  }
  # correct some strange access entries that have sneaked in
  $req = Sql_Query(sprintf('select id from %s where page = "all" or page = "none"',$GLOBALS['tables']['task']));
  while ($row = Sql_Fetch_Row($req)) {
    Sql_Query(sprintf('delete from %s where taskid = %d',$GLOBALS['tables']['admin_task'],$row[0]));
  }
  Sql_Query(sprintf('delete from %s where page = "all" or page = "none"',$GLOBALS['tables']['task']));

  # mark the database to be our current version
  if ($success) {
    SaveConfig("version",VERSION,0);
    # mark now to be the last time we checked for an update
    Sql_Query(sprintf('replace into %s (item,value,editable) values("updatelastcheck",now(),0)',
      $tables["config"]));
    Info("Success");
   }
   else
    Error("An error occurred while upgrading your database");
} else {

?>
<p>Your database requires upgrading, please make sure to create a backup of your database first.</p>

<p>When you're ready click <?php echo PageLink2("upgrade","Here","doit=yes")?>. Depending on the size of your database, this may take quite a while. Please make sure not to interrupt the process, once you've started it.</p>
<?php } ?>
</td></tr></table>
</div>
