<?php

	if( isset($_GET['page']))
	{
		$page = $_GET['page'];
	}
	else
	{
		$page = "profil";
	}
	
	// Recharge la page etudiant
	include_once "views/etudiant/barreNavigationEtudiant.php";
?>