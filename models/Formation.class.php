<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Classe Formation /////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class Formation 
{

	private $idFormation;
	private $libelleFormation;
	private $anneeFormation;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Constructeur /////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function __construct($idFormation)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT * FROM Formation WHERE idFormation = :idFormation;");
        $stmt->bindParam(":idFormation", $idFormation, PDO::PARAM_INT);
        $stmt->execute();
        $formation = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $this->idFormation = $idFormation;
        $this->libelleFormation = $formation['libelleFormation'] ;
        $this->anneeFormation = $formation['anneeFormation'] ;
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Getter et Setter /////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
     * Gets the value of libelleFormation.
     *
     * @return mixed
     */
    public function getLibelleFormation()
    {
        return $this->libelleFormation;
    }

    /**
     * Sets the value of libelleFormation.
     *
     * @param mixed $libelleFormation the libelle formation
     *
     * @return self
     */
    private function setLibelleFormation($libelleFormation)
    {
        $this->libelleFormation = $libelleFormation;

        return $this;
    }

    /**
     * Gets the value of anneeFormation.
     *
     * @return mixed
     */
    public function getAnneeFormation()
    {
        return $this->anneeFormation;
    }

    /**
     * Sets the value of anneeFormation.
     *
     * @param mixed $anneeFormation the annee formation
     *
     * @return self
     */
    private function setAnneeFormation($anneeFormation)
    {
        $this->anneeFormation = $anneeFormation;

        return $this;
    }
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Methodes /////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    

    public static function createFormation($libelleFormation, $anneeFormation=null)
    {

    	if(!isset($anneeFormation))
    	{
        	$anneeFormation = date("Y")-1;
    	}
    	
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("INSERT INTO Formation (libelleFormation,  anneeFormation) VALUES (:libelleFormation,  :anneeFormation)");
        $stmt->bindParam(':libelleFormation', $libelleFormation);
        $stmt->bindParam(':anneeFormation', $anneeFormation);
        $stmt->execute();
        $stmt->closeCursor();
        return new Formation($dbh->lastInsertId());
    }


    public static function getFormationsMatiere($idMatiere)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT p.idFormation FROM Possede p, Matiere m WHERE p.idMatiere = m.idMatiere AND m.idMatiere = :idMatiere");
        $stmt->bindParam(':idMatiere', $idMatiere, PDO::PARAM_INT);
        $stmt->execute();
        $formations = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $formations;
    }

    
    public static function getFormationsEtudiant($idEtudiant)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT p.idFormation FROM Possede p, Etudiant e WHERE p.idFormation = e.idFormation AND e.idEtudiant = :idEtudiant");
        $stmt->bindParam(":idEtudiant", $idEtudiant, PDO::PARAM_INT);
        $stmt->execute();
        $matieres = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $matieres;
    }


    public static function getFormations()
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT idFormation FROM Formation");
        $stmt->execute();
        $formations = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $formations;
    }  

    public static function getDernieresFormations()
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT idFormation FROM Formation WHERE anneeFormation >= YEAR(CURDATE())-1 ORDER BY libelleFormation, anneeFormation");
        $stmt->execute();
        $formations = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $formations;
    }  

    public static function getFormationsAnnee($annee)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT idFormation FROM Formation WHERE anneeFormation = :annee");
        $stmt->bindParam(":annee", $annee, PDO::PARAM_INT);
        $stmt->execute();
        $formations = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $formations;        
    } 

    public static function getFormationsLibelle($libelle)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT idFormation FROM Formation WHERE libelleFormation LIKE '%:libelle%'");
        $stmt->bindParam(":libelle", $libelle, PDO::PARAM_INT);
        $stmt->execute();
        $formations = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $formations;        
    } 

    
}