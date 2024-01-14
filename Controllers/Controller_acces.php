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
    public function action_contact_email(){
        {
            $nom = isset($_POST['nom']) ? $_POST['nom'] : "";
            $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : "";
            $email = isset($_POST['email']) ? $_POST['email'] : "";
            $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : "";
            $message = isset($_POST['message']) ? $_POST['message'] : "";
        
            $m = Model::get_model();
            $m->get_envoyer_contact_email($nom, $prenom, $email, $telephone, $message);
        
            $this->render("home");
    
        }
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
        // $m = Model::get_model();

        
        // $isRegistered = [
        //     'inscription' => $m->get_inscription_valider(
        //           $_POST
        //       )
        //     ];
        //     if ($isRegistered) {
        //         $user = $isRegistered[0]; 
        //         $this->render('ficheUsers', ['email' => $user->email]);
        //     } else {
        //         $this->render('error');
        //     }
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

    public function action_acces_connexion()
    {
        $this->render('acces_connexion');
    }
    public function action_acces_inscription_pro()
    {
        $this->render('acces_inscription_pro');
    }
}
