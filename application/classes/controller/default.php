<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Default extends Controller_Template {
 
    public $template = 'default';
 
    public function  __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
    }
 
    public function before() {
      parent::before();
 
        if ($this->auto_render)
        {
            // Initialize empty values
            $this->template->title = '';
            $this->template->description = '';
            $this->template->content = '';
 
            $this->template->styles = array();
            $this->template->scripts = array();
            $this->template->top_tab = '';
        }
    }
 
    public function after() {
        if ($this->auto_render)
        {
                $styles = array(
                        'media/css/templatemo_style.css' => 'screen',
                );
 
                $scripts = array(
						'http://code.jquery.com/jquery-1.7.1.min.js',
						'media/js/block.js',
						'media/js/calculate.js',
						'media/js/form.js',
						
                );
 
                $this->template->styles = array_merge( $this->template->styles, $styles );
                $this->template->scripts = array_merge( $this->template->scripts, $scripts );
        }
        parent::after();
    }
 
    public function action_index() {
        $this->template->title = __('Home');
        $this->template->content='home';
    }
}
