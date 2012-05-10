<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-05-08 13:10:47 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL home was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-05-08 13:10:47 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL home was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#3 {main}
2012-05-08 14:55:52 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_User::create_user() ~ APPPATH\classes\controller\user.php [ 31 ]
2012-05-08 14:55:52 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_User::create_user() ~ APPPATH\classes\controller\user.php [ 31 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}