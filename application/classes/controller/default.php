<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Default extends Controller_Template {
 
    public $template = 'default';
    public $redirect = NULL;
    protected $SES;
    public $user;
 
    public function  __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
 if(isset($_COOKIE['lang'])){
            setcookie("lang", $_COOKIE['lang'],31536000 + time(),'/');
            I18n::lang($_COOKIE['lang']);
        }
        //Create sesion
        if(!isset ($_SESSION)){
            $this->SES = Session::instance();
        }
 
        //Save user id to session
        if(!$this->SES->get('user')){
            $usr = ORM::factory('user');
            $this->SES->set('user', $usr->id);
        }
 
        //Create user
        $this->user = ORM::factory('user', $_SESSION['user']);
    }
 
    public function before() {
      parent::before();
 
        if ($this->auto_render)
        {
            $this->template->title = '';
            $this->template->description = '';
            $this->template->content = '';
 
            $this->template->styles = array();
            $this->template->scripts = array();
            $this->template->top_tab = '';
 
        if($_SESSION['user']){
            $this->template->user = $this->user;
        }
 
        if($this->request->action() !== 'login'){
            $this->SES->delete('prev_url');
        }
        }
    }
 
    public function after() {
        if($this->redirect !== NULL)
        {
            Request::initial()->redirect($this->redirect);
        }
        if ($this->auto_render)
        {
                $styles = array(
                        'media/css/templatemo_style.css' => 'screen',
                );
 
                $scripts = array(
                        'media/js/jquery.js',
                );
 
                $this->template->styles = array_merge( $this->template->styles, $styles );
                $this->template->scripts = array_merge( $scripts , $this->template->scripts);
				$this->template->langs=Kohana::$config->load('lang');
        }
        parent::after();
    }
 
    public function action_index() {
        $this->template->title = __('Home');
        $this->template->content=view::factory('/main');
        $this->template->top_tab='home';
		
    }
}
