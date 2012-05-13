<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Home extends Controller_Default {
 
      
 
    public function action_index()
    {
            $this->template->content=view::factory('home');
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
