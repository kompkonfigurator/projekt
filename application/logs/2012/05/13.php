<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-05-13 10:00:42 --- ERROR: Database_Exception [ 1054 ]: Unknown column 's.shop_id' in 'on clause' [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = 1) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2012-05-13 10:00:42 --- STRACE: Database_Exception [ 1054 ]: Unknown column 's.shop_id' in 'on clause' [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = 1) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM p...', false, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(41): Kohana_Database_Query->execute()
#2 C:\xampp\htdocs\kohana\application\classes\controller\form.php(15): Model_Form->get_shops(1)
#3 [internal function]: Controller_Form->action_index()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}
2012-05-13 10:02:20 --- ERROR: Database_Exception [ 1146 ]: Table 'kohana.konfiguracja' doesn't exist [ SELECT * FROM `konfiguracja` ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2012-05-13 10:02:20 --- STRACE: Database_Exception [ 1146 ]: Table 'kohana.konfiguracja' doesn't exist [ SELECT * FROM `konfiguracja` ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM `...', false, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(69): Kohana_Database_Query->execute()
#2 C:\xampp\htdocs\kohana\application\classes\controller\default.php(77): Model_Form->getAllKonf()
#3 [internal function]: Controller_Default->action_index()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Default))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}
2012-05-13 10:02:24 --- ERROR: Database_Exception [ 1146 ]: Table 'kohana.konfiguracja' doesn't exist [ SELECT * FROM `konfiguracja` ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2012-05-13 10:02:24 --- STRACE: Database_Exception [ 1146 ]: Table 'kohana.konfiguracja' doesn't exist [ SELECT * FROM `konfiguracja` ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM `...', false, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(69): Kohana_Database_Query->execute()
#2 C:\xampp\htdocs\kohana\application\classes\controller\default.php(77): Model_Form->getAllKonf()
#3 [internal function]: Controller_Default->action_index()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Default))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}
2012-05-13 10:03:43 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH\orm\classes\kohana\auth\orm.php [ 76 ]
2012-05-13 10:03:43 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH\orm\classes\kohana\auth\orm.php [ 76 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-13 10:04:16 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH\orm\classes\kohana\auth\orm.php [ 76 ]
2012-05-13 10:04:16 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH\orm\classes\kohana\auth\orm.php [ 76 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-13 10:04:21 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH\orm\classes\kohana\auth\orm.php [ 76 ]
2012-05-13 10:04:21 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH\orm\classes\kohana\auth\orm.php [ 76 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-13 10:05:28 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH\orm\classes\kohana\auth\orm.php [ 76 ]
2012-05-13 10:05:28 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH\orm\classes\kohana\auth\orm.php [ 76 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-13 10:05:38 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_User::create_user() ~ APPPATH\classes\controller\user.php [ 31 ]
2012-05-13 10:05:38 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_User::create_user() ~ APPPATH\classes\controller\user.php [ 31 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-13 10:07:37 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_User::create_user() ~ APPPATH\classes\controller\user.php [ 31 ]
2012-05-13 10:07:37 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_User::create_user() ~ APPPATH\classes\controller\user.php [ 31 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-13 10:07:40 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_User::create_user() ~ APPPATH\classes\controller\user.php [ 31 ]
2012-05-13 10:07:40 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_User::create_user() ~ APPPATH\classes\controller\user.php [ 31 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-13 10:10:56 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH\orm\classes\kohana\auth\orm.php [ 76 ]
2012-05-13 10:10:56 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH\orm\classes\kohana\auth\orm.php [ 76 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-13 10:21:48 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH\orm\classes\kohana\auth\orm.php [ 76 ]
2012-05-13 10:21:48 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH\orm\classes\kohana\auth\orm.php [ 76 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-13 10:21:57 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH\orm\classes\kohana\auth\orm.php [ 76 ]
2012-05-13 10:21:57 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH\orm\classes\kohana\auth\orm.php [ 76 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-13 10:43:40 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL lists was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-05-13 10:43:40 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL lists was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#3 {main}
2012-05-13 10:55:25 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL auth/facebook was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
2012-05-13 10:55:25 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL auth/facebook was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#3 {main}
2012-05-13 10:58:05 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected T_STRING ~ APPPATH\views\default.php [ 76 ]
2012-05-13 10:58:05 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected T_STRING ~ APPPATH\views\default.php [ 76 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-13 10:58:06 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected T_STRING ~ APPPATH\views\default.php [ 76 ]
2012-05-13 10:58:06 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected T_STRING ~ APPPATH\views\default.php [ 76 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-05-13 10:58:35 --- ERROR: Database_Exception [ 1054 ]: Unknown column 's.shop_id' in 'on clause' [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = 1) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2012-05-13 10:58:35 --- STRACE: Database_Exception [ 1054 ]: Unknown column 's.shop_id' in 'on clause' [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = 1) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM p...', false, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(41): Kohana_Database_Query->execute()
#2 C:\xampp\htdocs\kohana\application\classes\controller\form.php(15): Model_Form->get_shops(1)
#3 [internal function]: Controller_Form->action_index()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}
2012-05-13 10:58:38 --- ERROR: Database_Exception [ 1054 ]: Unknown column 's.shop_id' in 'on clause' [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = 1) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2012-05-13 10:58:38 --- STRACE: Database_Exception [ 1054 ]: Unknown column 's.shop_id' in 'on clause' [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = 1) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM p...', false, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(41): Kohana_Database_Query->execute()
#2 C:\xampp\htdocs\kohana\application\classes\controller\form.php(15): Model_Form->get_shops(1)
#3 [internal function]: Controller_Form->action_index()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}
2012-05-13 10:59:27 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL user/newsletter was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
2012-05-13 10:59:27 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL user/newsletter was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#3 {main}
2012-05-13 10:59:46 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL user/newsletter was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
2012-05-13 10:59:46 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL user/newsletter was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#3 {main}
2012-05-13 11:02:36 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL kohana/lists was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-05-13 11:02:36 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL kohana/lists was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#3 {main}
2012-05-13 11:02:48 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL kohana/lists was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-05-13 11:02:48 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL kohana/lists was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#3 {main}
2012-05-13 11:06:32 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: lists/styles/phplist.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-05-13 11:06:32 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: lists/styles/phplist.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#1 {main}
2012-05-13 11:38:04 --- ERROR: Database_Exception [ 1054 ]: Unknown column 's.shop_id' in 'on clause' [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = 1) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2012-05-13 11:38:04 --- STRACE: Database_Exception [ 1054 ]: Unknown column 's.shop_id' in 'on clause' [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = 1) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM p...', false, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(41): Kohana_Database_Query->execute()
#2 C:\xampp\htdocs\kohana\application\classes\controller\form.php(15): Model_Form->get_shops(1)
#3 [internal function]: Controller_Form->action_index()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}
2012-05-13 11:54:24 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL lists/kohana was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-05-13 11:54:24 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL lists/kohana was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#3 {main}
2012-05-13 11:57:13 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL lists/img src= was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-05-13 11:57:13 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL lists/img src= was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#3 {main}
2012-05-13 11:57:38 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL lists/img src= was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-05-13 11:57:38 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL lists/img src= was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#3 {main}
2012-05-13 11:57:39 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL lists/img src= was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-05-13 11:57:39 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL lists/img src= was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#3 {main}
2012-05-13 11:58:40 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL lists/img src= was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-05-13 11:58:40 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL lists/img src= was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#3 {main}
2012-05-13 11:58:41 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL lists/img src= was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-05-13 11:58:41 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL lists/img src= was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#3 {main}
2012-05-13 11:58:46 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL lists/img src= was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-05-13 11:58:47 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL lists/img src= was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#3 {main}
2012-05-13 12:03:55 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL kohana was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-05-13 12:03:55 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL kohana was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#3 {main}
2012-05-13 12:04:12 --- ERROR: Database_Exception [ 1054 ]: Unknown column 's.shop_id' in 'on clause' [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = 1) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2012-05-13 12:04:12 --- STRACE: Database_Exception [ 1054 ]: Unknown column 's.shop_id' in 'on clause' [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = 1) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM p...', false, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(41): Kohana_Database_Query->execute()
#2 C:\xampp\htdocs\kohana\application\classes\controller\form.php(15): Model_Form->get_shops(1)
#3 [internal function]: Controller_Form->action_index()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}
2012-05-13 12:04:18 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL user/lists was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
2012-05-13 12:04:18 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL user/lists was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#3 {main}
2012-05-13 12:08:10 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL kohana was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-05-13 12:08:10 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL kohana was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#3 {main}
2012-05-13 12:09:49 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL kohana was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-05-13 12:09:49 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL kohana was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#3 {main}
2012-05-13 12:09:54 --- ERROR: Database_Exception [ 1054 ]: Unknown column 's.shop_id' in 'on clause' [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = 1) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2012-05-13 12:09:54 --- STRACE: Database_Exception [ 1054 ]: Unknown column 's.shop_id' in 'on clause' [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = 1) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM p...', false, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(41): Kohana_Database_Query->execute()
#2 C:\xampp\htdocs\kohana\application\classes\controller\form.php(15): Model_Form->get_shops(1)
#3 [internal function]: Controller_Form->action_index()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}
2012-05-13 12:10:32 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL kohana was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-05-13 12:10:32 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL kohana was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#3 {main}
2012-05-13 12:11:44 --- ERROR: Database_Exception [ 1054 ]: Unknown column 's.shop_id' in 'on clause' [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = 1) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2012-05-13 12:11:44 --- STRACE: Database_Exception [ 1054 ]: Unknown column 's.shop_id' in 'on clause' [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = 1) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM p...', false, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(41): Kohana_Database_Query->execute()
#2 C:\xampp\htdocs\kohana\application\classes\controller\form.php(15): Model_Form->get_shops(1)
#3 [internal function]: Controller_Form->action_index()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}
2012-05-13 12:45:56 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL user/lists was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
2012-05-13 12:45:56 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL user/lists was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#3 {main}
2012-05-13 12:47:30 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL lists/lists was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-05-13 12:47:30 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL lists/lists was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#3 {main}
2012-05-13 13:37:17 --- ERROR: Database_Exception [ 1054 ]: Unknown column 's.shop_id' in 'on clause' [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = 1) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2012-05-13 13:37:17 --- STRACE: Database_Exception [ 1054 ]: Unknown column 's.shop_id' in 'on clause' [ SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = 1) ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 C:\xampp\htdocs\kohana\modules\database\classes\kohana\database\query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM p...', false, Array)
#1 C:\xampp\htdocs\kohana\application\classes\model\form.php(41): Kohana_Database_Query->execute()
#2 C:\xampp\htdocs\kohana\application\classes\controller\form.php(15): Model_Form->get_shops(1)
#3 [internal function]: Controller_Form->action_index()
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#5 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#8 {main}