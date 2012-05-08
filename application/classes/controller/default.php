<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Default extends Controller_Template {
 
    public $template = 'default';
    public $redirect = NULL;
    protected $SES;
    public $user;
 
    public function  __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
 
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
        }
        parent::after();
    }
 
    public function action_index() {
        $this->template->title = __('Home');
        $this->template->content=view::factory('/main');
        $this->template->top_tab='home';
		$konf = Model::factory('form');
		$allkonf = $konf -> getAllKonf();
		for($i=0; $i<sizeof($allkonf); $i++)
		{
		foreach($allkonf[$i] as $key => $val)
		{
			if(preg_match('/id_.*/', $key))
			{
				//echo Debug::vars($konf -> getName_byProduktId($val));
				$allkonf[$i][$key] = $konf -> getName_byProduktId($val);
				$allkonf[$i][$key] = (sizeof($allkonf[$i][$key])!=0)? $allkonf[$i][$key][0]['name'] : NULL;
			}
		}
		}
		$this->template->content->konf = $allkonf;
		$this->template->content->model = $konf -> return_model();
    }
}
