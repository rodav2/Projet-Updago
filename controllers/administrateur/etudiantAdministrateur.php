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


	// Envoie des données d'un nouvel etudiant
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
			$idFormation = $_POST['Formation'];

			// Formatage de la date
			$Date = DateTime::createFromFormat('d/m/Y', $DateNonFormate);
			$DateFormate = $Date->format('Y-m-d');

			$NouveauEtudiant = Etudiant::createEtudiant($Identifiant, $Password, $Nom, $Prenom, $Email, $Telephone, $Sexe, null, $DateFormate, $idFormation);
			$idNouveauEtudiant = $NouveauEtudiant->getIdEtudiant();

			if(file_exists($_FILES['photoProfil']['tmp_name']))
			{
				$nomDeLaPhoto = $Nom."-".$Prenom."-".$idNouveauEtudiant.".jpg";
				$chemin = "global/image/etudiant/".$nomDeLaPhoto;
				move_uploaded_file($_FILES['photoProfil']['tmp_name'], $chemin);
			}
			
			Etudiant::addPhotoEtudiant($chemin, $idNouveauEtudiant);


			// Traitement des données	
			if($NouveauEtudiant != null)	
			{	
				echo "<script language=\"JavaScript\">alert(\"Etudiant enregistré !\")</script>";	
				header('Location: indexAdministrateur.php?page=etudiant');
			}
			else
			{
				echo "<script language=\"JavaScript\">alert(\"Erreur lors de l'enregistrement de l'etudiant !\")</script>";			
			}
		}
	}

	// Recharge la page administrateur
	include_once "views/administrateur/etudiantAdministrateur.php";
?>
