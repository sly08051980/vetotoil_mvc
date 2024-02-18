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
        $profession = isset($_GET['profession']) ? $_GET['profession'] : '';
        $m = Model::get_model();
        $datas = $m->get_recherche_rdv($profession);

        $this->render('recherche_rdv', [
            'employerDispos' => $datas
        ]);
    }

    public function action_detail_rdv(){
        $profession = isset($_POST['profession']) ? $_POST['profession'] : '';
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $codePostal = isset($_POST['codePostal']) ? $_POST['codePostal'] : '';
        $m=Model::get_model();
        $datas = $m->get_recherche_rdv($profession);
       
        $this->render('detail_rdv', [
            'employerDispos' => $datas,'nom'=>$nom,'codePostal'=>$codePostal
        ]);
    }
}
