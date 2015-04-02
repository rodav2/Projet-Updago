<!--
AUTEUR: Guerry David
DATE DE DEBUT: 10-03-2015
PROJET LicencePro Updago-->

<?php

	// Envoie des données d'un nouvel administrateur
	if(isset($_POST['valider']))
	{
		if(isset($_POST['Nom']) && isset($_POST['Prenom']) && isset($_POST['Identifiant']) && isset($_POST['Password']) && isset($_POST['ConfirmationPassword']) && isset($_POST['Email']))
		{
			// Récupère les données du formulaire
			$Nom = $_POST['Nom'];
			$Prenom = $_POST['Prenom'];
			$Identifiant = $_POST['Identifiant'];
			$Password = sha1($_POST['Password']);
			$ConfirmationPassword = sha1($_POST['ConfirmationPassword']);
			$Email = $_POST['Email'];	

			$ResultatInsertion = Administrateur::createAdministrateur($Identifiant, $Password, $Nom, $Prenom, $Email);
			
			// Traitement des données	
			if($ResultatInsertion != null)	
			{	
				echo "<script language=\"JavaScript\">alert(\"Administrateur enregistré !\")</script>";
				header("Location: indexAdministrateur.php?page=administrateur");
			}
			else
			{
				echo "<script language=\"JavaScript\">
				alert(\"Erreur lors de l'enregistrement de l'administrateur !\")</script>";			
			}
		}
	}

	// Charge la page
	include_once "views/administrateur/administrateurAdministrateur.php";
?>