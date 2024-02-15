<?php

class Controller_rdv extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }
    public function action_recherche_rdv(){
        $this->render('recherche_rdv');
    }
}

?>