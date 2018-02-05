-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 05 fév. 2018 à 20:27
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pritest`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `adh_id` int(11) NOT NULL AUTO_INCREMENT,
  `adh_fml` int(11) NOT NULL,
  `adh_nom` varchar(255) NOT NULL,
  `adh_prenom` varchar(255) NOT NULL,
  `adh_age` date NOT NULL,
  `adh_instr1` int(11) DEFAULT NULL,
  `adh_prof1` int(11) DEFAULT NULL,
  `adh_instr2` int(11) DEFAULT NULL,
  `adh_prof2` int(11) DEFAULT NULL,
  `adh_atelier1` int(11) DEFAULT NULL,
  `adh_atelier2` int(11) DEFAULT NULL,
  `adh_formation` int(11) DEFAULT NULL,
  `adh_classe` varchar(255) DEFAULT NULL,
  `adh_seul` varchar(255) DEFAULT NULL,
  `adh_sexe` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`adh_id`),
  KEY `adh_fml` (`adh_fml`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `atelier`
--

DROP TABLE IF EXISTS `atelier`;
CREATE TABLE IF NOT EXISTS `atelier` (
  `atl_id` int(11) NOT NULL AUTO_INCREMENT,
  `atl_nom` varchar(255) NOT NULL,
  PRIMARY KEY (`atl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `atelier`
--

INSERT INTO `atelier` (`atl_id`, `atl_nom`) VALUES
(5, 'Funk'),
(6, 'ado');

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

DROP TABLE IF EXISTS `commune`;
CREATE TABLE IF NOT EXISTS `commune` (
  `cmn_id` int(11) NOT NULL AUTO_INCREMENT,
  `cmn_nom` varchar(255) NOT NULL,
  `cmn_zip` int(5) DEFAULT NULL,
  PRIMARY KEY (`cmn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`cmn_id`, `cmn_nom`, `cmn_zip`) VALUES
(1, 'Soucieu en Jarrest', 69510),
(2, 'Messimy', 69510),
(3, 'Brindas', 69126),
(4, 'Mornant', 69440),
(5, 'Saint Laurent d\'Agny', 69440),
(6, 'Orlienas', 69530),
(7, 'Thurins', 69510),
(9, 'Millery', 69390);

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

DROP TABLE IF EXISTS `famille`;
CREATE TABLE IF NOT EXISTS `famille` (
  `fml_id` int(11) NOT NULL AUTO_INCREMENT,
  `fml_name` varchar(255) NOT NULL,
  `fml_mail` varchar(255) NOT NULL,
  `fml_phone` varchar(255) NOT NULL,
  `fml_address` varchar(255) NOT NULL,
  `fml_commune` int(11) NOT NULL,
  `fml_annee` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`fml_id`),
  KEY `fml_commune` (`fml_commune`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `fmt_id` int(11) NOT NULL AUTO_INCREMENT,
  `fmt_nom` varchar(255) NOT NULL,
  PRIMARY KEY (`fmt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`fmt_id`, `fmt_nom`) VALUES
(1, 'eveil'),
(2, 'presolfege'),
(3, 'A1'),
(4, 'A2'),
(5, 'A3'),
(6, 'B1'),
(7, 'B2'),
(8, 'B3'),
(9, 'C1'),
(10, 'C2'),
(11, 'D1'),
(12, 'D2'),
(13, 'E1'),
(14, 'E2'),
(15, 'F1'),
(16, 'Adulte');

-- --------------------------------------------------------

--
-- Structure de la table `formule`
--

DROP TABLE IF EXISTS `formule`;
CREATE TABLE IF NOT EXISTS `formule` (
  `fml_id` int(11) NOT NULL AUTO_INCREMENT,
  `fml_nom` varchar(255) NOT NULL,
  `fml_soucieu` float DEFAULT NULL,
  `fml_autre` float DEFAULT NULL,
  `fml_num` int(11) NOT NULL,
  PRIMARY KEY (`fml_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formule`
--

INSERT INTO `formule` (`fml_id`, `fml_nom`, `fml_soucieu`, `fml_autre`, `fml_num`) VALUES
(1, 'instrument 30min et solfege', 550, 625, 1),
(2, 'instrument seul 30min', 465, 540, 2),
(3, 'instrument seul 45min', 680, 770, 3),
(4, 'solfege seul', 285, 325, 4),
(5, 'Eveil ou pre-solfege', 100, 130, 5),
(6, 'autre', NULL, NULL, 6),
(7, 'atelier seul', 110, 140, 7),
(8, 'atelier avec instrument', 60, 60, 8);

-- --------------------------------------------------------

--
-- Structure de la table `instrument`
--

DROP TABLE IF EXISTS `instrument`;
CREATE TABLE IF NOT EXISTS `instrument` (
  `instr_id` int(11) NOT NULL AUTO_INCREMENT,
  `instr_nom` varchar(255) NOT NULL,
  PRIMARY KEY (`instr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `instrument`
--

INSERT INTO `instrument` (`instr_id`, `instr_nom`) VALUES
(1, 'Piano'),
(2, 'Guitare'),
(3, 'Clarinette'),
(8, 'Flute'),
(9, 'Saxophone'),
(10, 'Violon'),
(11, 'Batterie'),
(12, 'Trompette');

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_fml` int(11) NOT NULL,
  `pay_septembre` float NOT NULL,
  `pay_octobre` float NOT NULL,
  `pay_novembre` float NOT NULL,
  `pay_decembre` float NOT NULL,
  `pay_janvier` float NOT NULL,
  `pay_fevrier` float NOT NULL,
  `pay_mars` float NOT NULL,
  `pay_avril` float NOT NULL,
  `pay_mai` float NOT NULL,
  `pay_juin` float NOT NULL,
  `pay_total` float NOT NULL,
  `pay_cv` float NOT NULL,
  `pay_liquide` float NOT NULL,
  PRIMARY KEY (`pay_id`),
  KEY `pay_adh` (`pay_fml`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `prof_id` int(11) NOT NULL AUTO_INCREMENT,
  `prof_nom` varchar(255) NOT NULL,
  `prof_prenom` varchar(255) NOT NULL,
  `instr_id` int(11) NOT NULL,
  PRIMARY KEY (`prof_id`),
  KEY `instr_id` (`instr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`prof_id`, `prof_nom`, `prof_prenom`, `instr_id`) VALUES
(24, 'Grenier', 'Julien', 11),
(25, 'Nervegna', 'Ghislain', 2),
(26, 'Lukas', 'Karine', 1),
(27, 'Dedola', 'Alexandre ', 1),
(28, 'Bleuse', 'Felix', 1),
(30, 'Detrez', 'Olivier', 12),
(31, 'Kahn', 'Frédéric', 10),
(32, 'Guibert', 'Manon', 8),
(33, 'Déplaude', 'Sébastien', 9),
(34, 'Dupont', 'Emeline', 2),
(35, 'Guillien', 'Nicolas', 2);

-- --------------------------------------------------------

--
-- Structure de la table `reductions`
--

DROP TABLE IF EXISTS `reductions`;
CREATE TABLE IF NOT EXISTS `reductions` (
  `rdc_id` int(11) NOT NULL AUTO_INCREMENT,
  `rdc_nom` varchar(255) NOT NULL,
  `rdc_valeur` float NOT NULL,
  `rdc_type` varchar(255) NOT NULL,
  PRIMARY KEY (`rdc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reductions`
--

INSERT INTO `reductions` (`rdc_id`, `rdc_nom`, `rdc_valeur`, `rdc_type`) VALUES
(1, 'preinscription', 2, '%'),
(2, '2 formules', 3, '%'),
(3, '3 formules', 6, '%'),
(4, '4 formules', 10, '%'),
(5, 'Inscription adherent', 30, 'euros'),
(6, 'Inscription famille', 30, 'euros');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_name` varchar(255) NOT NULL,
  `usr_password` varchar(255) NOT NULL,
  `usr_type` varchar(255) NOT NULL,
  `usr_annee` varchar(10) NOT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`usr_id`, `usr_name`, `usr_password`, `usr_type`, `usr_annee`) VALUES
(1, 'admin', 'admin', 'admin', '2017-2018'),
(2, 'gestion', 'gestion', 'membre', '2017-2018');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `adherent_ibfk_1` FOREIGN KEY (`adh_fml`) REFERENCES `famille` (`fml_id`);

--
-- Contraintes pour la table `famille`
--
ALTER TABLE `famille`
  ADD CONSTRAINT `famille_ibfk_1` FOREIGN KEY (`fml_commune`) REFERENCES `commune` (`cmn_id`);

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`pay_fml`) REFERENCES `famille` (`fml_id`);

--
-- Contraintes pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD CONSTRAINT `professeur_ibfk_1` FOREIGN KEY (`instr_id`) REFERENCES `instrument` (`instr_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
