<?php

class Controller_pro extends Controller
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
    //fonction inscription professionnel
    //#######################################################################################################################
    public function action_acces_inscription_pro()
    {
        $this->render('acces_inscription_pro');
    }

public function action_connexion_pro(){
    $this->render('acces_connexion_pro');
}



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

    public function action_connexion_professionnel(){
        $siret = $_POST['siret'];
        $mdp=$_POST['password'];

        $m = Model::get_model();
        $pro = ['connexionProfessionnel' => $m->get_recherche_pro($siret,$mdp)];

      
      
        if($pro['connexionProfessionnel']){
            
            $dataPro = ['connexionProfessionnel' => $m->get_recherche_pro_valide($siret,$mdp)];
            if (empty($dataPro['connexionProfessionnel'])) {
                $dataProAdmin = ['connexionProfessionnel' => "en attente de validation"];
                $this->render('validation_pro',$dataProAdmin);
            } else {
                // var_dump($dataPro['connexionProfessionnel']);
               print_r($dataPro);
                $this->render('session_pro_societe',$dataPro);

            }
           
        }else{
            $dataPro = ['connexionProfessionnel' => 'Pas de Compte associé'];
            $this->render('validation_pro',$dataPro);
        }

    }
    public function action_ajout_employer(){
        $this->render('ajout_employer');
    }

    //#######################################################################################################################
    //fonction inscription employer
    //#######################################################################################################################

    public function action_enregistrement_employer(){
     
        $m = Model::get_model();
        $pro = ['connexionProfessionnel' => $m->get_enregistrement_employer($_POST)];
        $this->render('ajout_employer');
    }

}