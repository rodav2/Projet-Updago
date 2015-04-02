<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Classe Administrateur ////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class Administrateur
{
    private $idAdministrateur;
    private $identifiantAdministrateur;
    private $mdpAdministrateur;
    private $nomAdministrateur;
    private $prenomAdministrateur;
    private $emailAdministrateur;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Constructeur /////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function __construct($idAdministrateur)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("select * from Administrateur where idAdministrateur = :idAdministrateur;");
        $stmt->bindParam(":idAdministrateur", $idAdministrateur, PDO::PARAM_INT);
        $stmt->execute();
        $administrateur = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $this->idAdministrateur = $idAdministrateur;
        $this->identifiantAdministrateur = $administrateur['identifiantAdministrateur'];
        $this->mdpAdministrateur = $administrateur['mdpAdministrateur'];
        $this->nomAdministrateur = $administrateur['nomAdministrateur'];
        $this->prenomAdministrateur = $administrateur['prenomAdministrateur'];
        $this->emailAdministrateur = $administrateur['emailAdministrateur'];
    }


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Getter et Setter /////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Gets the value of idAdministrateur.
     *
     * @return mixed
     */
    public function getIdAdministrateur()
    {
        return $this->idAdministrateur;
    }

    /**
     * Gets the value of identifiantAdministrateur.
     *
     * @return mixed
     */
    public function getIdentifiantAdministrateur()
    {
        return $this->identifiantAdministrateur;
    }

    /**
     * Sets the value of identifiantAdministrateur.
     *
     * @param mixed $identifiantAdministrateur the identifiant administrateur
     *
     * @return self
     */
    private function setIdentifiantAdministrateur($identifiantAdministrateur)
    {
        $this->identifiantAdministrateur = $identifiantAdministrateur;

        return $this;
    }

    /**
     * Gets the value of mdpAdministrateur.
     *
     * @return mixed
     */
    public function getMdpAdministrateur()
    {
        return $this->mdpAdministrateur;
    }

    /**
     * Sets the value of mdpAdministrateur.
     *
     * @param mixed $mdpAdministrateur the mdp administrateur
     *
     * @return self
     */
    private function setMdpAdministrateur($mdpAdministrateur)
    {
        $this->mdpAdministrateur = $mdpAdministrateur;

        return $this;
    }

    /**
     * Gets the value of nomAdministrateur.
     *
     * @return mixed
     */
    public function getNomAdministrateur()
    {
        return $this->nomAdministrateur;
    }

    /**
     * Sets the value of nomAdministrateur.
     *
     * @param mixed $nomAdministrateur the nom administrateur
     *
     * @return self
     */
    private function setNomAdministrateur($nomAdministrateur)
    {
        $this->nomAdministrateur = $nomAdministrateur;

        return $this;
    }

    /**
     * Gets the value of prenomAdministrateur.
     *
     * @return mixed
     */
    public function getPrenomAdministrateur()
    {
        return $this->prenomAdministrateur;
    }

    /**
     * Sets the value of prenomAdministrateur.
     *
     * @param mixed $prenomAdministrateur the prenom administrateur
     *
     * @return self
     */
    private function setPrenomAdministrateur($prenomAdministrateur)
    {
        $this->prenomAdministrateur = $prenomAdministrateur;

        return $this;
    }

    /**
     * Gets the value of emailAdministrateur.
     *
     * @return mixed
     */
    public function getEmailAdministrateur()
    {
        return $this->emailAdministrateur;
    }

    /**
     * Sets the value of emailAdministrateur.
     *
     * @param mixed $emailAdministrateur the email administrateur
     *
     * @return self
     */
    private function setEmailAdministrateur($emailAdministrateur)
    {
        $this->emailAdministrateur = $emailAdministrateur;

        return $this;
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Methodes /////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public static function createAdministrateur($identifiantAdministrateur, $mdpAdministrateur, $nomAdministrateur, $prenomAdministrateur, $emailAdministrateur)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("INSERT INTO Administrateur (identifiantAdministrateur,  mdpAdministrateur, nomAdministrateur, prenomAdministrateur, emailAdministrateur) VALUES (:identifiantAdministrateur,  :mdpAdministrateur, :nomAdministrateur, :prenomAdministrateur, :emailAdministrateur)");
        $stmt->bindParam(':identifiantAdministrateur', $identifiantAdministrateur);
        $stmt->bindParam(':mdpAdministrateur', $mdpAdministrateur);
        $stmt->bindParam(':nomAdministrateur', $nomAdministrateur);
        $stmt->bindParam(':prenomAdministrateur', $prenomAdministrateur);
        $stmt->bindParam(':emailAdministrateur', $emailAdministrateur);
        $stmt->execute();
        $stmt->closeCursor();
        return new Administrateur($dbh->lastInsertId());
    }

}