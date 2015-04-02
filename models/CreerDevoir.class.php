<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Classe CreerDevoir ///////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

abstract class CreerDevoir
{
	private $idEnseignant;
	private $idDevoir;

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
     * @param mixed $idEnseignant the id enseignant
     *
     * @return self
     */
    private function setIdEnseignant($idEnseignant)
    {
        $this->idEnseignant = $idEnseignant;

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
     * @param mixed $idDevoir the id devoir
     *
     * @return self
     */
    private function setIdDevoir($idDevoir)
    {
        $this->idDevoir = $idDevoir;

        return $this;
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Methodes /////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public static function addEnseignantsDevoir($idEnseignants, $idDevoir)
    {
        try
        {   
            $dbh = SPDO::getInstance();
            foreach($idEnseignants as $idEnseignant)
            {
                $stmt = $dbh->prepare("INSERT INTO CreerDevoir (idDevoir,  idEnseignant) VALUES (:idDevoir,  :idEnseignant)");
                $stmt->bindParam(':idDevoir', $idDevoir);
                $stmt->bindParam(':idEnseignant', $idEnseignant);
                $stmt->execute();
                $stmt->closeCursor();
                $res = true;
            }
        }catch(PDOException $e)
        {
            $res = false;
        }
        return $res; 
    }

}