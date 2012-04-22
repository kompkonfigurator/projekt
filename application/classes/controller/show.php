<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Show extends Controller_Default {
     public function action_index() {
		$this->template->title = __('View');
        $this->template->content = View::factory('show');
		$form = Model::factory('form');
		if(!$id = $this->request->param('id'))
		{
			$this->request->redirect('/');
		}
		$this->template->content->konf = $form->get_konf($id);
	}
}
?>