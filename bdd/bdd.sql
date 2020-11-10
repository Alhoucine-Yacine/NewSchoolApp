-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 06 jan. 2019 à 20:53
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tdw`
--

-- --------------------------------------------------------

--
-- Structure de la table `ecole`
--

create database tdw;
use tdw;

DROP TABLE IF EXISTS `ecole`;
CREATE TABLE IF NOT EXISTS `ecole` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(256) NOT NULL,
  `type` varchar(256) NOT NULL,
  `categorie` varchar(256) NOT NULL,
  `wilaya` varchar(256) NOT NULL,
  `commune` varchar(256) NOT NULL,
  `adresse` varchar(256) NOT NULL,
  `telephone` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ecole`
--

INSERT INTO `ecole` (`id`, `nom`, `type`, `categorie`, `wilaya`, `commune`, `adresse`, `telephone`) VALUES
(1, 'Ecole Supérieure de Commerce', 'univ', 'Commerce et finance', 'Oran', 'Es-Senia', '50 Rue des martyrs', '031 56 25 70'),
(2, 'Ecole Supérieure d’Electronique', 'univ', 'Electronique', 'Boumerdes', 'Boumerdes-centre', '3500 Rue de la liberté', '035 56 25 70');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `formation` varchar(30) NOT NULL,
  `typeformation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `typeformation_id` (`typeformation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `formation`, `typeformation_id`) VALUES
(1, 'Word', 2),
(2, 'Excel', 2),
(3, 'MSProject', 2),
(4, 'Teaming', 3),
(5, 'Leadership', 3),
(6, 'Anglais', 4),
(7, 'Francais', 4),
(8, 'Italien', 4),
(9, 'Design', 5),
(10, 'Montage', 5),
(11, 'Analyse', 6);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notification` varchar(256) NOT NULL,
  `notification description` varchar(256) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `typeformation`
--

DROP TABLE IF EXISTS `typeformation`;
CREATE TABLE IF NOT EXISTS `typeformation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_formation` varchar(30) NOT NULL,
  `v_horaire` float NOT NULL,
  `prixht` float NOT NULL,
  `taxe` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typeformation`
--

INSERT INTO `typeformation` (`id`, `type_formation`, `v_horaire`, `prixht`, `taxe`) VALUES
(2, 'Bureautique', 5, 4000, 18),
(3, 'Management', 7, 4000, 12),
(4, 'Langue', 2, 4000, 0),
(5, 'Infographie', 7, 4000, 19),
(6, 'Comptabilite', 7, 4000, 19);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `category` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `category`) VALUES
(1, 'admin', 'admin', 'admin'),
(3, 'user', 'user', 'visitor');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
