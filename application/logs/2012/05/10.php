<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-05-10 10:38:24 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '[' ~ APPPATH\classes\controller\form.php [ 13 ]
2012-05-10 10:38:24 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected '[' ~ APPPATH\classes\controller\form.php [ 13 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-10 10:43:29 --- ERROR: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ':1467)' at line 1 [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.1467_sklep  = s.shop_1467 WHERE ps.1467_produkt IN (SELECT 1467_nokaut FROM produkty WHERE 1467 = :1467) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2012-05-10 10:43:29 --- STRACE: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ':1467)' at line 1 [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.1467_sklep  = s.shop_1467 WHERE ps.1467_produkt IN (SELECT 1467_nokaut FROM produkty WHERE 1467 = :1467) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM p...', false, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(41): Kohana_Database_Query->execute()
#2 C:\xampp\htdocs\kohana\application\classes\controller\form.php(15): Model_Form->get_shops(1467)
#3 [internal function]: Controller_Form->action_index()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}
2012-05-10 10:45:45 --- ERROR: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ':ajdi)' at line 1 [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = :ajdi) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2012-05-10 10:45:45 --- STRACE: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ':ajdi)' at line 1 [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = :ajdi) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM p...', false, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(41): Kohana_Database_Query->execute()
#2 C:\xampp\htdocs\kohana\application\classes\controller\form.php(15): Model_Form->get_shops(1467)
#3 [internal function]: Controller_Form->action_index()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}
2012-05-10 10:45:46 --- ERROR: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ':ajdi)' at line 1 [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = :ajdi) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2012-05-10 10:45:46 --- STRACE: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ':ajdi)' at line 1 [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = :ajdi) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM p...', false, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(41): Kohana_Database_Query->execute()
#2 C:\xampp\htdocs\kohana\application\classes\controller\form.php(15): Model_Form->get_shops(1467)
#3 [internal function]: Controller_Form->action_index()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}
2012-05-10 10:46:04 --- ERROR: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ':1467)' at line 1 [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = :1467) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2012-05-10 10:46:04 --- STRACE: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ':1467)' at line 1 [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = :1467) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM p...', false, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(41): Kohana_Database_Query->execute()
#2 C:\xampp\htdocs\kohana\application\classes\controller\form.php(15): Model_Form->get_shops(1467)
#3 [internal function]: Controller_Form->action_index()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}
2012-05-10 10:46:26 --- ERROR: ErrorException [ 4096 ]: Argument 2 passed to Kohana_Form::select() must be an array, object given, called in C:\xampp\htdocs\kohana\application\views\form.php on line 27 and defined ~ SYSPATH\classes\kohana\form.php [ 252 ]
2012-05-10 10:46:26 --- STRACE: ErrorException [ 4096 ]: Argument 2 passed to Kohana_Form::select() must be an array, object given, called in C:\xampp\htdocs\kohana\application\views\form.php on line 27 and defined ~ SYSPATH\classes\kohana\form.php [ 252 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\form.php(252): Kohana_Core::error_handler(4096, 'Argument 2 pass...', 'C:\xampp\htdocs...', 252, Array)
#1 C:\xampp\htdocs\kohana\application\views\form.php(27): Kohana_Form::select('id_plyta_sklep', Object(Database_MySQL_Result), NULL, Array, NULL, 'standard')
#2 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#3 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#4 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(228): Kohana_View->render()
#5 C:\xampp\htdocs\kohana\application\views\default.php(69): Kohana_View->__toString()
#6 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#7 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#8 C:\xampp\htdocs\kohana\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#9 C:\xampp\htdocs\kohana\application\classes\controller\default.php(69): Kohana_Controller_Template->after()
#10 [internal function]: Controller_Default->after()
#11 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_Form))
#12 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#13 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#14 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#15 {main}
2012-05-10 10:47:19 --- ERROR: ErrorException [ 4096 ]: Argument 2 passed to Kohana_Form::select() must be an array, object given, called in C:\xampp\htdocs\kohana\application\views\form.php on line 28 and defined ~ SYSPATH\classes\kohana\form.php [ 252 ]
2012-05-10 10:47:19 --- STRACE: ErrorException [ 4096 ]: Argument 2 passed to Kohana_Form::select() must be an array, object given, called in C:\xampp\htdocs\kohana\application\views\form.php on line 28 and defined ~ SYSPATH\classes\kohana\form.php [ 252 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\form.php(252): Kohana_Core::error_handler(4096, 'Argument 2 pass...', 'C:\xampp\htdocs...', 252, Array)
#1 C:\xampp\htdocs\kohana\application\views\form.php(28): Kohana_Form::select('id_plyta_sklep', Object(Database_MySQL_Result), NULL, Array, NULL, 'standard')
#2 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#3 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#4 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(228): Kohana_View->render()
#5 C:\xampp\htdocs\kohana\application\views\default.php(69): Kohana_View->__toString()
#6 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#7 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#8 C:\xampp\htdocs\kohana\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#9 C:\xampp\htdocs\kohana\application\classes\controller\default.php(69): Kohana_Controller_Template->after()
#10 [internal function]: Controller_Default->after()
#11 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_Form))
#12 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#13 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#14 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#15 {main}
2012-05-10 10:47:51 --- ERROR: ErrorException [ 4096 ]: Argument 2 passed to Kohana_Form::select() must be an array, object given, called in C:\xampp\htdocs\kohana\application\views\form.php on line 27 and defined ~ SYSPATH\classes\kohana\form.php [ 252 ]
2012-05-10 10:47:51 --- STRACE: ErrorException [ 4096 ]: Argument 2 passed to Kohana_Form::select() must be an array, object given, called in C:\xampp\htdocs\kohana\application\views\form.php on line 27 and defined ~ SYSPATH\classes\kohana\form.php [ 252 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\form.php(252): Kohana_Core::error_handler(4096, 'Argument 2 pass...', 'C:\xampp\htdocs...', 252, Array)
#1 C:\xampp\htdocs\kohana\application\views\form.php(27): Kohana_Form::select('id_plyta_sklep', Object(Database_MySQL_Result), NULL, Array, NULL, 'standard')
#2 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#3 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#4 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(228): Kohana_View->render()
#5 C:\xampp\htdocs\kohana\application\views\default.php(69): Kohana_View->__toString()
#6 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(61): include('C:\xampp\htdocs...')
#7 C:\xampp\htdocs\kohana\system\classes\kohana\view.php(343): Kohana_View::capture('C:\xampp\htdocs...', Array)
#8 C:\xampp\htdocs\kohana\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#9 C:\xampp\htdocs\kohana\application\classes\controller\default.php(69): Kohana_Controller_Template->after()
#10 [internal function]: Controller_Default->after()
#11 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_Form))
#12 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#13 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#14 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#15 {main}
2012-05-10 10:55:38 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\classes\controller\form.php [ 16 ]
2012-05-10 10:55:38 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\classes\controller\form.php [ 16 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-10 10:57:45 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\form.php [ 18 ]
2012-05-10 10:57:45 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\form.php [ 18 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-10 10:57:45 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\form.php [ 18 ]
2012-05-10 10:57:45 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\form.php [ 18 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-10 10:57:46 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\form.php [ 18 ]
2012-05-10 10:57:46 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\form.php [ 18 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-10 10:58:03 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\form.php [ 18 ]
2012-05-10 10:58:03 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\form.php [ 18 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-10 10:58:21 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\form.php [ 18 ]
2012-05-10 10:58:21 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\form.php [ 18 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-10 10:58:21 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\form.php [ 18 ]
2012-05-10 10:58:21 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\form.php [ 18 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-10 10:58:22 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\form.php [ 18 ]
2012-05-10 10:58:22 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\form.php [ 18 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-10 10:58:22 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\form.php [ 18 ]
2012-05-10 10:58:22 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\form.php [ 18 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-10 10:58:22 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\form.php [ 18 ]
2012-05-10 10:58:22 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\form.php [ 18 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-10 10:58:23 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\form.php [ 18 ]
2012-05-10 10:58:23 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\form.php [ 18 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}