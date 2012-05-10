<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-05-06 08:41:13 --- ERROR: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\controller\form.php [ 39 ]
2012-05-06 08:41:13 --- STRACE: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\controller\form.php [ 39 ]
--
#0 C:\xampp\htdocs\kohana\application\classes\controller\form.php(39): Kohana_Core::error_handler(2, 'Invalid argumen...', 'C:\xampp\htdocs...', 39, Array)
#1 [internal function]: Controller_Form->action_update()
#2 C:\xampp\htdocs\kohana\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Form))
#3 C:\xampp\htdocs\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 C:\xampp\htdocs\kohana\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(109): Kohana_Request->execute()
#6 {main}
2012-05-06 08:41:22 --- ERROR: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\views\form.php [ 15 ]
2012-05-06 08:41:22 --- STRACE: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\views\form.php [ 15 ]
--
#0 C:\xampp\htdocs\kohana\application\views\form.php(15): Kohana_Core::error_handler(2, 'Invalid argumen...', 'C:\xampp\htdocs...', 15, Array)
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