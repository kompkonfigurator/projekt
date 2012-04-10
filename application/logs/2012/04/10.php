<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-04-10 14:45:43 --- ERROR: Database_Exception [ 1146 ]: Table 'kohana.users' doesn't exist [ SHOW FULL COLUMNS FROM `users` ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2012-04-10 14:45:43 --- STRACE: Database_Exception [ 1146 ]: Table 'kohana.users' doesn't exist [ SHOW FULL COLUMNS FROM `users` ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\mysql.php(360): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#1 C:\xampp\htdocs\kohana\modules\orm\classes\kohana\orm.php(1504): Kohana_Database_MySQL->list_columns('users')
#2 C:\xampp\htdocs\kohana\modules\orm\classes\kohana\orm.php(392): Kohana_ORM->list_columns(true)
#3 C:\xampp\htdocs\kohana\modules\orm\classes\kohana\orm.php(337): Kohana_ORM->reload_columns()
#4 C:\xampp\htdocs\kohana\modules\orm\classes\kohana\orm.php(246): Kohana_ORM->_initialize()
#5 C:\xampp\htdocs\kohana\application\classes\model\user.php(6): Kohana_ORM->__construct(NULL)
#6 C:\xampp\htdocs\kohana\modules\orm\classes\kohana\orm.php(37): Model_User->__construct(NULL)
#7 C:\xampp\htdocs\kohana\application\classes\controller\default.php(20): Kohana_ORM::factory('user')
#8 [internal function]: Controller_Default->__construct(Object(Request), Object(Response))
#9 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(101): ReflectionClass->newInstance(Object(Request), Object(Response))
#10 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#11 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#12 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#13 {main}
2012-04-10 14:46:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-10 14:46:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-10 14:46:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-10 14:46:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-10 14:47:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-10 14:47:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-10 14:47:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-10 14:47:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-10 14:50:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-10 14:50:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-10 15:04:29 --- ERROR: ErrorException [ 1 ]: Access to undeclared static property: Request::$method ~ APPPATH\classes\controller\form.php [ 20 ]
2012-04-10 15:04:29 --- STRACE: ErrorException [ 1 ]: Access to undeclared static property: Request::$method ~ APPPATH\classes\controller\form.php [ 20 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-04-10 15:08:20 --- ERROR: ErrorException [ 1 ]: Call to undefined method Controller_Form::isPostRequest() ~ APPPATH\classes\controller\form.php [ 20 ]
2012-04-10 15:08:20 --- STRACE: ErrorException [ 1 ]: Call to undefined method Controller_Form::isPostRequest() ~ APPPATH\classes\controller\form.php [ 20 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-04-10 15:10:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-10 15:10:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-10 15:10:54 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-10 15:10:54 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-04-10 15:11:12 --- ERROR: ErrorException [ 8 ]: Undefined index: komp_procesor ~ APPPATH\classes\model\form.php [ 11 ]
2012-04-10 15:11:12 --- STRACE: ErrorException [ 8 ]: Undefined index: komp_procesor ~ APPPATH\classes\model\form.php [ 11 ]
--
#0 C:\xampp\htdocs\kohana\application\classes\model\form.php(11): Kohana_Core::error_handler(8, 'Undefined index...', 'C:\xampp\htdocs...', 11, Array)
#1 C:\xampp\htdocs\kohana\application\classes\controller\form.php(22): Model_Form->add_produkt(Array)
#2 [internal function]: Controller_Form->action_index()
#3 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#7 {main}
2012-04-10 15:16:01 --- ERROR: ErrorException [ 1 ]: Call to undefined method Debug::_domp() ~ APPPATH\classes\controller\form.php [ 22 ]
2012-04-10 15:16:01 --- STRACE: ErrorException [ 1 ]: Call to undefined method Debug::_domp() ~ APPPATH\classes\controller\form.php [ 22 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-04-10 15:16:13 --- ERROR: ErrorException [ 1 ]: Call to protected method Kohana_Debug::_dump() from context 'Controller_Form' ~ APPPATH\classes\controller\form.php [ 22 ]
2012-04-10 15:16:13 --- STRACE: ErrorException [ 1 ]: Call to protected method Kohana_Debug::_dump() from context 'Controller_Form' ~ APPPATH\classes\controller\form.php [ 22 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-04-10 15:16:59 --- ERROR: ErrorException [ 8 ]: Undefined index: komp_procesor ~ APPPATH\classes\model\form.php [ 11 ]
2012-04-10 15:16:59 --- STRACE: ErrorException [ 8 ]: Undefined index: komp_procesor ~ APPPATH\classes\model\form.php [ 11 ]
--
#0 C:\xampp\htdocs\kohana\application\classes\model\form.php(11): Kohana_Core::error_handler(8, 'Undefined index...', 'C:\xampp\htdocs...', 11, Array)
#1 C:\xampp\htdocs\kohana\application\classes\controller\form.php(23): Model_Form->add_produkt(Array)
#2 [internal function]: Controller_Form->action_index()
#3 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#7 {main}
2012-04-10 15:21:06 --- ERROR: ErrorException [ 8 ]: Undefined index: komp_procesor ~ APPPATH\classes\model\form.php [ 12 ]
2012-04-10 15:21:06 --- STRACE: ErrorException [ 8 ]: Undefined index: komp_procesor ~ APPPATH\classes\model\form.php [ 12 ]
--
#0 C:\xampp\htdocs\kohana\application\classes\model\form.php(12): Kohana_Core::error_handler(8, 'Undefined index...', 'C:\xampp\htdocs...', 12, Array)
#1 C:\xampp\htdocs\kohana\application\classes\controller\form.php(23): Model_Form->add_produkt(Array)
#2 [internal function]: Controller_Form->action_index()
#3 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#7 {main}
2012-04-10 15:21:29 --- ERROR: ErrorException [ 8 ]: Undefined index: komp_procesor ~ APPPATH\classes\model\form.php [ 12 ]
2012-04-10 15:21:29 --- STRACE: ErrorException [ 8 ]: Undefined index: komp_procesor ~ APPPATH\classes\model\form.php [ 12 ]
--
#0 C:\xampp\htdocs\kohana\application\classes\model\form.php(12): Kohana_Core::error_handler(8, 'Undefined index...', 'C:\xampp\htdocs...', 12, Array)
#1 C:\xampp\htdocs\kohana\application\classes\controller\form.php(23): Model_Form->add_produkt(Array)
#2 [internal function]: Controller_Form->action_index()
#3 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#7 {main}
2012-04-10 15:22:34 --- ERROR: Database_Exception [ 1054 ]: Unknown column 'id_plyta' in 'field list' [ INSERT INTO `produkty` (`id_plyta`, `id_procesor`, `id_pamiec`, `id_pamiec2`, `id_karta_graf`, `id_dysk`, `id_dysk2`, `id_obudowa`, `id_zasilacz`, `id_naped`, `id_karta_muz`, `id_klawiatura`, `id_mysz`) VALUES ('1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2012-04-10 15:22:34 --- STRACE: Database_Exception [ 1054 ]: Unknown column 'id_plyta' in 'field list' [ INSERT INTO `produkty` (`id_plyta`, `id_procesor`, `id_pamiec`, `id_pamiec2`, `id_karta_graf`, `id_dysk`, `id_dysk2`, `id_obudowa`, `id_zasilacz`, `id_naped`, `id_karta_muz`, `id_klawiatura`, `id_mysz`) VALUES ('1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\query.php(245): Kohana_Database_MySQL->query(2, 'INSERT INTO `pr...', false, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(13): Kohana_Database_Query->execute()
#2 C:\xampp\htdocs\kohana\application\classes\controller\form.php(23): Model_Form->add_produkt(Array)
#3 [internal function]: Controller_Form->action_index()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}
2012-04-10 15:23:05 --- ERROR: Database_Exception [ 1146 ]: Table 'kohana.kongiguracja' doesn't exist [ INSERT INTO `kongiguracja` (`id_plyta`, `id_procesor`, `id_pamiec`, `id_pamiec2`, `id_karta_graf`, `id_dysk`, `id_dysk2`, `id_obudowa`, `id_zasilacz`, `id_naped`, `id_karta_muz`, `id_klawiatura`, `id_mysz`) VALUES ('1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2012-04-10 15:23:05 --- STRACE: Database_Exception [ 1146 ]: Table 'kohana.kongiguracja' doesn't exist [ INSERT INTO `kongiguracja` (`id_plyta`, `id_procesor`, `id_pamiec`, `id_pamiec2`, `id_karta_graf`, `id_dysk`, `id_dysk2`, `id_obudowa`, `id_zasilacz`, `id_naped`, `id_karta_muz`, `id_klawiatura`, `id_mysz`) VALUES ('1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\query.php(245): Kohana_Database_MySQL->query(2, 'INSERT INTO `ko...', false, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(13): Kohana_Database_Query->execute()
#2 C:\xampp\htdocs\kohana\application\classes\controller\form.php(23): Model_Form->add_produkt(Array)
#3 [internal function]: Controller_Form->action_index()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}
2012-04-10 15:23:13 --- ERROR: Database_Exception [ 1048 ]: Column 'id_procesor' cannot be null [ INSERT INTO `konfiguracja` (`id_plyta`, `id_procesor`, `id_pamiec`, `id_pamiec2`, `id_karta_graf`, `id_dysk`, `id_dysk2`, `id_obudowa`, `id_zasilacz`, `id_naped`, `id_karta_muz`, `id_klawiatura`, `id_mysz`) VALUES ('1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2012-04-10 15:23:13 --- STRACE: Database_Exception [ 1048 ]: Column 'id_procesor' cannot be null [ INSERT INTO `konfiguracja` (`id_plyta`, `id_procesor`, `id_pamiec`, `id_pamiec2`, `id_karta_graf`, `id_dysk`, `id_dysk2`, `id_obudowa`, `id_zasilacz`, `id_naped`, `id_karta_muz`, `id_klawiatura`, `id_mysz`) VALUES ('1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\query.php(245): Kohana_Database_MySQL->query(2, 'INSERT INTO `ko...', false, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(13): Kohana_Database_Query->execute()
#2 C:\xampp\htdocs\kohana\application\classes\controller\form.php(23): Model_Form->add_produkt(Array)
#3 [internal function]: Controller_Form->action_index()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}
2012-04-10 15:24:56 --- ERROR: ErrorException [ 1 ]: Call to undefined method URL::redirect() ~ APPPATH\classes\controller\form.php [ 23 ]
2012-04-10 15:24:56 --- STRACE: ErrorException [ 1 ]: Call to undefined method URL::redirect() ~ APPPATH\classes\controller\form.php [ 23 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-04-10 15:26:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-04-10 15:26:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}