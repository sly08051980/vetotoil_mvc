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
    //#######################################################################################################################
    //fonction inscription
    //#######################################################################################################################
    public function action_acces_inscription()
    {
        $this->render('acces_inscription');
    }

    public function action_acces_inscription_valider()
    {
        
        $m = Model::get_model();

        $userData =['inscription'=> $m->get_inscription_valider($_POST)];
    
        if ($userData) {
            $this->render('ficheUsers', $userData);
        } else {
            $this->render('error');
        }
        }
public function action_fiche_users(){
    $m = Model::get_model();

}
    //#######################################################################################################################
    //fonction connexion
    //#######################################################################################################################

    public function action_acces_connexion()
    {
        $this->render('acces_connexion');
    }
    public function action_acces_inscription_pro()
    {
        $this->render('acces_inscription_pro');
    }
}
