<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Classe Devoir ////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

clASs Devoir 
{

	private $idDevoir;
    private $libelleDevoir;
    private $dateLimiteDevoir;
    private $descriptionDevoir;
    private $dateLimiteCorrectionDevoir;
    private $individuelDevoir;
    private $idMatiere;
    private $idEnseignant;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Constructeur /////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function __construct($idDevoir)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT * FROM Devoir WHERE idDevoir = :idDevoir;");
        $stmt->bindParam(":idDevoir", $idDevoir, PDO::PARAM_INT);
        $stmt->execute();
        $devoir = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $this->idDevoir = $idDevoir;
        $this->libelleDevoir = $devoir["libelleDevoir"];
        $this->dateLimiteDevoir = $devoir["dateLimiteDevoir"];
        $this->descriptionDevoir = $devoir["descriptionDevoir"];
        $this->dateLimiteCorrectionDevoir = $devoir["dateLimiteCorrectionDevoir"];
        $this->individuelDevoir = $devoir["individuelDevoir"];
        $this->idMatiere = $devoir["idMatiere"];
        $this->idEnseignant = $devoir["idEnseignant"];
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Getter et Setter /////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Gets the value of idDevoir.
     *
     * @return mixed
     */
    public function getIdDevoir()
    {
        return $this->idDevoir;
    }

    /**
     * Gets the value of libelleDevoir.
     *
     * @return mixed
     */
    public function getLibelleDevoir()
    {
        return $this->libelleDevoir;
    }

    /**
     * Sets the value of libelleDevoir.
     *
     * @param mixed $libelleDevoir the libelle devoir
     *
     * @return self
     */
    private function setLibelleDevoir($libelleDevoir)
    {
        $this->libelleDevoir = $libelleDevoir;

        return $this;
    }

    /**
     * Gets the value of dateLimiteDevoir.
     *
     * @return mixed
     */
    public function getDateLimiteDevoir()
    {
        return $this->dateLimiteDevoir;
    }

    /**
     * Sets the value of dateLimiteDevoir.
     *
     * @param mixed $dateLimiteDevoir the date limite devoir
     *
     * @return self
     */
    private function setDateLimiteDevoir($dateLimiteDevoir)
    {
        $this->dateLimiteDevoir = $dateLimiteDevoir;

        return $this;
    }

    /**
     * Gets the value of descriptionDevoir.
     *
     * @return mixed
     */
    public function getDescriptionDevoir()
    {
        return $this->descriptionDevoir;
    }

    /**
     * Sets the value of descriptionDevoir.
     *
     * @param mixed $descriptionDevoir the description devoir
     *
     * @return self
     */
    private function setDescriptionDevoir($descriptionDevoir)
    {
        $this->descriptionDevoir = $descriptionDevoir;

        return $this;
    }

    /**
     * Gets the value of dateLimiteCorrectionDevoir.
     *
     * @return mixed
     */
    public function getDateLimiteCorrectionDevoir()
    {
        return $this->dateLimiteCorrectionDevoir;
    }

    /**
     * Sets the value of dateLimiteCorrectionDevoir.
     *
     * @param mixed $dateLimiteCorrectionDevoir the date limite correction devoir
     *
     * @return self
     */
    private function setDateLimiteCorrectionDevoir($dateLimiteCorrectionDevoir)
    {
        $this->dateLimiteCorrectionDevoir = $dateLimiteCorrectionDevoir;

        return $this;
    }

    /**
     * Gets the value of individuelDevoir.
     *
     * @return mixed
     */
    public function getIndividuelDevoir()
    {
        return $this->individuelDevoir;
    }

    /**
     * Sets the value of individuelDevoir.
     *
     * @param mixed $individuelDevoir the id matiere
     *
     * @return self
     */
    private function setIndividuelDevoir($individuelDevoir)
    {
        $this->individuelDevoir = $individuelDevoir;

        return $this;
    }
    /**
     * Gets the value of idMatiere.
     *
     * @return mixed
     */
    public function getIdMatiere()
    {
        return $this->idMatiere;
    }

    /**
     * Sets the value of idMatiere.
     *
     * @param mixed $idMatiere the id matiere
     *
     * @return self
     */
    private function setIdMatiere($idMatiere)
    {
        $this->idMatiere = $idMatiere;

        return $this;
    }

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
     * Sets the value of idEnseignant.
     *
     * @param mixed $idEnseignant the id Enseignant
     *
     * @return self
     */
    private function setIdEnseignant($idEnseignant)
    {
        $this->idEnseignant = $idEnseignant;

        return $this;
    }



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Methodes /////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    public static function getDevoirsEtudiantMatiere($idEtudiant, $idMatiere)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT G.idDevoir FROM Devoir D, Appartient A, Groupe G WHERE D.idDevoir = G.idDevoir AND D.idMatiere = :idMatiere AND G.idGroupe = A.idGroupe AND A.idEtudiant = :idEtudiant;");
        $stmt->bindParam(":idMatiere", $idMatiere, PDO::PARAM_INT);
        $stmt->bindParam(":idEtudiant", $idEtudiant, PDO::PARAM_INT);
        $stmt->execute();
        $devoirs = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $devoirs;
    } 

    public static function getDevoirsEnseignant($idEnseignant)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT idDevoir AS devoir FROM Devoir WHERE idEnseignant = :idEnseignant;");
        $stmt->bindParam(":idEnseignant", $idEnseignant, PDO::PARAM_INT);
        $stmt->execute();
        $devoirs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $devoirs;
    }
	
	public static function getAllDevoir($idEtudiant)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT G.idDevoir FROM Devoir D, Appartient A, Groupe G WHERE D.idDevoir = G.idDevoir AND G.idGroupe = A.idGroupe AND A.idEtudiant = :idEtudiant;");
        $stmt->bindParam(":idEtudiant", $idEtudiant, PDO::PARAM_INT);
        $stmt->execute();
        $devoirs = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $devoirs;
    }

    public static function getDevoirsMatiere($idMatiere)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT idDevoir AS devoir FROM Devoir WHERE idMatiere = :idMatiere;");
        $stmt->bindParam(":idMatiere", $idMatiere, PDO::PARAM_INT);
        $stmt->execute();
        $devoirs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $devoirs;
    }


    public static function createDevoir($libelleDevoir, $dateLimiteDevoir = null, $descriptionDevoir = null, $dateLimiteCorrectionDevoir = null, $individuelDevoir = true, $idMatiere, $idEnseignant)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("INSERT INTO Devoir (libelleDevoir, dateLimiteDevoir, descriptionDevoir, dateLimiteCorrectionDevoir, individuelDevoir, idMatiere, idEnseignant) VALUES (:libelleDevoir, :dateLimiteDevoir, :descriptionDevoir, :dateLimiteCorrectionDevoir, :individuelDevoir, :idMatiere, :idEnseignant)");
        $stmt->bindParam(':libelleDevoir', $libelleDevoir);
        $stmt->bindParam(':dateLimiteDevoir', $dateLimiteDevoir);
        $stmt->bindParam(':descriptionDevoir', $descriptionDevoir);
        $stmt->bindParam(':dateLimiteCorrectionDevoir', $dateLimiteCorrectionDevoir);
        $stmt->bindParam(':individuelDevoir', $individuelDevoir);
        $stmt->bindParam(':idMatiere', $idMatiere);
        $stmt->bindParam(':idEnseignant', $idEnseignant);
        $stmt->execute();
        $stmt->closeCursor();
        return new Devoir($dbh->lastInsertId());
    }



}