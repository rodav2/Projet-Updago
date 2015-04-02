<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Classe Administrateur ////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

abstract class LivrableRendu 
{

    private $dateSoumissionLivrableRendu;
    private $fichierLivrableRendu;
    private $idGroupe;
    private $idLivrableAttendu;


///////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Getter et Setter /////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Gets the value of fichierLivrableRendu.
     *
     * @return mixed
     */
    public function getFichierLivrableRendu()
    {
        return $this->fichierLivrableRendu;
    }

    /**
     * Sets the value of fichierLivrableRendu.
     *
     * @param mixed $fichierLivrableRendu the fichier livrable rendu
     *
     * @return self
     */
    private function setFichierLivrableRendu($fichierLivrableRendu)
    {
        $this->fichierLivrableRendu = $fichierLivrableRendu;

        return $this;
    }

    /**
     * Gets the value of dateSoumissionLivrableRendu.
     *
     * @return mixed
     */
    public function getDateSoumissionLivrableRendu()
    {
        return $this->dateSoumissionLivrableRendu;
    }

    /**
     * Sets the value of dateSoumissionLivrableRendu.
     *
     * @param mixed $dateSoumissionLivrableRendu the date soumission livrable rendu
     *
     * @return self
     */
    private function setDateSoumissionLivrableRendu($dateSoumissionLivrableRendu)
    {
        $this->dateSoumissionLivrableRendu = $dateSoumissionLivrableRendu;

        return $this;
    }

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
     * Sets the value of idGroupe.
     *
     * @param mixed $idGroupe the id groupe
     *
     * @return self
     */
    private function setIdGroupe($idGroupe)
    {
        $this->idGroupe = $idGroupe;

        return $this;
    }

    /**
     * Gets the value of idLivrableAttendu.
     *
     * @return mixed
     */
    public function getIdLivrableAttendu()
    {
        return $this->idLivrableAttendu;
    }

    /**
     * Sets the value of idLivrableAttendu.
     *
     * @param mixed $idLivrableAttendu the id livrable attendu
     *
     * @return self
     */
    private function setIdLivrableAttendu($idLivrableAttendu)
    {
        $this->idLivrableAttendu = $idLivrableAttendu;

        return $this;
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Methodes /////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public static function createLivrableRendu($dateSoumissionLivrableRendu, $fichierLivrableRendu, $idGroupe, $idLivrableAttendu)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("INSERT INTO LivrableRendu (dateSoumissionLivrableRendu,  fichierLivrableRendu, idGroupe, idLivrableAttendu) VALUES (:dateSoumissionLivrableRendu,  :fichierLivrableRendu, :idGroupe, :idLivrableAttendu)");
        $stmt->bindParam(':dateSoumissionLivrableRendu', $dateSoumissionLivrableRendu);
        $stmt->bindParam(':fichierLivrableRendu', $fichierLivrableRendu);
        $stmt->bindParam(':idGroupe', $idGroupe);
        $stmt->bindParam(':idLivrableAttendu', $idLivrableAttendu);
        $stmt->execute();
        $stmt->closeCursor();
        return new LivrableRendu($dbh->lastInsertId());
    }

    public static function getLivrableRenduLivrableAttenduGroupe($idLivrableAttendu, $idGroupe)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT LR.* FROM LivrableRendu WHERE idLivrableAttendu = :idLivrableAttendu AND idGroupe = :idGroupe");
        $stmt->bindParam(':idLivrableAttendu', $idLivrableAttendu, PDO::PARAM_INT);
        $stmt->bindParam(':idGroupe', $idGroupe, PDO::PARAM_INT);
        $stmt->execute();
        $livrableRendu = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $livrableRendu;
    }

    public static function getLivrableRenduLivrableAttenduEtudiant($idLivrableAttendu, $idEtudiant)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT LR.* FROM LivrableRendu LR, Appartient A WHERE A.idGroupe = LR.idGroupe AND LR.idLivrableAttendu = :idLivrableAttendu AND A.idEtudiant = :idEtudiant");
        $stmt->bindParam(':idLivrableAttendu', $idLivrableAttendu, PDO::PARAM_INT);
        $stmt->bindParam(':idEtudiant', $idEtudiant, PDO::PARAM_INT);
        $stmt->execute();
        $livrableRendu = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $livrableRendu;        
    }

    public static function getLivrableRenduGroupe($idGroupe)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT * FROM LivrableRendu WHERE idGroupe = :idGroupe");
        $stmt->bindParam(':idGroupe', $idGroupe, PDO::PARAM_INT);
        $stmt->execute();
        $livrableRendu = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $livrableRendu;      
    }


}