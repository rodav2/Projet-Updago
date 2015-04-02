<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Classe Enseignant ////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class Enseignant
{

	private $idEnseignant;
    private $identifiantEnseignant;
    private $mdpEnseignant;
    private $nomEnseignant;
    private $prenomEnseignant;
    private $emailEnseignant;
    private $telephoneEnseignant;
    private $sexeEnseignant;
    private $photoEnseignant;
    private $dateNaissanceEnseignant;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Constructeur /////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function __construct($idEnseignant)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("select * from Enseignant where idEnseignant = :idEnseignant;");
        $stmt->bindParam(":idEnseignant", $idEnseignant, PDO::PARAM_INT);
        $stmt->execute();
        $enseignant = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $this->idEnseignant = $idEnseignant;
        $this->identifiantEnseignant = $enseignant['identifiantEnseignant'];
        $this->mdpEnseignant = $enseignant['mdpEnseignant'];
        $this->nomEnseignant = $enseignant['nomEnseignant'];
        $this->prenomEnseignant = $enseignant['prenomEnseignant'];
        $this->emailEnseignant = $enseignant['emailEnseignant'];
        $this->telephoneEnseignant = $enseignant['telephoneEnseignant'];
        $this->sexeEnseignant = $enseignant['sexeEnseignant'];
        $this->photoEnseignant = $enseignant['photoEnseignant'];
        $this->dateNaissanceEnseignant = $enseignant['dateNaissanceEnseignant'];

    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Getter et Setter /////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Gets the value of idEnseignant.
     *
     * @return mixed
     */
    public function getIdEnseignant()
    {
        return $this->idEnseignant;
    }

    /**
     * Gets the value of identifiantEnseignant.
     *
     * @return mixed
     */
    public function getIdentifiantEnseignant()
    {
        return $this->identifiantEnseignant;
    }

    /**
     * Sets the value of identifiantEnseignant.
     *
     * @param mixed $identifiantEnseignant the identifiant enseignant
     *
     * @return self
     */
    private function setIdentifiantEnseignant($identifiantEnseignant)
    {
        $this->identifiantEnseignant = $identifiantEnseignant;

        return $this;
    }

    /**
     * Gets the value of mdpEnseignant.
     *
     * @return mixed
     */
    public function getMdpEnseignant()
    {
        return $this->mdpEnseignant;
    }

    /**
     * Sets the value of mdpEnseignant.
     *
     * @param mixed $mdpEnseignant the mdp enseignant
     *
     * @return self
     */
    private function setMdpEnseignant($mdpEnseignant)
    {
        $this->mdpEnseignant = $mdpEnseignant;

        return $this;
    }

    /**
     * Gets the value of nomEnseignant.
     *
     * @return mixed
     */
    public function getNomEnseignant()
    {
        return $this->nomEnseignant;
    }

    /**
     * Sets the value of nomEnseignant.
     *
     * @param mixed $nomEnseignant the nom enseignant
     *
     * @return self
     */
    private function setNomEnseignant($nomEnseignant)
    {
        $this->nomEnseignant = $nomEnseignant;

        return $this;
    }

    /**
     * Gets the value of prenomEnseignant.
     *
     * @return mixed
     */
    public function getPrenomEnseignant()
    {
        return $this->prenomEnseignant;
    }

    /**
     * Sets the value of prenomEnseignant.
     *
     * @param mixed $prenomEnseignant the prenom enseignant
     *
     * @return self
     */
    private function setPrenomEnseignant($prenomEnseignant)
    {
        $this->prenomEnseignant = $prenomEnseignant;

        return $this;
    }

    /**
     * Gets the value of emailEnseignant.
     *
     * @return mixed
     */
    public function getEmailEnseignant()
    {
        return $this->emailEnseignant;
    }

    /**
     * Sets the value of emailEnseignant.
     *
     * @param mixed $emailEnseignant the email enseignant
     *
     * @return self
     */
    private function setEmailEnseignant($emailEnseignant)
    {
        $this->emailEnseignant = $emailEnseignant;

        return $this;
    }

    /**
     * Gets the value of telephoneEnseignant.
     *
     * @return mixed
     */
    public function getTelephoneEnseignant()
    {
        return $this->telephoneEnseignant;
    }

    /**
     * Sets the value of telephoneEnseignant.
     *
     * @param mixed $telephoneEnseignant the telephone enseignant
     *
     * @return self
     */
    private function setTelephoneEnseignant($telephoneEnseignant)
    {
        $this->telephoneEnseignant = $telephoneEnseignant;

        return $this;
    }

    /**
     * Gets the value of sexeEnseignant.
     *
     * @return mixed
     */
    public function getSexeEnseignant()
    {
        return $this->sexeEnseignant;
    }

    /**
     * Sets the value of sexeEnseignant.
     *
     * @param mixed $sexeEnseignant the sexe enseignant
     *
     * @return self
     */
    private function setSexeEnseignant($sexeEnseignant)
    {
        $this->sexeEnseignant = $sexeEnseignant;

        return $this;
    }

    /**
     * Gets the value of photoEnseignant.
     *
     * @return mixed
     */
    public function getPhotoEnseignant()
    {
        return $this->photoEnseignant;
    }

    /**
     * Sets the value of photoEnseignant.
     *
     * @param mixed $photoEnseignant the photo enseignant
     *
     * @return self
     */
    private function setPhotoEnseignant($photoEnseignant)
    {
        $this->photoEnseignant = $photoEnseignant;

        return $this;
    }

    /**
     * Gets the value of dateNaissanceEnseignant.
     *
     * @return mixed
     */
    public function getDateNaissanceEnseignant()
    {
        return $this->dateNaissanceEnseignant;
    }

    /**
     * Sets the value of dateNaissanceEnseignant.
     *
     * @param mixed $dateNaissanceEnseignant the date naissance enseignant
     *
     * @return self
     */
    private function setDateNaissanceEnseignant($dateNaissanceEnseignant)
    {
        $this->dateNaissanceEnseignant = $dateNaissanceEnseignant;

        return $this;
    }

    /**
     * Gets the value of responsableEnseignant.
     *
     * @return mixed
     */
    public function getResponsableEnseignant()
    {
        return $this->responsableEnseignant;
    }

    /**
     * Sets the value of responsableEnseignant.
     *
     * @param mixed $responsableEnseignant the responsable enseignant
     *
     * @return self
     */
    private function setResponsableEnseignant($responsableEnseignant)
    {
        $this->responsableEnseignant = $responsableEnseignant;

        return $this;
    }


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Methodes /////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public static function createEnseignant($identifiantEnseignant, $mdpEnseignant, $nomEnseignant, $prenomEnseignant, $emailEnseignant, $telephoneEnseignant = null, $sexeEnseignant = null, $photoEnseignant = null, $dateNaissanceEnseignant = null)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("INSERT INTO Enseignant (identifiantEnseignant,  mdpEnseignant, nomEnseignant, prenomEnseignant, emailEnseignant, telephoneEnseignant, sexeEnseignant, photoEnseignant, dateNaissanceEnseignant) VALUES (:identifiantEnseignant,  :mdpEnseignant, :nomEnseignant, :prenomEnseignant, :emailEnseignant, :telephoneEnseignant, :sexeEnseignant, :photoEnseignant, :dateNaissanceEnseignant)");
        $stmt->bindParam(':identifiantEnseignant', $identifiantEnseignant);
        $stmt->bindParam(':mdpEnseignant', $mdpEnseignant);
        $stmt->bindParam(':nomEnseignant', $nomEnseignant);
        $stmt->bindParam(':prenomEnseignant', $prenomEnseignant);
        $stmt->bindParam(':emailEnseignant', $emailEnseignant);
        $stmt->bindParam(':telephoneEnseignant', $telephoneEnseignant);
        $stmt->bindParam(':sexeEnseignant', $sexeEnseignant);
        $stmt->bindParam(':photoEnseignant', $photoEnseignant);
        $stmt->bindParam(':dateNaissanceEnseignant', $dateNaissanceEnseignant);
        $stmt->execute();
        $stmt->closeCursor();
        return new Enseignant($dbh->lastInsertId());
    }

    public function addPhotoEnseignant($photoEnseignant, $idEnseignant)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("UPDATE Enseignant SET photoEnseignant = :photoEnseignant WHERE idEnseignant = :idEnseignant");
        $stmt->bindParam(':photoEnseignant', $photoEnseignant);
        $stmt->bindParam(':idEnseignant', $idEnseignant);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public static function getEnseignantsMatiere($idMatiere)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("select idEnseignant from Enseigne where idMatiere = :idMatiere;");
        $stmt->bindParam(":idMatiere", $idMatiere, PDO::PARAM_INT);
        $stmt->execute();
        $enseignants = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $enseignants;
    }

    public function getEnseignantsDevoir($idDevoir)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("select idEnseignant from CreerDevoir where idDevoir = :idDevoir;");
        $stmt->bindParam(":idDevoir", $idDevoir, PDO::PARAM_INT);
        $stmt->execute();
        $enseignants = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $enseignants;  
    }

    public function getEnseignantResponsableDevoir($idDevoir)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT idEnseignant FROM Devoir WHERE idDevoir = :idDevoir;");
        $stmt->bindParam(":idDevoir", $idDevoir, PDO::PARAM_INT);
        $stmt->execute();
        $enseignantResponsable = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $enseignantResponsable;  
    }


}