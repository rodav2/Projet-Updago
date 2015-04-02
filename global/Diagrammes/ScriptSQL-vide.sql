-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Ven 20 Mars 2015 à 18:35
-- Version du serveur: 5.6.14
-- Version de PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `updago`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
  `idAdministrateur` int(11) NOT NULL AUTO_INCREMENT,
  `identifiantAdministrateur` varchar(64) NOT NULL,
  `mdpAdministrateur` varchar(255) NOT NULL,
  `nomAdministrateur` varchar(64) NOT NULL,
  `prenomAdministrateur` varchar(64) NOT NULL,
  `emailAdministrateur` varchar(128) NOT NULL,
  PRIMARY KEY (`idAdministrateur`),
  UNIQUE KEY `identifiantAdministrateur` (`identifiantAdministrateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Structure de la table `appartient`
--

CREATE TABLE IF NOT EXISTS `appartient` (
  `note` float DEFAULT NULL,
  `idEtudiant` int(11) NOT NULL,
  `idGroupe` int(11) NOT NULL,
  PRIMARY KEY (`idEtudiant`,`idGroupe`),
  KEY `FK_Appartient_idGroupe` (`idGroupe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `consulte`
--

CREATE TABLE IF NOT EXISTS `consulte` (
  `idDevoir` int(11) NOT NULL,
  `idEtudiant` int(11) NOT NULL,
  PRIMARY KEY (`idDevoir`,`idEtudiant`),
  KEY `FK_Consulte_idEtudiant` (`idEtudiant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `creerdevoir`
--

CREATE TABLE IF NOT EXISTS `creerdevoir` (
  `idEnseignant` int(11) NOT NULL,
  `idDevoir` int(11) NOT NULL,
  PRIMARY KEY (`idEnseignant`,`idDevoir`),
  KEY `FK_CreerDevoir_idDevoir` (`idDevoir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `devoir`
--

CREATE TABLE IF NOT EXISTS `devoir` (
  `idDevoir` int(11) NOT NULL AUTO_INCREMENT,
  `libelleDevoir` varchar(64) NOT NULL,
  `dateLimiteDevoir` datetime NOT NULL,
  `descriptionDevoir` varchar(255) NOT NULL,
  `dateLimiteCorrectionDevoir` datetime DEFAULT NULL,
  `individuelDevoir` tinyint(1) DEFAULT NULL,
  `idMatiere` int(11) NOT NULL,
  `idEnseignant` int(11) NOT NULL,
  PRIMARY KEY (`idDevoir`),
  KEY `FK_Devoir_idMatiere` (`idMatiere`),
  KEY `FK_Devoir_idEnseignant` (`idEnseignant`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE IF NOT EXISTS `enseignant` (
  `idEnseignant` int(11) NOT NULL AUTO_INCREMENT,
  `identifiantEnseignant` varchar(64) NOT NULL,
  `mdpEnseignant` varchar(255) NOT NULL,
  `nomEnseignant` varchar(64) NOT NULL,
  `prenomEnseignant` varchar(64) NOT NULL,
  `emailEnseignant` varchar(128) NOT NULL,
  `telephoneEnseignant` varchar(25) DEFAULT NULL,
  `sexeEnseignant` bit(1) DEFAULT NULL,
  `photoEnseignant` varchar(255) DEFAULT NULL,
  `dateNaissanceEnseignant` datetime DEFAULT NULL,
  PRIMARY KEY (`idEnseignant`),
  UNIQUE KEY `identifiantEnseignant` (`identifiantEnseignant`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Structure de la table `enseigne`
--

CREATE TABLE IF NOT EXISTS `enseigne` (
  `idMatiere` int(11) NOT NULL,
  `idEnseignant` int(11) NOT NULL,
  PRIMARY KEY (`idMatiere`,`idEnseignant`),
  KEY `FK_Enseigne_idEnseignant` (`idEnseignant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `idEtudiant` int(11) NOT NULL AUTO_INCREMENT,
  `identifiantEtudiant` varchar(64) NOT NULL,
  `mdpEtudiant` varchar(255) NOT NULL,
  `nomEtudiant` varchar(64) NOT NULL,
  `prenomEtudiant` varchar(64) NOT NULL,
  `emailEtudiant` varchar(128) NOT NULL,
  `telephoneEtudiant` varchar(25) DEFAULT NULL,
  `sexeEtudiant` bit(1) DEFAULT NULL,
  `photoEtudiant` varchar(255) DEFAULT NULL,
  `dateNaissanceEtudiant` datetime DEFAULT NULL,
  `idFormation` int(11) NOT NULL,
  PRIMARY KEY (`idEtudiant`),
  UNIQUE KEY `identifiantEtudiant` (`identifiantEtudiant`),
  KEY `FK_Etudiant_idFormation` (`idFormation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE IF NOT EXISTS `formation` (
  `idFormation` int(11) NOT NULL AUTO_INCREMENT,
  `libelleFormation` varchar(25) NOT NULL,
  `anneeFormation` int(11) NOT NULL,
  PRIMARY KEY (`idFormation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `idGroupe` int(11) NOT NULL AUTO_INCREMENT,
  `libelleGroupe` varchar(64) NOT NULL,
  `commentaireGroupe` varchar(255) DEFAULT NULL,
  `idEtudiantResponsable` int(11) NOT NULL,
  `idDevoir` int(11) NOT NULL,
  PRIMARY KEY (`idGroupe`),
  KEY `FK_Groupe_idEtudiantResponsable` (`idEtudiantResponsable`),
  KEY `FK_Groupe_idDevoir` (`idDevoir`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Structure de la table `livrableattendu`
--

CREATE TABLE IF NOT EXISTS `livrableattendu` (
  `idLivrableAttendu` int(11) NOT NULL AUTO_INCREMENT,
  `libelleLivrableAttendu` varchar(64) NOT NULL,
  `dateLimiteLivrableAttendu` datetime NOT NULL,
  `retardAutoriseLivrableAttendu` bit(1) NOT NULL DEFAULT b'1',
  `idDevoir` int(11) NOT NULL,
  PRIMARY KEY (`idLivrableAttendu`),
  KEY `FK_LivrableAttendu_idDevoir` (`idDevoir`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Structure de la table `livrablerendu`
--

CREATE TABLE IF NOT EXISTS `livrablerendu` (
  `dateSoumissionLivrableRendu` datetime DEFAULT NULL,
  `fichierLivrableRendu` varchar(255) DEFAULT NULL,
  `idGroupe` int(11) NOT NULL,
  `idLivrableAttendu` int(11) NOT NULL,
  PRIMARY KEY (`idGroupe`,`idLivrableAttendu`),
  KEY `FK_LivrableRendu_idLivrableAttendu` (`idLivrableAttendu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE IF NOT EXISTS `matiere` (
  `idMatiere` int(11) NOT NULL AUTO_INCREMENT,
  `libelleMatiere` varchar(25) NOT NULL,
  PRIMARY KEY (`idMatiere`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Structure de la table `possede`
--

CREATE TABLE IF NOT EXISTS `possede` (
  `idFormation` int(11) NOT NULL,
  `idMatiere` int(11) NOT NULL,
  PRIMARY KEY (`idFormation`,`idMatiere`),
  KEY `FK_Possede_idMatiere` (`idMatiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `appartient`
--
ALTER TABLE `appartient`
  ADD CONSTRAINT `FK_Appartient_idEtudiant` FOREIGN KEY (`idEtudiant`) REFERENCES `etudiant` (`idEtudiant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Appartient_idGroupe` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`idGroupe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `consulte`
--
ALTER TABLE `consulte`
  ADD CONSTRAINT `FK_Consulte_idDevoir` FOREIGN KEY (`idDevoir`) REFERENCES `devoir` (`idDevoir`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Consulte_idEtudiant` FOREIGN KEY (`idEtudiant`) REFERENCES `etudiant` (`idEtudiant`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `creerdevoir`
--
ALTER TABLE `creerdevoir`
  ADD CONSTRAINT `FK_CreerDevoir_idEnseignant` FOREIGN KEY (`idEnseignant`) REFERENCES `enseignant` (`idEnseignant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CreerDevoir_idDevoir` FOREIGN KEY (`idDevoir`) REFERENCES `devoir` (`idDevoir`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `devoir`
--
ALTER TABLE `devoir`
  ADD CONSTRAINT `FK_Devoir_idEnseignant` FOREIGN KEY (`idEnseignant`) REFERENCES `enseignant` (`idEnseignant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Devoir_idMatiere` FOREIGN KEY (`idMatiere`) REFERENCES `matiere` (`idMatiere`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `enseigne`
--
ALTER TABLE `enseigne`
  ADD CONSTRAINT `FK_Enseigne_idMatiere` FOREIGN KEY (`idMatiere`) REFERENCES `matiere` (`idMatiere`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Enseigne_idEnseignant` FOREIGN KEY (`idEnseignant`) REFERENCES `enseignant` (`idEnseignant`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_Etudiant_idFormation` FOREIGN KEY (`idFormation`) REFERENCES `formation` (`idFormation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `FK_Groupe_idEtudiantResponsable` FOREIGN KEY (`idEtudiantResponsable`) REFERENCES `etudiant` (`idEtudiant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Groupe_idDevoir` FOREIGN KEY (`idDevoir`) REFERENCES `devoir` (`idDevoir`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `livrableattendu`
--
ALTER TABLE `livrableattendu`
  ADD CONSTRAINT `FK_LivrableAttendu_idDevoir` FOREIGN KEY (`idDevoir`) REFERENCES `devoir` (`idDevoir`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `livrablerendu`
--
ALTER TABLE `livrablerendu`
  ADD CONSTRAINT `FK_LivrableRendu_idGroupe` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`idGroupe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_LivrableRendu_idLivrableAttendu` FOREIGN KEY (`idLivrableAttendu`) REFERENCES `livrableattendu` (`idLivrableAttendu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `possede`
--
ALTER TABLE `possede`
  ADD CONSTRAINT `FK_Possede_idFormation` FOREIGN KEY (`idFormation`) REFERENCES `formation` (`idFormation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Possede_idMatiere` FOREIGN KEY (`idMatiere`) REFERENCES `matiere` (`idMatiere`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
