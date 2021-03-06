<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Auth extends Controller_Default {
 
        public function action_login() {
            $this->template->content='login';
            $this->template->title=__('Login');
            if(isset($_POST['submit'])){
            $r = Auth::instance()->login($_POST['username'], $_POST['password']);
            }
 
            if (Auth::instance()->logged_in()) {
               echo 'zalogowany';
                echo Auth::instance()->get_user();
               if (Auth::instance()->logged_in('admin')) {
                echo 'to jest admin';
               }
            }
             else {
                echo "User is not logged in";
            }
        }
        public function action_logout() {
            Auth::instance()->logout();
            $this->request->redirect('/');
        }
        public function action_register() {
            $client = ORM::factory('user');
            $client->email = "admin@email.com";
            $client->username = "admin";
            $client->password = "admin";
            $client->save();
 
            $role = ORM::factory('role','1');
            $client->add('roles',$role);
            $client->save();
        }
}
?>
