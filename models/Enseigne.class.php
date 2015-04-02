<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Classe Enseigne //////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

abstract class Enseigne
{
	private $idEnseignant;
	private $idMatiere;

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


    
    public static function addMatieresEnseignant($idMatieres, $idEnseignant)
    {
            
        $dbh = SPDO::getInstance();
        foreach($idMatieres as $idMatiere)
        {
            $stmt = $dbh->prepare("INSERT INTO Enseigne (idEnseignant,  idMatiere) VALUES (:idEnseignant,  :idMatiere)");
            $stmt->bindParam(':idEnseignant', $idEnseignant);
            $stmt->bindParam(':idMatiere', $idMatiere);
            $stmt->execute();
            $stmt->closeCursor();
        }
    }

    public static function addEnseignantsMatiere($idEnseignants, $idMatiere)
    {
            
        $dbh = SPDO::getInstance();
        foreach($idEnseignants as $idEnseignant)
        {
            $stmt = $dbh->prepare("INSERT INTO Enseigne (idMatiere,  idEnseignant) VALUES (:idMatiere,  :idEnseignant)");
            $stmt->bindParam(':idMatiere', $idMatiere);
            $stmt->bindParam(':idEnseignant', $idEnseignant);
            $stmt->execute();
            $stmt->closeCursor();
        }
    }


}