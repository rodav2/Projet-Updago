<?php
/**
 * Created by PhpStorm.
 * User: Damien
 * Date: 10/03/2015
 * Time: 14:01
 */

require_once "../../models/Enseignant.class.php";
require_once "../../models/Matiere.class.php";
require_once "../../models/Formation.class.php";
/**
 * Singleton PDO gérant la base de données.
 **/
require_once "../lib/spdo.class.php";

if(!isset($_POST['idEnseignant'])){
    die("[]");
} else {
    $idMatiere = $_POST['idEnseignant'];
}
$lesFormations = array();
$lesFormationsMatiere = Formation::getFormationsMatiere($idMatiere);

foreach($lesFormationsMatiere as $formation) {
    $uneFormation = new Formation($formation);

    $lesFormations[$uneFormation->getIdFormation()] = $uneFormation->getLibelleFormation();
}
echo json_encode($lesFormations);