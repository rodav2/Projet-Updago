<?php

	if( isset($_GET['page']))
	{
		$page = $_GET['page'];
	}
	else
	{
		$page = "ajouterDevoir";
	}
	
	// Recharge la page enseignant
	include_once "views/enseignant/barreNavigationEnseignant.html";
?>