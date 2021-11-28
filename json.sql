-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 28 nov. 2021 à 13:04
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `json`
--

-- --------------------------------------------------------

--
-- Structure de la table `vols`
--

DROP TABLE IF EXISTS `vols`;
CREATE TABLE IF NOT EXISTS `vols` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ville_depart` varchar(30) COLLATE utf8_bin NOT NULL,
  `ville_destination` varchar(30) COLLATE utf8_bin NOT NULL,
  `date_depart` datetime NOT NULL,
  `nb_heure_vol` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `vols`
--

INSERT INTO `vols` (`id`, `ville_depart`, `ville_destination`, `date_depart`, `nb_heure_vol`, `prix`) VALUES
(1, 'Paris', 'Toulouse', '2017-03-09 14:00:00', 1, 110),
(2, 'Lyon', 'Paris', '2017-03-09 18:00:00', 1, 90),
(3, 'Paris', 'Lyon', '2017-03-09 18:00:00', 1, 42),
(4, 'Paris', 'Montpellier', '2017-06-22 09:15:00', 1, 59),
(6, 'Toulouse', 'Montpellier', '2017-06-22 09:15:00', 1, 444),
(7, 'Nantes', 'Marseille', '2018-06-22 09:15:00', 2, 400);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
