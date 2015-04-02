 _____                 _                   
|  _  |               | |                  
| | | | __ _  __ _  __| | ___  _ __  _   _ 
| | | |/ _` |/ _` |/ _` |/ _ \| '_ \| | | |
\ \_/ | (_| | (_| | (_| | (_) | |_) | |_| |
 \___/ \__, |\__,_|\__,_|\___/| .__/ \__,_|
        __/ |                 | |          
       |___/                  |_|


Projet Bureau d'�tude

Membres :
	- Helias Maxime
	- Desmay Damien
	- Mady Antoine
	- Guerry David

Manuel d'installation :
	- G�n�ration de la base de donn�e avec un jeu de donn�es :
		global/sql/ScriptSQL

PS : Le fichier cr�� automatiquement la base de donn�es avec les tables et les donn�es.

	- Deposer tout le dossier du projet � la racine de votre serveur

	- Configuration de la classe SPDO
		global/lib/spdo.php

	// Variable de connexion � la base de donn�es (A modifier)
	const DEFAULT_SQL_HOST = 'localhost';
	//Chemin de la BDD
	const DEFAULT_SQL_USER = 'root';
	//Identifiant
	const DEFAULT_SQL_PASSWORD = '';
	//Mot de passe
	const DEFAULT_SQL_DATABASE = 'updago';	//Nom de la BDD (A ne pas modifier)

Utilisateur de test :
	- Administrateur
		       Login : dguerry
		Mot de passe : 123

	- Enseignant
		       Login : sjean
		Mot de passe : 123

	- Etudiant
		       Login : jdupin
		Mot de passe : 123

Fonctionnalit� :
	- Administrateur
		- Cr�er un administrateur
		- Cr�er un enseignant
		- Cr�er un �tudiant
		- Cr�er une formation
		- Cr�er une mati�re

	- Enseignant
		- Cr�er un devoir
		- Note les livrables
		- Voir les statistiques d'un devoir

	- Enseignant
		- Voir un devoir (Descripion, note, etc...)
		- D�poser un livrable pour un devoir
		- Voir tout les devoirs d'un �tudiant (Mati�re, date et note)