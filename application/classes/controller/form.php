<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Form extends Controller_Default {
     public function action_index() {
	 error_reporting(E_ALL & ~E_NOTICE);
		$form = Model::factory('form');
        $this->template->title = __('Formularz');
        $this->template->content = View::factory('form');
		$model = $form->return_modelnoid();
		foreach($model as $key => $val)
		{
			$this->template->content->{$key} = $form->get_produkt($key);
			$keyy = $form->get_produkt($key);
			reset($keyy);
			$this->template->content->{$key.'_shop'} = $form->get_shops(key($keyy));
			$this->template->content->{$key.'_cena'} = $form->get_cena(key($keyy));
		}
		$this->template->scripts = array('media/js/calculate.js', 'media/js/skrypt.js');
		$this->template->content->model = $form->return_modelnoid();
		if($this->request->post())
		{
			if($form->add_produkt($_POST)) $this->request->redirect('/home');
		}
	}
	public function action_update() {
	error_reporting(E_ALL & ~E_NOTICE);
		if(!$id = $this->request->param('id'))
		{
			$this->request->redirect('/');
		}
		$form = Model::factory('form');
        $this->template->title = __('Formularz');
        $this->template->content = View::factory('form');
		$this->template->scripts = array('media/js/calculate.js', 'media/js/skrypt.js');
		$konf = $form->get_konf($id);
		$this->template->content->model = $form->return_modelnoid();
		//echo Debug::vars($konf);
		foreach($konf as $key => $val)
		{
			if(preg_match('/id_[a-zA-Z0-9]*/', $key) && !empty($val) && $val!='NULL')
			{
				$key2 = $key;
				$key = str_replace('id_', '', $key);
				$this->template->content->{$key} = $form->get_produkt($key);
				$this->template->content->{$key.'_selected'} = array_keys($form->get_produktById($val));
				$this->template->content->{$key.'_selected'} = $this->template->content->{$key.'_selected'}[0];
				$this->template->content->{$key.'_shop'} = $form->get_shops($this->template->content->{$key.'_selected'});
				$this->template->content->{$key.'_shop_selected'} = $konf[$key2.'_sklep'];
				$this->template->content->{$key.'_cena'} = $form->get_cena_shop($this->template->content->{$key.'_selected'}, $konf[$key2.'_sklep']);
			}
			else
			{
				$this->template->content->{$key} = NULL;
				$this->template->content->{$key.'_selected'} = NULL;
			}

		}
		
		if($this->request->post())
		{
			if($form->update_produkt($_POST, $id)) $this->request->redirect('/home');
		}
	}
	public function action_delete()
	{
		$form = Model::factory('form');
		if(!$id = $this->request->param('id'))
		{
			$this->request->redirect('/home');
		}
		if($form->delete_produkt($id)) $this->request->redirect('/home');
	}
	public function action_show()
	{
		$this->template->title = __('View');
        $this->template->content = View::factory('show');
		$form = Model::factory('form');
		if(!$id = $this->request->param('id'))
		{
			$this->request->redirect('/home');
		}
		$konf = $form->get_konf($id);
		foreach($konf as $key => $val)
		{
			if(preg_match('/id_.*/', $key))
			{
				$konf[$key] = $form -> getName_byProduktId($val);
				$konf[$key] = (sizeof($konf[$key])!=0)? $konf[$key][0]['name'] : NULL;
			}
			else unset($konf[$key]);
		}
		$this->template->content->konf = $konf;
		$this->template->content->model = $form -> return_model();
	}
 }
?>
