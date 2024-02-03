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
            $nom = validate_formulaire($nom);
            $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : "";
            $prenom = validate_formulaire($prenom);
            $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : "";
            $adresse = validate_formulaire($adresse);
            $complementAdresse = isset($_POST['complementAdresse']) ? $_POST['complementAdresse'] : "";
            $complementAdresse = validate_formulaire($complementAdresse);
            $codePostal = isset($_POST['codePostal']) ? $_POST['codePostal'] : "";
            $codePostal = validate_formulaire($codePostal);
            $ville = isset($_POST['ville']) ? $_POST['ville'] : "";
            $ville = validate_formulaire($ville);
            $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : "";
            $telephone = validate_formulaire($telephone);
            $password = isset($_POST['password']) ? $_POST['password'] : "";

            $email = isset($_POST['email']) ? $_POST['email'] : "";
            $email = validate_formulaire($email);

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
            $siret = validate_formulaire($siret);
            $nomSociete = isset($_POST['nomSociete']) ? $_POST['nomSociete'] : "";
            $nomSociete = validate_formulaire($nomSociete);
            $profession = isset($_POST['profession']) ? $_POST['profession'] : "";
            $profession = validate_formulaire($profession);
            $nomDirigeant = isset($_POST['nomDirigeant']) ? $_POST['nomDirigeant'] : "";
            $nomDirigeant = validate_formulaire($nomDirigeant);
            $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : "";
            $adresse = validate_formulaire($adresse);
            $complementAdresse = isset($_POST['complementAdresse']) ? $_POST['complementAdresse'] : "";
            $complementAdresse = validate_formulaire($complementAdresse);
            $codePostal = isset($_POST['codePostal']) ? $_POST['codePostal'] : "";
            $codePostal = validate_formulaire($codePostal);
            $ville = isset($_POST['ville']) ? $_POST['ville'] : "";
            $ville = validate_formulaire($ville);
            $telephoneSociete = isset($_POST['telephoneSociete']) ? $_POST['telephoneSociete'] : "";
            $telephoneSociete = validate_formulaire($telephoneSociete);
            $telephoneDirigeant = isset($_POST['telephoneDirigeant']) ? $_POST['telephoneDirigeant'] : "";
            $telephoneDirigeant = validate_formulaire($telephoneDirigeant);
            $email = isset($_POST['email']) ? $_POST['email'] : "";
            $email = validate_formulaire($email);
            $password = isset($_POST['password']) ? $_POST['password'] : "";
            $file = isset($_POST['image']) ? $_POST['image'] : "";
            var_dump($file);
            $file1= inserer_image($file);
            var_dump($file1);
            $fileImage ="./upload/".$file1;
die;
            $administrateur = "Admin";

            $dates = date("Y-m-d");
            $requete = $this->bd->prepare('INSERT INTO societe (siret, nom_societe, profession, nom_dirigeant, adresse, complement_adresse, 
            code_postal, ville, telephone_societe ,telephone_dirigeant,email,password,images,date_creation,date_resiliation,date_validation,status,droit_utilisateur) 
             VALUES (:siret, :nomSociete, :profession, :nomDirigeant, :adresse, :complementAdresse, :codePostal, :ville, :telephoneSociete, 
             :telephoneDirigeant, :email,:passw,:images,:dates,NULL,NULL,NULL,:administrateur)');


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
                'images' =>$fileImage,
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
                'images'=>$fileImage,
                'administrateur' => $administrateur

            ];
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }

    //#######################################################################################################################
    //fonction Connexion pro
    //#######################################################################################################################

    public function get_recherche_pro($siret, $mdp)
    {

        try {

            $requete = $this->bd->prepare('SELECT * FROM societe WHERE siret=:siret AND password=:mdp');
            $requete->execute(array(':siret' => $siret, ':mdp' => $mdp));
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);

    }
    public function get_recherche_pro_valide($siret, $mdp)
    {
        try {
            $status = "Valider";
            $requete = $this->bd->prepare('SELECT * FROM societe WHERE siret=:siret AND password=:mdp AND status=:status');
            $requete->execute(array(':siret' => $siret, ':mdp' => $mdp, ':status' => $status));
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    //#######################################################################################################################
    //fonction employer
    //#######################################################################################################################
    public function get_enregistrement_employer(array $data)
    {
        try {


            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $adresse = $_POST['adresse'];
            $complementAdresse = $_POST['complementAdresse'];
            $codePostal = $_POST['codePostal'];
            $ville = $_POST['ville'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $profession = $_POST['profession'];
            $password = $_POST['password'];
            $dates = date("Y-m-d");

            $requete = $this->bd->prepare("INSERT INTO employer (id_employer, nom, prenom, adresse, complement_adresse, code_postal,
             ville, telephone, email, profession, password, date_creation) 
             VALUES (NULL, :nom, :prenom, :adresse, :complementAdresse, :codePostal, :ville, :telephone, :email, :profession,
             :password, :dates)");

            $requete->execute([
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':adresse' => $adresse,
                ':complementAdresse' => $complementAdresse,
                ':codePostal' => $codePostal,
                ':ville' => $ville,
                ':telephone' => $telephone,
                ':email' => $email,
                ':profession' => $profession,
                ':password' => $password,
                ':dates' => $dates
            ]);

            $requete = $this->bd->prepare("SELECT id_employer FROM employer WHERE email = :email AND password=:password");
            $requete->execute(array(':email' => $email, ':password' => $password));

            $resultat = $requete->fetch(PDO::FETCH_OBJ);

            $test = [];
            if (isset($_POST['lundi']) && $_POST['lundi'] === 'on') {
                $test[] = 'lundi';
            }

            if (isset($_POST['mardi']) && $_POST['mardi'] === 'on') {
                $test[] = 'mardi';
            }
            if (isset($_POST['mercredi']) && $_POST['mercredi'] === 'on') {
                $test[] = 'mercredi';
            }
            if (isset($_POST['jeudi']) && $_POST['jeudi'] === 'on') {
                $test[] = 'jeudi';
            }
            if (isset($_POST['vendredi']) && $_POST['vendredi'] === 'on') {
                $test[] = 'vendredi';
            }
            if (isset($_POST['samedi']) && $_POST['samedi'] === 'on') {
                $test[] = 'samedi';
            }
            if (isset($_POST['dimanche']) && $_POST['dimanche'] === 'on') {
                $test[] = 'dimanche';
            }
            $jours = json_encode($test);
            $siret = $_POST['siret'];

            $requete = $this->bd->prepare("INSERT INTO ajouter(id_ajouter_configuration, jours_travailler, date_entree_employer,
             date_sortie_employer, date_jours_vacances, date_fin_vacances, siret, id_employer, droit_utilisateur, 
             debut_repas, fin_repas) VALUES (NULL,:jours,:dates,NULL,NULL,NULL,
             :siret,:resultat,Null,Null,NULL)");

            $requete->execute([
                ':jours' => $jours,
                ':dates' => $dates,
                ':siret' => $siret,
                ':resultat' => $resultat->id_employer
            ]);

        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }

        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_modifier_pro($siret)
    {
        try {

            $requete = $this->bd->prepare("SELECT * FROM societe WHERE siret =:siret");
            $requete->execute(array(':siret' => $siret));
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }

        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_update_societe(array $data)
    {

        try {


            $siret = $_POST['siret'];
            $nomDirigeant = $_POST['nomDirigeant'];
            $profession = $_POST['profession'];
            $adresse = $_POST['adresse'];
            $complementAdresse = $_POST['complementAdresse'];
            $codePostal = $_POST['codePostal'];
            $ville = $_POST['ville'];
            $telephoneSociete = $_POST['telephoneSociete'];
            $telephoneDirigeant = $_POST['telephoneDirigeant'];
            $email = $_POST['email'];

            $requete = $this->bd->prepare("
            UPDATE societe SET  profession = :profession, nom_dirigeant = :nomDirigeant, adresse = :adresse, complement_adresse = :complementAdresse,
             code_postal = :codePostal, ville = :ville, telephone_societe = :telephoneSociete, telephone_dirigeant = :telephoneDirigeant, email = :email 
             WHERE societe.siret = :siret;");


            
            $requete->execute([
                ':siret' => $siret,
                ':nomDirigeant' => $nomDirigeant,
                ':profession' => $profession,
                ':adresse' => $adresse,
                ':complementAdresse' => $complementAdresse,
                ':codePostal' => $codePostal,
                ':ville' => $ville,
                ':telephoneSociete' => $telephoneSociete,
                ':telephoneDirigeant' => $telephoneDirigeant,
                ':email' => $email


            ]);

        }   catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
}