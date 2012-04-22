<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Form extends Controller_Default {
     public function action_index() {
	 error_reporting(E_ALL & ~E_NOTICE);
		$form = Model::factory('form');
        $this->template->title = __('Formularz');
        $this->template->content = View::factory('form');
		$this->template->content->plyta = $form->get_produkt('plyta');
		$this->template->content->procesor = $form->get_produkt('procesor');
		$this->template->content->pamiec = $form->get_produkt('pamiec');
		$this->template->content->karta_graf = $form->get_produkt('karta_graf');
		$this->template->content->dysk = $form->get_produkt('dysk');
		$this->template->content->obudowa = $form->get_produkt('obudowa');
		$this->template->content->zasilacz = $form->get_produkt('zasilacz');
		$this->template->content->naped = $form->get_produkt('naped');
		$this->template->content->karta_muz = $form->get_produkt('karta_muz');
		$this->template->content->mysz = $form->get_produkt('mysz');
		$this->template->content->klawiatura = $form->get_produkt('klawiatura');
    
		if($this->request->post())
		{
			if($form->add_produkt($_POST)) $this->request->redirect('/');
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
		$konf = $form->get_konf($id);
		//echo Debug::vars($konf);
		foreach($konf as $key => $val)
		{
			if(preg_match('/id_.*/', $key) && !empty($val) && $val!='NULL')
			{
				$key = str_replace('id_', '', $key);
				
				$this->template->content->{$key} = $form->get_produkt($key);
				$this->template->content->{$key.'_selected'} = array_keys($form->get_produktById($val));
				$this->template->content->{$key.'_selected'} = $this->template->content->{$key.'_selected'}[0];
			}
			else
			{
				$this->template->content->{$key} = NULL;
				$this->template->content->{$key.'_selected'} = NULL;
			}

		}
		
		if($this->request->post())
		{
			if($form->update_produkt($_POST, $id)) $this->request->redirect('/');
		}
	}
	public function action_delete()
	{
		$form = Model::factory('form');
		if(!$id = $this->request->param('id'))
		{
			$this->request->redirect('/');
		}
		if($form->delete_produkt($id)) $this->request->redirect('/');
	}
	public function action_show()
	{
		$this->template->title = __('View');
        $this->template->content = View::factory('show');
		$form = Model::factory('form');
		if(!$id = $this->request->param('id'))
		{
			$this->request->redirect('/');
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
