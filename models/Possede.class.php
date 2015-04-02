<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Classe Possede ///////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

abstract class Possede
{
	private $idFormation;
	private $idMatiere;

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


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Methodes /////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public static function addFormationsMatiere($idFormations, $idMatiere)
    {
            
        $dbh = SPDO::getInstance();
        foreach($idFormations as $idFormation)
        {
            $stmt = $dbh->prepare("INSERT INTO Possede (idMatiere,  idFormation) VALUES (:idMatiere,  :idFormation)");
            $stmt->bindParam(':idMatiere', $idMatiere);
            $stmt->bindParam(':idFormation', $idFormation);
            $stmt->execute();
            $stmt->closeCursor();
        }
    }


    public static function addMatieresFormation($idMatieres, $idFormation)
    {
            
        $dbh = SPDO::getInstance();
        foreach($idMatieres as $idMatiere)
        {
            $stmt = $dbh->prepare("INSERT INTO Possede (idFormation, idMatiere) VALUES (:idFormation,  :idMatiere)");
            $stmt->bindParam(':idFormation', $idFormation);
            $stmt->bindParam(':idMatiere', $idMatiere);
            $stmt->execute();
            $stmt->closeCursor();
        }
    }



}