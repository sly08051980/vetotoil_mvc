<?php
require_once "./Content/phpMailer/Exception.php";
require_once "./Content/phpMailer/PHPMailer.php";
require_once "./Content/phpMailer/SMTP.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Model
{
    private $bd;

    private static $instance = null;

    private function __construct()
    {
        
        try {
            $this->bd = new PDO('mysql:host=localhost;dbname=vetotoil', 'root', '');
            $this->bd->query("SET NAMES 'utf8'");
            $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('<p>Echec connexion. Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }

    public static function get_model()
    {

        if (is_null(self::$instance)) {
            self::$instance = new Model();
        }
        return self::$instance;
    }

    //#######################################################################################################################
    //fonction envoyer mail
    //#######################################################################################################################
    public function envoyer_contact_email($nom, $prenom, $email, $telephone, $message)
    {

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_OFF; //debug off pour ne pas avoir toutes les lignes d instruction

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = 'regnier.sylvain.afpa@gmail.com';
            $mail->Password = 'tpgz olar ervr atqh';

            $mail->CharSet = "utf-8";

            $mail->addAddress("regnier.sylvain@yahoo.fr");

            $mail->setFrom($email);
            $mail->Subject = "Sujet du message";
            $mail->Body = $nom . ' ' . $prenom . ' ' . $telephone . ' ' . $email . ' ' . $message;

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    //#######################################################################################################################
    //fonction inscription
    //#######################################################################################################################
    public function get_inscription_valider(array $data)
    {

        try {

            $nom = isset($_POST['nom']) ? $_POST['nom'] : "";
            $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : "";
            $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : "";
            $complementAdresse = isset($_POST['complementAdresse']) ? $_POST['complementAdresse'] : "";
            $codePostal = isset($_POST['codePostal']) ? $_POST['codePostal'] : "";
            $ville = isset($_POST['ville']) ? $_POST['ville'] : "";
            $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : "";
            $password = isset($_POST['password']) ? $_POST['password'] : "";
            $email = isset($_POST['email']) ? $_POST['email'] : "";

            $date = date("Y-m-d");
            $requete = $this->bd->prepare('INSERT INTO patient (id_patient, nom, prenom, adresse, complement_adresse, code_postal, ville, telephone, mdp ,email, date_creation, date_fin) 
             VALUES (NULL, :nom, :prenom, :adresse, :complementAdresse, :codePostal, :ville, :telephone, :pass, :email, :datejour, NULL)');


            $requete->execute([
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':adresse' => $adresse,
                ':complementAdresse' => $complementAdresse,
                ':codePostal' => $codePostal,
                ':ville' => $ville,
                ':telephone' => $telephone,
                ':pass' => $password,
                ':email' => $email,
                ':datejour' => $date
            ]);
            // $requete = $this->bd->prepare('SELECT * FROM patient WHERE email = :email');
            // $requete->execute([':email'=>$email]);

            return [
                'email' => $email,
                'nom' => $nom,
                'prenom' => $prenom,
                'adresse' => $adresse,
                'ville' => $ville,
                'telephone' => $telephone,
                'codePostal' => $codePostal
                
            ];

        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        // return $requete->fetchAll(PDO::FETCH_OBJ);
    }
     //#######################################################################################################################
    //fonction connexion session
    //#######################################################################################################################
    public function get_session_connect(){
       try {
      $email=$_POST['email'];
      $mdp=$_POST['password'];

        $requete=$this->bd->prepare('SELECT * FROM patient WHERE email=:email AND mdp=:mdp');
        $requete->execute(array(':email'=>$email,'mdp'=>$mdp));
    }catch (PDOException $e) {
        die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');

    }
    return $requete->fetchAll(PDO::FETCH_OBJ);
}
}
