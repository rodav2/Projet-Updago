<?php

	$utilisateurCourant = $_SESSION["utilisateur"];

	$utilisateur = new Etudiant($utilisateurCourant);
	$mesMatieres = Matiere::getMatieresEtudiant($utilisateurCourant);
	
	//Si le formulaire est bien envoyé
	if(isset($_SERVER['REQUEST_METHOD']) && isset($_POST['save']))
	{

		$formation = new Formation($utilisateur->getIdFormation());
		$devoir = new Devoir($_POST['idDevoir']);

		//Chemin de l'enregistrement des fichiers
		$uploaddir = 'global/livrable/'.str_replace(' ', '_',$formation->getLibelleFormation()).'/'.str_replace(' ', '_' , $devoir->getLibelleDevoir()).'/';

		//Recupere les ids des livrables pour le devoir
		$lesLivrables = LivrableAttendu::getLivrableAttendusDevoir($devoir->getIdDevoir());

		foreach ($lesLivrables as $idDuLivrable) 
		{
			//On vérifie les fichiers a uploader
			if(isset($_FILES['LivrableRendu'.$idDuLivrable]))
			{
				//Extension autorisé
				$extensions_ok = array('pdf', 'zip', 'tar.gz', 'doc', 'docx');

				//On vérifie l'extension des images et on arrange la mise en forme du nom
				if(in_array( substr(strrchr($_FILES['LivrableRendu'.$idDuLivrable]['name'], '.'), 1), $extensions_ok ) )
				{
					
					//On vérifie l'existence du dossier
					if (file_exists($uploaddir))
					{
						//Chemin du fichier
						$uploadfile = $uploaddir . Groupe::getGroupeDevoirEtudiant($devoir->getIdDevoir(), $utilisateur->getIdEtudiant()).'_LivrableRendu'.$idDuLivrable.'.'.substr(strrchr($_FILES['LivrableRendu'.$idDuLivrable]['name'], '.'), 1);

						if (move_uploaded_file($_FILES['LivrableRendu'.$idDuLivrable]['tmp_name'], $uploadfile)) {
						    echo "<script>bootbox.alert('Le fichier est valide, et a été téléchargé avec succès.', function() {
									Example.show(\"Fichier ajouté\");
									}); )</script>";
						    LivrableRendu::createLivrableRendu(date('Y-m-d H:i:s'), $uploadfile, Groupe::getGroupeDevoirEtudiant($devoir->getIdDevoir(),$utilisateur->getIdEtudiant()), $idDuLivrable);
						} else {
						    echo "<script>bootbox.alert('Erreur de téléchargement.', function() {
									Example.show(\"Fichier ajouté\");
									}); )</script>";
						}
					}
				}
			}
		}
	}

	include_once "views/etudiant/matieresEtudiant.php";
