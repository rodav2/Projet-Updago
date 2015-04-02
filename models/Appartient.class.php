<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Classe Appartient ////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

abstract class Appartient
{
	private $idEtudiant;
	private $idGroupe;
    private $note;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Getter et Setter /////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

    /**
     * Gets the value of idEtudiant.
     *
     * @return mixed
     */
    public function getIdEtudiant()
    {
        return $this->idEtudiant;
    }

    /**
     * Sets the value of idEtudiant.
     *
     * @param mixed $idEtudiant the id Etudiant
     *
     * @return self
     */
    private function setIdEtudiant($idEtudiant)
    {
        $this->idEtudiant = $idEtudiant;

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
     * @param mixed $idGroupe the id Groupe
     *
     * @return self
     */
    private function setIdGroupe($idGroupe)
    {
        $this->idGroupe = $idGroupe;

        return $this;
    }


    /**
     * Gets the value of note.
     *
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Sets the value of note.
     *
     * @param mixed $note
     *
     * @return self
     */
    private function setNote($note)
    {
        $this->note = $note;

        return $this;
    }


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Methodes /////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

   public static function addEtudiantsGroupe($idEtudiants, $idGroupe)
    {
        try {
            $dbh = SPDO::getInstance();
            foreach($idEtudiants as $idEtudiant)
            {
                $stmt = $dbh->prepare("INSERT INTO Appartient (idGroupe,  idEtudiant) VALUES (:idGroupe,  :idEtudiant)");
                $stmt->bindParam(':idGroupe', $idGroupe);
                $stmt->bindParam(':idEtudiant', $idEtudiant);
                $stmt->execute();
                $stmt->closeCursor();
            }
            $res = true;
        } catch (PDOException $e) {
            $res = false;
        }

        return $res;
    }

    public static function addGroupesEtudiant($idGroupes, $idEtudiant)
    {
        $dbh = SPDO::getInstance();
        foreach($idGroupes as $idGroupe)
        {
            $stmt = $dbh->prepare("INSERT INTO Appartient (idGroupe,  idEtudiant) VALUES (:idGroupe,  :idEtudiant)");
            $stmt->bindParam(':idGroupe', $idGroupe);
            $stmt->bindParam(':idEtudiant', $idEtudiant);
            $stmt->execute();
            $stmt->closeCursor();
        }
    }

    public static function addNoteGroupeEtudiant($note, $idGroupe, $idEtudiant)
    {
        try {
            $dbh = SPDO::getInstance();
            $stmt = $dbh->prepare("UPDATE Appartient SET note = :note WHERE idGroupe = :idGroupe AND idEtudiant = :idEtudiant");
            $stmt->bindParam(':note', $note);
            $stmt->bindParam(':idGroupe', $idGroupe);
            $stmt->bindParam(':idEtudiant', $idEtudiant);
            $stmt->execute();
            $stmt->closeCursor();

            return true;
        } catch (PDOException $e) {
            return false ;
        }
    }

     public static function addNoteGroupe($note, $idGroupe)
    {
        try {
            $dbh = SPDO::getInstance();
            $stmt = $dbh->prepare("UPDATE Appartient SET note = :note WHERE idGroupe = :idGroupe");
            $stmt->bindParam(':note', $note);
            $stmt->bindParam(':idGroupe', $idGroupe);
            $stmt->execute();
            $stmt->closeCursor();
            return true;
        } catch(PDOException $e) {
            return false;
        }

    }

    public static function getNoteEtudiantGroupe($idEtudiant, $idGroupe)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT note FROM Appartient where idEtudiant = :idEtudiant AND idGroupe = :idGroupe");
        $stmt->bindParam(':idEtudiant', $idEtudiant);
        $stmt->bindParam(':idGroupe', $idGroupe);
        $stmt->execute();
        $note = $stmt->fetch(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $note;
    }

    public static function getNoteEtudiantDevoir($idEtudiant, $idDevoir)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT A.note FROM Appartient A, Groupe G, Devoir D WHERE A.idEtudiant = :idEtudiant AND G.idGroupe = A.idGroupe AND G.idDevoir = D.idDevoir AND D.idDevoir = :idDevoir");
        $stmt->bindParam(':idEtudiant', $idEtudiant);
        $stmt->bindParam(':idDevoir', $idDevoir);
        $stmt->execute();
        $note = $stmt->fetch(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return $note;
    }


    public static function getNotesDevoir($idDevoir)
    {
        $dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT A.note FROM Appartient A, Groupe G, Devoir D WHERE G.idGroupe = A.idGroupe AND G.idDevoir = D.idDevoir AND D.idDevoir = :idDevoir");
        $stmt->bindParam(':idDevoir', $idDevoir);
        $stmt->execute();
        $notes = $stmt->fetchAll(PDO::FETCH_COLUMN);
        array_push($notes, 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);
        $notesWithNull = array_replace($notes, array_fill_keys(array_keys($notes, null),'non remis'));
        $stmt->closeCursor();
        $nbNotes = array_count_values($notesWithNull);
        return $nbNotes;
    }
}