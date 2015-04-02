<?php
/**
 * Created by PhpStorm.
 * User: Damien
 * Date: 10/03/2015
 * Time: 08:47
 */

if(isset($_SESSION["utilisateur"]))
{
    $utilisateurCourant = $_SESSION["utilisateur"];
}

//message d'erreur
$msgErreur = "";
$erreur = 0;

// récupération des matières de l'enseignant
$lesMatieres = array();
$lesMatieresEnseignant = Matiere::getMatieresEnseignant($utilisateurCourant);
foreach ($lesMatieresEnseignant as $uneMatiere) {
    array_push($lesMatieres, new Matiere($uneMatiere));
}

// Lancement au clic du bouton 'ajouter un devoir"
if (isset($_POST["ajoutDevoir"])) {

    // Si les champs nécessaires sont existants
    if (isset($_POST["descriptionDevoir"]) and isset($_POST["nomDevoir"]) and isset($_POST["matiere"]) and isset($_POST["idEnseignant"]) and isset($_POST["idFormation"]) and isset($_POST["enGroupe"])) {

        // On récupère chaque données de la page
        $nomDevoir = $_POST["nomDevoir"];
        $descriptionDevoir = $_POST["descriptionDevoir"];
        $dateCorrection = $_POST["dateCorrection"];
        $heureCorrection = $_POST["heureCorrection"];
        $idMatiere = $_POST["matiere"];
        $nbLivrable = $_POST["nbLivrable"];
        $lesEnseignants = $_POST["idEnseignant"];
        $enGroupe = $_POST["enGroupe"];
        $idFormation = $_POST["idFormation"];

        $lesLivrables = array();

        // si les champs sont remplis
        if (!empty($nomDevoir) || !empty($descriptionDevoir) || !empty($idMatiere) || !empty($nbLivrable)) {

            //RECUPERATION DES LIVRABLES
            // ########################################################""
            for ($i = 1; $i <= $nbLivrable; $i++) {
                $unLivrable = array();
                $intituleLivrable = $_POST["intituleLivrable" . $i];
                $date = $_POST["date" . $i];
                $heure = $_POST["heure" . $i];

                if (!empty($intituleLivrable)) {
                    array_push($unLivrable, $intituleLivrable, $date, $heure, $_POST["retard" . $i], $_POST["typeFichier" . $i]);
                    array_push($lesLivrables, $unLivrable);
                } else {
                    $erreur = 1 ;
                    $msgErreur = "Vous devez saisir tous les intitulés de livrable !";
                }
            }

            // Récupération de la date devoir au plus tard en focntion des livrables
            if (count($lesLivrables) > 1) {
                $dateLimiteDevoir = "1900-01-01 00:00";
                foreach ($lesLivrables as $livrable) {
                    $date1 = new DateTime($dateLimiteDevoir);
                    $date2 = new DateTime($livrable[1]." ".$livrable[2]);
                    if ($date2 < new DateTime(date("Y-m-d H:i"))){
                        $erreur = 1;
                        $msgErreur = "Date(s) Livrable(s) saisie(s) inférieure(s) à la date actuelle !";
                    } else {
                        if ($date2 > $date1) {
                            $dateLimiteDevoir = $date2->format('Y-m-d H:i');
                            //echo ($date2->format('Y-m-d H:i'). "<br/>");
                        }
                    }
                }
            } else {
                $dateLimiteDevoir = ($lesLivrables[0][1] ." ".$lesLivrables[0][2]);
            }
            if (new DateTime($dateLimiteDevoir) < new DateTime(date("Y-m-d H:i"))){
                $erreur = 1;
                $msgErreur = "Date(s) saisie(s) inférieure(s) à la date actuelle !";
            }

            // RECUPERATION DES ENSEIGNANTS
            // ########################################################""
            if ($erreur == 0) {
                $idEnseignantResponsable = 0;
                $lesEnseignants = array();
                $existRespondable = 0;
                foreach ($_POST["idEnseignant"] as $unEnseignant) {
                    $estResponsable = false;
                    foreach ($_POST["idResponsable"] as $responsable) {
                        if ($responsable == $unEnseignant) {
                            //echo "<script> alert('" . $unEnseignant . " - Respondable') </script>";
                            $existRespondable++;
                            $estResponsable = true;
                            $idEnseignantResponsable = $responsable;
                        }
                    }
                    array_push($lesEnseignants, $unEnseignant, $estResponsable);
                }
                // On test si un responsable a bien été sélectionné
                if ($existRespondable == 0) {
                    $erreur = 1;
                    $msgErreur = "Vous devez sélectionner un responsable !";
                }

                //RECUP2RATION DES ETUDIANTS
                // ########################################################
                if ($erreur == 0) {
                    // Si le devoir est en groupe
                    if ($enGroupe == 1) {
                        if (isset($_POST["nbGroupeChoix"])) {
                            $nbGroupechoix = $_POST["nbGroupeChoix"];
                            $lesGroupesEtudiants = array();
                            for ($i = 1 ; $i <= $nbGroupechoix ; $i++) {

                                $unGroupeEtudiant = array();
                                array_push($unGroupeEtudiant, $i, $_POST["idEtudiant".$i], $_POST["idEtudiantResponsable". $i]);
                                array_push($lesGroupesEtudiants, $unGroupeEtudiant);
                            }
                        } else {
                            $erreur = 1;
                        }
                    } elseif ($enGroupe == 0) {
                        $lesEtudiants = $_POST["idEtudiant"];
                    }

                    //INSERTION DES DONNEES DANS LA BDD
                    // ########################################################
                    if ($erreur == 0) {

                        // Création d'un devoir
                        if ($enGroupe == "1") {
                            $individuelDevoir = 0;
                        } else {
                            $individuelDevoir = 1;
                        }
                        $unDevoir = Devoir::createDevoir($nomDevoir, $dateLimiteDevoir, $descriptionDevoir, $dateCorrection. " ".$heureCorrection, $individuelDevoir, $idMatiere, $idEnseignantResponsable);
    
                        if ($unDevoir->getIdDevoir()) {

                            // On assigne les enseignants au devoir créé
                            $enseignantsDevoir = CreerDevoir::addEnseignantsDevoir($lesEnseignants, $unDevoir->getIdDevoir());
                            if ($enseignantsDevoir) {

                                // ajout des livrables pour le devoir
                                foreach($lesLivrables as $unLivrable) {
                                    $livrableBdd = LivrableAttendu::createLivrableAttendu($unLivrable[1]. " ". $unLivrable[2], $unLivrable[0], $unLivrable[3], $unDevoir->getIdDevoir());
                                    if (!$livrableBdd->getIdLivrableAttendu()) {
                                        $erreur = 1;
                                    }
                                }
                                       
                                // Si les enregistrements précédents sont bien passés, on continu l'enregistrement
                                if ($erreur == 0 ) {
                                    $j=1;
                                    // Ajout des groupes puis enregistrement des étudiants pour le groupe
                                    if ($enGroupe == 0 ) {
                                        foreach($lesEtudiants as $etudiant) {

                                            $unGroupe = Groupe::createGroupe("Etu".$j, "", $etudiant, $unDevoir->getIdDevoir());
                                            $unEtudiant = array();
                                            array_push($unEtudiant, $etudiant);
                                            $ajoutEtudiantGroupe = Appartient::addEtudiantsGroupe($unEtudiant, $unGroupe->getIdGroupe());
                                            if (!$ajoutEtudiantGroupe) {
                                                $erreur = 1;
                                            }
                                            $j++;
                                        }
                                    } elseif($enGroupe == 1) {
                                        foreach($lesGroupesEtudiants as $groupe) {
                                            $unGroupe = Groupe::createGroupe("Gr".$j, "", $groupe[2], $unDevoir->getIdDevoir());
                                            print("Gr".$j ." -  - ". $groupe[2]." - " . $unDevoir->getIdDevoir());
                                                print_r($unGroupe);
                                          
                                            if ($unGroupe->getIdGroupe()) {
                                                $ajoutEtudiantGroupe = Appartient::addEtudiantsGroupe($groupe[1], $unGroupe->getIdGroupe());
                                                if (!$ajoutEtudiantGroupe) {
                                                    $erreur = 1;
                                                }
                                            } else {
                                                echo "<script> alert('Problème groupe :)') </script>";

                                                $erreur = 1;
                                            }
                                            $j++;
                                        }
                                    }
                                    if ($erreur == 0) {
                                        $uneFormation = new Formation($idFormation);

                                        $dossierFormation = "global/livrable/".$uneFormation->getLibelleFormation();
                                        $dossierFormation = str_replace(" ", "_", $dossierFormation);
                                        if(!is_dir($dossierFormation)){
                                            mkdir($dossierFormation);
                                        }
                                        $nomDevoir = str_replace(" ", "_", $nomDevoir);
                                        $dossierDevoir = $dossierFormation."/". $nomDevoir;
                                        if(!is_dir($dossierDevoir)){
                                            mkdir($dossierDevoir);
                                        }
                                        echo "<script> alert('Le devoir (ID : ".$unDevoir->getIdDevoir().") a été ajouté avec succès :)') </script>";
                                    } else {
                                        $msgErreur = "Il y a eu un problème lors de l'ajout du devoir !";                                    }
                                } else {
                                    $msgErreur = "Il y a eu un problème lors de l'enregistrement des livrables pour le devoir !";                                    }
                            }
                        }
                    } else {
                        $msgErreur = "Certaines données saisies sont incorrectes !";                                    }
                }
            }
        } else {
            $msgErreur = "Vous devez renseigner tous les champs !";
        }
    } else {
        $msgErreur = "Vous devez renseigner tous les champs !";
    }
}

include_once("views/enseignant/ajouterDevoirEnseignant.html");
