<?php

class Controller_home extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }
    public function action_politique_confidentialite()
    {
        $this->render('politique_confidentialite');
    }
    public function action_rgpd()
    {
        $this->render('rgpd');
    }
    public function action_contact()
    {
        $this->render('contact');
    }
}