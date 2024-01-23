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
    //fonction inscription particulier
    //#######################################################################################################################
    public function get_inscription_valider(array $data)
    {

        try {


            $nom = isset($_POST['nom']) ? $_POST['nom'] : "";
            $nom=validate_formulaire($nom);
            $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : "";
            $prenom=validate_formulaire($prenom);
            $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : "";
            $adresse =validate_formulaire($adresse);
            $complementAdresse = isset($_POST['complementAdresse']) ? $_POST['complementAdresse'] : "";
            $complementAdresse = validate_formulaire($complementAdresse);
            $codePostal = isset($_POST['codePostal']) ? $_POST['codePostal'] : "";
            $codePostal =validate_formulaire($codePostal);
            $ville = isset($_POST['ville']) ? $_POST['ville'] : "";
            $ville =validate_formulaire($ville);
            $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : "";
            $telephone =validate_formulaire($telephone);
            $password = isset($_POST['password']) ? $_POST['password'] : "";

            $email = isset($_POST['email']) ? $_POST['email'] : "";
            $email =validate_formulaire($email);

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
    public function get_find_animal($animal)
    {
        try {
            $requete = $this->bd->prepare('SELECT race_animal,id_race FROM race JOIN type ON race.id_type=type.id_type WHERE type.type_animal=:animal');
            $requete->execute(array(':animal' => $animal));
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');

        }
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    //#######################################################################################################################
    //fonction connexion session
    //#######################################################################################################################
    public function get_session_connect()
    {
        try {
            $email = $_POST['email'];
            $mdp = $_POST['password'];

            $requete = $this->bd->prepare('SELECT * FROM patient WHERE email=:email AND mdp=:mdp');
            $requete->execute(array(':email' => $email, 'mdp' => $mdp));
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');

        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    //#######################################################################################################################
    //fonction inscription pro
    //#######################################################################################################################
    public function get_inscription_pro(array $data)
    {
        try {
            $siret = isset($_POST['siret']) ? $_POST['siret'] : "";
            $siret =validate_formulaire($siret);
            $nomSociete = isset($_POST['nomSociete']) ? $_POST['nomSociete'] : "";
            $nomSociete =validate_formulaire($nomSociete);
            $profession = isset($_POST['profession']) ? $_POST['profession'] : "";
            $profession =validate_formulaire($profession);
            $nomDirigeant = isset($_POST['nomDirigeant']) ? $_POST['nomDirigeant'] : "";
            $nomDirigeant =validate_formulaire($nomDirigeant);
            $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : "";
            $adresse =validate_formulaire($adresse);
            $complementAdresse = isset($_POST['complementAdresse']) ? $_POST['complementAdresse'] : "";
            $complementAdresse =validate_formulaire($complementAdresse);
            $codePostal = isset($_POST['codePostal']) ? $_POST['codePostal'] : "";
            $codePostal =validate_formulaire($codePostal);
            $ville = isset($_POST['ville']) ? $_POST['ville'] : "";
            $ville =validate_formulaire($ville);
            $telephoneSociete = isset($_POST['telephoneSociete']) ? $_POST['telephoneSociete'] : "";
            $telephoneSociete =validate_formulaire($telephoneSociete);
            $telephoneDirigeant = isset($_POST['telephoneDirigeant']) ? $_POST['telephoneDirigeant'] : "";
            $telephoneDirigeant =validate_formulaire($telephoneDirigeant);
            $email = isset($_POST['email']) ? $_POST['email'] : "";
            $email =validate_formulaire($email);
            $password = isset($_POST['password']) ? $_POST['password'] : "";

            $administrateur = "Admin";

            $dates = date("Y-m-d");
            $requete = $this->bd->prepare('INSERT INTO societe (siret, nom_societe, profession, nom_dirigeant, adresse, complement_adresse, 
            code_postal, ville, telephone_societe ,telephone_dirigeant,email,password,date_creation,date_resiliation,date_validation,status,droit_utilisateur) 
             VALUES (:siret, :nomSociete, :profession, :nomDirigeant, :adresse, :complementAdresse, :codePostal, :ville, :telephoneSociete, 
             :telephoneDirigeant, :email,:passw,:dates,NULL,NULL,NULL,:administrateur)');


            $requete->execute([
                ':siret' => $siret,
                ':nomSociete' => $nomSociete,
                ':profession' => $profession,
                ':nomDirigeant' => $nomDirigeant,
                ':adresse' => $adresse,
                ':complementAdresse' => $complementAdresse,
                ':codePostal' => $codePostal,
                ':ville' => $ville,
                ':telephoneSociete' => $telephoneSociete,
                ':telephoneDirigeant' => $telephoneDirigeant,
                ':email' => $email,
                ':passw' => $password,
                ':dates' => $dates,
                ':administrateur' => $administrateur
            ]);
  
            return [
                'siret' => $siret,
                'nomSociete' => $nomSociete,
                'profession' => $profession,
                'nomDirigeant' => $nomDirigeant,
                'adresse' => $adresse,
                'complementAdresse' => $complementAdresse,
                'codePostal' => $codePostal,
                'ville' => $ville,
                'telephoneSociete' => $telephoneSociete,
                'telephoneDirigeant' => $telephoneDirigeant,
                'email' => $email,
                'administrateur' => $administrateur

            ];
        }  catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }

    //#######################################################################################################################
    //fonction inscription pro
    //#######################################################################################################################

   public function get_recherche_pro($siret,$mdp){
    
    try{
        
        $requete=$this->bd->prepare('SELECT * FROM societe WHERE siret=:siret AND password=:mdp');
        $requete->execute(array(':siret' => $siret, ':mdp' => $mdp ));
    }catch (PDOException $e) {
        die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }

   }
   public function get_recherche_pro_valide($siret,$mdp){
    try{
        
        $requete=$this->bd->prepare('SELECT * FROM societe WHERE siret=:siret AND password=:mdp AND status=:statut');
        $requete->execute(array(':siret' => $siret, ':mdp' => $mdp,':status'=>"Valider" ));
    }catch (PDOException $e) {
        die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
   }
}