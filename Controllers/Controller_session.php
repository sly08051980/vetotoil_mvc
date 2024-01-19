<?php

class Controller_session extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }
    public function action_session_connect(){
       
        $m = Model::get_model();

        $isConnect =['connexion'=> $m->get_session_connect()];
    
        if ($isConnect) {
            $this->render('session_connect', $isConnect);
        } else {
            $this->render('error');
        }
    }

    public function action_session_deconnexion()
    {
        $_SESSION=array();
        session_unset();

        session_destroy();

        echo "<script>
        document.location='?controller=home&action=home' </script>";
    }

}