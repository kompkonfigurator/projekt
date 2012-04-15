<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-04-15 14:52:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 14:52:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 14:52:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 14:52:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 14:58:30 --- ERROR: Database_Exception [ 1054 ]: Unknown column 'sel_sock' in 'field list' [ INSERT INTO `konfiguracja` (`sel_sock`, `id_plyta`) VALUES ('nie', '6556') ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2012-04-15 14:58:30 --- STRACE: Database_Exception [ 1054 ]: Unknown column 'sel_sock' in 'field list' [ INSERT INTO `konfiguracja` (`sel_sock`, `id_plyta`) VALUES ('nie', '6556') ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\query.php(245): Kohana_Database_MySQL->query(2, 'INSERT INTO `ko...', false, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(14): Kohana_Database_Query->execute()
#2 C:\xampp\htdocs\kohana\application\classes\controller\form.php(22): Model_Form->add_produkt(Array)
#3 [internal function]: Controller_Form->action_index()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}
2012-04-15 15:08:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:08:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:37:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:37:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:37:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:37:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:37:32 --- ERROR: ErrorException [ 2 ]: Missing argument 1 for Controller_Form::action_update() ~ APPPATH\classes\controller\form.php [ 26 ]
2012-04-15 15:37:32 --- STRACE: ErrorException [ 2 ]: Missing argument 1 for Controller_Form::action_update() ~ APPPATH\classes\controller\form.php [ 26 ]
--
#0 C:\xampp\htdocs\kohana\application\classes\controller\form.php(26): Kohana_Core::error_handler(2, 'Missing argumen...', 'C:\xampp\htdocs...', 26, Array)
#1 [internal function]: Controller_Form->action_update()
#2 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#3 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#6 {main}
2012-04-15 15:37:40 --- ERROR: ErrorException [ 2 ]: Missing argument 1 for Controller_Form::action_update() ~ APPPATH\classes\controller\form.php [ 26 ]
2012-04-15 15:37:40 --- STRACE: ErrorException [ 2 ]: Missing argument 1 for Controller_Form::action_update() ~ APPPATH\classes\controller\form.php [ 26 ]
--
#0 C:\xampp\htdocs\kohana\application\classes\controller\form.php(26): Kohana_Core::error_handler(2, 'Missing argumen...', 'C:\xampp\htdocs...', 26, Array)
#1 [internal function]: Controller_Form->action_update()
#2 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#3 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#6 {main}
2012-04-15 15:37:43 --- ERROR: ErrorException [ 2 ]: Missing argument 1 for Controller_Form::action_update() ~ APPPATH\classes\controller\form.php [ 26 ]
2012-04-15 15:37:43 --- STRACE: ErrorException [ 2 ]: Missing argument 1 for Controller_Form::action_update() ~ APPPATH\classes\controller\form.php [ 26 ]
--
#0 C:\xampp\htdocs\kohana\application\classes\controller\form.php(26): Kohana_Core::error_handler(2, 'Missing argumen...', 'C:\xampp\htdocs...', 26, Array)
#1 [internal function]: Controller_Form->action_update()
#2 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#3 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#6 {main}
2012-04-15 15:38:11 --- ERROR: ErrorException [ 2 ]: Missing argument 1 for Controller_Form::action_update() ~ APPPATH\classes\controller\form.php [ 26 ]
2012-04-15 15:38:11 --- STRACE: ErrorException [ 2 ]: Missing argument 1 for Controller_Form::action_update() ~ APPPATH\classes\controller\form.php [ 26 ]
--
#0 C:\xampp\htdocs\kohana\application\classes\controller\form.php(26): Kohana_Core::error_handler(2, 'Missing argumen...', 'C:\xampp\htdocs...', 26, Array)
#1 [internal function]: Controller_Form->action_update()
#2 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#3 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#6 {main}
2012-04-15 15:38:18 --- ERROR: ErrorException [ 2 ]: Missing argument 1 for Controller_Form::action_update() ~ APPPATH\classes\controller\form.php [ 26 ]
2012-04-15 15:38:18 --- STRACE: ErrorException [ 2 ]: Missing argument 1 for Controller_Form::action_update() ~ APPPATH\classes\controller\form.php [ 26 ]
--
#0 C:\xampp\htdocs\kohana\application\classes\controller\form.php(26): Kohana_Core::error_handler(2, 'Missing argumen...', 'C:\xampp\htdocs...', 26, Array)
#1 [internal function]: Controller_Form->action_update()
#2 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#3 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#6 {main}
2012-04-15 15:38:20 --- ERROR: ErrorException [ 2 ]: Missing argument 1 for Controller_Form::action_update() ~ APPPATH\classes\controller\form.php [ 26 ]
2012-04-15 15:38:20 --- STRACE: ErrorException [ 2 ]: Missing argument 1 for Controller_Form::action_update() ~ APPPATH\classes\controller\form.php [ 26 ]
--
#0 C:\xampp\htdocs\kohana\application\classes\controller\form.php(26): Kohana_Core::error_handler(2, 'Missing argumen...', 'C:\xampp\htdocs...', 26, Array)
#1 [internal function]: Controller_Form->action_update()
#2 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#3 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#6 {main}
2012-04-15 15:39:00 --- ERROR: ErrorException [ 2 ]: Missing argument 1 for Controller_Form::action_update() ~ APPPATH\classes\controller\form.php [ 26 ]
2012-04-15 15:39:00 --- STRACE: ErrorException [ 2 ]: Missing argument 1 for Controller_Form::action_update() ~ APPPATH\classes\controller\form.php [ 26 ]
--
#0 C:\xampp\htdocs\kohana\application\classes\controller\form.php(26): Kohana_Core::error_handler(2, 'Missing argumen...', 'C:\xampp\htdocs...', 26, Array)
#1 [internal function]: Controller_Form->action_update()
#2 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#3 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#6 {main}
2012-04-15 15:39:07 --- ERROR: ErrorException [ 2 ]: Missing argument 1 for Controller_Form::action_update() ~ APPPATH\classes\controller\form.php [ 26 ]
2012-04-15 15:39:07 --- STRACE: ErrorException [ 2 ]: Missing argument 1 for Controller_Form::action_update() ~ APPPATH\classes\controller\form.php [ 26 ]
--
#0 C:\xampp\htdocs\kohana\application\classes\controller\form.php(26): Kohana_Core::error_handler(2, 'Missing argumen...', 'C:\xampp\htdocs...', 26, Array)
#1 [internal function]: Controller_Form->action_update()
#2 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#3 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#6 {main}
2012-04-15 15:40:40 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:40:40 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:40:54 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:40:54 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:41:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:41:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:41:28 --- ERROR: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH\classes\controller\form.php [ 32 ]
2012-04-15 15:41:28 --- STRACE: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH\classes\controller\form.php [ 32 ]
--
#0 C:\xampp\htdocs\kohana\application\classes\controller\form.php(32): Kohana_Core::error_handler(2, 'Attempt to assi...', 'C:\xampp\htdocs...', 32, Array)
#1 [internal function]: Controller_Form->action_update()
#2 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#3 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#6 {main}
2012-04-15 15:41:42 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:41:42 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:42:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:42:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:42:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:42:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:42:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:42:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:42:31 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:42:31 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:42:32 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:42:32 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:42:33 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:42:33 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:42:33 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:42:33 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:42:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:42:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:42:40 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:42:40 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:42:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:42:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:42:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:42:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:43:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:43:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:44:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:44:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:44:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:44:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:44:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:44:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:44:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:44:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:44:56 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:44:56 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:45:49 --- ERROR: ErrorException [ 2 ]: Missing argument 1 for Controller_Form::action_update() ~ APPPATH\classes\controller\form.php [ 26 ]
2012-04-15 15:45:49 --- STRACE: ErrorException [ 2 ]: Missing argument 1 for Controller_Form::action_update() ~ APPPATH\classes\controller\form.php [ 26 ]
--
#0 C:\xampp\htdocs\kohana\application\classes\controller\form.php(26): Kohana_Core::error_handler(2, 'Missing argumen...', 'C:\xampp\htdocs...', 26, Array)
#1 [internal function]: Controller_Form->action_update()
#2 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#3 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#6 {main}
2012-04-15 15:45:50 --- ERROR: ErrorException [ 2 ]: Missing argument 1 for Controller_Form::action_update() ~ APPPATH\classes\controller\form.php [ 26 ]
2012-04-15 15:45:50 --- STRACE: ErrorException [ 2 ]: Missing argument 1 for Controller_Form::action_update() ~ APPPATH\classes\controller\form.php [ 26 ]
--
#0 C:\xampp\htdocs\kohana\application\classes\controller\form.php(26): Kohana_Core::error_handler(2, 'Missing argumen...', 'C:\xampp\htdocs...', 26, Array)
#1 [internal function]: Controller_Form->action_update()
#2 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#3 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#6 {main}
2012-04-15 15:47:26 --- ERROR: ErrorException [ 8 ]: Undefined index: name ~ MODPATH\database\classes\kohana\database\result.php [ 162 ]
2012-04-15 15:47:26 --- STRACE: ErrorException [ 8 ]: Undefined index: name ~ MODPATH\database\classes\kohana\database\result.php [ 162 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\result.php(162): Kohana_Core::error_handler(8, 'Undefined index...', 'C:\xampp\htdocs...', 162, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(15): Kohana_Database_Result->as_array('id', 'name')
#2 C:\xampp\htdocs\kohana\application\classes\controller\form.php(31): Model_Form->get_konf('3')
#3 [internal function]: Controller_Form->action_update()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}
2012-04-15 15:49:18 --- ERROR: ErrorException [ 8 ]: Undefined index: name ~ MODPATH\database\classes\kohana\database\result.php [ 162 ]
2012-04-15 15:49:18 --- STRACE: ErrorException [ 8 ]: Undefined index: name ~ MODPATH\database\classes\kohana\database\result.php [ 162 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\result.php(162): Kohana_Core::error_handler(8, 'Undefined index...', 'C:\xampp\htdocs...', 162, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(15): Kohana_Database_Result->as_array('id', 'name')
#2 C:\xampp\htdocs\kohana\application\classes\controller\form.php(31): Model_Form->get_konf('3')
#3 [internal function]: Controller_Form->action_update()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}
2012-04-15 15:49:21 --- ERROR: ErrorException [ 8 ]: Undefined index: name ~ MODPATH\database\classes\kohana\database\result.php [ 162 ]
2012-04-15 15:49:21 --- STRACE: ErrorException [ 8 ]: Undefined index: name ~ MODPATH\database\classes\kohana\database\result.php [ 162 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\result.php(162): Kohana_Core::error_handler(8, 'Undefined index...', 'C:\xampp\htdocs...', 162, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(15): Kohana_Database_Result->as_array('id', 'name')
#2 C:\xampp\htdocs\kohana\application\classes\controller\form.php(31): Model_Form->get_konf('3')
#3 [internal function]: Controller_Form->action_update()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}
2012-04-15 15:49:22 --- ERROR: ErrorException [ 8 ]: Undefined index: name ~ MODPATH\database\classes\kohana\database\result.php [ 162 ]
2012-04-15 15:49:22 --- STRACE: ErrorException [ 8 ]: Undefined index: name ~ MODPATH\database\classes\kohana\database\result.php [ 162 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\result.php(162): Kohana_Core::error_handler(8, 'Undefined index...', 'C:\xampp\htdocs...', 162, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(15): Kohana_Database_Result->as_array('id', 'name')
#2 C:\xampp\htdocs\kohana\application\classes\controller\form.php(31): Model_Form->get_konf('3')
#3 [internal function]: Controller_Form->action_update()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}
2012-04-15 15:49:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:49:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:50:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:50:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:50:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:50:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:52:27 --- ERROR: ErrorException [ 1 ]: Call to undefined method Kohana::debug() ~ APPPATH\classes\controller\form.php [ 32 ]
2012-04-15 15:52:27 --- STRACE: ErrorException [ 1 ]: Call to undefined method Kohana::debug() ~ APPPATH\classes\controller\form.php [ 32 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-04-15 15:54:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:54:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:54:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:54:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:54:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:54:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:56:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:56:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 15:56:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 15:56:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 16:02:38 --- ERROR: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
2012-04-15 16:02:38 --- STRACE: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
--
#0 C:\xampp\htdocs\kohana\application\views\form.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\xampp\htdocs...', 12, Array)
#1 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#2 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#3 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(228): Kohana_View->render()
#4 C:\xampp\htdocs\kohana\application\views\default.php(69): Kohana_View->__toString()
#5 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#6 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#7 C:\xampp\htdocs\kohana\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\kohana\application\classes\controller\default.php(69): Kohana_Controller_Template->after()
#9 [internal function]: Controller_Default->after()
#10 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_Form))
#11 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#14 {main}
2012-04-15 16:02:40 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 16:02:40 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 16:05:05 --- ERROR: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
2012-04-15 16:05:05 --- STRACE: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
--
#0 C:\xampp\htdocs\kohana\application\views\form.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\xampp\htdocs...', 12, Array)
#1 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#2 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#3 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(228): Kohana_View->render()
#4 C:\xampp\htdocs\kohana\application\views\default.php(69): Kohana_View->__toString()
#5 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#6 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#7 C:\xampp\htdocs\kohana\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\kohana\application\classes\controller\default.php(69): Kohana_Controller_Template->after()
#9 [internal function]: Controller_Default->after()
#10 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_Form))
#11 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#14 {main}
2012-04-15 16:05:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 16:05:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 16:06:16 --- ERROR: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
2012-04-15 16:06:16 --- STRACE: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
--
#0 C:\xampp\htdocs\kohana\application\views\form.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\xampp\htdocs...', 12, Array)
#1 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#2 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#3 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(228): Kohana_View->render()
#4 C:\xampp\htdocs\kohana\application\views\default.php(69): Kohana_View->__toString()
#5 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#6 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#7 C:\xampp\htdocs\kohana\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\kohana\application\classes\controller\default.php(69): Kohana_Controller_Template->after()
#9 [internal function]: Controller_Default->after()
#10 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_Form))
#11 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#14 {main}
2012-04-15 16:06:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 16:06:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 16:06:17 --- ERROR: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
2012-04-15 16:06:17 --- STRACE: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
--
#0 C:\xampp\htdocs\kohana\application\views\form.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\xampp\htdocs...', 12, Array)
#1 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#2 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#3 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(228): Kohana_View->render()
#4 C:\xampp\htdocs\kohana\application\views\default.php(69): Kohana_View->__toString()
#5 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#6 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#7 C:\xampp\htdocs\kohana\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\kohana\application\classes\controller\default.php(69): Kohana_Controller_Template->after()
#9 [internal function]: Controller_Default->after()
#10 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_Form))
#11 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#14 {main}
2012-04-15 16:06:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 16:06:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 16:07:01 --- ERROR: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
2012-04-15 16:07:01 --- STRACE: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
--
#0 C:\xampp\htdocs\kohana\application\views\form.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\xampp\htdocs...', 12, Array)
#1 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#2 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#3 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(228): Kohana_View->render()
#4 C:\xampp\htdocs\kohana\application\views\default.php(69): Kohana_View->__toString()
#5 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#6 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#7 C:\xampp\htdocs\kohana\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\kohana\application\classes\controller\default.php(69): Kohana_Controller_Template->after()
#9 [internal function]: Controller_Default->after()
#10 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_Form))
#11 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#14 {main}
2012-04-15 16:07:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 16:07:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 16:07:37 --- ERROR: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
2012-04-15 16:07:37 --- STRACE: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
--
#0 C:\xampp\htdocs\kohana\application\views\form.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\xampp\htdocs...', 12, Array)
#1 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#2 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#3 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(228): Kohana_View->render()
#4 C:\xampp\htdocs\kohana\application\views\default.php(69): Kohana_View->__toString()
#5 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#6 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#7 C:\xampp\htdocs\kohana\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\kohana\application\classes\controller\default.php(69): Kohana_Controller_Template->after()
#9 [internal function]: Controller_Default->after()
#10 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_Form))
#11 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#14 {main}
2012-04-15 16:07:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 16:07:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 16:07:49 --- ERROR: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
2012-04-15 16:07:49 --- STRACE: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
--
#0 C:\xampp\htdocs\kohana\application\views\form.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\xampp\htdocs...', 12, Array)
#1 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#2 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#3 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(228): Kohana_View->render()
#4 C:\xampp\htdocs\kohana\application\views\default.php(69): Kohana_View->__toString()
#5 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#6 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#7 C:\xampp\htdocs\kohana\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\kohana\application\classes\controller\default.php(69): Kohana_Controller_Template->after()
#9 [internal function]: Controller_Default->after()
#10 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_Form))
#11 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#14 {main}
2012-04-15 16:07:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 16:07:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 16:07:50 --- ERROR: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
2012-04-15 16:07:50 --- STRACE: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
--
#0 C:\xampp\htdocs\kohana\application\views\form.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\xampp\htdocs...', 12, Array)
#1 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#2 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#3 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(228): Kohana_View->render()
#4 C:\xampp\htdocs\kohana\application\views\default.php(69): Kohana_View->__toString()
#5 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#6 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#7 C:\xampp\htdocs\kohana\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\kohana\application\classes\controller\default.php(69): Kohana_Controller_Template->after()
#9 [internal function]: Controller_Default->after()
#10 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_Form))
#11 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#14 {main}
2012-04-15 16:07:50 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 16:07:50 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 16:07:59 --- ERROR: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
2012-04-15 16:07:59 --- STRACE: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
--
#0 C:\xampp\htdocs\kohana\application\views\form.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\xampp\htdocs...', 12, Array)
#1 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#2 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#3 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(228): Kohana_View->render()
#4 C:\xampp\htdocs\kohana\application\views\default.php(69): Kohana_View->__toString()
#5 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#6 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#7 C:\xampp\htdocs\kohana\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\kohana\application\classes\controller\default.php(69): Kohana_Controller_Template->after()
#9 [internal function]: Controller_Default->after()
#10 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_Form))
#11 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#14 {main}
2012-04-15 16:08:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 16:08:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 16:08:12 --- ERROR: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
2012-04-15 16:08:12 --- STRACE: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
--
#0 C:\xampp\htdocs\kohana\application\views\form.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\xampp\htdocs...', 12, Array)
#1 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#2 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#3 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(228): Kohana_View->render()
#4 C:\xampp\htdocs\kohana\application\views\default.php(69): Kohana_View->__toString()
#5 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#6 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#7 C:\xampp\htdocs\kohana\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\kohana\application\classes\controller\default.php(69): Kohana_Controller_Template->after()
#9 [internal function]: Controller_Default->after()
#10 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_Form))
#11 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#14 {main}
2012-04-15 16:08:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 16:08:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 16:11:08 --- ERROR: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
2012-04-15 16:11:08 --- STRACE: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
--
#0 C:\xampp\htdocs\kohana\application\views\form.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\xampp\htdocs...', 12, Array)
#1 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#2 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#3 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(228): Kohana_View->render()
#4 C:\xampp\htdocs\kohana\application\views\default.php(69): Kohana_View->__toString()
#5 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#6 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#7 C:\xampp\htdocs\kohana\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\kohana\application\classes\controller\default.php(69): Kohana_Controller_Template->after()
#9 [internal function]: Controller_Default->after()
#10 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_Form))
#11 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#14 {main}
2012-04-15 16:11:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 16:11:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 16:12:12 --- ERROR: ErrorException [ 1 ]: Call to undefined method Database_MySQL_Result::as_object() ~ APPPATH\classes\model\form.php [ 15 ]
2012-04-15 16:12:12 --- STRACE: ErrorException [ 1 ]: Call to undefined method Database_MySQL_Result::as_object() ~ APPPATH\classes\model\form.php [ 15 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-04-15 16:12:13 --- ERROR: ErrorException [ 1 ]: Call to undefined method Database_MySQL_Result::as_object() ~ APPPATH\classes\model\form.php [ 15 ]
2012-04-15 16:12:13 --- STRACE: ErrorException [ 1 ]: Call to undefined method Database_MySQL_Result::as_object() ~ APPPATH\classes\model\form.php [ 15 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-04-15 16:12:26 --- ERROR: ErrorException [ 1 ]: Call to undefined method Database_MySQL_Result::as_assoc() ~ APPPATH\classes\model\form.php [ 15 ]
2012-04-15 16:12:26 --- STRACE: ErrorException [ 1 ]: Call to undefined method Database_MySQL_Result::as_assoc() ~ APPPATH\classes\model\form.php [ 15 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-04-15 16:12:32 --- ERROR: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
2012-04-15 16:12:32 --- STRACE: ErrorException [ 8 ]: Undefined variable: plyta ~ APPPATH\views\form.php [ 12 ]
--
#0 C:\xampp\htdocs\kohana\application\views\form.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\xampp\htdocs...', 12, Array)
#1 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#2 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#3 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(228): Kohana_View->render()
#4 C:\xampp\htdocs\kohana\application\views\default.php(69): Kohana_View->__toString()
#5 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#6 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#7 C:\xampp\htdocs\kohana\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\kohana\application\classes\controller\default.php(69): Kohana_Controller_Template->after()
#9 [internal function]: Controller_Default->after()
#10 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_Form))
#11 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#14 {main}
2012-04-15 16:12:33 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 16:12:33 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 16:12:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 16:12:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-15 16:13:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-15 16:13:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}