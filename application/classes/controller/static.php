<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Static extends Controller_Default {

    public function action_about() {
        $this->template->content='<h2>'.__('About us').'</h2><p>'.__('We are the champions').'</p>';
        $this->template->title=__('About us');
        $this->template->top_tab='about';
    }

    public function action_contact() {
        $this->template->content=View::factory('contact')
            ->bind('msg',$msg)
            ->bind('errors',$errors)
            ->bind('data',$data)
            ->bind('title',$this->template->title);
        $this->template->title=__('Contact');
        $this->template->top_tab='contact';
        if(isset($_POST['submit'])){
            $post=Validation::factory($_POST)
                ->rules('email', array(array('not_empty'),array('email')))
                ->rules('username', array(array('not_empty'),array('alpha_dash'),array('min_length', array(':value', 3)),array('max_length', array(':value', 20))))
                ->rule('content', 'not_empty')
                ->labels(array('email'=>'E-mail','username'=>'Nick','content'=>'Content'));
            if($post->check()){
                //send email
                $msg='<p class="green">'.__('Message was sent').'</p>';
                unset($_POST);
            }else{
                $data=$_POST;
                $errors=$post->errors('contact');
            }
        }
    }
}?>