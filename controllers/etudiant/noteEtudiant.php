<?php

	if(isset($_SESSION["utilisateur"]) AND $_SESSION["typeUtilisateur"] == "etudiant")
	{
		$utilisateurCourant = $_SESSION["utilisateur"];

		$lesDevoirs = Devoir::getAllDevoir($utilisateurCourant);

		include_once "views/etudiant/noteEtudiant.php";
	}
	else
	{
		Header('Location: index.php');
	}
?>