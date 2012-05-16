<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Lang extends Controller {
 
    public function before() {
        parent::before();
        $lang = $this->request->action();
        I18n::lang($lang);
        setcookie("lang", $lang,31536000 + time(),'/');
        $this->request->redirect();
    }
 
    public function action_index(){
 
    }
}
?>