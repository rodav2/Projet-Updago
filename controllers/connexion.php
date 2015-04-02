<!--
AUTEUR: Guerry David
DATE DE DEBUT: 10-03-2015
PROJET LicencePro Updago-->

<?php
	// Détruit toutes les variables d'une session
	session_unset();

	// envoie des données d'un nouvel administrateur
	if(isset($_POST['connexion']))
	{

		if(isset($_POST['Identifiant']) && isset($_POST['Password']))
		{
			// Recupere les données du formulaire
			$Identifiant = $_POST['Identifiant'];
			$Password = sha1($_POST['Password']);

			$ResultatInsertion = Utilitaire::connexion($Identifiant, $Password);

			if($ResultatInsertion == null)	
			{	
				echo "<script>alert('Erreur lors de la connexion !')</script>";		
			}
			else
			{
				$_SESSION["typeUtilisateur"] = $ResultatInsertion["type"];
				$_SESSION["utilisateur"] = $ResultatInsertion["id"];
				Header('Location: index' . ucFirst($_SESSION["typeUtilisateur"]) . '.php');
			}
		}
	}

	// Recharge la page connexion
	include_once "views/connexion.php";
?>