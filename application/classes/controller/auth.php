<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Auth extends Controller_Default {
 
    public function action_login()
    {
            $post = $_POST;
            $error = NULL;
 
            if(isset($post['submit'])){
 
                $user = ORM::factory('user')
                    ->where('nick', '=', $post['nick'])
                    ->and_where('pass', '=', md5($post['pass']))
                    ->find_all();
 
                if(count($user)){
                    $this->user = $user->current();
                    $_SESSION['user']=$this->user->id;
                    $this->redirect = $this->SES->get('prev_url');
                }else{
                    $error = '<span style="color: red">'.__('Incorrect login or password').'</span><br />';
                }
            }else{
                if(!isset($_SESSION['prev_url'])){
                    if(strpos(Request::initial()->referrer(), Url::base(FALSE,TRUE))===FALSE){
                        $this->SES->set('prev_url', '');
                    }else{
                        $this->SES->set('prev_url', Request::initial()->referrer());
                    }
                }
            }
 
            $this->template->title   = __('Login');
            $this->template->content = 'login';
            $this->template->data=NULL;
            if(isset ($_POST['submit']))
            $this->template->data=$_POST;
            $this->template->error = $error;
    }
 
        public function action_logout()
    {
            $this->template->title   = __('Logout');
            $this->SES->destroy();
            $this->redirect = '';
    }
 
}
?>