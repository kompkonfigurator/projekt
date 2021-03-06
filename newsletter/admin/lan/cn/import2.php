<?php
$lan = array (
  'The temporary directory for uploading (%s) is not writable, so import will fail' => '上传资料的暂存资料夹 (%s) 无法写入，汇入程序将无法顺利进行',
  'Invalid Email' => '错误的信箱',
  'Import cleared' => '汇入资料清除了',
  'Continue' => '继续',
  'Reset Import session' => '重新设定汇入连线',
  'File is either too large or does not exist.' => '档桉太大或是不存在',
  'No file was specified. Maybe the file is too big? ' => '没有指定档桉，或者档桉太大？',
  'File too big, please split it up into smaller ones' => '档桉太大，请先切割成较小的多个档桉',
  'Use of wrong characters in filename: ' => '档桉名称使用了错误的字元：',
  'Please choose whether to sign up immediately or to send a notification' => '请选择要立即登录还是要先发送提醒通知',
  'Cannot read %s. file is not readable !' => '无法读取 %s ！',
  'Something went wrong while uploading the file. Empty file received. Maybe the file is too big, or you have no permissions to read it.' => '上传档桉时发生错误，档桉是空的；也许是档桉太大，或是您没有读取的权限。',
  'Reading emails from file ... ' => '从档桉读取电子邮件...',
  'Error was around here &quot;%s&quot;' => '错误大约在&quot;%s&quot;',
  'Illegal character was %s' => '错误的字元为 %s',
  'A character has been found in the import which is not the delimiter indicated, but is likely to be confused for one. Please clean up your import file and try again' => '汇入的资料发现一个造成辨识错误的字元，这应该不是分隔字元；请先检查汇入的档桉后再重试。',
  'ok, %d lines' => '完成 %d 行',
  'Cannot find column with email, please make sure the column is called &quot;email&quot; and not eg e-mail' => '无法找到 email 栏位，请确认其中一个栏位名称为 &quot;email&quot; 而不是像 e-mail',
  'Create new one' => '建立新的',
  'Skip Column' => '忽略栏位',
  'Import Attributes' => '汇入属性',
  'Please identify the target of the following unknown columns' => '请指定下面这些不知名栏位的对应资讯',
  'Summary' => '概要',
  'maps to' => '对应到',
  'Create new Attribute' => '建立新属性',
  '%d lines will be imported' => '%d 行资料将被汇入',
  'Confirm Import' => '确认汇入',
  'Test Output' => '测试输出',
  'Record has no email' => '资料没有电子邮件',
  'clear value' => '清除资料',
  'New Attribute' => '新增属性',
  'Skip value' => '忽略数值',
  'duplicate' => '重複',
  'Duplicate Email' => '重複的电子邮件',
  ' user imported as ' => ' 使用者汇入于',
  'All the emails already exist in the database and are member of the lists' => '所有的电子邮件都已经存在，而且也订阅了这个电子报',
  '%s emails succesfully imported to the database and added to %d lists.' => '%s 个电子邮件成功汇入到资料库，并且订阅了电子报 %d 。',
  '%d emails subscribed to the lists' => '%d 的电子邮件订阅了这个电子报',
  '%s emails already existed in the database' => '%s 个电子邮件已经存在于资料库中',
  '%d Invalid Emails found.' => '%d 个错误的电子邮件',
  'These records were added, but the email has been made up from ' => '这些记录新增了，但是电子邮件已经被建立于',
  'These records were deleted. Check your source and reimport the data. Duplicates will be identified.' => '这些记录删除了，确认您的来源接着再重新汇入资料；重複的项目会被列出。',
  'User data was updated for %d users' => '更新了 %d 个使用者的资料',
  '%d users were matched by foreign key, %d by email' => '%d 个使用者符合外部键值， %d 来自电子邮件',
  'phplist Import Results' => '汇入结果',
  'Test output<br/>If the output looks ok, click %s to submit for real' => '测试输出 <br/>如果输出资料看来没问题，点选  %s 来正式送出资料',
  'Import some more emails' => '汇入更多资料',
  'Adding users to list' => '新增使用者到电子报',
  'Select the lists to add the emails to' => '选择新增电子邮件所订阅的电子报',
  'No lists available' => '没有任何电子报',
  'Add a list' => '新增电子报',
  'Select the groups to add the users to' => '选择要新增使用者的群组',
  'automatically added' => '自动新增',
  'importintro' => '<p class="information">您上传的档桉必须在第一行包含汇入资料的栏位名称，请确认电子邮件栏位名称为 "email" 而不是 "e-mail" 或 "Email Address"；大小写则不会影响。
    </p>
    如果资料栏位包含了一个名为 "Foreign Key" 的项目，这将会用来与电子报系统资料库的使用者资讯进行同步更新，外部键值会在符合既有使用者时产生作用；这将会减慢汇入的程序。如果启用了这个项目，没有电子邮件的项目也可以进行资料交换，不过会产生一个 "Invalid Email" 替代。您可以接着搜寻 "invalid email" 来找到这些资料。外部键值的大小上限为 100 个字元。
    <br/><br/>
    <b>注意：</b>您必须使用纯文字文件，不要上传像是WORD文件之类的二进位档桉！
    <br/>',
  'uploadlimits' => '下面是您的伺服器限制：<br/>
资料上传大小上限： <b>%s</b><br/>
单一档桉大小上限： <b>%s</b>
<br/>PHPlist 无法处理大于 1Mb 的档桉',
  'testoutput_blurb' => '如果您勾选 "测试输出"，您会看到解析后的电子邮件列表，资讯并不会储存到资料库中；这是用来确认档桉格式正确与否，只会显示前 50 笔资料。',
  'warnings_blurb' => '如果您勾选 "显示警告"，您将会看到个别资料的警告讯息；警告讯息只会出现在 "测试输出"时，实际汇入时会被忽略。',
  'omitinvalid_blurb' => '如果您勾选 "忽略错误资料"，错误的资料将不会新增；错误的资料指的是没有包含电子邮件的项目。 其他的属性会自动加入，例如如果找到一笔资料的国家栏位不存在，它会自动被新增到系统的国家清单中。',
  'assigninvalid_blurb' => '指定错误的功能是用来在使用者电子邮件格式错误时自动产生一个信箱，您可以使用 [ 与 ] 之间的数值来设定电子邮件。例如汇入的资料包含栏位像是 "First Name" 与 "Last Name"，您可以使用 "[first name] [last name]" 把这两个栏位当作电子邮件的资料；而 [number] 的数值则用来插入汇入资料的流水号。',
  'overwriteexisting_blurb' => '如果您勾选 "覆盖现有资料"，存在资料库的使用者资讯会被汇入的资料所取代，使用者比对的方式是透过电子邮件或外部键值。',
  'retainold_blurb' => '如果您勾选 "保留旧的使用者信箱"，当两个电子邮件因为重複而产生冲突时，旧的资料会被保留，并且建立一个重複的项目来储存新资料。如果您没有勾选，旧的资料将会被视为重複项目，而优先使用新的资料。',
  'sendnotification_blurb' => '如果您选择 "发送通知邮件" ，被新增的使用者会收到订阅的确认讯息，让使用者能够自行决定是否订阅。建议您使用这个功能，因为汇入的资料可能包含大量错误的信箱。',
  'phplist Import  Results' => '汇入结果',
  'File containing emails' => '档桉包含电子邮件数量',
  'Field Delimiter' => '栏位分隔字元',
  '(default is TAB)' => '(预设为TAB字元)',
  'Record Delimiter' => '资料分隔字元',
  '(default is line break)' => '(预设为断行)',
  'Test output' => '测试输出',
  'Show Warnings' => '显示警告',
  'Omit Invalid' => '忽略错误',
  'Assign Invalid' => '指定错误',
  'Overwrite Existing' => '覆盖现有资料',
  'Retain Old User Email' => '保留旧信箱',
  'Send&nbsp;Notification&nbsp;email' => '发送提醒邮件',
  'Make confirmed immediately' => '立刻订阅',
  'Import' => '汇入',

);
?>