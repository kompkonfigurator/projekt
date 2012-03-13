<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Form extends Controller_Default {
     public function action_index() {
		$form = Model::factory('form');
        $this->template->title = __('Formularz');
        $this->template->content='form';
		$this->template->plyta = $form->get_produkt('plyta');
		$this->template->procesor = $form->get_produkt('procesor');
		$this->template->pamiec = $form->get_produkt('pamiec');
		$this->template->karta_graf = $form->get_produkt('karta_graf');
		$this->template->dysk = $form->get_produkt('dysk');
		$this->template->obudowa = $form->get_produkt('obudowa');
		$this->template->zasilacz = $form->get_produkt('zasilacz');
		$this->template->naped = $form->get_produkt('naped');
		$this->template->karta_muz = $form->get_produkt('karta_muz');
		$this->template->mysz = $form->get_produkt('mysz');
		$this->template->klawiatura = $form->get_produkt('klawiatura');
    }
 }
?>