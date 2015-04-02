<!--
AUTEUR: Guerry David
DATE DE DEBUT: 10-03-2015
PROJET LicencePro Updago-->

<?php

	// Récupération de toutes les formations
	$Formations = array();

	$ToutesLesFormations = Formation::getDernieresFormations();

	foreach ($ToutesLesFormations as $Formation) {
	    array_push($Formations, new Formation($Formation));
	}

	// Envoie des données d'une nouvelle matiére
	if(isset($_POST['valider']))
	{
		if(isset($_POST['nomMatiere']) && isset($_POST['formation']))
		{
			// Recupere les données du formulaire
			$NomMatiere = $_POST['nomMatiere'];
			$Formations = $_POST['formation'];
			
	

			$NouvelleMatiere = Matiere::createMatiere($NomMatiere);
			$idNouvelleMatiere = $NouvelleMatiere->getIdMatiere();

			Possede::addFormationsMatiere($Formations, $idNouvelleMatiere);

			// Traitement des données	
			if($NouvelleMatiere != null)	
			{	
				echo "<script language=\"JavaScript\">alert(\"Matière enregistré !\")</script>";	
				header('Location: indexAdministrateur.php?page=matiere');
			}
			else
			{
				echo "<script language=\"JavaScript\">
				alert(\"Erreur lors de l'enregistrement de la matière !\")</script>";			
			}
		}
	}


	// Recharge la page administrateur
	include_once "views/administrateur/matiereAdministrateur.php";
?>