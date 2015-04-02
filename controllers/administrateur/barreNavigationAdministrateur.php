<?php
	

	if( isset($_GET['page']))
	{
		$page = $_GET['page'];
	}
	else
	{
		$page = "etudiant";
	}
	
	// Recharge la page administrateur
	include_once "views/administrateur/barreNavigationAdministrateur.php";
?>