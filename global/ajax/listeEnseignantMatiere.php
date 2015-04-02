<?php
/**
 * Created by PhpStorm.
 * User: Damien
 * Date: 10/03/2015
 * Time: 14:01
 */

require_once "../../models/Enseignant.class.php";
/**
 * Singleton PDO gérant la base de données.
 **/
require_once "../lib/spdo.class.php";

if(!isset($_POST['idMatiere'])){
    die("[]");
} else {
    $idMatiere = $_POST['idMatiere'];
}
$lesEnseignants = array();
$lesEnseignantsMatiere =  Enseignant::getEnseignantsMatiere($idMatiere);

foreach($lesEnseignantsMatiere as $enseignant) {
    $unEnseignant = new Enseignant($enseignant);

    $lesEnseignants[$unEnseignant->getIdEnseignant()] = utf8_encode($unEnseignant->getNomEnseignant()) . " " . utf8_encode($unEnseignant->getPrenomEnseignant());
}

echo json_encode($lesEnseignants);
