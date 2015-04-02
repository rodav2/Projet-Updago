<?php

if(isset($_SESSION["utilisateur"] ))
{
    $utilisateurCourant = $_SESSION["utilisateur"] ;
}

	$devoirsEnseignant = Devoir::getDevoirsEnseignant($utilisateurCourant);
	include_once("views/enseignant/statistiquesEnseignant.html");
?>