<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Classe Utilitaire ////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

abstract class Utilitaire
{
	/**
	 * Connexion d'un utilisateur
	**/
	public static function connexion($identifiant, $mdp)
	{
        if ($etudiant = self::connexionEtudiant($identifiant, $mdp))
		{
			$resultat["type"] = "etudiant";
			$resultat["id"] = $etudiant;

		    return $resultat;
		}
		else if($enseignant = self::connexionEnseignant($identifiant, $mdp))
		{
			$resultat["type"] = "enseignant";
			$resultat["id"] = $enseignant;

		    return $resultat;
		}
		else if($administrateur = self::connexionAdministrateur($identifiant, $mdp))
		{
			$resultat["type"] = "administrateur";
			$resultat["id"] = $administrateur;

		    return $resultat;
		}
		else
		{
			return null;
		}
	}

	protected static function connexionEtudiant($identifiant, $mdp)
	{
		$dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("select Etudiant.idEtudiant as idUtilisateur from Etudiant where Etudiant.identifiantEtudiant = :identifiant and Etudiant.mdpEtudiant = :mdp;");
        $stmt->bindParam(":identifiant", $identifiant, PDO::PARAM_STR);
        $stmt->bindParam(":mdp", $mdp, PDO::PARAM_STR);
        $stmt->execute();
        $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $etudiant["idUtilisateur"];
	}

	protected static function connexionEnseignant($identifiant, $mdp)
	{
		$dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("select Enseignant.idEnseignant as idUtilisateur from Enseignant where Enseignant.identifiantEnseignant = :identifiant and Enseignant.mdpEnseignant = :mdp;");
        $stmt->bindParam(":identifiant", $identifiant, PDO::PARAM_STR);
        $stmt->bindParam(":mdp", $mdp, PDO::PARAM_STR);
        $stmt->execute();
        $enseignant = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $enseignant["idUtilisateur"];
	}

	protected static function connexionAdministrateur($identifiant, $mdp)
	{
		$dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("select Administrateur.idAdministrateur as idUtilisateur from Administrateur where Administrateur.identifiantAdministrateur = :identifiant and Administrateur.mdpAdministrateur = :mdp;");
        $stmt->bindParam(":identifiant", $identifiant, PDO::PARAM_STR);
        $stmt->bindParam(":mdp", $mdp, PDO::PARAM_STR);
        $stmt->execute();
        $administrateur = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $administrateur["idUtilisateur"];
	}

	public static function existeUtilisateur($identifiant, $mdp)
	{
		return (self::connexion($identifiant, $mdp) == null);
	}

	public static function existeEmail($email)
	{
		$dbh = SPDO::getInstance();
        $stmt = $dbh->prepare("SELECT count(*) FROM (SELECT AD.emailAdministrateur AS email FROM Administrateur AD UNION ALL SELECT ET.emailEtudiant AS email FROM Etudiant ET UNION ALL SELECT EN.emailEnseignant AS email FROM Enseignant EN) AS emails WHERE emails.email = :email;");
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $etudiant = $stmt->fetch(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        return !($etudiant==0);
	}


}

?>