<?php

	if(isset($_SESSION["utilisateur"]) AND $_SESSION["typeUtilisateur"] == "etudiant")
	{
		$utilisateurCourant = $_SESSION["utilisateur"];

		$utilisateur = new Etudiant($utilisateurCourant);

		include_once "views/etudiant/profilEtudiant.php";
	}
	else
	{
		Header('Location: index.php');
	}

