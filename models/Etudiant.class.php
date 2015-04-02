<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Classe Etudiant //////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class Etudiant 
{

        private $idEtudiant;
        private $identifiantEtudiant;
        private $mdpEtudiant;
        private $nomEtudiant;
        private $prenomEtudiant;
        private $emailEtudiant;
        private $telephoneEtudiant;
        private $sexeEtudiant;
        private $photoEtudiant;
        private $dateNaissanceEtudiant;
        private $idFormation;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Constructeur /////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function __construct($idEtudiant)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("select * from Etudiant where idEtudiant = :idEtudiant;");
        $stmt->bindParam(":idEtudiant", $idEtudiant, PDO::PARAM_INT);
        $stmt->execute();
        $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $this->idEtudiant = $idEtudiant;
        $this->identifiantEtudiant = $etudiant['identifiantEtudiant'] ;
        $this->mdpEtudiant = $etudiant['mdpEtudiant'] ;
        $this->nomEtudiant = $etudiant['nomEtudiant'] ;
        $this->prenomEtudiant = $etudiant['prenomEtudiant'] ;
        $this->emailEtudiant = $etudiant['emailEtudiant'] ;
        $this->telephoneEtudiant = $etudiant['telephoneEtudiant'] ;
        $this->sexeEtudiant = $etudiant['sexeEtudiant'] ;
        $this->photoEtudiant = $etudiant['photoEtudiant'] ;
        $this->dateNaissanceEtudiant = $etudiant['dateNaissanceEtudiant'] ;
        $this->idFormation = $etudiant['idFormation'] ;

    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Getter et Setter /////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Gets the value of idEtudiant.
     *
     * @return mixed
     */
    public function getIdEtudiant()
    {
        return $this->idEtudiant;
    }


    /**
     * Gets the value of identifiantEtudiant.
     *
     * @return mixed
     */
    public function getIdentifiantEtudiant()
    {
        return $this->identifiantEtudiant;
    }

    /**
     * Sets the value of identifiantEtudiant.
     *
     * @param mixed $identifiantEtudiant the identifiant etudiant
     *
     * @return self
     */
    private function setIdentifiantEtudiant($identifiantEtudiant)
    {
        $this->identifiantEtudiant = $identifiantEtudiant;

        return $this;
    }

    /**
     * Gets the value of mdpEtudiant.
     *
     * @return mixed
     */
    public function getMdpEtudiant()
    {
        return $this->mdpEtudiant;
    }

    /**
     * Sets the value of mdpEtudiant.
     *
     * @param mixed $mdpEtudiant the mdp etudiant
     *
     * @return self
     */
    private function setMdpEtudiant($mdpEtudiant)
    {
        $this->mdpEtudiant = $mdpEtudiant;

        return $this;
    }

    /**
     * Gets the value of nomEtudiant.
     *
     * @return mixed
     */
    public function getNomEtudiant()
    {
        return $this->nomEtudiant;
    }

    /**
     * Sets the value of nomEtudiant.
     *
     * @param mixed $nomEtudiant the nom etudiant
     *
     * @return self
     */
    private function setNomEtudiant($nomEtudiant)
    {
        $this->nomEtudiant = $nomEtudiant;

        return $this;
    }

    /**
     * Gets the value of prenomEtudiant.
     *
     * @return mixed
     */
    public function getPrenomEtudiant()
    {
        return $this->prenomEtudiant;
    }

    /**
     * Sets the value of prenomEtudiant.
     *
     * @param mixed $prenomEtudiant the prenom etudiant
     *
     * @return self
     */
    private function setPrenomEtudiant($prenomEtudiant)
    {
        $this->prenomEtudiant = $prenomEtudiant;

        return $this;
    }

    /**
     * Gets the value of emailEtudiant.
     *
     * @return mixed
     */
    public function getEmailEtudiant()
    {
        return $this->emailEtudiant;
    }

    /**
     * Sets the value of emailEtudiant.
     *
     * @param mixed $emailEtudiant the email etudiant
     *
     * @return self
     */
    private function setEmailEtudiant($emailEtudiant)
    {
        $this->emailEtudiant = $emailEtudiant;

        return $this;
    }

    /**
     * Gets the value of telephoneEtudiant.
     *
     * @return mixed
     */
    public function getTelephoneEtudiant()
    {
        return $this->telephoneEtudiant;
    }

    /**
     * Sets the value of telephoneEtudiant.
     *
     * @param mixed $telephoneEtudiant the telephone etudiant
     *
     * @return self
     */
    private function setTelephoneEtudiant($telephoneEtudiant)
    {
        $this->telephoneEtudiant = $telephoneEtudiant;

        return $this;
    }

    /**
     * Gets the value of sexeEtudiant.
     *
     * @return mixed
     */
    public function getSexeEtudiant()
    {
        return $this->sexeEtudiant;
    }

    /**
     * Sets the value of sexeEtudiant.
     *
     * @param mixed $sexeEtudiant the sexe etudiant
     *
     * @return self
     */
    private function setSexeEtudiant($sexeEtudiant)
    {
        $this->sexeEtudiant = $sexeEtudiant;

        return $this;
    }

    /**
     * Gets the value of photoEtudiant.
     *
     * @return mixed
     */
    public function getPhotoEtudiant()
    {
        return $this->photoEtudiant;
    }

    /**
     * Sets the value of photoEtudiant.
     *
     * @param mixed $photoEtudiant the photo etudiant
     *
     * @return self
     */
    private function setPhotoEtudiant($photoEtudiant)
    {
        $this->photoEtudiant = $photoEtudiant;

        return $this;
    }

    /**
     * Gets the value of dateNaissanceEtudiant.
     *
     * @return mixed
     */
    public function getDateNaissanceEtudiant()
    {
        return $this->dateNaissanceEtudiant;
    }

    /**
     * Sets the value of dateNaissanceEtudiant.
     *
     * @param mixed $dateNaissanceEtudiant the date naissance etudiant
     *
     * @return self
     */
    private function setDateNaissanceEtudiant($dateNaissanceEtudiant)
    {
        $this->dateNaissanceEtudiant = $dateNaissanceEtudiant;

        return $this;
    }

    /**
     * Gets the value of idFormation.
     *
     * @return mixed
     */
    public function getIdFormation()
    {
        return $this->idFormation;
    }

    /**
     * Sets the value of idFormation.
     *
     * @param mixed $idFormation the id formation
     *
     * @return self
     */
    private function setIdFormation($idFormation)
    {
        $this->idFormation = $idFormation;

        return $this;
    }


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Methodes /////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public static function createEtudiant($identifiantEtudiant, $mdpEtudiant, $nomEtudiant, $prenomEtudiant, $emailEtudiant, $telephoneEtudiant = null, $sexeEtudiant = null, $photoEtudiant = null, $dateNaissanceEtudiant = null, $idFormation)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("INSERT INTO Etudiant (identifiantEtudiant,  mdpEtudiant,  nomEtudiant, prenomEtudiant, emailEtudiant, telephoneEtudiant, sexeEtudiant, photoEtudiant, dateNaissanceEtudiant, idFormation) VALUES (:identifiantEtudiant,  :mdpEtudiant, :nomEtudiant, :prenomEtudiant, :emailEtudiant, :telephoneEtudiant, :sexeEtudiant, :photoEtudiant, :dateNaissanceEtudiant, :idFormation)");
        $stmt->bindParam(':identifiantEtudiant', $identifiantEtudiant);
        $stmt->bindParam(':mdpEtudiant', $mdpEtudiant);
        $stmt->bindParam(':nomEtudiant', $nomEtudiant);
        $stmt->bindParam(':prenomEtudiant', $prenomEtudiant);
        $stmt->bindParam(':emailEtudiant', $emailEtudiant);
        $stmt->bindParam(':telephoneEtudiant', $telephoneEtudiant);
        $stmt->bindParam(':sexeEtudiant', $sexeEtudiant);
        $stmt->bindParam(':photoEtudiant', $photoEtudiant);
        $stmt->bindParam(':dateNaissanceEtudiant', $dateNaissanceEtudiant);
        $stmt->bindParam(':idFormation', $idFormation);
        $stmt->execute();
        $stmt->closeCursor();
        return new Etudiant($dbh->lastInsertId());
    }

    public function addPhotoEtudiant($photoEtudiant, $idEtudiant)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("UPDATE Etudiant SET photoEtudiant = :photoEtudiant WHERE idEtudiant = :idEtudiant");
        $stmt->bindParam(':photoEtudiant', $photoEtudiant);
        $stmt->bindParam(':idEtudiant', $idEtudiant);
        $stmt->execute();
        $stmt->closeCursor();
    }


    public static function getEtudiantsFormation($idFormation)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("select idEtudiant from Etudiant e where idFormation = :idFormation ORDER BY e.nomEtudiant");
        $stmt->bindParam(":idFormation", $idFormation, PDO::PARAM_INT);
        $stmt->execute();
        $etudiants = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $etudiants;
    }

    public static function getEtudiantsGroupe($idGroupe)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("select a.idEtudiant from Appartient a, Etudiant e where e.idEtudiant = a.idEtudiant and a.idGroupe = :idGroupe");
        $stmt->bindParam(":idGroupe", $idGroupe, PDO::PARAM_INT);
        $stmt->execute();
        $etudiants = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $etudiants;
    }


}