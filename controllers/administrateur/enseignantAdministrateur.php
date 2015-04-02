<!--
AUTEUR: Guerry David
DATE DE DEBUT: 10-03-2015
PROJET LicencePro Updago-->

<?php

	// récupération de toutes les formations
	$ToutesLesMatieresFormation = [];
	$Formations = array();
	$MatieresFormations = array();

	// Tableau avec les id de toutes les formations
	$ToutesLesFormations = Formation::getFormations();

	// Pour chaque id de formation
	foreach ($ToutesLesFormations as $idFormation) 
	{
		// On créé un tableau avec toutes les formations
	    array_push($Formations, new Formation($idFormation));

	    // Récupération de toutes les matieres par rapport à l'id de la formation
		$ToutesLesMatieresFormation[$idFormation] = Matiere::getMatieresFormation($idFormation);

	}


	// envoie des données d'un nouvel enseignant
	if(isset($_POST['valider']))
	{

		if(isset($_POST['Nom']) && isset($_POST['Prenom']) && isset($_POST['Identifiant']) && isset($_POST['Password']) && isset($_POST['Email']) && isset($_POST['Telephone']))
		{

			// Recupere les données du formulaire
			$Nom = $_POST['Nom'];
			$Prenom = $_POST['Prenom'];
			$Identifiant = $_POST['Identifiant'];
			$Password = sha1($_POST['Password']);
			$ConfirmationPassword = sha1($_POST['ConfirmationPassword']);
			$Email = $_POST['Email'];
			$Telephone = $_POST['Telephone'];
			$DateNonFormate = $_POST['Date'];
			$Sexe = $_POST['Sexe'];
			$idMatieres = $_POST['Matiere'];

			// Formatage de la date
			$Date = DateTime::createFromFormat('d/m/Y', $DateNonFormate);
			$DateFormate = $Date->format('Y-m-d');


			$NouvelleEnseignant = Enseignant::createEnseignant($Identifiant, $Password, $Nom, $Prenom, $Email, $Telephone, $Sexe, null, $DateFormate);
			$idNouvelleEnseignant = $NouvelleEnseignant->getIdEnseignant();

			Enseigne::addMatieresEnseignant($idMatieres, $idNouvelleEnseignant);

			if(file_exists($_FILES['photoProfil']['tmp_name']))
			{
				$nomDeLaPhoto = $Nom."-".$Prenom."-".$idNouvelleEnseignant.".jpg";
				$chemin = "global/image/enseignant/".$nomDeLaPhoto;
				move_uploaded_file($_FILES['photoProfil']['tmp_name'], $chemin);
			}

			Enseignant::addPhotoEnseignant($chemin ,$idNouvelleEnseignant);

			// Traitement des données	
			if($NouvelleEnseignant != null)	
			{	
				echo "<script language=\"JavaScript\">
				alert(\"Enseignant enregistré !\")</script>";
				header("Location: indexAdministrateur.php?page=enseignant");
			}
			else
			{
				echo "<script language=\"JavaScript\">
				alert(\"Erreur lors de l'enregistrement de l'enseignant !\")</script>";			
			}
		}
	}

	// Recharge la page administrateur
	include_once "views/administrateur/enseignantAdministrateur.php";
?>
