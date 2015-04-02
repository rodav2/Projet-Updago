<?php
/**
 * Created by PhpStorm.
 * User: Damien
 * Date: 17/03/2015
 * Time: 09:22
 */

if(isset($_SESSION["utilisateur"] ))
{
    $utilisateurCourant = $_SESSION["utilisateur"] ;
}
$msgValidation = "";
$msgErreur = "";

if (isset($_POST["evaluer"])) {
    if (isset($_POST["idDevoir"]) and isset($_POST["idGroupe"]) and isset($_POST["idEtudiant"]) and isset($_POST["noteDevoir"])){
        $idDevoir = $_POST["idDevoir"];
        $idGroupe = $_POST["idGroupe"];
        $idEtudiant = $_POST["idEtudiant"];
        $note = $_POST["noteDevoir"];
        if (isset($_POST["commentaireDevoir"])){
            $commentaire = $_POST["commentaireDevoir"];
        }
        /* echo "Devoir : ".$idDevoir;
         echo "<br/>";
         echo $idGroupe;
         echo "<br/>";
         echo $idEtudiant;
        echo "<br/>";
        echo $note;
*/
        $enregistrementNote = Appartient::addNoteGroupeEtudiant($note, $idGroupe, $idEtudiant);
        if ($enregistrementNote) {
            if (isset($commentaire)) {
                $enregistrementCommentaire = Groupe::addCommentaireGroupe($commentaire, $idGroupe);
                if ($enregistrementCommentaire) {
                    $msgValidation = "  L'évaluation pour le devoir a été enregistrée avec succès !";
                }
            } else {
                    //   echo "<script>alert('Evaluation enregistrée avec succès !')</script>";
                    $msgValidation = "  L'évaluation pour le devoir a été enregistrée avec succès !";
            }
        }
    }
}

if (isset($_POST["evaluerParGroupe"])) {
    $idDevoir = $_POST["idDevoir"];
    $idGroupe = $_POST["idGroupe"];;
    $commentaire = $_POST["commentaireDevoir"];
    $note = $_POST["noteDevoir"];
    /*
    echo "Devoir : ".$idDevoir;
  echo "<br/>";
  echo "Groupe : ". $idGroupe;
  echo "<br/>";
  echo "Commentaire ; ".$commentaire;
  echo "<br/>";
  echo $note;*/

    $enregistrementNote = Appartient::addNoteGroupe($note, $idGroupe);
    $enregistrementCommentaire = Groupe::addCommentaireGroupe($commentaire, $idGroupe);

    if ($enregistrementNote) {
        if ($enregistrementCommentaire) {
            $msgValidation = "  L'évaluation pour le devoir a été enregistrée avec succès !";
        }
    }
}


$lesDevoirs = Devoir::getDevoirsEnseignant($utilisateurCourant);
//echo "<br/><br/><br/><br/>";
$lesDevoirsNonNotes = array();
foreach($lesDevoirs as $unDevoir) {

$leDevoir = array();
$lesEtudiantsParGroupe = array();
$noteNull = false ;
$lesGroupes = Groupe::getGroupesDevoir($unDevoir["devoir"]);
foreach($lesGroupes as $unGroupe) {
 $groupe = array();
 $gr = new Groupe($unGroupe);
 array_push($groupe, $gr);
 $lesEtudiants = Etudiant::getEtudiantsGroupe($unGroupe);
 $lesEtudiants2 = array();


 foreach($lesEtudiants as $unEtudiant) {
     $laNote = Appartient::getNoteEtudiantGroupe($unEtudiant, $unGroupe);
     /*
     if ($laNote == null) {
         $noteNull = true;
     }
     */

     $etudiantAvecNote = array();
     $note = array();
     $tabEtudiant = array();

     $objetEtudiant = new Etudiant($unEtudiant);
     array_push($tabEtudiant, $objetEtudiant);
     array_push($note, $laNote);
     array_push($etudiantAvecNote, $tabEtudiant, $note);
     array_push($lesEtudiants2, $etudiantAvecNote);
 }
 array_push($groupe, $lesEtudiants2);
 array_push($lesEtudiantsParGroupe, $groupe);
}

//if ($noteNull) {
 $devoir = new Devoir($unDevoir["devoir"]);
 $matiere = new Matiere($devoir->getIdMatiere());
 array_push($leDevoir, $devoir, $matiere, $lesEtudiantsParGroupe);
// array_push($leDevoir, $lesGroupes);
 array_push($lesDevoirsNonNotes, $leDevoir);
//}
}
//echo "<br/><br/><br/><br/>";
/*
echo "<pre>";
print_r($lesDevoirsNonNotes);
echo "</pre>";
*/
// ############ ---------------- TEST ----------------- #####################
//############################################################################
/*
echo "<br/><br/><br/>";
echo "<pre>";
print_r($lesDevoirsNonNotes);
echo "</pre>";
*/
/*
foreach($lesDevoirsNonNotes as $unDevoir) {
    echo "____________________________________________<br/>";
    echo "• DEVOIR : " . $unDevoir[0]->getLibelleDevoir() . "<br/>";
    foreach ($unDevoir[1] as $unGroupe) {
        echo $unGroupe[0]->getLibelleGroupe() . "<br/>";
        foreach ($unGroupe[1] as $etudiants) {
            //print_r($etu);
            foreach ($etudiants[0] as $etudiant) {
                echo $etudiant->getPrenomEtudiant() . " " . $etudiant->getNomEtudiant() . " -- " . $etudiants[1][0];
                echo "<br/>";
            }
        }
        echo "<br/><br/>";
    }
}
*/
//############################################################################
//############################################################################

//echo "<br/><br/><br/><br/>";
//$lesLivrables = LivrableRendu::getLivrableRenduGroupe(23);
$lesLivrablesAttendus = LivrableAttendu::getLivrableAttendusDevoir(1);
//print_r($lesLivrablesAttendus);
//print_r($lesLivrables);

include_once("views/enseignant/evaluerDevoirEnseignant.html");

