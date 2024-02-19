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
            $password = mdp($password);


            $email = isset($_POST['email']) ? $_POST['email'] : "";
            $email = validate_formulaire($email);

            $date = date("Y-m-d");
            $droit = "Patient";
            $requete = $this->bd->prepare('INSERT INTO patient (id_patient, nom, prenom, adresse, complement_adresse, 
            code_postal, ville, telephone, mdp ,email, date_creation, date_fin,droit_utilisateur) 
             VALUES (NULL, :nom, :prenom, :adresse, :complementAdresse, :codePostal, :ville, :telephone, 
             :pass, :email, :datejour, NULL,:droit)');


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
                ':datejour' => $date,
                ':droit' => $droit
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
                'codePostal' => $codePostal,
                'droit' => $droit

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
            $password = $_POST['password'];


            $requete = $this->bd->prepare('SELECT * FROM patient WHERE email=:email');
            $requete->execute(array(':email' => $email));
            $requete = $requete->fetch(PDO::FETCH_ASSOC);


            if ($requete && password_verify($password, $requete['mdp'])) {

                return $requete;
            } else {

                return false;
            }
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage());
        }
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
            $password = mdp($password);
            $file = isset($_FILES['file']) ? $_FILES['file'] : "";
            $file1 = inserer_image($file);
            if ($file1 == null) {
                $fileImage = "";
            } else {
                $fileImage = "./Content/img/utilisateur/" . $file1;
            }


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
                'images' => $fileImage,
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
                'images' => $fileImage,
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



            $requete = $this->bd->prepare('SELECT * FROM societe WHERE siret=:siret');
            $requete->execute(array(':siret' => $siret));
            $requete = $requete->fetchAll(PDO::FETCH_OBJ);


            if ($requete) {

                foreach ($requete as $resultat) {

                    if (password_verify($mdp, $resultat->password)) {

                        return $resultat;
                    }
                }
            } else {

                return false;
            }
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }

    }
    public function get_recherche_pro_valide($siret, $mdp)
    {
        try {
            $status = "Valider";
            $requete = $this->bd->prepare('SELECT * FROM societe WHERE siret=:siret AND status=:status');
            $requete->execute(array(':siret' => $siret, ':status' => $status));
            $requete = $requete->fetchAll(PDO::FETCH_OBJ);

            if ($requete) {

                foreach ($requete as $resultat) {

                    if (password_verify($mdp, $resultat->password)) {

                        return $resultat;
                    }
                }
            } else {

                return false;
            }
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }

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
            $password = mdp($password);


            $file = isset($_FILES['file']) ? $_FILES['file'] : "";
            $file1 = inserer_image($file);

            if ($file1 == null) {
                $fileImage = "";
            } else {
                $fileImage = "./Content/img/utilisateur/" . $file1;
            }

            $dates = date("Y-m-d");

            $requete = $this->bd->prepare("INSERT INTO employer (id_employer, nom, prenom, adresse, complement_adresse, code_postal,
             ville, telephone, email, profession, password,images, date_creation) 
             VALUES (NULL, :nom, :prenom, :adresse, :complementAdresse, :codePostal, :ville, :telephone, :email, :profession,
             :password,:images, :dates)");

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
                ':images' => $fileImage,
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
public function get_recherche_tous_employer($siret){
try{
  
    $requete=$this->bd->prepare("SELECT * FROM ajouter INNER JOIN employer ON ajouter.id_employer=employer.id_employer  WHERE siret =:siret  AND date_sortie_employer IS NULL");
    $requete->execute(array(':siret'=>$siret ));
    return $requete->fetchAll(PDO::FETCH_OBJ);
}catch (PDOException $e) {
    die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
}
}

public function get_supprimer_employer($siret,$employer){
try{
    $dates = date("Y-m-d");
    $requete=$this->bd->prepare("UPDATE ajouter SET date_sortie_employer=:dates  WHERE siret = :siret AND id_employer= :employer");
    $requete->execute(array(':dates'=>$dates,':siret'=>$siret,':employer'=>$employer));
    return $requete->fetchAll(PDO::FETCH_OBJ);

}catch (PDOException $e) {
    die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
}

}

public function get_editer_employer($siret,$employer){
    try{
    $requete=$this->bd->prepare("SELECT * FROM ajouter INNER JOIN employer ON ajouter.id_employer=employer.id_employer  
    WHERE siret =:siret  AND date_sortie_employer IS NULL AND ajouter.id_employer =:employer");

    $requete->execute(array(':siret'=>$siret,'employer'=>$employer ));
    return $requete->fetchAll(PDO::FETCH_OBJ);
}catch (PDOException $e) {
    die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
}
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
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    //#######################################################################################################################
    //fonction ajouter animal
    //#######################################################################################################################
    public function get_enregistrer_animal(array $data)
    {
        try {
            $id = $_POST['patient'];

            $prenom = $_POST['prenom'];
            $dateNaissance = $_POST['dateNaissance'];
            $race = $_POST['numero'];
            $dates = date("Y-m-d");
            $requete = $this->bd->prepare('INSERT INTO animal (id_animal, prenom_animal, date_naissance_animal,date_creation_animal,date_fin_animal, id_race, id_patient)
             VALUES (NULL, :prenom, :dateNaissance,:dates,Null, :race, :id);');


            $requete->execute([
                ':prenom' => $prenom,
                ':race' => $race,
                ':dateNaissance' => $dateNaissance,
                ':id' => $id,
                ':dates' => $dates
            ]);
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }
    public function get_modifier_animal($idPatient)
    {
        try {

            // $requete = $this->bd->prepare('SELECT * FROM animal WHERE id_patient =:id');
            $requete = $this->bd->prepare('SELECT animal.date_naissance_animal, animal.id_animal,animal.prenom_animal,race.race_animal,patient.nom,patient.prenom 
            FROM animal JOIN race ON animal.id_race=race.id_race JOIN patient ON animal.id_patient=patient.id_patient WHERE animal.id_patient=:id AND animal.date_fin_animal IS NULL');

            $requete->execute(array(':id' => $idPatient));
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }

        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_supprimer_animal(array $data)
    {
        try {
            $idAnimal = $_POST['idAnimal'];
            $dates = date("Y-m-d");
            $requete = $this->bd->prepare('UPDATE animal SET date_fin_animal = :dates WHERE animal.id_animal = :idAnimal');
            $requete->execute(array(':idAnimal' => $idAnimal, ':dates' => $dates));
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }


    public function get_recherche_rdv($profession)
    {
        // recherche sur deux semaine
        $date_debut = date('Y-m-d');
        $date_fin = date('Y-m-d', strtotime('+14 days'));

        // Recherche des informations sur la commune
        $requete_commune = $this->bd->prepare("SELECT * FROM commune WHERE code_postal = '13011'");
        $requete_commune->execute();
        $row = $requete_commune->fetch(PDO::FETCH_ASSOC);

        $latitude = $row['latitude'];
        $longitude = $row['longitude'];
        // echo "Latitude: $latitude<br>";
        // echo "Longitude: $longitude<br>";

        $formule = "(6366*acos(cos(radians($latitude))*cos(radians(`latitude`))*cos(radians(`longitude`)-radians($longitude))+sin(radians($latitude))*sin(radians(`latitude`))))";
        // distance 10km
        $distance = 10;
        $sql = "SELECT nom_commune, $formule AS dist FROM commune WHERE $formule <= :distance ORDER BY dist ASC";
        $res = $this->bd->prepare($sql);
        $res->bindParam(':distance', $distance);
        $res->execute();

        $r = $res->fetch(PDO::FETCH_ASSOC);

        // Recherche des employés
        $requete_employes = $this->bd->prepare("
        SELECT e.id_employer, e.nom, e.prenom, a.jours_travailler,
               s.adresse, s.complement_adresse, s.code_postal, s.ville, s.telephone_societe, s.nom_societe 
        FROM employer e 
        INNER JOIN ajouter a ON e.id_employer = a.id_employer 
        INNER JOIN societe s ON s.siret = a.siret 
        WHERE e.profession = :profession 
          AND s.code_postal IN (
              SELECT code_postal 
              FROM commune 
              WHERE $formule <= :distance
          )
    ");

        $requete_employes->execute(array(':profession' => $profession, ':distance' => $distance));
        $employes = $requete_employes->fetchAll(PDO::FETCH_ASSOC);

        $tableau = [];


        foreach ($employes as $employe) {

            $employe_id = $employe['id_employer'];


            $tableau[$employe_id] = [

                "nom" => $employe['nom'],
                "prenom" => $employe['prenom'],
                "profession" => $profession,
                'date_debut' => $date_debut,
                "date_fin" => $date_fin,
                "telephone_societe" => $employe['telephone_societe'],
                "adresse" => $employe['adresse'],
                "complement_adresse" => $employe['complement_adresse'],
                "code_postal" => $employe['code_postal'],
                "ville" => $employe['ville']


            ];


            $jours_travailles = json_decode($employe['jours_travailler'], true);


            // Boucle sur chaque jour de la période
            $date = $date_debut;
            while ($date <= $date_fin) {
                $jour_semaine_fr = strtolower(date('l', strtotime($date)));

                // Traduire le jour de la semaine en français
                switch ($jour_semaine_fr) {
                    case 'monday':
                        $jour_semaine_fr = 'lundi';
                        break;
                    case 'tuesday':
                        $jour_semaine_fr = 'mardi';
                        break;
                    case 'wednesday':
                        $jour_semaine_fr = 'mercredi';
                        break;
                    case 'thursday':
                        $jour_semaine_fr = 'jeudi';
                        break;
                    case 'friday':
                        $jour_semaine_fr = 'vendredi';
                        break;
                    case 'saturday':
                        $jour_semaine_fr = 'samedi';
                        break;
                    case 'sunday':
                        $jour_semaine_fr = 'dimanche';
                        break;
                }

                // Vérifier si le jour fait partie des jours travaillés de l'employé
                if (in_array($jour_semaine_fr, $jours_travailles)) {
                    // Requête pour récupérer les créneaux horaires déjà pris pour cet employé pour cette date
                    $sql_pris = "SELECT heure FROM rdv WHERE date_rdv = :date AND id_employer = :id_employer";
                    $stmt_pris = $this->bd->prepare($sql_pris);
                    $stmt_pris->bindParam(':date', $date);
                    $stmt_pris->bindParam(':id_employer', $employe_id);
                    $stmt_pris->execute();
                    $creneaux_pris = $stmt_pris->fetchAll(PDO::FETCH_COLUMN);

                    // Générer une liste de tous les créneaux horaires possibles (par exemple, de 9h à 17h)
                    $creneaux_possibles = [];
                    for ($i = 9; $i < 17; $i++) {
                        $creneaux_possibles[] = sprintf("%02d:00:00", $i);
                    }

                    // Filtrer les créneaux horaires disponibles en excluant ceux qui sont déjà pris
                    $creneaux_disponibles = array_diff($creneaux_possibles, $creneaux_pris);

                    $tableau[$employe_id] += [
                        "$date" => [
                            "$jour_semaine_fr" => [
                                $creneaux_disponibles
                            ]
                        ]
                    ];

                }

                // Passer à la prochaine date
                $date = date('Y-m-d', strtotime($date . ' +1 day'));
            }
        }

        return $tableau;
    }
}
