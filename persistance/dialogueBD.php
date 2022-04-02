<?php
require_once 'connexion.php';

class DialogueBD
{
    public function SelectHotel()
    {

        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT nomHotel FROM hotel";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $hotels = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $hotels;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function SelectOptionCh()
    {

        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM chambres WHERE optionSuite='NULL'";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $hotels = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $hotels;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function SelectOptionSuite()
    {

        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM chambres WHERE optionSuite IS NOT NULL";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $hotels = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $hotels;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getReservation($date_debut, $date_fin, $nb_adulte) {
        $envoieOk = false;
        try {
            $conn = Connexion::getConnexion();
            $sql = "INSERT INTO reservation (dateDebut, DateFin, NbAdulte) values (?, ?, ?)";
            $sth = $conn->prepare($sql);
            $sth->execute(array($date_debut, $date_fin, $nb_adulte));
            $envoieOk = true;
        }
        catch (Exception $e){
            $erreur = $e->getMessage(). '('.$e -> getFile().',ligne'. $e -> getLine().')';
        }
        return $envoieOk;
    }

    public function getAllInfoCh()
    {

        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM chambres INNER JOIN hotel ON chambres.idHotel = hotel.idHotel WHERE codeSuite='N' ORDER BY chambres.prixCh DESC";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $hotels = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $hotels;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getAllInfoSuites()
    {

        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM chambres INNER JOIN hotel ON chambres.idHotel = hotel.idHotel WHERE codeSuite='O' ORDER BY chambres.prixCh DESC";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $hotels = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $hotels;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function FiltrePrixCroi()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT prixCh FROM chambres INNER JOIN hotel ON chambres.idHotel = hotel.idHotel WHERE codeSuite='N'";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $result_prix = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $result_prix;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function FiltrePrixDesc()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT prixCh FROM chambres INNER JOIN hotel ON chambres.idHotel = hotel.idHotel WHERE codeSuite='N' ORDER BY chambres.prixCh DESC";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $result_prix = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $result_prix;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function FiltreSpa()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT optionCh FROM chambres WHERE LOCATE( 'spa', optionCh)";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabEmployesService = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabEmployesService;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function FiltreTV($service)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT DesiServ FROM service WHERE CodeServ=?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($service));
            $tabEmployesService = $sth->fetchObject();
            return $tabEmployesService;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function FiltreChauffeur($service)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT DesiServ FROM service WHERE CodeServ=?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($service));
            $tabEmployesService = $sth->fetchObject();
            return $tabEmployesService;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function FiltreHamam($service)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT DesiServ FROM service WHERE CodeServ=?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($service));
            $tabEmployesService = $sth->fetchObject();
            return $tabEmployesService;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function FiltreRestauration($service)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT DesiServ FROM service WHERE CodeServ=?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($service));
            $tabEmployesService = $sth->fetchObject();
            return $tabEmployesService;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }







    public function getUnEmploye()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM employe WHERE Matricule='E004'";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $employe = $sth->fetchObject();
            return $employe;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getEmployesParService($service)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM employe WHERE ServEmpl=?";
            $sql = $sql . "ORDER BY NomEmpl";
            $sth = $conn->prepare($sql);
            $sth->execute(array($service));
            $tabEmployesService = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabEmployesService;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getNomService($service)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT DesiServ FROM service WHERE CodeServ=?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($service));
            $tabEmployesService = $sth->fetchObject();
            return $tabEmployesService;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getTousLesServices()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM service ORDER By DesiServ";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabEmployesService = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabEmployesService;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getUnEmploye2($matricule)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM employe WHERE Matricule=?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($matricule));
            $employe = $sth->fetchObject();
            return $employe;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getTousLesEmployes2()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT NomEmpl, PrenomEmpl, Matricule FROM employe";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabEmployes = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabEmployes;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
}