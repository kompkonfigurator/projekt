<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Form extends Controller_Default {
     public function action_index() {
        $this->template->title = __('Formularz');
        $this->template->content='form';
    }
 }
?>