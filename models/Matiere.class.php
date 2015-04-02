<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Classe Administrateur ////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class Matiere 
{

	private $idMatiere;
	private $libelleMatiere;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Constructeur /////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function __construct($idMatiere)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("select * from Matiere where idMatiere = :idMatiere;");
        $stmt->bindParam(":idMatiere", $idMatiere, PDO::PARAM_INT);
        $stmt->execute();
        $matiere = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $this->idMatiere = $idMatiere;
        $this->libelleMatiere = $matiere['libelleMatiere'];
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Getter et Setter /////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
     * Gets the value of libelleMatiere.
     *
     * @return mixed
     */
    public function getLibelleMatiere()
    {
        return $this->libelleMatiere;
    }

    /**
     * Sets the value of libelleMatiere.
     *
     * @param mixed $libelleMatiere the libelle matiere
     *
     * @return self
     */
    private function setLibelleMatiere($libelleMatiere)
    {
        $this->libelleMatiere = $libelleMatiere;

        return $this;
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Methodes /////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public static function createMatiere($libelleMatiere)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("INSERT INTO Matiere (libelleMatiere) VALUES (:libelleMatiere)");
        $stmt->bindParam(':libelleMatiere', $libelleMatiere);
        $stmt->execute();
        $stmt->closeCursor();
        return new Matiere($dbh->lastInsertId());
    }


    public static function getMatieres()
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("select idMatiere from Matiere");
        $stmt->execute();
        $matieres = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $matieres;
    }   

    public static function getMatieresEtudiant($idEtudiant)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("select p.idMatiere from Possede p, Etudiant e where p.idFormation = e.idFormation and e.idEtudiant = :idEtudiant");
        $stmt->bindParam(":idEtudiant", $idEtudiant, PDO::PARAM_INT);
        $stmt->execute();
        $matieres = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $matieres;
    }

    public static function getMatieresEnseignant($idEnseignant)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("select idMatiere from Enseigne where idEnseignant = :idEnseignant;");
        $stmt->bindParam(":idEnseignant", $idEnseignant, PDO::PARAM_INT);
        $stmt->execute();
        $matieres = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $matieres;
    }

    public static function getMatieresFormation($idFormation)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("select idMatiere from Possede where idFormation = :idFormation;");
        $stmt->bindParam(":idFormation", $idFormation, PDO::PARAM_INT);
        $stmt->execute();
        $matieres = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $matieres;
    }
}