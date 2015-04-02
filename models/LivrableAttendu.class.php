<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Classe LivrableAttendu ///////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class LivrableAttendu 
{

	private $idLivrableAttendu;
    private $libelleLivrableAttendu;
    private $dateLimiteLivrableAttendu;
    private $retardAutoriseLivrableAttendu;
    private $idDevoir;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Constructeur /////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function __construct($idLivrableAttendu)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("select * from LivrableAttendu where idLivrableAttendu = :idLivrableAttendu;");
        $stmt->bindParam(":idLivrableAttendu", $idLivrableAttendu, PDO::PARAM_INT);
        $stmt->execute();
        $livrableAttendu = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $this->idLivrableAttendu = $idLivrableAttendu;
        $this->libelleLivrableAttendu = $livrableAttendu['libelleLivrableAttendu'];
        $this->dateLimiteLivrableAttendu = $livrableAttendu['dateLimiteLivrableAttendu'];
        $this->retardAutoriseLivrableAttendu = $livrableAttendu['retardAutoriseLivrableAttendu'];
        $this->idDevoir = $livrableAttendu['idDevoir'];
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Getter et Setter /////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
     * Gets the value of dateLimiteLivrableAttendu.
     *
     * @return mixed
     */
    public function getDateLimiteLivrableAttendu()
    {
        return $this->dateLimiteLivrableAttendu;
    }

    /**
     * Sets the value of dateLimiteLivrableAttendu.
     *
     * @param mixed $dateLimiteLivrableAttendu the date limite livrableAttendu
     *
     * @return self
     */
    private function setDateLimiteLivrableAttendu($dateLimiteLivrableAttendu)
    {
        $this->dateLimiteLivrableAttendu = $dateLimiteLivrableAttendu;

        return $this;
    }

    /**
     * Gets the value of retardAutoriseLivrableAttendu.
     *
     * @return mixed
     */
    public function getRetardAutoriseLivrableAttendu()
    {
        return $this->retardAutoriseLivrableAttendu;
    }

    /**
     * Sets the value of retardAutoriseLivrableAttendu.
     *
     * @param mixed $retardAutoriseLivrableAttendu the retard autorise livrableAttendu
     *
     * @return self
     */
    private function setRetardAutoriseLivrableAttendu($retardAutoriseLivrableAttendu)
    {
        $this->retardAutoriseLivrableAttendu = $retardAutoriseLivrableAttendu;

        return $this;
    }


    /**
     * Gets the value of libelleLivrableAttendu.
     *
     * @return mixed
     */
    public function getLibelleLivrableAttendu()
    {
        return $this->libelleLivrableAttendu;
    }

    /**
     * Sets the value of libelleLivrableAttendu.
     *
     * @param mixed $libelleLivrableAttendu the retard autorise livrableAttendu
     *
     * @return self
     */
    private function setLibelleLivrableAttendu($libelleLivrableAttendu)
    {
        $this->libelleLivrableAttendu = $libelleLivrableAttendu;

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

    public static function createLivrableAttendu($libelleLivrableAttendu, $dateLimiteLivrableAttendu, $retardAutoriseLivrableAttendu = false, $idDevoir)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("INSERT INTO LivrableAttendu (libelleLivrableAttendu, dateLimiteLivrableAttendu, retardAutoriseLivrableAttendu, idDevoir) VALUES (:libelleLivrableAttendu, :dateLimiteLivrableAttendu,  :retardAutoriseLivrableAttendu, :idDevoir)");
        $stmt->bindParam(':libelleLivrableAttendu', $libelleLivrableAttendu);
        $stmt->bindParam(':dateLimiteLivrableAttendu', $dateLimiteLivrableAttendu);
        $stmt->bindParam(':retardAutoriseLivrableAttendu', $retardAutoriseLivrableAttendu);
        $stmt->bindParam(':idDevoir', $idDevoir);
        $stmt->execute();
        $stmt->closeCursor();
        return new LivrableAttendu($dbh->lastInsertId());
    }

    public static function getLivrableAttendusDevoir($idDevoir)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("select idLivrableAttendu from LivrableAttendu where idDevoir = :idDevoir;");
        $stmt->bindParam(':idDevoir', $idDevoir, PDO::PARAM_INT);
        $stmt->execute();
        $livrableAttendus = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $livrableAttendus;
    }

}