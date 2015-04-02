 _____                 _                   
|  _  |               | |                  
| | | | __ _  __ _  __| | ___  _ __  _   _ 
| | | |/ _` |/ _` |/ _` |/ _ \| '_ \| | | |
\ \_/ | (_| | (_| | (_| | (_) | |_) | |_| |
 \___/ \__, |\__,_|\__,_|\___/| .__/ \__,_|
        __/ |                 | |          
       |___/                  |_|


Projet Bureau d'étude

Membres :
	- Helias Maxime
	- Desmay Damien
	- Mady Antoine
	- Guerry David

Manuel d'installation :
	- Génération de la base de donnée avec un jeu de données :
		global/sql/ScriptSQL

PS : Le fichier créé automatiquement la base de données avec les tables et les données.

	- Deposer tout le dossier du projet à la racine de votre serveur

	- Configuration de la classe SPDO
		global/lib/spdo.php

	// Variable de connexion à la base de données (A modifier)
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

Fonctionnalité :
	- Administrateur
		- Créer un administrateur
		- Créer un enseignant
		- Créer un étudiant
		- Créer une formation
		- Créer une matière

	- Enseignant
		- Créer un devoir
		- Note les livrables
		- Voir les statistiques d'un devoir

	- Enseignant
		- Voir un devoir (Descripion, note, etc...)
		- Déposer un livrable pour un devoir
		- Voir tout les devoirs d'un étudiant (Matière, date et note)