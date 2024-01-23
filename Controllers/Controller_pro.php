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
            var_dump($pro);
            $dataPro = ['connexionProfessionnel' => $m->get_recherche_pro_valide($siret,$mdp)];
            $this->render('test',$dataPro);
        }else{
            $topro = ['connexionProfessionnel' => 'Pas de Compte associé'];
            $this->render('test',$topro);
        }
        // if($pro){
        //     $dataPro = ['connexionProfessionnel' => $m->get_recherche_pro_valide($siret,$mdp)];
        //     if($dataPro){
        //         $this->render('test');
        //     }else{
        //         $message = ['message' => 'veuillez patienter des recherches sont toujours en cours'];
        //         $this->render('fiche_pro',$message);
                
        //     }
        // }

    }

}