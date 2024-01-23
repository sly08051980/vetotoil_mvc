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

        $userData = ['inscription' => $m->get_inscription_valider($_POST)];

        if ($userData) {
            $this->render('ficheUsers', $userData);
        } else {
            $this->render('error');
        }
    }
    public function action_fiche_users()
    {
        $animal = isset($_POST['typeAnimal']) ? $_POST['typeAnimal'] : null;
        $m = Model::get_model();

        $data = ['confirmationMessage' => 'Les données ont été mises à jour avec succès.', 'raceanimaux' => $m->get_find_animal($animal)];

        ob_clean();
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
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

    //#######################################################################################################################
    //fonction inscription professionnel
    //#######################################################################################################################

    public function action_inscription_pro()
    {


        $m = Model::get_model();

        $pro = ['professionnel' => $m->get_inscription_pro($_POST)];

        if ($pro) {
            $message = ['message' => 'Inscription soumise a validation veuillez attendre 48 heures'];
            $this->render('fiche_pro',$message);
        }else{
            $this->render('error');
        }
          
    }

}