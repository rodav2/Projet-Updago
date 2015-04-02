<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Classe Groupe ////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class Groupe
{
	
    private $idGroupe;
    private $libelleGroupe;
    private $commentaireGroupe;
    private $idEtudiantResponsable;
    private $idDevoir;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Constructeur /////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function __construct($idGroupe)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("select * from Groupe where idGroupe = :idGroupe;");
        $stmt->bindParam(":idGroupe", $idGroupe, PDO::PARAM_INT);
        $stmt->execute();
        $groupe = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $this->idGroupe = $idGroupe;
        $this->libelleGroupe = $groupe['libelleGroupe'];
        $this->commentaireGroupe = $groupe['commentaireGroupe'];
        $this->idEtudiantResponsable = $groupe['idEtudiantResponsable'];
        $this->idDevoir = $groupe['idDevoir'];
    }


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Getter et Setter /////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Gets the value of idGroupe.
     *
     * @return mixed
     */
    public function getIdGroupe()
    {
        return $this->idGroupe;
    }


    /**
     * Gets the value of libelleGroupe.
     *
     * @return mixed
     */
    public function getLibelleGroupe()
    {
        return $this->libelleGroupe;
    }

    /**
     * Sets the value of libelleGroupe.
     *
     * @param mixed $libelleGroupe the libelle groupe
     *
     * @return self
     */
    private function setLibelleGroupe($libelleGroupe)
    {
        $this->libelleGroupe = $libelleGroupe;

        return $this;
    }

    /**
     * Gets the value of commentaireGroupe.
     *
     * @return mixed
     */
    public function getCommentaireGroupe()
    {
        return $this->commentaireGroupe;
    }

    /**
     * Sets the value of CommentaireGroupe.
     *
     * @param mixed $CommentaireGroupe the Commentaire groupe
     *
     * @return self
     */
    private function setCommentaireGroupe($commentaireGroupe)
    {
        $this->commentaireGroupe = $commentaireGroupe;

        return $this;
    }

    /**
     * Gets the value of idEtudiantResponsable.
     *
     * @return mixed
     */
    public function getIdEtudiantResponsable()
    {
        return $this->idEtudiantResponsable;
    }

    /**
     * Sets the value of idEtudiantResponsable.
     *
     * @param mixed $idEtudiantResponsable the chef projet groupe
     *
     * @return self
     */
    private function setIdEtudiantResponsable($idEtudiantResponsable)
    {
        $this->idEtudiantResponsable = $idEtudiantResponsable;

        return $this;
    }

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
     * Sets the value of idDevoir.
     *
     * @param mixed $idDevoir the chef projet groupe
     *
     * @return self
     */
    private function setIdDevoir($idDevoir)
    {
        $this->idDevoir = $idDevoir;

        return $this;
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Methodes /////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public static function createGroupe($libelleGroupe, $commentaireGroupe, $idEtudiantResponsable, $idDevoir)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("INSERT INTO Groupe (libelleGroupe, commentaireGroupe, idEtudiantResponsable, idDevoir) VALUES (:libelleGroupe, :commentaireGroupe, :idEtudiantResponsable, :idDevoir)");
        $stmt->bindParam(':libelleGroupe', $libelleGroupe);
        $stmt->bindParam(':commentaireGroupe', $commentaireGroupe);
        $stmt->bindParam(':idEtudiantResponsable', $idEtudiantResponsable);
        $stmt->bindParam(':idDevoir', $idDevoir);
        $stmt->execute();
        $stmt->closeCursor();
        return new Groupe($dbh->lastInsertId());
    }

    public static function getGroupesEtudiantResponsable($idEtudiantResponsable)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT idGroupe FROM Groupe WHERE idEtudiantResponsable = :idEtudiantResponsable");
        $stmt->bindParam(":idEtudiantResponsable", $idEtudiantResponsable, PDO::PARAM_INT);
        $stmt->execute();
        $formations = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $formations;        
    }

    public static function getGroupesDevoir($idDevoir)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT idGroupe FROM Groupe WHERE idDevoir = :idDevoir");
        $stmt->bindParam(":idDevoir", $idDevoir, PDO::PARAM_INT);
        $stmt->execute();
        $formations = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $formations;
    }
	
	public static function getCommentaireDevoir($idDevoir)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT commentaireGroupe FROM Groupe WHERE idDevoir = :idDevoir");
        $stmt->bindParam(":idDevoir", $idDevoir, PDO::PARAM_INT);
        $stmt->execute();
        $commentaire = $stmt->fetch();
        $stmt->closeCursor();
        return $commentaire;
    }


    public static function addCommentaireGroupe($commentaireGroupe, $idGroupe)
    {
        try
        {
            $dbh = SPDO::getInstance();
            $stmt = $dbh->prepare("UPDATE Groupe SET commentaireGroupe = :commentaireGroupe WHERE idGroupe = :idGroupe");
            $stmt->bindParam(':commentaireGroupe', $commentaireGroupe);
            $stmt->bindParam(':idGroupe', $idGroupe);
            $stmt->execute();
            $stmt->closeCursor();
            return true;
        } 
        catch(Exception $e)
        {
            echo "Erreur addCommentaireGroupe : " . $e->getMessage();
            return false;
        }
    } 


}