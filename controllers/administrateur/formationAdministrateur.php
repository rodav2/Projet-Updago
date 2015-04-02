<!--
AUTEUR: Guerry David
DATE DE DEBUT: 10-03-2015
PROJET LicencePro Updago-->

<?php

// récupération de toutes les matières
$Matieres = array();

$ToutesLesMatieres = Matiere::getMatieres();

foreach ($ToutesLesMatieres as $Matiere) {
    array_push($Matieres, new Matiere($Matiere));
}

	// Envoie des données d'une nouvelle formation
	if(isset($_POST['valider']))
	{
		if(isset($_POST['nomFormation']) && isset($_POST['matiere']))
		{
			// Recupere les données du formulaire
			$NomFormation = $_POST['nomFormation'];
			$Annee = $_POST['Annee'];
			$Matieres = $_POST['matiere'];
			
			$NouvelleFormation = Formation::createFormation($NomFormation, $Annee);
			$idNouvelleFormation = $NouvelleFormation->getIdFormation();

			Possede::addMatieresFormation($Matieres, $idNouvelleFormation);

			// Traitement des données	
			if($NouvelleFormation != null)	
			{	

				echo "<script language=\"JavaScript\">alert(\"Formation enregistré !\")</script>";	
				header('Location: indexAdministrateur.php?page=formation');

			}
			else
			{
				echo "<script language=\"JavaScript\">
				alert(\"Erreur lors de l'enregistrement de la formation !\")</script>";			
			}
		}
	}
	// Charge la page
	include_once "views/administrateur/formationAdministrateur.php";
?>