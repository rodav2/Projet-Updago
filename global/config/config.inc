<?php

	session_start();
	
	$pagesAdministrateur = array(
		"administrateur",
		"etudiant",
		"formation",
		"matiere",
		"enseignant"
	);
	
	$pagesEtudiant = array(
		"matieres",
		"note",
		"profil"
	);

	$pagesEnseignant = array(
		"ajouterDevoir",
		"evaluerDevoir",
		"statistiques"
	);

	/**
	 *  Charge les models automatiquement
	 **/
	function __autoload( $class_name ) {
		if (file_exists('models/' . $class_name . '.class.php' )) 
		{
			require_once 'models/' . $class_name . '.class.php';
		}
		else
		{
			throw new Exception("Impossible de charger la classe $class_name.");
		}
	};
