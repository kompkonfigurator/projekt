<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-05-16 02:35:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/img/bb.png ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-05-16 02:35:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/img/bb.png ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-05-16 05:10:22 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH\orm\classes\kohana\auth\orm.php [ 76 ]
2012-05-16 05:10:22 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH\orm\classes\kohana\auth\orm.php [ 76 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-16 06:51:00 --- ERROR: Database_Exception [ 1146 ]: Table 'kohana.users' doesn't exist [ SHOW FULL COLUMNS FROM `users` ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2012-05-16 06:51:00 --- STRACE: Database_Exception [ 1146 ]: Table 'kohana.users' doesn't exist [ SHOW FULL COLUMNS FROM `users` ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\mysql.php(360): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#1 C:\xampp\htdocs\kohana\modules\orm\classes\kohana\orm.php(1504): Kohana_Database_MySQL->list_columns('users')
#2 C:\xampp\htdocs\kohana\modules\orm\classes\kohana\orm.php(392): Kohana_ORM->list_columns(true)
#3 C:\xampp\htdocs\kohana\modules\orm\classes\kohana\orm.php(337): Kohana_ORM->reload_columns()
#4 C:\xampp\htdocs\kohana\modules\orm\classes\kohana\orm.php(246): Kohana_ORM->_initialize()
#5 C:\xampp\htdocs\kohana\modules\orm\classes\kohana\orm.php(37): Kohana_ORM->__construct(NULL)
#6 C:\xampp\htdocs\kohana\application\classes\controller\default.php(20): Kohana_ORM::factory('user')
#7 [internal function]: Controller_Default->__construct(Object(Request), Object(Response))
#8 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(101): ReflectionClass->newInstance(Object(Request), Object(Response))
#9 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#11 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#12 {main}
2012-05-16 06:55:05 --- ERROR: ErrorException [ 8 ]: Undefined variable: langs ~ APPPATH\views\default.php [ 70 ]
2012-05-16 06:55:05 --- STRACE: ErrorException [ 8 ]: Undefined variable: langs ~ APPPATH\views\default.php [ 70 ]
--
#0 C:\xampp\htdocs\kohana\application\views\default.php(70): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\xampp\htdocs...', 70, Array)
#1 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#2 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#3 C:\xampp\htdocs\kohana\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#4 C:\xampp\htdocs\kohana\application\classes\controller\default.php(69): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Default->after()
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_Default))
#7 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#10 {main}
2012-05-16 06:55:06 --- ERROR: ErrorException [ 8 ]: Undefined variable: langs ~ APPPATH\views\default.php [ 70 ]
2012-05-16 06:55:06 --- STRACE: ErrorException [ 8 ]: Undefined variable: langs ~ APPPATH\views\default.php [ 70 ]
--
#0 C:\xampp\htdocs\kohana\application\views\default.php(70): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\xampp\htdocs...', 70, Array)
#1 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#2 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#3 C:\xampp\htdocs\kohana\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#4 C:\xampp\htdocs\kohana\application\classes\controller\default.php(69): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Default->after()
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_Default))
#7 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#10 {main}
2012-05-16 06:57:09 --- ERROR: ErrorException [ 8 ]: Undefined variable: langs ~ APPPATH\views\default.php [ 70 ]
2012-05-16 06:57:09 --- STRACE: ErrorException [ 8 ]: Undefined variable: langs ~ APPPATH\views\default.php [ 70 ]
--
#0 C:\xampp\htdocs\kohana\application\views\default.php(70): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\xampp\htdocs...', 70, Array)
#1 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#2 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#3 C:\xampp\htdocs\kohana\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#4 C:\xampp\htdocs\kohana\application\classes\controller\default.php(72): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Default->after()
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_Default))
#7 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#10 {main}
2012-05-16 06:57:09 --- ERROR: ErrorException [ 8 ]: Undefined variable: langs ~ APPPATH\views\default.php [ 70 ]
2012-05-16 06:57:09 --- STRACE: ErrorException [ 8 ]: Undefined variable: langs ~ APPPATH\views\default.php [ 70 ]
--
#0 C:\xampp\htdocs\kohana\application\views\default.php(70): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\xampp\htdocs...', 70, Array)
#1 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#2 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#3 C:\xampp\htdocs\kohana\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#4 C:\xampp\htdocs\kohana\application\classes\controller\default.php(72): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Default->after()
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_Default))
#7 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#10 {main}
2012-05-16 07:57:39 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected ' ~ APPPATH\classes\model\form.php [ 7 ]
2012-05-16 07:57:39 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected ' ~ APPPATH\classes\model\form.php [ 7 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-16 07:57:50 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected ' ~ APPPATH\classes\model\form.php [ 7 ]
2012-05-16 07:57:50 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected ' ~ APPPATH\classes\model\form.php [ 7 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-16 08:05:38 --- ERROR: ErrorException [ 1 ]: Call to undefined function echo__() ~ APPPATH\views\main.php [ 27 ]
2012-05-16 08:05:38 --- STRACE: ErrorException [ 1 ]: Call to undefined function echo__() ~ APPPATH\views\main.php [ 27 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-16 08:05:49 --- ERROR: ErrorException [ 1 ]: Call to undefined function echo__() ~ APPPATH\views\main.php [ 27 ]
2012-05-16 08:05:49 --- STRACE: ErrorException [ 1 ]: Call to undefined function echo__() ~ APPPATH\views\main.php [ 27 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-16 08:21:03 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\views\user\login.php [ 20 ]
2012-05-16 08:21:03 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\views\user\login.php [ 20 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-16 08:21:12 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\views\user\login.php [ 26 ]
2012-05-16 08:21:12 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\views\user\login.php [ 26 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-16 08:22:19 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\views\user\login.php [ 20 ]
2012-05-16 08:22:19 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\views\user\login.php [ 20 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-16 08:35:14 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected ',' ~ APPPATH\i18n\pl.php [ 97 ]
2012-05-16 08:35:14 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected ',' ~ APPPATH\i18n\pl.php [ 97 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-16 08:37:25 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected ',' ~ APPPATH\i18n\pl.php [ 98 ]
2012-05-16 08:37:25 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected ',' ~ APPPATH\i18n\pl.php [ 98 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-16 08:38:58 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected T_ECHO ~ APPPATH\views\map.php [ 10 ]
2012-05-16 08:38:58 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected T_ECHO ~ APPPATH\views\map.php [ 10 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-16 08:57:57 --- ERROR: View_Exception [ 0 ]: The requested view user/create could not be found ~ SYSPATH\classes\kohana\view.php [ 252 ]
2012-05-16 08:57:57 --- STRACE: View_Exception [ 0 ]: The requested view user/create could not be found ~ SYSPATH\classes\kohana\view.php [ 252 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(137): Kohana_View->set_filename('user/create')
#1 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(30): Kohana_View->__construct('user/create', NULL)
#2 C:\xampp\htdocs\kohana\application\classes\controller\user.php(22): Kohana_View::factory('user/create')
#3 [internal function]: Controller_User->action_create()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_User))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}