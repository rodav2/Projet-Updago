<?php
/**
 * Created by PhpStorm.
 * User: Damien
 * Date: 10/03/2015
 * Time: 14:01
 */

require_once "../../models/Enseignant.class.php";
require_once "../../models/Etudiant.class.php";
require_once "../../models/Formation.class.php";
/**
 * Singleton PDO gérant la base de données.
 **/
require_once "../lib/spdo.class.php";

if(!isset($_POST['idFormation'])){
    die("[]");
} else {
    $idFormation = $_POST['idFormation'];;
}
$lesEtudiants = array();
$lesEtudiantsFormation = Etudiant::getEtudiantsFormation($idFormation);

foreach($lesEtudiantsFormation as $etudiant) {
    $unEtudiant = new Etudiant($etudiant);
    $lesEtudiants[utf8_encode($unEtudiant->getNomEtudiant()) . " " . utf8_encode($unEtudiant->getPrenomEtudiant())] =  $unEtudiant->getIdEtudiant();

}
echo json_encode($lesEtudiants);