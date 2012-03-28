<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-03-27 13:40:34 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH/orm/classes/kohana/auth/orm.php [ 76 ]
2012-03-27 13:40:34 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH/orm/classes/kohana/auth/orm.php [ 76 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-03-27 13:48:30 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH/orm/classes/kohana/auth/orm.php [ 76 ]
2012-03-27 13:48:30 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH/orm/classes/kohana/auth/orm.php [ 76 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-03-27 13:50:58 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH/orm/classes/kohana/auth/orm.php [ 76 ]
2012-03-27 13:50:58 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH/orm/classes/kohana/auth/orm.php [ 76 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-03-27 13:58:33 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 13:58:33 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(76): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 13:59:00 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 13:59:00 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(76): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 13:59:37 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 13:59:37 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(76): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 14:00:53 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH/orm/classes/kohana/auth/orm.php [ 76 ]
2012-03-27 14:00:53 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH/orm/classes/kohana/auth/orm.php [ 76 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-03-27 14:03:15 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH/orm/classes/kohana/auth/orm.php [ 76 ]
2012-03-27 14:03:15 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH/orm/classes/kohana/auth/orm.php [ 76 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-03-27 14:03:24 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH/orm/classes/kohana/auth/orm.php [ 76 ]
2012-03-27 14:03:24 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH/orm/classes/kohana/auth/orm.php [ 76 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-03-27 14:05:59 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH/orm/classes/kohana/auth/orm.php [ 76 ]
2012-03-27 14:05:59 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_User::unique_key() ~ MODPATH/orm/classes/kohana/auth/orm.php [ 76 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-03-27 14:15:23 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 14:15:23 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(47): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 14:15:32 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 14:15:32 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(47): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 14:15:36 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 14:15:36 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(47): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Default))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 14:15:40 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 14:15:40 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(47): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Default))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 14:15:58 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL form was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2012-03-27 14:15:58 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL form was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#3 {main}
2012-03-27 14:16:04 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 14:16:04 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(47): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Default))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 14:33:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:33:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:33:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:33:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:36:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.6.2.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:36:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.6.2.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:37:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.6.2.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:37:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.6.2.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:37:23 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.6.2.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:37:23 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.6.2.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:37:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.6.2.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:37:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.6.2.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:37:30 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 14:37:30 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(47): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Default))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 14:37:33 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 14:37:33 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(47): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Default))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 14:37:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:37:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:37:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:37:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:38:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:38:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:38:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:38:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:38:08 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:38:08 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:38:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:38:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:38:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:38:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:38:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:38:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:38:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:38:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:38:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:38:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:38:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:38:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:38:23 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:38:23 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:38:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:38:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:38:25 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:38:25 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:43:35 --- ERROR: ErrorException [ 8 ]: Undefined variable: error ~ APPPATH/views/login.php [ 5 ]
2012-03-27 14:43:35 --- STRACE: ErrorException [ 8 ]: Undefined variable: error ~ APPPATH/views/login.php [ 5 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/login.php(5): Kohana_Core::error_handler(8, 'Undefined varia...', '/opt/lampp/htdo...', 5, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include('/opt/lampp/htdo...')
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(69): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 14:44:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:44:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:44:32 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL login was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2012-03-27 14:44:32 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL login was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#3 {main}
2012-03-27 14:44:43 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL login was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2012-03-27 14:44:43 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL login was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#3 {main}
2012-03-27 14:46:43 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL login was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2012-03-27 14:46:43 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL login was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#3 {main}
2012-03-27 14:46:49 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL login was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2012-03-27 14:46:49 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL login was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#3 {main}
2012-03-27 14:48:09 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 14:48:09 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(69): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 14:48:11 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 14:48:11 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(69): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 14:48:16 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 14:48:16 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(69): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 14:48:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:48:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:48:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:48:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:48:22 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 14:48:22 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(69): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 14:51:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:51:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 14:51:10 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL login was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2012-03-27 14:51:10 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL login was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#3 {main}
2012-03-27 14:51:15 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL login was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2012-03-27 14:51:15 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL login was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#3 {main}
2012-03-27 14:51:22 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL login was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2012-03-27 14:51:22 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL login was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#3 {main}
2012-03-27 14:51:48 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL register was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2012-03-27 14:51:48 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL register was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#3 {main}
2012-03-27 14:51:58 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL login was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2012-03-27 14:51:58 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL login was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#3 {main}
2012-03-27 14:55:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 14:55:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 15:07:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 15:07:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 15:08:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 15:08:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 15:08:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 15:08:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 15:08:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 15:08:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 15:13:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 15:13:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 15:13:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 15:13:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 15:17:07 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL auth/login was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 113 ]
2012-03-27 15:17:07 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL auth/login was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 113 ]
--
#0 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#3 {main}
2012-03-27 15:18:17 --- ERROR: ErrorException [ 8 ]: Undefined property: Controller_Auth::$input ~ APPPATH/classes/controller/auth.php [ 19 ]
2012-03-27 15:18:17 --- STRACE: ErrorException [ 8 ]: Undefined property: Controller_Auth::$input ~ APPPATH/classes/controller/auth.php [ 19 ]
--
#0 /opt/lampp/htdocs/kohana/application/classes/controller/auth.php(19): Kohana_Core::error_handler(8, 'Undefined prope...', '/opt/lampp/htdo...', 19, Array)
#1 [internal function]: Controller_Auth->action_login()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Auth))
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#6 {main}
2012-03-27 15:18:22 --- ERROR: ErrorException [ 8 ]: Undefined property: Controller_Auth::$input ~ APPPATH/classes/controller/auth.php [ 19 ]
2012-03-27 15:18:22 --- STRACE: ErrorException [ 8 ]: Undefined property: Controller_Auth::$input ~ APPPATH/classes/controller/auth.php [ 19 ]
--
#0 /opt/lampp/htdocs/kohana/application/classes/controller/auth.php(19): Kohana_Core::error_handler(8, 'Undefined prope...', '/opt/lampp/htdo...', 19, Array)
#1 [internal function]: Controller_Auth->action_login()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Auth))
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#6 {main}
2012-03-27 15:19:03 --- ERROR: ErrorException [ 8 ]: Undefined property: Controller_Auth::$input ~ APPPATH/classes/controller/auth.php [ 19 ]
2012-03-27 15:19:03 --- STRACE: ErrorException [ 8 ]: Undefined property: Controller_Auth::$input ~ APPPATH/classes/controller/auth.php [ 19 ]
--
#0 /opt/lampp/htdocs/kohana/application/classes/controller/auth.php(19): Kohana_Core::error_handler(8, 'Undefined prope...', '/opt/lampp/htdo...', 19, Array)
#1 [internal function]: Controller_Auth->action_login()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Auth))
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#6 {main}
2012-03-27 15:19:05 --- ERROR: ErrorException [ 8 ]: Undefined property: Controller_Auth::$input ~ APPPATH/classes/controller/auth.php [ 19 ]
2012-03-27 15:19:05 --- STRACE: ErrorException [ 8 ]: Undefined property: Controller_Auth::$input ~ APPPATH/classes/controller/auth.php [ 19 ]
--
#0 /opt/lampp/htdocs/kohana/application/classes/controller/auth.php(19): Kohana_Core::error_handler(8, 'Undefined prope...', '/opt/lampp/htdo...', 19, Array)
#1 [internal function]: Controller_Auth->action_login()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Auth))
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#6 {main}
2012-03-27 15:19:08 --- ERROR: ErrorException [ 8 ]: Undefined property: Controller_Auth::$input ~ APPPATH/classes/controller/auth.php [ 19 ]
2012-03-27 15:19:08 --- STRACE: ErrorException [ 8 ]: Undefined property: Controller_Auth::$input ~ APPPATH/classes/controller/auth.php [ 19 ]
--
#0 /opt/lampp/htdocs/kohana/application/classes/controller/auth.php(19): Kohana_Core::error_handler(8, 'Undefined prope...', '/opt/lampp/htdo...', 19, Array)
#1 [internal function]: Controller_Auth->action_login()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Auth))
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#6 {main}
2012-03-27 15:19:10 --- ERROR: ErrorException [ 8 ]: Undefined property: Controller_Auth::$input ~ APPPATH/classes/controller/auth.php [ 19 ]
2012-03-27 15:19:10 --- STRACE: ErrorException [ 8 ]: Undefined property: Controller_Auth::$input ~ APPPATH/classes/controller/auth.php [ 19 ]
--
#0 /opt/lampp/htdocs/kohana/application/classes/controller/auth.php(19): Kohana_Core::error_handler(8, 'Undefined prope...', '/opt/lampp/htdo...', 19, Array)
#1 [internal function]: Controller_Auth->action_login()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Auth))
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#6 {main}
2012-03-27 15:19:17 --- ERROR: ErrorException [ 8 ]: Undefined property: Controller_Auth::$input ~ APPPATH/classes/controller/auth.php [ 19 ]
2012-03-27 15:19:17 --- STRACE: ErrorException [ 8 ]: Undefined property: Controller_Auth::$input ~ APPPATH/classes/controller/auth.php [ 19 ]
--
#0 /opt/lampp/htdocs/kohana/application/classes/controller/auth.php(19): Kohana_Core::error_handler(8, 'Undefined prope...', '/opt/lampp/htdo...', 19, Array)
#1 [internal function]: Controller_Auth->action_login()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Auth))
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#6 {main}
2012-03-27 15:19:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 15:19:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 15:19:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 15:19:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 15:19:27 --- ERROR: ErrorException [ 8 ]: Undefined property: Controller_Auth::$input ~ APPPATH/classes/controller/auth.php [ 19 ]
2012-03-27 15:19:27 --- STRACE: ErrorException [ 8 ]: Undefined property: Controller_Auth::$input ~ APPPATH/classes/controller/auth.php [ 19 ]
--
#0 /opt/lampp/htdocs/kohana/application/classes/controller/auth.php(19): Kohana_Core::error_handler(8, 'Undefined prope...', '/opt/lampp/htdo...', 19, Array)
#1 [internal function]: Controller_Auth->action_login()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Auth))
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#6 {main}
2012-03-27 15:27:38 --- ERROR: View_Exception [ 0 ]: The requested view 1 could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
2012-03-27 15:27:38 --- STRACE: View_Exception [ 0 ]: The requested view 1 could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
--
#0 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(334): Kohana_View->set_filename(true)
#1 /opt/lampp/htdocs/kohana/application/classes/controller/auth.php(21): Kohana_View->render(true)
#2 [internal function]: Controller_Auth->action_login()
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Auth))
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#7 {main}
2012-03-27 15:27:43 --- ERROR: View_Exception [ 0 ]: The requested view 1 could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
2012-03-27 15:27:43 --- STRACE: View_Exception [ 0 ]: The requested view 1 could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
--
#0 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(334): Kohana_View->set_filename(true)
#1 /opt/lampp/htdocs/kohana/application/classes/controller/auth.php(21): Kohana_View->render(true)
#2 [internal function]: Controller_Auth->action_login()
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Auth))
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#7 {main}
2012-03-27 15:27:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 15:27:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 15:28:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 15:28:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 15:28:36 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 15:28:36 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(69): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 15:28:43 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 15:28:43 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(69): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 15:28:44 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 15:28:44 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(69): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 15:30:12 --- ERROR: ErrorException [ 8 ]: Undefined variable: username ~ APPPATH/views/login.php [ 11 ]
2012-03-27 15:30:12 --- STRACE: ErrorException [ 8 ]: Undefined variable: username ~ APPPATH/views/login.php [ 11 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/login.php(11): Kohana_Core::error_handler(8, 'Undefined varia...', '/opt/lampp/htdo...', 11, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include('/opt/lampp/htdo...')
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(69): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 15:30:13 --- ERROR: ErrorException [ 8 ]: Undefined variable: username ~ APPPATH/views/login.php [ 11 ]
2012-03-27 15:30:13 --- STRACE: ErrorException [ 8 ]: Undefined variable: username ~ APPPATH/views/login.php [ 11 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/login.php(11): Kohana_Core::error_handler(8, 'Undefined varia...', '/opt/lampp/htdo...', 11, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include('/opt/lampp/htdo...')
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(69): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 15:32:48 --- ERROR: ErrorException [ 8 ]: Undefined variable: error ~ APPPATH/views/login.php [ 6 ]
2012-03-27 15:32:48 --- STRACE: ErrorException [ 8 ]: Undefined variable: error ~ APPPATH/views/login.php [ 6 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/login.php(6): Kohana_Core::error_handler(8, 'Undefined varia...', '/opt/lampp/htdo...', 6, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include('/opt/lampp/htdo...')
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(69): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 15:32:53 --- ERROR: ErrorException [ 8 ]: Undefined variable: error ~ APPPATH/views/login.php [ 6 ]
2012-03-27 15:32:53 --- STRACE: ErrorException [ 8 ]: Undefined variable: error ~ APPPATH/views/login.php [ 6 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/login.php(6): Kohana_Core::error_handler(8, 'Undefined varia...', '/opt/lampp/htdo...', 6, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include('/opt/lampp/htdo...')
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(69): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 15:33:09 --- ERROR: ErrorException [ 8 ]: Undefined variable: data ~ APPPATH/views/login.php [ 8 ]
2012-03-27 15:33:09 --- STRACE: ErrorException [ 8 ]: Undefined variable: data ~ APPPATH/views/login.php [ 8 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/login.php(8): Kohana_Core::error_handler(8, 'Undefined varia...', '/opt/lampp/htdo...', 8, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include('/opt/lampp/htdo...')
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(69): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 15:33:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 15:33:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 15:33:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 15:33:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 15:45:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 15:45:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 15:45:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 15:45:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 15:48:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 15:48:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 15:48:04 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 15:48:04 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(69): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 15:48:26 --- ERROR: View_Exception [ 0 ]: The requested view auth/login could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
2012-03-27 15:48:26 --- STRACE: View_Exception [ 0 ]: The requested view auth/login could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
--
#0 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(137): Kohana_View->set_filename('auth/login')
#1 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(30): Kohana_View->__construct('auth/login', NULL)
#2 /opt/lampp/htdocs/kohana/application/classes/controller/auth.php(7): Kohana_View::factory('auth/login')
#3 [internal function]: Controller_Auth->action_login()
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Auth))
#5 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#8 {main}
2012-03-27 15:48:28 --- ERROR: View_Exception [ 0 ]: The requested view auth/login could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
2012-03-27 15:48:28 --- STRACE: View_Exception [ 0 ]: The requested view auth/login could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
--
#0 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(137): Kohana_View->set_filename('auth/login')
#1 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(30): Kohana_View->__construct('auth/login', NULL)
#2 /opt/lampp/htdocs/kohana/application/classes/controller/auth.php(7): Kohana_View::factory('auth/login')
#3 [internal function]: Controller_Auth->action_login()
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Auth))
#5 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#8 {main}
2012-03-27 15:48:29 --- ERROR: View_Exception [ 0 ]: The requested view auth/login could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
2012-03-27 15:48:29 --- STRACE: View_Exception [ 0 ]: The requested view auth/login could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
--
#0 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(137): Kohana_View->set_filename('auth/login')
#1 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(30): Kohana_View->__construct('auth/login', NULL)
#2 /opt/lampp/htdocs/kohana/application/classes/controller/auth.php(7): Kohana_View::factory('auth/login')
#3 [internal function]: Controller_Auth->action_login()
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Auth))
#5 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#8 {main}
2012-03-27 15:48:30 --- ERROR: View_Exception [ 0 ]: The requested view auth/login could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
2012-03-27 15:48:30 --- STRACE: View_Exception [ 0 ]: The requested view auth/login could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
--
#0 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(137): Kohana_View->set_filename('auth/login')
#1 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(30): Kohana_View->__construct('auth/login', NULL)
#2 /opt/lampp/htdocs/kohana/application/classes/controller/auth.php(7): Kohana_View::factory('auth/login')
#3 [internal function]: Controller_Auth->action_login()
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Auth))
#5 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#8 {main}
2012-03-27 15:48:30 --- ERROR: View_Exception [ 0 ]: The requested view auth/login could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
2012-03-27 15:48:30 --- STRACE: View_Exception [ 0 ]: The requested view auth/login could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
--
#0 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(137): Kohana_View->set_filename('auth/login')
#1 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(30): Kohana_View->__construct('auth/login', NULL)
#2 /opt/lampp/htdocs/kohana/application/classes/controller/auth.php(7): Kohana_View::factory('auth/login')
#3 [internal function]: Controller_Auth->action_login()
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Auth))
#5 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#8 {main}
2012-03-27 15:48:50 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 15:48:50 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(69): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 15:48:50 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 15:48:50 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(69): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 15:48:54 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL login was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2012-03-27 15:48:54 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL login was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#3 {main}
2012-03-27 15:49:00 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 15:49:00 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(69): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 15:52:40 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 15:52:40 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(69): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 15:52:41 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 15:52:41 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(69): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 16:10:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 16:10:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 16:10:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 16:10:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 16:10:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 16:10:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 16:20:23 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 16:20:23 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(69): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 16:41:22 --- ERROR: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
2012-03-27 16:41:22 --- STRACE: ErrorException [ 2 ]: include() [function.include]: Filename cannot be empty ~ APPPATH/views/default.php [ 65 ]
--
#0 /opt/lampp/htdocs/kohana/application/views/default.php(65): Kohana_Core::error_handler(2, 'include() [<a h...', '/opt/lampp/htdo...', 65, Array)
#1 /opt/lampp/htdocs/kohana/application/views/default.php(65): include()
#2 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(61): include('/opt/lampp/htdo...')
#3 /opt/lampp/htdocs/kohana/system/classes/kohana/view.php(343): Kohana_View::capture('/opt/lampp/htdo...', Array)
#4 /opt/lampp/htdocs/kohana/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#5 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(69): Kohana_Controller_Template->after()
#6 [internal function]: Controller_Default->after()
#7 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-27 17:55:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 17:55:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 17:55:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 17:55:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 17:55:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 17:55:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 18:13:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 18:13:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 18:45:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 18:45:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 22:37:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 22:37:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 22:47:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 22:47:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 22:47:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 22:47:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 22:47:54 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 22:47:54 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 22:48:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 22:48:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 22:55:03 --- ERROR: Database_Exception [ 2 ]: mysql_connect() [function.mysql-connect]: Access denied for user 'user'@'localhost' (using password: YES) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2012-03-27 22:55:03 --- STRACE: Database_Exception [ 2 ]: mysql_connect() [function.mysql-connect]: Access denied for user 'user'@'localhost' (using password: YES) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
--
#0 /opt/lampp/htdocs/kohana/modules/database/classes/kohana/database/mysql.php(171): Kohana_Database_MySQL->connect()
#1 /opt/lampp/htdocs/kohana/modules/database/classes/kohana/database/mysql.php(360): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#2 /opt/lampp/htdocs/kohana/modules/orm/classes/kohana/orm.php(1504): Kohana_Database_MySQL->list_columns('users')
#3 /opt/lampp/htdocs/kohana/modules/orm/classes/kohana/orm.php(392): Kohana_ORM->list_columns(true)
#4 /opt/lampp/htdocs/kohana/modules/orm/classes/kohana/orm.php(337): Kohana_ORM->reload_columns()
#5 /opt/lampp/htdocs/kohana/modules/orm/classes/kohana/orm.php(246): Kohana_ORM->_initialize()
#6 /opt/lampp/htdocs/kohana/modules/orm/classes/kohana/orm.php(37): Kohana_ORM->__construct(NULL)
#7 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(20): Kohana_ORM::factory('user')
#8 [internal function]: Controller_Default->__construct(Object(Request), Object(Response))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(101): ReflectionClass->newInstance(Object(Request), Object(Response))
#10 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#11 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#12 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#13 {main}
2012-03-27 22:55:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 22:55:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 22:55:30 --- ERROR: Database_Exception [ 2 ]: mysql_connect() [function.mysql-connect]: Access denied for user 'user'@'localhost' (using password: YES) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2012-03-27 22:55:30 --- STRACE: Database_Exception [ 2 ]: mysql_connect() [function.mysql-connect]: Access denied for user 'user'@'localhost' (using password: YES) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
--
#0 /opt/lampp/htdocs/kohana/modules/database/classes/kohana/database/mysql.php(171): Kohana_Database_MySQL->connect()
#1 /opt/lampp/htdocs/kohana/modules/database/classes/kohana/database/mysql.php(360): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#2 /opt/lampp/htdocs/kohana/modules/orm/classes/kohana/orm.php(1504): Kohana_Database_MySQL->list_columns('users')
#3 /opt/lampp/htdocs/kohana/modules/orm/classes/kohana/orm.php(392): Kohana_ORM->list_columns(true)
#4 /opt/lampp/htdocs/kohana/modules/orm/classes/kohana/orm.php(337): Kohana_ORM->reload_columns()
#5 /opt/lampp/htdocs/kohana/modules/orm/classes/kohana/orm.php(246): Kohana_ORM->_initialize()
#6 /opt/lampp/htdocs/kohana/modules/orm/classes/kohana/orm.php(37): Kohana_ORM->__construct(NULL)
#7 /opt/lampp/htdocs/kohana/application/classes/controller/default.php(20): Kohana_ORM::factory('user')
#8 [internal function]: Controller_Default->__construct(Object(Request), Object(Response))
#9 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client/internal.php(101): ReflectionClass->newInstance(Object(Request), Object(Response))
#10 /opt/lampp/htdocs/kohana/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#11 /opt/lampp/htdocs/kohana/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#12 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#13 {main}
2012-03-27 23:00:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 23:00:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 23:00:31 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 23:00:31 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 23:03:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 23:03:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 23:04:23 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 23:04:23 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 23:04:25 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 23:04:25 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 23:04:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 23:04:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 23:04:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 23:04:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-27 23:05:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-03-27 23:05:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: media/js/jquery-1.5.1.min.js ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /opt/lampp/htdocs/kohana/index.php(109): Kohana_Request->execute()
#1 {main}