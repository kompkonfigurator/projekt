<?php
$lan = array(
  'File is either to large or does not exist.' => 'ファイルは大きいか存在しないかのどちらかです。',
  'No file was specified.' => 'ファイルが指定されませんでした。',
  'Some characters that are not valid have been found. These might be delimiters. Please check the file and select the right delimiter. Character found:' => '妥当でない文字がいくつかみつかりました。これらは区切り文字かもしれません。ファイルをチェックして正しいデリミタを選択してください。文字が見つかりました:',
  'Name cannot be empty' => '名前は空にはできません。',
  'Name is not unique enough' => '名前が十分ユニークではありません。',
  'Cannot find the email in the header' => 'ヘッダに電子メールを見つけることができません。',
  'Cannot find the password in the header' => 'ヘッダにパスワードを見つけることができません。',
  'Cannot find the loginname in the header' => 'ヘッダにログイン名を見つけることができません。',
  'Record has no email' => 'レコードには電子メールがありません。',
  'Invalid Email' => 'Invalid Email',
  'Record has more values than header indicated, this may cause trouble' => 'レコードは指定されたヘッダより多くの値を持っています。このことは問題を起こすかもしれません。',
  'password' => 'パスワード',
  'loginname' => 'ログイン名',
  'Empty loginname, using email:' => 'ログイン名が空です。電子メールを使用:',
  'Value' => '値',
  'added to attribute' => '属性に追加されました。',
  'new email was' => 'new email was',
  'new emails were' => 'new emails were',
  'email was' => 'email was',
  'emails were' => 'emails were',
  'All the emails already exist in the database' => 'すべての電子メールは既にデータベースに存在しています。',
  'succesfully imported to the database and added to the system.' => 'データベースへのインポートが成功し、システムに追加されました。',
  'Import some more emails' => 'もう少し電子メールをインポート',
  'No default permissions have been defined, please create default permissions first, by creating one dummy admin and assigning the default permissions to this admin' => 'デフォルトのパーミッションが定義されていません。ダミーの管理者を作成し、この管理者にデフォルトのパーミッションを割り当てることにより、どうかまずデフォルトのパーミッションを作成してください。',
  
  # do not translate email, loginname and password
  'importadmininfo' => '
  アップロードするファイルはシステムに追加したい管理者を含んでいる必要があるでしょう。カラムは次のヘッダをもつ必要がありま: <b>email</b>, <b>loginname</b>, <b>password</b>. 他のカラムはいかなるものでも、管理者属性として追加されるでしょう。
 <b>警告</b>: ファイルはプレーンテキストである必要があります。Wordドキュメントのようなバイナリファイルをアップロードしないでください。
  ',
  'File containing emails' => 'emailsを含んでいるファイル',
  'Field Delimiter' => 'フィールド区切り文字',
  'Record Delimiter' => 'レコード区切り文字',
  'importadmintestinfo' => 'もし、"テスト出力"をチェックするのであれば、あなたの画面上に解析された電子メールのリストが表示されますが、データベースには情報は保存されないでしょう。これはあなたのファイルのフォーマットが正しいかどうかみつけるのに役立ちます。最初の50レコードのみ表示されるでしょう。',
  # this should be the same as the term between quotes in the previous one
  'Test output' => 'テスト出力',
  'Check this box to create a list for each administrator, named after their loginname' => 'ログイン名にちなんで名づけられた各管理者のリストを作成するためにはこのボックスをチェックしてください。',
  'Do Import' => 'インポート実行',
  'default is TAB' => 'デフォルトはTABです。',
  'default is line break' => 'デフォルトは line break です。',
  'testoutputinfo' => 'テスト出力:<br>1行につき1つの電子メールのみであるべきです。<br>もし出力がOKでしたら、本当に再送信するためには<a href="javascript:history.go(-1)">戻る</a>に行ってください。<br><br>',  
  'List for' => 'List for',
'login' => 'ログイン',
  
  
);
?>