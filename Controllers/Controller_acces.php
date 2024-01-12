<?php

class Controller_acces extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }

    public function action_acces_inscription()
    {
        $this->render('acces_inscription');
    }
    public function action_acces_connexion()
    {
        $this->render('acces_connexion');
    }
    public function action_acces_inscription_pro()
    {
        $this->render('acces_inscription_pro');
    }
  



    
}