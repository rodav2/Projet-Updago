<?php

	require_once "../../models/Appartient.class.php";
/**
* Singleton PDO gérant la base de données.
**/
	require_once "../lib/spdo.class.php";

	if(!isset($_POST['idDevoir'])){
	die("[]");
	} else {
		$idDevoir = $_POST['idDevoir'];
	}

	$notesDevoir = Appartient::getNotesDevoir($idDevoir);

	echo json_encode($notesDevoir);
?>