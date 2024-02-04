<?php

class Controller_animal extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }
    public function action_ajouter_animal(){
        $this->render('ficheUsers');
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
    public function action_enregistrer_animal(){

        $m = Model::get_model();

        $userData = ['enregistrer' => $m->get_enregistrer_animal($_POST)];
    }
}