<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Map extends Controller_Default {
 
      
 
    public function action_index()
    {
            $this->template->content=view::factory('map');
          

	
		
    }
 
}

