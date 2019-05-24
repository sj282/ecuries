-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 15 mai 2019 à 09:55
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecurie_vieux_moulin`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@admin.fr', '$2y$10$dpYYy0o9CAjubvHZ6crIsuMf7vSa/65afNVPUJcvwZCs148N2fTLq');

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastName` varchar(80) NOT NULL,
  `firstName` varchar(80) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(80) NOT NULL,
  `zipCode` int(5) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `come` date NOT NULL,
  `contactChoice` varchar(255) NOT NULL,
  `creationDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `booking`
--

INSERT INTO `booking` (`id`, `lastName`, `firstName`, `address`, `city`, `zipCode`, `phone`, `email`, `come`, `contactChoice`, `creationDate`) VALUES
(41, 'Doe', 'John', '3 rue des fleurs', 'Strasbourg', 67000, '03 02 01 04 05', 'john.doe@gmail.com', '2020-01-18', 'phone', '2019-05-10 13:49:39'),
(42, 'Westelynck', 'Tanguy', '23 rue de l\'observatoire', 'Strasbourg', 67000, '05 05 04 78 45', 'tanguyest@yahoo.fr', '2019-05-13', 'email', '2019-05-10 13:50:06'),
(43, 'wayne', 'bruce', '8 rue du joker', 'Gotham City', 77777, '02 55 77 88 99', 'bruce.wayne@gmail.com', '2019-10-25', 'both', '2019-05-10 13:50:22'),
(44, 'suler', 'Jonathan', '3 rue du cimetière', 'Grosbliederstroff', 57520, '06 41 76 87 51', 'suler.jonathan@gmail.com', '2019-09-02', 'phone', '2019-05-10 13:51:03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
